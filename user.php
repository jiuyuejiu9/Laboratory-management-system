<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" href="css/amazeui.min.css" />
		<link rel="stylesheet" href="css/admin.css" />
	</head>
    <script>
        function Show(){
            document.getElementById('shade').classList.remove('hide');
            document.getElementById('modal').classList.remove('hide');
        }
         function Hide(){
            document.getElementById('shade').classList.add('hide');
            document.getElementById('modal').classList.add('hide');
        }
		function Show2(){
		    document.getElementById('shade2').classList.remove('hide');
		    document.getElementById('modal2').classList.remove('hide');
		}
		 function Hide2(){
		    document.getElementById('shade2').classList.add('hide');
		    document.getElementById('modal2').classList.add('hide');
		}
		function InputCheck(LoginForm)
		{
		  if (LoginForm.userid.value == "")
		  {
		    alert("请输入用户名!");
		    LoginForm.userid.focus();
		    return (false);
		  }
		  if (LoginForm.password.value == "")
		  {
		    alert("请输入密码!");
		    LoginForm.password.focus();
		    return (false);
		  }
		  if (LoginForm.username.value == "")
		  {
		    alert("请输入姓名!");
		    LoginForm.username.focus();
		    return (false);
		  }
		  if (LoginForm.usersex.value == "")
		  {
		    alert("请输入性别!");
		    LoginForm.usersex.focus();
		    return (false);
		  }
		  if (LoginForm.userage.value == "")
		  {
		    alert("请输入年龄!");
		    LoginForm.userage.focus();
		    return (false);
		  }
		  if (LoginForm.useridentity.value == "")
		  {
		    alert("请输入身份证号!");
		    LoginForm.useridentity.focus();
		    return (false);
		  }
		  if (LoginForm.usertel.value == "")
		  {
		    alert("请输入联系电话!");
		    LoginForm.usertel.focus();
		    return (false);
		  }
		  if (LoginForm.useradd.value == "")
		  {
		    alert("请输入家庭住址!");
		    LoginForm.useradd.focus();
		    return (false);
		  }
		}
    </script>
	<style>
	    .hide{
	        display: none;
	    }
	    .c1{
	        position: fixed;
	        top:0;
	        bottom: 0;
	        left:0;
	        right: 0;
	        background: rgba(0,0,0,.5);
	        z-index: 2;
	    }
	    .c2{
	        background-color: white;
	        position: fixed;
	        width: 500px;
	        height: 550px;
	        top:20%;
	        left: 50%;
	        z-index: 3;
	        margin-top: -120px;
	        margin-left: -200px;
	    }
		#modal p {
			margin-left:80px;
		}
	</style>
	<body>
		<div class="admin-content-body">
			<div class="am-cf am-padding am-padding-bottom-0">
				<div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">用户管理</strong><small></small></div>
			</div>
			<hr>
			<div class="am-g">
				<div class="am-u-sm-12 am-u-md-6">
					<div class="am-btn-toolbar">
						<div class="am-btn-group am-btn-group-xs">
							<input type="button" value="新增" class="am-btn am-btn-default" onclick="Show();">
						</div>
						<div id="shade" class="c1 hide"></div>
						<div id="modal" class="c2 hide">
						   <fieldset>
						   	<legend>用户注册</legend>
								<form name="LoginForm" method="post" action="regist.php" onSubmit="return InputCheck(this)">
									<p>
										<label for="userid" class="label">账号:</label>
										<input id="userid" name="userid" type="text" class="input" />
									<p/>
									<p>
										<label for="password" class="label">密码:</label>
										<input id="password" name="password" type="password" class="input" />
									<p/>
									<p>
										<label for="username" class="label">姓名:</label>
										<input id="username" name="username" type="username" class="input" />
									<p/>
									<p>
										<label for="usersex" class="label">性别:</label>
<!-- 										<input id="usersex" name="usersex" type="usersex" class="input" /> -->
										<input type="radio" name="usersex" value="0" checked="checked" />男
										<input type="radio" name="usersex" value="1" checked="checked" />女	<br />
									<p/>
									<p>
										<label for="userage" class="label">年龄:</label>
										<input id="userage" name="userage" type="userage" class="input" />
									<p/>
									<p>
										<label for="useridentity" class="label">身份证号:</label>
										<input id="useridentity" name="useridentity" type="useridentity" class="input" />
									<p/>
									<p>
										<label for="usertel" class="label">联系电话:</label>
										<input id="usertel" name="usertel" type="usertel" class="input" />
									<p/>
									<p>
										<label for="useradd" class="label">家庭住址:</label>
										<input id="useradd" name="useradd" type="useradd" class="input" />
									<p/>
									<p>
										<input type="submit" name="submit" value="  确 定  " class="left" />
										<input type="button" value="取消注册" onclick="Hide();">
									</p>
								</form>
						   </fieldset>
						</div>
						
						<div class="am-btn-group am-btn-group-xs">
							<input type="button" value="查询" class="am-btn am-btn-default" onclick="Show2();">
						</div>
						
						<div id="shade2" class="c1 hide"></div>
						<div id="modal2" class="c2 hide">
						   <fieldset>
						   	<legend>用户查询</legend>
									<form name="frml" method="post">
										<table align="center">
											<tr>
												<td width="120"><span class="STYLEI">根据账号查询：</span></td>
												<td>
													<input name="KCNumber" id="KCNumber" type="tel" size="10" />
													<input type="submit" name="test" value="查找"/>
												    <input type="button" value="取消查询" onclick="Hide2();">
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
												<td  width="200"><span class="STYLEI">账号：</span></td>
												<td>
													<input name="KCNum" type="text" class="" value="<?php echo $row['u_id'] ;?>"/>
													<input name="h_KCNum" type="hidden" value="<?php echo $row['u_id'] ;?>" />
												</td>
											</tr>
											<tr>
												<td  width="90"><span class="STYLEI">密码：</span></td>
												<td>
													<input name="upasswd" type="text" class="" value="<?php echo $row['u_passwd'] ;?>"/>
												</td>
											</tr>
											<tr>
												<td  width="90"><span class="STYLEI">姓名：</span></td>
												<td>
													<input name="uname" type="text" class="" value="<?php echo $row['u_name'] ;?>"/>
												</td>
											</tr>
											<tr>
												<td  width="90"><span class="STYLEI">性别：</span></td>
												<td>
													<input name="usex" type="text" class="" value="<?php echo $row['u_sex'] ;?>"/>
												</td>
											</tr>
											<tr>
												<td  width="90"><span class="STYLEI">年龄：</span></td>
												<td>
													<input name="uage" type="text" class="" value="<?php echo $row['u_age'] ;?>"/>
												</td>
											</tr>
											<tr>
												<td  width="90"><span class="STYLEI">身份证号：</span></td>
												<td>
													<input name="uidentity" type="text" class="" value="<?php echo $row['u_identity'] ;?>"/>
												</td>
											</tr>
											<tr>
												<td  width="90"><span class="STYLEI">电话：</span></td>
												<td>
													<input name="utel" type="text" class="" value="<?php echo $row['u_tel'] ;?>"/>
												</td>
											</tr>
											<tr>
												<td  width="90"><span class="STYLEI">地址：</span></td>
												<td>
													<input name="uadd" type="text" class="" value="<?php echo $row['u_add'] ;?>"/>
												</td>
											</tr>
											<tr>
												<td align="center" colspan="2" bgcolor="cornflowerblue">
													<input name="b" type="submit" value="修改" />&nbsp;
													<input name="b" type="submit" value="删除" />&nbsp;
												</td>
											</tr>
										</table>
									<?php
									    $conn = mysql_connect('localhost','root','44448888')or die('连接数据库失败');
									    mysql_select_db("lims",$conn)or die('选择数据库失败');
									    $KCH=@$_POST['KCNum'];
										$h_KCH=@$_POST['h_KCNum'];
										$upasswd=@$_POST['upasswd'];
										$uname=@$_POST['uname'];
										$usex=@$_POST['usex'];
										$uage=@$_POST['uage'];
										$uidentity=@$_POST['uidentity'];
										$utel=@$_POST['utel'];
										$uadd=@$_POST['uadd'];
										if(@$_POST["b"]=='修改'){
											$sql = "UPDATE `user` SET `u_passwd`=$upasswd,`u_name`='$uname',`u_sex`=$usex,`u_age`=$uage,`u_identity`=$uidentity,`u_tel`=$utel,`u_add`='$uadd' WHERE u_id=$KCH";
											$result = mysql_query($sql);
											$num = mysql_affected_rows();
											echo "<br>";
											if ($num!=0) {
												echo '<script>alert("修改成功");</script>';
											} else {
												echo '<script>alert("修改失败");</script>';
											}
											mysql_close($conn);
										}
										if(@$_POST["b"]=='删除'){
											$sql = "DELETE FROM `user` WHERE u_id=$KCH";
											$result = mysql_query($sql);
											$num = mysql_affected_rows();
											echo "<br>";
											if ($num!=0) {
												echo '<script>alert("删除成功");</script>';
											} else {
												echo '<script>alert("删除失败");</script>';
											}
											mysql_close($conn);
										}
									?>
								</form>
						   </fieldset>
						</div>
						
						
					</div>
				</div>
				<div class="am-u-sm-12 am-u-md-3">
				</div>
			</div>
			<div class="am-g" style="overflow-y: auto; height: 50rem;">
				<div class="am-u-sm-12">
					<form class="am-form" method="get">
						<table class="am-table am-table-striped am-table-hover table-main">
							<thead>
								<tr>
									<th class="table-id">ID</th>
									<th class="table-title">姓名</th>
									<th class="table-type">密码</th>
									<th class="table-author am-hide-sm-only">性别</th>
									<th class="table-set">操作</th>
								</tr>
							</thead>
							<?php
							$conn = mysql_connect('localhost','root','44448888')or die('连接数据库失败');
							mysql_select_db("lims",$conn)or die('选择数据库失败');
							$sql = "SELECT * FROM user WHERE 1 ";
							$result = mysql_query($sql);
							$row =@mysql_fetch_array($result);
							if(($KCNumber!==null)&&(!$row)){
								echo '<script>alert("用户名或密码错误！");</script>';
							}
							?>
							<tbody>
								<?php
									while($row =mysql_fetch_array($result)){
										
										?>
										<tr>
											<td name="userid">
												<?php echo $row['u_id'] ;?>
											</td>
											<td>
												<?php echo $row['u_name'] ;?>
											</td>
											<td name="KCName" type="text">
												<?php echo $row['u_passwd'] ;?>
											</td>
											<td class="am-hide-sm-only">
												<?php 
												    switch($row['u_sex']){
														case 0:
														    echo "男";
															break;
														case 1:
														    echo "女";
															break;
													}
												?>
											</td>
											
											<td>
												<div class="am-btn-toolbar">
														<div class="am-btn-group am-btn-group-xs">
															<?php
															echo "<a href='delete.php?userid=".$row['u_id']."'>删除</a>"
														    ?>
														</div>	
												</div>
											</td>
										</tr>
								<?php
									}
								?>
							</tbody>
						</table>
						<hr>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>