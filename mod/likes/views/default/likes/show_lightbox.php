<?php
	/**
	* likes
	*
	* @author likes
	* @link http://community.elgg.org/pg/profile/pedroprez
	* @copyright (c) Keetup 2010
	* @link http://www.keetup.com/
	* @license GNU General Public License (GPL) version 2
	*/

	/*Global lb function*/
	/*Check likes and flyer js when you modified this*/

	global $lb_function_js_loaded;
	
	if(!$lb_function_js_loaded) {
		
		$lb_function_js_loaded = true;

?>	

	<script type="text/javascript">
        // opacity
        function opacity(element, value) {
            var value_noie = value / 100;
            $(element).css('filter', 'alpha(opacity=' + value + ')');
            $(element).css('-moz-opacity', value_noie);
            $(element).css('-khtml-opacity', value_noie);
            $(element).css('opacity',value_noie);
        }   
        // center horizontally
        function centerHoriz(lo_que) {
            var x = parseFloat($(window).width()) / 2 - parseFloat($(lo_que).width()) / 2;
            var y = $(window).scrollTop() + $(window).height() / 2 - parseFloat($(lo_que).height()) / 2;
            x = x + 'px';
            y = y + 'px';
            $(lo_que).css({'left': x, 'top': y});
        }
        // center vertically
        function centerVert(lo_que) {
        	lo_que_height = $(lo_que).height();
            window_height = $(window).height();
            document_height = $(document).height();
            var y = $(window).scrollTop(); //Default value
            if (window_height > lo_que_height) {
	            y = $(window).scrollTop() + parseInt(window_height / 2) - parseInt(lo_que_height / 2);
            } else {
                //this code fix the problem of infinity scroll
	            if (y > document_height-lo_que_height) {
					y = document_height-lo_que_height;
		        }
            }            
            $(lo_que).css({'top': y});
        }
		
        // lightbox
				function showLB(lb) {
                    $('#fonLB').css('width', $(window).width() + 'px');
                    $('#fonLB').css('height', $(document).height() + 'px');
                    
                    opacity('#fonLB', 70);
                    centerHoriz(lb);
                    centerVert(lb);
                    
                    $('#fonLB').fadeIn('normal', function() {$(lb).fadeIn('normal');});
                }
                function closeLB() {
                    $('.lb').fadeOut('normal', function() {$('#fonLB').fadeOut('normal');});
                }

                function clearLBClass() {
                	$('.lb .lightbox-content').attr('class','lightbox-content');
                }                

                $(document).ready(function(){
	                $('#fonLB, .lbHome .cerrar').click(
	                    function() {	
	                        closeLB();
	                        clearLBClass();
	                        return false;
	                    }
	                );
	                $(window).scroll(
	                    function() {
	                        if($('.lb').is(':visible')) {
	                            centerVert($('.lb'));
	                        }
	                    }
	                );
                });
	</script>

<?php 
	/* lighbtox */ 
?>
	<div id="fonLB">&nbsp;</div>
	<div class="lb lbHome">
		<div class='lightbox-content'>
		</div>
	    <div class="cerrar">X</div>
	</div>
	
<?php 
	}
?>	