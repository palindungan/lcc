<!-- Breadcomb area Start-->
<?php 
foreach($distributor as $data){
 ?>
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
                                    <h2>Edit data</h2>
                                    <p>masukkan data anda</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
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
                    <div class="row">
                        <form action="<?php echo base_url("manager/distributor/update") ?>" method="post">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group ic-cmp-int">
                                <div class="form-ic-cmp">
                                </div>
                                <div class="nk-int-st">
                                    <label>Nama</label>
                                    <input type="hidden" name="id_distributor" value="<?php echo $data->id_distributor ?>">
                                    <input type="text" class="form-control" value="<?php echo $data->nama ?>" name="nama">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group ic-cmp-int">
                                <div class="form-ic-cmp">
                                </div>
                                <div class="nk-int-st">
                                    <label>Alamat</label>
                                    <input type="text" class="form-control" value="<?php echo $data->alamat ?>" name="alamat">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group ic-cmp-int">
                                <div class="form-ic-cmp">
                                </div>
                                <div class="nk-int-st">
                                    <label>no hp</label>
                                    <input type="text" class="form-control" value="<?php echo $data->no_hp ?>" name="no_hp">
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="submit" value="Simpan">
                    <input type="reset" value=Kembali onclick=self.history.back()>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<!-- Form Element area End-->