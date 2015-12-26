<h1 class="tit">
  <?php
  echo $template['title'];
  ?>
</h1>
<div id="media">

</div>
<script type="text/javascript" src="<?php echo site_url('assets/vendor/ckfinder/ckfinder.js');?>"></script>
<script type="text/javascript">
CKFinder.widget( 'media', {
  width: '100%',
  height: 500
} );
</script>
