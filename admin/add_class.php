<?php 
	session_start();
	require '../config.php';
	
		$class_name = $_POST['class_name'];
		$class_type = $_POST['class_type'];
		$class_id = $_POST['class_id'];
		$class_pic = $_POST['class_pic'];
		$class_day = $_POST['class_day'];
		$class_time = $_POST['class_time'];
		$class_room = $_POST['class_room'];
		$class_teacher = $_POST['class_teacher'];
		$class_des = $_POST['class_des'];
		$class_number = $_POST['class_number'];
		$class_hot = $_POST['class_hot'];
		$class_xuan = $_POST['class_xuan'];

		$addclass = "INSERT INTO class(`class_type`,`class_name`,`class_teacher`,`class_day`,`class_time`,`class_pic`,`class_des`,`class_hot`,`class_xuan`,`class_room`,`class_number`,`class_id`)
				             VALUES('$class_type','$class_name','$class_teacher','$class_day','$class_time','$class_pic','$class_des','$class_hot','$class_xuan','$class_room','$class_number','$class_id')
		";
		$re_addc = mysql_query($addclass)or die(mysql_error());

		if($re_addc){
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