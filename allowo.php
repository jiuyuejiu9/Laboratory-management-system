<?php
	$uid= $_GET[onum];
	$conn = mysql_connect('localhost','root','44448888')or die('连接数据库失败');
	mysql_select_db("lims",$conn)or die('选择数据库失败');
		$sql = "INSERT INTO `la_use`( `userid`, `laboratoryid`, `usedata`, `stopdata`, `data`) SELECT o_user, o_labratory,ouse_data,ostop_data,data FROM `la_order` WHERE num=$uid";
		$result = mysql_query($sql);
		$num = mysql_affected_rows();
		echo "<br>";
		if ($num!=0) {
			    $conn = mysql_connect('localhost','root','44448888')or die('连接数据库失败');
			    mysql_select_db("lims",$conn)or die('选择数据库失败');
				$sql2 = "DELETE FROM `la_order` WHERE num=$uid";
				$result2 = mysql_query($sql2);
				$num2 = mysql_affected_rows();
			    echo '<script>alert("添加成功");location.href="'.$_SERVER["HTTP_REFERER"].'";</script>';
		} else {
			echo '<script>alert("添加失败");</script>';
		}
		mysql_close($conn);
?>
