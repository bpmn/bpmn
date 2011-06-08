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
?>	
	<script type="text/javascript">
        // opacity
        function lbOpacity(element, value) {
            var value_noie = value / 100;
            $(element).css('filter', 'alpha(opacity=' + value + ')');
            $(element).css('-moz-opacity', value_noie);
            $(element).css('-khtml-opacity', value_noie);
            $(element).css('opacity',value_noie);
        }   
        // center horizontally
        function lbCenterHoriz(lo_que) {
            var x = parseFloat($(window).width()) / 2 - parseFloat($(lo_que).width()) / 2;
            var y = $(window).scrollTop() + $(window).height() / 2 - parseFloat($(lo_que).height()) / 2;
            x = x + 'px';
            y = y + 'px';
            $(lo_que).css({'left': x, 'top': y});
        }
        // center vertically
        function lbCenterVert(lo_que) {
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
		function lbShow(lb) {
        	$('#likes_lbBack').css('width', $(window).width() + 'px');
            $('#likes_lbBack').css('height', $(document).height() + 'px');

            lbOpacity('#likes_lbBack', 70);
            lbCenterHoriz(lb);
			lbCenterVert(lb);
                    
			$('#likes_lbBack').fadeIn('normal', function() {$(lb).fadeIn('normal');});
		}

        function lbClose() {
        	$('#likes_lb').fadeOut('normal', function() {$('#likes_lbBack').fadeOut('normal');});
		}

        function lbClearClass() {
        	$('#likes_lb .lbContent').attr('class','lbContent');
		}

        jQuery(document).ready(function() {
			//lbShow('.lbParticular');
			lbShow('#likes_lb');

	        $('#likes_lbBack, #likes_lb .lbCerrar').click(function() {	
	        	lbClose();
	            lbClearClass();
	            return false;
			});
	
			$(window).scroll(function() {
				if($('#likes_lb').is(':visible')) {
					lbCenterVert($('#likes_lb'));
				}
			});	
        });

	</script>