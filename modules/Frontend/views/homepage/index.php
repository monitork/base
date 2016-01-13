<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="row">
    <div class="col-md-6 text-center text-uppercase bg_1">
        <a href="<?php echo site_url('nu') ?>">
            <span class="r_1 text-black">Thời Trang Phái Nữ</span>
        </a></div>
    <div class="col-md-6 text-center text-uppercase bg-primary">
        <a href="<?php echo site_url('nam') ?>">
            <span class="r_1 text-white">Thời trang Nam giới</span>
        </a>
    </div>
</div>

<!-- Carousel
    ================================================== -->
<div class="row">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img class="first-slide"
                     src="/themes/foo/img/hp_sep_2015_v1.jpg"
                     alt="First slide">

                <div class="container">
                    <div class="carousel-caption">
                        <h1>Example headline.</h1>

                        <p>Note: If you're viewing this page via a <code>file://</code> URL, the "next" and "previous"
                            Glyphicon buttons on the left and right might not load/display properly due to web browser
                            security rules.</p>

                        <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
                    </div>
                </div>
            </div>
            <div class="item">
                <img class="second-slide"
                     src="/themes/foo/img/demo_slide_2.png"
                     alt="Second slide">

                <div class="container">
                    <div class="carousel-caption">
                        <h1>Another example headline.</h1>

                        <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta
                            gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>

                        <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
                    </div>
                </div>
            </div>
            <div class="item">
                <img class="third-slide"
                     src="/themes/foo/img/demo_slide_3.png"
                     alt="Third slide">

                <div class="container">
                    <div class="carousel-caption">
                        <h1>One more for good measure.</h1>

                        <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta
                            gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>

                        <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
                    </div>
                </div>
            </div>
        </div>
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- /.carousel -->
</div>


<div class="row mt-20 register_box">
    <img class="r_b_image" src="/themes/foo/img/hp_signup_bg.jpg" alt="Sign up">

    <div class="r_b_content">
        <div class="col-md-5"></div>
        <div class="col-md-7">
            <p class="text-center text_1">
                <span class="text-uppercase text-black">Độc quyền</span> <br/>
            </p>

            <p class="text-center text_2">
                <span class="text-uppercase text-white">
                    Dành Cho THÀNH VIÊN
                </span>
            </p>

            <p class="text-center text-black f13">
                Cập nhập thông tin cá nhân, trở thành thành viên của <span
                    class="text-white text-uppercase">YES SHOP</span> bạn sẽ được hưởng  <span
                    class="text-white text-uppercase">khuyến mãi 10% với mỗi
                đơn hàng.</span>
            </p>

            <p class="text-center"><a href="<?php echo site_url('users/register') ?>" class="btn btn-success">Đăng
                    ký</a></p>
        </div>
    </div>
</div>
