<?php 
 
class M_login extends CI_Model
{
	public function cek_login(){
        $where = array(
        'username' => $this->input->post('username'),
        'password' => $this->input->password_hash('password', true)
        );
        $this->db->select('*'); // Select field
        $this->db->from('user'); // from Table1
        $this->db->join('toko','user.id_toko = toko.id_toko','INNER');
        $this->db->where($where);
	    return $this->db->get();
	}
}
