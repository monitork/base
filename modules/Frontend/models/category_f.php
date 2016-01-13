<?php defined('BASEPATH') OR exit('No direct script access allowed');
class category_f extends CI_Model
{
  protected $_table = 'terms';
  public function get_term_w_slug($slug)
  {
    $this->db->select('t.name,t.slug,tt.description,tt.parent,tt.term_taxonomy_id');
    $this->db->from($this->_table .' as t');
    $this->db->where('t.slug',$slug);
    $this->db->join('term_taxonomy as tt', 'tt.term_id = t.term_id','left');
    $result = $this->db->get()->row();
    return $result;
  }
}
