<?php

	/**
	 * Elgg profile icon hover over: passive links
	 * 
	 * @package ElggProfile
	 * 
	 * @uses $vars['entity'] The user entity. If none specified, the current user is assumed. 
	 */

?>
	

	<p class="user_menu_profile">
		<a href="<?php echo $vars['url']?>pg/profile/<?php echo $vars['entity']->username; ?>/invite/"><?php echo sprintf(elgg_echo("profile:invite"),$vars['entity']->name); ?></a>
	</p>

	<p class="user_menu_profile">
		<a href="<?php echo $vars['url']?>pg/profile/<?php echo $vars['entity']->username; ?>/suggest/"><?php echo sprintf(elgg_echo("profile:suggest"),$vars['entity']->name); ?></a>
	</p>
