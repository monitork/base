<?php echo form_open(current_url(),array('id'=>'loginform')); ?>
<p>
  <?php echo form_label('Username','user_login');?>
  <br />
  <?php echo form_input('log','',array('id'=>'user_login','class'=>'input','size'=>'20'));?>
</p>
<p>
  <?php echo form_label('Password','user_pass');?>
  <br />
  <?php echo form_password('pwd','',array('id'=>'user_pass','class'=>'input','size'=>'20'));?>
</p>
<p class="forgetmenot">
  <?php echo form_label(form_checkbox('rememberme','1',false,'id="rememberme"').'Remember Me','rememberme');?>
</p>
<p class="submit">
  <input type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large" value="Log In" />
  <input type="hidden" name="redirect_to" value="<?php echo site_url(ADMIN_FOLDER) ?>" />
  <input type="hidden" name="testcookie" value="1" />
</p>
<br class="clear">

  <?php if($message):?><p class="err"><?php echo $message;?></p><?php endif?>

</form>
<p id="nav">
  <?php echo anchor(site_url(ADMIN_FOLDER.'/users/lostpassword'),'Lost your password?','title="Password Lost and Found"')?>
</p>
<style media="screen">
  .clear{clear: both;}
  .err{color:red;}
  input[type=radio], input[type=checkbox]{
    -moz-appearance: checkbox;
    -webkit-appearance: checkbox;
  }
  input[type=checkbox]:checked:before{
    content: ''
  }
</style>
<script type="text/javascript">
function wp_attempt_focus(){
  setTimeout( function(){ try{
    d = document.getElementById('user_login');
    d.focus();
    d.select();
  } catch(e){}
}, 200);
}

wp_attempt_focus();
if(typeof wpOnload=='function')wpOnload();
</script>

<p id="backtoblog"><?php echo anchor(site_url(),'&larr; Back your site','title="Are you lost?"');?></p>
