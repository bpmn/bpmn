<?php
	/**
	 * View the widget
	 * 
	 * @package ElggGroups
	 */

	$group_guid = get_input('group_guid');
	$limit = get_input('limit', 8);
	$offset = 0;
	
	if ($vars['entity']->limit)
		$limit = $vars['entity']->limit;
		
	$group_guid = $vars['entity']->group_guid;

	if ($group_guid)
	{	
		$group = get_entity($group_guid);	
		$members = $group->getMembers($limit, $offset);
		$count = $group->getMembers($limit, $offset, true);
		
		$result = list_entities_groups("", 0, $group_guid, $limit);
	}
	else
	{
		$result = elgg_echo('teams:widgets:entities:label:pleaseedit');
	}
	
	echo $result;
?>