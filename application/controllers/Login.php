<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $is_login = $this->session->userdata('is_login');

        if($is_login){
            redirect(base_url());
            return;
        }
    }

    public function index()
    {
        if(!$_POST){
            $input = (object) $this->login->getDefaultValues();
        }else{
            $input = (object) $this->input->post(null, true);
        }

        if(!$this->login->validate()){
            $data['title']	= 'Login';
            $data['input']	= $input;
            $data['navbar'] = 0;
			$data['page']	= 'pages/login/index';

			$this->view($data);
			return;
        }

        if($this->login->run($input)){
            $this->session->set_flashdata('success', 'Proses autentifikasi berhasil!');
            if($this->session->userdata['role'] !== 'admin'){
                redirect(base_url('/'));
            }else{
                redirect(base_url('admin'));
            }
        }else{
            $this->session->set_flashdata('error', 'Proses autentifikasi gagal :(');
            redirect(base_url('login'));
        }
    }

    

}

/* End of file Login.php */
