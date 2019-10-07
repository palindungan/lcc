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
									<h2>Dashboard</h2>
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
<div class="data-table-area">
	<div class="container">
		<div class="row" style="margin-bottom:27px;">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<form action="" method="post" id="myform">
					<select name="pilih" id="xx" class="form-control">
						<option>Pilih</option>
						<option value="hari">Hari Ini</option>
						<option value="minggu">Minggu Ini</option>
						<option value="bulan">Bulan Ini</option>
					</select>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div id="muncul">
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<a style="color:black" href="">
			<div style="margin-bottom: 30px;" class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
				<div class="contact-inner">
					<div class="contact-inner">
						<h2 class="text-right">
							<?= $kasir->jumlah_kasir ?>
						</h2>
						<span><strong>JUMLAH KASIR</strong></span>
					</div>
				</div>
			</div>
		</a>
		<a style="color:black" href="">
			<div style="margin-bottom: 30px;" class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
				<div class="contact-inner">
					<div class="contact-inner">
						<h2 class="text-right">
							<?= $barang->jenis_barang ?>
						</h2>
						<span><strong>JENIS BARANG</strong></span>
					</div>
				</div>
			</div>
		</a>

		<a style="color:black" href="">
			<div style="margin-bottom: 30px;" class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
				<div class="contact-inner">
					<div class="contact-inner">
						<h2 class="text-right">
							<?= $stok_habis->jumlah_habis ?>
						</h2>
						<span><strong>STOK HABIS</strong></span>
					</div>
				</div>
			</div>
		</a>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div id="chart_div" style="height: 500px;"></div>
		</div </div> </div> <div class="container">

	</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
	$(document).on('change', '#xx', function (event) {
		event.preventDefault();
		var form_data = $("#myform").serialize();
		$.ajax({
			url: "<?php echo base_url(); ?>manager/home/tampil",
			method: "POST",
			data: form_data,
			success: function (data) {
				$("#muncul").html(data);
			}
		});
	});

</script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
	google.charts.load('current', {
		'packages': ['corechart', 'bar']
	});
	google.charts.setOnLoadCallback(drawStuff);

	function drawStuff() {

		var chartDiv = document.getElementById('chart_div');
		var data = new google.visualization.DataTable();
		var pengeluaran_januari = parseInt("<?php echo $keluar_januari  ?>");
		var pengeluaran_februari = parseInt("<?php echo $keluar_februari  ?>");
		var pengeluaran_maret = parseInt("<?php echo $keluar_maret  ?>");
		var pengeluaran_april = parseInt("<?php echo $keluar_april  ?>");
		var pengeluaran_mei = parseInt("<?php echo $keluar_mei  ?>");
		var pengeluaran_juni = parseInt("<?php echo $keluar_juni  ?>");
		var pengeluaran_juli = parseInt("<?php echo $keluar_juli  ?>");
		var pengeluaran_agustus = parseInt("<?php echo $keluar_agustus  ?>");
		var pengeluaran_september = parseInt("<?php echo $keluar_september  ?>");
		var pengeluaran_oktober = parseInt("<?php echo $keluar_oktober  ?>");
		var pengeluaran_november = parseInt("<?php echo $keluar_november  ?>");
		var pengeluaran_desember = parseInt("<?php echo $keluar_desember  ?>");
		data.addColumn('string', 'Bulan');
		data.addColumn('number', 'Pemasukan');
		data.addColumn('number', 'Pengeluaran');
		data.addRows([
			['Jan', 6000000, pengeluaran_januari],
			['Feb', 8000000, pengeluaran_februari],
			['Mar', 3000000, pengeluaran_maret],
			['Apr', 4000000, pengeluaran_april],
			['Mei', 10000000, pengeluaran_mei],
			['Jun', 9000000, pengeluaran_juni],
			['Jul', 6000000, pengeluaran_juli],
			['Ags', 8000000, pengeluaran_agustus],
			['Sept', 7000000, pengeluaran_september],
			['Okt', 9999999, pengeluaran_oktober],
			['Nov', 9000000, pengeluaran_november],
			['Des', 9500000, pengeluaran_desember]
		]);
		var tahun = (new Date).getFullYear();
		var classicOptions = {
			width: 1138,
			title: 'Statistik Data Pemasukan dan Pengeluaran Tahun ' + tahun,
		};


		function drawClassicChart() {
			var classicChart = new google.visualization.ColumnChart(chartDiv);
			classicChart.draw(data, classicOptions);
		}

		drawClassicChart();
	};

</script>
