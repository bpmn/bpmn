<?php
/**
 * Elgg invite form wrapper
 *
 * @package ElggInviteFriends
 */

include($CONFIG->pluginspath . "oi_invitefriends/oi_invitefriends.php"); 
 
if (empty($_POST['step']))
{ 
	echo elgg_view('input/form', array(
									'action' => $vars['url'] . 'action/oi_invitefriends/invite',
									'body' => elgg_view('oi_invitefriends/formitems'),
									'method' => 'post'
									)

	);
}