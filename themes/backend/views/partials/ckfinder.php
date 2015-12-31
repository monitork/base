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
        var output = document.getElementById( 'output' );
        // output.innerHTML = 'Selected: ' + file.get( 'name' ) + '<br>URL: ' + file.getUrl();
        output.innerHTML = '<img src="'+ file.getUrl() +'"/>';
      } );
      finder.on( 'file:choose:resizedImage', function( evt ) {
        var output = document.getElementById( 'output' );
        // output.innerHTML = 'Selected resized image: ' + evt.data.file.get( 'name' ) + '<br>url: ' + evt.data.resizedUrl;
        output.innerHTML = '<img src="'+evt.data.resizedUrl +'"/>';
      } );
    }
  } );
};
</script>
