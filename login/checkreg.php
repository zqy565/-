<?php 
	session_start();
	require '../config.php';
	error_reporting(5);


				error_reporting(0);
				
				$email=$_POST['email'];
				$id=$_POST['uid'];
				$phone=$_POST['phone'];
				$name=$_POST['uname'];
				$pword=$_POST['pword1'];
				
				
                 $pword = md5($pword);
                /*禁止相同邮箱注册*/
                $query0 = "
                   SELECT *
                   FROM users
                   WHERE `uemail` = '$email'
                ";
                $result0 = mysqli_query($config,$query0);
                
                	$row = mysqli_fetch_array($result0);
                	if ($row) {
                		echo('<script type:"text/javascript">
                                alert("该邮箱已被注册，请重新注册！");
                                window.history.back(-1);
                			</script>');
                	    }
              

	                else{	
				        
									$query = "
					                	INSERT INTO users(`uid`,`uemail`,`upassword`,`uname`,`uphone`)
					                	VALUES ('$id','$email','$pword','$name','$phone')
									";
									$result = mysql_query($query);
							        echo $query;
									if($result){
										echo('<script type:"text/javascript">
						                         alert("注册成功！");
						                         window.location.href = "http://localhost/xuankeke/login/index.php";
											</script>'
										    );

									}
									else{
										echo('<script type:"text/javascript">
					                        	alert("注册失败！");
					                        	window.history.back(-1);
											</script>');
								    }
							
						}  
				
				mysqli_close($config);
 ?>