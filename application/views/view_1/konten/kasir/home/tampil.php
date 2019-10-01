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
						<form action="<?php echo base_url(); ?>kasir/home/add_cart" method="POST">
							<div id="result"></div>
						</form>
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
									<?php 
									$cart = $this->cart->contents();
								if (empty($cart)) {
								?>
									<h6 style="margin-top:20px;" class="text-center"> Keranjang Masih Kosong</h6>
									<?php
                        } else {
							echo "<table width='100%' class='table'>";
								foreach ($cart as $item) {
								?>
									<thead>
										<tr>
											<th class="text-center" width="58%">NAMA</th>
											<th class="text-center" width="40%">HARGA</th>
											<th width="1%">QTY</th>
											<th width="1%">.</th>
										</tr>
									</thead>
									<tbody>
										<input type="hidden" name="cart[<?= $item['id']; ?>][id]"
											value="<?= $item['id']; ?>" />
										<input type="hidden" name="cart[<?= $item['id']; ?>][name]"
											value="<?= $item['name']; ?>" />
										<input type="hidden" id="jumlah_barang" name="cart[<?= $item['id']; ?>][qty]"
											value="<?= $item['qty']; ?>" />
										<input type="hidden" id="sub_total">
										<tr>
											<td><?= $item['name'] ?></td>
											<td class="text-right"><input type="text" id="harga_jual" name="harga_jual"
													class="form-control text-right harga_jual"></td>
											<td class="text-center"><?= $item['qty'] ?></td>
											<td><a
													href="<?= base_url() ?>kasir/home/delete_cart/<?= $item['rowid']; ?>"><i
														class="btn btn-xs btn-danger glyphicon glyphicon-remove"></i></a>
											</td>
										</tr>
									</tbody>
									<?php
                            }
                            ?>

									<?php
                        }
                        ?>
									</table>
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
												<input type="text" name="bayar" class="form-control text-right"
													id="bayar" onkeyup="update_kembalian()"
													onchange="update_kembalian()" placeholder="Masukan jumlah
													pembayaran">
												<input type="hidden" id="total" name="totals">

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

		load_data();

		function load_data(query) {
			$.ajax({
				url: "<?php echo base_url(); ?>kasir/home/fetch",
				method: "POST",
				data: {
					query: query
				},
				success: function (data) {
					$('#result').html(data);
				}
			})
		}

		$('#search_text').keyup(function () {
			var search = $(this).val();
			if (search != '') {
				load_data(search);
			} else {
				load_data();
			}
		});
	});

</script>
<!-- <script>
	$(document).on('keyup', '.harga_jual', function (event) {
		event.preventDefault();
		var form_data = $("#transaksi_form").serialize();
		$.ajax({
			url: "<?php echo base_url(); ?>kasir/home",
			method: "POST",
			data: form_data,
			success: function (data) {
				$('.total_harga').val(data);
				update_kembalian();
			}
		});

		// start of  update value sub_total inputan
		// proses ambil index
		var get_no_id = $(this).attr("id"); //---jumlah_barang + index
		var no_id_nya = get_no_id.substring(13); //---ambil indexnya saja

		// objek yg spesifik
		var harga_jual = document.getElementById("harga_jual" + no_id_nya);
		var jumlah_barang = document.getElementById("jumlah_barang" + no_id_nya);
		var sub_total = document.getElementById("sub_total" + no_id_nya);

		var v_sub_total = parseInt(harga_jual.value) * parseInt(jumlah_barang.value);

		if (v_sub_total >= 0) {
			sub_total.value = v_sub_total;
		}
	});

	// Menghitung 

	// Menghitung kembalian
	function update_kembalian() {
		var total_harga = document.getElementById("total_harga");
		var total = document.getElementById("total");
		var bayar = document.getElementById("bayar");
		var kembalian = document.getElementById("kembalian");

		// parsing dan perhitungan
		var v_total = parseInt(total_harga.value);
		var v_bayar = parseInt(bayar.value);

		total.value = v_total;

		if (v_bayar >= v_total) {
			kembalian.value = bayar.value - v_total;
		} else {
			kembalian.value = null;
		}
	}
	// Menghitung kembalian

</script> -->
