<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Store extends MY_Controller
{
	function __construct()
	{
		parent:: __construct();
		$this->load->model('Product_M', 'prod');
		$this->load->model('Category_M', 'cat');
		$this->load->model('Brand_M', 'brand');
	}

	public function index()
	{
		$new_product = $this->prod->getNewProduct();
		$top_product = $this->prod->getFeaturedProductByLimit(4);
		$all_category = $this->cat->getAllCategory();
		$all_brand = $this->brand->getAllBrand();
		$data = array(
			'view' => $this->user_view('store_page_view'),
			'javascripts' => $this->user_view('store_page/javascripts'),
			'page_title' => 'Store',
			'all_product' => $new_product,
			'top_product' => $top_product,
			'all_brand' => $all_brand,
			'all_category' => $all_category
		);
		$this->load->view($this->user_view('template'), $data);
	}
	public function filterSearch(){
		$action = $this->input->post('action');
		$category = $this->input->post('category');
		$brand = $this->input->post('brand');
		if (isset($action)) {
			$query = "SELECT * FROM tbl_product NATURAL JOIN tbl_category NATURAL JOIN tbl_brand WHERE product_name LIKE '%%'";
			if (isset($category)) {
				$category_filter = implode("','", $this->input->post('category'));
				$query .= "AND cat_id IN('".$category_filter."')";
			}
			if (isset($brand)) {
				$brand_filter = implode("','", $this->input->post('brand'));
				$query .= "AND brand_id IN('".$brand_filter."')";
			}
			$filter_product = $this->prod->getFilterProduct($query);
			$data = array(
				'filter_product' => $filter_product
			);
			if(count($filter_product) > 0){
				echo $this->load->view($this->user_view('store_page/filter_data'), $data, TRUE);
			}else{
				echo '<div class="col-md-4 col-xs-6"><div class="product bg-info text-danger"><h1>No Product Found</h1></div></div>';
			}
		}
	}
}
