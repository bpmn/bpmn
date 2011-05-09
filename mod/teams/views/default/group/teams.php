<?php 
	/**
	 * Elgg teams profile display
	 * 
	 * @package ElggGroups
	 */

	if ($vars['full']) {
		echo elgg_view("teams/teamprofile",$vars);
	} else {
		if (get_input('search_viewtype') == "gallery") {
			echo elgg_view('teams/teamgallery',$vars);
		} else {
			echo elgg_view("teams/teamlisting",$vars);
		}
	}
?>