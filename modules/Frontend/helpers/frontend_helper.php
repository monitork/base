<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* getSetting()
*
* @return
*/
if ( ! function_exists('getPostMeta'))
{
  function getPostMeta($pid,$key){
    $retval = '';
    $CI = & get_instance();
    $CI->db->where('meta_key',$key);
    $CI->db->where('post_id',$pid);
    $row = $CI->db->get('postmeta')->row();
    if(!empty($row)){
      $retval = $row->meta_value;
    }
    return $retval;
  }
}
