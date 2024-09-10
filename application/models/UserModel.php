<?php
class UserModel extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    // Register user
    public function register($data) {
        return $this->db->insert('users', $data);
    }

    // Check if username exists
    public function check_username($username) {
        $query = $this->db->get_where('users', array('username' => $username));
        return $query->row_array();
    }

    // Login user
    public function login($username, $password) {
        $this->db->where('username', $username);
        $query = $this->db->get('users');
        
        if ($query->num_rows() == 1) {
            $user = $query->row_array();
            // Verifikasi password
            if (password_verify($password, $user['password'])) {
                return $user;
            }
        }
        return false;
    }
}
