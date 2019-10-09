<?php 
 
class M_pengeluaran_lain extends CI_Model
{
	function tampil_data()
	{
		$id_toko = $this->session->userdata('id_toko');        
		return $this->db->query("SELECT * FROM pengeluaran_lain JOIN user USING(id_user) JOIN toko USING(id_toko) WHERE id_toko='$id_toko' ORDER BY tanggal DESC")->result();
    }
    function input_data($data,$table)
    {
        $this->db->insert($table,$data);
    }
    function id_pengeluaran_l()
    {
        $field = "id_pengeluaran_l";
        $tabel = "pengeluaran_lain";
        $digit = "2";
        date_default_timezone_set("Asia/Jakarta");
        $tanggal = Date('Ymd');
        $kodes = "L";
        $kode = $kodes.$tanggal;
        $q = $this->db->query("SELECT RIGHT($field,$digit) AS kd_max,id_pengeluaran_l FROM $tabel ORDER BY $field DESC LIMIT 1");
        $kd = "";
        if ($q->num_rows() > 0) {
        foreach ($q->result() as $k) {
        $tgl_lama = substr($k->id_pengeluaran_l,1,8);
        if($tgl_lama == $tanggal)
        {
        $tmp = ((int) $k->kd_max) + 1;
        $kd = $kode . sprintf('%0' . $digit . 's', $tmp);
        } else {
        $a = "01";
        $kd = $kode.$a;
        }
        }
        }
        return $kd;
    }
    function hapus_data($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
    }
}
