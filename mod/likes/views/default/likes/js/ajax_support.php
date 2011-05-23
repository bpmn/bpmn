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
	$(document).ready(function(){
		lkPrepareItems();
	})
	
	function lkPrepareItems(){
		//Execute the action
		$('.river_action_links a.likes_action').unbind('click')
		$('.river_action_links a.likes_action').click(function(e) {
			e.stopPropagation();
			readyToAnnotate(this);
			return false;
		});

		//Show a lightbox
		$('.likes a.who_else').unbind('click');
		$('.likes a.who_else').click(function(e) {
			e.stopPropagation();
			showWhoElse(this);
			return false;
		});
	}

	function readyToAnnotate(oObject) {
		var refToUpdate = $(oObject).parent().attr('rel'); 
		var oContainerLikes = $(oObject).parents('.river_item').find('.' + refToUpdate);
		//var oContainerButton = $('#' + refToUpdate).parents('.river_item').find('.likes_action_container');
		oContainerButton = $(oObject).parent();
		var sUrl = "<?php echo $vars['url'] ?>mod/likes/endpoint/ping.php";
		//var sCallBack = nextToAnnotate(refToUpdate);
		//executeAction(oObject, oContainer, sUrl, sCallBack);

		var sQueryString = extractQueryString(oObject)
		var sActionFile = extractActionFile(oObject);

		oLinkButton = oContainerButton.find('a');
		//console.log(oLinkButton.html());
		//var oldColor = oLinkButton.css('color');
		//oLinkButton.css('color', '#ccc');
		oContainerButton.html("· <span class='likes_loading'>&nbsp;</span>");

//		if(oLinkButton.hasClass('.working')) {
//			console.log('si tiene');
//			return false;
//		}

		$.getJSON(sUrl + sQueryString + sActionFile, function(data){
			//oLinkButton.addClass('working');
			oContainerLikes.html(data.status);
			//oContainerLikes.append(data.button)
			oContainerButton.html(data.button);

//			console.log(data);

			lkPrepareItems();

			//oLinkButton.css('color', oldColor);
			
			//nextToAnnotate(refToUpdate);
			//console.log(data);
			//console.log(data['status']);
		});
		
	}

	function nextToAnnotate(refToUpdate){
		var oContainer = $('#' + refToUpdate).parents('.river_item').find('.likes_action_container');
		var oObject = $('a[rel='+ refToUpdate + ']');
		var sUrl = "<?php echo $vars['url'] ?>mod/likes/endpoint/likes_status.php";
		var sCallBack = lkPrepareItems;
		executeAction(oObject, oContainer, sUrl, sCallBack);
	}	

	function showWhoElse(oObject){
		oContainer = $('.lb .lightbox-content');
		//add special Class.
		$(oContainer).addClass('likes-content');
		sUrl = "<?php echo $vars['url'] ?>pg/likes/who/";
		sCallBack = showLB('.lbHome');
		executeAction(oObject, oContainer, sUrl, sCallBack);
	}

	function executeAction(oObject, oContainer, sUrl, sCallBack) {
		var sQueryString = extractQueryString(oObject)
		var sActionFile = extractActionFile(oObject);
		
		//$(oContainer).ajaxComplete(function(e, xhr, settings) {
			//Remove empty likes wrapper
			//$('.likes:empty').parent().remove();
		//});
		$(oContainer).load(sUrl + sQueryString + sActionFile, sCallBack);
	}

	function extractQueryString(oObject) {
		var queryString = '';
		if (oObject != null) {
			oObject = $(oObject);
			var linkElement = oObject.attr('href');
			var queryStringAux = linkElement.split('?');
			if (typeof queryStringAux[1] != 'undefined') {
				queryString = '?' + queryStringAux[1] + '&callback=true';
			}
		}
		return queryString;
	}
	function extractActionFile(oObject){
		var actionFile = '';
		if (oObject != null) {
			oObject = $(oObject);
			var linkElement = oObject.attr('href');
			var sQueryStringAux = linkElement.split('?');

			if (typeof sQueryStringAux[0] != 'undefined') {
				var actionAux = sQueryStringAux[0];
				actionAux = actionAux.split('/');
				if (actionAux.length > 0) {
					actionAux = actionAux[actionAux.length-1];
					actionFile = "&action_file=" + actionAux; 	
				}
			}
			return actionFile;
		}
	} 
	
	
</script>	