<?php
class Pengeluaran_lain extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('id_user')) {
            redirect('/');
        } else if ($this->session->userdata('akses') != 'Manager') {
            echo '<script>
                window.history.back();
            </script>';
        }
        $this->load->model('manager/M_pengeluaran_lain');
    }
    public function index()
    {
        $data['record'] = $this->M_pengeluaran_lain->tampil_data();
        $this->template->load('view_1/template/manager', 'view_1/konten/manager/pengeluaran_lain/tampil', $data);
    }
    public function add()
    {
        $this->template->load('view_1/template/manager', 'view_1/konten/manager/pengeluaran_lain/tambah');
    }
    public function store()
    {
        $this->form_validation->set_rules('deskripsi', 'deskripsi pengeluaran', 'required');
        $this->form_validation->set_rules('jumlah_pengeluaran', 'jumlah_pengeluaran', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->template->load('view_1/template/manager', 'view_1/konten/manager/pengeluaran_lain/tambah');
        } else {
            date_default_timezone_set("Asia/Jakarta");
            $tanggal = Date('Y-m-d h:i:s');
            $id_pengeluaran_l = $this->M_pengeluaran_lain->get_no();
            $id_user = $this->session->userdata('id_user');
            $jumlah_pengeluaran = $this->input->post('jumlah_pengeluaran');
            $deskripsi = $this->input->post('deskripsi');
            $harga = preg_replace("/[^0-9]/", "", $jumlah_pengeluaran);
            $total = (int) $harga;

            $data = array(
                'id_pengeluaran_l' => $id_pengeluaran_l,
                'id_user' => $id_user,
                'tanggal' => $tanggal,
                'total' => $total,
                'deskripsi' => $deskripsi
            );
            $this->M_pengeluaran_lain->input_data($data, 'pengeluaran_lain');
            redirect('pengeluaran_lain');
        }
    }
    public function delete($id)
    {
        $where = array('id_pengeluaran_l' => $id);
        $this->M_pengeluaran_lain->hapus_data($where, 'pengeluaran_lain');
        redirect('pengeluaran_lain');
    }
}
