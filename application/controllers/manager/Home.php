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
    }
    public function index()
    {
        $this->template->load('view_1/template/manager', 'view_1/konten/manager/home/tampil');
    }
}
