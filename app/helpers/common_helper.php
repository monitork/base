<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* getSetting()
*
* @return
*/
if ( ! function_exists('getSetting'))
{
  function getSetting($slug){
    $retval = '';
    $CI = & get_instance();
    $CI->db->where('option_name',$slug);
    $row = $CI->db->get('options')->row();
    if(!empty($row)){
      $retval = $row->option_value;
    }
    return $retval;
  }
}
