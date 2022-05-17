<?php 
use GuzzleHttp\Client;

class Todo_model extends CI_model {

    public function getAllTodo() {
        $client = new Client();
        try {
            $token = $this->session->userdata("token");
            
            $response = $client->request('GET','localhost:5000/api/todos/',
       [
                    'headers' => [
                        'Authorization' => "Bearer $token"
                    ]
                ]
            );
            
            $result = json_decode($response->getBody(), true);
            $result = $result['data'];
            return $result;
        } catch (RuntimeException $e) {
            $this->session->set_flashdata(
                'message', 
                '<div class="alert alert-danger d-flex align-items-center" role="alert">
                    <div>
                    Otentikasi <strong>gagal</strong>
                    </div>
                </div>'
            );
            redirect('todo');
        }
    }

    public function cariDataTodo() {
        $client = new Client();
        try {
            $token = $this->session->userdata("token");
            $response = $client->request('GET','localhost:5000/api/todos/' . $this->input->post('cariTodo', true),[
                    'headers' => [
                        'Authorization' => "Bearer $token"
                    ]
                ]
            );
            
            $result = json_decode($response->getBody(), true);
            $result = $result['data'];; 
            return $result;
        } catch (RuntimeException $e) {
            $this->session->set_flashdata(
                'message', 
                '<div class="alert alert-danger d-flex align-items-center" role="alert">
                    <div>
                    gagat mendapatkan data
                    </div>
                </div>'
            );
            redirect('todo');
        }
    }

    public function getTodoById($id) {
        $client = new Client();
        try {
            $token = $this->session->userdata("token");
            $response = $client->request('GET','localhost:5000/api/todo/' . $id,
       [
                    'headers' => [
                        'Authorization' => "Bearer $token"
                    ]
                ]
            );
            
            $result = json_decode($response->getBody(), true);
            $result = $result['data'];; 
            return $result;
        } catch (RuntimeException $e) {
            $this->session->set_flashdata(
                'message', 
                '<div class="alert alert-danger d-flex align-items-center" role="alert">
                    <div>
                    gagat mendapatkan data
                    </div>
                </div>'
            );
            redirect('todo');
        }
    }
    
    public function ubahDataTodo() {
        $client = new Client();
        try {
            $token = $this->session->userdata("token");
            $response = $client->request('PUT','localhost:5000/api/todo/' . $this->input->post("id"),
       [
                'json' => [
                        'todo' => $this->input->post("todo", true),
                        'level' => $this->input->post("level", true)
                ],
                'headers' => [
                    'Authorization' => "Bearer $token"
                ]
                ]
            );
            
            // $result = json_decode($response->getBody());

            $this->session->set_flashdata(
                'message', 
                '<div class="alert alert-success d-flex align-items-center" role="alert">
                    <div>
                    Todo <strong>berhasil</strong> diubah
                    </div>
                </div>'
            );
            
            redirect('todo');

        } catch (RuntimeException $e) {

            $this->session->set_flashdata(
                'message', 
                '<div class="alert alert-danger d-flex align-items-center" role="alert">
                    <div>
                    Todo <strong>gagal</strong> diubah
                    </div>
                </div>'
            );
            redirect('todo');
        }
    }
    
    public function hapusDataTodo($id) {
        $client = new Client();
        try {
            $token = $this->session->userdata("token");
            $response = $client->request('DELETE','localhost:5000/api/todo/' . $id,
       [
                'query' => [
                    'id' => $id
                ],
                'headers' => [
                    'Authorization' => "Bearer $token"
                ]
                ]
            );
            
            // $result = json_decode($response->getBody());

            $this->session->set_flashdata(
                'message', 
                '<div class="alert alert-success d-flex align-items-center" role="alert">
                    <div>
                    Todo <strong>berhasil</strong> dihapus
                    </div>
                </div>'
            );
            redirect('todo');

        } catch (RuntimeException $e) {

            $this->session->set_flashdata(
                'message', 
                '<div class="alert alert-danger d-flex align-items-center" role="alert">
                    <div>
                    Todo <strong>gagal</strong> dihapus
                    </div>
                </div>'
            );
            redirect('todo');
        }   
    }
}