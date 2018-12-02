<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends MY_Controller
{
	function __construct()
	{
		parent:: __construct();
		$this->load->model('Cart_M', 'cart');
	}
	public function index()
	{
		$cart = $this->cart->getCart();
		$data = array(
			'view' => $this->user_view('cart_page/cart_view'),
			'javascripts' => $this->user_view('cart_page/javascripts'),
			'page_title' => 'Home Page',
			'cart' => $cart
		);
		$this->load->view($this->user_view('template'), $data);
	}
	public function addToCart(){
		$msg['success'] = false;
		$msg['type'] = 'add';
		$check = $this->checkUnique($this->input->post('id'));
		if($check){
			$msg['checkCart']= 'Product Already In Cart Update Quantity';
		} else {
			$result = $this->cart->addCart();
			if($result){
				$msg['success'] = true;
				$msg['checkCart']= 'Product Added to Cart';
			}
		}
		echo json_encode($msg);
	}
	public function checkUnique($prod_id){
		$result = $this->cart->uniqueCart($prod_id , session_id());
		return $result;
	}

	public function updateCart($data){
		$result = $this->cart->updateCart($data);
		$msg['success'] = false;
		$msg['type'] = 'update';
		if($result){
			$msg['success'] = true;
		}
		return $msg['success'];
	}

	public function delete(){
		$result = $this->cart->deleteProduct();
		$msg['success'] = false;
		$this->session->set_flashdata('cart-delete', 'Product Not Deleted from cart');
		if($result){
			$msg['success'] = true;
			$this->session->set_flashdata('cart-delete', 'Product Deleted from cart');
		}
		redirect('cart', 'refresh');
	}

	public function getcart(){
		$cart = $this->cart->getCart();
		$data = array(
			'cart' => $cart
		);
		$this->load->view('user/cart_page/ajax_cart', $data);
	}

	public function upCart(){
		$result = $this->cart->ajaxCart();
		$msg['success'] = false;
		$msg['type'] = 'update';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}


}
