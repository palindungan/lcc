<script>
    function detail(id_penjualan){
        $.ajax ({
            url: "<?php echo base_url(). 'manager/laporan/detail_data'; ?>",
            type:"POST",
            data:{id : id_penjualan},
            success: function(ajaxData) {
                $("#modaldetail").html(ajaxData);
                $("#modaldetail").modal('show', {
                    backdrop:'true'
                });
            }
        });
    }
</script>
    <div id="modaldetail" class="modal fade" role="dialog">
    </div>
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
            <form action="<?php echo base_url('manager/laporan/print_laporan') ?>" method="post" target="_blank">
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
                                        <div class="table-responsive">
                                           <div class="row">
                                            <div class="col-md-4 col-md-offset-4">
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                      <a class="btn btn-primary btn-block" style="align: right " href="<?php echo base_url().'manager/laporan/cetak_hari' ?>">print</a>
                                                    </span>
                                                </div><!-- /input-group -->
                                            </div>
                                            </div>
                                            <table width="100%" class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th width="5%">No</th>
                                                        <th width="17%">Tanggal</th>
                                                        <th width="25%">Total</th>
                                                        <th width="25%">Bayar</th>
                                                        <th width="25%">Kembalian</th>
                                                        <th width="25%">Action</th>
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
                                                        <td>
                                                            <button type="button" class="btn btn-sm btn-primary" onclick="detail('<?php echo $row_hari->id_penjualan; ?>')"><i class="icofont-ui-edit"></i>Detail</button>
                                                         </td>
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
                                            <div class="row">
                                            <div class="col-md-3 col-md-offset-3">
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                      <a class="btn btn-primary btn-block"href="<?php echo base_url().'manager/laporan/cetak_minggu' ?>">print</a>
                                                    </span>
                                                </div><!-- /input-group -->
                                            </div>
                                            </div>
                                            <table width="100%" class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th width="5%">No</th>
                                                        <th width="17%">Tanggal</th>
                                                        <th width="25%">Total</th>
                                                        <th width="25%">Bayar</th>
                                                        <th width="25%">Kembalian</th>
                                                        <th width="25%">Action</th>
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
                                                        <td>
                                                             <button type="button" class="btn btn-sm btn-primary" onclick="detail(<?php echo $row_minggu->id_penjualan; ?>)"><i class="icofont-ui-edit"></i>Detail</button>
 
                                                         </td>
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
                                            <div class="row">
                                            <div class="col-md-3 col-md-offset-3">
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                      <a class="btn btn-primary btn-block"href="<?php echo base_url().'manager/laporan/cetak_bulan' ?>">print</a>
                                                    </span>
                                                </div><!-- /input-group -->
                                            </div>
                                            </div>
                                            <table width="100%" class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th width="5%">No</th>
                                                        <th width="17%">Tanggal</th>
                                                        <th width="25%">Total</th>
                                                        <th width="25%">Bayar</th>
                                                        <th width="25%">Kembalian</th>
                                                        <th width="25%">Action</th>
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
                                                        <td>
                                                             <button type="button" class="btn btn-sm btn-primary" onclick="detail(<?php echo $row_minggu->id_penjualan; ?>)"><i class="icofont-ui-edit"></i>Detail</button>
                                                         </td>
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
