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
