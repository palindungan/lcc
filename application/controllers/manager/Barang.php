<?php
class Barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('manager/M_barang');
    }
    public function index()
    {
        $data['record'] = $this->M_barang->data_barang()->result();
        $this->template->load('view_1/template/manager', 'view_1/konten/manager/barang/daftar_barang',$data);
    }
    public function stok_habis()
    {
        $data['record'] = $this->M_barang->stok_habis()->result();
        $this->template->load('view_1/template/manager', 'view_1/konten/manager/barang/stok_habis',$data);
        
    }
}
