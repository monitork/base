<h1 class="tit"><?php echo $template['title']?></h1>
<div class="row">
  <div class="col-md-6">
    <div class="panel panel-default panel_post">
      <div class="panel-heading"><h4 class="box">At a Glance</h4></div>
      <div class="panel-body">
        <ul>
          <li><i class="fa fa-legal"></i>  <?php echo anchor(site_url(ADMIN_FOLDER.'/posts'),'2 Post')?></li>
          <li><i class="fa fa-cubes"></i>  <?php echo anchor(site_url(ADMIN_FOLDER.'/products'),'12 Products')?></li>
          <li><i class="fa fa-file"></i>  <?php echo anchor(site_url(ADMIN_FOLDER.'/page'),'1 Page')?></li>
        </ul>

      </div>
      <div class="panel-footer">
        <p class="help-block">
          This is all content in your Website.
        </p>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="panel panel-default panel_activity">
      <div class="panel-heading"><h4 class="box">Activity</h4></div>
      <div class="panel-body">
        <ul>
          <li>
            <span>Nov 19th, 10:35 am</span>
            <a href="http://wp.dev/wp-admin/post.php?post=5&amp;action=edit">Hello world 2</a>
          </li>
          <li>
            <span>Oct 24th, 3:05 am</span>
            <a href="http://wp.dev/wp-admin/post.php?post=1&amp;action=edit">Hello world!</a>
          </li>
        </ul>
      </div>
      <div class="panel-footer">
        <p class="help-block">
          This is recently content published.
        </p>
      </div>
    </div>
  </div>
</div>
