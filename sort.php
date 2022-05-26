<?php   
  require 'config.php';
  session_start();
  error_reporting(5);

   ob_start();
   $type_id = $_GET['typekey_id'];
			$sql = "
			SELECT * 
			FROM class 
			WHERE class_type = '$type_id'
				";
			$result_type = mysql_query($sql)or die('error:'.mysql_error());

 ?>

 <!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-type" content="text/html" charset="utf-8">
<title>选课课</title>
<link rel="stylesheet" type="text/css" href="sort/sort.css">
<script src="http://apps.bdimg.com/libs/jquery/1.6.4/jquery.js"></script>
</head>

<body>
	<?php require 'top.php';?>	
    <div id="sortline"></div>
	<div id="sort">
	    <ul>
	    <a href="http://localhost/xuankeke/sort.php?typekey_id=计算机">
	    	    <li id="ji01" class="ouli">计算机</li>
	    </a>
	    <a href="http://localhost/xuankeke/sort.php?typekey_id=外语">
	    	<li id="wai02">外语</li>
	    </a>
	    <a href="http://localhost/xuankeke/sort.php?typekey_id=理学">
	    	<li id="li03" class="ouli">理学</li>
	    </a>
	    <a href="http://localhost/xuankeke/sort.php?typekey_id=工学">
	    	<li id="gong04">工学</li>
	    </a>
	    <a href="http://localhost/xuankeke/sort.php?typekey_id=经济管理">
	    	<li id="jing05"class="ouli">经济管理</li>
	    </a>
	    <a href="http://localhost/xuankeke/sort.php?typekey_id=心理学">
	    	<li id="xin06">心理学</li>
	    </a>
	    <a href="http://localhost/xuankeke/sort.php?typekey_id=文史哲">
	    	<li id="wen07"class="ouli">文史哲</li>
	    </a>
	    <a href="http://localhost/xuankeke/sort.php?typekey_id=艺术设计">
	    	<li id="yi08">艺术设计</li>
	    </a>
	    <a href="http://localhost/xuankeke/sort.php?typekey_id=医药卫生">
	    	<li id="yi09"class="ouli">医药卫生</li>
	    </a>
	    <a href="http://localhost/xuankeke/sort.php?typekey_id=法学">
	    	<li id="fa10">法学</li>
	    </a>
	    <a href="http://localhost/xuankeke/sort.php?typekey_id=物理实验">
	    	<li id="wu11"class="ouli">物理实验</li>
	    </a>
	    <a href="http://localhost/xuankeke/sort.php?typekey_id=体育运动">
	    	<li id="ti12">体育运动</li>
	    </a>
	    </ul>		
	</div>

	<div id="sortname">
		<div id="abox"></div>
		<p><?php echo $type_id ?></p>
	</div>

	<div>
		<div class="show">
 		<?php while ($row_type = mysql_fetch_array($result_type)) {?>
 			
 				<div class="item">
 					<a href="detail.php?key_id=<?php echo $row_type['class_id']; ?>" target="_blank">
 						
	 					<img src="<?php echo $row_type['class_pic']; ?>" alt="">
	 						<p class="name"><?php echo $row_type['class_name']; ?></p>
	 						<p class="day">
	 							<?php 
	 							echo $row_type['class_day'];?>
	 							 第<?php echo $row_type['class_time'];
	 						    ?>节课
	 						</p>
	 						<p class="teacher"><?php echo $row_type['class_teacher']; ?></p>
                        <span class="type">#<?php echo $row_type['class_type']; ?>#</span>
 					</a>
 				</div>
 			
 		<?php } ?>
 	    </div>
 	</div>
</body>


<script type="text/javascript">
</script>
</html>