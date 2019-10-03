<?php
class M_home extends CI_Model
{

	function barang_kasir()
	{
		return $this->db->get_where('barang_kasir',array('qty >' => 0))->result();
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
	public function search($keyword){
		$this->db->like('nama', $keyword);
		$this->db->or_like('barcode', $keyword);
		$this->db->or_like('kode_unik', $keyword);
		$result = $this->db->get_where('barang_kasir',array('qty >' => 0))->result(); // Tampilkan data siswa berdasarkan keyword
		return $result;
	}

	
}
