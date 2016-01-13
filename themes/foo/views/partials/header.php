<?php $active = $this->uri->segment(2);
$active1 = $this->uri->segment(1); ?>
<nav class="navbar navbar-fixed-top navbar-inverse top_nav">
    <div class="nav_1">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                        aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo site_url() ?>">
                    <img src="/themes/foo/img/logo_yes.png" alt="Yes Shop">
                </a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="<?php if ($active == 'product') {
                        echo('active');
                    } ?>"><a href="<?php echo site_url('nam') ?>"><span>Nam</span> <i
                                class="fa fa-caret-up"></i></a></li>
                    <li <?php if ($active == 'nu') {
                        echo('active');
                    } ?>><a href="<?php echo site_url('nu') ?>">Nữ</a></li>
                    <li <?php if ($active == 'ao-cap') {
                        echo('active');
                    } ?>><a href="<?php echo site_url('ao-cap') ?>">Áo cặp</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="cart"><a href="<?php echo site_url('cart') ?>">Giỏ Hàng (0) <span
                                class="cart_icon fa fa-shopping-cart"></span></a>
                    </li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>
    <?php if ($active != ''): ?>
        <div class="nav_2">
            <div class="container">
                <?php if ($active == 'product'): ?>
                    <ul class="man nav navbar-nav">
                        <li class="active"><a href="">Áo bóng chày</a></li>
                    </ul>
                <?php endif; ?>
                <?php if ($active == 'nu'): ?>
                    <ul class="women nav navbar-nav">
                        <li><a href="">Áo khoác</a></li>
                        <li><a href="">Áo sơ mi</a></li>
                        <li><a href="">Áo thun</a></li>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    <?php else: ?>
        <style type="text/css">
            body {
                padding-top: 50px;
            }
        </style>
    <?php endif; ?>
</nav>
