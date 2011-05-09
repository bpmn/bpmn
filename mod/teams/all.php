<?php
	/**
	 * Elgg teams plugin
	 * 
	 * @package ElggGroups
	 */

	require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");

	$limit = get_input("limit", 10);
	$offset = get_input("offset", 0);
	$tag = get_input("tag");
	$filter = get_input("filter");
	if (!$filter) {
		// active discussions is the default
		$filter = "active";
	}
	
	
	// Get objects
	$context = get_context();
	
	set_context('search');
	if ($tag != "") {
		$filter = 'search';
		// teams plugin saves tags as "interests" - see teams_fields_setup() in start.php
		$params = array(
			'metadata_name' => 'interests',
			'metadata_value' => $tag,
			'types' => 'group',
			'limit' => $limit,
			'full_view' => FALSE,
		);
		$objects = elgg_list_entities_from_metadata($params);
	} else {
		switch($filter){
			case "newest":
			$objects = elgg_list_entities(array('types' => 'group', 'owner_guid' => 0, 'limit' => $limit, 'offset' => $offset, 'full_view' => false));
			break;
			case "pop":
			$objects = list_entities_by_relationship_count('member', true, "", "", 0, $limit, false);
			break;
			case "active":
			case 'default':
			$objects = list_entities_from_annotations("object", "groupforumtopic", "group_topic_post", "", 40, 0, 0, false, true);
			break;
		}
	}
	
	//get a group count
	$group_count = elgg_get_entities(array('types' => 'group', 'limit' => 10, 'count' => TRUE));
		
	//find teams
	$area1 = elgg_view("teams/find");
	
	//menu options
	$area1 .= elgg_view("teams/side_menu");
	
	//featured teams
	$featured_teams = elgg_get_entities_from_metadata(array('metadata_name' => 'featured_group', 'metadata_value' => 'yes', 'types' => 'group', 'limit' => 10));
	$area1 .= elgg_view("teams/featured", array("featured" => $featured_teams));
		
		
	set_context($context);
	
	$title = sprintf(elgg_echo("teams:all"),page_owner_entity()->name);
	$area2 = elgg_view_title($title);
	$area2 .= elgg_view('teams/contentwrapper', array('body' => elgg_view("teams/group_sort_menu", array("count" => $group_count, "filter" => $filter)) . $objects));
	$body = elgg_view_layout('sidebar_boxes',$area1, $area2);
	
	// Finally draw the page
	page_draw($title, $body);



?>