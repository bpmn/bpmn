<?php
	/**
	 * Full openlab profile
	 * 
	 * @package Elggopenlabs from ElggGroups
	 */

	$openlab_guid = get_input('openlab_guid');
	set_context('openlabs');
	
	global $autofeed;
	$autofeed = true;
	
	$openlab = get_entity($openlab_guid);
	if ($openlab) {
		set_page_owner($openlab_guid);
		
		$title = $openlab->name;
		
		// Hide some items from closed openlabs when the user is not logged in.
		$view_all = true;
		
		$openlabaccess = group_gatekeeper(false);

                //modif Fatxi description openlab are public
                //if (!$openlabaccess)
		//	$view_all = false;
		
		
		$area2 = elgg_view_title($title);
		$area2 .= elgg_view('openlab/openlab', array('entity' => $openlab, 'user' => $_SESSION['user'], 'full' => true));
		
		if ($view_all) {
			//openlab profile 'items' - these are not real widgets, just contents to display
			$area2 .= elgg_view('openlabs/profileitems',array('entity' => $openlab));
			
			//openlab members
			$area3 = elgg_view('openlabs/members',array('entity' => $openlab));
		}
		else
		{
			$area2 .= elgg_view('openlabs/closedmembership', array('entity' => $openlab, 'user' => $_SESSION['user'], 'full' => true));

		}
		
		$body = elgg_view_layout('two_column_left_sidebar', $area1, $area2, $area3);
	} else {
		$title = elgg_echo('openlabs:notfound');
		
		$area2 = elgg_view_title($title);
		$area2 .= elgg_view('openlabs/contentwrapper',array('body' => elgg_echo('openlabs:notfound:details')));
		
		$body = elgg_view_layout('two_column_left_sidebar', "", $area2,"");
	}
		
	// Finally draw the page
	page_draw($title, $body);
?>