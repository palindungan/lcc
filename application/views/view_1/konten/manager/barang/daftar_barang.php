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
									<h2>Data Barang</h2>
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
									<th width="1%">No</th>
									<th width="17%">Kode</th>
									<th width="25%">Nama</th>
									<th width="2%">Stok</th>
									<th width="20%" style="text-align:center">Harga Beli</th>
									<th width="15%">Tanggal Suplai</th>
									<th width="10%">Jam Suplai</th>
								</tr>
							</thead>
							<tbody>
								<?php 
                                $no = 1;
                                $grand = 0;
                                foreach($record as $row){
                                    $kode = "";
                                    if($row->kode_unik == "kosong")
                                    {
                                        $kode = $row->barcode;
                                    } else {
                                        $kode = $row->kode_unik;
                                    }
                                ?>
								<tr>
									<td><?= $no++; ?></td>
									<td><?= $kode; ?></td>
									<td><?= $row->nama; ?></td>
									<td><?= $row->qty ?></td>
									<td style="text-align:right;"><?= $row->hrg_distributor ?></td>
									<td><?= date('d F Y', strtotime($row->tanggal)) ?></td>
									<td><?= date('h:i:s', strtotime($row->tanggal)) ?></td>
								</tr>

								<?php 
                                $sub_total = $row->hrg_distributor * $row->qty;  
                                $grand += $sub_total;  
                            }
                                ?>
								<span style="font-size:25px;font-weight:bold">SAHAM </span>
								<span style="font-size:25px;font-weight:bold"><?= $grand ?></span>
							</tbody>
							<tfoot>
								<th>No</th>
								<th>Kode</th>
								<th>Nama</th>
								<th>Stok</th>
								<th>Harga Beli</th>
								<th>Tanggal Suplai</th>
								<th>Jam Suplai</th>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
