<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MY_Controller {
	function __construct()
	{
		parent:: __construct();
		$this->load->model('Product_M', 'prod');
	}

	public function info(){
		if (($this->uri->segment(3)) <= 0) {
			show_404();
		} else {
			$prod_id = $this->uri->segment(3);
		}
		$product = $this->prod->get_product_by_id($prod_id);
		if ($product == false){
			show_404();
		} else {
			$retated_product = $this->prod->relatedProduct($product->cat_id, $product->brand_id);
			$data = array(
				'view' => $this->user_view('product_view'),
				'page_title' => 'Product Details',
				'product' => $product,
				'retated_product' => $retated_product
			);
			$this->load->view($this->user_view('template'), $data);
		}
	}
}
