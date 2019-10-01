<?php 
 
class M_laporan extends CI_Model
{
	function tampil_data()
	{
		return $this->db->get('penjualan');
	}
	function tampil_data2($tgl_mulai,$tgl_akhir)
	{
		$query = $this->db->query("SELECT * FROM penjualan WHERE tanggal
              between '$tgl_mulai' AND '$tgl_akhir'");
		return $query;
	}
}