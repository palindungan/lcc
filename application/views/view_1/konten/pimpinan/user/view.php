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
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="data-table-list">
					<div class="basic-tb-hd">
						<a class="btn btn-primary" href="<?php echo base_url("user_manager/add") ?>">Tambah</a>
					</div>
					<div class="table-responsive">
						<table id="data-table-basic" class="table table-striped">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama User</th>
									<th>username</th>
									<th>Jenis Akses</th>
									<th>toko</th>
									<th>aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php 
                                    $no = 1;
                                    foreach($user as $data){
                                    ?>
								<tr>
									<td><?php echo $no++ ?></td>
									<td><?php echo $data->nama_user?></td>
									<td><?php echo $data->username ?></td>
									<td><?php echo $data->jenis_akses ?></td>
									<td><?php echo $data->id_toko ?></td>
									<td>
										<div class="table-actions">
											<a class="btn btn-primary fa fa-pencil-square"
												href="<?php echo base_url("pimpinan/user/edit/".$data->id_user) ?>"></a>
											<a class="btn btn-danger fa fa-trash"
												onclick="return confirm('anda yakin ingin menghapus data ?')" href="<?php echo base_url("pimpinan/user/hapus/".$data->id_user) ?>"></a>
											<a class="btn btn-warning fa fa-recycle"
												href="<?php echo base_url("pimpinan/user/ganti_password/".$data->id_user) ?>"></a>


										</div>
									</td>
								</tr>
								<?php  }?>
							</tbody>
							<tfoot>
								<tr>
									<th>No</th>
									<th>Nama User</th>
									<th>username</th>
									<th>Jenis Akses</th>
									<th>toko</th>
									<th>aksi</th>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
