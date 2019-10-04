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
	function tampil_hari()
	{
		$query = $this->db->query("SELECT * FROM penjualan WHERE tanggal >= DATE(NOW())");
		return $query;	
	}
	function tampil_Minggu()
	{

	$query = $this->db->query("SELECT * FROM penjualan WHERE  YEARWEEK(`tanggal`, 1) = YEARWEEK(CURDATE(), 1)");
		return $query;
	}
	function tampil_bulan()
	{
		$query  = $this->db->query("SELECT * FROM penjualan WHERE YEAR(tanggal) = 2019 AND MONTH(tanggal) = 10");
		return $query;
	}
	function tampil_detail($id)
	{
		$query  = $this->db->query("SELECT * FROM penjualan INNER JOIN detail_penjualan 
		ON penjualan.id_penjualan=detail_penjualan.id_penjualan where detail_penjualan.id_penjualan = '$id' ");
		return $query;
	}
}