<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<form name="frml" method="post">
			<table align="center">
				<tr>
					<td width="120"><span class="STYLEI">根据账号查询：</span></td>
					<td>
						<input name="KCNumber" id="KCNumber" type="tel" size="10" />
						<input type="submit" name="test" value="查找"/>
					</td>
				</tr>
			</table>
		</form>
		<?php
		$conn = mysql_connect('localhost','root','44448888')or die('连接数据库失败');
		mysql_select_db("lims",$conn)or die('选择数据库失败');
		$KCNumber=$_POST['KCNumber'];
		$sql = "SELECT * FROM user WHERE u_id = $KCNumber ";
		$result = mysql_query($sql);
		$row =@mysql_fetch_array($result);
		if(($KCNumber!==null)&&(!$row)){
			echo '<script>alert("用户名或密码错误！");</script>';
		}
		?>
		<form name="frm2" method="post">
			<table bgcolor="aquamarine" border="1" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td bgcolor="brown" width="200"><span class="STYLEI">账号：</span></td>
					<td>
						<input name="KCNum" type="text" class="" value="<?php echo $row['u_id'] ;?>"/>
						<input name="h_KCNum" type="hidden" value="<?php echo $row['u_id'] ;?>" />
					</td>
				</tr>
				<tr>
					<td bgcolor="brown" width="90"><span class="STYLEI">密码：</span></td>
					<td>
						<input name="KCName" type="text" class="" value="<?php echo $row['u_passwd'] ;?>"/>
					</td>
				</tr>
				<tr>
					<td align="center" colspan="2" bgcolor="cornflowerblue">
						<input name="b" type="submit" value="修改" />&nbsp;
						<input name="b" type="submit" value="删除" />&nbsp;
						<input name="b" type="submit" value="添加" />&nbsp;
					</td>
				</tr>
			</table>
		</form>
	</body>
</html>
<?php
    $conn = mysql_connect('localhost','root','44448888')or die('连接数据库失败');
    mysql_select_db("lims",$conn)or die('选择数据库失败');
    $KCH=@$_POST['KCNum'];
	$h_KCH=@$_POST['h_KCNum'];
	$KCM=@$_POST['KCName'];
	if(@$_POST["b"]=='修改'){
		$sql = "UPDATE `user` SET `u_passwd`=$KCM WHERE u_id=20168888";
		$result = mysql_query($sql);
		$num = mysql_affected_rows();
		echo "<br>";
		if ($num!=0) {
			echo '<script>alert("注册成功");</script>';
		} else {
			echo '<script>alert("注册失败");</script>';
		}
		mysql_close($conn);
	}
?>