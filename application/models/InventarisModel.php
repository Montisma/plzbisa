<?php
class InventarisModel extends CI_Model {
    
    // Get all inventaris data
    public function get_all_inventaris() {
        return $this->db->get('inventaris')->result_array();
    }

    // Insert a new inventaris record
    public function insert_inventaris($data) {
        return $this->db->insert('inventaris', $data);
    }

    // Get a single inventaris record by ID
    public function get_inventaris_by_id($id) {
        return $this->db->get_where('inventaris', array('id' => $id))->row_array();
    }

    // Update an existing inventaris record by ID
    public function update_inventaris($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('inventaris', $data);
    }

    // Delete an inventaris record by ID
    public function delete_inventaris($id) {
        $this->db->where('id', $id);
        return $this->db->delete('inventaris');
    }
}
