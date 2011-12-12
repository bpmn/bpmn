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
		$filter = "all";
	}

        	// Get objects
	$context = get_context();
        set_context($context);
		switch($filter){
			case "owned":
			
                        $objects = elgg_list_entities(array('types' => 'group','subtypes' => 'teams','owner_guids' => page_owner(), 'limit' => $limit, 'offset' => $offset, 'full_view' => false));
                        //get a group count
                        $team_count = elgg_get_entities(array('types' => 'group','subtypes' => 'teams','owner_guids' => page_owner(),  'count' => TRUE));
                        
                        break;

			case "all":
                        //set_context('search');
                        // offset is grabbed in the list_entities_from_relationship() function
                        $objects = list_entities_from_relationship('member',page_owner(),false,'group','teams',0, $limit,false, false);
			$team_count = elgg_get_entities_from_relationship(array('relationship'=>'member','relationship_guid'=>page_owner(),'types'=>'group','subtypes'=>'teams','count'=>TRUE));
                        
                        break;
		
		}


	


        set_context($context);

	$title = sprintf(elgg_echo("teams:all"),page_owner_entity()->name);
	$area2 = elgg_view_title($title);
	$area2 .= elgg_view('teams/contentwrapper', array('body' => elgg_view('teams/teams_sort_menu', array("count" => $team_count, "filter" => $filter)) . $objects));
	$body = elgg_view_layout('two_column_left_sidebar',$area1, $area2);

	// Finally draw the page
	page_draw($title, $body);

?>