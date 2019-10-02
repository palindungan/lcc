<div class="breadcomb-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="breadcomb-list">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<div class="breadcomb-wp">
								<div class="breadcomb-icon">
									<i class="notika-icon notika-windows"></i>
								</div>
								<div class="breadcomb-ctn">
									<h2>BARANG TERLARIS</h2>
									<p>Welcome to Notika <span class="bread-ntd">Admin Template</span></p>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
							<div class="breadcomb-report">
								<button data-toggle="tooltip" data-placement="left" title="Download Report"
									class="btn"><i class="notika-icon notika-sent"></i></button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="data-table-area">
	<div class="container">
		<div class="row" style="margin-bottom:27px;">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="widget-tabs-int">
					<div class="widget-tabs-list">
						<ul class="nav nav-tabs">
							<li class="active"><a data-toggle="tab" href="#home">Minggu Ini</a></li>
							<li><a data-toggle="tab" href="#menu1">Bulan Ini</a></li>
							<li><a data-toggle="tab" href="#menu2">Tahun Ini</a></li>
						</ul>
						<div class="tab-content tab-custom-st">
							<div id="home" class="tab-pane fade in active">
								<div class="tab-ctn">
									<div class="data-table-list">
										<div class="table-responsive">
											<table width="100%" id="data-table-basic" class="table table-striped">
												<thead>
													<tr>
														<th width="5%">No</th>
														<th width="17%">Nama Barang</th>
														<th width="25%">Jumlah Terjual</th>
													</tr>
												</thead>
												<tbody>
													<?php 
                                                    $no_minggu = 1;
                                                    foreach($record_minggu as $row_minggu){
                                                    ?>
													<tr>
														<td><?= $no_minggu++; ?></td>
														<td><?= $row_minggu->nama; ?></td>
														<td><?= $row_minggu->jumlah_terjual; ?></td>
													</tr>
													<?php   
                                                    }
                                                    ?>
												</tbody>
												<tfoot>
													<th>No</th>
													<th>Nama Barang</th>
													<th>Jumlah Terjual</th>
												</tfoot>
											</table>
										</div>
									</div>
								</div>
							</div>
							<div id="menu1" class="tab-pane fade">
								<div class="tab-ctn">
									<div class="data-table-list">
										<div class="table-responsive">
											<table width="100%" id="data-table-basic" class="table table-striped">
												<thead>
													<tr>
														<th width="5%">No</th>
														<th width="17%">Nama Barang</th>
														<th width="25%">Jumlah Terjual</th>
													</tr>
												</thead>
												<tbody>
													<?php 
                                                    $no_bulan = 1;
                                                    foreach($record_bulan as $row_bulan){
                                                    ?>
													<tr>
														<td><?= $no_bulan++; ?></td>
														<td><?= $row_bulan->nama; ?></td>
														<td><?= $row_bulan->jumlah_terjual; ?></td>
													</tr>
													<?php   
                                                    }
                                                    ?>
												</tbody>
												<tfoot>
													<th>No</th>
													<th>Nama Barang</th>
													<th>Jumlah Terjual</th>
												</tfoot>
											</table>
										</div>
									</div>
								</div>
							</div>
							<div id="menu2" class="tab-pane fade">
								<div class="tab-ctn">
									<p>Duis arcu tortor, suscipit eget, imperdiet nec, imperdiet iaculis, ipsum.
										Vestibulum purus
										quam, scelerisque ut, mollis sed, nonummy id, metus. Nulla sit amet est.
										Praesent ac the
										massa at ligula laoreet iaculis. Vivamus aliquet elit ac nisl. Nulla porta
										dolor. Cras
										dapibus. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.</p>
									<p class="tab-mg-b-0">In hac habitasse platea dictumst. Class aptent taciti sociosqu
										ad
										litora torquent per conubia nostra, per inceptos hymenaeos. Nam eget dui. In ac
										felis
										quis tortor malesuadan of pretium. Phasellus consectetuer vestibulum elit. Duis
										lobortis
										massa imperdiet quam. Pellentesque commodo eros a enim. Vestibulum ante ipsum
										primis in
										faucibus orci the luctus et ultrices posuere cubilia Curae; In ac dui quis mi
										consectetuer lacinia. Phasellus a est. Pellentesque commodo eros a enim. Cras
										ultricies
										mi eu turpis hendrerit of fringilla. Donec mollis hendrerit risus. Vestibulum
										turpis sem,
										aliquet eget, lobortis pellentesque, rutrum eu, nisl. Praesent egestas neque eu
										enim. In
										hac habitasse plat.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
<!-- Breadcomb area End-->
<!-- Data Table area Start-->
