<?php
	/**
	 * Full group profile
	 * 
	 * @package ElggGroups
	 */

	$group_guid = get_input('group_guid');
	set_context('teams');
	
	global $autofeed;
	$autofeed = true;
	
	$group = get_entity($group_guid);
	if ($group) {
		set_page_owner($group_guid);
		
		$title = $group->name;
		
		// Hide some items from closed teams when the user is not logged in.
		$view_all = true;
		
		$groupaccess = group_gatekeeper(false);

                // Fatxi modif >>>>>>
                //if (!$groupaccess)
		//	$view_all = false;
		
		
		$area2 = elgg_view_title($title);
		$area2 .= elgg_view('group/teams', array('entity' => $group, 'user' => $_SESSION['user'], 'full' => true));
		
		if ($view_all) {
			//group profile 'items' - these are not real widgets, just contents to display
			$area2 .= elgg_view('teams/profileitems',array('entity' => $group));
			
			//group members
			$area3 = elgg_view('teams/members',array('entity' => $group));
		}
		else
		{
			$area2 .= elgg_view('teams/closedmembership', array('entity' => $group, 'user' => $_SESSION['user'], 'full' => true));

		}
		
		$body = elgg_view_layout('two_column_left_sidebar', $area1, $area2, $area3);
	} else {
		$title = elgg_echo('teams:notfound');
		
		$area2 = elgg_view_title($title);
		$area2 .= elgg_view('teams/contentwrapper',array('body' => elgg_echo('teams:notfound:details')));
		
		$body = elgg_view_layout('two_column_left_sidebar', "", $area2,"");
	}
		
	// Finally draw the page
	page_draw($title, $body);
?>