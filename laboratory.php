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
	        height: 400px;
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
				<div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">实验室管理</strong><small></small></div>
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
						   	<legend>实验室管理</legend>
								<form name="LoginForm" method="post" action="registl.php" onSubmit="return InputCheck(this)">
									<p>
										<label for="userid" class="label">实验室名称:</label>
										<input id="userid" name="userid" type="text" class="input" />
									<p/>
									<p>
										<label for="password" class="label">实验室编号:</label>
										<input id="password" name="password" type="text" class="input" />
									<p/>
									<p>
										<label for="username" class="label">实验室信息:</label>
										<input id="username" name="username" type="username" class="input" />
									<p/>
									<p>
										<input type="submit" name="submit" value="  确 定  " class="left" />
										<input type="button" value="取消注册" onclick="Hide();">
									</p>
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
									<th class="table-title">实验室名称</th>
									<th class="table-type">实验室编号</th>
									<th class="table-author am-hide-sm-only">实验室信息</th>
									<th class="table-set">操作</th>
								</tr>
							</thead>
							<?php
							$conn = mysql_connect('localhost','root','44448888')or die('连接数据库失败');
							mysql_select_db("lims",$conn)or die('选择数据库失败');
							$sql = "SELECT * FROM laboratory WHERE 1 ";
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
												<?php echo $row['id'] ;?>
											</td>
											<td>
												<?php echo $row['name'] ;?>
											</td>
											<td name="KCName" type="text">
												<?php echo $row['classnum'] ;?>
											</td>
											<td name="KCName" type="text">
												<?php echo $row['information'] ;?>
											</td>
		
											<td>
												<div class="am-btn-toolbar">
														<div class="am-btn-group am-btn-group-xs">
															<?php
															echo "<a href='deletel.php?userid=".$row['id']."'>删除</a>"
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