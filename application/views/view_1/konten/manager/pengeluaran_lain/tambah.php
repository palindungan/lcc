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
									<h2>Tambah Pengeluaran Lain</h2>
									<p>Welcome to Notika <span class="bread-ntd">Admin Template</span></p>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Breadcomb area End-->

<!-- Form Element area Start-->
<div class="form-element-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="form-element-list">
					<div class="row">
						<form action="<?php echo base_url("manager/pengeluaran_lain/store") ?>" method="post">
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<div
									class="form-group <?php if(form_error('deskripsi')== true) { echo "has-error";} ?>">
									<label for="comment">Deskripsi Pengeluaran</label>
									<textarea class="form-control" name="deskripsi" rows="3"
										id="comment"><?= set_value('deskripsi') ?></textarea>
									<span class="help-block"><?php echo form_error('deskripsi'); ?></span>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<div
									class="form-group <?php if(form_error('jumlah_pengeluaran')== true) { echo "has-error";} ?>">
									<label for="usr">Jumlah Pengeluaran</label>
									<input type="text" name="jumlah_pengeluaran" class="form-control" id="rupiah"
										value="<?= set_value('jumlah_pengeluaran') ?>">
									<span class="help-block"><?php echo form_error('jumlah_pengeluaran'); ?></span>
								</div>
							</div>
					</div>
					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
							<div class="form-group">
								<button type="submit" class="btn btn-primary">Simpan</button>
								<a onclick=self.history.back() class="btn btn-danger">Kembali</a>

							</div>
						</div>
					</div><br>

				</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- Form Element area End-->
<script type="text/javascript">
	var rupiah = document.getElementById('rupiah');
	rupiah.addEventListener('keyup', function (e) {
		// tambahkan 'Rp.' pada saat form di ketik
		// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
		rupiah.value = formatRupiah(this.value);
	});
	/* Fungsi formatRupiah */
	function formatRupiah(angka, prefix) {
		var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split = number_string.split(','),
			sisa = split[0].length % 3,
			rupiah = split[0].substr(0, sisa),
			ribuan = split[0].substr(sisa).match(/\d{3}/gi);
		// tambahkan titik jika yang di input sudah menjadi angka ribuan
		if (ribuan) {
			separator = sisa ? '.' : '';
			rupiah += separator + ribuan.join('.');
		}
		rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
		return prefix == undefined ? rupiah : (rupiah ? +rupiah : '');
	}

</script>
