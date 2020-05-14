<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

    public function index($page = NULL)
    {
        $data['title'] = 'Homepage';
        $data['navbar'] = 1;
        $data['content'] = $this->home->select(
            ['product.id', 'product.title AS product_title','product.image','product.price','product.description','product.slug',
            'product.is_available', 'category.title AS category_title']
        )->join('category')->where('is_available',1)->paginate($page)->all();
        $data['total_rows'] = $this->home->where('is_available',1)->count();
        $data['pagination'] = $this->home->makePagination(base_url('home'),2,$data['total_rows']);
        $data['page'] = 'pages/home/index';
        

        $data['category'] = getCategories();
        $data['banner_promo'] = $this->db->get('promo')->result();

		$this->view($data);
    }

    public function search($page = null)
    {
        if(isset($_GET['produk'])){
            $this->session->set_userdata('produk',$this->input->get('produk'));
        }else{
            redirect(base_url());
            return;
        }

        $keyword = $this->session->userdata('produk');

        $data['title']  = $keyword;
        $data['content']= $this->home->select(
            ['product.id', 'product.title AS product_title','product.image','product.price','product.slug',
            'product.is_available', 'category.title AS category_title']
        )->join('category')->where('is_available',1)->like('product.title',$keyword)->orLike('category.title',$keyword)->paginate($page)->all();
        $data['total_rows'] = $this->home->like('product.title',$keyword)->orLike('category.title',$keyword)->join('category')->count();
        $data['pagination'] = $this->home->makePagination(base_url('home/search'),3,$data['total_rows']);
        $data['page']   = 'pages/home/search';
        $data['navbar'] = 1;

        $this->view($data);
    }

}

/* End of file Home.php */
