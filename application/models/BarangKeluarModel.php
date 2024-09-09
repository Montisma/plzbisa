<?php
class BarangKeluarModel extends CI_Model {

    // Get all barang keluar data with related inventaris name
    public function get_all_barang_keluar() {
        $this->db->select('barang_keluar.*, inventaris.nama_barang');
        $this->db->from('barang_keluar');
        $this->db->join('inventaris', 'barang_keluar.inventaris_id = inventaris.id');
        return $this->db->get()->result_array();
    }

    // Insert a new barang keluar record
    public function insert_barang_keluar($data) {
        // Insert barang keluar record
        if ($this->db->insert('barang_keluar', $data)) {
            // Update the quantity in the inventaris table (add to stock)
            $this->db->set('jumlah', 'jumlah + ' . (int) $data['jumlah'], FALSE);
            $this->db->where('id', $data['inventaris_id']);
            return $this->db->update('inventaris');
        } else {
            return false; // Handle insertion failure
        }
    }
}
