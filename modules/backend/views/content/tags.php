<h1 class="tit">
  <?php
  echo $template['title'];
  ?>
</h1>
<div class="row">
  <div class="col-md-5">
    <h3 class="sub_tit">Add new tag</h3>
    <?php echo form_open(current_url());?>
    <div class="form_group">
      <?php echo form_label('Name','tag-name',array('class'=>'text-nomal')) ?>
      <?php echo form_input('tag-name','',array('id'=>'tag-name','class'=>'form-control input-sm'));?>
      <p class="help-block">The name is how it appears on your site.  </p>
    </div>
    <div class="form_group">
      <?php echo form_label('Slug','tag-slug',array('class'=>'text-nomal')) ?>
      <?php echo form_input('tag-slug','',array('id'=>'tag-slug','class'=>'form-control input-sm'));?>
      <p class="help-block">The “slug” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.  </p>
    </div>
    <div class="form_group">
      <?php echo form_label('Description','tag-description',array('class'=>'text-nomal')) ?>
      <textarea class="form-control" cols="80" id="editor2" name="editor2" rows="3"></textarea>
      <p class="help-block">The description is not prominent by default; however, some themes may show it.</p>
    </div>
    <div class="form-group">
      <?php echo form_submit('submit','Add new tag', array('class'=>'btn btn-sm btn-primary'));?>
    </div>
    <?php echo form_close();?>
  </div>
  <div class="col-md-7">
    <form class="form-inline">
      <div class="form-group">
        <input type="text" class="form-control input-sm" value="" name="name">
      </div>
      <div class="form-group">
        <button class="btn btn-default btn-sm" type="submit">Filter</button>
      </div>
    </form>
    <br class="clear">
    <div class="table-responsive">

      <table class="table table-striped ">
        <thead>
          <tr>
            <td>
              <input type="checkbox" value="" name="name">
            </td>
            <td>
              <a href="#">Name</a>
            </td>
            <td>
              Description
            </td>
            <td>
              Slug
            </td>
            <td>
              Count
            </td>
          </tr>
        </thead>
        <tbody>
          <?php if(!empty($cates)):?>
            <?php foreach ($cates as $key => $cate): ?>
              <tr>
                <td>
                  <input type="checkbox" value="" name="name">
                </td>
                <td>
                  <strong><?php echo anchor(site_url('admin/posts/categories/'.$cate['term_id']),$cate['name'])?> </strong>
                  <div class="row_action">
                    <span><a href="#">View</a> |</span>
                    <span><a href="http://base.dev/admin/posts/edit/13">Edit</a> |</span>
                    <span><a class="delete" href="http://base.dev/admin/posts/delete/13">Delete</a> </span>
                  </div>
                </td>
                <td>
                  <?php echo $cate['description'];?>
                </td>
                <td>
                  <?php echo $cate['slug'];?>
                </td>
                <td>
                  <?php echo $cate['count'];?>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php endif?>


        </tbody>
      </table>
    </div>
    <form method="post" action="index.html" class="form-inline">
      <div class="form-group">
        <select name="action" class="form-control input-sm">
          <option value="-1">Bulk Actions</option>
          <option value="trash">Public</option>
          <option value="trash">Move to Trash</option>
          <option value="trash">Delete</option>
        </select>
      </div>
      <div class="form-group">
        <button class="btn btn-default btn-sm" type="submit">Apply</button>
      </div>
    </form>
  </div>
</div>
