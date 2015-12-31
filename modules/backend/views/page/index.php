<?php if ($message): ?>
  <div class="alert alert-info alert_c">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <?php echo $message; ?>
  </div>
  <script type="text/javascript">
  show_alert();
  </script>
<?php endif ?>
<h1 class="tit">
  <?php
  echo $template['title'];
  ?>
  <?php echo anchor(site_url(ADMIN_FOLDER.'/page/add'),'Add New','class="page-title-action"');?>
</h1>
<ul class="subsubsub">
  <li class="all">
    <?php echo anchor(site_url(ADMIN_FOLDER.'/page/all'),'All <span class="count">(3)</span>','class="current"');?>  |
  </li>
  <li class="publish">
    <?php echo anchor(site_url(ADMIN_FOLDER.'/page/published'),'Published <span class="count">(2)</span>','class=""');?>  |
  </li>
  <li class="draft">
    <?php echo anchor(site_url(ADMIN_FOLDER.'/page/draft'),'Draft <span class="count">(1)</span>','class=""');?>
  </li>
</ul>
<form class="form-inline">
  <div class="form-group">
    <select class="form-control input-sm" name="action">
      <option value="-1">All dates</option>
      <option value="trash">09/2015</option>
      <option value="trash">10/2015</option>
    </select>
  </div>
  <div class="form-group">
    <select class="form-control input-sm" name="action">
      <option value="-1">All Categories</option>
      <option value="trash">Category 1</option>
      <option value="trash">Category 2</option>
    </select>
  </div>
  <div class="form-group">
    <input type="text" name="name" value="" class="form-control input-sm">
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-default btn-sm">Filter</button>
  </div>
</form>
<br class="clear">
<div class="table-responsive">
  <table class="table table-striped ">
    <thead>
      <tr>
        <td>
          <input type="checkbox" name="name" value="">
        </td>
        <td>
          <a href="#">Title</a>
        </td>
        <td>
          Author
        </td>
        <td>
          <a href="#">Date</a>
        </td>
      </tr>
    </thead>
    <tbody>
      <?php
      if(isset($page) && !empty($page)):
        foreach ($page as $key => $post) :
          ?>
          <tr>
            <td>
              <input type="checkbox" name="name" value="">
            </td>
            <td>
              <strong>
                <?php echo anchor(site_url(ADMIN_FOLDER.'/edit/'.$post['ID']),$post['post_title']);?>
              </strong>
              <div class="row_action">
                <span><a href="#">View</a> |</span>
                <span><?php echo anchor(site_url(ADMIN_FOLDER.'/page/edit/'.$post['ID']),'Edit');?> |</span>
                <span><?php echo anchor(site_url(ADMIN_FOLDER.'/page/trash/'.$post['ID']),'Move to Trash','class="trash"');?> |</span>
                <span><?php echo anchor(site_url(ADMIN_FOLDER.'/page/delete/'.$post['ID']),'Delete','class="delete"');?> </span>

              </div>
            </td>
            <td>
              Admin
            </td>
            <td>
              <?php echo date('Y-m-d',strtotime($post['post_date'])); ?> <br>
              Published
            </td>
          </tr>
          <?php
        endforeach;
        endif
        ?>
      </tbody>
    </table>
  </div>

  <form class="form-inline" action="index.html" method="post">
    <div class="form-group">
      <select class="form-control input-sm" name="action">
        <option value="-1">Bulk Actions</option>
        <option value="trash">Public</option>
        <option value="trash">Move to Trash</option>
        <option value="trash">Delete</option>
      </select>
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-default btn-sm">Apply</button>
    </div>
  </form>
