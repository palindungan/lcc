<?php

/**
 * 
 */
class User extends CI_controller
{

	function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('id_user')) {
			redirect('/');
		} else if ($this->session->userdata('akses') != 'Manager') {
			redirect('login/logout');
		}
		$this->load->model('manager/M_user');
	}
	function index()
	{
		$data['user'] = $this->M_user->tampil();
		$this->template->load('view_1/template/manager', 'view_1/konten/manager/user/view', $data);
	}
	function insert()
	{
		$this->template->load('view_1/template/manager', 'view_1/konten/manager/user/input');
	}
	function insert_data()
	{
		$this->form_validation->set_rules('nama_user', 'nama user', 'required');
		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');
		if ($this->form_validation->run() == TRUE) {
			$id_toko = $this->session->userdata('id_toko');
			$kode = $this->M_user->get_no();
			$data = array(
				'id_user' => $kode,
				'nama_user' => $this->input->post('nama_user'),
				'username' => $this->input->post('username'),
				'jenis_akses' => "Kasir",
				'id_toko' => $id_toko,
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
			);
			$cek = $this->M_user->ambil_data($this->input->post('username'))->num_rows();
			if ($cek > 0) {
				//pemberitahuan dan pindah ke page window
				echo "<script>alert('tidak boleh 2 username yang sama');window.location = '" . base_url("user_kasir") . "';</script>";
			} else {
				//mengirim data ke model untuk diinputkan
				$this->M_user->input($data);
				//kembali ke halaman utama
				//redirect
				echo "<script>window.location = '" . base_url('user_kasir') . "';</script>";
			}
		} else {
			$this->template->load('view_1/template/manager', 'view_1/konten/manager/user/input');
		}
	}
	function edit($id)
	{
		$where = array('id_user' => $id);
		$data['edit'] = $this->M_user->edit($where, 'user');
		$data['toko'] = $this->M_toko->tampil();
		$this->template->load('view_1/template/manager', 'view_1/konten/manager/user/edit', $data);
	}
	function ganti_password($id)
	{
		$where = array(
			'id_user' => $id
		);
		$data['user'] = $this->M_user->edit($where, "user");
		$this->template->load('view_1/template/manager', 'view_1/konten/manager/user/gantipassword', $data);
	}
	function update()
	{
		$this->form_validation->set_rules('nama_user', 'nama user', 'required');
		$this->form_validation->set_rules('username', 'username', 'required');
		$id_user = $this->input->post('id_user');
		if ($this->form_validation->run() == TRUE) {
			$id_toko = $this->session->userdata('id_toko');
			$nama_user = $this->input->post('nama_user');
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$jenis_akses = "Kasir";
			$id_toko = $id_toko;
			$cek = $this->M_user->edit(['username' => $username,  "id_user !=" => $id_user],  "user");
			if (count($cek) == 0) {
				$data = array(
					'nama_user'  => $nama_user,
					'username' => $username,
					'password' => $password,
					'jenis_akses' => $jenis_akses,
					'id_toko' => $id_toko
				);
				$where = array(
					'id_user' => $id_user
				);
				$this->M_user->update($where, $data, 'user');
				redirect('user_kasir');
			} else {
				echo "<script>alert('username ada yang sama');window.location = '" . base_url("user_kasir/edit/" . $this->input->post('id_user')) . "';</script>";
			}
		} else {
			$this->edit($id_user);
			//redirect('user_kasir/edit/'.$this->input->post('id_user'));

		}
	}
	// 	$id_toko = $this->session->userdata('id_toko');
	// 	$id_user = $this->input->post('id_user');
	// 	$nama_user = $this->input->post('nama_user');
	// 	$username = $this->input->post('username');
	// 	$password = $this->input->post('password');
	// 	$jenis_akses = "Kasir";
	// 	$id_toko = $id_toko;
	// 	$cek = $this->M_user->edit(['username' => $username,  "id_user !=" => $id_user],  "user");
	// 	if(count($cek)==0){
	// 		$data = array(
	// 			'nama_user'  => $nama_user,
	// 			'username' => $username,
	// 			'password' => $password,
	// 			'jenis_akses' => $jenis_akses,
	// 			'id_toko' => $id_toko
	// 		);
	// 		$where = array(
	// 			'id_user' => $id_user
	// 		);
	// 		$this->M_user->update($where,$data,'user');
	// 		redirect('user_kasir');
	// 	}
	// 	else{
	// 		echo "username ada yg sama";
	// 	}
	// }
	function hapus($id)
	{
		$where = array('id_user' => $id);
		$this->M_user->hapus_data($where, 'user');
		redirect('user_kasir');
	}
	function update_password()
	{
		$config = array(
			array(
				'field' => 'password_lama',
				'label' => 'password_lama',
				'rules' => 'required'
			),
			array(
				'field' => 'password_baru',
				'label' => 'password_baru',
				'rules' => 'required'
			),
			array(
				'field' => 'confirm_password',
				'label' => 'confirm_password',
				'rules' => 'required'
			)
		);
		$password_sekarang = $this->input->post('password_sekarang');
		$password_lama = $this->input->post('password_lama');
		$password_baru = $this->input->post('password_baru');
		$confirm_password = $this->input->post('confirm_password');

		if (password_verify($password_lama, $password_sekarang) && $password_baru == $confirm_password) {
			$where = array('id_user' => $this->input->post('id_user'));
			$data = array(
				'password' => password_hash($password_baru, PASSWORD_DEFAULT)
			);
			$this->M_user->update($where, $data, 'user');
			redirect("user_kasir");
		} else {
			echo "<script>alert('password tidak cocok');window.location = '" . base_url("user_kasir/ganti_password/" . $this->input->post('id_user')) . "';</script>";
		}
	}
}
