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
                                    <h2>Pemasokan</h2>
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

<!-- Form Element area Start-->
<div class="form-element-list">
    <form id="transaksi_form" method="post">

        <div class="basic-tb-hd">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="form-group">
                        <div class="bootstrap-select fm-cmp-mg">
                            <select id="cari_kode_barang" class="selectpicker" data-live-search="true">

                                <option value="">Cari Barang</option>

                                <option>Nama Barang</option>


                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="form-group">
                        <a id="add_more" name="add_more" class="btn btn-primary">+</a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                    <div class="form-group">
                        <button onclick="return confirm('Yakin ingin Mengirim data Permintaan ?')" id="action" type="submit" name="simpan" class="btn btn-primary mr-2">Simpan Pemesanan</button>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                    <div class="form-group">
                        <a onclick="window.history.back();" class="btn btn-danger">Kembali</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
                <label>No</label>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <label>Kode Barang</label>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <label>Nama Barang</label>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <label>Jumlah Barang</label>
            </div>
        </div>

        <div id="span_product_details">
            <!-- disini isi detail -->
        </div>

    </form>
</div>
<!-- Form Element area End-->