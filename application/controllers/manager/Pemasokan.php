<?php
class Pemasokan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model("manager/M_pemasokan");
    }
    public function index()
    {
        $data['distributor'] = $this->M_pemasokan->tampil_data('distributor')->result();
        $this->template->load('view_1/template/manager', 'view_1/konten/manager/pemasokan/tampil', $data);
    }
    public function tampil_daftar_barang()
    {
        $data_tbl['tbl_data'] = $this->M_pemasokan->tampil_data('barang_terdaftar_barcode')->result();

        $data = json_encode($data_tbl);

        echo $data;
    }
}
