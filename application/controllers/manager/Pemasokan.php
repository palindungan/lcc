<?php
class Pemasokan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('id_user')) {
            redirect('/');
        } else if ($this->session->userdata('akses') != 'Manager') {
            echo '<script>
                window.history.back();
            </script>';
        }
        $this->load->model("manager/M_pemasokan");
    }
    public function index()
    {
        $data['distributor'] = $this->M_pemasokan->tampil_data('distributor')->result();
        $this->template->load('view_1/template/manager', 'view_1/konten/manager/pemasokan/tampil', $data);
    }
    public function tampil_daftar_barang()
    {
        $data_tbl['tbl_data'] = $this->M_pemasokan->tampil_data('barang_terdaftar')->result();

        $data = json_encode($data_tbl);

        echo $data;
    }
    public function get_barang_terdaftar()
    {
        $kode = $this->input->post('kode');
        $data_barang['data'] = $this->M_pemasokan->get_data('barang_terdaftar', $kode)->result();

        $data = json_encode($data_barang);

        echo $data;
    }

    public function input_transaksi_form()
    {
        // data pemasokan
        $id_pemasokan = $this->M_pemasokan->get_no_pemasokan(); // generate
        $id_user = "U01";
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

                $kode = "kosong";
                $nama = $this->input->post('nama')[$i];
                $barcode = "kosong";

                // data stok
                $qty = $this->input->post('qty')[$i];
                $hrg_distributor = $this->input->post('hrg_distributor')[$i];
                $total_hrg = $qty * $hrg_distributor;
                $kode_unik = "kosong";

                // validasi barcode dan kode_unik 
                $kode_atau_barcode = $this->input->post('kode_atau_barcode')[$i];
                $validasi = substr($kode_atau_barcode, 0, 3); // CD-

                if ($validasi == "CD-") {
                    $barcode = $kode_atau_barcode;
                } else {
                    $kode_unik = $kode_atau_barcode;
                }

                if ($barcode != "kosong") {

                    // deteksi apakah ada barcode yang sama di database
                    $data_barcode = array(
                        'barcode' => $barcode
                    );
                    $cek = $this->M_pemasokan->get_data("barang_terdaftar_barcode", $data_barcode)->num_rows();

                    if ($cek >= 1) {

                        // jika barcode sudah ada maka akan memakai data yang lama

                        // mengambil kode dari barang terdaftar
                        $query = $this->M_pemasokan->get_data("barang_terdaftar_barcode", $data_barcode);
                        foreach ($query->result_array() as $row) {
                            $kode = $row["kode"];
                        }
                    } else {

                        // jika barcode belum ada maka akan menambahkan data baru

                        $kode = $this->M_pemasokan->get_no_barang_terdaftar(); // generate

                        $data = array(
                            'kode' => $kode,
                            'nama' => $nama,
                            'barcode' => $barcode
                        );

                        $this->M_pemasokan->input_data('barang_terdaftar', $data);
                    }
                } else {

                    // deteksi apakah ada nama yang sama di database (barang terdaftar)
                    $data_nama = array(
                        'nama' => $nama
                    );
                    $cek = $this->M_pemasokan->get_data("barang_terdaftar_bukan_barcode", $data_nama)->num_rows();

                    if ($cek >= 1) {

                        // jika nama sudah ada maka akan memakai data yang lama

                        // mengambil nama dari barang terdaftar
                        $query = $this->M_pemasokan->get_data("barang_terdaftar_bukan_barcode", $data_nama);
                        foreach ($query->result_array() as $row) {
                            $kode = $row["kode"];
                        }
                    } else {

                        // jika nama belum ada maka akan menambahkan data baru
                        $kode = $this->M_pemasokan->get_no_barang_terdaftar(); // generate

                        $data = array(
                            'kode' => $kode,
                            'nama' => $nama,
                            'barcode' => $barcode
                        );

                        $this->M_pemasokan->input_data('barang_terdaftar', $data);
                    }
                }

                // proses pemasukan ke dalam database stok barang
                $data = array(
                    'id_pemasokan' => $id_pemasokan,
                    'kode' => $kode,
                    'qty' => $qty,
                    'hrg_distributor' => $hrg_distributor,
                    'total_hrg' => $total_hrg,
                    'kode_unik' => $kode_unik
                );

                $this->M_pemasokan->input_data('stok_barang', $data);
            }
        }
    }
}
