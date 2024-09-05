<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load the URL helper
        $this->load->helper('url');
    }

    public function index() {
        $data['title'] = "Dashboard";
        $data['content'] = $this->load->view('dashboard', [], TRUE);
        $this->load->view('layouts/main', $data);
    }
}
