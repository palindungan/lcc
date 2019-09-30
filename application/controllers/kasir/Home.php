<?php
class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('kasir/M_home');
    }
    public function index()
    {
        $data['record'] = $this->M_home->tampil_data();
        $this->template->load('view_1/template/kasir', 'view_1/konten/kasir/home/tampil',$data);
    }
    public function add_cart()
    {
        $data_produk = array(
        'id' => $this->input->post('id'),
        'name' => $this->input->post('name'),
        'price' => $this->input->post('price'),
        'qty' => $this->input->post('qty')
        );
        $this->cart->insert($data_produk);
        redirect('kasir/home');
    }
    public function delete_cart($rowid)
    {
        if ($rowid == "all") {
        $this->cart->destroy();
        } else {
        $data = array(
        'rowid' => $rowid,
        'qty' => 0
        );
        $this->cart->update($data);
        }
        redirect('kasir/home');
    }
}
