<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Setting_m extends CI_Model
{
  protected $_table = 'options';
  function updateSetting($setting = array())
  {
    //Check for checkbox input type
    if(!isset($setting ['users_can_register'])){
      $setting['users_can_register'] = 0;
    }else {
      $setting['users_can_register'] = 1;
    }
    //Process update setting.
    foreach($setting as $k => $v){
      $chk_slug = $this->checkSlug($k);
      if($chk_slug){
        $data = array(
          'option_value'=>$v
        );
        $this->db->where('option_id',$chk_slug[0]->option_id);
        $this->db->update($this->_table,$data);
      }else {
        $data1 = array(
          'option_name'=>$k,
          'option_value'=>$v
        );
        $this->db->insert($this->_table,$data1);
      }
    }
  }
  function checkSlug($slug){
    $this->db->select('option_id');
    $this->db->where('option_name', $slug);
    $this->db->limit(1);
    $query = $this->db->get($this->_table);

    if($query->result()){
      return $query->result();
    }else{
      return false;
    }
  }
}
