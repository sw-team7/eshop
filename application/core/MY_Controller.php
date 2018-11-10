<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Ferdous Anam
 * Date: 15-10-2018
 * Time: 9:42 PM
 */

class MY_Controller extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_M', 'user');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('|is_unique[tbl_users_demo.sId]');
		//echo $this->form_validation->run();
		if ($this->user->existUser() == FALSE){
			$user = $this->user->addUserInfo();
        }
        else{
        	//echo "Already Exist";
        }
	}
	public function index(){

	}
	public function user_view($view){
		$user_view_path = "user/";
		return $user_view_path.$view;
	}
	public function admin_view($view){
		$admin_view_path = "admin/";
		return $admin_view_path.$view;
	}

}
