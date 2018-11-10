<?php
/**
 * Created by PhpStorm.
 * User: Ferdous Anam
 * Date: 15-10-2018
 * Time: 11:33 PM
 */
function user_view($view){
	$user_view_path = "user/";
	return $user_view_path.$view;
}
function admin_view($view){
	$admin_view_path = "admin/";
	return $admin_view_path.$view;
}

function getIP(){
	return "GET IP";
}

?>
