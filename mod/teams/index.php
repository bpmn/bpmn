<?php
	/**
	 * Elgg team plugin
	 *
	 * @package ElggGroups
	 */

	require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");

        $limit = get_input("limit", 10);
	$offset = get_input("offset", 0);
	$tag = get_input("tag");
	$filter = get_input("filter");

        if (!$filter) {
		// owner team is the default
		$filter = "owned";
	}

        	// Get objects
	$context = get_context();

		switch($filter){
			case "owned":
			//set_context('search');
                        $objects = elgg_list_entities(array('types' => 'group','subtypes' => 'teams','owner_guids' => page_owner(), 'limit' => $limit, 'offset' => $offset, 'full_view' => false));
                        set_context('team');
                        break;

			case "member":
                        //set_context('search');
                        // offset is grabbed in the list_entities_from_relationship() function
                        $objects = list_entities_from_relationship('member',page_owner(),false,'group','teams',0, $limit,false, false);
			set_context($context);
                        break;
		
		}


	


	set_context($context);

	$title = sprintf(elgg_echo("teams:owner"),page_owner_entity()->name);
	$area2 = elgg_view_title($title);
	$area2 .= elgg_view('teams/contentwrapper', array('body' => elgg_view('teams/teams_sort_menu', array("count" => $team_count, "filter" => $filter)) . $objects));
	$body = elgg_view_layout('two_column_left_sidebar',$area1, $area2);
       
	// Finally draw the page
	page_draw($title, $body);



?>