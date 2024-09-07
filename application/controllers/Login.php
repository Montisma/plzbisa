<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('User_model'); 
    }

    public function index()
    {
        $this->load->view('loginview');
    }

    public function submit()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->User_model->validate($username, $password);

        if ($user) {
            $this->session->set_userdata('logged_in', true);
            $this->session->set_userdata('username', $username);
            redirect('home'); // Change to 'home' to match the view name
        } else {
            $data['error'] = 'Invalid username or password.';
            $this->load->view('loginview', $data);
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('username');
        $this->session->sess_destroy();
        redirect('login'); // Redirect to login page after logout
    }

    public function home()
    {
        if ($this->session->userdata('logged_in')) {
            $this->load->view('home');
        } else {
            redirect('login');
        }
    }
}
?>
