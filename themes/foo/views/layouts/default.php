<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 2 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="/themes/backend/favicon.ico"/>
    <title>YES SHOP - <?php echo $template['title']; ?></title>
    <?php echo $template['metadata']; ?>
    <link href="<?php echo site_url('/assets/vendor/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php echo site_url('/assets/vendor/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet">
    <?php echo $template['style']; ?>
    <link href="<?php echo site_url('/themes/foo/css/styles.css')?>" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]>
    <script src="/assets/js/vendor/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="/assets/js/vendor/ie-emulation-modes-warning.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<?php echo $template['partials']['header']; ?>
<div class="container">
    <div class="sub_header">
        <ul class="nav navbar-nav navbar-right">
            <li><a href="javascript:void(0)"><i class="fa fa-truck"></i> <span>Giao hàng nhanh</span></a></li>
            <li><a href="javascript:void(0)"><i class="fa fa-credit-card"></i> <span>Thanh toán khi nhận hàng</span></a></li>
            <li><a href="javascript:void(0)"><i class="fa fa-phone"></i> <span>Hotline: (01677 114 006)</span></a></li>
        </ul>
    </div>
    <!--    <h1>--><?php //echo $template['title']; ?><!--</h1>-->
</div>
<div class="container">
    <?php echo $template['body']; ?>
</div>
<?php echo $template['partials']['footer']; ?>
<!-- Script File -->
<script src="<?php echo site_url('/assets/vendor/jquery.js')?>"></script>
<script src="<?php echo site_url('/assets/vendor/bootstrap/js/bootstrap.min.js')?>"></script>
<?php echo $template['script']; ?>

<!-- End/script File -->
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="/assets/js/vendor/ie10-viewport-bug-workaround.js"></script>
<script type="text/javascript">
  var base_url = "<?php echo site_url();?>";
</script>
<script src="<?php echo site_url('/themes/foo/js/script.js')?>"></script>
</body>
</html>
