<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends MY_Controller {

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
        $data['title'] = 'Manajemen pembayaran';
        $data['page'] = 'pages/admin/manage/payment';
        $data['navbar'] = 1;
        $data['content'] = $this->payment->paginate($page)->all();
        $data['total_rows'] = $this->payment->count();
        $data['paginate'] = $this->payment->makePagination(base_url('admin/manage'),3,$data['total_rows']);

        $this->view($data);
    }

    public function create()
    {
        if(!$_POST){
            $input =  (object) $this->payment->getDefaultValues();
        }else{
            $input = (object) $this->input->post(null,true);
        }

        if(!$this->payment->validate()){
            $data['title'] = 'Manajemen pembayaran';
            $data['input'] = $input;
            $data['navbar'] = 1;
            $data['form_action'] = base_url('payment/create');
            $data['page'] = 'pages/admin/manage/payment_form';

            $this->view($data);
            return;
        }

        if($this->payment->create($input)){
            $this->session->set_flashdata('success', 'Data berhasil ditambahkan!');
        }else{
            $this->session->set_flashdata('error', 'Terjadi kesalahan. Data gagal ditambahkan!');
        }
        
        redirect(base_url('payment'));
    }

    public function edit($id)
    {
        $data['content'] = $this->payment->where('id',$id)->single();
        if(!$data['content']){
            $this->session->set_flashdata('warning', 'Maaf, data tidak dapat ditemukan!');
            redirect(base_url('admin/manage'));
        }

        if(!$_POST){
            $data['input'] = $data['content'];
        }else{
            $data['input'] = (object) $this->input->post(null,true);
        }

        if(!$this->payment->validate()){
            $data['title'] = 'Manajemen pembayaran';
            $data['form_action'] = base_url("payment/edit/$id");
            $data['navbar'] = 1;
            $data['page'] = 'pages/admin/manage/payment_form';

            $this->view($data);
            return;
        }

        if($this->payment->where('id',$id)->update($data['input'])){
            $this->session->set_flashdata('success', 'Data berhasil ditambahkan!');
        }else{
            $this->session->set_flashdata('error', 'Terjadi kesalahan. Data gagal ditambahkan!');
        }

        redirect(base_url('payment'));
    }

    public function search($page = null)
    {
        if(isset($_POST['keyword'])){
            $this->session->set_userdata('keyword',$this->input->post('keyword'));
        }else{
            redirect(base_url('payment'));
        }

        $keyword = $this->session->userdata('keyword');
        $data['title']  = 'Pencarian user';
        $data['content'] = $this->payment->like('name',$keyword)->orLike('norek',$keyword)->paginate($page)->all();
        $data['total_rows'] = $this->payment->like('name',$keyword)->orLike('norek',$keyword)->count();
        $data['paginate'] = $this->payment->makePagination(base_url('payment/search'),3,$data['total_rows']);
        $data['page'] = 'pages/admin/manage/payment';
        $data['navbar'] = 1;

        $this->view($data);
    }

    public function reset()
    {
        $this->session->unset_userdata('keyword');
        redirect(base_url('payment'));
        return;
    }

    public function delete($id)
    {
        if(!$_POST){
            redirect('payment');
            return;
        }

        $user = $this->payment->where('id',$id)->single();

        if(!$user){
            $this->session->set_flashdata('warning', 'Maaf, data tidak ditemukan!');
            redirect(base_url('payment'));
            return;
        }

        if($this->payment->where('id',$id)->delete()){
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        }else{
            $this->session->set_flashdata('error', 'Terjadi kesalahan');
        }

        redirect(base_url('payment'));
        return;
    }

}

/* End of file Payment.php */
