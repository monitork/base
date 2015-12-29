<?php
/**
* @param $total
* @param $parent
*/
if ( ! function_exists('dropdown_from_array'))
{
  function dropdown_from_array($array = array(),$selected = '')
  {
    $str = '<select class="form-control input-sm" name"parent">';
    foreach ($array as $key => $item) {
      $str .='<option value="'.$item['term_id'].'" '.(($selected == $item['term_id'])? 'selected':'').'>'.$item['name'].'</option>';
      if(isset($item['sub'])){
        foreach ($item['sub'] as $k => $sub) {
          $str .='<option value="'.$sub['term_id'].'" '.(($selected == $sub['term_id'])? 'selected':'').'>  -- '.$sub['name'].'</option>';
        }
      }
    }
    $str .= "</select>";
    return $str;
  }
}
if ( ! function_exists('category_from_array'))
{
  function category_from_array($array = array(),$parent = 0,$checked = array()){
    $class = '';
    if ($parent == 0) {
      $class = "categories";
    }
    $str = '<ul class="'.$class.'">';
    foreach ($array as $k => $item) {
      if(isset($item['sub'])){
        $str .= '<li><input type="checkbox" '.(in_array($item['term_id'],$checked,TRUE)? 'checked': '').' name="category[]" id="category_' . $item['term_id'] . '" value = "' . $item['term_id'] . '"> <label for="category_' . $item['term_id'] . '"> ' . $item['name'] . '</label> ' . category_from_array($item['sub'], $item['term_id']) . '</li>';
      }else {
        $str .= '<li><input type="checkbox" '.(in_array($item['term_id'],$checked,TRUE)? 'checked': '').' name="category[]" id="category_' . $item['term_id'] . '" value = "' . $item['term_id'] . '"> <label for="category_' . $item['term_id'] . '"> ' . $item['name'] . '</label> </li>';
      }
    }
    $str .='</ul>';
    return $str;
  }
}
if(!function_exists('userRoleName')){
  function userRoleName($capabilities = array()){
    $role = unserialize(ADMIN_ROLE);
    foreach ($role as $m => $v) {
      if(isset($capabilities[$m]) && $capabilities[$m] == true){
        return $v;
      }
    }
  }
}
if(!function_exists('userRoleKey')){
  function userRoleKey($capabilities = array()){
    $role = unserialize(ADMIN_ROLE);
    foreach ($role as $m => $v) {
      if(isset($capabilities[$m]) && $capabilities[$m] == true){
        return $m;
      }
    }
  }
}
if(!function_exists('display_name')){
  function display_name($array){
    $arr = array();
    if(!empty($array)){
      foreach ($array as $value) {

        if($value != null){
          $arr[$value]= $value;
        }
      }
    }
    return $arr;
  }
}
