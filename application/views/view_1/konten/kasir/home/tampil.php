<div class="contact-info-area mg-t-30">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
				<div style="margin-bottom:20px;overflow-y: scroll; height:585px; width: auto;" class="contact-inner">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div style="margin-bottom:10px;" class="input-group">
								<input type="text" name="search_text" id="search_text" class="form-control"
									placeholder="Cari Barang">
								<span class="input-group-btn">
									<button class="btn btn-default" type="button">Go!</button>
								</span>
							</div><!-- /input-group -->
						</div>
					</div>
					<div class="row">
						<?php 
						foreach($record as $row)
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
										<button type="button" class="btn btn-success add_cart"
											data-productname="<?= $row->nama ?>" data-quantity="<?= $quantity ?>"
											data-price="<?= $price ?>" data-productid="<?= $row->id_stok_b ?>">Add
											to
											Cart</button>
									</p>
								</div>
							</div>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-5 col-sm-5 col-xs-12">
				<form action="<?php echo base_url(); ?>kasir/home/store" method="POST" id="transaksi_form">
					<div class="contact-inner">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<h4 class="text-center">Customer</h4>
								<div style="padding-left:20px;padding-right:20px;" class="row">
									<div class="form-horizontal">
										<div class="form-group">
											<label for="inputEmail3" class="col-sm-2 control-label">Nama</label>
											<div class="col-sm-10">
												<input type="text" name="nama_customer" class="form-control"
													id="inputEmail3" placeholder="Masukan nama customer">
											</div>
										</div>
										<div class="form-group">
											<label for="inputEmail3" class="col-sm-2 control-label">No.HP</label>
											<div class="col-sm-10">
												<input type="text" name="no_hp_customer" class="form-control"
													id="inputEmail3" placeholder="Masukan nomor hp customer">
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div style="margin-top:20px;" class="contact-inner">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<h4 class="text-center">Keranjang Belanja</h4>
								<div class="table-responsive">
									<div id="cart_details"></div>
								</div>
							</div>
						</div>
					</div>
					<div style="margin-top:20px;" class="contact-inner">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<h4 class="text-center">Pembayaran</h4>
								<div style="padding-left:20px;padding-right:20px;" class="row">
									<div class="form-horizontal">
										<div class="form-group">
											<label for="inputEmail3" class="col-sm-2 control-label">Total</label>
											<div class="col-sm-10">
												<input type="text" name="total"
													class="form-control text-right total_harga" id="total_harga"
													placeholder="Masukan Jumlah Total">
											</div>
										</div>
										<div class="form-group">
											<label for="inputEmail3" class="col-sm-2 control-label">Bayar</label>
											<div class="col-sm-10">
												<input type="text" name="bayar"
													class="form-control text-right total_harga" id="total_harga"
													placeholder="Masukan Jumlah Bayar">

											</div>
										</div>
										<div class="form-group">
											<label for="inputEmail3" class="col-sm-2 control-label">Kembali</label>
											<div class="col-sm-10">
												<input type="text" name="kembalian" class="form-control text-right"
													id="kembalian" placeholder="Masukan Jumlah Kembalian">
											</div>
										</div>
										<div class="form-group">
											<label for="inputEmail3" class="col-sm-2 control-label"></label>
											<div class="col-sm-10 text-right">
												<button type="submit" class="btn btn-primary">Simpan</button>
												<a target="_blank" href="" class="btn btn-success">Print</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
	$(document).ready(function () {

		$('.add_cart').click(function () {
			var product_id = $(this).data("productid");
			var product_name = $(this).data("productname");
			var product_price = $(this).data("price");
			var quantity = $(this).data("quantity");
			$.ajax({
				url: "<?php echo base_url(); ?>kasir/home/add_cart",
				method: "POST",
				data: {
					product_id: product_id,
					product_name: product_name,
					product_price: product_price,
					quantity: quantity
				},
				success: function (data) {
					$('#cart_details').html(data);
				}
			});
		});

		$('#cart_details').load("<?php echo base_url(); ?>kasir/home/load");

		$(document).on('click', '.remove_inventory', function () {
			var row_id = $(this).attr("id");
			$.ajax({
				url: "<?php echo base_url(); ?>kasir/home/delete_cart",
				method: "POST",
				data: {
					row_id: row_id
				},
				success: function (data) {
					$('#cart_details').html(data);
				}
			});
		});
	});

</script>
