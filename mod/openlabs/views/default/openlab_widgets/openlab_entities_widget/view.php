<?php
	/**
	 * View the widget
	 * 
	 * @package Elggopenlabs from ElggGroups
	 */

	$openlab_guid = get_input('openlab_guid');
	$limit = get_input('limit', 8);
	$offset = 0;
	
	if ($vars['entity']->limit)
		$limit = $vars['entity']->limit;
		
	$openlab_guid = $vars['entity']->openlab_guid;

	if ($openlab_guid)
	{	
		$openlab = get_entity($openlab_guid);	
		$members = $openlab->getMembers($limit, $offset);
		$count = $openlab->getMembers($limit, $offset, true);
		
		$result = list_entities_openlabs("", 0, $openlab_guid, $limit);
	}
	else
	{
		$result = elgg_echo('openlabs:widgets:entities:label:pleaseedit');
	}
	
	echo $result;
?>