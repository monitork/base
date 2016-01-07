<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Product_m extends CI_Model
{
  protected $_table = 'posts';
  public function get_all($publish = '')
  {
    $this->db->select('p.ID,p.post_title, p.post_name, p.post_date,p.post_type,p.post_status,u.user_login');
    if($publish == 'publish'){
      $this->db->where('p.post_status','publish');
    }
    if($publish == 'draft'){
      $this->db->where('p.post_status','draft');
    }
    if($publish == 'trash'){
      $this->db->where('p.post_status','trash');
    }else {
      $this->db->where('p.post_status !=','trash');
    }
    $this->db->from($this->_table .' as p');
    $this->db->order_by('p.post_date','desc');
    $this->db->join('users as u', 'u.ID = p.post_author','left');
    $this->db->where('p.post_status !=','auto-draft');
    $this->db->where('p.post_status !=','inherit');
    $this->db->where('p.post_type','product');
    $result['data'] = $this->db->get()->result_array();
    $result['total'] =  $this->db->count_all();
    return $result;
  }
  public function get_a_product($id){
    $this->db->select('p.ID,p.post_title,p.post_content,p.post_date, p.post_excerpt,p.post_status,p.post_name,p.post_type,p.post_author,u.user_login');
    $this->db->from($this->_table .' as p');
    $this->db->where('p.ID',$id);
    $this->db->where('post_type','page');
    $this->db->join('users as u', 'u.ID = p.post_author','left');
    $result = $this->db->get()->row();
    return $result;
  }
  public function insert($posts = array()){
    $data_00 = array();
    $data_01 = array();
    if($posts['submit'] == 'Save'){
      $data['post_status'] = $posts['post_status'];
    }else {
      $data['post_status'] = 'trash';
    }
    $data['post_title'] =  $posts['post_title'];
    $data['post_name'] =  url_title(convert_accented_characters($posts['post_title']), '-', TRUE);
    $data['post_content'] = $posts['content'];
    $post_date = $posts['date']['year'] . '-'.$posts['date']['month'].'-'.$posts['date']['day'].' '.$posts['date']['hour'].':'.$posts['date']['minute'].':00';
    $data['post_date'] = date('Y-m-d H:i:s',strtotime($post_date));
    $data['post_modified'] = date('Y-m-d H:i:s',time());
    $data['post_author'] = $posts['uid'];
    $data['comment_status'] = 'closed';
    $data['ping_status'] = 'open';
    $data['post_type'] = 'product';
    $this->db->insert($this->_table,$data);
    $id = $this->db->insert_id();
    if(isset($posts['category'])){
      foreach ($posts['category'] as $cate) {
        $data_00[] = array(
          'object_id' => $id,
          'term_taxonomy_id' => $cate
        );
      }
    }
    if(isset($posts['color'])){
      foreach ($posts['color'] as $color) {
        $data_00[] = array(
          'object_id' => $id,
          'term_taxonomy_id' => $color
        );
      }
    }
    if(isset($posts['size'])){
      foreach ($posts['size'] as $size) {
        $data_00[] = array(
          'object_id' => $id,
          'term_taxonomy_id' => $size
        );
      }
    }
    if(isset($posts['product'])){
      foreach ($posts['product']  as $k  => $p) {
        $data_01[] = array(
          'post_id' => $id,
          'meta_key' => $k,
          'meta_vaule' => $p
        );
      }
    }
    if(!empty($data_00)){
      $this->db->insert('term_relationships',$data_00);
    }
    if(!empty($data_01)){
      $this->db->insert('postmeta',$data_01);
    }
  }
  public function update($pid,$posts = array()){
    if($posts['submit'] == 'Update'){
      $data['post_status'] = $posts['post_status'];
    }else {
      $data['post_status'] = 'trash';
    }
    $data['post_title'] =  $posts['post_title'];
    $data['post_name'] =  url_title(convert_accented_characters($posts['post_title']), '-', TRUE);
    $data['post_content'] = $posts['content'];
    $post_date = $posts['date']['year'] . '-'.$posts['date']['month'].'-'.$posts['date']['day'].' '.$posts['date']['hour'].':'.$posts['date']['minute'].':00';
    $data['post_date'] = date('Y-m-d H:i:s',strtotime($post_date));
    $data['post_modified'] = date('Y-m-d H:i:s',time());
    $data['post_author'] = $posts['uid'];
    $data['comment_status'] = 'closed';
    $data['ping_status'] = 'open';
    $data['post_type'] = 'page';
    $this->db->where('ID',$pid);
    $this->db->update($this->_table,$data);
  }
  public function movetrash($pid,$page)
  {
    $data['post_status'] = 'trash';
    $data['post_name']= $page->post_status;
    $this->db->where('ID',$pid);
    $this->db->update($this->_table,$data);
  }
  public function untrash($pid,$page)
  {
    $data['post_status'] = $page ->post_name;
    $data['post_name'] = url_title(convert_accented_characters($page ->post_title), '-', TRUE);
    $this->db->where('ID',$pid);
    $this->db->update($this->_table,$data);
  }
  function checkSlug($slug,$id){
    $this->db->select('meta_id');
    $this->db->where('meta_key', $slug);
    $this->db->where('post_id',$id);
    $query = $this->db->get($this->_table)->row();

    if($query->result()){
      return $query->result();
    }else{
      return false;
    }
  }
}
