<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo site_url('/themes/backend/img/favicon.ico')?>" />
  <?php echo $template['metadata']; ?>
  <title>Admin - <?php echo $template['title']; ?></title>
  <link href="<?php echo site_url('/assets/vendor/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
  <link href="<?php echo site_url('/assets/vendor/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet">
  <?php echo $template['style']; ?>
  <link href="<?php echo site_url('/themes/backend/css/styles.css')?>" rel="stylesheet">
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-3 col-md-2 sidebar toolbar">
        <?php echo $template['partials']['header']; ?>
      </div>
      <div class="header_box"></div>
      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <!-- body -->
        <?php echo $template['body']; ?>
        <!-- End/body -->
      </div>
    </div>
  </div>
  <?php echo $template['partials']['footer']; ?>
  <!-- Script File -->
  <script src="<?php echo site_url('/assets/vendor/jquery.js')?>"></script>
  <script src="<?php echo site_url('/assets/vendor/bootstrap/js/bootstrap.min.js')?>"></script>
  <?php echo $template['script']; ?>
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
      ]
    });
    CKFinder.setupCKEditor( editor, "<?php echo site_url('assets/vendor/ckfinder/');?>" );
  });
  </script>
  <script type="text/javascript">
  var button = document.getElementById( 'btnSelectImg' );
  button.onclick = function() {
    CKFinder.modal( {
      chooseFiles: true,
      width: 800,
      height: 600,
      onInit: function( finder ) {
        finder.on( 'files:choose', function( evt ) {
          var file = evt.data.files.first();
          var output = document.getElementById( 'output' );
          // output.innerHTML = 'Selected: ' + file.get( 'name' ) + '<br>URL: ' + file.getUrl();
          output.innerHTML = '<img src="'+ file.getUrl() +'"/>';
        } );
        finder.on( 'file:choose:resizedImage', function( evt ) {
          var output = document.getElementById( 'output' );
          // output.innerHTML = 'Selected resized image: ' + evt.data.file.get( 'name' ) + '<br>url: ' + evt.data.resizedUrl;
          output.innerHTML = '<img src="'+evt.data.resizedUrl +'"/>';
        } );
      }
    } );
  };
  </script>

  <script type="text/javascript">
  CKFinder.widget( 'media', {
    width: '100%',
    height: 500
  } );
  </script>
  <script src="<?php echo site_url('/themes/backend/js/script.js')?>"></script>
  <!-- End/script File -->

</body>
</html>
