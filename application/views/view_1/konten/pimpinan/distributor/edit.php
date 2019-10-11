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
                                    <h2>Edit Data Distributor</h2>
                                    <p>Masukkan data anda</p>
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
                        <form action="<?php echo base_url("pimpinan/distributor/update") ?>" method="post">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group <?php if(form_error('nama')== true) { echo "has-error";} ?>">
                                <div class="form-ic-cmp">
                                </div>
                                <div class="nk-int-st">
                                    <label>Nama</label>
                                    <input type="hidden" name="id_distributor" value="<?php echo $data->id_distributor ?>">
                                    <input type="text" class="form-control" value="<?php echo $data->nama ?>" name="nama">
                                    <span class="help-block"><?php echo form_error('nama'); ?></span>  
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group <?php if(form_error('alamat')== true) { echo "has-error";} ?>">
                                <div class="form-ic-cmp">
                                </div>
                                <div class="nk-int-st">
                                    <label>Alamat</label>
                                    <input type="text" class="form-control" value="<?php echo $data->alamat ?>" name="alamat">
                                     <span class="help-block"><?php echo form_error('alamat'); ?></span> 
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group  <?php if(form_error('no_hp')== true) { echo "has-error";} ?>">
                                <div class="form-ic-cmp">
                                </div>
                                <div class="nk-int-st">
                                    <label>No Hp</label>
                                    <input type="text" class="form-control" value="<?php echo $data->no_hp ?>" name="no_hp">
                                    <span class="help-block"><?php echo form_error('no_hp'); ?></span>  
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a onclick=self.history.back() class="btn btn-danger">Kembali</a>
                                
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<!-- Form Element area End-->