<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Cart extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
        if (!$this->session->userdata('id')) {
            redirect('login');
        }
		$this->load->model('Cart_model');
	}

	public function index()
	{
		$cust_id = $this->session->userdata('id');
        $this->load->model('Billing_model');
		$this->data['userdata'] = $this->Billing_model->get_customer_details($cust_id);

		$this->data['title'] = 'Shopping Carts';

		if (!$this->cart->contents()) {
			$this->data['message'] = '<p>Your cart is empty!</p>';
		} else {
			$this->data['message'] = $this->session->flashdata('message');
		}

		$this->load->view('cart', $this->data);
	}

	public function add()
	{

		$insert_room = array(
			'id' => $this->input->post('id'),
			'name' => $this->input->post('name'),
			'price' => $this->input->post('price'),
			'qty' => 1
		);
		//print_r($this->cart);exit;
		$this->cart->insert($insert_room);

		redirect('cart');
	}

	function remove($rowid)
	{
		if ($rowid == "all") {
			$this->cart->destroy();
		} else {
			$data = array(
				'rowid'   => $rowid,
				'qty'     => 0
			);

			$this->cart->update($data);
		}

		redirect('cart');
	}

	function update_cart()
	{
		foreach ($_POST['cart'] as $id => $cart) {
			$price = $cart['price'];
			$amount = $price * $cart['qty'];

			$this->Cart_model->update_cart($cart['rowid'], $cart['qty'], $price, $amount);
		}

		redirect('cart');
	}
}
