<?php
class M_home extends CI_Model
{

	function fetch_data($query)
	{
		$this->db->select("*");
		$this->db->from("barang_kasir");
		if($query != '')
		{
		$this->db->like('nama', $query);
		$this->db->or_like('kode_unik', $query);
		$this->db->or_like('barcode', $query);
		}
		$this->db->order_by('id_stok_b', 'DESC');
		return $this->db->get();
	}
	
}
