<?php
class Home extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('id_user')){
            redirect('/');
        }
        else if($this->session->userdata('akses') != 'Manager')
        {
            echo '<script>
                window.history.back();
            </script>';
        }
        $this->load->model('manager/M_home');
    }
    public function index()
    {
        $data['kasir'] = $this->M_home->count_kasir();
        $data['barang'] = $this->M_home->count_jenis_barang();
		$data['stok_habis'] = $this->M_home->count_stok_habis();
		$data['pengeluaran_bulan_1'] = $this->M_home->pengeluaran_bulan_1();
		$data['pemasokan_bulan_1'] = $this->M_home->pemasokan_bulan_1();
		$data['keluar_januari'] = $data['pengeluaran_bulan_1']->total_pengeluaran +
		$data['pemasokan_bulan_1']->total_pemasokan;

		$data['pengeluaran_bulan_2'] = $this->M_home->pengeluaran_bulan_2();
		$data['pemasokan_bulan_2'] = $this->M_home->pemasokan_bulan_2();
		$data['keluar_februari'] = $data['pengeluaran_bulan_2']->total_pengeluaran +
		$data['pemasokan_bulan_2']->total_pemasokan;

		$data['pengeluaran_bulan_3'] = $this->M_home->pengeluaran_bulan_3();
		$data['pemasokan_bulan_3'] = $this->M_home->pemasokan_bulan_3();
		$data['keluar_maret'] = $data['pengeluaran_bulan_3']->total_pengeluaran +
		$data['pemasokan_bulan_3']->total_pemasokan;

		$data['pengeluaran_bulan_4'] = $this->M_home->pengeluaran_bulan_4();
		$data['pemasokan_bulan_4'] = $this->M_home->pemasokan_bulan_4();
		$data['keluar_april'] = $data['pengeluaran_bulan_4']->total_pengeluaran +
		$data['pemasokan_bulan_4']->total_pemasokan;

		$data['pengeluaran_bulan_5'] = $this->M_home->pengeluaran_bulan_5();
		$data['pemasokan_bulan_5'] = $this->M_home->pemasokan_bulan_5();
		$data['keluar_mei'] = $data['pengeluaran_bulan_5']->total_pengeluaran +
		$data['pemasokan_bulan_5']->total_pemasokan;

		$data['pengeluaran_bulan_6'] = $this->M_home->pengeluaran_bulan_6();
		$data['pemasokan_bulan_6'] = $this->M_home->pemasokan_bulan_6();
		$data['keluar_juni'] = $data['pengeluaran_bulan_6']->total_pengeluaran +
		$data['pemasokan_bulan_6']->total_pemasokan;

		$data['pengeluaran_bulan_7'] = $this->M_home->pengeluaran_bulan_7();
		$data['pemasokan_bulan_7'] = $this->M_home->pemasokan_bulan_7();
		$data['keluar_juli'] = $data['pengeluaran_bulan_7']->total_pengeluaran +
		$data['pemasokan_bulan_7']->total_pemasokan;

		$data['pengeluaran_bulan_8'] = $this->M_home->pengeluaran_bulan_8();
		$data['pemasokan_bulan_8'] = $this->M_home->pemasokan_bulan_8();
		$data['keluar_agustus'] = $data['pengeluaran_bulan_8']->total_pengeluaran +
		$data['pemasokan_bulan_8']->total_pemasokan;

		$data['pengeluaran_bulan_9'] = $this->M_home->pengeluaran_bulan_9();
		$data['pemasokan_bulan_9'] = $this->M_home->pemasokan_bulan_9();
		$data['keluar_september'] = $data['pengeluaran_bulan_9']->total_pengeluaran +
		$data['pemasokan_bulan_9']->total_pemasokan;

		$data['pengeluaran_bulan_10'] = $this->M_home->pengeluaran_bulan_10();
		$data['pemasokan_bulan_10'] = $this->M_home->pemasokan_bulan_10();
		$data['keluar_oktober'] = $data['pengeluaran_bulan_10']->total_pengeluaran + $data['pemasokan_bulan_10']->total_pemasokan;

		$data['pengeluaran_bulan_11'] = $this->M_home->pengeluaran_bulan_11();
		$data['pemasokan_bulan_11'] = $this->M_home->pemasokan_bulan_11();
		$data['keluar_november'] = $data['pengeluaran_bulan_11']->total_pengeluaran +
		$data['pemasokan_bulan_11']->total_pemasokan;

		$data['pengeluaran_bulan_12'] = $this->M_home->pengeluaran_bulan_12();
		$data['pemasokan_bulan_12'] = $this->M_home->pemasokan_bulan_12();
		$data['keluar_desember'] = $data['pengeluaran_bulan_12']->total_pengeluaran +
		$data['pemasokan_bulan_12']->total_pemasokan;
		
		
        $this->template->load('view_1/template/manager', 'view_1/konten/manager/home/tampil',$data);
    }
    public function tampil()
    {
        $select = $this->input->post('pilih');
        $data['hari'] = $this->M_home->count_penjualan_hari();
        $data['minggu'] = $this->M_home->count_penjualan_minggu();
		$data['bulan'] = $this->M_home->count_penjualan_bulan();
		$data['keuntungan_hari'] = $this->M_home->keuntungan_hari();
		$data['keuntungan_minggu'] = $this->M_home->keuntungan_minggu();
		$data['keuntungan_bulan'] = $this->M_home->keuntungan_bulan();
		$untung_hari = $data['keuntungan_hari']->harga_jual_barang - $data['keuntungan_hari']->harga_beli_barang;
		$untung_minggu = $data['keuntungan_minggu']->harga_jual_barang - $data['keuntungan_minggu']->harga_beli_barang;
		$untung_bulan = $data['keuntungan_bulan']->harga_jual_barang - $data['keuntungan_bulan']->harga_beli_barang;
		$data['pengeluaran_lain_hari'] = $this->M_home->pengeluaran_lain_hari();
		$data['pengeluaran_lain_minggu'] = $this->M_home->pengeluaran_lain_minggu();
		$data['pengeluaran_lain_bulan'] = $this->M_home->pengeluaran_lain_bulan();
		$data['pengeluaran_pemasokan_hari'] = $this->M_home->pengeluaran_pemasokan_hari();
		$data['pengeluaran_pemasokan_minggu'] = $this->M_home->pengeluaran_pemasokan_minggu();
		$data['pengeluaran_pemasokan_bulan'] = $this->M_home->pengeluaran_pemasokan_bulan();
		$pengeluaran_hari = $data['pengeluaran_lain_hari']->total_pengeluaran + $data['pengeluaran_pemasokan_hari']->total_pemasokan;
		$pengeluaran_minggu = $data['pengeluaran_lain_minggu']->total_pengeluaran + $data['pengeluaran_pemasokan_minggu']->total_pemasokan;
		$pengeluaran_bulan = $data['pengeluaran_lain_bulan']->total_pengeluaran + $data['pengeluaran_pemasokan_bulan']->total_pemasokan;

		// CHART
		// $data['pemasokan_bulan_oktober'] = $this->M_home->pemasokan_bulan_oktober();
        if($select=='hari')
        {
            echo '<a style="color:black" href="">
            	<div style="margin-bottom: 30px;" class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
					<div class="contact-inner">
            			<div class="contact-inner">
            				<h2 class="text-right">
            					'.$data['hari']->jumlah_hari.'
            				</h2>
            				<span><strong>JUMLAH TRANSAKSI</strong></span>
            			</div>
            		</div>
            	</div>
            </a>
            <a style="color:black" href="">
            	<div style="margin-bottom: 30px;" class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
            		<div class="contact-inner">
            			<div class="contact-inner">
            				<h2 class="text-right">
            					'.rupiah($untung_hari).'
            				</h2>
            				<span><strong>PEMASUKAN</strong></span>
            			</div>
            		</div>
            	</div>
            </a>

            <a style="color:black" href="">
            	<div style="margin-bottom: 30px;" class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
            		<div class="contact-inner">
            			<div class="contact-inner">
            				<h2 class="text-right">
            					'.rupiah($pengeluaran_hari).'
            				</h2>
            				<span><strong>PENGELUARAN</strong></span>
            			</div>
            		</div>
            	</div>
            </a>';
        } else if ($select=='minggu')
        {
            echo '<a style="color:black" href="">
            	<div style="margin-bottom: 30px;" class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
            		<div class="contact-inner">
            			<div class="contact-inner">
            				<h2 class="text-right">
            					'.$data['minggu']->jumlah_minggu.'
            				</h2>
            				<span><strong>JUMLAH TRANSAKSI</strong></span>
            			</div>
            		</div>
            	</div>
            </a>
            <a style="color:black" href="">
            	<div style="margin-bottom: 30px;" class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
            		<div class="contact-inner">
            			<div class="contact-inner">
            				<h2 class="text-right">
            					'.rupiah($untung_minggu).'
            				</h2>
            				<span><strong>PEMASUKAN</strong></span>
            			</div>
            		</div>
            	</div>
            </a>

            <a style="color:black" href="">
            	<div style="margin-bottom: 30px;" class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
            		<div class="contact-inner">
            			<div class="contact-inner">
            				<h2 class="text-right">
            					'.rupiah($pengeluaran_minggu).'
            				</h2>
            				<span><strong>PENGELUARAN</strong></span>
            			</div>
            		</div>
            	</div>
            </a>';
        }
         else if ($select=='bulan')
         {
         echo '<a style="color:black" href="">
         	<div style="margin-bottom: 30px;" class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
         		<div class="contact-inner">
         			<div class="contact-inner">
         				<h2 class="text-right">
         					'.$data['bulan']->jumlah_bulan.'
         				</h2>
         				<span><strong>JUMLAH TRANSAKSI</strong></span>
         			</div>
         		</div>
         	</div>
         </a>
         <a style="color:black" href="">
         	<div style="margin-bottom: 30px;" class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
         		<div class="contact-inner">
         			<div class="contact-inner">
         				<h2 class="text-right">
         					'.rupiah($untung_bulan).'
         				</h2>
         				<span><strong>PEMASUKAN</strong></span>
         			</div>
         		</div>
         	</div>
         </a>

         <a style="color:black" href="">
         	<div style="margin-bottom: 30px;" class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
         		<div class="contact-inner">
         			<div class="contact-inner">
         				<h2 class="text-right">
            				'.rupiah($pengeluaran_bulan).'
         				</h2>
         				<span><strong>PENGELUARAN</strong></span>
         			</div>
         		</div>
         	</div>
         </a>';
         }
    }
}
