<?php
class User_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function validate($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query = $this->db->get('users');

        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function register($username, $password)
    {
        // Check if the username already exists
        $this->db->where('username', $username);
        $query = $this->db->get('users');

        if ($query->num_rows() > 0) {
            return false; // Username already exists
        }

        // Insert new user into the database
        $data = array(
            'username' => $username,
            'password' => $password
        );

        return $this->db->insert('users', $data);
    }
}
