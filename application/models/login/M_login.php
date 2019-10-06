<?php 
 
class M_login extends CI_Model
{
	public function cek_login(){
        $password = $this->input->post("password", true);
        $where = array(
        'username' => $this->input->post('username'),
        'password' => password_hash($password, PASSWORD_BCRYPT)
        );
        $this->db->select('*'); // Select field
        $this->db->from('user'); // from Table1
        $this->db->join('toko','user.id_toko = toko.id_toko','INNER');
        $this->db->where($where);
	    return $this->db->get();
	}
}
