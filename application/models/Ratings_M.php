<?php
/**
 * Created by PhpStorm.
 * User: Ferdous Anam
 * Date: 10-11-2018
 * Time: 3:41 PM
 */

class Ratings_M extends CI_Model
{
	public function addRatings($user_id){
		$field = array(
			'product_id'=>$this->input->post('product_id'),
			'rating'=> $this->input->post('rating'),
			'user_id'=> $user_id
		);
		$this->db->insert('tbl_rating', $field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
}
