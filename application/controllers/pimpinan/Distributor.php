<?php 
/**
  * 
  */
class Distributor extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // $this->load->model('kasir/M_distributor');
    }
    function index(){
        $this->template->load('view_1/template/pimpinan', 'view_1/konten/manager/distributor/tampil', $data);
    }
} 
