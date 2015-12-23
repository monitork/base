<?php $active = $this->uri->segment(2);
$active1 = $this->uri->segment(1);
$active2 = $this->uri->segment(3); ?>

<nav class="navbar navbar-inverse navbar-fixed-top toolbar navbar_c">
  <div class="container-fluid">
    <div class="navbar-header">
      <!-- <a class="" href="#"></a> -->
      <?php echo anchor( site_url(),'<i class="fa fa-chevron-circle-left"></i> Back to site',array('class' => 'navbar-brand back_home'));?>
      <?php echo anchor( site_url('admin/#'),'<i class="fa fa-bars"></i> Manage',array('class'=>'navbar-brand')); ?>
    </div>
    <div class="text-right navbar-right box_user">
      <?php echo anchor(site_url('admin/users/profile'),'<i class="fa fa-user"></i> Admin',array('class'=>'navbar-brand'));?>
      <?php echo anchor(site_url('users/logout'),'<i class="fa fa-sign-out"></i> Logout',array('class'=>'navbar-brand'));?>
    </div>
  </div>
</nav>
<div class="sidebar_c">
  <ul class="nav nav-sidebar">
    <li class="<?php ($active == '' && $active1 == 'admin') ? print 'active' : print '' ?>">
      <a href="<?php echo site_url('admin') ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
    </li>
    <li class="<?php ($active == 'posts') ? print 'active' : print '' ?>">
      <a href="<?php echo site_url('admin/posts') ?>"><i class="fa fa-legal"></i> <span>Posts</span></a>
      <ul class="nav sub_m">
        <li class="active"><a href="#">All post</a></li>
        <li><a href="#">Add new</a></li>
      </ul>
    </li>
    <li class="<?php ($active == 'page') ? print 'active' : print '' ?>">
      <a href="<?php echo site_url('admin/page') ?>"><i class="fa fa-file"></i> <span>Page</span></a>
      <ul class="nav sub_m">

        <li class="active"><a href="#">All Page</a></li>
        <li><a href="#">Add new</a></li>
      </ul>
    </li>
    <li class="<?php ($active == 'products') ? print 'active' : print '' ?>">
      <a href="<?php echo site_url('admin/products') ?>"><i class="fa fa-shopping-bag"></i> <span>Products</span></a>
      <ul class="nav sub_m">
        <li class="active"><a href="#">All product</a></li>
        <li><a href="#">Add new</a></li>
      </ul>
    </li>

    <li class="<?php ($active == 'structure') ? print 'active' : print '' ?>">
      <a href="<?php echo site_url('admin/structure') ?>"><i class="fa fa-puzzle-piece"></i> <span>Structure</span></a>
      <ul class="nav sub_m">

        <li class="active"><a href="#">Categories</a></li>
        <li><a href="#">Tags</a></li>
        <li><a href="#">Menu</a></li>
      </ul>
    </li>
    <li class="<?php ($active == 'users') ? print 'active' : print '' ?>">
      <a href="<?php echo site_url('admin/users') ?>"><i class="fa fa-users"></i> <span>Users</span></a>
      <ul class="nav sub_m">
        <li class="active"><a href="#">All users</a></li>
        <li><a href="#">Add user</a></li>
        <li><a href="#">Your profile</a></li>
      </ul>
    </li>
    <li class="<?php ($active == 'settings') ? print 'active' : print '' ?>">
      <a href="<?php echo site_url('admin/settings') ?>"><i class="fa fa-cogs"></i> <span>Settings</span></a>
      <ul class="nav sub_m">
        <li class="<?php ($active == 'settings' && $active2 == '') ? print 'active' : print '' ?>"><?php echo anchor(site_url('admin/settings'),'General') ?></li>
        <li class="<?php ($active == 'settings' && $active2 == 'reading') ? print 'active' : print '' ?>"><?php echo anchor(site_url('admin/settings/reading'),'Reading') ?></li>
        <li class="<?php ($active == 'settings' && $active2 == 'email') ? print 'active' : print '' ?>"><?php echo anchor(site_url('admin/settings/email'),'Email') ?></li>
      </ul>
    </li>
    <li  class="<?php ($active == 'media') ? print 'active' : print '' ?>">
      <a href="<?php echo site_url('admin/media') ?>"><i class="fa fa-film"></i> <span>Media</span></a>
    </li>
    <li class="<?php ($active == 'reports') ? print 'active' : print '' ?>">
      <a href="<?php echo site_url('admin/reports') ?>"><i class="fa fa-bar-chart"></i> <span>Reports</span></a>
      <ul class="nav sub_m">
        <li class="active"><a href="#">Products</a></li>
        <li><a href="#">Reading</a></li>
        <li><a href="#">Email</a></li>
      </ul>
    </li>
  </ul>
</div>
