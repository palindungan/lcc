<?php
class M_pemasokan extends CI_Model
{
    function tampil_data($data)
    {
        return $this->db->get($data);
    }

    function input_data($table, $data)
    {
        $this->db->insert($table, $data);
    }

    function hapus_data($table, $where)
    {
        // idnya
        $this->db->where($where);

        // tabelnya
        $this->db->delete($table);
    }

    function get_data($table, $where)
    {
        return $this->db->get_where($table, $where);
    }

    function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    // autogenerate kode / ID
    function get_no_barang_terdaftar()
    {
        $field = "kode";
        $tabel = "barang_terdaftar";
        $digit = "5";
        $kode = "B";

        $q = $this->db->query("SELECT MAX(RIGHT($field,$digit)) AS kd_max FROM $tabel");
        $kd = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int) $k->kd_max) + 1;
                $kd = $kode . sprintf('%0' . $digit . 's',  $tmp);
            }
        } else {
            $kd = "B00001";
        }

        return $kd;
    }

    function get_no_pemasokan()
    {
        $field = "id_pemasokan";
        $tabel = "pemasokan";
        $digit = "2";
        date_default_timezone_set("Asia/Jakarta");
        $tanggal = Date('Ymd');
        $kodes = "M";
        $kode = $kodes . $tanggal;
        $q = $this->db->query("SELECT RIGHT($field,$digit) AS kd_max,id_pemasokan FROM $tabel ORDER BY $field DESC LIMIT 1");
        $kd = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tgl_lama = substr($k->id_pemasokan, 1, 8);
                if ($tgl_lama == $tanggal) {
                    $tmp = ((int) $k->kd_max) + 1;
                    $kd = $kode . sprintf('%0' . $digit . 's', $tmp);
                } else {
                    $a = "01";
                    $kd = $kode . $a;
                }
            }
        }
        return $kd;
    }

    function search_autocomplete($field, $data)
    {
        $this->db->like($field, $data, 'both');
        $this->db->order_by($field, 'ASC');
        $this->db->limit(10);
        return $this->db->get('barang_terdaftar')->result();
    }
}
