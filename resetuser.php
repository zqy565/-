<?php 
	
	session_start();
	require 'config.php';
	if (isset($_SESSION['login'])) {
		$userlogin = $_SESSION['login'];
		$uname = $_POST['uname'];
		$uemail = $_POST['uemail'];
		$uphone = $_POST['uphone'];
		$uid = $_POST['uid'];
		$ucollege = $_POST['ucollege'];
		$uclass = $_POST['uclass'];

		$sql = "
				UPDATE users
				SET
				uname = '$uname',
				uemail = '$uemail',
				uphone = '$uphone',
				uid = '$uid',
				ucollege = '$ucollege',
				uclass = '$uclass'
				WHERE uemail = '$userlogin'
		";

		$result = mysql_query($sql)or die(mysql_error());
		if (mysql_affected_rows($config)) {
			mysql_close($config);
			echo('<script>
					alert("修改成功！");
					window.history.back(-1);
				</script>');
		}
	}
 ?>