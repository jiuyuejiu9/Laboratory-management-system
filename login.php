<?php
    session_start();
    $code = strtolower($_SESSION['code']);
	if(strtolower($_POST['usercode'])==$code)
    {
        header("Content-type: text/html; charset=utf-8");
        $username = $_POST['userid'];
        $password = $_POST['password'];
        $conn = mysql_connect('localhost','root','44448888')or die('连接数据库失败');
        mysql_select_db("lims",$conn)or die('选择数据库失败');
        $sql = "SELECT * FROM administrator WHERE a_id = $username and a_password = $password";
        $result = mysql_query($sql);
        $num = mysql_num_rows($result);
        if ($num) {
        	echo '<script>alert("管理员成功");</script>';
        	header("location:index1.html");
        } else {
        	$conn = mysql_connect('localhost','root','44448888')or die('连接数据库失败');
        	mysql_select_db("lims",$conn)or die('选择数据库失败');
        	$sql2 = "SELECT * FROM user WHERE u_id = $username and u_passwd = $password";
        	$result2 = mysql_query($sql2);
        	$num2 = mysql_num_rows($result2);
        	if ($num2) {
        		echo '<script>alert("登录成功");</script>';
        		header("location:index2.html");
        	} else {
        		echo '<script>alert("用户名或密码错误！");location.href="'.$_SERVER["HTTP_REFERER"].'";</script>';
        	}
        	echo '<script>alert("用户名或密码错误！");location.href="'.$_SERVER["HTTP_REFERER"].'";</script>';
        }
        mysql_close($conn);
    } 
	else{
		echo '<script>alert("验证码输入错误！");location.href="'.$_SERVER["HTTP_REFERER"].'";</script>';
	}
?>