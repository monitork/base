<h1 class="tit">
  <?php
  echo $template['title'];
  ?>
</h1>
<form class="form-horizontal">
  <div class="form-group">
    <?php echo form_label('Post per page','posts_per_page',array('class'=>'col-sm-3 control-label')); ?>
    <div class="col-sm-9  form-inline">
      <?php echo form_input('posts_per_page',getSetting('posts_per_page'),array('id'=>'posts_per_page','class'=>'form-control input-sm','size'=>'10'));?>
      posts
    </div>
  </div>
  <div class="form-group">
    <?php echo form_label('Post per rss','posts_per_rss',array('class'=>'col-sm-3 control-label')); ?>
    <div class="col-sm-9  form-inline">
      <?php echo form_input('posts_per_rss',getSetting('posts_per_rss'),array('id'=>'posts_per_rss','class'=>'form-control input-sm','size'=>'10'));?>
      items
    </div>
  </div>
  <div class="form-group">
    <?php echo form_label('Search Engine Visibility  ','',array('class'=>'col-sm-3 control-label')); ?>
    <div class="col-sm-9  form-inline">
      <?php echo form_label(form_checkbox('blog_public','0',(getSetting('blog_public') == 1)? false : true,'id="blog_public"').' Discourage search engines from indexing this site','blog_public',array('class'=>'text-nomal'));?>
      <p class="help-block">It is up to search engines to honor this request.</p>
    </div>

  </div>
  <div class="form-group">
    <?php echo form_label('Maintenance mode','',array('class'=>'col-sm-3 control-label')); ?>
    <div class="col-sm-9  form-inline">
      <?php echo form_label(form_checkbox('maintenance_mode','1',(getSetting('maintenance_mode') == 0) ? false : true,'id="maintenance_mode"').'Disable website for everyone.','maintenance_mode',array('class'=>'text-nomal'));?>
      <p class="help-block">When you active, website will be offline mode.</p>
    </div>

  </div>
  <div class="form-group">
    <div class="col-sm-3">
      <?php echo form_submit('submit','Save Changes','class="btn btn-primary pull-right btn-sm"');?>
    </div>
  </div>

</form>
