<div class="breadcomb-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="breadcomb-list">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<div class="breadcomb-wp">
								<div class="breadcomb-icon">
									<i class="notika-icon notika-windows"></i>
								</div>
								<div class="breadcomb-ctn">
									<h2>DAFTAR BARANG BARCODE</h2>
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
<!-- Data Table area Start-->
<div class="data-table-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="data-table-list">
					<div class="basic-tb-hd">
						<a class="btn btn-primary" href="<?php echo base_url("pengeluaran_lain/add") ?>">Tambah Data</a>
					</div>
					<div class="table-responsive">
						<table width="100%" id="data-table-basic" class="table table-striped">
							<thead>
								<tr>
									<th style="text-align:center;" width="5%">No</th>
									<th width="30%">Deskripsi Pengeluaran</th>
									<th style="text-align:center;" width="15%">Tanggal</th>
									<th style="text-align:center;" width="15%">Waktu</th>
									<th style="text-align:center;" width="20%">Jumlah Pengeluaran</th>
									<th style="text-align:center;" width="15%">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php 
                                $no = 1;
                                foreach($record as $row){
                                ?>
								<tr>
									<td style="text-align:center;"><?= $no++; ?></td>
									<td><?= $row->deskripsi; ?></td>
									<td style="text-align:center;"><?= date('d F Y', strtotime($row->tanggal)) ?></td>
									<td style="text-align:center;"><?= date('H:i:s', strtotime($row->tanggal)) ?></td>
									<td style="text-align:right;"><?= rupiah($row->total) ?></td>
									<td style="text-align:center;">
										<a onclick="return confirm('Yakin ingin menghapus data ?')"
											class="btn btn-danger"
											href="<?= base_url() ?>pengeluaran_lain/delete/<?= $row->id_pengeluaran_l ?>"><i
												class="glyphicon glyphicon-trash"></i></a>
									</td>
								</tr>
								<?php   
                                }
                                ?>
							</tbody>
							<tfoot>
								<th style="text-align:center;" width="5%">No</th>
								<th width="30%">Deskripsi Pengeluaran</th>
								<th style="text-align:center;" width="15%">Tanggal</th>
								<th style="text-align:center;" width="15%">Waktu</th>
								<th style="text-align:center;" width="20%">Jumlah Pengeluaran</th>
								<th style="text-align:center;" width="15%">Aksi</th>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
