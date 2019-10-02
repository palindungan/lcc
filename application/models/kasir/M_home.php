<?php
class M_home extends CI_Model
{

	function fetch_data($query)
	{
		$id_toko = "T1";
		$this->db->select('*');
		$this->db->from('barang_kasir');
		$this->db->where('id_toko', $id_toko);
		$this->db->where('qty >', 0); 
		if($query != '')
		{
		$this->db->like('nama', $query);
		$this->db->or_like('kode_unik', $query);
		$this->db->or_like('barcode', $query);
		}
		return $this->db->get();
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
		date_default_timezone_set("Asia/Jakarta");
		$tanggal = Date('Ymd');
		$kodes = "C";
		$kode = $kodes.$tanggal;
		$q = $this->db->query("SELECT RIGHT($field,$digit) AS kd_max,id_customer FROM $tabel ORDER BY $field DESC LIMIT 1");
		$kd = "";
		if ($q->num_rows() > 0) {
			foreach ($q->result() as $k) {
			$tgl_lama = substr($k->id_customer,1,8);
			if($tgl_lama == $tanggal)
			{
				$tmp = ((int) $k->kd_max) + 1;
				$kd = $kode . sprintf('%0' . $digit . 's', $tmp);
			} else {
				$a = "001";
				$kd = $kode.$a;
			}
			}
		}
		return $kd;
	}
	function id_penjualan()
	{
		$field = "id_penjualan";
		$tabel = "penjualan";
		$digit = "3";
		date_default_timezone_set("Asia/Jakarta");
		$tanggal = Date('Ymd');
		$kodes = "P";
		$kode = $kodes.$tanggal;
		$q = $this->db->query("SELECT RIGHT($field,$digit) AS kd_max,id_penjualan FROM $tabel ORDER BY $field DESC LIMIT 1");
		$kd = "";
		if ($q->num_rows() > 0) {
			foreach ($q->result() as $k) {
			$tgl_lama = substr($k->id_penjualan,1,8);
			if($tgl_lama == $tanggal)
		{
			$tmp = ((int) $k->kd_max) + 1;
			$kd = $kode . sprintf('%0' . $digit . 's', $tmp);
		} else {
				$a = "001";
				$kd = $kode.$a;
			}
			}
		}
		return $kd;
	}

	
}
