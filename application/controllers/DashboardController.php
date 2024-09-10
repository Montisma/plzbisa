<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('InventarisModel');
        $data['chart_data'] = $this->InventarisModel->get_inventory_data();
    }

    public function index() {
        $data['title'] = 'Dashboard';
        $data['total_items'] = $this->InventarisModel->get_total_items();
        $data['total_masuk'] = $this->InventarisModel->get_total_masuk();
        $data['total_keluar'] = $this->InventarisModel->get_total_keluar();
        $chart_data = $this->InventarisModel->get_inventory_data();
        $data['category_names'] = array_column($chart_data, 'kategori_barang'); // Nama kategori barang
        $data['category_counts'] = array_column($chart_data, 'total'); // Jumlah barang per kategori

        // Memuat view dashboard dengan data yang sudah dikumpulkan
        $data['content'] = $this->load->view('dashboard', $data, TRUE);
        $this->load->view('layouts/main', $data);
    }

}
