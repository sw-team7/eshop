<?php
/**
 * Created by PhpStorm.
 * User: Ferdous Anam
 * Date: 16-10-2018
 * Time: 12:20 PM
 */

class User_M extends CI_Model
{
	public function __construct(){
        parent::__construct();
    }
	public function addUserInfo(){
		$field = array(
			'ip_address' => $this->input->ip_address(),
			'sId' => session_id()
		);
		$this->db->insert('tbl_users_demo', $field);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
	public function existUser(){
		$query = $this->db->select('*')
			->from("tbl_users_demo")
			->where('ip_address', $this->input->ip_address())
			->where('sId', session_id())
			->get();
		if ($query->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
}
