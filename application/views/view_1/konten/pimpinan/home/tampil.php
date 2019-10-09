<!-- Breadcomb area Start-->
<div class="breadcomb-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="breadcomb-list">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<div class="breadcomb-wp">
								<div class="breadcomb-icon">
									<i class="notika-icon notika-form"></i>
								</div>
								<div class="breadcomb-ctn">
									<h2>DASHBOARD MANAGER</h2>
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

<!-- Breadcomb area End-->


<div class="container">
	<div class="row">
		<a style="color:black" href="">
			<div style="margin-bottom: 30px;" class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="contact-inner">
					<div id="piechart" style="width:100%; height: 300px;"></div>
				</div>
			</div>
		</a>

		<a style="color:black" href="">
			<div style="margin-bottom: 30px;" class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="row">
					<div style="margin-bottom:20px;" class="col-md-6">
						<form action="" method="post" id="myform">
							<select name="pilih" id="xx" class="form-control">
								<option value="semua" selected>Semua Toko</option>
								<option value="T1">LCC Komputer</option>
								<option value="T2">CMC Komputer</option>
								<option value="T3">Paradox Komputer</option>
							</select>
						</form>
					</div>
					<div style="margin-bottom:20px;" class="col-md-6">
						<form action="" method="post" id="myform">
							<select name="pilih" id="xx" class="form-control">
								<option value="T1">Hari Ini</option>
								<option value="T2">Minggu Ini</option>
								<option value="T3">Bulan Ini</option>
							</select>
						</form>
					</div>
				</div>
				<div class="row">
					<div style="margin-bottom:16px;" class="col-md-12">
						<div class="contact-inner" style="height:135px">
							<h2 class="text-right">
								10
							</h2>
							<span><strong>TOTAL PEMASUKAN</strong></span>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="contact-inner" style="height:135px">
							<h2 class="text-right">
								10
							</h2>
							<span><strong>TOTAL PENGELUARAN</strong></span>
						</div>
					</div>
				</div>
			</div>
		</a>
	</div>
</div>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
	google.charts.load('current', {
		'packages': ['corechart']
	});
	google.charts.setOnLoadCallback(drawChart);

	function drawChart() {

		var data = google.visualization.arrayToDataTable([
			['Task', 'Hours per Day'],
			['LCC Komputer', 550000000],
			['CMC Komputer', 250000000],
			['Paradox Komputer', 400000000],
		]);

		var options = {
			title: 'Data Aset Toko'
		};

		var chart = new google.visualization.PieChart(document.getElementById('piechart'));

		chart.draw(data, options);
	}

</script>
