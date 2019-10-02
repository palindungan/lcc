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
        $data['hari'] = $this->M_laporan->tampil_hari()->result();
        $data['minggu'] = $this->M_laporan->tampil_minggu()->result();
        $data['bulanan'] = $this->M_laporan->tampil_bulan()->result();
        $this->template->load('view_1/template/manager', 'view_1/konten/manager/laporan/v_laporan_penjualan',$data);
	}
    public function print_laporan()
    {
        $tgl1 = $this->input->post('tgl_mulai');
        $tgl2 = $this->input->post('tgl_akhir');
        $tgl_mulai = $tgl1." 00:00:01";
        $tgl_akhir = $tgl2." 23:59:59";
        $data['tgl'] = $tgl_akhir;
        $data['hari'] = $this->M_laporan->tampil_data2($tgl_mulai,$tgl_akhir)->result();
        $data['minggu'] = $this->M_laporan->tampil_data2($tgl_mulai,$tgl_akhir)->result();
        $data['bulanan'] = $this->M_laporan->tampil_data2($tgl_mulai,$tgl_akhir)->result();
        $this->load->view('view_1/konten/manager/laporan/print_laporan',$data);
    }
}