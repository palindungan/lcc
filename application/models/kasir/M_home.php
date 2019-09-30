<?php
class M_home extends CI_Model
{
	public function tampil_data()
	{
		$query = $this->db->get("barang_kasir");
		return $query->result();
	}	
}
