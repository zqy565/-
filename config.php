<?php
header('Content-Type:text/html;charset=utf-8');
error_reporting(0);
@define('HOST','localhost');
@define('USER','root');
@define('PWD', '123456');
@define('NAME','xuankeke');
//phpMyadmin用户名密码
$config=@mysql_connect(HOST,USER,PWD) or die("错误类型：".mysql_error());
mysql_select_db(xuankeke,$config) or die("错误".mysql_error());
mysql_query('SET NAMES UTF8') or die("错误".mysql_error());
?>