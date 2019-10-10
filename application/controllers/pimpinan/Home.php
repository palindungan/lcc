<?php 
/**
  * 
  */
class Home extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('pimpinan/M_home');
    }
    function index(){
        // Load Toko
        $data['data_toko'] = $this->M_home->tampil_toko();

        // Jumlah Aset LCC
        $barang_lcc = $this->M_home->barang_lcc();
        $aset_lcc = 0;
        foreach($barang_lcc as $row_lcc)
        {
            $total_lcc = $row_lcc->hrg_distributor * $row_lcc->qty;
            $aset_lcc += $total_lcc;
        }
        $data['aset_lcc'] = $aset_lcc;

        // Jumlah Aset CMC
        $barang_cmc = $this->M_home->barang_cmc();
        $aset_cmc = 0;
        foreach($barang_cmc as $row_cmc)
        {
        $total_cmc = $row_cmc->hrg_distributor * $row_cmc->qty;
        $aset_cmc += $total_cmc;
        }
        $data['aset_cmc'] = $aset_cmc;

        // Jumlah Asset Probolinggo
        $barang_probolinggo = $this->M_home->barang_probolinggo();
        $aset_probolinggo = 0;
        foreach($barang_probolinggo as $row_probolinggo)
        {
        $total_probolinggo = $row_probolinggo->hrg_distributor * $row_probolinggo->qty;
        $aset_probolinggo += $total_probolinggo;
        }
        $data['aset_probolinggo'] = $aset_probolinggo;

        $data['keuntungan_semua_minggu'] = $this->M_home->keuntungan_semua_minggu();
        $data['pemasukan_semua_minggu'] = $data['keuntungan_semua_minggu']->harga_jual_barang -
        $data['keuntungan_semua_minggu']->harga_beli_barang;
        $this->template->load('view_1/template/pimpinan', 'view_1/konten/pimpinan/home/tampil',$data);
    }
} 
