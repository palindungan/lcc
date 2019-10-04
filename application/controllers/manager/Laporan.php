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
        $data['minggu'] = $this->M_laporan->tampil_minggu()->result();
        $html = $this->load->view('view_1/konten/manager/laporan/print_laporan',$data,true);
        $this->dompdf->PdfGenerator($html,'coba','A4','landscape');
    }
    public function cetak_hari()
    {
      $data['hari'] = $this->M_laporan->tampil_hari()->result();
      $html = $this->load->view('view_1/konten/manager/laporan/print_per_hari',$data,true);
      $this->dompdf->PdfGenerator($html,'coba','A4','landscape');
    }
    public function cetak_minggu()
    {
      $data['minggu'] = $this->M_laporan->tampil_minggu()->result();
      $html = $this->load->view('view_1/konten/manager/laporan/print_per_minggu',$data,true);
      $this->dompdf->PdfGenerator($html,'coba','A4','landscape'); 
    }
    public function cetak_bulan()
    {
      $data['bulanan'] = $this->M_laporan->tampil_bulan()->result();
      $html = $this->load->view('view_1/konten/manager/laporan/print_per_bulan',$data,true);
      $this->dompdf->PdfGenerator($html,'coba','A4','landscape'); 
    }
    public function detail_data()
    {
        // $where = array('id_penjualan' => $id_penjualan);
        // $data['hari'] = $this->M_laporan->tampil_detail($where,'penjualan')->result();
        // $this->template->load('view_1/template/manager', 'view_1/konten/manager/laporan/detail');
        $id_penjualan= $this->input->post('id');
        $where = $id_penjualan;
        $data['hari'] = $this->M_laporan->tampil_detail($where)->result();
        // $data['minggu'] = $this->M_laporan->tampil_detail($where,'penjualan')->result();
        // $data['bulanan'] = $this->M_laporan->tampil_detail($where,'penjualan')->result();
        $this->load->view('view_1/konten/manager/laporan/detail', $data);
    }
}
