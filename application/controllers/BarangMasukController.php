<?php
class BarangMasukController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('BarangMasukModel');
        $this->load->model('InventarisModel'); // To fetch available inventaris items
        $this->load->helper('url');
    }

    public function index() {
        $data['title'] = 'Barang Masuk Management';
        $data['inventaris'] = $this->InventarisModel->get_all_inventaris(); // Fetch all inventaris data
        $data['content'] = $this->load->view('barang_masuk_view', $data, TRUE);
        $this->load->view('layouts/main', $data);
    }

    // Fetch all barang masuk records
    public function fetch() {
        $data = $this->BarangMasukModel->get_all_barang_masuk();
        echo json_encode(array("data" => $data));
    }

    // Create a new barang masuk record
    public function create() {
        $data = array(
            'inventaris_id' => $this->input->post('inventaris_id'),
            'jumlah' => $this->input->post('jumlah'),
            'tanggal_masuk' => date('Y-m-d H:i:s') // Assuming you're using the current time for barang masuk
        );
        $this->BarangMasukModel->insert_barang_masuk($data);
        echo json_encode(array("status" => TRUE));
    }
}
