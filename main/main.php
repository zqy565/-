<?php 
  require 'config.php';
  session_start();
  error_reporting(5);

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-type" content="text/html" charset="utf-8">
<title>选课课</title>
<link rel="stylesheet" type="text/css" href="main/main1.css">
<link rel="stylesheet" type="text/css" href="main/main2.css">
</head>

<body>
<div id="page1">
	<div id="text1">
		<h1>WELCOME TO</h1>
		<br/>
		<div> <h2> 选 </h2><h2> 课 </h2><h2> 课 </h2></div>
		<br/><br/><br/>
		<p>— 学 生 选 课 系 统 平 台 —</p>
	</div>
</div>

<div id="page2">
	<div class="line"></div>
	<div id="scricon"></div>
	<div class="scroll">
		<?php 
		$qu_no1 = "
		SELECT *
		FROM notice
		";
		$re_no1 = mysql_query($qu_no1);
		$row_no = mysql_fetch_array($re_no1);
		?>
	    <div class="scr">
	    	<?php echo $row_no['notice_des']; ?>
	    </div>
	</div>  
</div>

<div id="page3">
	<div class="title"> — 课 程 分 类 —</div>
	<div class="fenlei">
		<a href="http://localhost/xuankeke/sort.php?typekey_id=计算机">
		<h3>计算机</h3>
		<p>c语言 数据库 JAVA PHP 数据结构...</p>
		</a>
	</div>
	<div class="fenlei">
		<a href="http://localhost/xuankeke/sort.php?typekey_id=外语">
		<h3>外语</h3>
		<p>英语 商务英语 日语 法语 西班牙语...</p>
	    </a>
	</div>
	<div class="fenlei">
		<a href="http://localhost/xuankeke/sort.php?typekey_id=理学">
		<h3>理学</h3>
		<p>电磁学 光学 放射化学 高数...</p>
		</a>		
	</div>
	<div class="fenlei">
		<a href="http://localhost/xuankeke/sort.php?typekey_id=工学">
		<h3>工学</h3>
		<p>材料 机械 土建水利 电气信息...</p>
		</a>
	</div>
	<div class="fenlei">
		<a href="http://localhost/xuankeke/sort.php?typekey_id=经济管理">
		<h3>经济管理</h3>
		<p>经济 金融 会计 管理...</p>
	    </a>
	</div>
	<div class="fenlei">
		<a href="http://localhost/xuankeke/sort.php?typekey_id=心理学">
		<h3>心理学</h3>
		<p>社会心理学 理论与技术...</p>
	    </a>
	</div>
	<div class="fenlei">
		<a href="http://localhost/xuankeke/sort.php?typekey_id=文史哲">
		<h3>文史哲</h3>
		<p>文学文化 新闻传播 哲学 历史...</p>
	    </a>
	</div>
	<div class="fenlei">
		<a href="http://localhost/xuankeke/sort.php?typekey_id=艺术设计">
		<h3>艺术设计</h3>
		<p>美术学 设计学 戏剧与影视 音乐...</p>
	    </a>
	</div>
	<div class="fenlei">
		<a href="http://localhost/xuankeke/sort.php?typekey_id=医药卫生">
		<h3>医药卫生</h3>
		<p>临床医学 口腔 药学 护理...</p>
	    </a>
	</div>
	<div class="fenlei">
		<a href="http://localhost/xuankeke/sort.php?typekey_id=法学">
		<h3>法学</h3>
		<p>法学 思政 社会...</p>
	    </a>
	</div>
	<div class="fenlei">
		<a href="http://localhost/xuankeke/sort.php?typekey_id=物理实验">
		<h3>物理实验</h3>
		<p>测量电子荷数 干涉法 霍尔效应...</p>
	    </a>
	</div>
	<div class="fenlei">
		<a href="http://localhost/xuankeke/sort.php?typekey_id=体育运动">
		<h3>体育运动</h3>
		<p>羽毛球 田径 棒球 瑜伽...</p>
	    </a>
	</div>
</div>


<div id="page4">
	<div id="xuanxiu">
		<div class="title"> — 选 修 课 程 —</div>
		<div class="xuanxiu_item">
			<?php 
			    $sql = "
 							SELECT *
 							FROM class
 							WHERE class_xuan = 1;
					";
				$result = mysql_query($sql);
				$row = mysql_fetch_array($result);
			?>

			<?php for($j=0;$j<2;$j++){ ?>
			<ul>
				<?php for($i=0;$i<4;$i++){ ?>
					<li>
						<a href="detail.php?key_id=<?php echo $row['class_id']; ?>" target="_blank">
						<div class="img">
	 						<img src="<?php echo $row['class_pic']; ?>" alt="">
	 					</div>
	 					<div class="info">
	 						<h5><?php echo $row['class_name'];?></h5>
	 					    <p><?php echo $row['class_day']; ?>
	 					     第<?php echo $row['class_time'];?>节课
	 					    </p>
	 					</div>
	 					</a>
					</li>
					<?php $result++; $row = mysql_fetch_array($result); ?>
				<?php } ?>
			</ul>
			<?php } ?>
		</div>
		<div class="more"><a href="#" target="_blank">更多>></a></div>
	</div>


<!--               体育课              -->
	<div id="tiyu">
		<div class="title"> — 必 修 体 育 —</div>
		<div class="tiyu_item">
			<?php 
			    $sql = "
 							SELECT *
 							FROM class
 							WHERE class_type = '体育运动';
					";
				$result = mysql_query($sql);
				$row = mysql_fetch_array($result);
			?>

			<?php for($j=0;$j<2;$j++){ ?>
			<ul>
				<?php for($i=0;$i<4;$i++){ ?>
					<li>
						<a href="detail.php?key_id=<?php echo $row['class_id']; ?>" target="_blank">
						<div class="img">
	 						<img src="<?php echo $row['class_pic']; ?>" alt="">
	 					</div>
	 					<div class="info">
	 						<h5><?php echo $row['class_name'];?></h5>
	 					</div>
	 					</a>
					</li>
					<?php $result++; $row = mysql_fetch_array($result); ?>
				<?php } ?>
			</ul>
			<?php } ?>
		</div>
		<div class="more"><a href="#" target="_blank">更多>></a></div>
	</div>



	<div id="shiyan">
		<div class="title"> — 物 理 实 验 —</div>
		<div class="shiyan_item">
			<?php 
			    $sql = "
 							SELECT *
 							FROM class
 							WHERE class_type = '物理实验';
					";
				$result = mysql_query($sql);
				$row = mysql_fetch_array($result);
			?>

			<?php for($j=0;$j<2;$j++){ ?>
			<ul>
				<?php for($i=0;$i<4;$i++){ ?>
					<li>
						<a href="detail.php?key_id=<?php echo $row['class_id']; ?>" target="_blank">
	 					<div class="info">
	 						<h5><?php echo $row['class_name'];?></h5>
	 					    <p><?php echo $row['class_day']; ?>
	 					     第<?php echo $row['class_time'];?>节课
	 					    </p>
	 					</div>
	 					</a>
					</li>
					<?php $result++; $row = mysql_fetch_array($result); ?>
				<?php } ?>
			</ul>
			<?php } ?>
		</div>
		<div class="more"><a href="#" target="_blank">更多>></a></div>
	</div>







<!--             推荐课程           -->
	<div id="tuijian">
		<div class="title"> — 优 质 推 荐 —</div>
				<?php 
					$sql = "
 							SELECT *
 							FROM class
 							WHERE class_hot = 1;
					";
					$result = mysql_query($sql);

				 ?>
				<?php while ($row = mysql_fetch_array($result)) {?>
 			
 				<div class="tuijian_item">
 					<a href="detail.php?key_id=<?php echo $row['class_id']; ?>" target="_blank">
						<div class="img">
	 						<img src="<?php echo $row['class_pic']; ?>" alt="">
	 					</div>
	 					<div class="info">
	 						<h5><?php echo $row['class_name'];?></h5>
	 					    <p><?php echo $row['class_day']; ?>
	 					     第<?php echo $row['class_time'];?>节课
	 					    </p>
	 					</div>
	 					</a>
 				</div>
 			
 		       <?php } ?> 
	</div>


</div>


<div>
	<img src="/xuankeke/main/mainimage/up.png" onclick="backtop()" id="backtop">
</div>


</body>

<script type="text/javascript">
function backtop() {
  var c = document.documentElement.scrollTop || document.body.scrollTop;

  if (c > 0) {
    window.requestAnimationFrame(backtop);
    window.scrollTo(0, c - c / 8);
  }
}
</script>
</html>