<?php
require('./assets/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
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
        $data['bulanan'] = $this->M_laporan->tampil_bulan()->result();
        $this->template->load('view_1/template/manager', 'view_1/konten/manager/laporan/v_laporan_penjualan',$data);
	}
    public function custom()
    {
        $tgl1 = date('Y-m-d', strtotime($this->input->post('tgl_mulai')));
        $tgl2 = date('Y-m-d', strtotime($this->input->post('tgl_akhir')));
        $tgl_mulai = $tgl1." 00:00:01";
        $tgl_akhir = $tgl2." 23:59:59";
        $data['custom'] = $this->M_laporan->tampil_data2($tgl_mulai,$tgl_akhir)->result();
        $data['tgl_mulai'] = $this->input->post('tgl_mulai');
        $data['tgl_akhir'] = $this->input->post('tgl_akhir');
        $html = $this->load->view('view_1/konten/manager/laporan/print_laporan',$data,true);
        $this->dompdf->PdfGenerator($html,'coba','A4','landscape');
    }
    public function cetak_hari()
    {
      $data['hari'] = $this->M_laporan->tampil_hari()->result();
      $html = $this->load->view('view_1/konten/manager/laporan/print_per_hari',$data,true);
      $tanggal = date('d/m/Y');
      $this->dompdf->PdfGenerator($html,'laporan-'.$tanggal,'A4','landscape');
    }
    public function cetak_bulan()
    {
      $data['bulanan'] = $this->M_laporan->tampil_bulan()->result();
      $html = $this->load->view('view_1/konten/manager/laporan/print_per_bulan',$data,true);
      $tanggal = date('F-Y');
      $this->dompdf->PdfGenerator($html,'laporan'.$tanggal,'A4','landscape'); 
    }
    public function excel_hari()
    {
        $spreadsheet = new Spreadsheet;
        // Mengatur Lebar Kolom
        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(5);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(35);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(20);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(15);
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(15);
        $spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(5);
        $spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(15);
        $spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth(20);
        $spreadsheet->getActiveSheet()->getColumnDimension('I')->setWidth(20);
        $spreadsheet->getActiveSheet()->getColumnDimension('J')->setWidth(15);
        // Mengatur Tinggi Kolom
        $spreadsheet->getActiveSheet()->getRowDimension('1')->setRowHeight(35);
        // Atur Warna background color dan text
        $spreadsheet->getActiveSheet()->getStyle('A1:G1')
        ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
        $spreadsheet->getActiveSheet()->getStyle('A1:G1')->getFill()
        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
        ->getStartColor()->setARGB('006400');
        $spreadsheet->getActiveSheet()->getStyle('H1:J1')
        ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
        $spreadsheet->getActiveSheet()->getStyle('H1:J1')->getFill()
        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
        ->getStartColor()->setARGB('8B0000');
        // Tutup
        $spreadsheet->getActiveSheet()->getStyle('A1:J1')->getAlignment()->setHorizontal('center');


        // Border
        $spreadsheet->getActiveSheet()->getStyle('A1:J1')->getBorders()->getallBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK)->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);;
        
        

        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A1', 'No')
        ->setCellValue('B1', 'Nama Barang')
        ->setCellValue('C1', 'Tanggal & Waktu')
        ->setCellValue('D1', 'Harga Beli')
        ->setCellValue('E1', 'Harga Jual')
        ->setCellValue('F1', 'Qty')
        ->setCellValue('G1', 'Keuntungan')
        ->setCellValue('H1', 'Deskripsi Pengeluaran')
        ->setCellValue('I1', 'Tanggal & Waktu')
        ->setCellValue('J1', 'Jumlah');

        $kolom = 2;
        $nomor = 1;

        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A' . $kolom, $nomor)
        ->setCellValue('B' . $kolom, 'asd')
        ->setCellValue('C' . $kolom, 'asd')
        ->setCellValue('D' . $kolom, 'asd')
        ->setCellValue('E' . $kolom, 'asd')
        ->setCellValue('F' . $kolom, 'asd')
        ->setCellValue('G' . $kolom, 'asd')
        ->setCellValue('H' . $kolom, 'Pembayaran Wifi')
        ->setCellValue('I' . $kolom, '10/12/2019 23:05:20')
        ->setCellValue('J' . $kolom, '9.000.000');

        


        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Latihan.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}
