<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends MY_Controller {

    private $id;

    public function __construct()
    {
        parent::__construct();

        $is_login = $this->session->userdata('is_login');
        $this->id = $this->session->userdata('id');
        if(!$is_login){
            redirect(base_url('/'));
            return;
        }
    }

    public function index($input = null)
    {
        $this->checkout->table  = 'cart';
        $data['cart']       = $this->checkout->select(
            ['cart.id','cart.qty','cart.subtotal','product.id AS product_id','product.title','product.price']
        )->join('product')->where('cart.id_user', $this->id)->all();

        if(! $data['cart']){
            $this->session->set_flashdata('warning', 'Tidak ada data di dalam keranjang');
            redirect(base_url('/')); 
        }

        $data['input']      = ($input) ? $input : (object) $this->checkout->getDefaultValues();
        $data['title']      = 'Checkout';
        $data['page']       = 'pages/checkout/index';
        $data['navbar']     = 1;
    
        return $this->view($data);
    }


    public function create()
    {
        if(!$_POST){
            redirect(base_url('checkout'));
            return;
        }else{
            $input = (object) $this->input->post(null, true);
        }

        if(!$this->checkout->validate()){
            return $this->index($input);
        }

        $total = $this->db->select_sum('subtotal')->where('id_user',$this->id)->get('cart')->row()->subtotal;

        $data = [
            'id_user'       => $this->id,
            'date'          => date('Y-m-d'),
            'invoice'       => 'BKL' . $this->id . date('ymdHis'),
            'total'         => $total,
            'name'          => $input->name,
            'alamat'        => $input->alamat,
            'phone'         => $input->phone,
            'status'        => 'waiting'
        ];

        if($order = $this->checkout->create($data)){
            $cart = $this->db->where('id_user', $this->id)->get('cart')->result_array();
            foreach ( $cart as $row){
                $row['id_orders']   = $order;
                unset($row['id'], $row['id_user']);
                $this->db->insert('orders_detail', $row);
            }

            $this->db->delete('cart', ['id_user' => $this->id]);

            $this->session->set_flashdata('success', 'Data berhasil disimpan!');
            
            $data['title']      = 'Checkout Berhasil';
            $data['page']       = 'pages/checkout/success';
            $data['navbar']     = 1;
            $data['content']    = (object) $data;
            
            $bank = $this->db->select(['name','norek','bank'])->get('payment')->result_array();
            $data['bank']       = $bank;

            $this->view($data);
        }else{
            $this->session->set_flashdata('error', 'Oppss.. terjadi kesalahan!');
            return $this->index($input);
            
        }
    }

}

/* End of file Checkout.php */
