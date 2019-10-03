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
                                    <h2>Distributor</h2>
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
<div class="container-fluid">
    <a href="<?php echo base_url("manager/distributor/insert") ?>">tambah</a>
    <table class="table-striped table-bordered table-condensed table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>alamat</th>
                                <th>NO Hp</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $no = 1;
                            foreach ($data as $a) {
                            ?>
                            <tr>
                             <td><?php echo $no++; ?></td>
                             <td><?php echo $a->nama; ?></td>
                             <td><?php echo $a->alamat; ?></td>
                             <td><?php echo $a->no_hp; ?></td>
                             <td><div class="table-actions">
                                 <a href="<?php echo base_url("manager/distributor/edit/".$a->id_distributor) ?>">edit</a>
                                 <a href="<?php echo base_url("manager/distributor/hapus/".$a->id_distributor) ?>">delete</a>
                                 </div>
                             </td>
                             </tr>
                             <?php } ?>
                        </tbody>
                        
</table>
</div>                    
<!-- Form Element area End-->