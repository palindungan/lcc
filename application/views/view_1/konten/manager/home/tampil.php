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
						<option value="hari" selected>Hari Ini</option>
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
	hari_ini();
	$(document).on('change', '#xx', function (event) {
		event.preventDefault();
		hari_ini();
	});

	function hari_ini() {
		var form_data = $("#myform").serialize();
		$.ajax({
			url: "<?php echo base_url(); ?>manager/home/tampil",
			method: "POST",
			data: form_data,
			success: function (data) {
				$("#muncul").html(data);
			}
		});
	}

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
		var pemasukan_januari = parseInt("<?php echo $masuk_januari  ?>");
		var pemasukan_februari = parseInt("<?php echo $masuk_februari  ?>");
		var pemasukan_maret = parseInt("<?php echo $masuk_maret  ?>");
		var pemasukan_april = parseInt("<?php echo $masuk_april  ?>");
		var pemasukan_mei = parseInt("<?php echo $masuk_mei  ?>");
		var pemasukan_juni = parseInt("<?php echo $masuk_juni  ?>");
		var pemasukan_juli = parseInt("<?php echo $masuk_juli  ?>");
		var pemasukan_agustus = parseInt("<?php echo $masuk_agustus  ?>");
		var pemasukan_september = parseInt("<?php echo $masuk_september  ?>");
		var pemasukan_oktober = parseInt("<?php echo $masuk_oktober  ?>");
		var pemasukan_november = parseInt("<?php echo $masuk_november  ?>");
		var pemasukan_desember = parseInt("<?php echo $masuk_desember  ?>");

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
			['Jan', pemasukan_januari, pengeluaran_januari],
			['Feb', pemasukan_februari, pengeluaran_februari],
			['Mar', pemasukan_maret, pengeluaran_maret],
			['Apr', pemasukan_april, pengeluaran_april],
			['Mei', pemasukan_mei, pengeluaran_mei],
			['Jun', pemasukan_juni, pengeluaran_juni],
			['Jul', pemasukan_juli, pengeluaran_juli],
			['Ags', pemasukan_agustus, pengeluaran_agustus],
			['Sept', pemasukan_september, pengeluaran_september],
			['Okt', pemasukan_oktober, pengeluaran_oktober],
			['Nov', pemasukan_november, pengeluaran_november],
			['Des', pemasukan_desember, pengeluaran_desember]
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
