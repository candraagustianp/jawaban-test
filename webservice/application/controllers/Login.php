<?php
header("Access-Control-Allow-Origin: *");

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Login extends REST_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('UserModel','m');
	}

    function all_get(){
		$data = $this->m->get_all();
		$this->response($data);
	}
    
    function login_post() {
        $username = $this->input->post("username");
        $data = $this->m->find($username);
        if (count($data) == 0) {
            $this->response( [
                'status' => false,
                'message' => 'No users were found'
            ], 404 );
        } else {
            if ($data['password'] == $this->input->post("password")) {
                $this->response( [
                    'status' => false,
                    'message' => 'Selamat datang '.$username
                ], 200 );
            }
            else {
                $this->response( [
                    'status' => false,
                    'message' => 'Not authorize'
                ], 401 );
            }
        }

    }

}