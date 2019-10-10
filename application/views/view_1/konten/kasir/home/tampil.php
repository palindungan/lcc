<div class="contact-info-area mg-t-30">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
				<div style="margin-bottom:20px;overflow-y: scroll; height:585px; width: auto;" class="contact-inner">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div style="margin-bottom:20px;">
								<input autofocus id="keyword" type="text" class="form-control" placeholder="Cari Barang...">
							</div>
						</div>
					</div>
					<div id="view">
						<?php
						$this->load->view('view_1/konten/kasir/home/barang_kasir', array('siswa' => $siswa));
						?>
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
										<div class="form-group <?php if (form_error('nama_customer') == true) {
																	echo "has-error";
																} ?>">
											<label for="inputEmail3" class="col-sm-2 control-label">Nama</label>
											<div class="col-sm-10">
												<input type="text" name="nama_customer" value="<?= set_value('nama_customer') ?>" class="form-control" id="inputEmail3" placeholder="Masukan nama customer">
												<span class="help-block"><?php echo form_error('nama_customer'); ?></span>
											</div>
										</div>
										<div class="form-group <?php if (form_error('no_hp_customer') == true) {
																	echo "has-error";
																} ?>">
											<label for="inputEmail3" class="col-sm-2 control-label">No.HP</label>
											<div class="col-sm-10">
												<input type="text" name="no_hp_customer" class="form-control" id="inputEmail3" placeholder="Masukan nomor hp customer">
												<span class="help-block"><?php echo form_error('no_hp_customer'); ?></span>
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
												<input type="text" name="total" readonly class="form-control text-right total_harga" id="total_harga" placeholder="Jumlah Total">
											</div>
										</div>
										<div class="form-group">
											<label for="inputEmail3" class="col-sm-2 control-label">Bayar</label>
											<div class="col-sm-10">
												<input type="text" name="bayar" class="form-control text-right total_harga" id="total_harga" placeholder="Masukan Jumlah Bayar">

											</div>
										</div>
										<div class="form-group">
											<label for="inputEmail3" class="col-sm-2 control-label">Kembali</label>
											<div class="col-sm-10">
												<input type="text" name="kembalian" readonly class="form-control text-right" id="kembalian" placeholder="Jumlah Kembalian">
											</div>
										</div>
										<div class="form-group">
											<label for="inputEmail3" class="col-sm-2 control-label"></label>
											<div class="col-sm-10 text-right">
												<button type="submit" class="btn btn-custom">Simpan</button>
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
	$(document).ready(function() {
		$('.add_cart').click(function() {
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
				success: function(data) {
					$('#cart_details').html(data);
					$("#keyword").val('');
					$("#keyword").focus();
				}
			});
		});

		$('#cart_details').load("<?php echo base_url(); ?>kasir/home/load");

		$(document).on('click', '.remove_inventory', function() {
			var row_id = $(this).attr("id");
			$.ajax({
				url: "<?php echo base_url(); ?>kasir/home/delete_cart",
				method: "POST",
				data: {
					row_id: row_id
				},
				success: function(data) {
					$('#cart_details').html(data);
					$("#keyword").val('');
					$("#keyword").focus();
				}
			});
		});
	});
</script>
<script>
	$(document).ready(function() {
		$("#keyword").keypress(function() { // Ketika tombol simpan di klik
			// Ubah text tombol search menjadi SEARCHING...
			// Dan tambahkan atribut disable pada tombol nya agar tidak bisa diklik lagi
			var keycode = (event.keyCode ? event.keyCode : event.which);
			if (keycode == '13') {
				$(this).html("SEARCHING...").attr("disabled", "disabled");
				$.ajax({
					url: "<?php echo base_url(); ?>kasir/home/cari",
					type: 'POST', // Tentukan type nya POST atau GET
					data: {
						keyword: $("#keyword").val()
					}, // Set data yang akan dikirim
					dataType: "json",
					beforeSend: function(e) {
						if (e && e.overrideMimeType) {
							e.overrideMimeType("application/json;charset=UTF-8");
						}
					},
					success: function(response) { // Ketika proses pengiriman berhasil
						// Ubah kembali text button search menjadi SEARCH
						// Dan hapus atribut disabled untuk meng-enable kembali button search nya
						$("#keyword").html("SEARCH").removeAttr("disabled");
						$("#keyword").val('');
						$("#keyword").focus();
						// Ganti isi dari div view dengan view yang diambil dari controller siswa function search
						$("#view").html(response.hasil);
						$('.add_cart').click(function() {
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
								success: function(data) {
									$('#cart_details').html(data);
									$("#keyword").val('');
									$("#keyword").focus();
								}
							});
						});

						$('#cart_details').load("<?php echo base_url(); ?>kasir/home/load");

						$(document).on('click', '.remove_inventory', function() {
							var row_id = $(this).attr("id");
							$.ajax({
								url: "<?php echo base_url(); ?>kasir/home/delete_cart",
								method: "POST",
								data: {
									row_id: row_id
								},
								success: function(data) {
									$('#cart_details').html(data);
									$("#keyword").val('');
									$("#keyword").focus();
								}
							});
						});
					},
					error: function(xhr, ajaxOptions, thrownError) { // Ketika terjadi error
						alert(xhr.responseText); // munculkan alert
					}
				});
			}
		});
	});
</script>