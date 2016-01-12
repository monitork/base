<?php if ($message): ?>
  <div class="alert alert-info alert_c">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <?php echo $message; ?>
  </div>
  <script type="text/javascript">
  show_alert();
  </script>
<?php endif ?>
<h1 class="tit">
  <?php
  echo $template['title'];
  ?>
  <?php echo anchor(site_url(ADMIN_FOLDER.'/page/add'),'Add New','class="page-title-action"');?>
</h1>
<ul class="subsubsub">
  <li class="all">
    <?php echo anchor(site_url(ADMIN_FOLDER.'/page'),'All ',array('class'=>($this->uri->segment(3) =='')?'current':''));?>  |
  </li>
  <li class="publish">
    <?php echo anchor(site_url(ADMIN_FOLDER.'/page/published'),'Published ',array('class'=>($this->uri->segment(3) =='published')?'current':''));?>  |
  </li>
  <li class="draft">
    <?php echo anchor(site_url(ADMIN_FOLDER.'/page/draft'),'Draft ',array('class'=>($this->uri->segment(3) =='draft')?'current':''));?> |
  </li>
  <li class="trash">
    <?php echo anchor(site_url(ADMIN_FOLDER.'/page/trash'),'Trash ',array('class'=>($this->uri->segment(3) =='trash')?'current':''));?>
  </li>
</ul>
<form class="form-inline">
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
  $this->table->set_heading(form_checkbox('checkAll','all',false,'id="checkAll"  onclick="check_all(this);"'),anchor('','Title'),'Date');
  $template = array(
    'table_open' => '<table class="table table-striped">',
    'heading_cell_start'    => '<td>',
    'heading_cell_end'      => '</td>',
  );
  $this->table->set_template($template);
  if(isset($page) && !empty($page)){
    foreach ($page as $key => $post) {
      $this->table->add_row(
      form_checkbox('checkItem'.$post['ID'],$post['ID'],false,'id="checkItem_'.$post['ID'].'" class="check_item"'),
      '<strong>'.anchor(site_url(ADMIN_FOLDER.'/edit/'.$post['ID']),$post['post_title']) . (($post['post_status'] == 'draft')?' - draft':'').' </strong>'.
      '<div class="row_action">'.
      ' <span>'.anchor(site_url(ADMIN_FOLDER.'/page/untrash/'.$post['ID']),'Restore','class="trash"').' |</span>'.
      ' <span>'.anchor(site_url(ADMIN_FOLDER.'/page/delete/'.$post['ID']),'Delete','class="delete"').'</span>'.
      '</div>',
      $post['user_login'],
      date('Y-m-d',strtotime($post['post_date']))
    );
  }
}else {
  $this->table->add_row('No have content yet.','','','');
}
echo $this->table->generate();
?>
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
