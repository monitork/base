<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Posts_m extends CI_Model
{
  protected $_table = 'posts';
  public function get_all($publish= '')
  {
    $this->db->select('ID,post_title, post_name, post_date,post_type,post_status');
    if($publish == 'publish'){
      $this->db->where('post_status','publish');
    }
    if($publish == 'draft'){
      $this->db->where('post_status','draft');
    }
    $this->db->where('post_type','post');
    $this->db->where('ping_status','open');
    $this->db->order_by('post_date','desc');
    $this->db->where('post_status !=','auto-draft');
    $this->db->where('post_status !=','inherit');
    $query = $this->db->get($this->_table);
    return $query ->result_array();
  }
}
