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
		$filter = "active";
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
                        'subtypes' => 'openlab' ,
			'limit' => $limit,
			'full_view' => FALSE,
		);
		$objects = elgg_list_entities_from_metadata($params);
	} else {
		switch($filter){
			case "newest":
			$objects = elgg_list_entities(array('types' => 'group', 'subtypes' => 'openlab' , 'owner_guid' => 0, 'limit' => $limit, 'offset' => $offset, 'full_view' => false));
			break;
			case "pop":
			$objects = list_entities_by_relationship_count('member', true, "", "", 0, $limit, false);
			break;
			case "active":
			case 'default':
			$objects = list_entities_from_annotations("object", "openlabforumtopic", "openlab_topic_post", "", 40, 0, 0, false, true);
			break;
		}
	}
	
	//get a openlab count
	$openlab_count = elgg_get_entities(array('types' => 'group', 'subtypes' => 'openlab' , 'limit' => 10, 'count' => TRUE));
		
	//find openlabs
	$area1 = elgg_view("openlabs/find");
	
	//menu options
	$area1 .= elgg_view("openlabs/side_menu");
	
	//featured openlabs
	$featured_openlabs = elgg_get_entities_from_metadata(array('metadata_name' => 'featured_openlab', 'metadata_value' => 'yes', 'types' => 'group',  'subtypes' => 'openlab' , 'limit' => 10));
	$area1 .= elgg_view("openlabs/featured", array("featured" => $featured_openlabs));
		
		
	set_context($context);
	
	$title = sprintf(elgg_echo("openlabs:all"),page_owner_entity()->name);
	$area2 = elgg_view_title($title);
	$area2 .= elgg_view('openlabs/contentwrapper', array('body' => elgg_view("openlabs/openlab_sort_menu", array("count" => $openlab_count, "filter" => $filter)) . $objects));
	$body = elgg_view_layout('sidebar_boxes',$area1, $area2);
	
	// Finally draw the page
	page_draw($title, $body);



?>