<?php
class Home extends CI_Controller
{
    function __construct()
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
        $this->load->model('manager/M_home');
    }
    public function index()
    {
        $data['kasir'] = $this->M_home->count_kasir();
        $data['barang'] = $this->M_home->count_jenis_barang();
        $data['stok_habis'] = $this->M_home->count_stok_habis();
        $this->template->load('view_1/template/manager', 'view_1/konten/manager/home/tampil',$data);
    }
}
