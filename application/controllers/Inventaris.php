<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventaris extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Inventaris_model');
    }

    public function index() {
        $this->load->view('inventaris/index');
    }

    public function get_data() {
        $data = $this->Inventaris_model->get_all();
        echo json_encode($data);
    }

    public function create() {
        $data = array(
            'nama_barang' => $this->input->post('nama_barang'),
            'kode_barang' => $this->input->post('kode_barang'),
            'kategori_barang' => $this->input->post('kategori_barang'),
            'jumlah' => $this->input->post('jumlah'),
            'kondisi_barang' => $this->input->post('kondisi_barang'),
            'tanggal_input' => date('Y-m-d H:i:s')
        );
        $insert = $this->Inventaris_model->create($data);
        echo json_encode(array("status" => TRUE));
    }

    public function update() {
        $data = array(
            'nama_barang' => $this->input->post('nama_barang'),
            'kode_barang' => $this->input->post('kode_barang'),
            'kategori_barang' => $this->input->post('kategori_barang'),
            'jumlah' => $this->input->post('jumlah'),
            'kondisi_barang' => $this->input->post('kondisi_barang'),
        );
        $this->Inventaris_model->update($this->input->post('id'), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function delete($id) {
        $this->Inventaris_model->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }
}
