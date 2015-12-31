function check_all(e) {
  if (e.checked) { // check select status
    $('.check_item').each(function () { //loop through each checkbox
      this.checked = true;  //select all checkboxes with class "checkbox1"
    });
  } else {
    $('.check_item').each(function () { //loop through each checkbox
      this.checked = false; //deselect all checkboxes with class "checkbox1"
    });
  }
}
function show_form(e) {
  $(e).hide();
  $(e).parent().parent().next().removeClass('hidden');
}
// status
function hide_form_status(e,value = '') {
  $(e).parent().parent().addClass('hidden');
  $(e).parent().parent().prev().find('a'). show();
  if(!value){
    value = $('#post_status').val();
  }
  $(e).parent().parent().prev().find('span').html(value);
}
function cancel_status(e){
  var value = $('#post_status').attr("data");
  $('#post_status').val(value);
  hide_form_status(e,value);
}
// Date
function hide_form_date(e,value = '') {
  if(!value){
    var date_month = $('#date_month').val();
    var date_day = $('#date_day').val();
    var date_year =$('#date_year').val();
    var date_hour = $('#date_hour').val();
    var date_minute = $('#date_minute').val();
    if(date_day > 31 || date_day < 0 || date_hour>24 || date_hour< 0 ||date_minute>60 || date_minute <0 ){
      $(e).parent().parent().addClass('has-error');
      return false;
    }
    value = date_month+ ' '+date_day+', '+date_year+' @ '+date_hour+':'+ date_minute;
  }
  $(e).parent().parent().removeClass('has-error');
  $(e).parent().parent().addClass('hidden');
  $(e).parent().parent().prev().find('a'). show();
  $(e).parent().parent().prev().find('span').html(value);
}
function cancel_date(e) {
  // get data form
  var date_month = $('#date_month').attr("data");
  var date_year = $('#date_year').attr("data");
  var date_day = $('#date_day').attr("data");
  var date_hour = $('#date_hour').attr("data");
  var date_minute = $('#date_minute').attr("data");
  var value = date_month + ' ' + date_day +', ' + date_year + ' @ ' +  date_hour + ':' + date_minute;
  // reset data form
  $('#date_month').val(date_month);
  $('#date_day').val(date_day);
  $('#date_year').val(date_year);
  $('#date_hour').val(date_hour);
  $('#date_minute').val(date_minute);
  // Hide form
  hide_form_date(e,value);
}
function show_alert(){
  $(".alert").fadeIn(500);
  setTimeout("$('.alert').fadeOut(300);",5000)
}
