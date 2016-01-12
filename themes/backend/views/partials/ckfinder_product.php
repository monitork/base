<script type="text/javascript">
var button = document.getElementById( 'btnSelectImg' );
button.onclick = function() {
  CKFinder.modal( {
    chooseFiles: true,
    width: 800,
    height: 600,
    onInit: function( finder ) {
      finder.on( 'files:choose', function( evt ) {
        var file = evt.data.files.first();
        urls.push(file.getUrl());
        output_finder(urls);
      });
      finder.on( 'file:choose:resizedImage', function( evt ) {
        urls.push(evt.data.resizedUrl);
        output_finder(urls);
      } );
    }
  });
};
function output_finder(arr) {
  // body...
  console.log(arr);
  var output = document.getElementById( 'output' );
  // output.innerHTML = '<img src="'+ url +'"/>';
  var output1 = document.getElementById( 'product_image' );
  output1.value = arr;
  var html = '<ul class="image_thum">';
  jQuery.each(arr, function(index, value) {
    html += '<li><img src="'+ this +'"/><a href="javascript:void(0)" class="delete" onClick = "deleteClick(this)"></a></li>';
  });
  html +='</ul>';
  output.innerHTML = html;
}
function deleteClick(e){
  var val = $(e).prev().attr("src");
  urls.splice(urls.indexOf(val),1);
  output_finder(urls);
}
</script>
