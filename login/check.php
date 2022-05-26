<?php 
    session_start();
    require '../config.php';
    error_reporting(5);

                     $email = $_POST['email'];
                     $pword = $_POST['pword'];

                   if ($email == null || $pword == null) {
                     	echo('<script type="text/javascript">
                                alert("邮箱或密码不能为空！");
                                window.history.back(-1);
                                </script>
                                ');
                     }

                    $pword = md5($pword);
                    //将注册的密码进行md5加密并插入users数据表中
                    $query = "SELECT * 
                    FROM users 
                    WHERE `uemail` = '$email'
                    AND `upassword` = '$pword'
                    ";

                    $result = mysql_query($query);

                    $row = mysql_fetch_array($result);

                    	if ($row) {
                    		//获取并返回登录之前访问的页面地址$_SESSION['userurl']
                    		if (isset($_SESSION['userurl'])) {

                    			$url = $_SESSION['userurl'];
                                header("location:$url");
                               
                    		}
                    		else
                    		{
                    			echo ('<script type="text/javascript">
                                    alert("登录成功");
                                    window.location.href = "../main/main.php";
                                    </script>');                   
                    		}

                    		$_SESSION['login'] = $email;
                    		$_SESSION['uname'] = $row['uname'];
                            
                    		exit;
                    	}
                    	else{
                    		echo('<script type="text/javascript">
                                alert("账号或密码错误");
                                window.history.back(-1);
                                </script>
                    			');
                    	}

                    

 ?>


