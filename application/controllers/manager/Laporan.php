<?php

class Laporan extends CI_Controller {
    public function __construct()
    {
		parent::__construct();     
        $this->load->model('manager/M_laporan');
        $this->load->helper('url');
	}

	public function index()
	{
        $data['laporanku'] = $this->M_laporan->tampil_data()->result();
        $this->template->load('view_1/template/manager', 'view_1/konten/manager/laporan/v_laporan_penjualan',$data);
	}
    public function print_laporan()
    {
        $data['laporanku'] = $this->M_laporan->tampil_data()->result();
        $this->load->view('view_1/konten/manager/laporan/print_laporan',$data);

    }
}