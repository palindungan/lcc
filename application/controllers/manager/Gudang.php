<?php
class Gudang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('manager/M_gudang');
    }
    public function index()
    {
        $data['record'] = $this->M_gudang->tampil_data()->result();
        $this->template->load('view_1/template/manager', 'view_1/konten/manager/gudang/daftar_barang',$data);
    }
}
