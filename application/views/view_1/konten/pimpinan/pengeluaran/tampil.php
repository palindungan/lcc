<div class="breadcomb-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="breadcomb-list">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<div class="breadcomb-wp">
								<div class="breadcomb-icon">
									<i class="notika-icon notika-windows"></i>
								</div>
								<div class="breadcomb-ctn">
									<h2>BARANG TRENDING</h2>
									<p>Welcome to Notika <span class="bread-ntd">Admin Template</span></p>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
							<div class="breadcomb-report">
								<button data-toggle="tooltip" data-placement="left" title="Download Report"
									class="btn"><i class="notika-icon notika-sent"></i></button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="data-table-area">
	<div class="container">
		<div class="row" style="margin-bottom:27px;">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="widget-tabs-int">
					<div class="widget-tabs-list">
						<ul class="nav nav-tabs">
							<li class="active"><a data-toggle="tab" href="#home">Minggu Ini</a></li>
							<li><a data-toggle="tab" href="#menu1">Bulan Ini</a></li>
							<li><a data-toggle="tab" href="#menu2">Tahun Ini</a></li>
						</ul>
						<div class="tab-content tab-custom-st">
							<div id="home" class="tab-pane fade in active">
								<div class="tab-ctn">
									<div class="data-table-list">
										<div class="table-responsive">
											<table width="100%" class="table table-striped">
												<thead>
													<tr>
														<th width="5%">No</th>
														<th width="17%">Nama Barang</th>
														<th width="25%">Jumlah Terjual</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>asd</td>
														<td>asd</td>
														<td>asd</td>
													</tr>
												</tbody>
												<tfoot>
													<th>No</th>
													<th>Nama Barang</th>
													<th>Jumlah Terjual</th>
												</tfoot>
											</table>
										</div>
									</div>
								</div>
							</div>
							<div id="menu1" class="tab-pane fade">
								<div class="tab-ctn">
									<div class="data-table-list">
										<div class="table-responsive">
											<table width="100%" class="table table-striped">
												<thead>
													<tr>
														<th width="5%">No</th>
														<th width="17%">Nama Barang</th>
														<th width="25%">Jumlah Terjual</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>asdasdxx</td>
														<td>asdasdxx</td>
														<td>asdasdxx</td>
													</tr>
												</tbody>
												<tfoot>
													<th>No</th>
													<th>Nama Barang</th>
													<th>Jumlah Terjual</th>
												</tfoot>
											</table>
										</div>
									</div>
								</div>
							</div>
							<div id="menu2" class="tab-pane fade">
								<div class="tab-ctn">
									<div class="data-table-list">
										<div class="table-responsive">
											<table width="100%" class="table table-striped">
												<thead>
													<tr>
														<th width="5%">No</th>
														<th width="17%">Nama Barang</th>
														<th width="25%">Jumlah Terjual</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>asd</td>
														<td>asd</td>
														<td>asd</td>
													</tr>
												</tbody>
												<tfoot>
													<th>No</th>
													<th>Nama Barang</th>
													<th>Jumlah Terjual</th>
												</tfoot>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
<!-- Breadcomb area End-->
<!-- Data Table area Start-->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
	google.charts.load('current', {
		'packages': ['corechart']
	});
	google.charts.setOnLoadCallback(drawChart);

	function drawChart() {

		var data = google.visualization.arrayToDataTable([
			['Task', 'Hours per Day'],
			['Work', 11],
			['Eat', 2],
			['Commute', 2],
			['Watch TV', 2],
			['Sleep', 7]
		]);

		var options = {
			title: 'My Daily Activities'
		};

		var chart = new google.visualization.PieChart(document.getElementById('piechart'));

		chart.draw(data, options);
	}

</script>
