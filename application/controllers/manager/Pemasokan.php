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
        $data['distributor'] = $this->M_pemasokan->tampil_data('distributor')->result();
        $this->template->load('view_1/template/manager', 'view_1/konten/manager/pemasokan/tampil', $data);
    }
    public function tampil_daftar_barang()
    {
        $data_tbl['tbl_data'] = $this->M_pemasokan->tampil_data('barang_terdaftar_barcode')->result();

        $data = json_encode($data_tbl);

        echo $data;
    }
    public function get_barang_terdaftar()
    {
        $kode = $this->input->post('kode');
        $data_barang['data'] = $this->M_pemasokan->get_data('barang_terdaftar_barcode', $kode)->result();

        $data = json_encode($data_barang);

        echo $data;
    }

    public function input_transaksi_form()
    {
        if (isset($_POST['id_pemasokan'])) {

            // data pemasokan
            $id_pemasokan = $this->input->post('id_pemasokan'); // generate
            $id_user = $this->input->post('id_user');
            $id_distributor = $this->input->post('id_distributor');
            $tanggal = $this->input->post('tanggal');
            $total = $this->input->post('total');

            $data = array(
                'id_pemasokan' => $id_pemasokan,
                'id_user' => $id_user,
                'id_distributor' => $id_distributor,
                'tanggal' => $tanggal,
                'total' => $total
            );

            $this->M_pemasokan->input_data('pemasokan', $data);

            if (isset($_POST['kode_atau_barcode'])) {

                // tambah detail transaksi
                for ($i = 0; $i < count($this->input->post('kode_atau_barcode')); $i++) {

                    $kode = $this->input->post('kode'); // generate
                    $kode_atau_barcode = $this->input->post('kode_atau_barcode')[$i];
                    $qty = $this->input->post('qty')[$i];
                    $hrg_distributor = $this->input->post('hrg_distributor')[$i];
                    $total_hrg = $this->input->post('total_hrg')[$i];

                    // validasi barcode dan kode_unik 
                    $kode_unik = $this->input->post('kode_unik')[$i];

                    $data2 = array(
                        'id_pemasokan' => $id_pemasokan,
                        'id_menu' => $id_menu
                    );

                    $this->M_data_paket->input_data('tbl_detail_paket_menu', $data2);
                }
            }
        }
    }
}
