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
                                    <h2>Data User</h2>
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
                        <form action="<?php echo base_url("manager/user/insert_data") ?>" method="post">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group ic-cmp-int">
                                <div class="form-ic-cmp">
                                </div>
                                <div class="nk-int-st">
                                    <label>Nama</label>
                                    <input type="text" class="form-control" placeholder="Masukan Nama" name="nama_user" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group ic-cmp-int">
                                <div class="form-ic-cmp">
                                </div>
                                <div class="nk-int-st">
                                    <label>Username</label>
                                    <input type="text" class="form-control" placeholder="Masukan Username" name="username" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group ic-cmp-int">
                                <div class="form-ic-cmp">
                                </div>
                                <div class="nk-int-st">
                                    <label>password</label>
                                    <input type="text" class="form-control" placeholder="Masukan password" name="password" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group ic-cmp-int">
                                <div class="form-ic-cmp">
                                </div>
                                <div class="nk-int-st">
                                    <label>jenis akses</label>
                                    <select class="selectpicker" name="jenis_akses" required>
                                       <option>pilih</option>
                                       <option>manager</option>
                                       <option>kasir</option>
                                   </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group ic-cmp-int">
                                <div class="form-ic-cmp">
                                </div>
                                <div class="nk-int-st">
                                    <label>toko</label>
                                    <select class="selectpicker" name="id_toko" required>
                                        <option>pilih</option>
                                        <?php 
                                        foreach($toko as $t){
                                         ?>
                                         <option value="<?php echo $t->id_toko ?>"><?php echo $t->nama_toko ?></option>
                                       <?php  }?> 
                                    </select>
                                </div>
                            </div>
                        </div><br>
                        <input type="submit" value="Simpan">
                        <input type="reset" value=Kembali onclick=self.history.back()>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Form Element area End-->