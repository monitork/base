<script src="<?php echo site_url('assets/vendor/ckeditor/ckeditor.js')?>"></script>
<script type="text/javascript" src="<?php echo site_url('assets/vendor/ckfinder/ckfinder.js');?>"></script>
<script type="text/javascript">
$(function() {
  var editor = CKEDITOR.replace('editor1', {
    filebrowserBrowseUrl : '<?php echo site_url('assets/vendor/ckfinder/ckfinder.html');?>',
    filebrowserImageBrowseUrl : '<?php echo site_url('assets/vendor/ckfinder/ckfinder.html?Type=Images');?>',
    filebrowserFlashBrowseUrl : '<?php echo site_url('assets/vendor/ckfinder/ckfinder.html?Type=Flash');?>',
    filebrowserUploadUrl : '<?php echo site_url('assets/vendor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files');?>',
    filebrowserImageUploadUrl : '<?php echo site_url('assets/vendor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images');?>',
    filebrowserFlashUploadUrl : '<?php echo site_url('assets/vendor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash');?>',
    filebrowserWindowWidth : '800', filebrowserWindowHeight : '480',
    toolbar :
    [
      ['Source','-', 'Bold', 'Italic', '-','TextColor','BGColor', '-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock', '-', 'NumberedList', 'BulletedList','Outdent','Indent', '-', 'Link', 'Unlink', '-','Image','Table','Maximize'],
      // ['Paste','PasteText','PasteFromWord'],
    ],
    height: 350,
  });
  CKFinder.setupCKEditor( editor, "<?php echo site_url('assets/vendor/ckfinder/');?>" );
});
</script>
