<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" href="css/amazeui.min.css" />
		<link rel="stylesheet" href="css/admin.css" />
	</head>
	<body>
		<div class="admin-content-body">
			<div class="am-cf am-padding am-padding-bottom-0">
				<div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">预约管理</strong><small></small></div>
			</div>
			<hr>
			<div class="am-g">
				<div class="am-u-sm-12">
					<form class="am-form" method="get">
						<table class="am-table am-table-striped am-table-hover table-main">
							<thead>
								<tr>
									<th class="table-id">ID</th>
									<th class="table-title">用户编号</th>
									<th class="table-type">实验室编号</th>
<!-- 									<th class="table-author am-hide-sm-only">作者</th> -->
									<th class="table-date am-hide-sm-only">开始时间</th>
									<th class="table-date am-hide-sm-only">结束时间</th>
									<th class="table-date am-hide-sm-only">预定时间</th>
									<th class="table-set">操作</th>
								</tr>
							</thead>
							<?php
							$conn = mysql_connect('localhost','root','44448888')or die('连接数据库失败');
							mysql_select_db("lims",$conn)or die('选择数据库失败');
							$sql = "SELECT * FROM la_order WHERE 1 ";
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
												<?php echo $row['num'] ;?>
											</td>
											<td>
												<?php echo $row['o_user'] ;?>
											</td>
											<!-- <td>admin</td> -->
											<td name="KCName" type="text">
												<?php 
												    switch($row['o_labratory']){
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
											    <?php echo $row['ouse_data'] ;?>
											</td>
											<td class="am-hide-sm-only">
                                                <?php echo $row['ostop_data'] ;?>
											</td>
											<td class="am-hide-sm-only">
											    <?php echo $row['data'] ;?>
											</td>
											<td>
												<div class="am-btn-toolbar">
														<div class="am-btn-toolbar">
															<div class="am-btn-group am-btn-group-xs">
																<?php
																echo "<a href='allowo.php?onum=".$row['num']."'>允许</a>"
															    ?>
															</div>	
														<div class="am-btn-group am-btn-group-xs">
																	<?php
																	echo "<a href='deleteo.php?onum=".$row['num']."'>删除</a>"
																    ?>
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