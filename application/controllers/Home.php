<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller
{
	function __construct()
	{
		parent:: __construct();
		$this->load->model('Product_M', 'prod');
	}
	public function index()
	{
		$new_product = $this->prod->getNewProduct();
		$top_product = $this->prod->getFeaturedProduct();
		$data = array(
			'view' => $this->user_view('home_page_view'),
			'javascripts' => $this->user_view('home_page/javascripts'),
			'page_title' => 'Home Page',
			'new_product' => $new_product,
			'top_product' => $top_product
			);
		$this->load->view($this->user_view('template'), $data);
	}
}
