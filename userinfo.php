<?php   
  require 'config.php';
  session_start();
  error_reporting(5);

   ob_start();
   $user_id = $_GET['user_id'];
   $sql = "
			SELECT * 
			FROM users 
			WHERE uid = '$user_id'
				";
			$result_userinfo = mysql_query($sql)or die('error:'.mysql_error());
			$row_userinfo = mysql_fetch_array($result_userinfo);

	$sqlmyclass = "
			SELECT * 
			FROM timetable 
			WHERE timetable_uid = '$user_id'
				";
			$result_myclass = mysql_query($sqlmyclass)or die('error:'.mysql_error());


	if ($_GET['action'] == 'delete') 
	{ 
		if (isset($_SESSION['uname'])) 
		{

		   if (isset($_GET['myclass_id'])) {
		   	$myc_id = $_GET['myclass_id'];
		   	$user_id = $_GET['user_id'];
			$sql="
				DELETE FROM timetable
				WHERE timetable_cid = '$myc_id'
				AND timetable_uid = '$user_id'
			";
			$result = mysql_query($sql);
		}
			 if (mysql_affected_rows($config)) {
			mysql_close($config);
			echo('<script>
				alert("删除成功！");
				window.history.back(-1);
				</script>');
		      }
		    
		   
	    }
    }
?>

 <!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-type" content="text/html" charset="utf-8">
<title>选课课</title>
<link rel="stylesheet" type="text/css" href="userinfo/userinfo.css">
<script src="http://apps.bdimg.com/libs/jquery/1.6.4/jquery.js"></script>
</head>

<body>
	<?php require 'top.php';?>

<div id="squre">
	<span></span>
	<span></span>
	<span></span>
	<div id="welcome">
		<p><?php echo $row_userinfo['uname'] ?></p>
		<img src="userinfo/images/个人1.png">
	</div>
</div>

<div id="infobox">
	<p><span>昵称：</span><?php echo $row_userinfo['uname'] ?></p>
	<p><span>学号：</span><?php echo $row_userinfo['uid'] ?></p>
	<p><span>邮箱：</span><?php echo $row_userinfo['uemail'] ?></p>
	<p><span>手机：</span><?php echo $row_userinfo['uphone'] ?></p>
	<p><span>学院：</span><?php echo $row_userinfo['ucollege'] ?></p>
	<p><span>班级：</span><?php echo $row_userinfo['uclass'] ?></p>
</div>
<div id="resetbox" style="display: none;">
					<form action="resetuser.php" name="form_reset" method="post">

						<label for="uname">昵称:</label>
						<input type="text" name="uname" id="uname" required="required" value="<?php echo $row_userinfo['uname']; ?>">						
						<label for="uemail">学号:</label>
						<input type="text" name="uid" id="uid" required="required" value="<?php echo $row_userinfo['uid']; ?>">
						<label for="uemail">邮箱:</label>
						<input type="text" name="uemail" id="uemail" required="required" value="<?php echo $row_userinfo['uemail']; ?>">
						<label for="uphone">手机:</label>
						<input type="text" name="uphone" id="uphone" required="required" value="<?php echo $row_userinfo['uphone']; ?>">
						<label for="ucollege">学院:</label>
						<input type="text" name="ucollege" id="ucollege" placeholder="请填写你的所属学院" value="<?php if($row_userinfo['ucollege']){echo $$row_userinfo['ucollege'];} ?>">
						<label for="uclass">班级:</label>
						<input type="text" name="uclass" id="uclass" placeholder="请填写你的所属学院" value="<?php if($row_userinfo['uclass']){echo $$row_userinfo['uclass'];} ?>">

						<button type="submit" onclick="check_re()" class="queding">确认修改</button>
					</form>
</div>

<div id="infobutt">
	<button type="submit" class="infobutt" id="myinfo" onclick="myin()">我的资料</button>
    <button type="submit" class="infobutt" id="resetinfo" onclick="res()">修改资料</button>
</div>


<div id="today">
	<img src="userinfo/images/日程.png">
	<h2>今日课程</h2>
	<?php 
	$week=array("天","一","二","三","四","五","六");
	$today="星期".$week[date("w")];
	$sqltoday = "
			SELECT * 
			FROM timetable 
			WHERE timetable_day = '$today'
				";
			$result_today = mysql_query($sqltoday)or die('error:'.mysql_error());
	?>
	<?php while ($row_today = mysql_fetch_array($result_today)) {?>
	<div class="aday">
		<h4><?php echo $row_today['timetable_cname']?></h4>
		<p>第<?php echo $row_today['timetable_time']?>节课</p>
		<p><?php echo $row_today['timetable_room']?></p>
	</div>
	<?php } ?>
</div>

	<div class="show">
		<div id="cicon"></div>
		<h2>我的课程</h2>
				
 		<?php while ($row_myclass = mysql_fetch_array($result_myclass)) {?>
 			
 				<div class="item">
 					<a href="detail.php?key_id=<?php echo$row_myclass['timetable_cid']; ?>" target="_blank">
 						
	 					<img src="<?php echo $row_myclass['timetable_cpic']; ?>" alt="">
	 						<p class="name"><?php echo $row_myclass['timetable_cname']; ?></p>
	 						<p class="day">
	 							<?php 
	 							echo $row_myclass['timetable_day'];?>
	 							 第<?php echo $row_myclass['timetable_time'];
	 						    ?>节课
	 						</p>
	 						<p class="teacher"><?php echo $row_myclass['timetable_cteacher']; ?></p>

					</a>
					
					<button type="submit" class="tuike"><a href="userinfo.php?action=delete&myclass_id=<?php echo $row_myclass['timetable_cid']; ?>&user_id=<?php echo $row_userinfo['uid']?>">退课</a></button>
 				</div>			
 		<?php } ?>
 	    </div>

<?php require 'foot/foot.php';?>
</body>

<script type="text/javascript">
	$(document).ready(function(){
		$("#squre").mouseover(function(){
			$("#welcome img").attr("src","http://localhost/xuankeke/userinfo/images/个人2.png");
		});
		$("#squre").mouseout(function(){
			$("#welcome img").attr("src","http://localhost/xuankeke/userinfo/images/个人1.png");
		})
	})
</script>

<script type="text/javascript">
	var myinfo=document.getElementById("infobox");
	var reset=document.getElementById("resetbox");
	function myin(){
		myinfo.style.display="block";
		reset.style.display="none";
	}
	function res(){
		myinfo.style.display="none";
		reset.style.display="block";
	}
	function check_re() {
 			if (document.form_reset.uname.value == "") {
 				alert("请填写用户名！");
 			}

 			if (document.form_reset.uemail.value == "") {
 				alert("请填写邮箱！");
 			}

 			if (document.form_reset.uphone.value == "") {
 				alert("请填写手机号！");
 			}
 		}
</script>

</html>