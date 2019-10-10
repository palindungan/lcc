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
								<?php 
								foreach($data_toko as $row)
								{
								?>
								<option value="<?= $row->id_toko ?>"><?= $row->nama_toko ?></option>
								<?php } ?>
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
								100
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
		var aset_lcc = parseInt("<?php echo $aset_lcc  ?>");
		var aset_cmc = parseInt("<?php echo $aset_cmc  ?>");
		var aset_probolinggo = parseInt("<?php echo $aset_probolinggo  ?>");
		var total = aset_lcc + aset_cmc + aset_probolinggo;
		var data = google.visualization.arrayToDataTable([
			['Task', 'Hours per Day'],
			['LCC Komputer', aset_lcc],
			['CMC Komputer', aset_cmc],
			['Paradox Komputer', aset_probolinggo],
		]);

		var options = {
			title: 'Total Aset Semua Toko : ' + total

		};

		var chart = new google.visualization.PieChart(document.getElementById('piechart'));

		chart.draw(data, options);
	}

</script>
