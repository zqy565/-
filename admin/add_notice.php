<?php 
	session_start();
	require '../config.php';
	
		$no_des = $_POST['no_des'];
		$no_url = $_POST['no_url'];
		$no_id = $_POST['no_id'];

		$addnotice = "INSERT INTO notice(`notice_des`,`notice_url`,`notice_id`)
				             VALUES('$no_des','$no_url','$no_id')
		";
		$re_addn = mysql_query($addnotice)or die(mysql_error());

		if($re_addn){
			echo('<script type:"text/javascript">
					alert("发布成功！");
					window.history.back(-1);
				</script>'
				);
			}
		else{
			echo('<script type:"text/javascript">
					alert("发布失败！");
					window.history.back(-1);
		   		</script>');
		}

 ?>