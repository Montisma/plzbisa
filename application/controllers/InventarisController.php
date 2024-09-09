<?php
class InventarisController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('InventarisModel');
        $this->load->helper('url');
        $this->load->library('form_validation');
    }

    public function index() {
        $data['title'] = 'Inventory Management';  
        $data['content'] = $this->load->view('inventaris_view', NULL, TRUE);
        $this->load->view('layouts/main', $data);
    }

    // Fetch all inventaris data
    public function fetch() {
        $data = $this->InventarisModel->get_all_inventaris();
        echo json_encode(array("data" => $data));
    }

    // Create a new inventaris record
    public function create() {
        $this->_validate();
        $data = array(
            'nama_barang' => $this->input->post('nama_barang'),
            'kode_barang' => $this->input->post('kode_barang'),
            'kategori_barang' => $this->input->post('kategori_barang'),
            'jumlah' => $this->input->post('jumlah'),
            'kondisi_barang' => $this->input->post('kondisi_barang'),
            'tanggal_input' => $this->input->post('tanggal_input')
        );
        $this->InventarisModel->insert_inventaris($data);
        echo json_encode(array("status" => TRUE));
    }

    // Edit a record (Fetch data by ID)
    public function edit($id) {
        $data = $this->InventarisModel->get_inventaris_by_id($id);
        echo json_encode($data);
    }

    // Update an existing record
    public function update() {
        $this->_validate();
        $id = $this->input->post('id');
        $data = array(
            'nama_barang' => $this->input->post('nama_barang'),
            'kode_barang' => $this->input->post('kode_barang'),
            'kategori_barang' => $this->input->post('kategori_barang'),
            'jumlah' => $this->input->post('jumlah'),
            'kondisi_barang' => $this->input->post('kondisi_barang'),
            'tanggal_input' => $this->input->post('tanggal_input')
        );
        $this->InventarisModel->update_inventaris($id, $data);
        echo json_encode(array("status" => TRUE));
    }

    // Delete a record by ID
    public function delete($id) {
        $this->InventarisModel->delete_inventaris($id);
        echo json_encode(array("status" => TRUE));
    }

    // Validate form data
    private function _validate() {
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
        $this->form_validation->set_rules('kode_barang', 'Kode Barang', 'required');
        $this->form_validation->set_rules('kategori_barang', 'Kategori Barang', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required|integer');
        $this->form_validation->set_rules('kondisi_barang', 'Kondisi Barang', 'required');
        $this->form_validation->set_rules('tanggal_input', 'Tanggal Input', 'required');

        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array("status" => FALSE, "error" => validation_errors()));
            exit();
        }
    }

    // Handle Barang Masuk (add stock)
    public function barang_masuk() {
        $data = array(
            'inventaris_id' => $this->input->post('inventaris_id'),
            'jumlah' => $this->input->post('jumlah'),
            'tanggal_masuk' => date('Y-m-d H:i:s')
        );
        $this->InventarisModel->barang_masuk($data);
        echo json_encode(array("status" => TRUE));
    }

    // Handle Barang Keluar (reduce stock)
    public function barang_keluar() {
        $data = array(
            'inventaris_id' => $this->input->post('inventaris_id'),
            'jumlah' => $this->input->post('jumlah')
        );
        $this->InventarisModel->barang_keluar($data);
        echo json_encode(array("status" => TRUE));
    }
}
