<?php
class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('login/M_login');
    }
    public function index()
    {
        $this->load->view('view_1/login/login');
    }
    public function aksi_login(){
        $userpass = $this->input->post('password');
        $cek = $this->M_login->cek_login();
        if($cek->num_rows() > 0)
            {
                foreach($cek->result() as $row){
                $id_user = $row->id_user;
                $username = $row->username;
                $nama = $row->nama_user;
                $akses = $row->jenis_akses;
                $password = $row->password;
                $id_toko = $row->id_toko;
                $nama_toko = $row->nama_toko;
                }
                if (password_verify($userpass, $password)) {
                $data_session = array(
                'id_user' => $id_user,
                'username' => $username,
                'nama' => $nama,
                'akses' => $akses,
                'password' => $password,
                'id_toko' => $id_toko,
                'nama_toko' => $nama_toko
                );
                $this->session->set_userdata($data_session);
                if($row->jenis_akses == 'Manager')
                {
                redirect(base_url("dashboard_manager"));
                }
                else if($row->jenis_akses == 'Kasir')
                {
                redirect(base_url("kasir"));
                }
                }
            }
            else
            {
                echo "login gagal";
            }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('/'));
    }
}
