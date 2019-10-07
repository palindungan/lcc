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
                                    <h2>Data Penjualan</h2>
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
<div class="data-table-area">
    <div class="container">
        <h4>Laporan Periode</h4>
        <div class="row" style="margin-bottom:27px;">
            <form action="<?php echo base_url('laporan_manager/custom') ?>" method="post" target="_blank">
            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12" style="margin-bottom:27px;">
                <div id="data_1">
                    <div class="input-group date nk-int-st">
                        <span class="input-group-addon"></span>
                        <input type="text" class="form-control" name="tgl_mulai"  placeholder="Tanggal Mulai">
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12" style="margin-bottom:27px;">
            	<div id="data_1">
            		<div class="input-group date nk-int-st">
            			<span class="input-group-addon"></span>
            			<input type="text" class="form-control" name="tgl_akhir" placeholder="Tanggal Akhir">
            		</div>
            	</div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                <div class="input-group">
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary btn-block">Print</button>
                    </span>
                </div><!-- /input-group -->
            </div>
             </form>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="widget-tabs-int">
                    <div class="widget-tabs-list">

                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#home">Hari Ini</a></li>
                            <li><a data-toggle="tab" href="#menu1">Minggu Ini</a></li>
                            <li><a data-toggle="tab" href="#menu2">Bulan Ini</a></li>
                        </ul>
                        <div class="tab-content tab-custom-st">
                            <div id="home" class="tab-pane fade in active">
                                <div class="tab-ctn">
                                    <div class="data-table-list">
                                        <div class="row">
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                        <a target="_blank" style="float:left;" class="btn btn-primary" style="align: right "
                                                            href="<?php echo base_url().'laporan_manager/hari_ini' ?>"><i
                                                            	class="glyphicon glyphicon-print"></i> Print Data</a>
                                                    </span>
                                                </div><!-- /input-group -->
                                        </div>
                                        <div class="table-responsive">
                                        	<table id="data-table-basic" class="table table-striped">
                                        		<thead>
                                        			 <tr>
                                        			 	<th width="1%" style="text-align: center;">No</th>
                                        			 	<th width="15%" style="text-align: center;">Nama Customer</th>
                                        			 	<th width="20%" style="text-align: center;">Tanggal & Waktu</th>
                                        			 	<th width="25%" style="text-align: center;">Nama Barang</th>
                                        			 	<th width="13%" style="text-align: center;">Harga Jual</th>
                                        			 	<th width="13%" style="text-align: center;">Qty</th>
                                        			 	<th width="13%" style="text-align: center;">Keuntungan</th>
                                        			 </tr>
                                        		</thead>
                                        			<tbody>
                                        				<?php 
                                                    $no_hari = 1;
                                                    $total_hari=0;
                                                    foreach($hari as $row_hari){
                                                    $keuntungan_hari = $row_hari->harga_jual *
                                                    $row_hari->jumlah_barang -
                                                    $row_hari->hrg_distributor * $row_hari->jumlah_barang;
                                                    ?>
                                        				<tr>
                                        					<td style="text-align: center;"><?= $no_hari++; ?></td>
                                        					<td><?= $row_hari->nama_customer; ?></td>
                                        					<td><?= $row_hari->tanggal_penjualan; ?>
                                        					</td>
                                        					<td style="text-align: center;"><?= $row_hari->nama_barang; ?></td>
                                        					<td style="text-align: right;"><?= rupiah($row_hari->harga_jual) ?>
                                        					</td>
                                        					<td style="text-align: center;"><?= $row_hari->jumlah_barang; ?></td>
                                        					<td style="text-align: right;"><?= rupiah($keuntungan_hari) ?>
                                        					</td>
                                        				</tr>
                                        				<?php 
                                                    $total_hari += $keuntungan_hari;  
                                                    }
                                                    ?>
                                        				<?php 
                                                    if($total_hari == "")
                                                    {
                                                        echo '<h4 style="float:right">Total Keuntungan : 0</h4>';
                                                    }
                                                    else {
                                                        echo '<h4 style="float: right;">Total Keuntungan :   '.rupiah($total_hari).'</h4>"';
                                                    }
                                                    ?>

                                        			</tbody>
                                        		<tfoot>
                                        			<tr>
                                        				<th style="text-align: center;">No</th>
                                        				<th style="text-align: center;">Nama Customer</th>
                                        				<th style="text-align: center;">Tanggal & Waktu</th>
                                        				<th style="text-align: center;">Nama Barang</th>
                                        				<th style="text-align: center;">Harga Jual</th>
                                        				<th style="text-align: center;">Qty</th>
                                        				<th style="text-align: center;">Keuntungan</th>
                                        			</tr>
                                        		</tfoot>
                                        	</table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="menu1" class="tab-pane fade">
                                <div class="tab-ctn">
                                    <div class="data-table-list">
                                        <div class="row">
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <a target="_blank" style="float:left" class="btn btn-primary"
                                                        style="align: right "
                                                        href="<?php echo base_url().'laporan_manager/minggu_ini' ?>"><i
                                                        	class="glyphicon glyphicon-print"></i> Print
                                                        Data</a>

                                                </span>
                                            </div><!-- /input-group -->
                                        </div>
                                        <div class="table-responsive">
                                        	<table id="data-table-basic" class="table table-striped">
                                        		<thead>
                                        			<tr>
                                        				<th width="1%" style="text-align: center;">No</th>
                                        				<th width="15%" style="text-align: center;">Nama Customer</th>
                                        				<th width="20%" style="text-align: center;">Tanggal & Waktu</th>
                                        				<th width="25%" style="text-align: center;">Nama Barang</th>
                                        				<th width="13%" style="text-align: center;">Harga Jual</th>
                                        				<th width="13%" style="text-align: center;">Qty</th>
                                        				<th width="13%" style="text-align: center;">Keuntungan</th>
                                        			</tr>
                                        		</thead>
                                        		<tbody>
                                        			<?php 
                                                    $no_minggu = 1;
                                                    $total_minggu=0;
                                                    foreach($minggu as $row_minggu){
                                                    $keuntungan_minggu = $row_minggu->harga_jual * $row_minggu->jumlah_barang -
                                                    $row_minggu->hrg_distributor * $row_minggu->jumlah_barang;
                                                    ?>
                                        			<tr>
                                        				<td style="text-align: center;"><?= $no_minggu++; ?></td>
                                        				<td><?= $row_minggu->nama_customer; ?></td>
                                        				<td>
                                        					<?= date('d/m/Y H:i:s', strtotime($row_minggu->tanggal_penjualan)); ?>
                                        				</td>
                                        				<td style="text-align: center;"><?= $row_minggu->nama_barang; ?>
                                        				</td>
                                        				<td style="text-align: right;">
                                        					<?= rupiah($row_minggu->harga_jual) ?>
                                        				</td>
                                        				<td style="text-align: center;"><?= $row_minggu->jumlah_barang; ?>
                                        				</td>
                                        				<td style="text-align: right;">
                                        					<?= rupiah($keuntungan_minggu) ?>
                                        				</td>
                                        			</tr>
                                        			<?php 
                                                    $total_minggu += $keuntungan_minggu;  
                                                    }
                                                    ?>
                                        			<?php 
                                                    if($total_minggu == "")
                                                    {
                                                        echo '<h4 style="float:right">Total Keuntungan : 0</h4>';
                                                    }
                                                    else {
                                                        echo '<h4 style="float: right;">Total Keuntungan :  '.rupiah($total_minggu).'</h4>"';
                                                    }
                                                    ?>

                                        		</tbody>
                                        		<tfoot>
                                        			<tr>
                                        				<th style="text-align: center;">No</th>
                                        				<th style="text-align: center;">Nama Customer</th>
                                        				<th style="text-align: center;">Tanggal & Waktu</th>
                                        				<th style="text-align: center;">Nama Barang</th>
                                        				<th style="text-align: center;">Harga Jual</th>
                                        				<th style="text-align: center;">Qty</th>
                                        				<th style="text-align: center;">Keuntungan</th>
                                        			</tr>
                                        		</tfoot>
                                        	</table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="menu2" class="tab-pane fade">
                                <div class="tab-ctn">
                                    <div class="data-table-list">
                                        <div class="row">
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <a target="_blank" style="float:left" class="btn btn-primary"
                                                        style="align: right "
                                                        href="<?php echo base_url().'laporan_manager/bulan_ini' ?>"><i
                                                        	class="glyphicon glyphicon-print"></i> Print
                                                        Data</a>
                                                </span>
                                            </div><!-- /input-group -->
                                        </div>
                                        <div class="table-responsive">
                                        	<table id="data-table-basic" class="table table-striped">
                                        		<thead>
                                        			<tr>
                                        				<th width="1%" style="text-align: center;">No</th>
                                        				<th width="15%" style="text-align: center;">Nama Customer</th>
                                        				<th width="20%" style="text-align: center;">Tanggal & Waktu</th>
                                        				<th width="25%" style="text-align: center;">Nama Barang</th>
                                        				<th width="13%" style="text-align: center;">Harga Jual</th>
                                        				<th width="13%" style="text-align: center;">Qty</th>
                                        				<th width="13%" style="text-align: center;">Keuntungan</th>
                                        			</tr>
                                        		</thead>
                                        		<tbody>
                                        			<?php 
                                                    $no_bulan = 1;
                                                    $total_bulan=0;
                                                    foreach($bulanan as $row_bulan){
                                                    $keuntungan_bulan = $row_bulan->harga_jual *
                                                    $row_bulan->jumlah_barang -
                                                    $row_bulan->hrg_distributor * $row_bulan->jumlah_barang;
                                                    ?>
                                        			<tr>
                                        				<td style="text-align: center;"><?= $no_bulan++; ?></td>
                                        				<td><?= $row_bulan->nama_customer; ?></td>
                                        				<td>
                                        					<?= $row_bulan->tanggal_penjualan; ?>
                                        				</td>
                                        				<td style="text-align: center;"><?= $row_bulan->nama_barang; ?>
                                        				</td>
                                        				<td style="text-align: right;">
                                        					<?= rupiah($row_bulan->harga_jual) ?>
                                        				</td>
                                        				<td style="text-align: center;">
                                        					<?= $row_bulan->jumlah_barang; ?>
                                        				</td>
                                        				<td style="text-align: right;">
                                        					<?= rupiah($keuntungan_bulan) ?>
                                        				</td>
                                        			</tr>
                                        			<?php 
                                                    $total_bulan += $keuntungan_bulan;  
                                                    }
                                                    ?>
                                        			<?php 
                                                    if($total_bulan == "")
                                                    {
                                                        echo '<h4 style="float:right">Total Keuntungan : 0</h4>';
                                                    }
                                                    else {
                                                        echo '<h4 style="float: right;">Total Keuntungan :  '.rupiah($total_bulan).'</h4>"';
                                                    }
                                                    ?>

                                        		</tbody>
                                        		<tfoot>
                                        			<tr>
                                        				<th style="text-align: center;">No</th>
                                        				<th style="text-align: center;">Nama Customer</th>
                                        				<th style="text-align: center;">Tanggal & Waktu</th>
                                        				<th style="text-align: center;">Nama Barang</th>
                                        				<th style="text-align: center;">Harga Jual</th>
                                        				<th style="text-align: center;">Qty</th>
                                        				<th style="text-align: center;">Keuntungan</th>
                                        			</tr>
                                        		</tfoot>
                                        	</table>
                                        </div>
                                    </div>
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
<!-- Data Table area Start-->
