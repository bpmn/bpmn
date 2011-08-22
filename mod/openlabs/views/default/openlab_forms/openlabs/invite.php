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
<form action="<?php echo $vars['url']; ?>action/openlabs/invite" method="post">
	<?php
        
	echo elgg_view('input/securitytoken');

                $all_users = elgg_get_entities(array( type => 'user' ,  'limit' => ELGG_ENTITIES_NO_VALUE));

	if ($all_users) {
		echo elgg_view('friends/picker',array('entities' => $all_users, 'internalname' => 'user_guid', 'highlight' => 'all'));
	}
	
	?>
	<input type="hidden" name="forward_url" value="<?php echo $forward_url; ?>" />
	<input type="hidden" name="openlab_guid" value="<?php echo $openlab->guid; ?>" />
	<input type="submit" value="<?php echo elgg_echo('invite'); ?>" />
</form>
</div>
