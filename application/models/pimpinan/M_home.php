<?php 
/**
 * 
 */
class M_home extends CI_Model
{
	function barang_lcc()
	{
        return $this->db->get_where('barang_toko', array(
        'id_toko' => 'T1'))->result();
    }
    function barang_cmc()
    {
        return $this->db->get_where('barang_toko', array(
        'id_toko' => 'T2'))->result();
    }
    function barang_probolinggo()
    {
        return $this->db->get_where('barang_toko', array(
        'id_toko' => 'T3'))->result();
    }
}
