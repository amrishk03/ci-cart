<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Billing_model extends CI_Model
{

	public function __construct()
	{
		//$this->load->database();
	}

	public function insert_order($data)
	{
		$this->db->insert('orders', $data);

		$id = $this->db->insert_id();

		return (isset($id)) ? $id : FALSE;
	}

	public function insert_order_detail($data)
	{
		$this->db->insert('order_detail', $data);
	}

	public function get_customer_details($id)
	{
		$this->db->select('name, email');
		$this->db->where('id', $id);
		$query = $this->db->get('codeigniter_register');
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return 'No User Registered';
		}
	}
}
