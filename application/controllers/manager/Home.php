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
            					Rp 500.0000
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
            					Rp 40.0000
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
            					Rp 500.0000
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
            					Rp 40.0000
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
         					Rp 500.0000
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
         					Rp 40.0000
         				</h2>
         				<span><strong>PENGELUARAN</strong></span>
         			</div>
         		</div>
         	</div>
         </a>';
         }
    }
}
