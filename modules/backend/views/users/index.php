<?php if ($message): ?>
  <div class="alert alert-info alert_c">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <?php echo $message; ?>
  </div>
<?php endif ?>
<h1 class="tit">
  <?php
  echo $template['title'];
  ?>
  <?php echo anchor(site_url(ADMIN_FOLDER.'/users/add'),'Add New','class="page-title-action"');?>
</h1>
<ul class="subsubsub">
  <li class="all">
    <?php echo anchor(site_url(ADMIN_FOLDER.'/users'),'All <span class="count">(3)</span>',array('class'=>($this->uri->segment(3) =='')?'current':''));?>  |
  </li>
  <li class="publish">
    <?php echo anchor(site_url(ADMIN_FOLDER.'/users/published'),'Published <span class="count">(2)</span>',array('class'=>($this->uri->segment(3) =='published')?'current':''));?>  |
  </li>
  <li class="draft">
    <?php echo anchor(site_url(ADMIN_FOLDER.'/users/draft'),'Draft <span class="count">(1)</span>',array('class'=>($this->uri->segment(3) =='draft')?'current':''));?>
  </li>
</ul>
<form class="form-inline">
  <div class="form-group">
    <select class="form-control input-sm" name="action">
      <option value="-1">All dates</option>
      <option value="trash">09/2015</option>
      <option value="trash">10/2015</option>
    </select>
  </div>
  <div class="form-group">
    <select class="form-control input-sm" name="action">
      <option value="-1">All Categories</option>
      <option value="trash">Category 1</option>
      <option value="trash">Category 2</option>
    </select>
  </div>
  <div class="form-group">
    <input type="text" name="name" value="" class="form-control input-sm">
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-default btn-sm">Filter</button>
  </div>
</form>
<br class="clear">
<div class="table-responsive">
  <?php
  $this->load->library('table');
  $this->table->set_heading(form_checkbox('checkAll','all',false,'id="checkAll"'),anchor('','Username'), 'Name', 'Email','Role');
  $template = array(
    'table_open' => '<table class="table table-striped">',
    'heading_cell_start'    => '<td>',
    'heading_cell_end'      => '</td>',
  );
  $this->table->set_template($template);
  if(isset($users) && !empty($users)){
    foreach ($users as $k => $u) {
      $this->table->add_row(
      form_checkbox('checkItem'.$u['ID'],$u['ID'],false,'id="checkItem_'.$u['ID'].'"'),
      '<strong>'.anchor(ADMIN_FOLDER.'/user/profile/1',$u['user_login']).'<strong>
      <div class="row_action">
      <span><a href="#">View</a> |</span>
      <span>'.anchor(site_url(ADMIN_FOLDER.'/user/edit/'.$u['ID']),'Edit').'</span>
      <span>'.anchor(site_url(ADMIN_FOLDER.'/user/delete/'.$u['ID']),'Delete','class="delete"').'</span>
      </div>',
      $u['first_name'].' '.$u['last_name'] ,
      mailto($u['user_email'],$u['user_email']),
      userRoel($u['capabilities'])
    );
    }
  }else {
    $this->table->add_row('No have User yet.','','','','');
  }
  echo $this->table->generate();
  ?>
</div>

<form class="form-inline" action="index.html" method="post">
  <div class="form-group">
    <select class="form-control input-sm" name="action">
      <option value="-1">Bulk Actions</option>
      <option value="trash">Public</option>
      <option value="trash">Move to Trash</option>
      <option value="trash">Delete</option>
    </select>
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-default btn-sm">Apply</button>
  </div>
</form>
