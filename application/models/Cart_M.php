<?php
/**
 * Created by PhpStorm.
 * User: Ferdous Anam
 * Date: 16-10-2018
 * Time: 9:15 AM
 */

class Cart_M extends CI_Model
{
	public function getCart()
	{
		$this->db->select("*");
		$this->db->from("tbl_cart a");
		$this->db->join('tbl_product b', 'a.product_id = b.product_id');
		$this->db->where('a.sId', session_id());
		$this->db->order_by('cart_id', 'DESC');
		$result = $this->db->get()->result();
		return $result;
	}

	public function checkCartTable()
	{
		$this->db->select("*");
		$this->db->from("tbl_cart a");
		$this->db->join('tbl_product b', 'a.product_id = b.product_id');
		$this->db->order_by('cart_id', 'DESC');
		$result = $this->db->get()->result();
		return $result;
	}

	public function uniqueCart($prod_id, $sId){
		$query = $this->db->select('*')
			->from("tbl_cart")
			->where('product_id', $prod_id)
			->where('sId', $sId)
			->get();
		if ($query->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function addCart()
	{
		$this->load->model('Product_M', 'prod');
		$field = array(
			'sId' => session_id(),
			'product_id' => $this->input->post('id'),
			'price' => $this->prod->getProductPrice($this->input->post('id')),
			'quantity' => 1
		);
		$this->db->insert('tbl_cart', $field);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
	function deleteProduct(){
		$id = $this->input->get('id');
		$this->db->where('cart_id', $id);
		$this->db->delete('tbl_cart');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

}
