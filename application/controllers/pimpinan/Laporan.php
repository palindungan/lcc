<?php 
/**
  * 
  */
class Laporan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('pimpinan/M_laporan');
    }
    function index(){
        $data['data_toko'] = $this->M_laporan->tampil_toko();
        $this->template->load('view_1/template/pimpinan', 'view_1/konten/pimpinan/laporan/tampil',$data);
    }
    function tampil()
    {
		$select = $this->input->post('pilih');
		// Semua
        $semua_hari_ini = $this->M_laporan->semua_tampil_hari()->result();
        $semua_minggu_ini = $this->M_laporan->semua_tampil_minggu()->result();
		$semua_bulan_ini = $this->M_laporan->semua_tampil_bulan()->result();
		// LCC
		$lcc_hari_ini = $this->M_laporan->lcc_tampil_hari()->result();
		$lcc_minggu_ini = $this->M_laporan->lcc_tampil_minggu()->result();
		$lcc_bulan_ini = $this->M_laporan->lcc_tampil_bulan()->result();
		// CMC
		$cmc_hari_ini = $this->M_laporan->cmc_tampil_hari()->result();
		$cmc_minggu_ini = $this->M_laporan->cmc_tampil_minggu()->result();
		$cmc_bulan_ini = $this->M_laporan->cmc_tampil_bulan()->result();
		// probolinggo
		$probolinggo_hari_ini = $this->M_laporan->probolinggo_tampil_hari()->result();
		$probolinggo_minggu_ini = $this->M_laporan->probolinggo_tampil_minggu()->result();
		$probolinggo_bulan_ini = $this->M_laporan->probolinggo_tampil_bulan()->result();
        if($select=='semua')
        {
        echo '<div class="widget-tabs-int">
        	<ul class="nav nav-tabs">
        		<li class="active"><a data-toggle="tab" href="#home">Hari Ini</a></li>
        		<li><a data-toggle="tab" href="#menu1">Minggu Ini</a></li>
        		<li><a data-toggle="tab" href="#menu2">Bulan Ini</a></li>
        	</ul>
        	<div class="tab-content tab-custom-st">
        		<div id="home" class="tab-pane fade in active">
        			<div class="tab-ctn">
        				<div class="data-table-list">
        					<div class="table-responsive">
        						<table id="dt_custom1" class="table table-striped">
        							<thead>
        								<tr>
        									<th width="1%" style="text-align: center;">No</th>
        									<th width="15%" style="text-align: center;">Nama Customer</th>
        									<th width="20%" style="text-align: center;">Tanggal & Waktu</th>
        									<th width="25%" style="text-align: center;">Nama Barang</th>
        									<th width="13%" style="text-align: center;">Harga Jual</th>
        									<th width="13%" style="text-align: center;">Qty</th>
        									<th width="13%" style="text-align: center;">Keuntungan</th>
        								</tr>
        							</thead>
        							<tbody>'; 
									$no_semua_hari = 1;
									$total_semua_hari=0;
									foreach($semua_hari_ini as $semua_hari){
									$keuntungan_semua = $semua_hari->harga_jual *
									$semua_hari->jumlah_barang -
									$semua_hari->hrg_distributor * $semua_hari->jumlah_barang;
									$total_semua_hari += $keuntungan_semua;
																
								echo '  
								<tr>
									<td style="text-align: center;">'.$no_semua_hari++.'</td>
									<td>'.$semua_hari->nama_customer.'</td>
									<td>'.$semua_hari->tanggal_penjualan.'</td>
									<td style="text-align: center;">'.$semua_hari->nama_barang.'</td>
									<td style="text-align: right;">'.rupiah($semua_hari->harga_jual).'
									</td>
									<td style="text-align: center;">'.$semua_hari->jumlah_barang.'
									</td>
									<td style="text-align: right;">'.rupiah($keuntungan_semua).'
									</td>
								</tr>
								'; 
								}
								if($total_semua_hari == 0)
								{
								echo '<h4 style="float:right">Total Keuntungan : 0</h4>';
								}
								else {
								echo '<h4 style="float: right;">Total Keuntungan : '.rupiah($total_semua_hari).'</h4>';
								}
					echo '
					</tbody>
					<tfoot>
						<tr>
							<th style="text-align: center;">No</th>
							<th style="text-align: center;">Nama Customer</th>
							<th style="text-align: center;">Tanggal & Waktu</th>
							<th style="text-align: center;">Nama Barang</th>
							<th style="text-align: center;">Harga Jual</th>
							<th style="text-align: center;">Qty</th>
							<th style="text-align: center;">Keuntungan</th>
						</tr>
					</tfoot>
					</table>
					</div>

					</div>
					</div>
					</div>';
					echo '
					<div id="menu1" class="tab-pane fade">
						<div class="tab-ctn">
							<div class="data-table-list">
								<div class="table-responsive">
									<table id="dt_custom2" width="100%" class="table table-striped">
										<thead>
											<tr>
												<th width="1%" style="text-align: center;">No</th>
												<th width="15%" style="text-align: center;">Nama Customer</th>
												<th width="20%" style="text-align: center;">Tanggal & Waktu</th>
												<th width="25%" style="text-align: center;">Nama Barang</th>
												<th width="13%" style="text-align: center;">Harga Jual</th>
												<th width="13%" style="text-align: center;">Qty</th>
												<th width="13%" style="text-align: center;">Keuntungan</th>
											</tr>
										</thead>
										<tbody>';
										$no_semua_minggu = 1;
										$total_semua_minggu=0;
										foreach($semua_minggu_ini as $semua_minggu){
										$keuntungan_semua_minggu = $semua_minggu->harga_jual *
										$semua_minggu->jumlah_barang -
										$semua_minggu->hrg_distributor * $semua_minggu->jumlah_barang;
										$total_semua_minggu += $keuntungan_semua_minggu;
										echo '
											<tr>
												<td style="text-align: center;">'.$no_semua_minggu++.'</td>
												<td>'.$semua_minggu->nama_customer.'</td>
												<td>'.$semua_minggu->tanggal_penjualan.'</td>
												<td style="text-align: center;">'.$semua_minggu->nama_barang.'</td>
												<td style="text-align: right;">'.rupiah($semua_minggu->harga_jual).'
												</td>
												<td style="text-align: center;">'.$semua_minggu->jumlah_barang.'
												</td>
												<td style="text-align: right;">'.rupiah($keuntungan_semua_minggu).'
												</td>
											</tr>
											';
											}
											if($total_semua_minggu == 0)
											{
											echo '<h4 style="float:right">Total Keuntungan : 0</h4>';
											}
											else {
											echo '<h4 style="float: right;">Total Keuntungan : '.rupiah($total_semua_minggu).'</h4>';
											}
											echo ' 
										</tbody>
										<tfoot>
											<th style="text-align: center;">No</th>
											<th style="text-align: center;">Nama Customer</th>
											<th style="text-align: center;">Tanggal & Waktu</th>
											<th style="text-align: center;">Nama Barang</th>
											<th style="text-align: center;">Harga Jual</th>
											<th style="text-align: center;">Qty</th>
											<th style="text-align: center;">Keuntungan</th>
										</tfoot>
									</table>
								</div>
							</div>
						</div>
					</div>';
					echo '
					<div id="menu2" class="tab-pane fade">
						<div class="tab-ctn">
							<div class="data-table-list">
								<div class="table-responsive">
									<table id="dt_custom3" width="100%" class="table table-striped">
										<thead>
											<tr>
												<th width="1%" style="text-align: center;">No</th>
												<th width="15%" style="text-align: center;">Nama Customer</th>
												<th width="20%" style="text-align: center;">Tanggal & Waktu</th>
												<th width="25%" style="text-align: center;">Nama Barang</th>
												<th width="13%" style="text-align: center;">Harga Jual</th>
												<th width="13%" style="text-align: center;">Qty</th>
												<th width="13%" style="text-align: center;">Keuntungan</th>
											</tr>
										</thead>
										<tbody>';
										$no_semua_bulan = 1;
										$total_semua_bulan=0;
										foreach($semua_bulan_ini as $semua_bulan){
										$keuntungan_semua_bulan = $semua_bulan->harga_jual *
										$semua_bulan->jumlah_barang -
										$semua_bulan->hrg_distributor * $semua_bulan->jumlah_barang;
										$total_semua_bulan += $keuntungan_semua_bulan;
										echo '
											<tr>
												<td style="text-align: center;">'.$no_semua_bulan++.'</td>
												<td>'.$semua_bulan->nama_customer.'</td>
												<td>'.$semua_bulan->tanggal_penjualan.'</td>
												<td style="text-align: center;">'.$semua_bulan->nama_barang.'</td>
												<td style="text-align: right;">'.rupiah($semua_bulan->harga_jual).'
												</td>
												<td style="text-align: center;">'.$semua_minggu->jumlah_barang.'
												</td>
												<td style="text-align: right;">'.rupiah($keuntungan_semua_minggu).'
												</td>
											</tr>
											';
											}
											if($total_semua_bulan == 0)
											{
											echo '<h4 style="float:right">Total Keuntungan : 0</h4>';
											}
											else {
											echo '<h4 style="float: right;">Total Keuntungan : '.rupiah($total_semua_bulan).'</h4>';
											}
											echo '
										</tbody>
										<tfoot>
											<th style="text-align: center;">No</th>
											<th style="text-align: center;">Nama Customer</th>
											<th style="text-align: center;">Tanggal & Waktu</th>
											<th style="text-align: center;">Nama Barang</th>
											<th style="text-align: center;">Harga Jual</th>
											<th style="text-align: center;">Qty</th>
											<th style="text-align: center;">Keuntungan</th>
										</tfoot>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>';
		}
		else if($select=='T1')
		{
		echo '<div class="widget-tabs-int">
			<ul class="nav nav-tabs">
				<li class="active"><a data-toggle="tab" href="#home">Hari Ini</a></li>
				<li><a data-toggle="tab" href="#menu1">Minggu Ini</a></li>
				<li><a data-toggle="tab" href="#menu2">Bulan Ini</a></li>
			</ul>
			<div class="tab-content tab-custom-st">
				<div id="home" class="tab-pane fade in active">
					<div class="tab-ctn">
						<div class="data-table-list">
							<div class="table-responsive">
								<table id="dt_custom1" class="table table-striped">
									<thead>
										<tr>
											<th width="1%" style="text-align: center;">No</th>
											<th width="15%" style="text-align: center;">Nama Customer</th>
											<th width="20%" style="text-align: center;">Tanggal & Waktu</th>
											<th width="25%" style="text-align: center;">Nama Barang</th>
											<th width="13%" style="text-align: center;">Harga Jual</th>
											<th width="13%" style="text-align: center;">Qty</th>
											<th width="13%" style="text-align: center;">Keuntungan</th>
										</tr>
									</thead>
									<tbody>';
										$no_lcc_hari = 1;
										$total_lcc_hari=0;
										foreach($lcc_hari_ini as $lcc_hari){
										$keuntungan_lcc = $lcc_hari->harga_jual *
										$lcc_hari->jumlah_barang -
										$lcc_hari->hrg_distributor * $lcc_hari->jumlah_barang;
										$total_lcc_hari += $keuntungan_lcc;

										echo '
										<tr>
											<td style="text-align: center;">'.$no_lcc_hari++.'</td>
											<td>'.$lcc_hari->nama_customer.'</td>
											<td>'.$lcc_hari->tanggal_penjualan.'</td>
											<td style="text-align: center;">'.$lcc_hari->nama_barang.'</td>
											<td style="text-align: right;">'.rupiah($lcc_hari->harga_jual).'
											</td>
											<td style="text-align: center;">'.$lcc_hari->jumlah_barang.'
											</td>
											<td style="text-align: right;">'.rupiah($keuntungan_lcc).'
											</td>
										</tr>
										';
										}
										if($total_lcc_hari == 0)
										{
										echo '<h4 style="float:right">Total Keuntungan : 0</h4>';
										}
										else {
										echo '<h4 style="float: right;">Total Keuntungan : '.rupiah($total_lcc_hari).'</h4>
										';
										}
										echo '
									</tbody>
									<tfoot>
										<tr>
											<th style="text-align: center;">No</th>
											<th style="text-align: center;">Nama Customer</th>
											<th style="text-align: center;">Tanggal & Waktu</th>
											<th style="text-align: center;">Nama Barang</th>
											<th style="text-align: center;">Harga Jual</th>
											<th style="text-align: center;">Qty</th>
											<th style="text-align: center;">Keuntungan</th>
										</tr>
									</tfoot>
								</table>
							</div>

						</div>
					</div>
				</div>';
				echo '
				<div id="menu1" class="tab-pane fade">
					<div class="tab-ctn">
						<div class="data-table-list">
							<div class="table-responsive">
								<table id="dt_custom2" width="100%" class="table table-striped">
									<thead>
										<tr>
											<th width="1%" style="text-align: center;">No</th>
											<th width="15%" style="text-align: center;">Nama Customer</th>
											<th width="20%" style="text-align: center;">Tanggal & Waktu</th>
											<th width="25%" style="text-align: center;">Nama Barang</th>
											<th width="13%" style="text-align: center;">Harga Jual</th>
											<th width="13%" style="text-align: center;">Qty</th>
											<th width="13%" style="text-align: center;">Keuntungan</th>
										</tr>
									</thead>
									<tbody>';
										$no_lcc_minggu = 1;
										$total_lcc_minggu=0;
										foreach($lcc_minggu_ini as $lcc_minggu){
										$keuntungan_lcc_minggu = $lcc_minggu->harga_jual *
										$lcc_minggu->jumlah_barang -
										$lcc_minggu->hrg_distributor * $lcc_minggu->jumlah_barang;
										$total_lcc_minggu += $keuntungan_lcc_minggu;
										echo '
										<tr>
											<td style="text-align: center;">'.$no_lcc_minggu++.'</td>
											<td>'.$lcc_minggu->nama_customer.'</td>
											<td>'.$lcc_minggu->tanggal_penjualan.'</td>
											<td style="text-align: center;">'.$lcc_minggu->nama_barang.'</td>
											<td style="text-align: right;">'.rupiah($lcc_minggu->harga_jual).'
											</td>
											<td style="text-align: center;">'.$lcc_minggu->jumlah_barang.'
											</td>
											<td style="text-align: right;">'.rupiah($keuntungan_lcc_minggu).'
											</td>
										</tr>
										';
										}
										if($total_lcc_minggu == 0)
										{
										echo '<h4 style="float:right">Total Keuntungan : 0</h4>';
										}
										else {
										echo '<h4 style="float: right;">Total Keuntungan : '.rupiah($total_lcc_minggu).'
										</h4>';
										}
										echo '
									</tbody>
									<tfoot>
										<th style="text-align: center;">No</th>
										<th style="text-align: center;">Nama Customer</th>
										<th style="text-align: center;">Tanggal & Waktu</th>
										<th style="text-align: center;">Nama Barang</th>
										<th style="text-align: center;">Harga Jual</th>
										<th style="text-align: center;">Qty</th>
										<th style="text-align: center;">Keuntungan</th>
									</tfoot>
								</table>
							</div>
						</div>
					</div>
				</div>';
				echo '
				<div id="menu2" class="tab-pane fade">
					<div class="tab-ctn">
						<div class="data-table-list">
							<div class="table-responsive">
								<table id="dt_custom3" width="100%" class="table table-striped">
									<thead>
										<tr>
											<th width="1%" style="text-align: center;">No</th>
											<th width="15%" style="text-align: center;">Nama Customer</th>
											<th width="20%" style="text-align: center;">Tanggal & Waktu</th>
											<th width="25%" style="text-align: center;">Nama Barang</th>
											<th width="13%" style="text-align: center;">Harga Jual</th>
											<th width="13%" style="text-align: center;">Qty</th>
											<th width="13%" style="text-align: center;">Keuntungan</th>
										</tr>
									</thead>
									<tbody>';
										$no_lcc_bulan = 1;
										$total_lcc_bulan=0;
										foreach($lcc_bulan_ini as $lcc_bulan){
										$keuntungan_lcc_bulan = $lcc_bulan->harga_jual *
										$lcc_bulan->jumlah_barang -
										$lcc_bulan->hrg_distributor * $lcc_bulan->jumlah_barang;
										$total_lcc_bulan += $keuntungan_lcc_bulan;
										echo '
										<tr>
											<td style="text-align: center;">'.$no_lcc_bulan++.'</td>
											<td>'.$lcc_bulan->nama_customer.'</td>
											<td>'.$lcc_bulan->tanggal_penjualan.'</td>
											<td style="text-align: center;">'.$lcc_bulan->nama_barang.'</td>
											<td style="text-align: right;">'.rupiah($lcc_bulan->harga_jual).'
											</td>
											<td style="text-align: center;">'.$lcc_minggu->jumlah_barang.'
											</td>
											<td style="text-align: right;">'.rupiah($keuntungan_lcc_minggu).'
											</td>
										</tr>
										';
										}
										if($total_lcc_bulan == 0)
										{
										echo '<h4 style="float:right">Total Keuntungan : 0</h4>';
										}
										else {
										echo '<h4 style="float: right;">Total Keuntungan : '.rupiah($total_lcc_bulan).'</h4>
										';
										}
										echo '
									</tbody>
									<tfoot>
										<th style="text-align: center;">No</th>
										<th style="text-align: center;">Nama Customer</th>
										<th style="text-align: center;">Tanggal & Waktu</th>
										<th style="text-align: center;">Nama Barang</th>
										<th style="text-align: center;">Harga Jual</th>
										<th style="text-align: center;">Qty</th>
										<th style="text-align: center;">Keuntungan</th>
									</tfoot>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>';
		}
		else if($select=='T2')
		{
		echo '<div class="widget-tabs-int">
			<ul class="nav nav-tabs">
				<li class="active"><a data-toggle="tab" href="#home">Hari Ini</a></li>
				<li><a data-toggle="tab" href="#menu1">Minggu Ini</a></li>
				<li><a data-toggle="tab" href="#menu2">Bulan Ini</a></li>
			</ul>
			<div class="tab-content tab-custom-st">
				<div id="home" class="tab-pane fade in active">
					<div class="tab-ctn">
						<div class="data-table-list">
							<div class="table-responsive">
								<table id="dt_custom1" class="table table-striped">
									<thead>
										<tr>
											<th width="1%" style="text-align: center;">No</th>
											<th width="15%" style="text-align: center;">Nama Customer</th>
											<th width="20%" style="text-align: center;">Tanggal & Waktu</th>
											<th width="25%" style="text-align: center;">Nama Barang</th>
											<th width="13%" style="text-align: center;">Harga Jual</th>
											<th width="13%" style="text-align: center;">Qty</th>
											<th width="13%" style="text-align: center;">Keuntungan</th>
										</tr>
									</thead>
									<tbody>';
										$no_cmc_hari = 1;
										$total_cmc_hari=0;
										foreach($cmc_hari_ini as $cmc_hari){
										$keuntungan_cmc = $cmc_hari->harga_jual *
										$cmc_hari->jumlah_barang -
										$cmc_hari->hrg_distributor * $cmc_hari->jumlah_barang;
										$total_cmc_hari += $keuntungan_cmc;

										echo '
										<tr>
											<td style="text-align: center;">'.$no_cmc_hari++.'</td>
											<td>'.$cmc_hari->nama_customer.'</td>
											<td>'.$cmc_hari->tanggal_penjualan.'</td>
											<td style="text-align: center;">'.$cmc_hari->nama_barang.'</td>
											<td style="text-align: right;">'.rupiah($cmc_hari->harga_jual).'
											</td>
											<td style="text-align: center;">'.$cmc_hari->jumlah_barang.'
											</td>
											<td style="text-align: right;">'.rupiah($keuntungan_cmc).'
											</td>
										</tr>
										';
										}
										if($total_cmc_hari == 0)
										{
										echo '<h4 style="float:right">Total Keuntungan : 0</h4>';
										}
										else {
										echo '<h4 style="float: right;">Total Keuntungan : '.rupiah($total_cmc_hari).'</h4>
										';
										}
										echo '
									</tbody>
									<tfoot>
										<tr>
											<th style="text-align: center;">No</th>
											<th style="text-align: center;">Nama Customer</th>
											<th style="text-align: center;">Tanggal & Waktu</th>
											<th style="text-align: center;">Nama Barang</th>
											<th style="text-align: center;">Harga Jual</th>
											<th style="text-align: center;">Qty</th>
											<th style="text-align: center;">Keuntungan</th>
										</tr>
									</tfoot>
								</table>
							</div>

						</div>
					</div>
				</div>';
				echo '
				<div id="menu1" class="tab-pane fade">
					<div class="tab-ctn">
						<div class="data-table-list">
							<div class="table-responsive">
								<table id="dt_custom2" width="100%" class="table table-striped">
									<thead>
										<tr>
											<th width="1%" style="text-align: center;">No</th>
											<th width="15%" style="text-align: center;">Nama Customer</th>
											<th width="20%" style="text-align: center;">Tanggal & Waktu</th>
											<th width="25%" style="text-align: center;">Nama Barang</th>
											<th width="13%" style="text-align: center;">Harga Jual</th>
											<th width="13%" style="text-align: center;">Qty</th>
											<th width="13%" style="text-align: center;">Keuntungan</th>
										</tr>
									</thead>
									<tbody>';
										$no_cmc_minggu = 1;
										$total_cmc_minggu=0;
										foreach($cmc_minggu_ini as $cmc_minggu){
										$keuntungan_cmc_minggu = $cmc_minggu->harga_jual *
										$cmc_minggu->jumlah_barang -
										$cmc_minggu->hrg_distributor * $cmc_minggu->jumlah_barang;
										$total_cmc_minggu += $keuntungan_cmc_minggu;
										echo '
										<tr>
											<td style="text-align: center;">'.$no_cmc_minggu++.'</td>
											<td>'.$cmc_minggu->nama_customer.'</td>
											<td>'.$cmc_minggu->tanggal_penjualan.'</td>
											<td style="text-align: center;">'.$cmc_minggu->nama_barang.'</td>
											<td style="text-align: right;">'.rupiah($cmc_minggu->harga_jual).'
											</td>
											<td style="text-align: center;">'.$cmc_minggu->jumlah_barang.'
											</td>
											<td style="text-align: right;">'.rupiah($keuntungan_cmc_minggu).'
											</td>
										</tr>
										';
										}
										if($total_cmc_minggu == 0)
										{
										echo '<h4 style="float:right">Total Keuntungan : 0</h4>';
										}
										else {
										echo '<h4 style="float: right;">Total Keuntungan : '.rupiah($total_cmc_minggu).'
										</h4>';
										}
										echo '
									</tbody>
									<tfoot>
										<th style="text-align: center;">No</th>
										<th style="text-align: center;">Nama Customer</th>
										<th style="text-align: center;">Tanggal & Waktu</th>
										<th style="text-align: center;">Nama Barang</th>
										<th style="text-align: center;">Harga Jual</th>
										<th style="text-align: center;">Qty</th>
										<th style="text-align: center;">Keuntungan</th>
									</tfoot>
								</table>
							</div>
						</div>
					</div>
				</div>';
				echo '
				<div id="menu2" class="tab-pane fade">
					<div class="tab-ctn">
						<div class="data-table-list">
							<div class="table-responsive">
								<table id="dt_custom3" width="100%" class="table table-striped">
									<thead>
										<tr>
											<th width="1%" style="text-align: center;">No</th>
											<th width="15%" style="text-align: center;">Nama Customer</th>
											<th width="20%" style="text-align: center;">Tanggal & Waktu</th>
											<th width="25%" style="text-align: center;">Nama Barang</th>
											<th width="13%" style="text-align: center;">Harga Jual</th>
											<th width="13%" style="text-align: center;">Qty</th>
											<th width="13%" style="text-align: center;">Keuntungan</th>
										</tr>
									</thead>
									<tbody>';
										$no_cmc_bulan = 1;
										$total_cmc_bulan=0;
										foreach($cmc_bulan_ini as $cmc_bulan){
										$keuntungan_cmc_bulan = $cmc_bulan->harga_jual *
										$cmc_bulan->jumlah_barang -
										$cmc_bulan->hrg_distributor * $cmc_bulan->jumlah_barang;
										$total_cmc_bulan += $keuntungan_cmc_bulan;
										echo '
										<tr>
											<td style="text-align: center;">'.$no_cmc_bulan++.'</td>
											<td>'.$cmc_bulan->nama_customer.'</td>
											<td>'.$cmc_bulan->tanggal_penjualan.'</td>
											<td style="text-align: center;">'.$cmc_bulan->nama_barang.'</td>
											<td style="text-align: right;">'.rupiah($cmc_bulan->harga_jual).'
											</td>
											<td style="text-align: center;">'.$cmc_minggu->jumlah_barang.'
											</td>
											<td style="text-align: right;">'.rupiah($keuntungan_cmc_minggu).'
											</td>
										</tr>
										';
										}
										if($total_cmc_bulan == 0)
										{
										echo '<h4 style="float:right">Total Keuntungan : 0</h4>';
										}
										else {
										echo '<h4 style="float: right;">Total Keuntungan : '.rupiah($total_cmc_bulan).'</h4>
										';
										}
										echo '
									</tbody>
									<tfoot>
										<th style="text-align: center;">No</th>
										<th style="text-align: center;">Nama Customer</th>
										<th style="text-align: center;">Tanggal & Waktu</th>
										<th style="text-align: center;">Nama Barang</th>
										<th style="text-align: center;">Harga Jual</th>
										<th style="text-align: center;">Qty</th>
										<th style="text-align: center;">Keuntungan</th>
									</tfoot>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>';
		}
		else if($select=='T3')
		{
		echo '<div class="widget-tabs-int">
			<ul class="nav nav-tabs">
				<li class="active"><a data-toggle="tab" href="#home">Hari Ini</a></li>
				<li><a data-toggle="tab" href="#menu1">Minggu Ini</a></li>
				<li><a data-toggle="tab" href="#menu2">Bulan Ini</a></li>
			</ul>
			<div class="tab-content tab-custom-st">
				<div id="home" class="tab-pane fade in active">
					<div class="tab-ctn">
						<div class="data-table-list">
							<div class="table-responsive">
								<table id="dt_custom1" class="table table-striped">
									<thead>
										<tr>
											<th width="1%" style="text-align: center;">No</th>
											<th width="15%" style="text-align: center;">Nama Customer</th>
											<th width="20%" style="text-align: center;">Tanggal & Waktu</th>
											<th width="25%" style="text-align: center;">Nama Barang</th>
											<th width="13%" style="text-align: center;">Harga Jual</th>
											<th width="13%" style="text-align: center;">Qty</th>
											<th width="13%" style="text-align: center;">Keuntungan</th>
										</tr>
									</thead>
									<tbody>';
										$no_probolinggo_hari = 1;
										$total_probolinggo_hari=0;
										foreach($probolinggo_hari_ini as $probolinggo_hari){
										$keuntungan_probolinggo = $probolinggo_hari->harga_jual *
										$probolinggo_hari->jumlah_barang -
										$probolinggo_hari->hrg_distributor * $probolinggo_hari->jumlah_barang;
										$total_probolinggo_hari += $keuntungan_probolinggo;

										echo '
										<tr>
											<td style="text-align: center;">'.$no_probolinggo_hari++.'</td>
											<td>'.$probolinggo_hari->nama_customer.'</td>
											<td>'.$probolinggo_hari->tanggal_penjualan.'</td>
											<td style="text-align: center;">'.$probolinggo_hari->nama_barang.'</td>
											<td style="text-align: right;">'.rupiah($probolinggo_hari->harga_jual).'
											</td>
											<td style="text-align: center;">'.$probolinggo_hari->jumlah_barang.'
											</td>
											<td style="text-align: right;">'.rupiah($keuntungan_probolinggo).'
											</td>
										</tr>
										';
										}
										if($total_probolinggo_hari == 0)
										{
										echo '<h4 style="float:right">Total Keuntungan : 0</h4>';
										}
										else {
										echo '<h4 style="float: right;">Total Keuntungan : '.rupiah($total_probolinggo_hari).'</h4>
										';
										}
										echo '
									</tbody>
									<tfoot>
										<tr>
											<th style="text-align: center;">No</th>
											<th style="text-align: center;">Nama Customer</th>
											<th style="text-align: center;">Tanggal & Waktu</th>
											<th style="text-align: center;">Nama Barang</th>
											<th style="text-align: center;">Harga Jual</th>
											<th style="text-align: center;">Qty</th>
											<th style="text-align: center;">Keuntungan</th>
										</tr>
									</tfoot>
								</table>
							</div>

						</div>
					</div>
				</div>';
				echo '
				<div id="menu1" class="tab-pane fade">
					<div class="tab-ctn">
						<div class="data-table-list">
							<div class="table-responsive">
								<table id="dt_custom2" width="100%" class="table table-striped">
									<thead>
										<tr>
											<th width="1%" style="text-align: center;">No</th>
											<th width="15%" style="text-align: center;">Nama Customer</th>
											<th width="20%" style="text-align: center;">Tanggal & Waktu</th>
											<th width="25%" style="text-align: center;">Nama Barang</th>
											<th width="13%" style="text-align: center;">Harga Jual</th>
											<th width="13%" style="text-align: center;">Qty</th>
											<th width="13%" style="text-align: center;">Keuntungan</th>
										</tr>
									</thead>
									<tbody>';
										$no_probolinggo_minggu = 1;
										$total_probolinggo_minggu=0;
										foreach($probolinggo_minggu_ini as $probolinggo_minggu){
										$keuntungan_probolinggo_minggu = $probolinggo_minggu->harga_jual *
										$probolinggo_minggu->jumlah_barang -
										$probolinggo_minggu->hrg_distributor * $probolinggo_minggu->jumlah_barang;
										$total_probolinggo_minggu += $keuntungan_probolinggo_minggu;
										echo '
										<tr>
											<td style="text-align: center;">'.$no_probolinggo_minggu++.'</td>
											<td>'.$probolinggo_minggu->nama_customer.'</td>
											<td>'.$probolinggo_minggu->tanggal_penjualan.'</td>
											<td style="text-align: center;">'.$probolinggo_minggu->nama_barang.'</td>
											<td style="text-align: right;">'.rupiah($probolinggo_minggu->harga_jual).'
											</td>
											<td style="text-align: center;">'.$probolinggo_minggu->jumlah_barang.'
											</td>
											<td style="text-align: right;">'.rupiah($keuntungan_probolinggo_minggu).'
											</td>
										</tr>
										';
										}
										if($total_probolinggo_minggu == 0)
										{
										echo '<h4 style="float:right">Total Keuntungan : 0</h4>';
										}
										else {
										echo '<h4 style="float: right;">Total Keuntungan : '.rupiah($total_probolinggo_minggu).'
										</h4>';
										}
										echo '
									</tbody>
									<tfoot>
										<th style="text-align: center;">No</th>
										<th style="text-align: center;">Nama Customer</th>
										<th style="text-align: center;">Tanggal & Waktu</th>
										<th style="text-align: center;">Nama Barang</th>
										<th style="text-align: center;">Harga Jual</th>
										<th style="text-align: center;">Qty</th>
										<th style="text-align: center;">Keuntungan</th>
									</tfoot>
								</table>
							</div>
						</div>
					</div>
				</div>';
				echo '
				<div id="menu2" class="tab-pane fade">
					<div class="tab-ctn">
						<div class="data-table-list">
							<div class="table-responsive">
								<table id="dt_custom3" width="100%" class="table table-striped">
									<thead>
										<tr>
											<th width="1%" style="text-align: center;">No</th>
											<th width="15%" style="text-align: center;">Nama Customer</th>
											<th width="20%" style="text-align: center;">Tanggal & Waktu</th>
											<th width="25%" style="text-align: center;">Nama Barang</th>
											<th width="13%" style="text-align: center;">Harga Jual</th>
											<th width="13%" style="text-align: center;">Qty</th>
											<th width="13%" style="text-align: center;">Keuntungan</th>
										</tr>
									</thead>
									<tbody>';
										$no_probolinggo_bulan = 1;
										$total_probolinggo_bulan=0;
										foreach($probolinggo_bulan_ini as $probolinggo_bulan){
										$keuntungan_probolinggo_bulan = $probolinggo_bulan->harga_jual *
										$probolinggo_bulan->jumlah_barang -
										$probolinggo_bulan->hrg_distributor * $probolinggo_bulan->jumlah_barang;
										$total_probolinggo_bulan += $keuntungan_probolinggo_bulan;
										echo '
										<tr>
											<td style="text-align: center;">'.$no_probolinggo_bulan++.'</td>
											<td>'.$probolinggo_bulan->nama_customer.'</td>
											<td>'.$probolinggo_bulan->tanggal_penjualan.'</td>
											<td style="text-align: center;">'.$probolinggo_bulan->nama_barang.'</td>
											<td style="text-align: right;">'.rupiah($probolinggo_bulan->harga_jual).'
											</td>
											<td style="text-align: center;">'.$probolinggo_minggu->jumlah_barang.'
											</td>
											<td style="text-align: right;">'.rupiah($keuntungan_probolinggo_minggu).'
											</td>
										</tr>
										';
										}
										if($total_probolinggo_bulan == 0)
										{
										echo '<h4 style="float:right">Total Keuntungan : 0</h4>';
										}
										else {
										echo '<h4 style="float: right;">Total Keuntungan : '.rupiah($total_probolinggo_bulan).'</h4>
										';
										}
										echo '
									</tbody>
									<tfoot>
										<th style="text-align: center;">No</th>
										<th style="text-align: center;">Nama Customer</th>
										<th style="text-align: center;">Tanggal & Waktu</th>
										<th style="text-align: center;">Nama Barang</th>
										<th style="text-align: center;">Harga Jual</th>
										<th style="text-align: center;">Qty</th>
										<th style="text-align: center;">Keuntungan</th>
									</tfoot>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>';
		}
	}
}
