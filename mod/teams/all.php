<?php
	/**
	 * Elgg openlabs plugin
	 * 
	 * @package Elggopenlabs from ElggGroups
	 */

	require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");

	$limit = get_input("limit", 10);
	$offset = get_input("offset", 0);
	$tag = get_input("tag");
	$filter = get_input("filter");
	if (!$filter) {
		// active discussions is the default
		$filter = "newest";
	}
	
	
	// Get objects
	$context = get_context();
	
	set_context('search');
	if ($tag != "") {
		$filter = 'search';
		// openlabs plugin saves tags as "interests" - see openlabs_fields_setup() in start.php
		$params = array(
			'metadata_name' => 'interests',
			'metadata_value' => $tag,
			'types' => 'group',
                        'subtypes' => 'teams' ,
			'limit' => $limit,
			'full_view' => FALSE,
		);
		$objects = elgg_list_entities_from_metadata($params);
	} else {
		switch($filter){

			case "newest":
			case 'default':
                        $objects = elgg_list_entities(array('types' => 'group', 'subtypes' => 'teams' , 'owner_guid' => 0, 'limit' => $limit, 'offset' => $offset, 'full_view' => false));
			break;
		}
	}
	
	//get a openlab count
	$teams_count = elgg_get_entities(array('types' => 'group', 'subtypes' => 'teams' , 'limit' => 10, 'count' => TRUE));
		
	//find teams
	$area1 = elgg_view("teams/find");
	
	//menu options
	$area1 .= elgg_view("teams/side_menu");
	
	//featured teams
	$featured_teams = elgg_get_entities_from_metadata(array('metadata_name' => 'featured_group', 'metadata_value' => 'yes', 'types' => 'group',  'subtypes' => 'teams' , 'limit' => 10));
	$area1 .= elgg_view("openlabs/featured", array("featured" => $featured_teams));
		
		
	set_context($context);
	
	$title = sprintf(elgg_echo("teams:all"),page_owner_entity()->name);
	$area2 = elgg_view_title($title);
	$area2 .= elgg_view('teams/contentwrapper', array('body' => elgg_view("teams/teams_sort_menu", array("count" => $teams_count, "filter" => $filter)) . $objects));
	$body = elgg_view_layout('sidebar_boxes',$area1, $area2);
	
	// Finally draw the page
	page_draw($title, $body);



?>