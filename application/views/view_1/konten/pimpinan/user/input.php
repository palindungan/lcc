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
									<h2>TAMBAH USER MANAGER</h2>
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
						<form action="<?php echo base_url("pimpinan/user/insert_data") ?>" method="post">
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
								<div class="form-group  <?php if (form_error('nama_user') == true) {
															echo "has-error";
														} ?> ">
									<div class="form-ic-cmp">
									</div>
									<label>Nama</label>
									<input type="text" class="form-control" placeholder="Masukan Nama" name="nama_user" value="<?= set_value('nama_user') ?>" class="form-control">
									<span class="help-block"><?php echo form_error('nama_user'); ?></span>
								</div>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
								<div class="form-group <?php if (form_error('username') == true) {
															echo "has-error";
														} ?>">
									<div class="form-ic-cmp">
									</div>
									<label>Username</label>
									<input type="text" class="form-control" placeholder="Masukan Username" name="username" value="<?= set_value('nama_user') ?>">
									<span class="help-block"><?php echo form_error('username'); ?></span>
								</div>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
								<div class="form-group <?php if (form_error('password') == true) {
															echo "has-error";
														} ?>">
									<div class="form-ic-cmp">
									</div>
									<label>password</label>
									<input type="password" class="form-control" placeholder="Masukan password" name="password" value="<?= set_value('nama_user') ?>">
									<span class="help-block"><?php echo form_error('password'); ?></span>
								</div>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
								<div class="form-group">
									<div class="form-ic-cmp">
									</div>
									<label>toko</label>
									<select name="id_toko" class="form-control" required>
										<option value="">pilih</option>
										<?php
										foreach ($toko as $data) {
											?>
											<option value="<?php echo $data->id_toko ?>"><?php echo $data->nama_toko ?>
											</option>
										<?php } ?>
									</select>
									<!-- <input type="text" class="form-control" placeholder=""
											name="id_toko" value="<?= set_value('id_toko') ?>">
											<span class="help-block"><?php echo form_error('id_toko'); ?></span> -->
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