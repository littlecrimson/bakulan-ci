<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        
    }

    public function index($page = null)
    {
        $role = $this->session->userdata('role');
        if($role !== 'admin'){
            redirect(base_url('/'));
            return;
        }

        $data['title']  = 'Manajemen Product';
        $data['content'] = $this->product->select(
            ['product.id', 'product.title AS product_title','product.image','product.price',
            'product.is_available', 'category.title AS category_title']
        )->join('category')->paginate($page)->all();
        $data['total_rows'] = $this->product->count();
        $data['pagination'] = $this->product->makePagination(base_url('product'),2,$data['total_rows']);
        $data['page'] = 'pages/product/index';
        $data['navbar'] = 1;

        $this->view($data);
    }

    public function create()
    {
        $role = $this->session->userdata('role');
        if($role !== 'admin'){
            redirect(base_url('/'));
            return;
        }

        if(!$_POST){
            $input =  (object) $this->product->getDefaultValues();
        }else{
            $input = (object) $this->input->post(null,true);
        }

        if(!empty($_FILES) && $_FILES['image']['name'] !== ''){
            $imageName = url_title($input->title, '-',true) . '-' . date('YmdHis');
            $upload = $this->product->uploadImage('image', $imageName);

            if($upload){
                $input->image = $upload['file_name'];
            }else{
                redirect(base_url('product/create'));
            }
        }

        if(!$this->product->validate()){
            $data['title'] = 'Tambah product';
            $data['input'] = $input;
            $data['form_action'] = base_url('product/create');
            $data['page'] = 'pages/product/form';
            $data['navbar'] = 1;

            $this->view($data);
            return;
        }

        if($this->product->create($input)){
            $this->session->set_flashdata('success', 'Data berhasil ditambahkan!');
        }else{
            $this->session->set_flashdata('error', 'Terjadi kesalahan. Data gagal ditambahkan!');
        }
        
        redirect(base_url('product'));
    }

    public function unique_slug(){
        $slug = $this->input->post('slug');
        $id = $this->input->post('id');
        $product = $this->product->where('slug',$slug)->single();

        if($product){
            if($id === $product->id){
                return true;
            }
            $this->load->library('form_validation');
            $this->form_validation->set_message('unique_slug','%s sudah digunakan');
            return false;
        }

        return true;
    }

    public function edit($id)
    {
        $role = $this->session->userdata('role');
        if($role !== 'admin'){
            redirect(base_url('/'));
            return;
        }

        $data['content'] = $this->product->where('id',$id)->single();
        if(!$data['content']){
            $this->session->set_flashdata('warning', 'Maaf, data tidak dapat ditemukan!');
            redirect(base_url('product'));
        }

        if(!$_POST){
            $data['input'] = $data['content'];
        }else{
            $data['input'] = (object) $this->input->post(null,true);
        }

        if(!empty($_FILES) && $_FILES['image']['name'] !== ''){
            $imageName = url_title($data['input']->title, '-',true) . '-' . date('YmdHis');
            $upload = $this->product->uploadImage('image', $imageName);

            if($upload){
                if($data['input']->image !== ''){
                    $this->product->uploadImage('image',$imageName);
                }
                $data['input']->image = $upload['file_name'];
            }else{
                redirect(base_url("product/edit/$id"));
            }
        }

        if(!$this->product->validate()){
            $data['title'] = 'Tambah product';
            $data['form_action'] = base_url("product/edit/$id");
            $data['page'] = 'pages/product/form';
            $data['navbar'] = 1;

            $this->view($data);
            return;
        }

        if($this->product->where('id',$id)->update($data['input'])){
            $this->session->set_flashdata('success', 'Data berhasil ditambahkan!');
        }else{
            $this->session->set_flashdata('error', 'Terjadi kesalahan. Data gagal ditambahkan!');
        }

        redirect(base_url('product'));
    }


    public function delete($id)
    {
        $role = $this->session->userdata('role');
        if($role !== 'admin'){
            redirect(base_url('/'));
            return;
        }

        if(!$_POST){
            redirect('product');
        }

        $product = $this->product->where('id',$id)->single();

        if(!$product){
            $this->session->set_flashdata('warning', 'Maaf, data tidak ditemukan!');
            redirect(base_url('product'));
        }

        if($this->product->where('id',$id)->delete()){
            $this->product->deleteImage($product->image);
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        }else{
            $this->session->set_flashdata('error', 'Terjadi kesalahan');
        }

        redirect(base_url('product'));
    }

    public function search($page = null)
    {
        $role = $this->session->userdata('role');
        if($role !== 'admin'){
            redirect(base_url('/'));
            return;
        }

        if(isset($_POST['keywords'])){
            $this->session->set_userdata('keywords',$this->input->post('keywords'));
        }else{
            redirect(base_url('product'));
            return;
        }

        $keyword = $this->session->userdata('keywords');
        $data['title']  = 'Pencarian: product';
        $data['content'] = $this->product->select(
            ['product.id', 'product.title AS product_title','product.image','product.price',
            'product.is_available', 'category.title AS category_title']
        )->join('category')->like('product.title',$keyword)->orlike('description',$keyword)->paginate($page)->all();
        $data['total_rows'] = $this->product->like('product.title',$keyword)->orlike('description',$keyword)->count();
        $data['pagination'] = $this->product->makePagination(base_url('product/search'), 3, $data['total_rows']);
        $data['page'] = 'pages/product/index';
        $data['navbar'] = 1;

        $this->view($data);
    }

    public function reset()
    {
        $this->session->unset_userdata('keyword');
        redirect(base_url('product'));
        return;
    }

    public function detail($slug)
    {
        $product = $this->product->where('slug',$slug)->single();
        $similiar = $this->product->select(
                    ['product.id', 'product.title AS product_title','product.image','product.price',
                    'product.is_available', 'product.slug', 'category.title AS category_title', 'category.slug AS category_slug']
                    )->join('category')->where('is_available',1)->all();
        if(!$product){
            $this->session->set_flashdata('warning', 'Maaf, produk tidak ditemukan!');
            redirect(base_url());
        }

        $data['content'] = $product;
        $data['similiar'] = $similiar;
        $data['title'] = $product->title;
        $data['page'] = 'pages/product/detail';
        $data['navbar'] = 1;

        $this->view($data);
        return;
    }

    public function kategori($slug)
    {
        $kategori = $this->product->select(
            ['product.id', 'product.title AS product_title','product.image','product.price',
            'product.is_available', 'product.slug as product_slug', 'category.title AS category_title', 'category.slug AS category_slug']
            )->join('category')->where('category.slug',$slug)->all();
        
        if(!$kategori){
            $this->session->set_flashdata('warning', 'Maaf, produk tidak ditemukan!');
            $data['title']      = ucwords(str_replace('-',' ', $slug));
            $data['content']    = '';
            $data['page']       = 'pages/product/category';
            $data['navbar']     = 1;
            $this->view($data);
            return;
        }

        $data['content']    = $kategori;
        $data['title']      = $kategori[0]->category_title;
        $data['page']       = 'pages/product/category';
        $data['navbar']     = 1;
        $data['total_rows'] = $this->product->where('product.is_available',1)->where('category.slug',$slug)->join('category')->count();
        $data['pagination'] = $this->product->makePagination(base_url('product/search'), 3, $data['total_rows']);

        $this->view($data);
        return;
    }

}

/* End of file Product.php */
