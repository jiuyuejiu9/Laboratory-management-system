<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" href="css/amazeui.min.css" />
		<link rel="stylesheet" href="css/admin.css" />
		<script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
	</head>

	<body>
		<div class="admin-content-body">
			<div class="am-cf am-padding am-padding-bottom-0">
				<div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">故障管理</strong><small></small></div>
			</div>
			<hr>
			<div class="am-g">
				<div class="am-u-sm-12">
					<form class="am-form" method="get">
						<table class="am-table am-table-striped am-table-hover table-main">
							<thead>
								<tr>
									<th class="table-id">ID</th>
									<th class="table-num">账号</th>
									<th class="table-title">申请人</th>
									<th class="table-type">实验室编号</th>
<!-- 									<th class="table-author am-hide-sm-only">作者</th> -->
									<th class="table-date am-hide-sm-only">故障信息</th>
									<th class="table-set">操作</th>
								</tr>
							</thead>
							<?php
							$conn = mysql_connect('localhost','root','44448888')or die('连接数据库失败');
							mysql_select_db("lims",$conn)or die('选择数据库失败');
							$sql = "SELECT * FROM brake WHERE 1 ";
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
											<!-- <td><input type="checkbox"></td> -->
										<!-- 	<td>1</td> -->
											<td name="onum">
												<?php echo $row['b_id'] ;?>
											</td>
											
											<td>
												<?php echo $row['b_num'] ;?>
											</td>
											<td>
												<?php echo $row['b_declarant'] ;?>
											</td>
											<td class="am-hide-sm-only">
											    <?php echo $row['b_laboratory'] ;?>
											</td>
											<td class="am-hide-sm-only">
                                                <?php echo $row['b_title'] ;?>
											</td>
											<td>
												
												<div role="presentation" class="dropdown">
													<button class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
													  操作 <span class="caret"></span>
													</button>
													<ul class="dropdown-menu">
														<li>
															
															<a href="" role="button" data-toggle="modal" data-target="#myModal">查看</a>
														</li>
														<li>
															<?php
																echo "<a href='brake_delete.php?brakeid=".$row['b_id']."'>删除</a>"
															?>
														</li>
													</ul>
												 </div>
												 
												<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
												  <div class="modal-dialog" role="document">
													<div class="modal-content">
													  <div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
														<h4 class="modal-title" id="myModalLabel">故障信息</h4>
													  </div>
													  <div class="modal-body">
														  <form action="#">
															  <div class="form-group">
															    <label for="assname">账号</label>
															    <input type="text" id="assname" class="form-control" value="<?php echo $row['b_num'] ;?>" />
															</div>
															  <div class="form-group">
																  <label for="assname">申请人</label>
																  <input type="text" id="assname" class="form-control" value="<?php echo $row['b_declarant'] ;?>" />
															  </div>
															  <div class="form-group">
																  <label for="assname">实验室编号</label>
																  <input type="text" id="assname" class="form-control" value="<?php echo $row['b_laboratory'] ;?>" />
															  </div>
															  <div class="form-group">
																  <label>故障信息</label>
																  <input type="text" id="assname" class="form-control" value="<?php echo $row['b_title'] ;?>" />
															  </div>
															  <div class="form-group">
																  <label>详细信息</label>
																  <input type="text" id="assname" class="form-control" value="<?php echo $row['b_information'] ;?>" />
															  </div>
														  </form>
													  </div>
													  <div class="modal-footer">
														<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
													  </div>
													</div>
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