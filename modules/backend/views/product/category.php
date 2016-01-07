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
  echo anchor(ADMIN_FOLDER.'/'.$module.'/categories','Add New','class="page-title-action"');
  ?>

</h1>
<div class="row">
  <div class="col-md-5">
    <?php echo form_open(current_url());?>
    <div class="form_group">
      <?php echo form_label('Name','tag-name',array('class'=>'text-nomal')); echo form_input($tag_name);?>
      <p class="help-block">The name is how it appears on your site.  </p>
    </div>
    <?php if(!empty($cates)):?>
      <div class="form_group">
        <?php echo form_label('Parent','parent',array('class'=>'text-nomal')); ?>
        <?php
        echo dropdown_from_array($cates,$cate_parent);?>
        <p class="help-block">Categories, unlike tags, can have a hierarchy. You might have a Jazz category, and under that have children categories for Bebop and Big Band. Totally optional.</p>
      </div>
    <?php endif?>
    <div class="form_group">
      <?php
      echo form_label('Description','tag-description',array('class'=>'text-nomal'));echo form_textarea($tag_description);
      ?>
      <p class="help-block">The description is not prominent by default; however, some themes may show it.</p>
    </div>
    <div class="form-group">
      <?php echo form_submit($submit);?>
    </div>
    <?php echo form_close();?>
  </div>
  <div class="col-md-7">
    <form class="form-inline">
      <div class="form-group">
        <input type="text" class="form-control input-sm" value="" name="name">
      </div>
      <div class="form-group">
        <button class="btn btn-default btn-sm" type="submit">Filter</button>
      </div>
    </form>
    <br class="clear">
    <div class="table-responsive">
      <?php
      $this->load->library('table');
      $this->table->set_heading(form_checkbox('checkAll','all',false,'id="checkAll"  onclick="check_all(this);"'),anchor('','Name'),'Description','Slug','Count');
      $template = array(
        'table_open' => '<table class="table table-striped">',
        'heading_cell_start'    => '<td>',
        'heading_cell_end'      => '</td>',
      );
      $this->table->set_template($template);
      if(isset($cates) && !empty($cates)){
        foreach ($cates as $key => $cate) {
          $this->table->add_row(
          '<input type="checkbox" value="" name="name">',
          '<strong>'.anchor(site_url(ADMIN_FOLDER.'/'.$module.'/categories/'.$cate['term_id']),$cate['name']) .'</strong>
          <div class="row_action">
          <span>'.anchor(site_url($cate['slug']),'View').' |</span>
          <span>'.anchor(site_url(ADMIN_FOLDER.'/'.$module.'/categories/'.$cate['term_id']),'Edit').' |</span>
          <span>'.anchor(site_url(ADMIN_FOLDER.'/'.$module.'/cate_delete/'.$cate['term_id']),'Delete','class="delete"').'</span>
          </div>',
          $cate['description'],$cate['slug'],$cate['count']
        );
        if(isset($cate['sub'])){
          foreach ($cate['sub'] as $key => $sub) {
            $this->table->add_row(
            '<input type="checkbox" value="" name="name">',
            '<strong>'.anchor(site_url(ADMIN_FOLDER.'/'.$module.'/categories/'.$sub['term_id']),'-- '.$sub['name']) .'</strong>
            <div class="row_action">
            <span>'.anchor(site_url($sub['slug']),'View').' |</span>
            <span>'.anchor(site_url(ADMIN_FOLDER.'/'.$module.'/categories/'.$sub['term_id']),'Edit').' |</span>
            <span>'.anchor(site_url(ADMIN_FOLDER.'/'.$module.'/cate_delete/'.$sub['term_id']),'Delete','class="delete"').'</span>
            </div>',
            $sub['description'],$sub['slug'],$sub['count']
          );
        }
      }
    }
  }else {
    $this->table->add_row('No have content yet.','','','');
  }
  echo $this->table->generate();
  ?>
</div>
<form method="post" action="index.html" class="form-inline">
  <div class="form-group">
    <select name="action" class="form-control input-sm">
      <option value="-1">Bulk Actions</option>
      <option value="trash">Public</option>
      <option value="trash">Move to Trash</option>
      <option value="trash">Delete</option>
    </select>
  </div>
  <div class="form-group">
    <button class="btn btn-default btn-sm" type="submit">Apply</button>
  </div>
</form>
</div>
</div>
