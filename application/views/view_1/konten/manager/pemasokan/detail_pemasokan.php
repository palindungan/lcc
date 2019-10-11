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
                                    <h2>DETAIL PEMASOKAN</h2>
                                    <p>Welcome to Notika <span class="bread-ntd">Admin Template</span></p>
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

<?php
foreach ($pemasokan_list as $row) {
    $nama_distributor = $row->nama;
    $nama_manager = $row->nama_user;
    $a = $row->tanggal;
    $tanggal = date('d/m/Y H:i:s', strtotime($a));
    $id_pemasokan =  $row->id_pemasokan;
    $total = $row->total;
} ?>

<!-- Form Element area Start-->
<div class="data-table-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="data-table-list">

                    <div style="margin-bottom: 20px;">
                        <a onclick="window.history.back();" class="btn btn-primary btn-lg">Kembali</a>
                    </div>
                    <table class="table table-borderless" width="100">
                        <tr>
                            <th width="11%">Distributor</th>
                            <th width="1%">:</th>
                            <th><?= $nama_distributor; ?></th>
                            <th width="11%">Manager</th>
                            <th width="1%">:</th>
                            <th><?= $nama_manager; ?></th>
                        </tr>
                        <tr>
                            <th>Tanggal</th>
                            <th>:</th>
                            <th><?= $tanggal; ?></th>
                            <th>Kode</th>
                            <th>:</th>
                            <th><?= $id_pemasokan; ?></th>
                        </tr>
                    </table>
                    <table class="table table-sm table-borderless" width="100%">
                        <thead>
                            <tr>
                                <th width="7%" scope="col">NO</th>
                                <th width="35%" scope="col">NAMA BARANG</th>
                                <th width="10%" scope="col">QTY</th>
                                <th width="24%" scope="col">HARGA BARANG</th>
                                <th width="24%" style="text-align:center" scope="col">TOTAL HARGA</th>
                                <th width="7%">BARCODE</th>
                                <th width="7%">KODE UNIK</th>
                            </tr>

                        </thead>
                        <tbody>
                            <?php
                            foreach ($pemasokan_list_detail as $row) {
                                ?>
                                <tr>
                                    <td width="7%" scope="row"><?= $row->id_pemasokan; ?></td>
                                    <td width="35%"><?= $row->nama; ?></td>
                                    <td width="10%"><?= ($row->total_hrg / $row->hrg_distributor); ?></td>
                                    <td width="24%" style="text-align:right"><?= $row->hrg_distributor ?></td>
                                    <td width="24%" style="text-align:right"><?= $row->total_hrg ?></td>
                                    <td><?= $row->barcode; ?></td>
                                    <td><?= $row->kode_unik; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <table class="table table-sm table-borderless">
                        <tr>
                            <th width="7%"></th>
                            <th width="59%"></th>
                            <th style="text-align:right" width="22%">Total</th>
                            <th style="text-align:right"><?= $total; ?></th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Form Element area End-->

<script src="<?= base_url(); ?>assets/vendor/auto_complete/jquery-3.4.1.min.js"></script>