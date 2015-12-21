<h1 class="tit">
  <?php
  echo $template['title'];
  ?>
  <a href="http://wp.dev/wp-admin/post-new.php" class="page-title-action">Add New</a>
</h1>
<ul class="subsubsub">
  <li class="all"><a href="edit.php?post_type=post" class="current">All <span class="count">(3)</span></a> |</li>
  <li class="publish"><a href="edit.php?post_status=publish&amp;post_type=post">Published <span class="count">(2)</span></a> |</li>
  <li class="draft"><a href="edit.php?post_status=draft&amp;post_type=post">Draft <span class="count">(1)</span></a></li>
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
          Categories
        </td>
        <td>
          <a href="#">Date</a>
        </td>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>
          <input type="checkbox" name="name" value="">
        </td>
        <td>
          <strong> <a href="#">Bài viết 1</a></strong>
          <div class="row_action">
            <span><a href="#">View</a> |</span>
            <span><a href="#">Edit</a> |</span>
            <span><a href="#"  class="trash">Move to Trash</a> |</span>
            <span><a href="#" class="delete">Delete</a> </span>

          </div>
        </td>
        <td>
          Admin
        </td>
        <td>
          Category 1
        </td>
        <td>
          2015/11/19 <br>
          Published
        </td>
      </tr>
      <tr>
        <td>
          <input type="checkbox" name="name" value="">
        </td>
        <td>
          <strong> <a href="#">Bài viết 2</a></strong>
          <div class="row_action">
            <span><a href="#">View</a> |</span>
            <span><a href="#">Edit</a> |</span>

            <span><a href="#"  class="trash">Move to Trash</a> |</span>
            <span><a href="#"  class="delete">Delete</a> </span>

          </div>
        </td>
        <td>
          Admin
        </td>
        <td>
          Category 2
        </td>
        <td>
          2015/11/19 <br>
          Published
        </td>
      </tr>
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
