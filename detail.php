<?php   
  require 'config.php';
  session_start();
  error_reporting(5);?>
<?php
    ob_start();
    $classkey_id = $_GET['key_id'];
    $query = "SELECT * FROM class WHERE class_id = $classkey_id";
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);

	if (isset($_GET['$sessionid'])) {

		$_SESSION['userurl'] = $_SERVER['REQUEST_URI'];//将本页面进行session，以便登录后可以跳回本页面

		if (!isset($_SESSION['login'])) {//没有登录跳到登录界面
			header('Location:http://localhost/xuankeke/login/index.php');
			ob_end_flush();//发送内部缓冲区的内容到浏览器，并且关闭输出缓冲区
		}
		else{//已经登录进行选课
			if (isset($_SESSION['uname'])) {
				$sql="
					SELECT uid 
					FROM users 
					WHERE uname = '{$_SESSION['uname']}' 
					LIMIT 1";
				$result = mysql_query($sql);
			}
			if ($userrow = mysql_fetch_array($result)) {
				$userid = $userrow['uid'];//取得当前用户ID
			}

			$que = "
					SELECT *
					FROM timetable
					WHERE class_id = $classkey_id 
					AND uid = '$userid'
			";
			$check_result = mysql_query($que);
			$check_row = mysql_fetch_array($check_result);
			//查询当前商品是否在已选课程表中
			if ($check_row) {
					echo ('<script type="text/javascript">
							alert("你已添加该课程，请勿重复添加！");
						</script>');
				
			}//如果在，弹出提示
			else {
				$img= $row['class_pic'];
				$name = $row['class_name'];
				$cid=$row['class_id'];
				$cday= $row['class_day'];
				$ctime= $row['class_time'];
				$cteacher= $row['class_teacher'];
				$croom= $row['class_room'];
				$sql = "
						INSERT INTO timetable(timetable_uid,timetable_cpic,timetable_cname,timetable_day,timetable_time,timetable_room,timetable_teacher,timetable_cid,timetable_grade,timetable_id)
						VALUES ('$userid','$img','$name','$cday','$ctime','$croom','$cteacher','$cid',NULL,'$userid$cid')
				";
				$result = mysql_query($sql);
				
				if (mysql_affected_rows($config) == 1) {
					mysql_close($config);
					echo ('<script type="text/javascript">
							alert("加入成功！");
						</script>');
				}
				else{
					echo ('<script type="text/javascript">
							alert("你已添加该课程，请勿重复添加！");
						</script>');
				}
	        }	
		}    
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-type" content="text/html" charset="utf-8">
<title>选课课</title>
<link rel="stylesheet" type="text/css" href="detail/detail.css">
</head>

<body>
<?php require 'top.php';?>
<?php 
    $que_3 = "
					SELECT *
					FROM class
					WHERE class_id = $classkey_id 
			";
	$result_classinfo = mysql_query($que_3);
	$row = mysql_fetch_array($result_classinfo);
?>
<div id="detail_con">
    <div id="detail_con1">
	    <div class="img">
		    <img src="<?php echo $row['class_pic']; ?>" alt="">
	    </div>
	    <div class="class_info">
		    <div>
		    	<img src="images/时间.png">
		    	<p><span>上课时间：</span><br/>
		    <?php echo $row['class_day']; ?> /
		    <?php echo $row['class_time']; ?>
		        </p>
		    </div>
		    <div>
		    	<img src="images/地点.png">
		    	<p><span>上课教室：</span><br/><?php 
			echo $row['class_room'];
		      ?></p>
		    </div>
		    <div>
		    	<img src="images/w_老师.png">
		    	<p><span>任课老师：</span><br/><?php 
			echo $row['class_teacher'];
		      ?></p>
		    </div>
		    
		    
	    </div>	
    </div>
    <div id="detail_con2">
    	<h3><?php echo $row['class_name']; ?></h3>
    	<span># <?php echo $row['class_type']; ?> #</span>
    	<span><?php if($row['class_hot']!=0){echo '# 推荐 #';} ?></span>
    	<span>#CID:<?php if($row['class_hot']!=0){echo $row['class_id'];} ?>#</span>
    	<div class="des">
    		
    		    <?php echo $row['class_des']; ?></div>
    		    <a href="http://localhost/xuankeke/detail.php?key_id=<?php echo $classkey_id; ?> & $sessionid=<?php echo $classkey_id; ?>" ><button type="button">加入课程</button></a>
    </div>
    
</div>

<div id="line1"></div>
<div id="line2"></div>

</body>


</html>