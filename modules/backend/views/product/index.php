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
  <?php echo anchor(site_url(ADMIN_FOLDER.'/'.$module.'/add'),'Add New','class="page-title-action"');?>
</h1>
<ul class="subsubsub">
  <li class="all">
    <?php echo anchor(site_url(ADMIN_FOLDER.'/'.$module),'All <span class="count">(3)</span>',array('class'=>($this->uri->segment(3) =='')?'current':''));?>  |
  </li>
  <li class="publish">
    <?php echo anchor(site_url(ADMIN_FOLDER.'/'.$module.'/published'),'Published <span class="count">(2)</span>',array('class'=>($this->uri->segment(3) =='published')?'current':''));?>  |
  </li>
  <li class="draft">
    <?php echo anchor(site_url(ADMIN_FOLDER.'/'.$module.'/draft'),'Draft <span class="count">(1)</span>',array('class'=>($this->uri->segment(3) =='draft')?'current':''));?>
  </li>
  <li class="trash">
    <?php echo anchor(site_url(ADMIN_FOLDER.'/'.$module.'/trash'),'Trash <span class="count">(1)</span>',array('class'=>($this->uri->segment(3) =='trash')?'current':''));?>
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
  if($content['total']> 0){
    foreach ($content['data'] as $key => $item) {
      $this->table->add_row(
      form_checkbox('checkItem'.$item['ID'],$item['ID'],false,'id="checkItem_'.$item['ID'].'" class="check_item"'),
      '<strong>'.anchor(site_url(ADMIN_FOLDER.'/'.$module.'/edit/'.$item['ID']),$item['post_title']) . (($item['post_status'] == 'draft')?' - draft':'').' </strong>'.
      '<div class="row_action"> <span>'.anchor(site_url(ADMIN_FOLDER.'/'.$module.'/edit/'.$item['ID']),'Edit'). ' |</span>'.
      ' <span>'.anchor(site_url(ADMIN_FOLDER.'/'.$module.'/movetrash/'.$item['ID']),'Move to Trash','class="trash"').' </span>'.
      '</div>',
      $item['user_login'],
      date('Y-m-d',strtotime($item['post_date']))
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
