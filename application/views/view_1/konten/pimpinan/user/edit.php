<?php 
foreach($edit as $data){
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
                                    <h2>Edit Data</h2>
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
                        <form action="<?php echo base_url("pimpinan/user/update") ?>" method="post">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                           <div class="form-group <?php if(form_error('nama_user')== true) { echo "has-error";} ?>">
                                <div class="form-ic-cmp">
                                </div>
                                    <label>Nama</label>
                                    <input type="hidden" name="id_user" value="<?php echo $data->id_user ?>">
                                    <input type="text" class="form-control" value="<?php echo $data->nama_user ?>" name="nama_user">
                                    <span class="help-block"><?php echo form_error('nama_user'); ?></span>  
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group <?php if(form_error('username')== true) { echo "has-error";} ?>">
                                <div class="form-ic-cmp">
                                </div>
                                    <label>Username</label>
                                    <input type="text" class="form-control" value="<?php echo $data->username ?>" name="username">
                                    <span class="help-block"><?php echo form_error('username'); ?></span>  
                                    <input type="hidden" name="password" value="<?php echo $data->password ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group ic-cmp-int">
                                <div class="form-ic-cmp">
                                </div>
                                <div class="nk-int-st">
                                   <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a onclick=self.history.back() class="btn btn-danger">Kembali</a>
                                </div>
                            </div>
                        </div><br>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<!-- Form Element area End