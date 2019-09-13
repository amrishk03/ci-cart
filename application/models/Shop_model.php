<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Shop_model extends CI_Model
{

	public function __construct()
	{ }

	public function get_all($order_by = "")
	{
		$this->db->from('products');
		if ($order_by == 'name_asc') {
			$this->db->order_by("name", "asc");
		} elseif ($order_by == 'name_desc') {
			$this->db->order_by("name", "desc");
		} elseif ($order_by == 'price_asc') {
			$this->db->order_by("price", "asc");
		} elseif ($order_by == 'price_desc') {
			$this->db->order_by("price", "desc");
		}
		$query = $this->db->get();

		return $query->result_array();
	}
}
