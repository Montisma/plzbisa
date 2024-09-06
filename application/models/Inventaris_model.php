<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventaris_model extends CI_Model {

    public function get_all() {
        $query = $this->db->get('inventaris');
        return $query->result();
    }

    public function create($data) {
        $this->db->insert('inventaris', $data);
        return $this->db->insert_id();
    }

    public function update($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('inventaris', $data);
        return $this->db->affected_rows();
    }

    public function delete_by_id($id) {
        $this->db->where('id', $id);
        $this->db->delete('inventaris');
    }
}
