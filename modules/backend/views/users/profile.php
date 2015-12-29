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
</h1>
<div class="row">
  <div class="col-md-12">
    <?php echo form_open(current_url(),array('class'=>'form-horizontal')) ?>
    <h4 class="box">Name</h4>
    <hr>
    <div class="form-group">
      <?php echo form_label('Username','user_login',array('class'=>'col-sm-3 control-label required')); ?>
      <div class="col-sm-9  form-inline">
        <?php echo form_input($user_login);?>
        <p class="help-block">Usernames cannot be changed.</p>
      </div>
    </div>
    <div class="form-group">
      <?php echo form_label('First Name','first_name',array('class'=>'col-sm-3 control-label')); ?>
      <div class="col-sm-9  form-inline">
        <?php echo form_input($first_name);?>
      </div>
    </div>
    <div class="form-group">
      <?php echo form_label('Last Name','last_name',array('class'=>'col-sm-3 control-label')); ?>
      <div class="col-sm-9  form-inline">
        <?php echo form_input($last_name);?>
      </div>
    </div>nickname
    <div class="form-group">
      <?php echo form_label('Nickname','nickname',array('class'=>'col-sm-3 control-label required')); ?>
      <div class="col-sm-9  form-inline">
        <?php echo form_input($nickname);?>
      </div>
    </div>
    <div class="form-group">
      <?php echo form_label('Display name','display_name',array('class'=>'col-sm-3 control-label')); ?>
      <div class="col-sm-9  form-inline">
        <?php echo form_dropdown($display_name['name'],$display_name['option'],$display_name['selected'],$display_name['extra']);?>
      </div>
    </div>
    <h4 class="box">Contact info</h4>
    <hr>
    <div class="form-group">
      <?php echo form_label('Email','email',array('class'=>'col-sm-3 control-label required')); ?>
      <div class="col-sm-9  form-inline">
        <?php echo form_input($email);?>
      </div>
    </div>

    <div class="form-group">
      <?php echo form_label('Website','url',array('class'=>'col-sm-3 control-label')); ?>
      <div class="col-sm-9  form-inline">
        <?php echo form_input($url);?>
      </div>
    </div>
    <h4 class="box">About Yourself</h4>
    <hr>
    <div class="form-group">
      <?php echo form_label('Biographical Info','role',array('class'=>'col-sm-3 control-label')); ?>
      <div class="col-sm-9  form-inline">
        <?php
        echo form_textarea($description);?>
        <p class="help-block">Share a little biographical information to fill out your profile. This may be shown publicly.</p>
      </div>
    </div>
    <h4 class="box">Account Management</h4>
    <hr>
    <div class="form-group">
      <?php echo form_label('New password','pass',array('class'=>'col-sm-3 control-label')); ?>
      <div class="col-sm-9  form-inline">
        <?php echo form_input($pass);?>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-3">
        <?php echo form_submit('submit','Save Changes','class="btn btn-primary pull-right btn-sm"');?>
      </div>
    </div>
    <?php echo form_close();?>
  </div>
</div>
