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
        <div class="row" style="margin-bottom:27px;">
            <form action="<?php echo base_url('laporan_manager/custom') ?>" method="post" target="_blank">
            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12" style="margin-bottom:27px;">
            <input type="date" name="tgl_mulai" class="form-control" >
            </div>
            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
            <input type="date" name="tgl_akhir" class="form-control" >
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
                                                        <a target="_blank" style="float:right" class="btn btn-primary" style="align: right "
                                                            href="<?php echo base_url().'laporan_manager/hari_ini' ?>">Prin
                                                            Data</a>
                                                    </span>
                                                </div><!-- /input-group -->
                                        </div>
                                        <div class="table-responsive">
                                            <table width="100%" class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th width="14%">No</th>
                                                        <th width="14%">Nama Customer</th>
                                                        <th width="14%">Tanggal</th>
                                                        <th width="14">Nama Barang</th>
                                                        <th width="14">Harga Jual</th>
                                                        <th width="14%">Jumlah Barang</th>
                                                        <th width="14%">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                    $no_hari = 1;
                                                    foreach($hari as $row_hari){
                                                    ?>
                                                    <tr>
                                                        <td><?= $no_hari++; ?></td>
                                                        <td><?= $row_hari->nama_customer; ?></td>
                                                        <td><?= $row_hari->tanggal_penjualan; ?></td>
                                                        <td><?= $row_hari->nama_barang; ?></td>
                                                        <td><?= $row_hari->harga_jual; ?></td>
                                                        <td><?= $row_hari->jumlah_barang; ?></td>
                                                        <td><?= $row_hari->total_harga; ?></td>
                                                    </tr>
                                                    <?php   
                                                    }
                                                    ?>
                                                </tbody>
                                                <tfoot>
                                                        <th width="14%">No</th>
                                                        <th width="14%">Nama Customer</th>
                                                        <th width="14%">Tanggal</th>
                                                        <th width="14">Nama Barang</th>
                                                        <th width="14">Harga Jual</th>
                                                        <th width="14%">Jumlah Barang</th>
                                                        <th width="14%">Total</th>
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
                                                    <a target="_blank" style="float:right" class="btn btn-primary"
                                                        style="align: right "
                                                        href="<?php echo base_url().'laporan_manager/minggu_ini' ?>">Prin
                                                        Data</a>
                                                </span>
                                            </div><!-- /input-group -->
                                        </div>
                                        <div class="table-responsive">
                                            <table width="100%" class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th width="14%">No</th>
                                                        <th width="14%">Nama Customer</th>
                                                        <th width="14%">Tanggal</th>
                                                        <th width="14">Nama Barang</th>
                                                        <th width="14">Harga Jual</th>
                                                        <th width="14%">Jumlah Barang</th>
                                                        <th width="14%">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                    $no_minggu = 1;
                                                    foreach($minggu as $row_minggu){
                                                    ?>
                                                    <tr>
                                                        <td><?= $no_minggu++; ?></td>
                                                        <td><?= $row_minggu->nama_customer; ?></td>
                                                        <td><?= $row_minggu->tanggal_penjualan; ?></td>
                                                        <td><?= $row_minggu->nama_barang; ?></td>
                                                        <td><?= $row_minggu->harga_jual; ?></td>
                                                        <td><?= $row_minggu->jumlah_barang; ?></td>
                                                        <td><?= $row_minggu->total_harga; ?></td>
                                                    </tr>
                                                    <?php   
                                                    }
                                                    ?>
                                                </tbody>
                                                <tfoot>
                                                        <th width="14%">No</th>
                                                        <th width="14%">Nama Customer</th>
                                                        <th width="14%">Tanggal</th>
                                                        <th width="14">Nama Barang</th>
                                                        <th width="14">Harga Jual</th>
                                                        <th width="14%">Jumlah Barang</th>
                                                        <th width="14%">Total</th>
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
                                                    <a target="_blank" style="float:right" class="btn btn-primary"
                                                        style="align: right "
                                                        href="<?php echo base_url().'laporan_manager/bulan_ini' ?>">Prin
                                                        Data</a>
                                                </span>
                                            </div><!-- /input-group -->
                                        </div>
                                        <div class="table-responsive">
                                            <table width="100%" class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th width="14%">No</th>
                                                        <th width="14%">Nama Customer</th>
                                                        <th width="14%">Tanggal</th>
                                                        <th width="14">Nama Barang</th>
                                                        <th width="14">Harga Jual</th>
                                                        <th width="14%">Jumlah Barang</th>
                                                        <th width="14%">Total</th
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                    $no_bulan = 1;
                                                    foreach($bulanan as $row_bulan){
                                                    ?>
                                                    <tr>
                                                       <td><?= $no_bulan++; ?></td>
                                                        <td><?= $row_bulan->nama_customer; ?></td>
                                                        <td><?= $row_bulan->tanggal_penjualan; ?></td>
                                                        <td><?= $row_bulan->nama_barang; ?></td>
                                                        <td><?= $row_bulan->harga_jual; ?></td>
                                                        <td><?= $row_bulan->jumlah_barang; ?></td>
                                                        <td><?= $row_bulan->total_harga; ?></td>                                                    </tr>
                                                    <?php   
                                                    }
                                                    ?>
                                                </tbody>
                                                <tfoot>
                                                        <th width="14%">No</th>
                                                        <th width="14%">Nama Customer</th>
                                                        <th width="14%">Tanggal</th>
                                                        <th width="14">Nama Barang</th>
                                                        <th width="14">Harga Jual</th>
                                                        <th width="14%">Jumlah Barang</th>
                                                        <th width="14%">Total</th>
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
