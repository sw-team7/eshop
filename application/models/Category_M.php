<?php
/**
 * Created by PhpStorm.
 * User: Ferdous Anam
 * Date: 16-10-2018
 * Time: 12:20 PM
 */

class Category_M extends CI_Model
{
	public function getAllCategory(){
		$this->db->select("*");
		$this->db->from("tbl_category a");
		$this->db->order_by('cat_name', 'ASC');
		$result = $this->db->get()->result();
		return $result;
	}
}
