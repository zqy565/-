<?php
  require '../config.php';
  session_start();
  error_reporting(5);

$arr = $_POST["ids"];

$str = implode("','",$arr);//拼接字符，
$sql = "delete from class WHERE class_id in('{$str}')";

if(mysql_query($sql))//判断是否查询成功，
{
	echo('<script>
				alert("删除成功！");
				window.history.back(-1);
				</script>');
    //成功就跳转
}
?>