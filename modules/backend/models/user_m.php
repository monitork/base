<?php defined('BASEPATH') OR exit('No direct script access allowed');
class User_m extends CI_Model
{
  protected $_table = 'users';
  public function get_all($publish= '')
  {
    $this->db->select('ID,user_login, user_email');
    $query = $this->db->get($this->_table);
    $result = $query ->result_array();
    if(!empty($result)){
      foreach ($result as $k => $u) {
        $result[$k]['first_name']= $this->get_user_meta($u['ID'],'first_name');
        $result[$k]['last_name']= $this->get_user_meta($u['ID'],'last_name');
        $result[$k]['capabilities']= unserialize($this->get_user_meta($u['ID'],'wp_capabilities'));
      }
    }
    return $result;
  }
  function get_user_meta($uid,$key = ''){
    $this->db->select('meta_value');
    $this->db->where('user_id',$uid);
    $this->db->where('meta_key',$key);
    $result = $this->db ->get('usermeta') ->row();
    return $result->meta_value;
  }
  function get_a_name($name){
    $this->db->select('ID,user_login, user_email,user_pass');
    $this->db->where('user_login',$name);
    $query = $this->db->get($this->_table);
    return $query ->row();
  }
  function addUser($post = array()){
    require_once (APPPATH.'libraries/PasswordHash.php');
    $wp_hasher = new PasswordHash(8, TRUE);
    $pass = $wp_hasher->HashPassword(trim($post['pass']));
    $data = array(
      'user_login' => trim($post['user_login']),
      'user_pass' => $pass,
      'user_nicename' => trim($post['user_login']),
      'user_email' => trim($post['email']),
      'user_registered' => date('Y-m-d H:i:s'),
      'display_name' => ($post['first_name'] || $post['last_name']) ? trim($post['first_name']).' '. trim($post['last_name']) : trim($post['user_login']),
      'user_status' => 0
    );
    if($this->db->insert($this->_table,$data)){
      //Update user meta
      $id = $this->db->insert_id();
      $data2 = array(
        array(
          'user_id' => $id,
          'meta_key' => 'nickname',
          'meta_value' => $post['user_login']
        ),
        array(
          'user_id' => $id,
          'meta_key' => 'first_name',
          'meta_value' => trim($post['first_name'])
        ),
        array(
          'user_id' => $id,
          'meta_key' => 'last_name',
          'meta_value' => trim($post['last_name'])
        ),
        array(
          'user_id' => $id,
          'meta_key' => 'description',
          'meta_value' => ''
        ),
        array(
          'user_id' => $id,
          'meta_key' => 'rich_editing',
          'meta_value' => 'true'
        ),
        array(
          'user_id' => $id,
          'meta_key' => 'comment_shortcuts',
          'meta_value' => 'false'
        ),
        array(
          'user_id' => $id,
          'meta_key' => 'admin_color',
          'meta_value' => 'fresh'
        ),
        array(
          'user_id' => $id,
          'meta_key' => 'use_ssl',
          'meta_value' => '0'
        ),
        array(
          'user_id' => $id,
          'meta_key' => 'show_admin_bar_front',
          'meta_value' => 'true'
        ),
        array(
          'user_id' => $id,
          'meta_key' => 'wp_capabilities',
          'meta_value' => serialize(array($post['role']=>true))
        ),
        array(
          'user_id' => $id,
          'meta_key' => 'wp_user_level',
          'meta_value' => '0'
        ),
        array(
          'user_id' => $id,
          'meta_key' => 'dismissed_wp_pointers',
          'meta_value' => ''
        ),
      );
      $this->db->insert_batch('usermeta', $data2);
      //END user update meta
      return true;
    }else {
      return false;
    }
  }
}
