<?php
	// Load Elgg engine will not include plugins
	require_once(dirname(dirname(dirname(dirname(__FILE__)))) . "/engine/start.php");
	
	//Get the data
	$item_id = get_input('river_item');
	$item = new StdClass();
	$item->id = $item_id; 
	$action_name = get_input('action_name');
	$action_file = get_input('action_file');
	$entity_guid = get_input('guid');
	$entity = get_entity($entity_guid);
	
	$callback = true;
	
	$last_action = 'annotate';
	if ($action_file == 'unannotate') {
		$last_action = 'unannotate';
	} 
	
	set_input('like_action', true);
	echo elgg_view("likes/item_action", array(
		'entity' => $entity,
		'item' => $item,
	 	'callback' => $callback,
		'last_action' => $last_action,
	));
	