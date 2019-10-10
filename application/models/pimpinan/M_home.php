<?php 
/**
 * 
 */
class M_home extends CI_Model
{
    function tampil_toko()
    {
        return $this->db->get("toko")->result();
    }
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

    function keuntungan_semua_hari()
    {
        return $this->db->query("SELECT SUM(hrg_distributor* detail_penjualan.qty) AS
        harga_beli_barang,SUM(harga_jual*detail_penjualan.qty) AS harga_jual_barang,tanggal FROM detail_penjualan JOIN stok_barang USING(id_stok_b) JOIN penjualan USING(id_penjualan) WHERE DATE(tanggal) = DATE(now())")->row();
    }
    function keuntungan_semua_minggu()
    {
        return $this->db->query("SELECT SUM(hrg_distributor* detail_penjualan.qty) AS
        harga_beli_barang,SUM(harga_jual*detail_penjualan.qty) AS harga_jual_barang,tanggal FROM detail_penjualan JOIN stok_barang USING(id_stok_b) JOIN penjualan USING(id_penjualan)  WHERE tanggal BETWEEN SUBDATE(now(), INTERVAL 7 DAY) AND NOW() ")->row();
    }
    function keuntungan_semua_bulan()
    {
        return $this->db->query("SELECT SUM(hrg_distributor* detail_penjualan.qty) AS
        harga_beli_barang,SUM(harga_jual*detail_penjualan.qty) AS harga_jual_barang,tanggal FROM
        detail_penjualan JOIN stok_barang USING(id_stok_b) JOIN penjualan USING(id_penjualan) WHERE MONTH(tanggal) = MONTH(CURRENT_DATE())")->row();
    }


    // function keuntungan_semua_hari()
    // {
    // $id_toko = $this->session->userdata('id_toko');
    // return $this->db->query("SELECT SUM(hrg_distributor* detail_penjualan.qty) AS
    // harga_beli_barang,SUM(harga_jual*detail_penjualan.qty) AS harga_jual_barang,id_toko,tanggal FROM detail_penjualan
    // JOIN stok_barang USING(id_stok_b) JOIN penjualan USING(id_penjualan) JOIN user USING(id_user) JOIN toko
    // USING(id_toko) WHERE DATE(tanggal) = DATE(now()) AND id_toko='$id_toko'")->row();
    // }
}
