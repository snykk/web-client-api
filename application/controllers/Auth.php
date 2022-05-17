<?php 

use GuzzleHttp\Client;

class Auth extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index() {
        
        if ($this->session->userdata('token')) {
            redirect("home");
        }

        $this->form_validation->set_rules('username', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('password', 'Nama Lengkap', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data["title"] = "Login";
    
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/index');
            $this->load->view('templates/auth_footer');
        } else {
            $client = new Client();
            try {
                $response = $client->request(
                    'POST',
                    'localhost:5000/api/auth/login',
                    [
                        'json' => [
                            'username' => $this->input->post("username", true),
                            'password' =>  $this->input->post("password", true)
                        ]
                    ]
                );
                
                $result = json_decode($response->getBody()->getContents());
                

                $data = [
                    'username' => $result->data->username,
                    'token' => $result->token
                ];
                
                $this->session->set_userdata($data);
        
                redirect("home");
        
        
            } catch (RuntimeException $e) {

                $this->session->set_flashdata(
                    'message', 
                    '<div class="alert alert-danger d-flex align-items-center" role="alert">
                        <div>
                        Otentikasi <strong>gagal</strong>
                        </div>
                    </div>'
                );
                redirect('auth');
            }
        }
    }

    public function register() {
        
        $this->form_validation->set_rules('username', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('password', 'Nama Lengkap', 'required|trim');
        
        if ($this->form_validation->run() == false) {
            $data["title"] = "Registrasi";

            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/register');
            $this->load->view('templates/auth_footer');
        } else {
            $client = new Client();

            try {
                $response = $client->request(
                    'POST',
                    'localhost:5000/api/auth/register',
                    [
                        'json' => [
                            'username' => $this->input->post("username", true),
                            'password' => $this->input->post("password", true)
                        ]
                    ]
                );
                
                // $result = json_decode($response->getBody());

                $this->session->set_flashdata(
                    'message', 
                    '<div class="alert alert-success d-flex align-items-center" role="alert">
                        <div>
                        Akun <strong>berhasil</strong> dibuat
                        </div>
                    </div>'
                );
                redirect('auth');

                redirect('auth/');
            } catch (RuntimeException $e) {

                $this->session->set_flashdata(
                    'message', 
                    '<div class="alert alert-danger d-flex align-items-center" role="alert">
                        <div>
                        Registrasi <strong>gagal</strong>
                        </div>
                    </div>'
                );
                redirect('auth/register');
            }
        }

    }

    public function logout() {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('token');

        $this->session->set_flashdata(
            'message', 
            '<div class="alert alert-success d-flex align-items-center" role="alert">
                <div>Session berakhir, anda <strong>berhasil</strong> logout! </div>
            </div>');
        redirect('auth');
    }
}