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

    public function barang_masuk($data) {
        // Insert into barang_masuk
        $this->db->insert('barang_masuk', $data);

        // Update the inventory (add jumlah)
        $this->db->set('jumlah', 'jumlah+' . $data['jumlah'], FALSE);
        $this->db->where('id', $data['inventaris_id']);
        $this->db->update('inventaris');
    }

    // Insert into barang_keluar table and update inventaris
    public function barang_keluar($data) {
        // Insert into barang_keluar
        $this->db->insert('barang_keluar', $data);

        // Update the inventory (subtract jumlah)
        $this->db->set('jumlah', 'jumlah-' . $data['jumlah'], FALSE);
        $this->db->where('id', $data['inventaris_id']);
        $this->db->update('inventaris');
    }
}

