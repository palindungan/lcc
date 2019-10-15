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
        // $this->db->like('kode_unik',$keyword);
        // $this->db->or_like('barcode',$keyword);
		// return $this->db->get_where('barang_kasir', array('id_toko' => $id_toko, 'qty >' => 0))->result();
		$this->db->select('*');
		$this->db->from('barang_kasir bk');

		$where = "(bk.qty > 0 AND bk.nama like '%" . $keyword . "%' OR bk.kode_unik like '%" . $keyword . "%' OR bk.barcode like '%" .
		$keyword . "%') && bk.id_toko = '" . $id_toko . "'";
		$this->db->where($where);
		$this->db->order_by('bk.nama', 'ASC');

		return $this->db->get()->result();
	}
}
