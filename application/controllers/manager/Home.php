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
		$data['pengeluaran_hari'] = $this->M_home->pengeluaran_hari();
		$data['pengeluaran_minggu'] = $this->M_home->pengeluaran_minggu();
		$data['pengeluaran_bulan'] = $this->M_home->pengeluaran_bulan();
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
            					'.$untung_hari.'
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
            					'.$data['pengeluaran_hari']->total_pengeluaran.'
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
            					'.$untung_minggu.'
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
            					'.$data['pengeluaran_minggu']->total_pengeluaran.'
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
         					'.$untung_bulan.'
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
            				'.$data['pengeluaran_minggu']->total_pengeluaran.'         	
         				</h2>
         				<span><strong>PENGELUARAN</strong></span>
         			</div>
         		</div>
         	</div>
         </a>';
         }
    }
}
