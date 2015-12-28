<?php $active = $this->uri->segment(2);
$active1 = $this->uri->segment(1);
$active2 = $this->uri->segment(3);

if($this->session->userdata('menu')){
  $menu = $this->session->userdata('menu');
}else{
  $string = file_get_contents(FCPATH."themes/backend/js/menu.json");
  $menu = json_decode($string, true);
  $newdata = array('menu'  => $menu);
  $this->session->set_userdata($newdata);
}
?>
<nav class="navbar navbar-inverse navbar-fixed-top toolbar navbar_c">
  <div class="container-fluid">
    <div class="navbar-header">
      <!-- <a class="" href="#"></a> -->
      <?php echo anchor( site_url(),'<i class="fa fa-chevron-circle-left"></i> Back to site',array('class' => 'navbar-brand back_home'));?>
      <?php echo anchor( site_url('admin/#'),'<i class="fa fa-bars"></i> Manage',array('class'=>'navbar-brand')); ?>
    </div>
    <div class="text-right navbar-right box_user">
      <?php echo anchor(site_url('admin/users/profile'),'<i class="fa fa-user"></i> Admin',array('class'=>'navbar-brand'));?>
      <?php echo anchor(site_url(ADMIN_FOLDER.'/users/logout'),'<i class="fa fa-sign-out"></i> Logout',array('class'=>'navbar-brand'));?>
    </div>
  </div>
</nav>
<div class="sidebar_c">

  <?php if(!empty($menu)):?>
    <ul class="nav nav-sidebar">
      <?php foreach ($menu['menus'] as $key => $m0): ?>

        <li class="<?php ($active == $m0['link']) ? print 'active' : print '' ?>">
          <?php echo anchor(site_url(ADMIN_FOLDER.'/'.$m0['link']),'<i class="'.$m0['icon'].'"></i> <span>'.$m0['title'].'</span>');?>
          <?php if(isset($m0['sub'])  && !empty($m0['sub']) ):?>
            <ul class="nav sub_m">
              <?php foreach ($m0['sub'] as $k => $m1): ?>
                <li class="<?php ($active == $m0['link'] && $active2 == $m1['link']) ? print 'active' : print '' ?>">
                  <?php echo anchor(site_url(ADMIN_FOLDER.'/'.$m0['link'].'/'.$m1['link']),$m1['title']) ?>
                </li>
              <?php endforeach; ?>
            </ul>
          <?php endif?>
        </li>
      <?php endforeach; ?>
    </ul>
  <?php endif;?>
</div>
