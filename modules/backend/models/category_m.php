<?php defined('BASEPATH') OR exit('No direct script access allowed');
class category_m extends CI_Model
{
  protected $_table = 'terms';
  public function get_all($taxonomy = '',$parent = 0)
  {
    $this->db->select('t.term_id,t.name, t.slug,tt.description,tt.count');
    $this->db->from($this->_table.' as t');
    if($taxonomy){
      $this->db->where('tt.taxonomy',$taxonomy);
    }
    $this->db->where('tt.parent',$parent);
    $this->db->join('term_taxonomy as tt', 'tt.term_id = t.term_id', 'left');
    $this->db->order_by('t.term_id','ASC');
    $result = $this->db->get()->result_array();

    foreach ($result as $key => $r) {
      $sub = $this->get_all($taxonomy,$r['term_id']);
      if(!empty($sub)){
        $result[$key]['sub'] = $sub;
      }
    }
    return $result ;
  }
}
