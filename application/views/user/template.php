<?php

$this->load->view('user/layout/header', $this->_ci_cached_vars); // pass $data vars
//$this->load->view('layout/header');
//$this->load->view('layout/leftsidebar');
$this->load->view($view);
$this->load->view(user_view('layout/footer'));