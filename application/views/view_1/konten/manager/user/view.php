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
				 	<td><?php echo $data->nama_user ?></td>
				 	<td><?php echo $data->username ?></td>
				 	<td><?php echo $data->jenis_akses ?></td>
				 	<td><?php echo $data->id_toko ?></td>
				 	 <td>
                                        <div class="table-actions">
                                            <a href="<?php echo base_url("manager/User/edit/".$data->id_user) ?>">Edit</a>
                                            <a href="<?php echo base_url("manager/User/hapus/".$data->id_user) ?>">Hapus</a>
                                        </div>
                                    </td>
				 </tr>
				<?php  }?>
			</tbody>
		</table>
</div>