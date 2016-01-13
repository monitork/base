<div class="row">
  <div class="col-md-3 sidebar">
    <h3 class="tit f13 text-uppercase">
      <i class="fa fa-caret-right"></i> Nam
    </h3>
    <ul class="nav">
      <ul>
        <li class="active"><a href="">Áo Bóng chày</a></li>
      </ul>
    </ul>
  </div>
  <div class="col-md-9">
    <div class="header_p_box">
      <?php echo $this->breadcrumbs->show(); ?>
    </div>
    <div class="list_product">
      <div class="row">
        <?php if(!empty($products)):?>
          <?php foreach ($products as $k => $p):?>
            <div class="col_c_2">
              <div class="item">
                <div class="item-content">
                  <?php var_dump($p)?>
                  <div class="image">
                    <a href="">
                      <img src="/themes/foo/img/20151109_BRA-NewA_WC-WS-WB_ZaloraNAs_NA_Zalora.jpg"
                      alt="ok">
                    </a>
                  </div>
                  <div class="item_meta">
                    <h3 class="code">
                      <?php echo anchor(site_url($p['post_name'].'-'.$p['ID'].'.html'),getPostMeta($p['ID'],'sku'));?>
                    </h3>

                    <p class="title">
                      <?php echo anchor(site_url($p['post_name'].'-'.$p['ID'].'.html'),$p['post_title']);?>
                    </p>

                    <div class="price_box text-right">
                      <div class="price">515.000 VND</div>
                      <div class="price_sale text-uppercase">Giảm còn: 312.000 VND</div>
                    </div>
                    <p class="size text-right">
                      Kích cỡ: OneSize
                    </p>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach;?>
        <?php else:?>
          <div class="col-md-12">
            <p class="help-block text-center">
              No have content yet.
            </p>
          </div>
        <?php endif;?>
      </div>
    </div>
  </div>
</div>
