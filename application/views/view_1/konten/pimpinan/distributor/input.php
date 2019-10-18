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
								<div style="margin-top:15px" class="breadcomb-ctn">
									<h2>TAMBAH DISTRIBUTOR</h2>
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

<!-- Form Element area Start-->
<div class="form-element-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="form-element-list">
					<div class="row">
						<form action="<?php echo base_url("pimpinan/distributor/insert_data") ?>" method="post">
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
								<div class="form-group  <?php if (form_error('nama') == true) {
															echo "has-error";
														} ?>">
									<div class="form-ic-cmp">
									</div>
									<label>Nama</label>
									<input type="text" class="form-control" placeholder="Masukan Nama" name="nama" value="<?= set_value('nama') ?>">
									<span class="help-block"><?php echo form_error('nama'); ?></span>
								</div>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
								<div class="form-group <?php if (form_error('alamat') == true) {
															echo "has-error";
														} ?>">
									<div class="form-ic-cmp">
									</div>
									<label>Alamat</label>
									<input type="text" class="form-control" placeholder="Masukan Alamat" name="alamat" value="<?= set_value('alamat') ?>">
									<span class="help-block"><?php echo form_error('alamat'); ?></span>
								</div>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
								<div class="form-group <?php if (form_error('no_hp') == true) {
															echo "has-error";
														} ?>">
									<div class="form-ic-cmp">
									</div>
									<label>No Hp</label>
									<input type="text" class="form-control" placeholder="Masukan No Hp" name="no_hp" value="<?= set_value('no_hp') ?>">
									<span class="help-block"><?php echo form_error('no_hp'); ?></span>
								</div>
							</div>
					</div>
					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
							<div class="form-group ic-cmp-int">
								<div class="form-ic-cmp">
								</div>
								<div class="nk-int-st">
									<button type="submit" class="btn btn-primary">Simpan</button>
									<a onclick=self.history.back() class="btn btn-danger">Kembali</a>
								</div>
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