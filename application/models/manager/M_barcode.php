<?php 
 
class M_barcode extends CI_Model
{
	function data_barang()
	{
		$id_toko = $this->session->userdata('id_toko');        
		return $this->db->get_where('barang_toko', array(
            'id_toko' => $id_toko,
            'barcode !=' => 'kosong'
		));
	}
	function edit_data($where,$table){
	return $this->db->get_where($table,$where);
	}
}
