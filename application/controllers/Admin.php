<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $role = $this->session->userdata('role');
        if($role !== 'admin'){
            redirect(base_url('/'));
            return;
        }
    }

    public function index()
    {
        $data['title'] = 'Control Panel';
        $data['navbar'] = 1;
		$data['page'] = 'pages/admin/index';

		$this->view($data);
    }
    
    public function manage($page = NULL)
    {
        $data['title'] = 'Manajemen user';
        $data['page'] = 'pages/admin/manage/index';
        $data['navbar'] = 1;
        $data['content'] = $this->admin->paginate($page)->all();
        $data['total_rows'] = $this->admin->count();
        $data['paginate'] = $this->admin->makePagination(base_url('admin/manage'),3,$data['total_rows']);

        $this->view($data);
    }

    public function create()
    {
        if(!$_POST){
            $input =  (object) $this->admin->getDefaultValues();
        }else{
            $input = (object) $this->input->post(null,true);
            $this->load->library('form_validation');
            $this->form_validation->set_rules('password','Password','required|min_length[8]');
            $input->password = hashEncrypt($input->password);
        }

        if(!empty($_FILES) && $_FILES['image']['name'] !== ''){
            $imageName = url_title($input->name, '-',true) . '-' . date('YmdHis');
            $upload = $this->admin->uploadImage('image', $imageName);

            if($upload){
                $input->image = $upload['file_name'];
            }else{
                redirect(base_url('admin/manage/create'));
            }
        }

        if(!$this->admin->validate()){
            $data['title'] = 'Tambah user';
            $data['input'] = $input;
            $data['navbar'] = 1;
            $data['form_action'] = base_url('admin/create');
            $data['page'] = 'pages/admin/manage/create';

            $this->view($data);
            return;
        }

        if($this->admin->create($input)){
            $this->session->set_flashdata('success', 'Data berhasil ditambahkan!');
        }else{
            $this->session->set_flashdata('error', 'Terjadi kesalahan. Data gagal ditambahkan!');
        }
        
        redirect(base_url('admin/manage'));
    }

    public function unique_email(){
        $email = $this->input->post('email');
        $id = $this->input->post('id');
        $user = $this->admin->where('email',$email)->single();

        if($user){
            if($id === $user->id){
                return true;
            }
            $this->load->library('form_validation');
            $this->form_validation->set_message('unique_email','%s sudah digunakan');
            return false;
        }
        return true;
    }

    public function edit($id)
    {
        $data['content'] = $this->admin->where('id',$id)->single();
        if(!$data['content']){
            $this->session->set_flashdata('warning', 'Maaf, data tidak dapat ditemukan!');
            redirect(base_url('admin/manage'));
        }

        if(!$_POST){
            $data['input'] = $data['content'];
        }else{
            $data['input'] = (object) $this->input->post(null,true);
            if($data['input']->password !== ''){
                $data['input']->password = hashEncrypt($data['input']->password);
            }else{
                $data['input']->password = $data['content']->password;
            }
        }

        if(!empty($_FILES) && $_FILES['image']['name'] !== ''){
            $imageName = url_title($data['input']->name, '-',true) . '-' . date('YmdHis');
            $upload = $this->admin->uploadImage('image', $imageName);

            if($upload){
                if($data['input']->image !== ''){
                    $this->admin->uploadImage('image',$imageName);
                }
                $data['input']->image = $upload['file_name'];
            }else{
                redirect(base_url("admin/edit/$id"));
            }
        }

        if(!$this->admin->validate()){
            $data['title'] = 'Edit user';
            $data['form_action'] = base_url("admin/edit/$id");
            $data['navbar'] = 1;
            $data['page'] = 'pages/admin/manage/create';

            $this->view($data);
            return;
        }

        if($this->admin->where('id',$id)->update($data['input'])){
            $this->session->set_flashdata('success', 'Data berhasil ditambahkan!');
        }else{
            $this->session->set_flashdata('error', 'Terjadi kesalahan. Data gagal ditambahkan!');
        }

        redirect(base_url('admin/manage'));
    }

    public function search($page = null)
    {
        if(isset($_POST['keyword'])){
            $this->session->set_userdata('keyword',$this->input->post('keyword'));
        }else{
            redirect(base_url('admin/manage'));
        }

        $keyword = $this->session->userdata('keyword');
        $data['title']  = 'Pencarian user';
        $data['content'] = $this->admin->like('name',$keyword)->orLike('email',$keyword)->paginate($page)->all();
        $data['total_rows'] = $this->admin->like('name',$keyword)->orLike('email',$keyword)->count();
        $data['paginate'] = $this->admin->makePagination(base_url('admin/search'),3,$data['total_rows']);
        $data['page'] = 'pages/admin/manage/index';
        $data['navbar'] = 1;

        $this->view($data);
    }

    public function reset()
    {
        $this->session->unset_userdata('keyword');
        redirect(base_url('admin/manage'));
        return;
    }

    public function delete($id)
    {
        if(!$_POST){
            redirect('admin/manage');
        }

        $user = $this->admin->where('id',$id)->single();

        if(!$user){
            $this->session->set_flashdata('warning', 'Maaf, data tidak ditemukan!');
            redirect(base_url('admin/manage'));
        }

        if($this->admin->where('id',$id)->delete()){
            $this->admin->deleteImage($user->image);
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        }else{
            $this->session->set_flashdata('error', 'Terjadi kesalahan');
        }

        redirect(base_url('admin/manage'));
    }

}

/* End of file Admin.php */
