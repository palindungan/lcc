<div class="row">
	<?php 
    if( ! empty($siswa)){
						foreach($siswa as $row)
						{
							$kode = "";
							if($row->kode_unik == "kosong")
							{
								$kode = $row->barcode;
							}
							else {
								$kode = $row->kode_unik;
							}
							$price = 2000;
							$quantity = 1;
						?>
	<div style="margin-bottom:5px;" class="col-lg-3 col-md-4 col-sm-6 col-xs-6">
		<div class="thumbnail">
			<div class="caption">
				<p class="text-center"><b><?= $kode ?></b></p>
				<p style="font-size:14px"><?= $row->nama ?></p>
				<p style="font-size:14px"><?= date('d F Y', strtotime($row->tanggal)) ?></p>
				<p class="text-center">
					<button type="button" class="btn btn-success add_cart" data-productname="<?= $row->nama ?>"
						data-quantity="<?= $quantity ?>" data-price="<?= $price ?>"
						data-productid="<?= $row->id_stok_b ?>">Add
						to
						Cart</button>
				</p>
			</div>
		</div>
	</div>
	<?php }
    } else{ // Jika data tidak ada
    echo "Data tidak ketemu";
    }
     ?>
</div>
