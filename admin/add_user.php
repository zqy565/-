<?php 
	session_start();
	require '../config.php';
	
		$uname = $_POST['uname'];
		$uid = $_POST['uid'];
		$uemail = $_POST['uemail'];
		$uphone = $_POST['uphone'];
		$ucollege = $_POST['ucollege'];
		$uclass = $_POST['uclass'];
		$upassword = $_POST['upassword'];

		$upassword=md5($upassword);

		$adduser = "INSERT INTO users(`uid`,`uemail`,`upassword`,`uname`,`uphone`,`ucollege`,`uclass`)
				             VALUES('$uid','$uemail','$upassword','$uname','$uphone','$ucollege','$uclass')
		";
		$re_addu = mysql_query($adduser)or die(mysql_error());

		if($re_addu){
			echo('<script type:"text/javascript">
					alert("添加成功！");
					window.history.back(-1);
				</script>'
				);
			}
		else{
			echo('<script type:"text/javascript">
					alert("添加失败！");
					window.history.back(-1);
		   		</script>');
		}

 ?>