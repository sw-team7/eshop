<?php
/**
 * Created by PhpStorm.
 * User: mehediPC
 * Date: 11/10/2018
 * Time: 8:27 PM
 */

class Comment_Model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();

    //Do your magic here
    $this->load->database();
  }

  public function insert($table_name, $data)
  {
    return $this->db->insert($table_name, $data);
  }

  public function get_comments($product_id)
  {
    $sql = "SELECT c.username, c.comment, c.created_at
            FROM comments c
            JOIN products p ON c.product_id = p.id
            WHERE p.id = ?
            ORDER BY c.id ASC;";
    $query = $this->db->query($sql, array($product_id));
    return $query->result_array();
  }
}