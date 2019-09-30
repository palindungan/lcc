<?php
class Home extends CI_Controller
{
    public function index()
    {
        $this->template->load('view_1/template/manager', 'view_1/konten/manager/home/tampil');
    }
}
