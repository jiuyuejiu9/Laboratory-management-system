<?php
	$uid= $_GET[laid];
	$conn = mysql_connect('localhost','root','44448888')or die('连接数据库失败');
	mysql_select_db("lims",$conn)or die('选择数据库失败');
		$sql = "DELETE FROM `la_use` WHERE num=$uid";
		$result = mysql_query($sql);
		$num = mysql_affected_rows();
		echo "<br>";
		if ($num!=0) {
			echo '<script>alert("删除成功");location.href="'.$_SERVER["HTTP_REFERER"].'";</script>';
		} else {
			echo '<script>alert("删除失败");</script>';
		}
		mysql_close($conn);
?>