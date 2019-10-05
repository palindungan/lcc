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
				<select class="form-control">
					<option>HARI INI</option>
					<option>MINGGU INI</option>
					<option>BULAN INI</option>
				</select>
			</div>
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
							5
						</h2>
						<span><strong>JUMLAH TRANSAKSI</strong></span>
					</div>
				</div>
			</div>
		</a>
		<a style="color:black" href="">
			<div style="margin-bottom: 30px;" class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
				<div class="contact-inner">
					<div class="contact-inner">
						<h2 class="text-right">
							Rp 500.0000
						</h2>
						<span><strong>PEMASUKAN</strong></span>
					</div>
				</div>
			</div>
		</a>

		<a style="color:black" href="">
			<div style="margin-bottom: 30px;" class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
				<div class="contact-inner">
					<div class="contact-inner">
						<h2 class="text-right">
							Rp 40.0000
						</h2>
						<span><strong>PENGELUARAN</strong></span>
					</div>
				</div>
			</div>
		</a>
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
