<?php 
 
class M_barang extends CI_Model
{
	function data_barang()
	{
        // Nanti didapat dari session
        $id_toko = "T1";
		return $this->db->get_where('barang_toko', array(
			'id_toko' => $id_toko,
			'qty >' => '0' 
		));
	}
	function stok_habis()
	{
		$id_toko = "T1";
		return $this->db->get_where('barang_habis_toko', array(
		'id_toko' => $id_toko,
		'stok <=' => '2'
		));
	}
	function best_sell_minggu()
	{
		$id_toko = "T1";
		$limit = 10;
		return $this->db->get_where('best_sell_minggu', array(
		'id_toko' => $id_toko),$limit);
	}
}
