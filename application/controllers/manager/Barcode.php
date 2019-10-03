<?php
class Barcode extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('manager/M_barcode');
    }
    public function index()
    {
        $data['record'] = $this->M_barcode->data_barang()->result();
        $this->template->load('view_1/template/manager', 'view_1/konten/manager/barcode/tampil',$data);
    }
    public function print_barcode($id)
    {
        $where = array('barcode' => $id);
        $data['record'] = $this->M_barcode->edit_data($where,'barang_toko')->result();
        $html = $this->load->view('view_1/konten/manager/barcode/print',$data,true);
        $this->dompdf->PdfGenerator($html,'coba','A4','landscape');
    }
}
