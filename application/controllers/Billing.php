<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Billing extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('id')) {
			redirect('login');
		}
		$this->load->model('Billing_model');
	}

	public function index()
	{
		$this->data['title'] = 'Billing';
		$cust_id = $this->session->userdata('id');
		$this->data['userdata'] = $this->Billing_model->get_customer_details($cust_id);
		$this->load->view('billing', $this->data);
	}

	public function save_order()
	{

		$cust_id = $this->session->userdata('id');

		$order = array(
			'date' 			=> date('Y-m-d'),
			'customerid' 	=> $cust_id
		);

		$ord_id = $this->Billing_model->insert_order($order);

		if ($cart = $this->cart->contents()) :
			foreach ($cart as $item) :
				$order_detail = array(
					'orderid' 		=> $ord_id,
					'productid' 	=> $item['id'],
					'quantity' 		=> $item['qty'],
					'price' 		=> $item['price']
				);

				$cust_id = $this->Billing_model->insert_order_detail($order_detail);
			endforeach;
		endif;
		$this->cart->destroy();
		$this->data['title'] = 'Billing';
		$cust_id = $this->session->userdata('id');
		$this->data['userdata'] = $this->Billing_model->get_customer_details($cust_id);
		$this->load->view('order_success', $this->data);
		
	}
}
