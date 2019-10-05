<?php 
 
class M_home extends CI_Model
{
    function count_kasir()
    {
		$id_toko = $this->session->userdata('id_toko');        
        return $this->db->query("SELECT COUNT(*) as jumlah_kasir FROM user WHERE jenis_akses ='Kasir' AND id_toko='$id_toko'")->row();
    }
    function count_jenis_barang()
    {
		$id_toko = $this->session->userdata('id_toko');
        return $this->db->query("SELECT sum(tabel.jumlah_barang) AS jenis_barang
        FROM (
        SELECT COUNT(DISTINCT kode) AS jumlah_barang FROM stok_barang JOIN barang_terdaftar USING(kode) JOIN pemasokan
        USING(id_pemasokan) JOIN user USING(id_user) JOIN toko USING (id_toko) WHERE id_toko ='$id_toko' GROUP BY kode
        ) AS tabel")->row();
    }
    function count_stok_habis()
    {
		$id_toko = $this->session->userdata('id_toko');
        return $this->db->query("SELECT COUNT(*) AS jumlah_habis,id_toko FROM `barang_habis_toko` WHERE id_toko = '$id_toko'")->row();
    }
}
