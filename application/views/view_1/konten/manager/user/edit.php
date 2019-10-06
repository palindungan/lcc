<?php 
foreach($edit as $data){
 ?>
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
									<h2>Edit Data</h2>
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
						<form action="<?php echo base_url("manager/user/update") ?>" method="post">
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
								<div class="form-group ic-cmp-int">
									<div class="form-ic-cmp">
									</div>
									<div class="nk-int-st">
										<label>Nama</label>
										<input type="hidden" name="id_user" value="<?php echo $data->id_user ?>">
										<input type="text" class="form-control" value="<?php echo $data->nama_user ?>"
											name="nama_user">
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
								<div class="form-group ic-cmp-int">
									<div class="form-ic-cmp">
									</div>
									<div class="nk-int-st">
										<label>Username</label>
										<input type="text" class="form-control" value="<?php echo $data->username ?>"
											name="username">
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
								<div class="form-group ic-cmp-int">
									<div class="form-ic-cmp">
									</div>
									<div class="nk-int-st">
										<label>jenis akses</label>
										<select class="selectpicker" name="jenis_akses">
											<option>pilih</option>
											<option value="manager" <?php if($data->jenis_akses=="Manager"){
                                        echo "selected";
                                       } ?>>manager</option>
											<option value="kasir" <?php if($data->jenis_akses=="Kasir"){
                                        echo "selected";
                                       } ?>>kasir</option>
										</select>
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
									<label>toko</label>
									<select class="selectpicker" name="id_toko">
										<option>pilih</option>
										<?php 
                                       foreach ($toko as $T){
                                        ?>
										<option value="<?php echo $T->id_toko ?>"
											<?php echo $T->id_toko==$data->id_toko ?  "selected" : "" ?>>
											<?php echo $T->nama_toko ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
						</div><br>
						<input type="submit" value="Simpan">
						<input type="reset" value=Kembali onclick=self.history.back()>
					</div>
				</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php } ?>
<!-- Form Element area End
