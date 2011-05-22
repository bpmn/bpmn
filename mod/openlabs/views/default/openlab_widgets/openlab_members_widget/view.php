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
		
		$result = elgg_view_entity_list($members, $count, $offset, $limit, false, false, false);
	}
	else
	{
		$result = elgg_echo('openlabs:widgets:members:label:pleaseedit');
	}
	
	echo $result;
?>