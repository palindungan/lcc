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
				<form action="<?php echo base_url(); ?>kasir/home/store" method="POST">
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
										<input type="hidden" name="cart[<?= $item['id']; ?>][qty]"
											value="<?= $item['qty']; ?>" />
										<tr>
											<td><?= $item['name'] ?></td>
											<td class="text-right"><input type="text" name="harga_jual"
													class="form-control text-right"></td>
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
												<input type="text" name="total" class="form-control text-right"
													id="inputEmail3" placeholder="Masukan Jumlah Total">
											</div>
										</div>
										<div class="form-group">
											<label for="inputEmail3" class="col-sm-2 control-label">Bayar</label>
											<div class="col-sm-10">
												<input type="text" name="bayar" class="form-control text-right"
													id="inputEmail3" placeholder="Masukan jumlah pembayaran">
											</div>
										</div>
										<div class="form-group">
											<label for="inputEmail3" class="col-sm-2 control-label">Kembali</label>
											<div class="col-sm-10">
												<input type="text" name="kembalian" class="form-control text-right"
													id="inputEmail3" placeholder="Masukan Jumlah Kembalian">
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
