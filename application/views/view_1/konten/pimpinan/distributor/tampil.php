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
									<h2>Distributor</h2>
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

<!-- Form Element area Start-->
<div class="data-table-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="data-table-list">
					<div class="basic-tb-hd">
						<a class="btn btn-primary" href="<?php echo base_url("distributor/add") ?>">Tambah</a>
					</div>
					<div class="table-responsive">
						<table id="data-table-basic" class="table table-striped">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama</th>
									<th>Alamat</th>
									<th>No Hp</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php 
                            $no = 1;
                            foreach ($distributor as $a) {
                            ?>
								<tr>
									<td><?php echo $no++; ?></td>
									<td><?php echo $a->nama; ?></td>
									<td><?php echo $a->alamat; ?></td>
									<td><?php echo $a->no_hp; ?></td>
									<td>
										<div class="table-actions">
											<a href="<?php echo base_url("distributor/edit/".$a->id_distributor) ?>"
												type='button' class='btn btn-primary fa fa-pencil-square'></a>
											<a href="<?php echo base_url("distributor/hapus/".$a->id_distributor) ?>"
												type='button' class='btn btn-danger fa fa-trash'></a>
										</div>
									</td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Form Element area End-->
