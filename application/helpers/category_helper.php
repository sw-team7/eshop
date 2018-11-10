<?php
function getAllCategories(){
	$CI = get_instance();
	$CI->load->model('Category_M', 'cat');
	$categories = $CI->cat->getAllCategory();
	return $categories;
}
