<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-type" content="text/html" charset="utf-8">
<title>选课课</title>
<link rel="stylesheet" type="text/css" href="search/search.css">
<link rel="stylesheet" type="text/css" href="../top/top.css">
</head>

<body>
<?php require 'top.php'; ?>
    
<?php 
		$search_result = $_GET['search'];
		if ($search_result != "") {
			$sql = "SELECT * 
					FROM class
					where class_name LIKE '%$search_result%' 					 
					OR class_teacher LIKE '%$search_result%' 
					OR class_day LIKE '%$search_result%'
					OR class_time LIKE '%$search_result%'
					OR class_pic LIKE '%$search_result%'
					OR class_type LIKE '%$search_result%'
					OR class_id LIKE '%$search_result%'
				";
			$result = mysql_query($sql)or die('error:'.mysql_error());
				
		}
		else{
			echo('<script type:"text/javascript">
				alert("尚未开设你所搜索的课程！");
				window.history.back(-1);
			 </script>'
				);
		}
?>

<div class="show">
 		<?php while ($row = mysql_fetch_array($result)) {?>
 			
 				<div class="item">
 					<a href="detail.php?key_id=<?php echo $row['class_id']; ?>" target="_blank">
 						
	 					<img src="<?php echo $row['class_pic']; ?>" alt="">
	 						<p class="name"><?php echo $row['class_name']; ?></p>
	 						<p class="day">
	 							<?php 
	 							echo $row['class_day'];?>
	 							 第<?php echo $row['class_time'];
	 						    ?>节课
	 						</p>
	 						<p class="teacher"><?php echo $row['class_teacher']; ?></p>
                        <span class="type">#<?php echo $row['class_type']; ?>#</span>
 					</a>
 				</div>
 			
 		<?php } ?>
 	</div>

<div>
	<img src="/xuankeke/main/mainimage/up.png" onclick="backtop()" id="backtop">
</div>

<?php require "foot/foot.php";?>
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