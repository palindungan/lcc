<?php
class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('kasir/M_home');
    }
    public function index()
    {
        $data['record'] = $this->M_home->tampil_data();
        $this->template->load('view_1/template/kasir', 'view_1/konten/kasir/home/tampil',$data);
    }
}
