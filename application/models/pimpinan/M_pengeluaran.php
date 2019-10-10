<?php 
 
class M_pengeluaran extends CI_Model
{
    function tampil_toko()
    {
        return $this->db->get("toko")->result();
    }

    // Pengeluaran Lain Lain SEMUA TOKO
    function pengeluaran_semua_hari()
    {
        return $this->db->query("SELECT * FROM pengeluaran_lain JOIN user USING(id_user) JOIN toko USING(id_toko) WHERE
        DATE(tanggal) = DATE(now()) ORDER BY tanggal DESC")->result();
    }
    function pengeluaran_semua_minggu()
    {
        return $this->db->query("SELECT * FROM pengeluaran_lain JOIN user USING(id_user) JOIN toko USING(id_toko) WHERE
        tanggal BETWEEN SUBDATE(now(), INTERVAL 7 DAY) AND NOW() ORDER BY tanggal DESC")->result();
    }
    function pengeluaran_semua_bulan()
    {
        return $this->db->query("SELECT * FROM pengeluaran_lain JOIN user USING(id_user) JOIN toko USING(id_toko) WHERE
        MONTH(tanggal) = MONTH(CURRENT_DATE()) ORDER BY tanggal DESC")->result();
    }
    // TUTUP Semua

    // Pengeluaran Lain Lain LCC 
    function pengeluaran_lcc_hari()
    {
        return $this->db->query("SELECT * FROM pengeluaran_lain JOIN user USING(id_user) JOIN toko USING(id_toko) WHERE DATE(tanggal) = DATE(now()) AND id_toko='T1' ORDER BY tanggal DESC")->result();
    }
    function pengeluaran_lcc_minggu()
    {
        return $this->db->query("SELECT * FROM pengeluaran_lain JOIN user USING(id_user) JOIN toko USING(id_toko) WHERE tanggal BETWEEN SUBDATE(now(), INTERVAL 7 DAY) AND NOW() AND id_toko='T1' ORDER BY tanggal DESC")->result();
    }
    function pengeluaran_lcc_bulan()
    {
        return $this->db->query("SELECT * FROM pengeluaran_lain JOIN user USING(id_user) JOIN toko USING(id_toko) WHERE MONTH(tanggal) = MONTH(CURRENT_DATE()) AND id_toko='T1' ORDER BY tanggal DESC")->result();
    }
    // TUTUP LCC

    // Pengeluaran LAIN LAIN CMC
    function pengeluaran_cmc_hari()
    {
        return $this->db->query("SELECT * FROM pengeluaran_lain JOIN user USING(id_user) JOIN toko USING(id_toko) WHERE
        DATE(tanggal) = DATE(now()) AND id_toko='T2' ORDER BY tanggal DESC")->result();
    }
    function pengeluaran_cmc_minggu()
    {
        return $this->db->query("SELECT * FROM pengeluaran_lain JOIN user USING(id_user) JOIN toko USING(id_toko) WHERE
        tanggal BETWEEN SUBDATE(now(), INTERVAL 7 DAY) AND NOW() AND id_toko='T2' ORDER BY tanggal DESC")->result();
    }
    function pengeluaran_cmc_bulan()
    {
        return $this->db->query("SELECT * FROM pengeluaran_lain JOIN user USING(id_user) JOIN toko USING(id_toko) WHERE
        MONTH(tanggal) = MONTH(CURRENT_DATE()) AND id_toko='T2' ORDER BY tanggal DESC")->result();
    }
    // TUTUP CMC

    // Pengeluaran LAIN LAIN PROBOLINGGO
    function pengeluaran_probolinggo_hari()
    {
        return $this->db->query("SELECT * FROM pengeluaran_lain JOIN user USING(id_user) JOIN toko USING(id_toko) WHERE
        DATE(tanggal) = DATE(now()) AND id_toko='T3' ORDER BY tanggal DESC")->result();
    }
    function pengeluaran_probolinggo_minggu()
    {
        return $this->db->query("SELECT * FROM pengeluaran_lain JOIN user USING(id_user) JOIN toko USING(id_toko) WHERE
        tanggal BETWEEN SUBDATE(now(), INTERVAL 7 DAY) AND NOW() AND id_toko='T3' ORDER BY tanggal DESC")->result();
    }
    function pengeluaran_probolinggo_bulan()
    {
        return $this->db->query("SELECT * FROM pengeluaran_lain JOIN user USING(id_user) JOIN toko USING(id_toko) WHERE
        MONTH(tanggal) = MONTH(CURRENT_DATE()) AND id_toko='T3' ORDER BY tanggal DESC")->result();
    }
    // TUTUP PROBOLINGGO

    // Pemasokan TOKO LCC
    function pemasokan_lcc_hari()
    {
        return $this->db->query("SELECT * FROM pemasokan JOIN user USING(id_user) JOIN toko USING(id_toko) JOIN distributor USING(id_distributor) WHERE DATE(tanggal) = DATE(now()) AND id_toko='T1' ORDER BY tanggal DESC")->result();
    }
    function pemasokan_lcc_minggu()
    {
        return $this->db->query("SELECT * FROM pemasokan JOIN user USING(id_user) JOIN toko USING(id_toko) JOIN distributor USING(id_distributor) WHERE tanggal BETWEEN SUBDATE(now(), INTERVAL 7 DAY) AND NOW() AND id_toko='T1' ORDER BY tanggal DESC")->result();
    }
    function pemasokan_lcc_bulan()
    {
        return $this->db->query("SELECT * FROM pemasokan JOIN user USING(id_user) JOIN toko USING(id_toko) JOIN distributor
        USING(id_distributor) WHERE MONTH(tanggal) = MONTH(CURRENT_DATE()) AND id_toko='T1' ORDER BY tanggal DESC")->result();
    }
}
