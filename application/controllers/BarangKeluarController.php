<?php
class BarangKeluarController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('BarangKeluarModel');
        $this->load->model('InventarisModel'); // To fetch available inventaris items
        $this->load->helper('url');
    }

    public function index() {
        $data['title'] = 'Barang Keluar Management';
        $data['inventaris'] = $this->InventarisModel->get_all_inventaris(); // Fetch all inventaris data
        $data['content'] = $this->load->view('barang_keluar_view', $data, TRUE);
        $this->load->view('layouts/main', $data);
    }

    // Fetch all barang keluar records
    public function fetch() {
        $data = $this->BarangKeluarModel->get_all_barang_keluar();
        echo json_encode(array("data" => $data));
    }

    // Create a new barang keluar record
    public function create() {
        $data = array(
            'inventaris_id' => $this->input->post('inventaris_id'),
            'jumlah' => $this->input->post('jumlah'),
            'tanggal_keluar' => $this->input->post('tanggal_keluar')
        );
        $this->BarangKeluarModel->insert_barang_keluar($data);
        echo json_encode(array("status" => TRUE));
    }
}
