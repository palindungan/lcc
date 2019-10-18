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
									<h2>EDIT ACCOUNT</h2>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="form-element-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="form-element-list">
					<div class="row">
						<form action="<?php echo base_url("pimpinan/edit_account/ubah_biodata") ?>" method="post">

							<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
								<div class="form-group">
									<div class="form-ic-cmp">
									</div>
									<label>Nama</label>
									<input type="hidden" class="form-control" placeholder="Masukan Nama" name="id"
										value="<?= $id ?>">
									<input type="text" class="form-control" placeholder="Masukan Nama" name="nama"
										value="<?= $nama ?>">
								</div>
							</div>
							<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
								<div class="form-group">
									<div class="form-ic-cmp">
									</div>
									<label>Username</label>
									<input type="text" class="form-control" placeholder="Masukan Nama" name="username"
										value="<?= $username ?>">
								</div>
							</div>
							<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
								<div class="form-group">
									<div class="form-ic-cmp">
									</div>
									<label>Ganti Password</label>
									<button type="button" class="btn btn-custom" data-toggle="modal"
										data-target="#myModalone">Ganti Password</button>
									<div class="modal fade" id="myModalone" role="dialog">
										<div class="modal-dialog modals-default">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close"
														data-dismiss="modal">&times;</button>
												</div>
												<div class="modal-body">
													<form
														action="<?php echo base_url("pimpinan/edit_account/ubah_password") ?>"
														method="POST"></form>
													<div class="form-group">
														<div class="form-ic-cmp">
														</div>
														<label>Password Lama</label>
														<input type="text" class="form-control"
															placeholder="Masukan Nama" name="confirm_lama">
													</div>
													<div class="form-group">
														<div class="form-ic-cmp">
														</div>
														<label>Password Baru</label>
														<input type="text" class="form-control"
															placeholder="Masukan Nama" name="password_baru">
													</div>
													<div class="form-group">
														<div class="form-ic-cmp">
														</div>
														<label>Konfirmasi Password</label>
														<input type="text" class="form-control"
															placeholder="Masukan Nama" name="confirm_password">
													</div>

												</div>
												<div class="modal-footer">
													<button type="submit" class="btn btn-default"
														data-dismiss="modal">Save changes</button>
													<button type="button" class="btn btn-default"
														data-dismiss="modal">Close</button>
												</div>
						</form>

					</div>
				</div>
			</div>
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
