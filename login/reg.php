<?php
   require '../config.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-type" content="text/html" charset="utf-8">
<title>选课课</title>
<link rel="stylesheet" type="text/css" href="../login/reg.css">
</head>

<body>
<div id="fulltop">
	<div id="top">
		<nav>
			<ul>
				<li id="xuan1">选课课
                <div id="xuan">欢迎来到"选课课"——学生选课系统平台!</div>
				</li>
				<li><a href="http://localhost/xuankeke/index.php">首页</a></li>
				<li>客服</li>		
				<li>关于我们</li>			
			</ul>
		</nav>
	</div>
</div>

<div id="con">
	<h2>注册</h2>
	<form method="post" action="checkreg.php" name="form_reg">
		<input type="email" name="email" id="email" placeholder="邮箱">
		<input type="text" name="uid" id="uid" placeholder="学号">
		<input type="text" name="phone" id="phone" placeholder="手机号码">
		<input type="text" name="uname" id="uname" placeholder="昵称">
		<input type="password" name="pword1" id="pword1" placeholder="密码">
		<input type="password" name="pword2" id="pword2" placeholder="确认密码">
		
		<br/>
		<button type="submit" onclick="return check()">注册</button>
	</form>
	

	 <div class="change-box login-change">
        <div class="change-btn toSign">
               <a href="http://localhost/xuankeke/login/index.php">去登录</a>
        </div>
     </div>
</div>
</body>

<script type="text/javascript">
 function check(){

 	        //检测学号是否为空
              if (document.form_reg.uid.value == "") {
                alert("请输入学号！");
                document.form_reg.uid.focus();
               return false;
              }
              //检测学号格式
              var uuid = document.form_reg.uid.value;
              var c=/^20\d{10}$/;
                  if (!(c.test(uuid))) {
                    alert("学号格式错误!");
                    document.getElementById("uid").value = "";
                    document.form_reg.uid.focus();
                    return false;
                  }

 	         //检测手机号是否为空
              if (document.form_reg.phone.value == "") {
                alert("请输入手机号！");
                document.form_reg.phone.focus();
               return false;
              }
              //检测手机号格式
              var uphone = document.form_reg.phone.value;
              var c=/^1[34578]\d{9}$/;
                  if (!(c.test(uphone))) {
                    alert("手机号格式错误!");
                    document.getElementById("phone").value = "";
                    document.form_reg.phone.focus();
                    return false;
                  }


            //检测昵称是否为空
              if (document.form_reg.uname.value == "") {
                alert("请输入昵称！");
                document.form_reg.uname.focus();
               return false;
              }
              //检测昵称格式
              var uname = document.form_reg.uname.value;
              var b=/^.{2,16}$/;
                  if (!(b.test(uname))) {
                    alert("昵称应由2~16个字符组成!");
                    document.getElementById("uname").value = "";
                    document.form_reg.uname.focus();
                    return false;
                  }



             //密码
              if (document.form_reg.pword1.value == "") {
                alert("请输入密码！");
                document.form_reg.pword1.focus();
              return false;
              }
              //检测密码格式
              var upword1 = document.form_reg.pword1.value;
              var a=/^.*(?=.{6,16})(?=.*\d)(?=.*[a-zA-Z]).*$/;
              if (!(a.test(upword1))) {
                alert("密码应由6~16个任意数字和字母组成！");
                document.getElementById("pword1").value = "";
                document.form_reg.pword1.focus();
                return false;
              }
             //输入确认密码
             if (document.form_reg.pword2.value == "") {
                alert("请确认密码！");
                document.form_reg.pword2.focus();
               return false;
              }

              //检测密码是否一致
              if (document.form_reg.pword1.value != document.form_reg.pword2.value) {
                alert("密码不一致！");
                document.getElementById("pword2").value = "";
                document.form_reg.pword2.focus();
               return false;
              }


    }
</script>

</html>