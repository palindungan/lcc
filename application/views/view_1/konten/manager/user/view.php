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

<div class="container-fluid">
	<a href="<?php echo base_url("manager/user/insert") ?>" >Tambah</a>
		<table class="table-striped table-bordered table-condensed table table-hover">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama User</th>
					<th>username</th>
					<th>Jenis Akses</th>
					<th>toko</th>
					<th>aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$no = 1;
				foreach($user as $data){
				 ?>
				 <tr>
				 	<td><?php echo $no++ ?></td>
				 	<td><?php echo $data->nama_user?></td>
				 	<td><?php echo $data->username ?></td>
				 	<td><?php echo $data->jenis_akses ?></td>
				 	<td><?php echo $data->id_toko ?></td>
				 	 <td>
                                        <div class="table-actions">
                                            <a href="<?php echo base_url("manager/User/edit/".$data->id_user) ?>">Edit</a>
                                            <a href="<?php echo base_url("manager/User/hapus/".$data->id_user) ?>">Hapus</a>
                                            <a href="<?php echo base_url("manager/User/ganti_password/".$data->id_user) ?>">ganti password</a>
                                        </div>
                                    </td>
				 </tr>
				<?php  }?>
			</tbody>
		</table>
</div>