<?php
    header("Content-type: text/html; charset=utf-8");
    $userid = $_POST['userid'];
    $lid = $_POST['l_id'];
	$startime = $_POST['startime'];
	$stoptime = $_POST['stoptime'];

	$conn = mysql_connect('localhost','root','44448888')or die('连接数据库失败');
	mysql_select_db("lims",$conn)or die('选择数据库失败');
	$sql = "INSERT INTO `la_order` (`num`, `o_user`, `o_labratory`, `ouse_data`, `ostop_data`, `data`) 
	VALUES (NULL, '$userid', '$lid', '$startime', '$stoptime', CURRENT_TIMESTAMP);";
	$result = mysql_query($sql);
	$num = mysql_affected_rows();
	if ($num>0) {
		echo '<script>alert("预约成功");location.href="'.$_SERVER["HTTP_REFERER"].'";</script>';
	} else {
		echo '<script>alert("预约失败");history.go(-1);</script>';
	}
	mysql_close($conn);
?>