<?php
   require '../config.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-type" content="text/html" charset="utf-8">
<title>选课课</title>
<link rel="stylesheet" type="text/css" href="../login/logindex.css">
<script src="http://apps.bdimg.com/libs/jquery/1.6.4/jquery.js"></script>
</head>

<body>
<div id="fulltop">
	<div id="top">
		<nav>
			<ul>
				<li>选课课
                <div id="xuan">欢迎来到"选课课"——学生选课系统管理后台!</div>
				</li>
				<li><a href="http://localhost/xuankeke/index.php">首页</a></li>	
				<li><a href="http://localhost/xuankeke/login/index.php">前往学生登录</a></li>		
			</ul>
		</nav>
	</div>
</div>

<div id="con">
	<h2>管理员登录</h2>
	<form method="post" action="checkadmin.php">
		<input type="email" name="email" id="email" placeholder="E-mail">
		<input type="password" name="pword" id="pword" placeholder="Password">
		<br/>
		<button type="submit">登录</button>
	</form>
	
</div>
</body>

<script type="text/javascript">
	$(document).ready(function(){
		$("#con").hover(function(){
			$("#toAdmin").slideToggle("500");
		})
	})
</script>

</html>