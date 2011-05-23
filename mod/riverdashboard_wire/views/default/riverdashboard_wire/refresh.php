<script type="text/javascript">
var autorefreshrate = (int)get_plugin_setting('refresh', 'riverdashboard_wire');

var navup=0
var x
var t
var mousx=0
var mousy=0
var internalx
var internaly
var refreshId = setInterval(function()
{ 
$(document).ready(function(){
	
	
  $().mousemove(function(e){
     internalx = e.pageX
	 internaly = e.pageY
 
  });
});
if (mousx != internalx || mousy != internaly) {
	

     mousx = internalx
	 mousy = internaly
	


$('#river_container').load('<?php echo $CONFIG->wwwroot; ?>mod/riverdashboard_wire/index.php?callback=true&display=' + $('input#display').val() + '&content=' + $('select#content').val() + '&offset=' + navup);
}

}, autorefreshrate*1000);

function navigationback(){	
x = window.document.getElementById("content").value;	
navup = navup + 20;
$('#river_container').load('<?php echo $CONFIG->wwwroot; ?>mod/riverdashboard_wire/index.php?callback=true&display='+$('input#display').val() + '&content=' + $('select#content').val()+'&offset='+navup)
}
	
function navigationforward(){
x=window.document.getElementById("content").value;
	if (navup >= 20) {
		navup = navup - 20;
		$('#river_container').load('<?php echo $CONFIG->wwwroot; ?>mod/riverdashboard_wire/index.php?callback=true&display='+$('input#display').val() + '&content=' + $('select#content').val()+'&offset='+navup)
		}
}

function dashfilter (){
$('#river_container').load('<?php echo $CONFIG->wwwroot; ?>mod/riverdashboard_wire/index.php?callback=true&display='+$('input#display').val() + '&content=' + $('select#content').val())
navup=0;
}

function navreset (){navup=0;}

</script>