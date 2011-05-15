<?php 
	/**
	 * Elgg openlabs profile display
	 * 
	 * @package Elggopenlabs from ElggGroups
	 */

	if ($vars['full']) {
		echo elgg_view("openlabs/openlabprofile",$vars);
	} else {
		if (get_input('search_viewtype') == "gallery") {
			echo elgg_view('openlabs/openlabgallery',$vars); 				
		} else {
			echo elgg_view("openlabs/openlablisting",$vars);
		}
	}
?>