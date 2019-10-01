<?php 
 
class M_laporan extends CI_Model
{
	function tampil_data()
	{
		return $this->db->get('penjualan');
	}
}