<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Posts_m extends CI_Model
{
  protected $_table = 'posts';
  public function get_all()
  {
    $this->db->select('ID,post_title, post_name, post_date,post_type');
    $this->db->where('post_status','publish');
    $this->db->where('post_type','post');
    $this->db->order_by('post_date','desc');
    $query = $this->db->get($this->_table);
    return $query ->result_array();
  }
}
