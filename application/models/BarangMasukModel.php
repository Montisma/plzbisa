<?php
class BarangMasukModel extends CI_Model {

    // Get all barang masuk data with related inventaris name
    public function get_all_barang_masuk() {
        $this->db->select('barang_masuk.*, inventaris.nama_barang');
        $this->db->from('barang_masuk');
        $this->db->join('inventaris', 'barang_masuk.inventaris_id = inventaris.id');
        return $this->db->get()->result_array();
    }

    // Insert a new barang masuk record
    public function insert_barang_masuk($data) {
        // Insert barang masuk record
        if ($this->db->insert('barang_masuk', $data)) {
            // Update the quantity in the inventaris table (add to stock)
            $this->db->set('jumlah', 'jumlah + ' . (int) $data['jumlah'], FALSE);
            $this->db->where('id', $data['inventaris_id']);
            return $this->db->update('inventaris');
        } else {
            return false; // Handle insertion failure
        }
    }
}
