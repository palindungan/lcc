<?php 
 
class M_barang extends CI_Model
{
	function data_barang()
	{
        // Nanti didapat dari session
		$id_toko = $this->session->userdata('id_toko');
		return $this->db->get_where('barang_toko', array(
			'id_toko' => $id_toko,
			'qty >' => '0' 
		));
	}
	function stok_habis_lcc()
	{
		return $this->db->get_where('barang_habis_toko', array(
		'id_toko' => 'T1',
		'stok <=' => '2'
		));
    }
    function stok_habis_cmc()
    {
        return $this->db->get_where('barang_habis_toko', array(
        'id_toko' => 'T2',
        'stok <='=> '2'
            ));
    }
    function stok_habis_probolinggo()
    {
        return $this->db->get_where('barang_habis_toko', array(
        'id_toko' => 'T3',
        'stok <='=> '2'
            ));
    }
	// function best_sell_minggu()
	// {
	// 	$id_toko = $this->session->userdata('id_toko');
	// 	$limit = 10;
	// 	return $this->db->get_where('best_sell_minggu', array(
	// 	'id_toko' => $id_toko),$limit);
	// }
	// function best_sell_bulan()
	// {
	// 	$id_toko = $this->session->userdata('id_toko');
	// 	$limit = 10;
	// 	return $this->db->get_where('best_sell_bulan', array(
	// 	'id_toko' => $id_toko),$limit);
	// }
	// function best_sell_tahun()
	// {
	// 	$id_toko = $this->session->userdata('id_toko');
	// 	$limit = 10;
	// 	return $this->db->get_where('best_sell_tahun', array(
	// 	'id_toko' => $id_toko),$limit);
	// }
}
