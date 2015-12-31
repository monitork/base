<?php if ($message): ?>
  <div class="alert alert-info alert_c">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <?php echo $message; ?>
    <script type="text/javascript">
    show_alert();
    </script>
  </div>
<?php endif ?>
<h1 class="tit">
  <?php
  echo $template['title'];
  ?>
</h1>
<div class="row">
  <?php echo form_open(current_url(),array('class'=>'')) ?>
  <div class="col-md-8">
    <div class="form-group">
      <?php echo form_input($title);?>
    </div>
    <div class="form-group">
      <?php echo form_textarea($content)?>
    </div>
  </div>
  <div class="col-md-4">
    <div class="panel panel-default panel_activity">
      <div class="panel-heading"><h4 class="box">Public</h4> </div>
      <div class="panel-body">
        <ul>
          <li>
            <div class="author">
              <i class="fa fa-user"></i> Author: <strong><?php echo $this->session->userdata('fireant_admin_ss')['name'];?></strong>
            </div>
          </li>
          <li>
            <div class="status">
              <i class="fa fa-rocket"></i> Status: <strong><span>Publish</span>  <a href="#" onclick="show_form(this);">Edit</a></strong>
            </div>
            <div class="status_form form-inline hidden">
              <div class="form-group">
                <?php $status = unserialize(POST_STATUS);
                echo form_dropdown('post_status',$status,'publish','class="form-control input-sm b_status" data = "publish" id = "post_status"');
                ?>
              </div>
              <div class="form-group"><button type="button" name="button" class="btn btn-sm btn-default" onclick="hide_form_status(this);">OK</button></div>
              <div class="form-group"><a href="#" class="btn" onclick="cancel_status(this);">Cancel</a></div>
            </div>
          </li>
          <li>
            <?php $datepubic = time();?>
            <div class="date">
              <i class="fa fa-calendar"></i> Public on:
              <strong>
                <span><?php echo date('M d, Y @ H:s',$datepubic);?> </span>
                <a href="#" onclick="show_form(this);">Edit</a>
              </strong>
            </div>
            <div class="date_form  form-inline hidden">
              <div class="form-group">
                <?php
                $month = array(
                  'Jan' =>'Jan',
                  'Feb'=>'Feb',
                  'Mar'=>'Mar',
                  'Apr'=>'Apr',
                  'May'=>'May',
                  'Jun'=>'Jun',
                  'Jul'=>'Jul',
                  'Aug'=>'Aug',
                  'Sep'=>'Sep',
                  'Oct'=>'Oct',
                  'Nov'=>'Nov',
                  'Dec'=>'Dec'
                );
                echo form_dropdown('date[month]',$month,date('M',$datepubic),'class="form-control input-sm b_month" id="date_month" data="'.date('M',$datepubic).'"')?>
              </div>
              <div class="form-group">
                <?php echo form_input('date[day]',date('d',$datepubic),'class="input-sm form-control b_date" id="date_day" data="'.date('d',$datepubic).'"');?>
              </div>,
              <div class="form-group">
                <?php echo form_input('date[year]',date('Y',$datepubic),'class="input-sm form-control b_year" id="date_year" data="'.date('Y',$datepubic).'"');?>
              </div> @
              <div class="form-group">
                <?php echo form_input('date[hour]',date('H',$datepubic),'class="input-sm form-control b_hour" id="date_hour" data="'.date('H',$datepubic).'"');?>
              </div> :
              <div class="form-group">
                <?php echo form_input('date[minute]',date('s',$datepubic),'class="input-sm form-control b_minute" id="date_minute"  data="'.date('s',$datepubic).'"');?>
              </div>
              <div class="form-group">
                <button type="button" name="button" class="btn btn-sm btn-default" onclick="hide_form_date(this);">OK</button>
              </div>
              <div class="form-group">
                <a href="#" class="btn" onclick="cancel_date(this);">Cancel</a>
              </div>
            </div>
          </li>
        </ul>
      </div>
      <div class="panel-footer">
        <?php echo form_hidden('uid', $this->session->userdata('fireant_admin_ss')['id']); ?>
        <?php echo form_submit('submit','Move to Trash','class="btn-sm btn"');?>
        <?php echo form_submit('submit','Save','class="btn btn-primary btn-sm pull-right btn-sm"');?>
      </div>
    </div>
  </div>
  <?php echo form_close();?>
</div>
<?php echo $template['partials']['ckeditor']; ?>
