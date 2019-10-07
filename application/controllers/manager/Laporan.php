<?php

class Laporan extends CI_Controller {
  public function __construct()
  {
        parent::__construct(); 
        if(!$this->session->userdata('id_user')){
          redirect('/');
        }
        else if($this->session->userdata('akses') != 'Manager')
        {
          echo '<script>
            window.history.back();
          </script>';
        }
        $this->load->model('manager/M_laporan');
	}

	public function index()
	{
        $data['hari'] = $this->M_laporan->tampil_hari()->result();
        $data['minggu'] = $this->M_laporan->tampil_minggu()->result();
        $data['bulanan'] = $this->M_laporan->tampil_bulan()->result();
        $this->template->load('view_1/template/manager', 'view_1/konten/manager/laporan/v_laporan_penjualan',$data);
	}
    public function custom()
    {
        $tgl1 = $this->input->post('tgl_mulai');
        $tgl2 = $this->input->post('tgl_akhir');
        $tgl_mulai = $tgl1." 00:00:01";
        $tgl_akhir = $tgl2." 23:59:59";
        $data['minggu'] = $this->M_laporan->tampil_data2($tgl_mulai,$tgl_akhir)->result();
        $html = $this->load->view('view_1/konten/manager/laporan/print_laporan',$data,true);
        $this->dompdf->PdfGenerator($html,'coba','A4','landscape');
    }
    public function cetak_hari()
    {
      $data['hari'] = $this->M_laporan->tampil_hari()->result();
      $html = $this->load->view('view_1/konten/manager/laporan/print_per_hari',$data,true);
      $tanggal = date('d-m-Y');
      $this->dompdf->PdfGenerator($html,'laporan-'.$tanggal,'A4','landscape');
    }
    public function cetak_minggu()
    {
      $data['minggu'] = $this->M_laporan->tampil_minggu()->result();
      $html = $this->load->view('view_1/konten/manager/laporan/print_per_minggu',$data,true);
      $this->dompdf->PdfGenerator($html,'laporan-mingguan','A4','landscape'); 
    }
    public function cetak_bulan()
    {
      $data['bulanan'] = $this->M_laporan->tampil_bulan()->result();
      $html = $this->load->view('view_1/konten/manager/laporan/print_per_bulan',$data,true);
      $tanggal = date('F-Y');
      $this->dompdf->PdfGenerator($html,'laporan'.$tanggal,'A4','landscape'); 
    }
}
