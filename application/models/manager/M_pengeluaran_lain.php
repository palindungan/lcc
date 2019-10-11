<?php

class M_pengeluaran_lain extends CI_Model
{
    function tampil_data()
    {
        $id_toko = $this->session->userdata('id_toko');
        return $this->db->query("SELECT * FROM pengeluaran_lain JOIN user USING(id_user) JOIN toko USING(id_toko) WHERE id_toko='$id_toko' ORDER BY tanggal DESC")->result();
    }
    function input_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    function get_no()
    {
        $field = "id_pengeluaran_l";
        $tabel = "pengeluaran_lain";
        $digit = "2";

        $q = $this->db->query("SELECT MAX(RIGHT($field,$digit)) AS kd_max FROM $tabel");
        $kd = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int) $k->kd_max) + 1;
                $kd = sprintf("%04s", $tmp);
            }
        } else {
            $kd = "01";
        }
        date_default_timezone_set('Asia/Jakarta');
        return 'L' . date('dmy') . $kd;
    }
}
