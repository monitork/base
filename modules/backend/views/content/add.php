<h1 class="tit">
  <?php
  echo $template['title'];
  ?>
</h1>
<div class="row">
  <form class="" action="index.html" method="post">
    <div class="col-md-8">
      <div class="form-group">
        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter title here">
      </div>
      <div class="form-group">
        <textarea class="form-control" cols="80" id="editor1" name="editor1" rows="10"></textarea>
      </div>
    </div>
    <div class="col-md-4">
      <div class="panel panel-default">
        <div class="panel-heading"><h4 class="box">Public</h4> </div>
        <div class="panel-body">
          <div class="author">
            <i class="fa fa-user"></i> Author: <strong>Admin</strong>
          </div>
          <div class="date">
            <i class="fa fa-calendar"></i> Public on: <strong>Dec 21, 2015 @ 17:43</strong>
          </div>
        </div>
        <div class="panel-footer">
          <button type="button" name="button" class="btn">Move to Trash</button>
          <button type="button" name="button" class="btn btn-primary btn-sm pull-right">Public</button>
        </div>
      </div>
      <div class="panel panel-default">
        <div class="panel-heading"><h4 class="box">Categories</h4> </div>
        <div class="panel-body">
          <ul class="categories">
            <li>
              <input type="checkbox" value="1" id="category_1" name="category[]">
              <label for="category_1"> Nam</label>
              <ul class="categories">
                <li><input type="checkbox" value="4" id="category_4" name="category[]">
                  <label for="category_4"> Áo bóng chày</label>
                </li>
              </ul>
            </li>
            <li>
              <input type="checkbox" value="2" id="category_2" name="category[]">
              <label for="category_2"> Nữ</label>
              <ul class="categories">
                <li>
                  <input type="checkbox" value="5" id="category_5" name="category[]">
                  <label for="category_5"> Áo khoác</label>
                </li>
                <li>
                  <input type="checkbox" value="6" id="category_6" name="category[]">
                  <label for="category_6"> Áo sơ mi</label>
                </li>
                <li>
                  <input type="checkbox" value="7" id="category_7" name="category[]">
                  <label for="category_7"> Áo thun</label>
                </li>
              </ul>
            </li>
            <li>
              <input type="checkbox" value="3" id="category_3" name="category[]">
              <label for="category_3"> Áo cặp</label>
              <ul class="categories"></ul>
            </li>
          </ul>
        </div>
      </div>
      <div class="panel panel-default">
        <div class="panel-heading"><h4 class="box">Image feature</h4> </div>
        <div class="panel-body">
          <div class="" id="output">

          </div>
          <a href="#" id="btnSelectImg">Set feature image</a>
        </div>
      </div>
    </div>

  </form>
</div>
