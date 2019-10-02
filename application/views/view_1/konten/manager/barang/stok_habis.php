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
									<h2>STOK HABIS</h2>
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
					<div class="table-responsive">
						<table width="100%" id="data-table-basic" class="table table-striped">
							<thead>
								<tr>
									<th width="5%">No</th>
									<th width="17%">Nama Barang</th>
									<th width="25%">Stok Tersisa</th>
								</tr>
							</thead>
							<tbody>
								<?php 
                                $no = 1;
                                foreach($record as $row){
                                ?>
								<tr>
									<td><?= $no++; ?></td>
									<td><?= $row->nama; ?></td>
									<td><?= $row->stok; ?></td>
								</tr>
								<?php   
                                }
                                ?>
							</tbody>
							<tfoot>
								<th>No</th>
								<th>Nama Barang</th>
								<th>Stok Tersisa</th>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
