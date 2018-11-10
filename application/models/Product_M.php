<?php
/**
 * Created by PhpStorm.
 * User: Ferdous Anam
 * Date: 15-10-2018
 * Time: 11:56 PM
 */

class Product_M extends CI_Model
{
	public function getNewProduct()
	{
		$this->db->select("*");
		$this->db->from("tbl_product a");
		$this->db->join('tbl_category b', 'a.cat_id = b.cat_id');
		$this->db->order_by('product_id', 'DESC');
		$result = $this->db->get()->result();
		return $result;
	}
	public function getFeaturedProduct()
	{
		$this->db->select("*");
		$this->db->from("tbl_product a");
		$this->db->join('tbl_category b', 'a.cat_id = b.cat_id');
		$this->db->where('type', '0');
		$this->db->order_by('product_id', 'DESC');
		$result = $this->db->get()->result();
		return $result;
	}
	public function getFeaturedProductByLimit($limit)
	{
		$this->db->select("*");
		$this->db->from("tbl_product a");
		$this->db->join('tbl_category b', 'a.cat_id = b.cat_id');
		$this->db->where('type', '0');
		$this->db->order_by('product_id', 'DESC');
		$this->db->limit($limit);
		$result = $this->db->get()->result();
		return $result;
	}
	public function get_product_by_id($prod_id)
	{
		$query = $this->db->select('*')
			->from("tbl_product a")
			->join('tbl_category b', 'a.cat_id = b.cat_id')
			->where('product_id', $prod_id)
			->get();
		if ($query->num_rows() > 0) {
			return $query->row();
		} else {
			return false;
		}
	}
	public function relatedProduct($cat_id, $brand_id)
	{
		$query = $this->db->select('*')
			->from("tbl_product a")
			->join('tbl_category b', 'a.cat_id = b.cat_id')
			->join('tbl_brand c', 'a.brand_id = c.brand_id')
			->where('a.cat_id', $cat_id)
			->where('a.brand_id', $brand_id)
			->get();
		$result = $query->result();
		return $result;
	}
	public function getProductPrice($prod_id){
		$product = $this->get_product_by_id($prod_id);
		return $product->price;
	}

	public function getFilterProduct($sql){
		$query = $this->db->query($sql);
		$result = $query->result();
		return $result;
	}
}
