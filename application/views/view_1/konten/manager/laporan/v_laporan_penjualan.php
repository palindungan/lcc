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
                                    <h2>Data Laporan</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                            <div class="breadcomb-report">
                                <button data-toggle="tooltip" data-placement="left" title="Download Report" class="btn"><i class="notika-icon notika-sent"></i></button>
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
<div class="form-element-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-element-list">
                    <div class="basic-tb-hd">
                        <h2>Laporan</h2>
        <div class="row mt-3">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-12">
                                <form action="<?php echo base_url('manager/laporan/print_laporan') ?>" method="post" target="_blank">
                                <p>tanggal mulai</p>
                                <input type="date" name="tgl_mulai">
                                <p>tanggal akhir</p> 
                                <input type="date" name="tgl_akhir">
                                <select name="filter">
                                    <option>--pilih pencarian--</option>
                                    <option>Hari</option>
                                    <option>Minggu</option>
                                    <option>Bulan</option>
                                </select>
                                <button type="submit" class="btn btn-info btn-sm pull-right">Print</button>
                                </form>
                                <table class="table table-hover" id="tbl_users">
                                    <thead>
                                        <th>No</th>
                                        <th>Tangal</th>
                                        <th>Total</th>
                                        <th>Bayar</th>
                                        <th>Kembalian</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                <?php 
                                $no = 1;
                                foreach($laporanku as $l){ 
                                ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $l->tanggal ?></td>
                                    <td><?php echo $l->total ?></td>
                                    <td><?php echo $l->bayar ?></td>
                                    <td><?php echo $l->kembalian ?></td>
                                </tr>
                                <?php } ?>
                                            
                                        </tr>
                                    </tbody>
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
</div>
<!-- Form Element area End-->