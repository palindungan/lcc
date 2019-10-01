<?php 
 
class M_gudang extends CI_Model
{
	function tampil_data()
	{
        // Nanti didapat dari session
        $id_toko = "T1";
		return $this->db->query("SELECT kode_unik,barcode,nama,tanggal,hrg_distributor,qty,id_toko FROM stok_barang JOIN barang_terdaftar USING(kode) JOIN pemasokan USING(id_pemasokan) JOIN user USING(id_user) JOIN toko USING (id_toko) WHERE id_toko='$id_toko' AND qty > 0");
	}
}
