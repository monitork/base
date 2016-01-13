<?php defined('BASEPATH') OR exit('No direct script access allowed');
class product_f extends CI_Model
{
  protected $_table = 'posts';
  public function get_all_content($ttid){
    $this->db->select('p.ID,p.post_title, p.post_name, p.post_date,p.post_type,p.post_status');
    $this->db->from($this->_table .' as p');
    $this->db->where('p.post_status','publish');
    $this->db->order_by('p.post_date','desc');
    $this->db->where('p.post_status !=','auto-draft');
    $this->db->where('p.post_status !=','inherit');
    $this->db->where('p.post_type','product');
    $this->db->where('tt.term_taxonomy_id',$ttid);
    $this->db->join('term_relationships as tt', 'tt.object_id = p.ID','left');
    $result = $this->db->get()->result_array();
    return $result;
  }
  public function get_post_meta($pid, $key)
  {
    $this->db->where('meta_key',$key);
    $this->db->where('post_id',$pid);
    $meta = $this->db->get('postmeta') -> row();
    if($meta){
      return $meta->meta_value;
    }else {
      return '';
    }
  }
}
