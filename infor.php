<?php
    header("Content-type: text/html; charset=utf-8");
	$b_num1 = $_POST['b_num1'];
    $b_declarant1 = $_POST['b_declarant1'];
    $b_laboratory1 = $_POST['b_laboratory1'];
	$b_title1 = $_POST['b_title1'];
	$b_information1 = $_POST['b_information1'];
	$conn = mysql_connect('localhost','root','44448888')or die('连接数据库失败');
	mysql_select_db("lims",$conn)or die('选择数据库失败');
	$sql = "INSERT INTO `brake` (`b_id`, `b_num`, `b_declarant`, `b_laboratory`, `b_title`, `b_information`) VALUES (NULL, '$b_num1', '$b_declarant1', '$b_laboratory1', '$b_title1', '$b_information1');";
	$result = mysql_query($sql);
	$num = mysql_affected_rows();
	if ($num>0) {
		echo '<script>alert("提交成功成功");location.href="'.$_SERVER["HTTP_REFERER"].'";</script>';
	} else {
		echo '<script>alert("提交失败");history.go(-1);</script>';
	}
	mysql_close($conn);
?>