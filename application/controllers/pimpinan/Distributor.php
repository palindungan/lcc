<?php 
/**
  * 
  */
 class Distributor extends CI_Controller
 {
 	
 	function __construct()
 	{
		 parent:: __construct();
		 if(!$this->session->userdata('id_user')){
		 redirect('/');
		 }
		 else if($this->session->userdata('akses') != 'Pimpinan')
		 {
		 echo '<script>
		 	window.history.back();
		 </script>';
		 }
 		$this->load->model('kasir/M_distributor');
 		$this->load->library('form_validation');
 	}
 	function index(){
 		$data['distributor'] = $this->M_distributor->tampil();
 		$this->template->load('view_1/template/pimpinan', 'view_1/konten/pimpinan/distributor/tampil',$data);
 	}
 	function insert(){
 		$this->template->load('view_1/template/pimpinan', 'view_1/konten/pimpinan/distributor/input');
 	}
 	function insert_data(){
 		$this->form_validation->set_rules('nama', 'nama', 'required');
 		$this->form_validation->set_rules('alamat', 'alamat', 'required');
 		$this->form_validation->set_rules('no_hp', 'no hp', 'required');
 		if($this->form_validation->run()==TRUE){
 			$kode = $this->M_distributor->get_no();
 		$data = array(
 			'id_distributor' => $kode,
 			'nama' => $this->input->post('nama'),
 			'alamat' => $this->input->post('alamat'),
 			'no_hp' => $this->input->post('no_hp')
 		);
 		$input = $this->M_distributor->input($data);
 		if($input){
 			redirect("pimpinan/distributor");
 		}else{
 			echo "gagal";
 		}
 	}else{
 		$this->template->load('view_1/template/pimpinan', 'view_1/konten/pimpinan/distributor/input');	
 		}
 	}
 		function edit($id){
 			$where = array('id_distributor'=>$id);
 			$data['distributor'] = $this->M_distributor->edit($where, 'distributor');
 			$this->template->load('view_1/template/pimpinan', 'view_1/konten/pimpinan/distributor/edit',$data);
 		}
 		function update(){
		$this->form_validation->set_rules('nama', 'nama', 'required');
 		$this->form_validation->set_rules('alamat', 'alamat', 'required');
 		$this->form_validation->set_rules('no_hp', 'no hp', 'required');
		if($this->form_validation->run()==TRUE){
			$nama = $this->input->post('nama');
			$alamat = $this->input->post('alamat');
			$no_hp = $this->input->post('no_hp');
			$data = array(
				'nama'  => $nama,
				'alamat' => $alamat,
				'no_hp' => $no_hp
			);
		$where = array(
			'id_distributor' => $id_distributor
		);
		$this->M_distributor->update($where,$data,'distributor');
		redirect('pimpinan/distributor');
		}
		else{
			echo "<script>window.location = '". base_url("pimpinan/distributor/edit/".$this->input->post('id_distributor'))."';</script>";
		}
	}
		function hapus($id){
		$where =array('id_distributor'=>$id);
		$this->M_distributor->hapus_data($where,'distributor');
		redirect('distributor');
	}
 }
