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
			$ratings_count =  $this->prod->getRatingsCount($prod_id);
			$total_ratings = $this->prod->getTotalRatings($prod_id);
			foreach ($total_ratings as $row){
				if($row->rating <= 0){
					$avg_ratings = 0;
				} else {
					$avg_ratings = ($row->rating / $ratings_count);
				}
			}
			$product_rating = $avg_ratings;
			$data = array(
				'view' => $this->user_view('product_view'),
				'page_title' => 'Product Details',
				'product' => $product,
				'product_rating' => $product_rating,
				'ratings_count' => $ratings_count,
				'retated_product' => $retated_product
			);
			$this->load->view($this->user_view('template'), $data);
		}
	}
}
