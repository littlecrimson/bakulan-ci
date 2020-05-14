<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Promo extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $role = $this->session->userdata('role');
        if($role !== 'admin'){
            redirect(base_url('/'));
            return;
        }
    }

    public function index($page = NULL)
    {
        $data['title'] = 'Promo settings';
        $data['navbar'] = 1;
        $data['page'] = 'pages/promo/index';
        $data['content'] = $this->promo->paginate($page)->all();
        $data['total_rows'] = $this->promo->count();
        $data['paginate'] = $this->promo->makePagination(base_url('promo'),2,$data['total_rows']);

		$this->view($data);
    }

    public function create()
    {
        if(!$_POST){
            $input =  (object) $this->promo->getDefaultValues();
        }else{
            $input = (object) $this->input->post(null,true);
        }

        if(!empty($_FILES) && $_FILES['image']['name'] !== ''){
            $imageName = url_title('promo', '-',true) . '-' . date('YmdHis');
            $upload = $this->promo->uploadImage('image', $imageName);
            if($upload){
                $input->image = $upload['file_name'];
            }else{
                redirect(base_url('promo'));
            }
        }

        if(!$this->promo->validate()){
            $data['title'] = 'Tambah banner promo';
            $data['input'] = $input;
            $data['navbar'] = 1;
            $data['form_action'] = base_url('promo/create');
            $data['page'] = 'pages/promo/create';

            $this->view($data);
            return;
        }

        if($this->promo->create($input)){
            $this->session->set_flashdata('success', 'Data berhasil ditambahkan!');
        }else{
            $this->session->set_flashdata('error', 'Terjadi kesalahan. Data gagal ditambahkan!');
        }

        redirect(base_url('promo'));
        
    }

    public function edit($id)
    {
        $data['content'] = $this->promo->where('id',$id)->single();
        if(!$data['content']){
            $this->session->set_flashdata('warning', 'Maaf, data tidak dapat ditemukan!');
            redirect(base_url('promo'));
        }

        if(!$_POST){
            $data['input'] = $data['content'];
        }else{
            $data['input'] = (object) $this->input->post(null,true);
        }

        if(!empty($_FILES) && $_FILES['image']['name'] !== ''){
            $imageName = url_title('promo', '-',true) . '-' . date('YmdHis');
            $upload = $this->promo->uploadImage('image', $imageName);

            if($upload){
                if($data['input']->image !== ''){
                    $this->promo->uploadImage('image',$imageName);
                }
                $data['input']->image = $upload['file_name'];
            }else{
                redirect(base_url("promo/edit/$id"));
            }
        }

        if(!$this->promo->validate()){
            $data['title']       = 'Edit banner';
            $data['form_action'] = base_url("promo/edit/$id");
            $data['navbar']      = 1;
            $data['page']        = 'pages/promo/create';

            $this->view($data);
            return;
        }

        if($this->promo->where('id',$id)->update($data['input'])){
            $this->session->set_flashdata('success', 'Data berhasil ditambahkan!');
        }else{
            $this->session->set_flashdata('error', 'Terjadi kesalahan. Data gagal ditambahkan!');
        }

        redirect(base_url('promo'));
    }

    public function delete($id)
    {
        if(!$_POST){
            redirect(base_url('promo'));
        }

        $user = $this->promo->where('id',$id)->single();

        if(!$user){
            $this->session->set_flashdata('warning', 'Maaf, data tidak ditemukan!');
            redirect(base_url('promo'));
        }

        if($this->promo->where('id',$id)->delete()){
            unlink("./images/promo/$user->image");
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        }else{
            $this->session->set_flashdata('error', 'Terjadi kesalahan');
        }

        redirect(base_url('promo'));
    }

}

/* End of file Promo.php */
