<?php 

class Home extends CI_Controller {
    public function index() {

        if (!($this->session->userdata('token'))) {
            redirect("auth");
        }
        
        $data['username'] = $this->session->userdata("username");
        $data['judul'] = 'Halaman Home';

        $this->load->view('templates/header', $data);
        $this->load->view('home/index', $data);
        $this->load->view('templates/footer');
    }
}