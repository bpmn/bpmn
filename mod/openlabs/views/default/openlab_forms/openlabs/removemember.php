<?php
	/**
	 * Elgg openlabs plugin
	 * 
	 * @package Elggopenlabs from ElggGroups
	 */

	$openlab = $vars['entity'];
	$owner = get_entity($vars['entity']->owner_guid);
	$forward_url = $openlab->getURL();
	
	
?>
<div class="contentWrapper">
<form action="<?php echo $vars['url']; ?>action/openlabs/removemember" method="post">
	<?php
        
	echo elgg_view('input/securitytoken');
        // getMembers($limit = 10, $offset = 0, $count = false) 
        $all_members = $openlab-> getMembers(ELGG_ENTITIES_NO_VALUE,  0,  false); 
	if ($all_members) {
		echo elgg_view('friends/picker',array('entities' => $all_members, 'internalname' => 'user_guid', 'highlight' => 'all'));
	}
	
	?>
	<input type="hidden" name="forward_url" value="<?php echo $forward_url; ?>" />
	<input type="hidden" name="openlab_guid" value="<?php echo $openlab->guid; ?>" />
	<input type="submit" value="<?php echo elgg_echo('openlabs:remove'); ?>" />
</form>
</div>
