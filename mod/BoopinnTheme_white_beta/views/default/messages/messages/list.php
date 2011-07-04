<?php
/**
 * Elgg list system messages
 * Lists system messages
 *
 * @package Elgg
 * @subpackage Core
 *
 * @uses $vars['object'] An array of system messages
 */

if (!empty($vars['object']) && is_array($vars['object'])) {

?>
<!-- used to fade out the system messages after 2 seconds -->
<script type="text/javascript">
$(document).ready(function () {
	$('.messages').animate({opacity: 1.0}, 1000);
	$('.messages').animate({opacity: 1.0}, 2000);
	$('.messages').fadeOut('slow');

	$('span.closeMessages a').click(function () {
		$(".messages").stop();
		$('.messages').fadeOut('slow');
	return false;
	});

	$('div.messages').click(function () {
		$(".messages").stop();
		$('.messages').fadeOut('slow');
	return false;
	});
});
</script>

	<div class="messages">
	<span class="closeMessages">

<a href="<?php echo $vars['url']; ?>"><img src="<?php echo $vars['url']; ?>mod/BoopinnTheme_white/_graphics/check.png" alt="close"></img></a></span>



<?php
	foreach($vars['object'] as $message) {
		echo elgg_view('messages/messages/message',array('object' => $message));
	}
?>

	</div>

<?php

}
