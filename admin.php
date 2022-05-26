<?php   
  require 'config.php';
  session_start();
  error_reporting(5);

  ob_start();

  $sql_shu1 ="SELECT COUNT(*) FROM class";
		$result_shu1 = mysql_query($sql_shu1);
		$rows_shu1 = mysql_fetch_row($result_shu1);
		$classcount = $rows_shu1[0];//统计课程数量
        

  $sql_shu2 ="SELECT COUNT(*) FROM users";
		$result_shu2 = mysql_query($sql_shu2);
		$rows_shu2 = mysql_fetch_row($result_shu2);
		$userscount = $rows_shu2[0];//统计注册用户数量
?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-type" content="text/html" charset="utf-8">
<title>选课课</title>
<link rel="stylesheet" type="text/css" href="admin/admin.css">
<script src="http://apps.bdimg.com/libs/jquery/1.6.4/jquery.js"></script>
<script type="text/javascript" src="admin/admin.js"></script>
</head>

<body>
<div id="adminhead">
	<nav>
		<ul>
			<li id="xkk">“选课课”学生选课系统管理后台</li>			
		</ul>
		<ul id="rightnav">
			<li><a href="http://localhost/xuankeke/index.php">首页</a></li>
			<li><a href="http://localhost/xuankeke/login/index.php">退出</a></li>
		</ul>
	</nav>
</div>
<div id="le">
	<ul>
		<li id="li1"><img src="admin/images/用户.png" /> 用户管理</li>
		<li id="li2"><img src="admin/images/课程管理.png" />课程管理</li>
		<li id="li3"><img src="admin/images/选课.png" />选课管理</li>
		<li id="li4"><img src="admin/images/文件-通知文件.png" />公告管理</li>
	</ul>
</div>










<!---------------------------用户管理------------------------------------------------->
<div id="users_guanli">
	<div class="spanspan">
	<span id="span_11" onclick="span11()">用户列表</span>
	<span id="span_12" onclick="span12()">添加用户</span>
    </div>

    <div id="users_head">
    	<div class="sousuo">

    		<form>
    			<input type="text" id="users_" name="users_" placeholder="输入关键字筛选..."> 
    			<p><br/><br/>注册用户人数：<?php echo $userscount; ?></p>
    		</form> 	
    	</div> 

	<?php 
	$num = 1;
	$q1 = "
	      SELECT *
	      FROM users
	      ";
	$re1 = mysql_query($q1)or die('error:'.mysql_error());?>
    <table border="0" cellspacing="0" cellpadding="0" bgcolor="#fff">
    	
    	<thead>
    		<th>用户序号</th>
    		<th>学生姓名</th>
    		<th>电子邮箱</th>
    		<th>学生学号</th>
    		<th>手机号码</th>
    		<th>所属学院</th>
    		<th>专业班级</th>
    	</thead>
     <tr>
    	<?php while ($row_1 = mysql_fetch_array($re1)) {?>
	    <td><?php echo $num++ ?></td>
	    <td><?php echo $row_1['uname']?></td>
		<td><?php echo $row_1['uemail']?></td>
		<td><?php echo $row_1['uid']?></td>
		<td><?php echo $row_1['uphone']?></td>
		<td><?php echo $row_1['ucollege']?></td>
		<td><?php echo $row_1['uclass']?></td>	
	  </tr> 
	<?php } ?> 
    </table>	
   </div>


<div id="users_two" style="display: none;">
	<form action="admin/add_user.php" name="adduser" method="post">
						<label for="">学生昵称：</label><input type="text" name="uname" id="uname" placeholder="请输入学生昵称或姓名" required="required"><br/>
						<label for="">学 生 I D：</label><input type="text" name="uid" id="uid" placeholder="请输入该学生学号" required="required"><br/>
						<label for="">电子邮箱：</label><input type="text" name="uemail" id="uemail" placeholder="请输入电子邮箱" required="required"><br/>
						<label for="">联系电话：</label><input type="text" name="uphone" id="uphone" placeholder="请输入手机号码" required="required"><br/>
						<label for="">所属学院：</label><input type="text" name="ucollege" id="ucollege" placeholder="请输入学院全称" required="required"><br/>
						<label for="">专业班级：</label><input type="text" name="uclass" id="uclass" placeholder="请输入专业班级" required="required"><br/>
						<label for="">登录密码：</label><input type="text" name="upassword" id="upassword" placeholder="请输入该课程编号" required="required"><br/>
						
						<button type="submit">添加用户</button>
					</form>
</div>
</div>











<!-----课程管理------>
<div id="class_guanli" style="display: none;">
	<div class="spanspan">
	<span id="span_21" onclick="span21()">课程列表</span>
	<span id="span_22" onclick="span22()">添加课程</span>
    </div>
	<div id="class_head">
    	<div class="sousuo">
    		<form class="form1">
    			<input type="text" name="class_" id="class_" placeholder="输入关键字筛选..."> 
    		<p><br/><br/>录入课程总数：<?php echo $classcount; ?></p>		           
    		</form>
    		
    	</div>   
 
	<?php 
	$num = 1;
	$q2 = "
	      SELECT *
	      FROM class
	      ";
	$re2 = mysql_query($q2)or die('error:'.mysql_error());?>

	<form action="admin/admin_d.php" method="POST">
    	<button class="delete" type="submit" onclick="tishi_d()">删除课程</button>
    	
    <table border="0" cellspacing="0" cellpadding="0" bgcolor="#fff">
    	
    	<thead>
    		<th>课程序号</th>
    		<th>课程名称</th>
    		<th>课程ID</th>
    		<th>课程类别</th>
    		<th>课程讲师</th>
    		<th>上课时间</th>
    		<th>上课地点</th>
    		<th>批量删除</th>
    	</thead>
    <tr>
    	<?php while ($row_2 = mysql_fetch_array($re2)) {?>
	    <td><?php echo $num++ ?></td>
	    <td><?php echo $row_2['class_name']?></td>
		<td><?php echo $row_2['class_id']?></td>
		<td><?php echo $row_2['class_type']?></td>
		<td><?php echo $row_2['class_teacher']?></td>
		<td><?php echo $row_2['class_day']?> / <?php echo $row_2['class_time']?></td>
		<td><?php echo $row_2['class_room']?></td>		    
		<td><input type="checkbox" name="ids[]" class="ck" value="<?php echo $row_2['class_id']; ?>" style="zoom:60%;" /></td>
	</tr> 
	<?php } ?> 
    </table>
</form>	
</div>

<div id="class_two" style="display: none;">
	<form action="admin/add_class.php" name="addclass" method="post">
						<label for="good_type">课程名称：</label><input type="text" name="class_name" id="class_name" placeholder="请输入课程名称" required="required"><br/>
						<label for="">课程类别：</label>
						<select name="class_type" id="class_type">
							<option value="计算机">计算机</option>
							<option value="外语">外语</option>
							<option value="理学">理学</option>
							<option value="工学">工学</option>
							<option value="经济管理">经济管理</option>
							<option value="心理学">心理学</option>
							<option value="文史哲">文史哲</option>
							<option value="艺术设计">艺术设计</option>
							<option value="医药卫生">医药卫生</option>
							<option value="法学">法学</option>
							<option value="物理实验">物理实验</option>
							<option value="体育运动">体育运动</option>
						</select><br/>
						<label for="">课 程 I D：</label><input type="text" name="class_id" id="class_id" placeholder="请输入该课程编号" required="required"><br/>
						<label for="">课程图片：</label><input type="text" name="class_pic" id="class_pic" placeholder="请输入图片路径" required="required"><br/>
						<label for="">课程讲师：</label><input type="text" name="class_teacher" id="class_teacher" placeholder="请输入老师姓名" required="required"><br/>
						<label for="">课程时间：</label>
						<select name="class_day" id="class_day">
							<option value="星期一">星期一</option>
							<option value="星期二">星期二</option>
							<option value="星期三">星期三</option>
							<option value="星期四">星期四</option>
							<option value="星期五">星期五</option>
							<option value="星期六">星期六</option>
							<option value="星期天">星期天</option>
						</select>
						第<select name="class_time" id="class_time">
							<option value="1 2">1 2</option>
							<option value="3 4">3 4</option>
							<option value="5 6">5 6</option>
							<option value="7 8">7 8</option>
							<option value="9 10">9 10</option>
						</select>节课<br/>
						<label for="">课程地点：</label><input type="text" name="class_room" id="class_room" placeholder="请输入上课地点" required="required"><br/>
						<label for="">课程详情：</label><input type="text" name="class_des" id="class_des" placeholder="请输入该课程详情介绍" required="required"><br/>
						<label for="">课程人数：</label><input type="text" name="class_number" id="class_number" placeholder="请输入该课程限定人数" required="required"><br/>
						<label for="">是否设为热门：</label>
						<select name="class_hot" id="class_hot">
							<option value="1">是</option>
							<option value="0">否</option>
						</select><br/>
						<label for="">是否设为本学期指定选修课：</label>
						<select name="class_xuan" id="class_xuan">
							<option value="1">是</option>
							<option value="0">否</option>
						</select><br/>
						<button type="submit" onclick="return check_add()">添加课程</button>
					</form>
</div>
	
</div>













<!-------选课管理-------->
<div id="xuanke_guanli" style="display: none;">
	<div class="spanspan">
	<span id="span_31" onclick="span31()">本学期指定选修课</span>
	<span id="span_32" onclick="span32()">查看选课名单</span>
    </div>

<div id="xuanxiu">
	<div id="xuanxiuke">
	   	<div class="sousuo">
    		<form>
    			<input type="text" id="xuanxiuke_" name="xuanxiuke_" placeholder="输入关键字筛选..."> 
    		</form>
    	</div>  
    </div> 
	<?php 
	$num = 1;
	$q3 = "
	      SELECT *
	      FROM class
	      WHERE class_xuan = 1
	      ";
	$re3 = mysql_query($q3)or die('error:'.mysql_error());?>
    <table border="0" cellspacing="0" cellpadding="0" bgcolor="#fff">
    	<thead>
    		<th>课程序号</th>
    		<th>课程名称</th>
    		<th>课程ID</th>
    		<th>课程讲师</th>
    		<th>上课时间</th>
    		<th>上课地点</th>
    		<th>限定人数</th>
    	</thead>
     <tr>
    	<?php while ($row_3 = mysql_fetch_array($re3)) {?>
	    <td><?php echo $num++ ?></td>
	    <td><?php echo $row_3['class_name']?></td>
		<td><?php echo $row_3['class_id']?></td>
		<td><?php echo $row_3['class_teacher']?></td>
		<td><?php echo $row_3['class_day']?> / <?php echo $row_2['class_time']?></td>
		<td><?php echo $row_3['class_room']?></td>
		<td><?php echo $row_3['class_number']?></td>	
	  </tr> 
	<?php } ?> 
    </table>
</div>
   <!--------查看选课人数--------->
    <div id="chakan" style="display: none;">
		<div class="sousuo">
    		<form>
    			<input type="text" name="chakan_" id="chakan_" placeholder="输入课程ID..."> 
    			<button onclick="ck()">搜索</button> 
    		</form>
    	</div> 
    	<br>
    	<div id="chakan_1">
    		<?php 
    		   $q41 =  "SELECT distinct timetable_cname,timetable_cid
	                   FROM timetable
	                   ";
	           $re41 = mysql_query($q41);
	           while ($r41 = mysql_fetch_array($re41)) {
    		?>
    		<h3><?php echo $r41['timetable_cname'] ?></h3>
    		<table>
    			<thead>
    		        <th>学生姓名</th>
    		        <th>学生学号</th>
    		        <th>所属学院</th>
    		        <th>专业班级</th>
    		        <th>联系电话</th>
    	        </thead>
    			<?php $tcid = $r41['timetable_cid'];
    				$q42 = "SELECT *
	                        FROM timetable
	                        WHERE timetable_cid = $tcid";
	                $re42 = mysql_query($q42);
	                while($r42 = mysql_fetch_array($re42)) {
	                	$tuid = $r42['timetable_uid'];
	                	$q_4 = "
	                	    SELECT *
	                        FROM users
	                        WHERE uid = $tuid ";
	                    $re_4 = mysql_query($q_4);
	                    $row_4 = mysql_fetch_array($re_4);
    				?>
    				<tr>
    					<td><?php echo $row_4['uname'];?></td>
    					<td><?php echo $row_4['uid'];?></td>
    					<td><?php echo $row_4['ucollege'];?></td>
    					<td><?php echo $row_4['uclass'];?></td>
    					<td><?php echo $row_4['uphone'];?></td>
    				</tr>
    			<?php } ?>
    		</table>
            <?php } ?>
    	</div>

    </div>
</div>
















<div id="notice_guanli" style="display: none;">
	<form name="add_notice" action="admin/add_notice.php" method="POST">
		<label for="">课程名称：</label><br/><textarea name="no_des" id="no_des" placeholder="请输入通知简介" required="required"></textarea>
		<br/>
		<label for="">详情链接：</label><br/><textarea name="no_url" id="no_url" placeholder="请输入该通知对应的跳转链接" required="required"></textarea>
		<br/>
		<label for="">公告编号：</label><br/><input type="text" name="no_id" id="no_id" placeholder="请输入该公告编号" required="required"><br/>
		<button type="submit">发布公告</button>
	</form>
</div>
<!-----置顶按钮------>
<div>
	<img src="/xuankeke/main/mainimage/up.png" onclick="backtop()" id="backtop">
</div>

</body>

</html>