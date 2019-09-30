<?php
class Home extends CI_Controller
{
    public function index()
    {
        $this->template->load('view_1/template/kasir', 'view_1/konten/kasir/home/tampil');
    }
}
