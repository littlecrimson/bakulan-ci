<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends MY_Controller {

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

    public function index()
    {
        $data['title'] = 'Keranjang belanja';
        $data['page'] = 'pages/cart/index';
        $data['navbar'] = 1;
        $data['content'] = $this->cart->select(
            ['cart.id','cart.qty','cart.subtotal','product.id AS product_id','product.title','product.price']
        )->join('product')->where('cart.id_user', $this->id)->all();
        
        $this->view($data);
    }


    public function add()
    {
        if(!$_POST || $this->input->post('qty') < 1){
            $this->session->set_flashdata('error', 'Kuantitas produk tidak boleh kosong');
            redirect(base_url());
        }else{
            $input              = (object) $this->input->post(null, true);
            $this->cart->table  = 'product';
            $product            = $this->cart->where('id', $input->id)->single();

            $subtotal           = $product->price * $input->qty;

            $this->cart->table  = 'cart';
            $cart               = $this->cart->where('id_user', $this->id)->where('id_product', $input->id)->single();

            if($cart){
                $data = [
                    'qty'       => $cart->qty + $input->qty,
                    'subtotal'  => $cart->subtotal + $subtotal
                ];

                if ($this->cart->where('id', $cart->id)->update($data)) {
					$this->session->set_flashdata('success', 'Produk berhasil ditambahkan!');
				} else {
					$this->session->set_flashdata('error', 'Oops! Terjadi kesalahan.');
				}

				redirect(base_url(''));
			}

			$data = [
				'id_user'		=> $this->id,
				'id_product'	=> $input->id,
				'qty' 			=> $input->qty,
				'subtotal'		=> $subtotal
			];

			if ($this->cart->create($data)) {
				$this->session->set_flashdata('success', 'Produk berhasil ditambahkan!');
			} else {
				$this->session->set_flashdata('error', 'Oops! Terjadi kesalahan.');
			}

			redirect(base_url(''));
            return;
        }
    }

    public function update($id)
    {
        if(!$_POST || $this->input->post('qty') < 1){
            $this->session->set_flashdata('error', 'Kuantitas produk tidak boleh kosong');
            redirect(base_url('cart'));
        }

        $data['content'] = $this->cart->where('id',$id)->single();

        if(!$data['content']) {
            $this->session->set_flashdata('warning', 'Data tidak dapat ditemukan!');
            redirect(base_url('cart'));
            return;
        }

        $data['input'] = (object) $this->input->post(null, true);
        $this->cart->table  = 'product';
        $product            = $this->cart->where('id', $data['content']->id_product)->single();

        $subtotal           = $data['input']->qty * $product->price;
        $cart               = [
            'qty'           => $data['input']->qty,
            'subtotal'      => $subtotal
        ];

        $this->cart->table = 'cart';

        if ($this->cart->where('id', $id)->update($cart)) {
            $this->session->set_flashdata('success', 'Produk berhasil ditambahkan!');
        } else {
            $this->session->set_flashdata('error', 'Oops! Terjadi kesalahan.');
        }

        redirect(base_url('cart'));
    }

    public function delete($id)
    {
        if(!$_POST){
            redirect(base_url('cart'));
        }

        if(!$this->cart->where('id',$id)->single()){
            $this->session->set_flashdata('warning', 'Maaf, data tidak ditemukan!');
            redirect(base_url('cart'));
        }

        if($this->cart->where('id',$id)->delete()){
            $this->session->set_flashdata('success', 'Data berhasil dihapus!');
        }else{
            $this->session->set_flashdata('error', 'Maaf,data gagal dihapus!');
        }

        redirect(base_url('cart'));
    }

    public function buynow()
    {
        if(!$_POST || $this->input->post('qty') < 1){
            $this->session->set_flashdata('error', 'Kuantitas produk tidak boleh kosong');
            redirect(base_url());
        }else{
            $input              = (object) $this->input->post(null, true);
            $this->cart->table  = 'product';
            $product            = $this->cart->where('id', $input->id)->single();

            $subtotal           = $product->price * $input->qty;

            $this->cart->table  = 'cart';
            $cart               = $this->cart->where('id_user', $this->id)->where('id_product', $input->id)->single();

            if($cart){
                $data = [
                    'qty'       => $cart->qty + $input->qty,
                    'subtotal'  => $cart->subtotal + $subtotal
                ];

                if ($this->cart->where('id', $cart->id)->update($data)) {
					$this->session->set_flashdata('success', 'Produk berhasil ditambahkan!');
				} else {
					$this->session->set_flashdata('error', 'Oops! Terjadi kesalahan.');
				}

				redirect(base_url(''));
			}

			$data = [
				'id_user'		=> $this->id,
				'id_product'	=> $input->id,
				'qty' 			=> $input->qty,
				'subtotal'		=> $subtotal
			];

			if ($this->cart->create($data)) {
				$this->session->set_flashdata('success', 'Produk berhasil ditambahkan!');
			} else {
				$this->session->set_flashdata('error', 'Oops! Terjadi kesalahan.');
			}

			redirect(base_url(''));
            return;
        }
    }
}

/* End of file Cart.php */
