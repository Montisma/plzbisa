<?php
class InventarisModel extends CI_Model {
    
    public function get_all_inventaris() {
        return $this->db->get('inventaris')->result_array();
    }

    public function insert_inventaris($data) {
        return $this->db->insert('inventaris', $data);

    }

    public function get_inventaris_by_id($id) {
        return $this->db->get_where('inventaris', array('id' => $id))->row_array();
    }

    public function update_inventaris($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('inventaris', $data);
    }

    public function delete_inventaris($id) {
        $this->db->where('id', $id);
        return $this->db->delete('inventaris');
    }
}
