<?php
class Pemasokan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $this->template->load('view_1/template/manager', 'view_1/konten/manager/pemasokan/tampil');
    }
}
