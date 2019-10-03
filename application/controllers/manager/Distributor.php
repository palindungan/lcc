<?php 
/**
  * 
  */
 class Distributor extends CI_Controller
 {
 	
 	function __construct()
 	{
 		parent::__construct();
 		$this->load->model('kasir/M_distributor');
 		$this->load->library('form_validation');	
 	}
 	function index(){
 		$data['data'] =$this->M_distributor->tampil();
 		$this->template->load('view_1/template/manager', 'view_1/konten/manager/distributor/tampil', $data);
 	}
 	function insert(){
 		$this->template->load('view_1/template/manager', 'view_1/konten/manager/distributor/input');
 	}
 	function insert_data(){
 		$kode = $this->M_distributor->get_no();
 		$data = array(
 			'id_distributor' => $kode,
 			'nama' => $this->input->post('nama'),
 			'alamat' => $this->input->post('alamat'),
 			'no_hp' => $this->input->post('no_hp')
 		);
 		$input = $this->M_distributor->input($data);
 		if($input){
 			redirect("manager/distributor");
 		}else{
 			echo "gagal";
 		}
 	}
 	function edit($id){
 			$where = array('id_distributor'=>$id);
 			$data['distributor'] = $this->M_distributor->edit($where, 'distributor');
 			$this->template->load('view_1/template/manager', 'view_1/konten/manager/distributor/edit',$data);
 		}
 	function update(){
		$id_distributor = $this->input->post('id_distributor');
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
		redirect('manager/distributor');
		}
 	function hapus($id){
		$where =array('id_distributor'=>$id);
		$this->M_distributor->hapus_data($where,'distributor');
		redirect('manager/distributor');
	}
 } 