<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <p class="help-block">
                    Mọi thắc mắc? Hãy liên lạc với chúng tôi. <br>
                    Hotline: 01677 114 006

                </p>
            </div>
            <div class="col-md-8">
                <div class="clearfix">
                    <ul class="nav navbar-nav navbar-right footer_nav">
                        <li>
                            <a href="">Thông tin</a>
                        </li>
                        <li>
                            <a href="">Liên hệ</a>
                        </li>
                        <li>
                            <a href="">Trợ giúp</a>
                        </li>
                        <li>
                            <a href="">Chính sách bảo mật</a>
                        </li>
                        <li>
                            <a href="">Điều khoản & Điều kiện</a>
                        </li>
                    </ul>
                </div>
                <div class="clearfix">
                    <p class="text-right">
                        &copy; 2015 YES SHOP
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Modal -->


<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
     id="myCartModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content  ra-0">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="text-uppercase">Sản phẩm này đã được đưa vào giỏ hàng của bạn</h4>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Tên sản phẩm:</th>
                        <th>Kích thước</th>
                        <th>Màu sắc</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="modal_name">Sản phẩm 1</td>
                        <td class="modal_size">XL</td>
                        <td class="modal_color"></td>
                        <td class="modal_quanity">1</td>
                        <td class="modal_price">230.000.VNĐ</td>
                    </tr>
                    </tbody>
                </table>
                <p class="help-block">
                    Chú ý: Sản phẩm mới nàm trong giỏ hàng của bạn. Bạn chưa tiến hành thanh toán, nên chúng tôi sẽ chưa
                    liên hệ và giao hàng cho bạn. Click vào giỏ hàng để tiến hành giao dịch.
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tiếp tục mua hàng</button>
                <a class="btn btn-primary" href="<?php echo site_url('cart') ?>">Giỏ hàng</a>
            </div>
        </div>
    </div>
</div>
