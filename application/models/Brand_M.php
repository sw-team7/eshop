<?php
/**
 * Created by PhpStorm.
 * User: Ferdous Anam
 * Date: 16-10-2018
 * Time: 12:20 PM
 */

class Brand_M extends CI_Model
{
	public function getAllBrand(){
		$this->db->select("*");
		$this->db->from("tbl_brand a");
		$this->db->order_by('brand_name', 'ASC');
		$result = $this->db->get()->result();
		return $result;
	}
}
