<?php
class InventarisController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('InventarisModel');
        $this->load->helper('url');
        $this->load->library('form_validation');
    }

    public function index() {
        $data['title'] = "Inventaris";
        $data['content'] = $this->load->view('inventaris_view', [], TRUE);
        $this->load->view('layouts/main', $data);
    }

    public function fetch() {
        $data = $this->InventarisModel->get_all_inventaris();
        echo json_encode(array("data" => $data));
    }

    public function create() {
        // Setting up form validation rules
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
        $this->form_validation->set_rules('kode_barang', 'Kode Barang', 'required');
        $this->form_validation->set_rules('kategori_barang', 'Kategori Barang', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required|integer');
        $this->form_validation->set_rules('kondisi_barang', 'Kondisi Barang', 'required');
        $this->form_validation->set_rules('tanggal_input', 'Tanggal Input', 'required');

        if ($this->form_validation->run() === FALSE) {
            // Return validation errors if form validation fails
            echo json_encode(array(
                "status" => FALSE, 
                "error" => validation_errors()
            ));
        } else {
            $data = array(
                'nama_barang' => $this->input->post('nama_barang'),
                'kode_barang' => $this->input->post('kode_barang'),
                'kategori_barang' => $this->input->post('kategori_barang'),
                'jumlah' => $this->input->post('jumlah'),
                'kondisi_barang' => $this->input->post('kondisi_barang'),
                'tanggal_input' => $this->input->post('tanggal_input')
            );

            if ($this->InventarisModel->insert_inventaris($data)) {
                echo json_encode(array("status" => TRUE));
            } else {
                echo json_encode(array("status" => FALSE));
            }
        }
    }

    public function update() {
        // Setting up form validation rules
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
        $this->form_validation->set_rules('kode_barang', 'Kode Barang', 'required');
        $this->form_validation->set_rules('kategori_barang', 'Kategori Barang', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required|integer');
        $this->form_validation->set_rules('kondisi_barang', 'Kondisi Barang', 'required');
        $this->form_validation->set_rules('tanggal_input', 'Tanggal Input', 'required');

        if ($this->form_validation->run() === FALSE) {
            // Return validation errors if form validation fails
            echo json_encode(array(
                "status" => FALSE, 
                "error" => validation_errors()
            ));
        } else {
            $id = $this->input->post('id');
            $data = array(
                'nama_barang' => $this->input->post('nama_barang'),
                'kode_barang' => $this->input->post('kode_barang'),
                'kategori_barang' => $this->input->post('kategori_barang'),
                'jumlah' => $this->input->post('jumlah'),
                'kondisi_barang' => $this->input->post('kondisi_barang'),
                'tanggal_input' => $this->input->post('tanggal_input')
            );

            if ($this->InventarisModel->update_inventaris($id, $data)) {
                echo json_encode(array("status" => TRUE));
            } else {
                echo json_encode(array("status" => FALSE));
            }
        }
    }

    public function delete($id) {
        if ($this->InventarisModel->delete_inventaris($id)) {
            echo json_encode(array("status" => TRUE));
        } else {
            echo json_encode(array("status" => FALSE));
        }
    }
}
