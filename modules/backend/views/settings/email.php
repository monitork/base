<h1 class="tit">
  <?php
  echo $template['title'];
  ?>
</h1>
<form class="form-horizontal">
  <div class="form-group">
    <?php echo form_label('Site Title','blogname',array('class'=>'col-sm-3 control-label')); ?>
    <div class="col-sm-9  form-inline">
      <?php echo form_input('blogname','',array('id'=>'blogname','class'=>'form-control input-sm','size'=>'40'));?>
    </div>
  </div>
  <div class="form-group">
    <?php echo form_label('Tagline','blogdescription',array('class'=>'col-sm-3 control-label')); ?>
    <div class="col-sm-9  form-inline">
      <?php echo form_input('blogdescription','',array('id'=>'blogdescription','class'=>'form-control input-sm','size'=>'40'));?>
      <p class="help-block"> In a few words, explain what this site is about.</p>
    </div>
  </div>
  <div class="form-group">
    <?php echo form_label('E-mail Address ','admin_email',array('class'=>'col-sm-3 control-label')); ?>
    <div class="col-sm-9  form-inline">
      <?php echo form_input('admin_email','',array('id'=>'admin_email','class'=>'form-control input-sm','size'=>'40'));?>
      <p class="help-block">This address is used for admin purposes, like new user notification.</p>
    </div>
  </div>
  <div class="form-group">
    <?php echo form_label('Membership ','',array('class'=>'col-sm-3 control-label')); ?>
    <div class="col-sm-9  form-inline">
      <?php echo form_label(form_checkbox('users_can_register','1',false,'id="users_can_register"').' Anyone can register','users_can_register',array('class'=>'text-nomal'));?>
    </div>
  </div>
  <div class="form-group">
    <?php echo form_label('New User Default Role','admin_email',array('class'=>'col-sm-3 control-label')); ?>
    <div class="col-sm-9 form-inline">
      <?php
      $options = array(
        'small'         => 'Small Shirt',
        'med'           => 'Medium Shirt',
        'large'         => 'Large Shirt',
        'xlarge'        => 'Extra Large Shirt',
      );
      echo form_dropdown('shirts', $options, 'large','class="form-control input-sm"');?>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-3">
      <?php echo form_submit('submit','Save Changes','class="btn btn-primary pull-right btn-sm"');?>
    </div>
  </div>

</form>
