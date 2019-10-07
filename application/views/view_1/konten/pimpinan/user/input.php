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
									<h2>Data User</h2>
									<p>masukkan data anda</p>
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
						<form action="<?php echo base_url("pimpinan/user/insert_data") ?>" method="post">
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
								<div class="form-group ic-cmp-int">
									<div class="form-ic-cmp">
									</div>
									<div class="nk-int-st">
										<label>Nama</label>
										<input type="text" class="form-control" placeholder="Masukan Nama"
											name="nama_user" required>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
								<div class="form-group ic-cmp-int">
									<div class="form-ic-cmp">
									</div>
									<div class="nk-int-st">
										<label>Username</label>
										<input type="text" class="form-control" placeholder="Masukan Username"
											name="username" required>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
								<div class="form-group ic-cmp-int">
									<div class="form-ic-cmp">
									</div>
									<div class="nk-int-st">
										<label>password</label>
										<input type="text" class="form-control" placeholder="Masukan password"
											name="password" required>
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
