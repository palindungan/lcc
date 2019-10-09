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
        $semua_hari_ini = $this->M_laporan->semua_tampil_hari()->result();
        $semua_minggu_ini = $this->M_laporan->semua_tampil_minggu()->result();
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
        						<table id="data-table-basic" class="table table-striped">
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
								<td>
									'.$semua_hari->tanggal_penjualan.' 
								</td>
								<td style="text-align: center;">'.$semua_hari->nama_barang.'
								</td>
								<td style="text-align: right;">
									'.rupiah($semua_hari->harga_jual).'
								</td>
								<td style="text-align: center;">
									'.$semua_hari->jumlah_barang.'
								</td>
								<td style="text-align: right;">
									'.rupiah($keuntungan_semua).'
								</td>
								</tr>
								'; 
								}
								if($total_semua_hari == "")
								{
								echo '<h4 style="float:right">Total Keuntungan : 0</h4>';
								}
								else {
								echo '<h4 style="float: right;">Total Keuntungan : '.rupiah($total_semua_hari).'</h4>"';
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
									<table width="100%" class="table table-striped">
										<thead>
											<tr>
												<th width="5%">No</th>
												<th width="17%">Nama Barang</th>
												<th width="25%">Jumlah Terjual</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>asdxx</td>
												<td>asdxx</td>
												<td>asdxx</td>
											</tr>
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
							<div class="data-table-list">
								<div class="table-responsive">
									<table width="100%" class="table table-striped">
										<thead>
											<tr>
												<th width="5%">No</th>
												<th width="17%">Nama Barang</th>
												<th width="25%">Jumlah Terjual</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>asd</td>
												<td>asd</td>
												<td>asd</td>
											</tr>
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
				</div>
			</div>';
		}
	}
}
