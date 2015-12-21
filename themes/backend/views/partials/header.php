<?php $active = $this->uri->segment(2);
$active1 = $this->uri->segment(1); ?>

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
        <li class="<?php ($active == 'content') ? print 'active' : print '' ?>">
            <a href="<?php echo site_url('admin/content') ?>"><i class="fa fa-file"></i> <span>Content</span></a>
        </li>
        <li class="<?php ($active == 'structure') ? print 'active' : print '' ?>">
            <a href="<?php echo site_url('admin/structure') ?>"><i class="fa fa-puzzle-piece"></i> <span>Structure</span></a>
        </li>
        <li class="<?php ($active == 'modules') ? print 'active' : print '' ?>">
            <a href="<?php echo site_url('admin/modules') ?>"><i class="fa fa-cubes"></i> <span>Modules</span></a>
        </li>
        <li class="<?php ($active == 'users') ? print 'active' : print '' ?>">
            <a href="<?php echo site_url('admin/users') ?>"><i class="fa fa-users"></i> <span>People</span></a>
        </li>
        <li class="<?php ($active == 'settings') ? print 'active' : print '' ?>">
            <a href="<?php echo site_url('admin/settings') ?>"><i class="fa fa-cogs"></i> <span>Settings</span></a>
        </li>
        <li class="<?php ($active == 'reports') ? print 'active' : print '' ?>">
            <a href="<?php echo site_url('admin/reports') ?>"><i class="fa fa-bar-chart"></i> <span>Reports</span></a>
        </li>
    </ul>
</div>
<div class="text-render">
    <p class="text-center ">Page rendered in <strong>{elapsed_time}</strong>
        seconds. <?php echo (ENVIRONMENT === 'development') ? '  CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?>
    </p>
</div>
