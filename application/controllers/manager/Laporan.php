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
          redirect('login/logout');
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
        $nama_toko = $this->session->userdata('nama_toko');
        date_default_timezone_set("Asia/Jakarta");
        $data = $this->M_laporan->tampil_hari()->result();
        $data2 = $this->M_laporan->pengeluaran_hari()->result();  
        $tanggal = date('d F Y');
        $tanggal_title = date('d-m-Y');
        $spreadsheet = new Spreadsheet;
        // Mengatur Lebar Kolom
        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(5);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(35);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(20);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(14);
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(14);
        $spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(5);
        $spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(14);
        $spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth(23);
        $spreadsheet->getActiveSheet()->getColumnDimension('I')->setWidth(20);
        $spreadsheet->getActiveSheet()->getColumnDimension('J')->setWidth(14);
        // $spreadsheet->getActiveSheet()->getColumnDimension('A1')->setWidth(200);
        // Mengatur Tinggi Kolom
        $spreadsheet->getActiveSheet()->getRowDimension('1')->setRowHeight(35);
        $spreadsheet->getActiveSheet()->getRowDimension('2')->setRowHeight(25);
        // Atur Warna background color dan text
        $spreadsheet->getActiveSheet()->getStyle('A2:G2')
        ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
        $spreadsheet->getActiveSheet()->getStyle('A2:G2')->getFill()
        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
        ->getStartColor()->setARGB('006400');
        $spreadsheet->getActiveSheet()->getStyle('H2:J2')
        ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
        $spreadsheet->getActiveSheet()->getStyle('H2:J2')->getFill()
        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
        ->getStartColor()->setARGB('8B0000');
        // Tutup

        // Atur alignment JUDUL
        $spreadsheet->getActiveSheet()->getStyle('A2:J2')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('A2:J2')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->getStyle('A2:J2')
        ->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP);

        // Border
        $spreadsheet->getActiveSheet()->getStyle('A2:J2')->getBorders()->getallBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK)->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);;
        
        // Atur JUDUL
        $spreadsheet->getActiveSheet()->getStyle('A1:J1')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle("A1:J1")->getFont()->setSize(20);
        $spreadsheet->getActiveSheet()->getStyle('A1:J1')
        ->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP);
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('A1', 'Laporan Toko '.$nama_toko." Tanggal ".$tanggal);

        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A2', 'No')
        ->setCellValue('B2', 'Nama Customer & Nama Barang')
        ->setCellValue('C2', 'Tanggal & Waktu')
        ->setCellValue('D2', 'Harga Beli')
        ->setCellValue('E2', 'Harga Jual')
        ->setCellValue('F2', 'Qty')
        ->setCellValue('G2', 'Keuntungan')
        ->setCellValue('H2', 'Deskripsi')
        ->setCellValue('I2', 'Tanggal & Waktu')
        ->setCellValue('J2', 'Jumlah');

        $kolom = 3;
        $nomor = 1;
        $total_harga_beli = 0;
        $total_harga_jual = 0;
        $total_keuntungan = 0;
        foreach($data as $row) {
        $keuntungan = $row->harga_jual *
        $row->jumlah_barang -
        $row->hrg_distributor * $row->jumlah_barang;

        $total_harga_beli += $row->hrg_distributor;
        $total_harga_jual += $row->harga_jual;
        $total_keuntungan += $keuntungan;
        
        $spreadsheet->getActiveSheet()->getStyle('A')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->getStyle('C')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->getStyle('D')->getAlignment()->setHorizontal('right');
        $spreadsheet->getActiveSheet()->getStyle('E')->getAlignment()->setHorizontal('right');
        $spreadsheet->getActiveSheet()->getStyle('F')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->getStyle('G')->getAlignment()->setHorizontal('right');
        

        
        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A' . $kolom, $nomor)
        ->setCellValue('B' . $kolom, '('.$row->nama_customer.") ".$row->nama_barang)
        ->setCellValue('C' . $kolom, date('d/m/Y H:i:s', strtotime($row->tanggal_penjualan)))
        ->setCellValue('D' . $kolom, number_format($row->hrg_distributor,0,".",","))
        ->setCellValue('E' . $kolom, number_format($row->harga_jual,0,".",","))
        ->setCellValue('F' . $kolom, $row->jumlah_barang)
        ->setCellValue('G' . $kolom, number_format($keuntungan,0,".",","));
          $kolom++;
          $nomor++;
        }

        

        
        $kolom2 = 3;
        $total_pengeluaran = 0;        
        foreach($data2 as $row2)
        $total_pengeluaran += $row2->total;
        {
          $spreadsheet->getActiveSheet()->getStyle('I')->getAlignment()->setHorizontal('center');
          $spreadsheet->getActiveSheet()->getStyle('J')->getAlignment()->setHorizontal('right');
          
          $spreadsheet->setActiveSheetIndex(0)
          ->setCellValue('H' . $kolom2, $row2->deskripsi)
          ->setCellValue('I' . $kolom2, date('d/m/Y H:i:s', strtotime($row2->tanggal)))
          ->setCellValue('J' . $kolom2, number_format($row2->total,0,".",","));
          $kolom2++;
        }

        // TOTAL
        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('D'.$kolom,number_format($total_harga_beli,0,".",","))
        ->setCellValue('E'.$kolom,number_format($total_harga_jual,0,".",","))
        ->setCellValue('G'.$kolom,number_format($total_keuntungan,0,".",","))
        ->setCellValue('J'.$kolom,number_format($total_pengeluaran,0,".",","));



        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$nama_toko." ".$tanggal_title.'.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
    public function excel_bulan()
    {
      $nama_toko = $this->session->userdata('nama_toko');
      date_default_timezone_set("Asia/Jakarta");
      $data = $this->M_laporan->tampil_bulan()->result();
      $data2 = $this->M_laporan->pengeluaran_bulan()->result();
      $tanggal = date('F Y');
      $tanggal_title = date('F Y');
      $spreadsheet = new Spreadsheet;
      // Mengatur Lebar Kolom
      $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(5);
      $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(35);
      $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(20);
      $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(14);
      $spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(14);
      $spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(5);
      $spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(14);
      $spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth(23);
      $spreadsheet->getActiveSheet()->getColumnDimension('I')->setWidth(20);
      $spreadsheet->getActiveSheet()->getColumnDimension('J')->setWidth(14);
      // $spreadsheet->getActiveSheet()->getColumnDimension('A1')->setWidth(200);
      // Mengatur Tinggi Kolom
      $spreadsheet->getActiveSheet()->getRowDimension('1')->setRowHeight(35);
      $spreadsheet->getActiveSheet()->getRowDimension('2')->setRowHeight(25);
      // Atur Warna background color dan text
      $spreadsheet->getActiveSheet()->getStyle('A2:G2')
      ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
      $spreadsheet->getActiveSheet()->getStyle('A2:G2')->getFill()
      ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
      ->getStartColor()->setARGB('006400');
      $spreadsheet->getActiveSheet()->getStyle('H2:J2')
      ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
      $spreadsheet->getActiveSheet()->getStyle('H2:J2')->getFill()
      ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
      ->getStartColor()->setARGB('8B0000');
      // Tutup

      // Atur alignment JUDUL
      $spreadsheet->getActiveSheet()->getStyle('A2:J2')->getFont()->setBold(true);
      $spreadsheet->getActiveSheet()->getStyle('A2:J2')->getAlignment()->setHorizontal('center');
      $spreadsheet->getActiveSheet()->getStyle('A2:J2')
      ->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP);

      // Border
      $spreadsheet->getActiveSheet()->getStyle('A2:J2')->getBorders()->getallBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK)->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);;

      // Atur JUDUL
      $spreadsheet->getActiveSheet()->getStyle('A1:J1')->getFont()->setBold(true);
      $spreadsheet->getActiveSheet()->getStyle("A1:J1")->getFont()->setSize(20);
      $spreadsheet->getActiveSheet()->getStyle('A1:J1')
      ->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP);
      $spreadsheet->setActiveSheetIndex(0)->setCellValue('A1', 'Laporan Toko '.$nama_toko." Bulan ".$tanggal);

      $spreadsheet->setActiveSheetIndex(0)
      ->setCellValue('A2', 'No')
      ->setCellValue('B2', 'Nama Customer & Nama Barang')
      ->setCellValue('C2', 'Tanggal & Waktu')
      ->setCellValue('D2', 'Harga Beli')
      ->setCellValue('E2', 'Harga Jual')
      ->setCellValue('F2', 'Qty')
      ->setCellValue('G2', 'Keuntungan')
      ->setCellValue('H2', 'Deskripsi')
      ->setCellValue('I2', 'Tanggal & Waktu')
      ->setCellValue('J2', 'Jumlah');

      $kolom = 3;
      $nomor = 1;
      $total_harga_beli = 0;
      $total_harga_jual = 0;
      $total_keuntungan = 0;
      foreach($data as $row) {
      $keuntungan = $row->harga_jual *
      $row->jumlah_barang -
      $row->hrg_distributor * $row->jumlah_barang;

      $total_harga_beli += $row->hrg_distributor;
      $total_harga_jual += $row->harga_jual;
      $total_keuntungan += $keuntungan;

      $spreadsheet->getActiveSheet()->getStyle('A')->getAlignment()->setHorizontal('center');
      $spreadsheet->getActiveSheet()->getStyle('C')->getAlignment()->setHorizontal('center');
      $spreadsheet->getActiveSheet()->getStyle('D')->getAlignment()->setHorizontal('right');
      $spreadsheet->getActiveSheet()->getStyle('E')->getAlignment()->setHorizontal('right');
      $spreadsheet->getActiveSheet()->getStyle('F')->getAlignment()->setHorizontal('center');
      $spreadsheet->getActiveSheet()->getStyle('G')->getAlignment()->setHorizontal('right');
      $spreadsheet->getActiveSheet()->getStyle('I')->getAlignment()->setHorizontal('center');
      $spreadsheet->getActiveSheet()->getStyle('J')->getAlignment()->setHorizontal('right');


      $spreadsheet->setActiveSheetIndex(0)
      ->setCellValue('A' . $kolom, $nomor)
      ->setCellValue('B' . $kolom, '('.$row->nama_customer.") ".$row->nama_barang)
      ->setCellValue('C' . $kolom, date('d/m/Y H:i:s', strtotime($row->tanggal_penjualan)))
      ->setCellValue('D' . $kolom, number_format($row->hrg_distributor,0,".",","))
      ->setCellValue('E' . $kolom, number_format($row->harga_jual,0,".",","))
      ->setCellValue('F' . $kolom, $row->jumlah_barang)
      ->setCellValue('G' . $kolom, number_format($keuntungan,0,".",","));
      $kolom++;
      $nomor++;
      }




      $kolom2 = 3;
      $total_pengeluaran = 0;
      foreach($data2 as $row2)
      $total_pengeluaran += $row2->total;
      {
      $spreadsheet->setActiveSheetIndex(0)
      ->setCellValue('H' . $kolom2, $row2->deskripsi)
      ->setCellValue('I' . $kolom2, date('d/m/Y H:i:s', strtotime($row2->tanggal)))
      ->setCellValue('J' . $kolom2, number_format($row2->total,0,".",","));
      $kolom2++;
      }

      // TOTAL
      $spreadsheet->setActiveSheetIndex(0)
      ->setCellValue('D'.$kolom,number_format($total_harga_beli,0,".",","))
      ->setCellValue('E'.$kolom,number_format($total_harga_jual,0,".",","))
      ->setCellValue('G'.$kolom,number_format($total_keuntungan,0,".",","))
      ->setCellValue('J'.$kolom,number_format($total_pengeluaran,0,".",","));



      $writer = new Xlsx($spreadsheet);

      header('Content-Type: application/vnd.ms-excel');
      header('Content-Disposition: attachment;filename="'.$nama_toko." ".$tanggal_title.'.xlsx"');
      header('Cache-Control: max-age=0');

      $writer->save('php://output');
    }
}
