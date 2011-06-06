<?php
	/**
	 * Elgg teams plugin
	 *
	 * @package ElggGroups
	 */

	$user = $vars['entity'];
	//$owner = get_entity($vars['entity']->owner_guid);
	$forward_url = $user->getURL();
        $viewver=get_loggedin_user();

?>

<div class="contentWrapper">
<form action="<?php echo $vars['url']; ?>action/profile/suggest" method="post">

	<?php
	echo elgg_view('input/securitytoken');
        $offset = (int) get_input('offset');
        	$options = array(
		'relationship' => 'member',
		'relationship_guid' => $viewver->guid,
		'inverse_relationship' => false,
		'types' => 'group',
		'subtypes' => 'openlab',
		'owner_guid' => 0,
		'order_by' => '',
		'limit' => 100,
		'offset' => $offset,
		'count' => false
	);

        
	$groups_viewer = elgg_get_entities_from_relationship($options);

        if ($groups_viewer) {
            echo "<h2> OpenLabs </h2>";
            $list=array();
            foreach($groups_viewer as $list_group) {
                $list[$list_group->name]=$list_group->guid;
            }
            echo elgg_view('input/checkboxes',array('internalname' => 'group_guid', 'default'=>'','options'=>$list));

        } ?>


	<input type="hidden" name="forward_url" value="<?php echo $forward_url; ?>" />
	<input type="hidden" name="user_guid" value="<?php echo $user->guid; ?>" />
	<input type="submit" value="<?php echo elgg_echo('suggest'); ?>" />
</form>
</div>