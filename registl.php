<?php
    header("Content-type: text/html; charset=utf-8");
    $userid = $_POST['userid'];
    $password = $_POST['password'];
	$username = $_POST['username'];

	$conn = mysql_connect('localhost','root','44448888')or die('连接数据库失败');
	mysql_select_db("lims",$conn)or die('选择数据库失败');
	$sql = "INSERT INTO `laboratory` (`id`, `name`, `classnum`, `information`) VALUES (NULL, '$userid', '$password', '$username');";
	$result = mysql_query($sql);
	$num = mysql_affected_rows();
	echo "<br>";
	echo $num;
	if ($num>0) {
		echo '<script>alert("实验室添加成功");location.href="'.$_SERVER["HTTP_REFERER"].'";</script>';
	} else {
		echo '<script>alert("实验室添加失败");history.go(-1);</script>';
	}
	mysql_close($conn);
?>