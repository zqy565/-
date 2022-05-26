<?php 
  require 'config.php';
  session_start();

  error_reporting(5);
  if (isset($_GET['delete'])) {
  	unset($_SESSION['login']);
  	header("location:http://localhost/xuankeke/index.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-type" content="text/html" charset="utf-8">
<title>选课课</title>
<link rel="stylesheet" type="text/css" href="top/top.css">
<script src="http://apps.bdimg.com/libs/jquery/1.6.4/jquery.js"></script>
</head>

<body>
<div id="fulltop">
	<div id="top">
		<nav class="box1">
			<ul><li>选课课</li>
				<li><a href="http://localhost/xuankeke/index.php">首页</a></li>
				<a href="http://localhost/xuankeke/sort.php?typekey_id=计算机">
					<li>分类</li>
				</a>						
				<li>关于我们</li>			

			</ul>
		</nav>

<!--注册登录开始-->
<?php  
$con = "
      SELECT *
      FROM users
      WHERE uemail = '".$_SESSION['login']."'";
      $que_1 = mysql_query($con);
      $userinfo = mysql_fetch_array($que_1);
                if (isset($_SESSION['login'])) {?>	
	                	<nav class="my1">
	                			<a href="http://localhost/xuankeke/index.php?delete=1">退出</a>
	                			<a href="#">信息</a>
	                			<a href="#timetable" id="kcb" onclick="showtimetable()">课程表</a>
	                			<a href="http://localhost/xuankeke/userinfo.php?user_id=<?php echo $userinfo['uid']?>">
	                				<?php echo $userinfo['uname'] ?>
	                			</a>	                			
	                	</nav>
               <?php }

               else{?>
            <nav class="my1">
        		<a href="http://localhost/xuankeke/login/reg.php">注册</a> 
        		<a href="http://localhost/xuankeke/login/index.php">登录</a>   
            </nav>							
                <?php } ?>
						
<!--注册登录结束-->	
        
		
		<div class="search">
			<form name="form_search" action="http://localhost/xuankeke/search.php" target="_block">
				<input type="input" name="search" id="search" placeholder="搜索课程">
			</form>
			<span class="butt-search" id="butt-search" onclick="document.form_search.submit()">
				
			</span>
		</div>
	</div>


<!-----         课程表          ------>
<?php 
        if (isset($_SESSION['uname'])) {
				$sql_2="
					SELECT uid 
					FROM users 
					WHERE uname = '{$_SESSION['uname']}' 
					LIMIT 1";
				$result_2 = mysql_query($sql_2);
			}
        if ($userrow_2 = mysql_fetch_array($result_2)) {
				$userid = $userrow_2['uid'];//取得当前用户ID
			?>
    <div id="close" onclick="closetimetable()">
    	<img src="/xuankeke/images/关闭.png">
    </div>
	<div id="timetable">
		<h1>我的课程表</h1>
		<table cellpadding="5" cellspacing="2" align="center">
			<thead>
				<th>时间/星期</th>
				<th>星期一</th>
				<th>星期二</th>
				<th>星期三</th>
				<th>星期四</th>
				<th>星期五</th>
				<th>星期六</th>
				<th>星期日</th>
			</thead>
			<tbody>
				<tr>
					<td class="td1">第1、2节课（8:00~9:40）</td>
					<td>
						<?php 
						 $sql = "
 							SELECT *
 							FROM timetable
 							WHERE timetable_uid = $userid
 							AND timetable_day = '星期一'
 							AND timetable_time = '1 2'
					        ";
				        $result = mysql_query($sql);
				        if ( $row = mysql_fetch_array($result)) {
				        echo $row['timetable_cname'];
				        echo '<br>';
				        echo $row['timetable_room'];
				        }
				        else{
				        	echo " ";
				        }								        
						?>
					</td>
					<td>
						<?php 
						 $sql = "
 							SELECT *
 							FROM timetable
 							WHERE timetable_uid = $userid
 							AND timetable_day = '星期二'
 							AND timetable_time = '1 2'
					        ";
				        $result = mysql_query($sql);
				        if ( $row = mysql_fetch_array($result)) {
				        echo $row['timetable_cname'];
				        echo '<br>';
				        echo $row['timetable_room'];
				        }
				        else{
				        	echo " ";
				        }								        
						?>
					</td>
					<td>
						<?php 
						 $sql = "
 							SELECT *
 							FROM timetable
 							WHERE timetable_uid = $userid
 							AND timetable_day = '星期三'
 							AND timetable_time = '1 2'
					        ";
				        $result = mysql_query($sql);
				        if ( $row = mysql_fetch_array($result)) {
				        echo $row['timetable_cname'];
				        echo '<br>';
				        echo $row['timetable_room'];
				        }
				        else{
				        	echo " ";
				        }								        
						?>
					</td>
					<td>
						<?php 
						 $sql = "
 							SELECT *
 							FROM timetable
 							WHERE timetable_uid = $userid
 							AND timetable_day = '星期四'
 							AND timetable_time = '1 2'
					        ";
				        $result = mysql_query($sql);
				        if ( $row = mysql_fetch_array($result)) {
				        echo $row['timetable_cname'];
				        echo '<br>';
				        echo $row['timetable_room'];
				        }
				        else{
				        	echo " ";
				        }								        
						?>
					</td>
					<td>
						<?php 
						 $sql = "
 							SELECT *
 							FROM timetable
 							WHERE timetable_uid = $userid
 							AND timetable_day = '星期五'
 							AND timetable_time = '1 2'
					        ";
				        $result = mysql_query($sql);
				        if ( $row = mysql_fetch_array($result)) {
				        echo $row['timetable_cname'];
				        echo '<br>';
				        echo $row['timetable_room'];
				        }
				        else{
				        	echo " ";
				        }								        
						?>
					</td>
					<td>
						<?php 
						 $sql = "
 							SELECT *
 							FROM timetable
 							WHERE timetable_uid = $userid
 							AND timetable_day = '星期六'
 							AND timetable_time = '1 2'
					        ";
				        $result = mysql_query($sql);
				        if ( $row = mysql_fetch_array($result)) {
				        echo $row['timetable_cname'];
				        echo '<br>';
				        echo $row['timetable_room'];
				        }
				        else{
				        	echo " ";
				        }								        
						?>
					</td>
					<td>
						<?php 
						 $sql = "
 							SELECT *
 							FROM timetable
 							WHERE timetable_uid = $userid
 							AND timetable_day = '星期天'
 							AND timetable_time = '1 2'
					        ";
				        $result = mysql_query($sql);
				        if ( $row = mysql_fetch_array($result)) {
				        echo $row['timetable_cname'];
				        echo '<br>';
				        echo $row['timetable_room'];
				        }
				        else{
				        	echo " ";
				        }								        
						?>
					</td>
				</tr>
				<tr>
                    <td class="td1">第3、4节课（10:10~11:50）</td>
					<td>
						<?php 
						 $sql = "
 							SELECT *
 							FROM timetable
 							WHERE timetable_uid = $userid
 							AND timetable_day = '星期一'
 							AND timetable_time = '3 4'
					        ";
				        $result = mysql_query($sql);
				        if ( $row = mysql_fetch_array($result)) {
				        echo $row['timetable_cname'];
				        echo '<br>';
				        echo $row['timetable_room'];
				        }
				        else{
				        	echo " ";
				        }								        
						?>
					</td>
					<td>
						<?php 
						 $sql = "
 							SELECT *
 							FROM timetable
 							WHERE timetable_uid = $userid
 							AND timetable_day = '星期二'
 							AND timetable_time = '3 4'
					        ";
				        $result = mysql_query($sql);
				        if ( $row = mysql_fetch_array($result)) {
				        echo $row['timetable_cname'];
				        echo '<br>';
				        echo $row['timetable_room'];
				        }
				        else{
				        	echo " ";
				        }								        
						?>
					</td>
					<td>
						<?php 
						 $sql = "
 							SELECT *
 							FROM timetable
 							WHERE timetable_uid = $userid
 							AND timetable_day = '星期三'
 							AND timetable_time = '3 4'
					        ";
				        $result = mysql_query($sql);
				        if ( $row = mysql_fetch_array($result)) {
				        echo $row['timetable_cname'];
				        echo '<br>';
				        echo $row['timetable_room'];
				        }
				        else{
				        	echo " ";
				        }								        
						?>
					</td>
					<td>
						<?php 
						 $sql = "
 							SELECT *
 							FROM timetable
 							WHERE timetable_uid = $userid
 							AND timetable_day = '星期四'
 							AND timetable_time = '3 4'
					        ";
				        $result = mysql_query($sql);
				        if ( $row = mysql_fetch_array($result)) {
				        echo $row['timetable_cname'];
				        echo '<br>';
				        echo $row['timetable_room'];
				        }
				        else{
				        	echo " ";
				        }								        
						?>
					</td>
					<td>
						<?php 
						 $sql = "
 							SELECT *
 							FROM timetable
 							WHERE timetable_uid = $userid
 							AND timetable_day = '星期五'
 							AND timetable_time = '3 4'
					        ";
				        $result = mysql_query($sql);
				        if ( $row = mysql_fetch_array($result)) {
				        echo $row['timetable_cname'];
				        echo '<br>';
				        echo $row['timetable_room'];
				        }
				        else{
				        	echo " ";
				        }								        
						?>
					</td>
					<td>
						<?php 
						 $sql = "
 							SELECT *
 							FROM timetable
 							WHERE timetable_uid = $userid
 							AND timetable_day = '星期六'
 							AND timetable_time = '3 4'
					        ";
				        $result = mysql_query($sql);
				        if ( $row = mysql_fetch_array($result)) {
				        echo $row['timetable_cname'];
				        echo '<br>';
				        echo $row['timetable_room'];
				        }
				        else{
				        	echo " ";
				        }								        
						?>
					</td>
					<td>
						<?php 
						 $sql = "
 							SELECT *
 							FROM timetable
 							WHERE timetable_uid = $userid
 							AND timetable_day = '星期日'
 							AND timetable_time = '3 4'
					        ";
				        $result = mysql_query($sql);
				        if ( $row = mysql_fetch_array($result)) {
				        echo $row['timetable_cname'];
				        echo '<br>';
				        echo $row['timetable_room'];
				        }
				        else{
				        	echo " ";
				        }								        
						?>
					</td>					
				</tr>
				<tr>
                    <td class="td1">第5、6节课（14:00~15:40）</td>
					<td>
						<?php 
						 $sql = "
 							SELECT *
 							FROM timetable
 							WHERE timetable_uid = $userid
 							AND timetable_day = '星期一'
 							AND timetable_time = '5 6'
					        ";
				        $result = mysql_query($sql);
				        if ( $row = mysql_fetch_array($result)) {
				        echo $row['timetable_cname'];
				        echo '<br>';
				        echo $row['timetable_room'];
				        }
				        else{
				        	echo " ";
				        }								        
						?>
					</td>
					<td>
						<?php 
						 $sql = "
 							SELECT *
 							FROM timetable
 							WHERE timetable_uid = $userid
 							AND timetable_day = '星期二'
 							AND timetable_time = '5 6'
					        ";
				        $result = mysql_query($sql);
				        if ( $row = mysql_fetch_array($result)) {
				        echo $row['timetable_cname'];
				        echo '<br>';
				        echo $row['timetable_room'];
				        }
				        else{
				        	echo " ";
				        }								        
						?>
					</td>
					<td>
						<?php 
						 $sql = "
 							SELECT *
 							FROM timetable
 							WHERE timetable_uid = $userid
 							AND timetable_day = '星期三'
 							AND timetable_time = '5 6'
					        ";
				        $result = mysql_query($sql);
				        if ( $row = mysql_fetch_array($result)) {
				        echo $row['timetable_cname'];
				        echo '<br>';
				        echo $row['timetable_room'];
				        }
				        else{
				        	echo " ";
				        }								        
						?>
					</td>
					<td>
						<?php 
						 $sql = "
 							SELECT *
 							FROM timetable
 							WHERE timetable_uid = $userid
 							AND timetable_day = '星期四'
 							AND timetable_time = '5 6'
					        ";
				        $result = mysql_query($sql);
				        if ( $row = mysql_fetch_array($result)) {
				        echo $row['timetable_cname'];
				        echo '<br>';
				        echo $row['timetable_room'];
				        }
				        else{
				        	echo " ";
				        }								        
						?>
					</td>
					<td>
						<?php 
						 $sql = "
 							SELECT *
 							FROM timetable
 							WHERE timetable_uid = $userid
 							AND timetable_day = '星期五'
 							AND timetable_time = '5 6'
					        ";
				        $result = mysql_query($sql);
				        if ( $row = mysql_fetch_array($result)) {
				        echo $row['timetable_cname'];
				        echo '<br>';
				        echo $row['timetable_room'];
				        }
				        else{
				        	echo " ";
				        }								        
						?>
					</td>
					<td>
						<?php 
						 $sql = "
 							SELECT *
 							FROM timetable
 							WHERE timetable_uid = $userid
 							AND timetable_day = '星期六'
 							AND timetable_time = '5 6'
					        ";
				        $result = mysql_query($sql);
				        if ( $row = mysql_fetch_array($result)) {
				        echo $row['timetable_cname'];
				        echo '<br>';
				        echo $row['timetable_room'];
				        }
				        else{
				        	echo " ";
				        }								        
						?>
					</td>
					<td>
						<?php 
						 $sql = "
 							SELECT *
 							FROM timetable
 							WHERE timetable_uid = $userid
 							AND timetable_day = '星期天'
 							AND timetable_time = '5 6'
					        ";
				        $result = mysql_query($sql);
				        if ( $row = mysql_fetch_array($result)) {
				        echo $row['timetable_cname'];
				        echo '<br>';
				        echo $row['timetable_room'];
				        }
				        else{
				        	echo " ";
				        }								        
						?>
					</td>					
				</tr>
				<tr>
                    <td class="td1">第7、8节课（16:10~17:50）</td>
					<td>						
						<?php 
						 $sql = "
 							SELECT *
 							FROM timetable
 							WHERE timetable_uid = $userid
 							AND timetable_day = '星期一'
 							AND timetable_time = '7 8'
					        ";
				        $result = mysql_query($sql);
				        if ( $row = mysql_fetch_array($result)) {
				        echo $row['timetable_cname'];
				        echo '<br>';
				        echo $row['timetable_room'];
				        }
				        else{
				        	echo " ";
				        }								        
						?>
							
						</td>
					<td>
						<?php 
						 $sql = "
 							SELECT *
 							FROM timetable
 							WHERE timetable_uid = $userid
 							AND timetable_day = '星期二'
 							AND timetable_time = '7 8'
					        ";
				        $result = mysql_query($sql);
				        if ( $row = mysql_fetch_array($result)) {
				        echo $row['timetable_cname'];
				        echo '<br>';
				        echo $row['timetable_room'];
				        }
				        else{
				        	echo " ";
				        }								        
						?>
					</td>
					<td>
						<?php 
						 $sql = "
 							SELECT *
 							FROM timetable
 							WHERE timetable_uid = $userid
 							AND timetable_day = '星期三'
 							AND timetable_time = '7 8'
					        ";
				        $result = mysql_query($sql);
				        if ( $row = mysql_fetch_array($result)) {
				        echo $row['timetable_cname'];
				        echo '<br>';
				        echo $row['timetable_room'];
				        }
				        else{
				        	echo " ";
				        }								        
						?>
					</td>
					<td>
						<?php 
						 $sql = "
 							SELECT *
 							FROM timetable
 							WHERE timetable_uid = $userid
 							AND timetable_day = '星期四'
 							AND timetable_time = '7 8'
					        ";
				        $result = mysql_query($sql);
				        if ( $row = mysql_fetch_array($result)) {
				        echo $row['timetable_cname'];
				        echo '<br>';
				        echo $row['timetable_room'];
				        }
				        else{
				        	echo " ";
				        }								        
						?>
					</td>
					<td>
						<?php 
						 $sql = "
 							SELECT *
 							FROM timetable
 							WHERE timetable_uid = $userid
 							AND timetable_day = '星期五'
 							AND timetable_time = '7 8'
					        ";
				        $result = mysql_query($sql);
				        if ( $row = mysql_fetch_array($result)) {
				        echo $row['timetable_cname'];
				        echo '<br>';
				        echo $row['timetable_room'];
				        }
				        else{
				        	echo " ";
				        }								        
						?>
					</td>
					<td>
						<?php 
						 $sql = "
 							SELECT *
 							FROM timetable
 							WHERE timetable_uid = $userid
 							AND timetable_day = '星期六'
 							AND timetable_time = '7 8'
					        ";
				        $result = mysql_query($sql);
				        if ( $row = mysql_fetch_array($result)) {
				        echo $row['timetable_cname'];
				        echo '<br>';
				        echo $row['timetable_room'];
				        }
				        else{
				        	echo " ";
				        }								        
						?>
					</td>
					<td>
						<?php 
						 $sql = "
 							SELECT *
 							FROM timetable
 							WHERE timetable_uid = $userid
 							AND timetable_day = '星期天'
 							AND timetable_time = '7 8'
					        ";
				        $result = mysql_query($sql);
				        if ( $row = mysql_fetch_array($result)) {
				        echo $row['timetable_cname'];
				        echo '<br>';
				        echo $row['timetable_room'];
				        }
				        else{
				        	echo " ";
				        }								        
						?>
					</td>					
				</tr>
				<tr>
                    <td class="td1">第9、10节课（19:00~20:40）</td>
					<td>
						<?php 
						 $sql = "
 							SELECT *
 							FROM timetable
 							WHERE timetable_uid = $userid
 							AND timetable_day = '星期一'
 							AND timetable_time = '9 10'
					        ";
				        $result = mysql_query($sql);
				        if ( $row = mysql_fetch_array($result)) {
				        echo $row['timetable_cname'];
				        echo '<br>';
				        echo $row['timetable_room'];
				        }
				        else{
				        	echo " ";
				        }								        
						?>
					</td>
					<td>
						<?php 
						 $sql = "
 							SELECT *
 							FROM timetable
 							WHERE timetable_uid = $userid
 							AND timetable_day = '星期二'
 							AND timetable_time = '9 10'
					        ";
				        $result = mysql_query($sql);
				        if ( $row = mysql_fetch_array($result)) {
				        echo $row['timetable_cname'];
				        echo '<br>';
				        echo $row['timetable_room'];
				        }
				        else{
				        	echo " ";
				        }								        
						?>
					</td>
					<td>
						<?php 
						 $sql = "
 							SELECT *
 							FROM timetable
 							WHERE timetable_uid = $userid
 							AND timetable_day = '星期三'
 							AND timetable_time = '9 10'
					        ";
				        $result = mysql_query($sql);
				        if ( $row = mysql_fetch_array($result)) {
				        echo $row['timetable_cname'];
				        echo '<br>';
				        echo $row['timetable_room'];
				        }
				        else{
				        	echo " ";
				        }								        
						?>
					</td>
					<td>
						<?php 
						 $sql = "
 							SELECT *
 							FROM timetable
 							WHERE timetable_uid = $userid
 							AND timetable_day = '星期四'
 							AND timetable_time = '9 10'
					        ";
				        $result = mysql_query($sql);
				        if ( $row = mysql_fetch_array($result)) {
				        echo $row['timetable_cname'];
				        echo '<br>';
				        echo $row['timetable_room'];
				        }
				        else{
				        	echo " ";
				        }								        
						?>
					</td>
					<td>
						<?php 
						 $sql = "
 							SELECT *
 							FROM timetable
 							WHERE timetable_uid = $userid
 							AND timetable_day = '星期五'
 							AND timetable_time = '9 10'
					        ";
				        $result = mysql_query($sql);
				        if ( $row = mysql_fetch_array($result)) {
				        echo $row['timetable_cname'];
				        echo '<br>';
				        echo $row['timetable_room'];
				        }
				        else{
				        	echo " ";
				        }								        
						?>
					</td>
					<td>
						<?php 
						 $sql = "
 							SELECT *
 							FROM timetable
 							WHERE timetable_uid = $userid
 							AND timetable_day = '星期六'
 							AND timetable_time = '9 10'
					        ";
				        $result = mysql_query($sql);
				        if ( $row = mysql_fetch_array($result)) {
				        echo $row['timetable_cname'];
				        echo '<br>';
				        echo $row['timetable_room'];
				        }
				        else{
				        	echo " ";
				        }								        
						?>
					</td>
					<td>
						<?php 
						 $sql = "
 							SELECT *
 							FROM timetable
 							WHERE timetable_uid = $userid
 							AND timetable_day = '星期天'
 							AND timetable_time = '9 10'
					        ";
				        $result = mysql_query($sql);
				        if ( $row = mysql_fetch_array($result)) {
				        echo $row['timetable_cname'];
				        echo '<br>';
				        echo $row['timetable_room'];
				        }
				        else{
				        	echo " ";
				        }								        
						?>
					</td>					
				</tr>
			</tbody>
		</table>
		<?php } ?>
	</div>

</div>	
</body>

<script type="text/javascript">
	var close=document.getElementById('close');
    var timetable=document.getElementById('timetable');
    function showtimetable(){
	timetable.style.display='block';
	close.style.display='block';
    }
    function closetimetable(){
	timetable.style.display='none';
	close.style.display='none';
    }
</script>
</html>