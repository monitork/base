<?php defined('BASEPATH') OR exit('No direct script access allowed');
class category_m extends CI_Model
{
  protected $_table = 'terms';
  public function get_all($taxonomy = '',$parent = 0)
  {
    $this->db->select('t.term_id,t.name, t.slug,tt.description,tt.count,tt.term_taxonomy_id');
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
  public function get_a_cate($tid)
  {
    $this->db->select('t.name,tt.description,tt.parent');
    $this->db->from($this->_table .' as t');
    $this->db->where('t.term_id',$tid);
    $this->db->join('term_taxonomy as tt', 'tt.term_id = t.term_id','left');
    $result = $this->db->get()->row();
    return $result;
  }
  public function insert($post = array(),$type){
    $data = array(
      'name' => $post['tag-name'],
      'slug' => url_title(convert_accented_characters($post['tag-name']), '-', TRUE)
    );
    $this->db->insert($this->_table,$data);
    $id = $this->db->insert_id();
    if(isset($post['parent'])){
      $parent = $post['parent'];
    }else {
      $parent = 0;
    }
    $data1 = array(
      'term_id' => $id,
      'taxonomy' => $type,
      'description' => $post['tag-description'],
      'parent' => $parent
    );
    $this->db->insert('term_taxonomy',$data1);
  }
  public function edit($post=array(),$type,$tid)
  {
    $data = array(
      'name' => $post['tag-name'],
      'slug' => url_title(convert_accented_characters($post['tag-name']), '-', TRUE)
    );
    $this->db->where('term_id',$tid);
    $this->db->update($this->_table,$data);
    if(isset($post['parent'])){
      $parent = $post['parent'];
    }else {
      $parent = 0;
    }
    $data1 = array(
      'description'=>$post['tag-description'],
      'parent' => $parent
    );
    $this->db->where('term_id',$tid);
    $this->db->where('taxonomy',$type);
    $this->db->update('term_taxonomy',$data1);
  }
  public function check_slug($name,$id){
    $slug = url_title(convert_accented_characters($name), '-', TRUE);
    $this->db->select('term_id');
    $this->db->where('slug',$slug);
    if($id != 0){
      $this->db->where('term_id !=',$id);
    }
    $result = $this->db->get($this->_table)->row();
    if(!empty($result)){
      return $result->term_id;
    }else {
      return false;
    }
  }
  public function get_term_with_post($pid){
    $this->db->select('term_taxonomy_id');
    $this->db->where('object_id', $pid);
    $this->db->from('term_relationships');
    $cates_id = $this->db->get()->result_array();
    $result = array();
    if($cates_id){
      foreach ($cates_id as $key => $v) {
        array_push($result,$v['term_taxonomy_id']);
      }
    }
    return $result;
  }
}
