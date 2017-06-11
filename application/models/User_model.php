<?php



class User_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function login($username, $password)
    {
        $query = $this->db->get_where('user', ['username' => $username, 'password' => $password]);
        return $query->result_array();
    }
    public function register($username, $password){
        $this->db->insert('user', ['username' => $username, 'password' => $password]);
    }

}
