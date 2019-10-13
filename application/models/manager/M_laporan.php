<?php 
 
class M_laporan extends CI_Model
{
	function tampil_data2($tgl_mulai,$tgl_akhir)
	{
		$id_toko = $this->session->userdata('id_toko');
		$query  = $this->db->query("SELECT id_penjualan,barang_terdaftar.nama AS nama_barang,customer.nama AS nama_customer,penjualan.tanggal AS tanggal_penjualan,detail_penjualan.qty AS jumlah_barang,harga_jual,detail_penjualan.total_hrg AS total_harga,id_toko,hrg_distributor FROM detail_penjualan JOIN stok_barang USING(id_stok_b) JOIN barang_terdaftar USING(kode) JOIN penjualan USING(id_penjualan)  JOIN user USING(id_user) JOIN toko USING(id_toko)JOIN customer USING(id_customer) WHERE penjualan.tanggal BETWEEN '$tgl_mulai' AND '$tgl_akhir' AND id_toko='$id_toko' ORDER BY id_penjualan DESC");	
		return $query;
	}
	function tampil_hari()
	{
		$id_toko = $this->session->userdata('id_toko');
		$query  = $this->db->query("SELECT id_penjualan,barang_terdaftar.nama AS nama_barang,customer.nama AS nama_customer,penjualan.tanggal AS tanggal_penjualan,detail_penjualan.qty AS jumlah_barang,harga_jual,detail_penjualan.total_hrg AS total_harga,id_toko,hrg_distributor FROM detail_penjualan JOIN stok_barang USING(id_stok_b) JOIN barang_terdaftar USING(kode) JOIN penjualan USING(id_penjualan)  JOIN user USING(id_user) JOIN toko USING(id_toko)JOIN customer USING(id_customer) WHERE DATE(penjualan.tanggal) = DATE(now()) AND id_toko='$id_toko' ORDER BY id_penjualan DESC ");	
		return $query;	
	}
	// function tampil_Minggu()
	// {

	// 	$id_toko = $this->session->userdata('id_toko');
	// 	$query = $this->db->query("SELECT barang_terdaftar.nama AS nama_barang,customer.nama AS
	// 	nama_customer,penjualan.tanggal AS tanggal_penjualan,detail_penjualan.qty AS
	// 	jumlah_barang,harga_jual,detail_penjualan.total_hrg AS total_harga,id_toko,hrg_distributor FROM detail_penjualan JOIN stok_barang USING(id_stok_b) JOIN barang_terdaftar USING(kode) JOIN penjualan USING(id_penjualan) JOIN user USING(id_user) JOIN toko USING(id_toko)JOIN customer USING(id_customer) WHERE penjualan.tanggal BETWEEN SUBDATE(now(),
	// 	INTERVAL 7 DAY) AND NOW() AND id_toko='$id_toko' ");
	// 	return $query;	
	// }
	function tampil_bulan()
	{
		$id_toko = $this->session->userdata('id_toko');
		$query = $this->db->query("SELECT id_penjualan,barang_terdaftar.nama AS nama_barang,customer.nama AS
		nama_customer,penjualan.tanggal AS tanggal_penjualan,detail_penjualan.qty AS
		jumlah_barang,harga_jual,detail_penjualan.total_hrg AS total_harga,id_toko,hrg_distributor FROM detail_penjualan JOIN stok_barang USING(id_stok_b) JOIN barang_terdaftar USING(kode) JOIN penjualan USING(id_penjualan) JOIN user USING(id_user) JOIN toko USING(id_toko)JOIN customer USING(id_customer) WHERE MONTH(penjualan.tanggal) = MONTH(CURRENT_DATE()) AND id_toko='$id_toko' ORDER BY id_penjualan DESC ");
		return $query;
	}
}
