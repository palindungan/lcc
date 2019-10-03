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
        $data['distributor'] = $this->M_pemasokan->tampil_data_distributor()->result();
        $this->template->load('view_1/template/manager', 'view_1/konten/manager/pemasokan/tampil', $data);
    }
}
