<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Cart_model extends CI_Model
{

	public function __construct()
	{ }

	function update_cart($rowid, $qty, $price, $amount)
	{
		$data = array(
			'rowid'   => $rowid,
			'qty'     => $qty,
			'price'   => $price,
			'amount'   => $amount
		);

		$this->cart->update($data);
		//echo $this->db->last_query();
	}
}
