<?php 
/**
 * 
 */
class M_toko extends CI_Model
{
	
	function tampil()
	{
		$query = $this->db->get("toko");
		return $query->result();
	}
	function input($data){
		return $this->db->insert('user', $data);
	}
}