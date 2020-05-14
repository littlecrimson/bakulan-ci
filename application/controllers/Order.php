<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends MY_Controller {

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
        $data['title']  = 'Manajemen Pesanan';
        $data['content'] = $this->order->orderBy('date','DESC')->paginate($page)->all();
        $data['total_rows'] = $this->order->count();
        $data['pagination'] = $this->order->makePagination(base_url('order'), 2, $data['total_rows']);
        $data['page'] = 'pages/order/index';
        $data['navbar'] = 1;

        $this->view($data);
    }

    public function search($page = NULL)
    {
        if(isset($_POST['keywords'])){
            $this->session->set_userdata('keywords',$this->input->post('keywords'));
        }else{
            redirect(base_url('order'));
        }

        $keyword = $this->session->userdata('keywords');
        $data['title']  = 'Pencarian Pesanan';
        $data['content'] = $this->order->like('invoice',$keyword)->orderBy('date','DESC')->paginate($page)->all();
        $data['total_rows'] = $this->order->like('invoice',$keyword)->count();
        $data['pagination'] = $this->order->makePagination(base_url('order/search/'), 3, $data['total_rows']);
        $data['page'] = 'pages/order/index';
        $data['navbar'] = 1;

        $this->view($data);
    }

    public function reset()
    {
        $this->session->unset_userdata('keywords');
        redirect(base_url('order'));
        return;
    }


    public function detail($id)
    {
        $data['order']	= $this->order->where('id', $id)->single();
		if (!$data['order']) {
			$this->session->set_flashdata('warning', 'Data tidak ditemukan.');
			redirect(base_url('/myorder'));
		}

        $this->order->table	= 'orders_detail';
		$data['order_detail']	= $this->order->select([
				'orders_detail.id_orders', 'orders_detail.id_product', 'orders_detail.qty',
				'orders_detail.subtotal', 'product.title', 'product.price'
			])
			->join('product')
			->where('orders_detail.id_orders', $id)
			->all();

		if ($data['order']->status !== 'waiting') {
			$this->order->table = 'orders_confirm';
			$data['order_confirm']	= $this->order->where('id_order', $id)->single();
        }
        
        $data['title']      = 'Detail pesanan';
        $data['page']       = 'pages/order/detail';
        $data['navbar']     = 1;

        $this->view($data);
    }

    public function update($id)
    {
        if(!$_POST){
            $this->session->set_flashdata('error', 'Oops...Terjadi kesalahan!');
            redirect(base_url("order/detail/$id"));
        }

        if($this->order->where('id',$id)->update(['status' => $this->input->post('status')])){
            $this->session->set_flashdata('success', 'Data berhasil diupdate!');
        }else{
            $this->session->set_flashdata('error', 'Oops...Terjadi kesalahan!');
        }

        redirect(base_url("order/detail/$id"));
    }

}

/* End of file Order.php */
