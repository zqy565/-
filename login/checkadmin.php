<?php 
    session_start();
    require '../config.php';
    error_reporting(5);

                     $aemail = $_POST['email'];
                     $apword = $_POST['pword'];

                   if ($aemail == null || $apword == null) {
                     	echo('<script type="text/javascript">
                                alert("邮箱或密码不能为空！");
                                window.history.back(-1);
                                </script>
                                ');
                     }

                    //将注册的密码进行md5加密并插入users数据表中
                    

                    $result_admin = mysql_query($query_admin);

                    $row_admin = mysql_fetch_array($result_admin);

                    	if ($row_admin) {
                    			echo ('<script type="text/javascript">
                                    alert("登录成功");
                                    window.location.href = "http://localhost/xuankeke/admin.php";
                                    </script>');                   
                    	}
                    	else{
                    		echo('<script type="text/javascript">
                                alert("账号或密码错误");
                                window.history.back(-1);
                                </script>
                    			');
                    	}

                    

 ?>