<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Pemasaran - Kedai Coffe</title>
	<!-- style css php -->
	<?php include_once 'css_style/style.php';?>
	<?php 
	// include_once 'master/css/style.php';
	?>
	
	<link href="library/daterangepicker.css" rel="stylesheet" />
	<script src="library/jquery.min.js"></script>
	<script src="library/bootstrap-5/bootstrap.bundle.min.js"></script>
	<script src="library/moment.min.js"></script>
	<script src="library/daterangepicker.min.js"></script>
	<script src="library/Chart.bundle.min.js"></script>
	<script src="library/jquery.dataTables.min.js"></script>
	<script src="library/dataTables.bootstrap5.min.js"></script>
	<!-- end style css php -->
	
	
	<body>
		<div id="wrapper">
			<!-- nav form -->
			<?php include_once 'sidebar/nav_form.php';?>
			<!-- end nav -->
			<div id="page-wrapper" class="gray-bg dashbard-1">
				
				<!-- navbar -->
				<?php include_once 'sidebar/navbar.php';?>
				<?php require_once "config.php";?>
				<!-- end navbar -->
				
				<!-- Awal Tampilan Jumlah row Dashboard -->
				<?php require_once 'tampildashboard/tampil-total-transaksi.php';?>
				<?php require_once 'tampildashboard/tampil-total-pengeluaran.php';?>
				<?php require_once 'tampildashboard/tampil-total-komplain.php';?>
				<?php require_once 'tampildashboard/tampil-total-trxx.php';?>
				<!-- End Tampilan Jumlah Dashboard -->
				
				<div class="wrapper wrapper-content">
					<div class="container-fluid">
						<div class="row g-3 mb-2">
							<div class="col-12">
								<div class="ibox d-block bg-white rounded p-3">
									<h2><b> Informasi Pemasaran Kedai Coffe (Info Kopi) </b></h2>
									<hr>
									<!-- <div class="ibox-title"></div> -->
									<P align="justify">Dashboaboard Pemasaran untuk pengelolaan internal mengenai perencanaan pemasaran selanjutnya,
										berisi informasi laporan yang di peroleh dari data internal yaitu SI Akuntansi dan data external 
										Marketing Research,
										& Marketing Intelijen. Seluruh penjualan yang sudah terjadi akan dilakukan inputan ulang pada website ini guna menghasilkan informasi
											tentang pereencaaan selanjutnya mengenai produk, price, promosi, dan place seperti apa kedepanya.</P>
									<p align="justify">Kedai Cofee ini  memiliki nama brand yaitu INFOKOPI dengan sekala regional yaitu hanya berpusat di daerah kabupaten kudus, jawa tengah
										dan memiliki 20 cabang lainya yang tersebar di luar kota, kedai ini menyajikan makanan dan minuman yang terdiri dari 26 jenis produk minuman
										dan 12 jenis makanan, setiap harinya kedai ini dari seluruh cabangnya mampu menghasilkan penjualan mencapai 50 ribu cup gelas untuk minuman dan
									 20ribu porsi untnuk makanan, artinya dalam sebulan kedai ini bisa menjual 1,6 juta cup dan 60 ribu posri dari seluruh cabangnya, baik secara offline maupun online.</p>
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-lg-3">
									<div class="ibox ">
										<div class="ibox-title"> <span class="label label-success float-right">All</span>
											<h5>Transaksi</h5> </div>
											<div class="ibox-content">
												<h1 class="no-margins"><?=$count_trx;?></h1>
												<div class="stat-percent font-bold text-success"><i class="fa fa-"></i></div> <small>Total transaksi</small> </div>
												
											</div>
										</div>
										<div class="col-lg-3">
											<div class="ibox ">
												<div class="ibox-title"> <span class="label label-info float-right">All</span>
													<h5>Pengeluaran</h5> </div>
													<div class="ibox-content">
														<h1 class="no-margins"><?php echo $count_biaya['nominal']?></h1>
														<div class="stat-percent font-bold text-info"><i class="fa fa-"></i></div> <small>Total Pengeluaran</small> </div>
													</div>
												</div>
												<div class="col-lg-3">
													<div class="ibox ">
														<div class="ibox-title"> <span class="label label-primary float-right">All</span>
															<h5>Komplain</h5> </div>
															<div class="ibox-content">
																<h1 class="no-margins"><?=$count_komplain;?></h1>
																<div class="stat-percent font-bold text-navy"><i class="fa fa-"></i></div> <small>Total Komplain</small> </div>
															</div>
														</div>
														<div class="col-lg-3">
															<div class="ibox ">
																<div class="ibox-title"> <span class="label label-danger float-right">All</span>
																	<h5>User</h5> </div>
																	<div class="ibox-content">
																		<h1 class="no-margins"><?=$count_trxx;?></h1>
																		<div class="stat-percent font-bold text-danger"> <i class="fa fa-"></i></div> <small>Total User</small> </div>
																	</div>
																</div>
															</div>
															
															<!-- 															
																<div class="row">
																	<div class="col-lg-12">
																		<div class="ibox ">
																			<div class="ibox-title">
																				<h5>Orders</h5>
																				<div class="float-right">
																					<div class="btn-group">
																						<button type="button" class="btn btn-xs btn-white active">Today</button>
																						<button type="button" class="btn btn-xs btn-white">Monthly</button>
																						<button type="button" class="btn btn-xs btn-white">Annual</button>
																					</div>
																				</div>
																			</div>
																			<div class="ibox-content">
																				<div class="row">
																					<div class="col-lg-9">
																						<div class="flot-chart">
																							<div class="flot-chart-content" id="flot-dashboard-chart"></div>
																						</div>
																					</div>
																					<div class="col-lg-3">
																						<ul class="stat-list">
																							<li>
																								<h2 class="no-margins">2,346</h2> <small>Total orders in period</small>
																								<div class="stat-percent">48% <i class="fa fa-level-up text-navy"></i></div>
																								<div class="progress progress-mini">
																									<div style="width: 48%;" class="progress-bar"></div>
																								</div>
																							</li>
																							<li>
																								<h2 class="no-margins ">4,422</h2> <small>Orders in last month</small>
																								<div class="stat-percent">60% <i class="fa fa-level-down text-navy"></i></div>
																								<div class="progress progress-mini">
																									<div style="width: 60%;" class="progress-bar"></div>
																								</div>
																							</li>
																							<li>
																								<h2 class="no-margins ">9,180</h2> <small>Monthly income from orders</small>
																								<div class="stat-percent">22% <i class="fa fa-bolt text-navy"></i></div>
																								<div class="progress progress-mini">
																									<div style="width: 22%;" class="progress-bar"></div>
																								</div>
																							</li>
																						</ul>
																					</div>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
																
															-->
															
															<div class="row">
																<div class="col-lg-12">
																	<div class="ibox ">
																		<!-- <h1 class="mt-2 mb-3 text-center text-primary">Data Transaksi Kedai Kopi By Filter Tanggal</h1> -->
																		<div class="card">
																			<div class="card-header">
																				<div class="row">
																					
																					<div class="col col-sm-9"> <h2> <b>Data Transaksi</b></h2></div>
																					<div class="col col-sm-3">
																						<label class="name">Pilih Tanggal:</label>
																						<input type="text" id="daterange_textbox" class="form-control" readonly />
																					</div>
																				</div>
																			</div>
																			<div class="wrapper wrapper-content">
																				<div class="titulo-tabla">
																					<div class="chart-container pie-chart">
																						<canvas id="bar_chart" height="45"> </canvas>
																					</div>
																					<table class="table table-striped table-bordered" style="width:100%" id="order_table">
																						<thead>
																							<tr>
																								<th>Nama</th>
																								<th>Jumlah</th>
																								<th>Tanggal</th>
																							</tr>
																						</thead>
																						<tbody></tbody>
																					</table>
																				</div>
																			</div>
																		</div>
																		
																	</div>
																</div>
															</div>
															
															<script>
																
																$(document).ready(function(){	
																	fetch_data();
																	var sale_chart;
																	function fetch_data(start_date = '', end_date = '')
																	{
																		var dataTable = $('#order_table').DataTable({
																			"processing" : true,
																			"serverSide" : true,
																			"order" : [],
																			"ajax" : {
																				url:"action.php",
																				type:"POST",
																				data:{action:'fetch', start_date:start_date, end_date:end_date}
																			},
																			"drawCallback" : function(settings)
																			{
																				var sales_date = [];
																				var sale = [];
																				
																				for(var count = 0; count < settings.aoData.length; count++)
																				{
																					sales_date.push(settings.aoData[count]._aData[2]);
																					sale.push(parseFloat(settings.aoData[count]._aData[1]));
																				}
																				
																				var chart_data = {
																					labels:sales_date,
																					datasets:[
																					{
																						label : 'Jumlah Produk Terjual',
																						backgroundColor : 'rgba(255, 0, 87, 0.2)',
																						
																						color : '#228B22',
																						data:sale
																					}
																					]   
																				};
																				
																				var group_chart3 = $('#bar_chart');
																				
																				if(sale_chart)
																				{
																					sale_chart.destroy();
																				}
																				
																				sale_chart = new Chart(group_chart3, {
																					type:'bar',
																					data:chart_data
																				});
																			}
																		});
																	}
																	
																	$('#daterange_textbox').daterangepicker({
																		ranges:{
																			'Hari Ini' : [moment(), moment()],
																			'Kemarin' : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
																			'7 Hari Terakhir' : [moment().subtract(6, 'days'), moment()],
																			'30 Hari Terakhir' : [moment().subtract(29, 'days'), moment()],
																			'Bulan Ini' : [moment().startOf('month'), moment().endOf('month')],
																			'Bulan Lalu' : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
																		},
																		format : 'YYYY-MM-DD'
																	}, function(start, end){
																		
																		$('#order_table').DataTable().destroy();
																		
																		fetch_data(start.format('YYYY-MM-DD'), end.format('YYYY-MM-DD'));
																		
																	});
																	
																});
																
															</script>
															
															
															<!-- <div class="row">
																<div class="col-lg-4">
																	<div class="ibox ">
																		<div class="ibox-title">
																			<h5>Messages</h5>
																			<div class="ibox-tools">
																				<a class="collapse-link"> <i class="fa fa-chevron-up"></i> </a>
																				<a class="close-link"> <i class="fa fa-times"></i> </a>
																			</div>
																		</div>
																		<div class="ibox-content ibox-heading">
																			<h3><i class="fa fa-envelope-o"></i> New messages</h3> <small><i class="fa fa-tim"></i> You have 22 new messages and 16 waiting in draft folder.</small> </div>
																			<div class="ibox-content">
																				<div class="feed-activity-list">
																					<div class="feed-element">
																						<div> <small class="float-right text-navy">1m ago</small> <strong>Monica Smith</strong>
																							<div>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum</div> <small class="text-muted">Today 5:60 pm - 12.06.2014</small> </div>
																						</div>
																						
																						<div class="feed-element">
																							<div> <small class="float-right">5m ago</small> <strong>Gary Smith</strong>
																								<div>200 Latin words, combined with a handful</div> <small class="text-muted">Yesterday 8:48 pm - 10.06.2014</small> </div>
																							</div>
																						</div>
																					</div>
																				</div>
																			</div>
																			<div class="col-lg-8">
																				<div class="row">
																					<div class="col-lg-6">
																						<div class="ibox ">
																							<div class="ibox-title">
																								<h5>User project list</h5>
																								<div class="ibox-tools">
																									<a class="collapse-link"> <i class="fa fa-chevron-up"></i> </a>
																									<a class="close-link"> <i class="fa fa-times"></i> </a>
																								</div>
																							</div>
																							<div class="ibox-content table-responsive">
																								<table class="table table-hover no-margins">
																									<thead>
																										<tr>
																											<th>Status</th>
																											<th>Date</th>
																											<th>User</th>
																											<th>Value</th>
																										</tr>
																									</thead>
																									<tbody>
																										<tr>
																											<td><small>Pending...</small></td>
																											<td><i class="fa fa-clock-o"></i> 11:20pm</td>
																											<td>Samantha</td>
																											<td class="text-navy"> <i class="fa fa-level-up"></i> 24% </td>
																										</tr>
																										<tr>
																											<td><span class="label label-warning">Canceled</span> </td>
																											<td><i class="fa fa-clock-o"></i> 10:40am</td>
																											<td>Monica</td>
																											<td class="text-navy"> <i class="fa fa-level-up"></i> 66% </td>
																										</tr>
																										<tr>
																											<td><small>Pending...</small> </td>
																											<td><i class="fa fa-clock-o"></i> 01:30pm</td>
																											<td>John</td>
																											<td class="text-navy"> <i class="fa fa-level-up"></i> 54% </td>
																										</tr>
																										<tr>
																											<td><small>Pending...</small> </td>
																											<td><i class="fa fa-clock-o"></i> 02:20pm</td>
																											<td>Agnes</td>
																											<td class="text-navy"> <i class="fa fa-level-up"></i> 12% </td>
																										</tr>
																										<tr>
																											<td><small>Pending...</small> </td>
																											<td><i class="fa fa-clock-o"></i> 09:40pm</td>
																											<td>Janet</td>
																											<td class="text-navy"> <i class="fa fa-level-up"></i> 22% </td>
																										</tr>
																										<tr>
																											<td><span class="label label-primary">Completed</span> </td>
																											<td><i class="fa fa-clock-o"></i> 04:10am</td>
																											<td>Amelia</td>
																											<td class="text-navy"> <i class="fa fa-level-up"></i> 66% </td>
																										</tr>
																										<tr>
																											<td><small>Pending...</small> </td>
																											<td><i class="fa fa-clock-o"></i> 12:08am</td>
																											<td>Damian</td>
																											<td class="text-navy"> <i class="fa fa-level-up"></i> 23% </td>
																										</tr>
																									</tbody>
																								</table>
																							</div>
																						</div>
																					</div>
																					<div class="col-lg-6">
																						<div class="ibox ">
																							<div class="ibox-title">
																								<h5>Small todo list</h5>
																								<div class="ibox-tools">
																									<a class="collapse-link"> <i class="fa fa-chevron-up"></i> </a>
																									<a class="close-link"> <i class="fa fa-times"></i> </a>
																								</div>
																							</div>
																							<div class="ibox-content">
																								<ul class="todo-list m-t small-list">
																									<li> <a href="#" class="check-link"><i class="fa fa-check-square"></i> </a> <span class="m-l-xs todo-completed">Buy a milk</span> </li>
																									<li> <a href="#" class="check-link"><i class="fa fa-square-o"></i> </a> <span class="m-l-xs">Go to shop and find some products.</span> </li>
																									<li> <a href="#" class="check-link"><i class="fa fa-square-o"></i> </a> <span class="m-l-xs">Send documents to Mike</span> <small class="label label-primary"><i class="fa fa-clock-o"></i> 1 mins</small> </li>
																									<li> <a href="#" class="check-link"><i class="fa fa-square-o"></i> </a> <span class="m-l-xs">Go to the doctor dr Smith</span> </li>
																									<li> <a href="#" class="check-link"><i class="fa fa-check-square"></i> </a> <span class="m-l-xs todo-completed">Plan vacation</span> </li>
																									<li> <a href="#" class="check-link"><i class="fa fa-square-o"></i> </a> <span class="m-l-xs">Create new stuff</span> </li>
																									<li> <a href="#" class="check-link"><i class="fa fa-square-o"></i> </a> <span class="m-l-xs">Call to Anna for dinner</span> </li>
																								</ul>
																							</div>
																						</div>
																					</div>
																				</div>
																			</div>
																		</div>
																	</div> -->
																	<!-- foodter -->
																	
																	<!-- end foodter -->
																</div>
															</div>
															<?php include_once 'script/js.php';?>
															
															library js
															<!--<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
															<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
															<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
															<script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
															<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.bootstrap4.min.js"></script>
															<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
												  		    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
															<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
														
														
															
															
														</body>
														</html>