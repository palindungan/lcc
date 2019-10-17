<?php
class M_home extends CI_Model
{

	function barang_kasir()
	{
		$id_toko = $this->session->userdata('id_toko');
		return $this->db->get_where('barang_kasir', array('id_toko' => $id_toko, 'qty >' => 0))->result();
	}
	function input_data($data, $table)
	{
		$this->db->insert($table, $data);
	}
	function id_customer()
	{
		$field = "id_customer";
        $tabel = "customer";
        $digit = "3";

        $q = $this->db->query("SELECT MAX(RIGHT($field,$digit)) AS kd_max FROM $tabel LIMIT 1");
        $kd = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int) $k->kd_max) + 1;
                $kd = sprintf("%04s", $tmp);
            }
        } else {
            $kd = "001";
        }
        date_default_timezone_set('Asia/Jakarta');
        return 'C' . date('dmy') . $kd;
	}
	function id_penjualan()
	{
		$field = "id_penjualan";
        $tabel = "penjualan";
        $digit = "3";

        $q = $this->db->query("SELECT MAX(RIGHT($field,$digit)) AS kd_max FROM $tabel LIMIT 1");
        $kd = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int) $k->kd_max) + 1;
                $kd = sprintf("%04s", $tmp);
            }
        } else {
            $kd = "001";
        }
        date_default_timezone_set('Asia/Jakarta');
        return 'P' . date('dmy') . $kd;
	}
	public function search($keyword)
	{
        $id_toko = $this->session->userdata('id_toko');
        $this->db->like('kode_unik',$keyword);
        $this->db->or_like('nama',$keyword);
		return $this->db->get_where('barang_kasir', array('id_toko' => $id_toko, 'qty >' => 0))->result();
    }
    
    function barang_qty_db($id_stok_b)
    {
    $id_toko = $this->session->userdata('id_toko');
    return $this->db->get_where('barang_kasir', array('id_toko' => $id_toko, 'qty >' => 0,'id_stok_b'=>$id_stok_b))->row();
    }
}
