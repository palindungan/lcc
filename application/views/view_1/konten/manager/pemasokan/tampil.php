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
<div class="form-element-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-element-list">
                    <form id="transaksi_form" method="post">

                        <div class="basic-tb-hd">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <div class="bootstrap-select fm-cmp-mg">
                                            <select class="selectpicker" data-live-search="true">
                                                <option value="">Pilih Distributor</option>
                                                <?php foreach ($distributor as $d) {  ?>
                                                    <option value="<?php echo $d->id_distributor ?>">
                                                        <?php echo $d->nama ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group nk-datapk-ctm form-elet-mg" id="data_1">
                                        <div class="input-group date nk-int-st">
                                            <span class="input-group-addon"></span>
                                            <input type="text" class="form-control" value="" placeholder="Tanggal">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Total">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                    <div class="form-group">
                                        <button type="button" id="add_baris" class="form-control btn btn-primary">+ Tambah Baris</button>
                                    </div>
                                </div>

                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                    <div class="form-group">
                                        <button id="btn_search" type="button" class="form-control btn btn-success" data-toggle="modal" data-target="#myModalthree"><i class="notika-icon notika-search"></i> Cari Barang</button>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"></div>

                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                    <div class="form-group">
                                        <button onclick="return confirm('Lakukan Pemasokan ?')" id="action" type="submit" name="simpan" class="form-control btn btn-danger">Simpan Pemasokan</button>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <label>Kode</label>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <label>Nama</label>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
                                <label>Qty</label>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <label>Harga</label>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                <label>Hapus</label>
                            </div>
                        </div>

                        <div id="detail_list">
                            <!-- disini isi detail -->

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Form Element area End-->

<div class="modal fade" id="myModalthree" role="dialog">
    <div class="modal-dialog modal-large">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            <h3>Pencarian Barang</h3>
                            <p>*stok barang di toko anda*</p>
                        </div>
                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped table_1">
                                <thead>
                                    <tr>
                                        <th>Barcode</th>
                                        <th>Nama</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody id="daftar_barang">
                                    <!-- isi tabel -->
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Barcode</th>
                                        <th>Nama</th>
                                        <th>Opsi</th>
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

<script src="<?= base_url(); ?>assets/notika/js/vendor/jquery-3.3.1.min.js"></script>

<script>
    $(document).ready(function() {

        // first state
        var count1 = 0;
        tampilDetail(count1);

        // tambah ke database Start

        // tambah ke database End

        // script untuk tampil detail paket
        function tampilDetail(count1) {

            $('#detail_list').append(`

                <div id="row` + count1 + `" class="row">
                    <br />
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <input type="text" class="form-control" placeholder="Kode/Barcode" value="` + count1 + `">
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <input type="text" class="form-control" placeholder="Nama Barang" value="">
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
                        <input type="number" class="form-control" placeholder="qty" value="">
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <input type="number" class="form-control" placeholder="Harga" value="">
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                        <button type="button" id="` + count1 + `" class="remove_baris btn btn-danger"><i class="notika-icon notika-trash"></i>` + count1 + `</button>
                    </div>
                </div>

            `);

        }

        // jika kita tekan tambah / click button
        $('#add_baris').on('click', function() {
            count1 = count1 + 1;
            tampilDetail(count1);
        });

        // jika kita tekan hapus / click button
        $(document).on('click', '.remove_baris', function() {
            var row_no = $(this).attr("id");
            $('#row' + row_no).remove();
        });

    });

    // script untuk menu pencarian
    function search_proses() {
        $('#daftar_barang').html('');

        $.ajax({
            url: "<?php echo base_url() . 'manager/pemasokan/tampil_daftar_barang'; ?>",
            success: function(hasil) {

                var obj = JSON.parse(hasil);
                let data = obj['tbl_data'];

                var table;
                table = $('.table_1').DataTable();
                if (data != '') {
                    $.each(data, function(i, item) {
                        table.row.add([data[i].barcode, data[i].nama, `<a id="` + data[i].kode + `" class="btn btn-danger">Pilih</a>`]);
                    });
                } else {
                    $('.table_1').html('<h3>No data are available</h3>');
                }
                table.draw();

            }
        });
    }

    // jika kita tekan / click button search-button
    $('#btn_search').on('click', function() {
        search_proses();
    });
</script>