<?php
function updateCart($data){
	$CI = get_instance();
	$CI->load->model('Cart_M', 'cart');
	$res = $CI->cart->updateCart($data);
	if ($res == true){
		$CI->session->set_flashdata('cart-update', 'Cart Updated Successfully');
	}else {
		$CI->session->set_flashdata('cart-update', 'Cart Not Updated');
	}
	redirect('cart', 'refresh');
}
