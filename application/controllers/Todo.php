<?php

use GuzzleHttp\Client;

class Todo extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Todo_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Daftar Todo';
        $data['todo'] = $this->Todo_model->getAllTodo();

        if( $this->input->post('cariTodo') ) {
            $data['todo'] = $this->Todo_model->cariDataTodo();
        }

        $this->load->view('templates/header', $data);
        $this->load->view('todo/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['judul'] = 'Form Tambah Data Todo';

        $this->form_validation->set_rules('todo', 'Todo', 'required');
        $this->form_validation->set_rules('level', 'Level', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('todo/tambah');
            $this->load->view('templates/footer');
        } else {
            $client = new Client();

            try {
                $token = $this->session->userdata("token");

                $response = $client->request('POST','localhost:5000/api/todos',
            [
                        'json' => [ 
                            'todo' => $this->input->post("todo", true), 
                            'level' => $this->input->post("level", true)
                        ],
                        'headers' => 
                        [
                            'Authorization' => "Bearer $token"
                        ]
                    ]
                );
                
                // $result = json_decode($response->getBody());

                $this->session->set_flashdata(
                    'message', 
                    '<div class="alert alert-success d-flex align-items-center" role="alert">
                        <div>
                        Todo <strong>berhasil</strong> ditambahkan
                        </div>
                    </div>'
                );
                
                redirect('todo/');
            } catch (RuntimeException $e) {

                $this->session->set_flashdata(
                    'message', 
                    '<div class="alert alert-danger d-flex align-items-center" role="alert">
                        <div>
                        gagal <strong>ditambahkan</strong>
                        </div>
                    </div>'
                );
                redirect('todo');
            }
        }
    }

    
    public function detail($id)
    {
        $data['judul'] = 'Detail Data Todo';

        $data['todo'] = $this->Todo_model->getTodoById($id);

        $this->load->view('templates/header', $data);
        $this->load->view('todo/detail', $data);
        $this->load->view('templates/footer');
    }

    public function ubah($id = null)
    {
        $data['judul'] = 'Form Ubah Data Todo';
        if ($id != null) {
            $data['todo'] = $this->Todo_model->getTodoById($id);
        }

        $this->form_validation->set_rules('todo', 'Todo', 'required');
        $this->form_validation->set_rules('level', 'level', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('todo/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Todo_model->ubahDataTodo();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('todo');
        }
    }
    
    public function hapus($id)
    {
        $this->Todo_model->hapusDataTodo($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('todo');
    }
}