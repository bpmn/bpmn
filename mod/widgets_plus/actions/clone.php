<?php
/**
* Widgets Plus! - Default & Locked Widgets, Custom Widget Titles & Links
*
* @package widgets_plus
* @author John Jakubowski (Xeno Media, Inc.)
* @copyright Xeno Media, Inc. 2010
* @link http://www.xenomedia.com/
*/

foreach (elgg_get_entities(array('type' => 'user', 'limit' => false, 'wheres' => array('guid != ' . ( ($temp = get_plugin_setting('widgets_plus_admin', 'widgets_plus')) ? intval($temp) : 2 )))) AS $user)
{	//load all users
	foreach (array('profile', 'dashboard') AS $context)
	{	//each location
		for ($column = 1; $column < 4; $column++)
		{	//each column
			foreach (get_widgets($user->guid, $context, $column) AS $widget)
			{	//load the objects
				if ($widget->locked)
				{	//remove locked widgets
					setcookie('widget' + $widget->guid, null);
					$widget->delete();
				}
			}
		}
	}
	//apply new locked widgets
	widgets_plus_clone($user->guid, true);
}

system_message(elgg_echo('widgets_plus:cloned'));
forward($_SERVER['HTTP_REFERER']);