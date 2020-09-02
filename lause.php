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
		  if (LoginForm.l_id.value == "")
		  {
		    alert("请输入实验室编号!");
		    LoginForm.l_id.focus();
		    return (false);
		  }
		  if (LoginForm.startime.value == "")
		  {
		    alert("请输入预约开始时间!");
		    LoginForm.startime.focus();
		    return (false);
		  }
		  if (LoginForm.stoptime.value == "")
		  {
		    alert("请输入预约结束时间!");
		    LoginForm.stoptime.focus();
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
							<input type="button" value="添加" class="am-btn am-btn-default" onclick="Show();">
						</div>
						<div id="shade" class="c1 hide"></div>
						<div id="modal" class="c2 hide">
						   <fieldset>
						   	<legend>实验室预约</legend>
								<form name="LoginForm" method="post" action="addla.php" onSubmit="return InputCheck(this)">
									<p>
										<label for="userid" class="label">用户账号:</label>
										<input id="userid" name="userid" type="text" class="input" />
									<p/>
									<p>
										<label for="l_id" class="label">实验室编号:</label>
										<!-- <input id="l_id" name="l_id" type="text" class="input" /> -->
										<select name="l_id" multipul="multipul">
											<option value="80086">生物实验室</option>
											<option value="10086" selected="selected">化学实验室</option>
											<option value="10010" >物理实验室</option>
											<option value="10001" >信息实验室</option>
										</select><br>
									<p/>
									<p>
										<label for="startime" class="label">开始时间:</label>
										<input id="startime" name="startime" type="text" class="input" />
										
									<p/>
									<p>
										<label for="stoptime" class="label">结束时间:</label>
										<input id="stoptime" name="stoptime" type="text" class="input" />
									<p/>
									<p>
										<input type="submit" name="submit" value="  确 定  " class="left" />
										<input type="button" value="取消添加" onclick="Hide();">
									</p>
								</form>
						   </fieldset>
						</div>
					</div>
				</div>
				<div class="am-u-sm-12 am-u-md-3">
				</div>
			</div>
			
			
			
			
			
			
			
			
			
			
			<div class="am-g">
				<div class="am-u-sm-12">
					<form class="am-form" method="get">
						<table class="am-table am-table-striped am-table-hover table-main">
							<thead>
								<tr>
									<th class="table-id">ID</th>
									<th class="table-title">用户编号</th>
									<th class="table-type">实验室编号</th>
                                    <th class="table-date am-hide-sm-only">开始时间</th>
									<th class="table-date am-hide-sm-only">结束时间</th>
									<th class="table-date am-hide-sm-only">申请时间</th>
									<th class="table-set">操作</th>
								</tr>
							</thead>
							<?php
							$conn = mysql_connect('localhost','root','44448888')or die('连接数据库失败');
							mysql_select_db("lims",$conn)or die('选择数据库失败');
							$sql = "SELECT * FROM la_use WHERE 1 ";
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
											<td name="laid">
												<?php echo $row['num'] ;?>
											</td>
											<td>
												<?php echo $row['userid'] ;?>
											</td>
											<!-- <td>admin</td> -->
											<td name="KCName" type="text">
												<?php 
												    switch($row['laboratoryid']){
												    	case 80086:
												    	    echo "生物实验室";
												    		break;
												    	case 10086:
												    	    echo "化学实验室";
												    		break;
														case 10010:
															echo "物理实验室";
															break;
														case 10001:
															echo "信息实验室";
															break;
												    }
												?>
											</td>
											<td class="am-hide-sm-only">
											    <?php echo $row['usedata'] ;?>
											</td>
											<td class="am-hide-sm-only">
											    <?php echo $row['stopdata'] ;?>
											</td>
											<td class="am-hide-sm-only">
                                                <?php echo $row['data'] ;?>
											</td>
											<td >
												<div class="am-btn-toolbar">
														<div class="am-btn-group am-btn-group-xs">
															<?php
															echo "<a href='deletela.php?laid=".$row['num']."'>删除</a>"
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