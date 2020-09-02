<?php
    header("Content-type: text/html; charset=utf-8");
    $userid = $_POST['userid'];
    $password = $_POST['password'];
	$username = $_POST['username'];
	$usersex = $_POST['usersex'];
	$userage = $_POST['userage'];
	$useridentity = $_POST['useridentity'];
	$usertel = $_POST['usertel'];
	$useradd = $_POST['useradd'];
	$conn = mysql_connect('localhost','root','44448888')or die('连接数据库失败');
	mysql_select_db("lims",$conn)or die('选择数据库失败');
	$sql = "INSERT INTO `user`(`u_id`, `u_passwd`, `u_name`, `u_sex`, `u_age`, `u_identity`, `u_tel`, `u_add`) 
	VALUES ($userid,$password,'$username',$usersex,$userage,$useridentity,$usertel,'$useradd')";
	$result = mysql_query($sql);
	$num = mysql_affected_rows();
	echo "<br>";
	echo $num;
	if ($num>0) {
		echo '<script>alert("注册成功");location.href="'.$_SERVER["HTTP_REFERER"].'";</script>';
	} else {
		echo '<script>alert("注册失败");history.go(-1);</script>';
	}
	mysql_close($conn);
?>