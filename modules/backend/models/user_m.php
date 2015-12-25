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
}
