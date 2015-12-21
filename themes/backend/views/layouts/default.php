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
  <script src="<?php echo site_url('/themes/backend/js/script.js')?>"></script>
  <!-- End/script File -->
</body>
</html>
