<?php

/**
 * Elgg Riverdashboard welcome message
 * 
 * @package ElggRiverDash
 * 
 */

$name = '';
if (isloggedin()) {
	$name = get_loggedin_user()->name;
}
	 
?>


<div id="dash_wire">
<?php
	//	$area2 = elgg_view_title(elgg_echo("thewire:everyone"));
		
		//add form
		if (isloggedin()) {
			//$area2 .= elgg_view("thewire/forms/add");
			$area2 .= elgg_view("riverdashboard_wire/forms/wireadd");
		}

	//	$offset = (int)get_input('offset', 0);
	//	$area2 .= elgg_list_entities(array('types' => 'object', 'subtypes' => 'thewire', 'offset' => $offset));
	    echo elgg_view_layout("two_column_left_sidebar_maincontent_boxes", '', $area2);
?>
</div>