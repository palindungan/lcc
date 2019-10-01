<?php 
/**
 * 
 */
class User extends CI_controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('kasir/M_user');
		$this->load->model('kasir/M_toko');
		$this->load->library('form_validation');
	}
	function index(){
		$data['user'] = $this->M_user->tampil();
		$this->template->load('view_1/template/manager', 'view_1/konten/manager/user/view', $data);
	}
	function insert (){
		$data['toko'] = $this->M_toko->tampil();
		$this->template->load('view_1/template/manager', 'view_1/konten/manager/user/input',$data);	
	}
	function insert_data(){
		$kode = $this->M_user->get_no();
		$data = array(
		'id_user' => $kode,
		'nama_user' => $this->input->post('nama_user'),	
		'username' => $this->input->post('username'),		
		'password' => $this->input->post('password'),		
		'jenis_akses' => $this->input->post('jenis_akses'),
		'id_toko' => $this->input->post('id_toko')
		);
		$input = $this->M_user->input($data);
		if($input){
				redirect('manager/user');
		}else{
			echo "gagal";
		}
	}
	function edit($id){
		$where = array('id_user'=>$id);
		$data['edit'] = $this->M_user->edit($where, 'user')->result();
		$data['toko'] = $this->M_toko->tampil();
		$this->template->load('view_1/template/manager', 'view_1/konten/manager/user/edit', $data);
	}
	function update(){
		$id_user = $this->input->post('id_user');
		$nama_user = $this->input->post('nama_user');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$jenis_akses = $this->input->post('jenis_akses');
		$id_toko = $this->input->post('id_toko');

		$data = array(
			'nama'  => $nama,
			'username' => $username,
			'password' => $password,
			'jenis_akses' => $jenis_akses,
			'id_toko' => $id_toko
		);
		$where = array(
			'id_user' => $id_user
		);
		$this->M_user->update($where,$data,'user');
		redirect('manager/user');
	}
	function hapus($id){
		$where =array('id_user'=>$id);
		$this->M_user->hapus_data($where,'user');
		redirect('manager/user');
	}
}