<?php
/**
* Widgets Plus! - Default & Locked Widgets, Custom Widget Titles & Links
*
* @package widgets_plus
* @author John Jakubowski (Xeno Media, Inc.)
* @copyright Xeno Media, Inc. 2010
* @link http://www.xenomedia.com/
*/
?>

<script type="text/javascript">
$(document).ready(function()
{	//override dragging for locked widgets if draggable is enabled
	var $cols = $('#widgets_left, #widgets_middle, #widgets_right');
	if ($cols.length && $cols.sortable) $cols.sortable('option', 'cancel', $cols.sortable('option', 'cancel') + ', .collapsable_box_locked');
});
</script>