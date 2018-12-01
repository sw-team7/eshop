<?php
/**
 * Created by PhpStorm.
 * User: mehediPC
 * Date: 11/10/2018
 * Time: 11:06 PM
 */

class Comments extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('comment_model');
    $this->load->helper('form');
  }

  public function view()
  {
    $product_id = 2;
    $comments['comments'] = $this->comment_model->get_comments($product_id);
    $this->load->view('pages/comments', $comments);
  }

  public function save($product_id = 2)
  {
    $data = array(
      'username' => $this->input->post('username'),
      'comment' => $this->input->post('comment'),
      'product_id' => $product_id
    );
    $result =  $this->comment_model->insert('comments', $data);

    if ($result) {
      redirect('comments/view', 'refresh'); //It needs to be changed
    }
    else{
      show_404();
    }
  }
}