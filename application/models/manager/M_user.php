<?php 
/**
 * 
 */
class M_user extends CI_model
{
	
	function get_toko()
	{
		$query = $this->db->get("toko");
		return $query->result();
	}
    function tampil(){
        $this->db->select('*');
        $this->db->from('user u,toko t');
        $where = "t.id_toko = u.id_toko";
        $this->db->where($where);
        return $this->db->get()->result();
    }
		function input($data){
		return $this->db->insert('user', $data);
	}
	function get_no()
    {
        $field = "id_user";
        $tabel = "user";
        $digit = "2";
        $kode = "U";
        $q = $this->db->query("SELECT MAX(RIGHT($field,$digit)) AS kd_max FROM $tabel");
        $kd = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int) $k->kd_max) + 1;
                $kd = $kode . sprintf('%0' . $digit . 's',  $tmp);
            }
        } else {
            $kd = "U01";
        }
        return $kd;
    }
    function edit($where,$table){
        return $this->db->get_where($table,$where)->result();
    }
    function update($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }
    function hapus_data($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
    }
}