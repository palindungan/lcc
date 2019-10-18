<?php 
/**
  * 
  */
class Edit_account extends CI_Controller
{

    function __construct()
    {
        parent:: __construct();
        if(!$this->session->userdata('id_user')){
        redirect('/');
        }
        else if($this->session->userdata('akses') != 'Pimpinan')
        {
        redirect('login/logout');
        }
        $this->load->model('pimpinan/M_edit_account');
    }
    function index(){
        $row = $this->M_edit_account->ambil_biodata();
        $data['id'] = $row->id_user_p;
        $data['nama'] = $row->nama;
        $data['username'] = $row->username;
        $this->template->load('view_1/template/pimpinan', 'view_1/konten/pimpinan/edit_account/tampil',$data);
    }
    function ubah_biodata()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $data = array(
            'nama' => $nama,
            'username' => $username
        );
        $where = array(
        'id_user_p' => $id
        );
        $this->M_edit_account->update($where,$data,'pimpinan');
        redirect('edit_account');
    }
}
