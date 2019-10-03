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
                                        <div class="table-responsive">
                                            <form action="<?php echo base_url('manager/laporan/print_laporan') ?>" method="post" target="_blank">
                                                <p>tanggal mulai</p>
                                                <input type="date" name="tgl_mulai">
                                                <p>tanggal akhir</p> 
                                                <input type="date" name="tgl_akhir">
                                                <button type="submit" class="btn btn-info btn-sm pull-right">Print</button>
                                                </form>
                                            <table width="100%" class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th width="5%">No</th>
                                                        <th width="17%">Tanggal</th>
                                                        <th width="25%">Total</th>
                                                        <th width="25%">Bayar</th>
                                                        <th width="25%">Kembalian</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                    $no_hari = 1;
                                                    foreach($hari as $row_hari){
                                                    ?>
                                                    <tr>
                                                        <td><?= $no_hari++; ?></td>
                                                        <td><?= $row_hari->tanggal; ?></td>
                                                        <td><?= $row_hari->total; ?></td>
                                                        <td><?= $row_hari->bayar; ?></td>
                                                        <td><?= $row_hari->kembalian; ?></td>
                                                    </tr>
                                                    <?php   
                                                    }
                                                    ?>
                                                </tbody>
                                                <tfoot>
                                                    <th>No</th>
                                                    <th>Tanggal</th>
                                                    <th>Total</th>
                                                    <th>Bayar</th>
                                                    <th>Kembalian</th>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="menu1" class="tab-pane fade">
                                <div class="tab-ctn">
                                    <div class="data-table-list">
                                        <div class="table-responsive">
                                            <form action="<?php echo base_url('manager/laporan/print_laporan') ?>" method="post" target="_blank">
                                                <p>tanggal mulai</p>
                                                <input type="date" name="tgl_mulai">
                                                <p>tanggal akhir</p> 
                                                <input type="date" name="tgl_akhir">
                                                <button type="submit" class="btn btn-info btn-sm pull-right">Print</button>
                                                </form>
                                            <table width="100%" class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th width="5%">No</th>
                                                        <th width="17%">Tanggal</th>
                                                        <th width="25%">Total</th>
                                                        <th width="25%">Bayar</th>
                                                        <th width="25%">Kembalian</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                    $no_minggu = 1;
                                                    foreach($minggu as $row_minggu){
                                                    ?>
                                                    <tr>
                                                        <td><?= $no_minggu++; ?></td>
                                                        <td><?= $row_minggu->tanggal; ?></td>
                                                        <td><?= $row_minggu->total; ?></td>
                                                        <td><?= $row_minggu->bayar; ?></td>
                                                        <td><?= $row_minggu->kembalian; ?></td>
                                                    </tr>
                                                    <?php   
                                                    }
                                                    ?>
                                                </tbody>
                                                <tfoot>
                                                    <th>No</th>
                                                    <th>Tanggal</th>
                                                    <th>Total</th>
                                                    <th>Bayar</th>
                                                    <th>Kembalian</th>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="menu2" class="tab-pane fade">
                                <div class="tab-ctn">
                                    <div class="data-table-list">
                                        <div class="table-responsive">
                                            <form action="<?php echo base_url('manager/laporan/print_laporan') ?>" method="post" target="_blank">
                                                <p>tanggal mulai</p>
                                                <input type="date" name="tgl_mulai">
                                                <p>tanggal akhir</p> 
                                                <input type="date" name="tgl_akhir">
                                                <button type="submit" class="btn btn-info btn-sm pull-right">Print</button>
                                                </form>
                                            <table width="100%" class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th width="5%">No</th>
                                                        <th width="17%">Tanggal</th>
                                                        <th width="25%">Total</th>
                                                        <th width="25%">Bayar</th>
                                                        <th width="25%">Kembalian</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                    $no_bulan = 1;
                                                    foreach($bulanan as $row_bulan){
                                                    ?>
                                                    <tr>
                                                        <td><?= $no_bulan++; ?></td>
                                                        <td><?= $row_bulan->tanggal; ?></td>
                                                        <td><?= $row_bulan->total; ?></td>
                                                        <td><?= $row_bulan->bayar; ?></td>
                                                        <td><?= $row_bulan->kembalian; ?></td>
                                                    </tr>
                                                    <?php   
                                                    }
                                                    ?>
                                                </tbody>
                                                <tfoot>
                                                    <th>No</th>
                                                    <th>Tanggal</th>
                                                    <th>Total</th>
                                                    <th>Bayar</th>
                                                    <th>Kembalian</th>
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
