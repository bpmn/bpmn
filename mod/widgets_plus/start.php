<?php
/**
* Widgets Plus! - Default & Locked Widgets, Custom Widget Titles & Links
*
* @package widgets_plus
* @author John Jakubowski (Xeno Media, Inc.)
* @copyright Xeno Media, Inc. 2010
* @link http://www.xenomedia.com/
*/

function widgets_plus_init()
{ // Extend system CSS with our own styles
	extend_view('css', 'widgets_plus/css');
}

function widgets_plus_newuser($event, $object_type, $user)
{	//copy all of admin's widgets to new user
	widgets_plus_clone($user->guid);
}

function widgets_plus_pagesetup()
{	//alter any page outputs
	if (isloggedin() AND page_owner() == get_loggedin_user()->getGUID() AND in_array(get_context(), array('profile', 'dashboard')))
	{	//add clause to draggable plugin
		extend_view('metatags', 'widgets_plus/draggable');
	}
}

function widgets_plus_clone($userid, $locked = false)
{	//clone widgets from admin to user
	static $cache = null, $admin = null;
	if (is_null($admin)) $admin = ( ($temp = get_plugin_setting('widgets_plus_admin', 'widgets_plus')) ? intval($temp) : 2 );
	if ($userid == $admin) return;

	foreach (array('profile', 'dashboard') AS $context)
	{	//each location
		for ($column = 1; $column < 4; $column++)
		{	//each column
			if (!array_key_exists($colkey = "admin$context$column", $cache)) $cache[$colkey] = get_widgets($admin, $context, $column);

			foreach ($cache[$colkey] AS $widget)
			{	//load the objects
				if ($widget->locked OR !$locked)
				{	//clone if locked widget or not locked only
					$newget = clone $widget;
					$newget->set('owner_guid', $userid);
					$newget->set('container_guid', $userid);
					$newget->set('subtype', 'widget'); //bugfix
					$newget->save();
					$meta = array();
					// map existing info to new widget
					if (!array_key_exists($colkey = $widget->guid . 'priv', $cache)) $cache[$colkey] = get_all_private_settings($widget->guid);
					foreach ($cache[$colkey] AS $name => $value) $newget->set($name, $value);
					if (!array_key_exists($colkey = $widget->guid . 'meta', $cache)) $cache[$colkey] = get_metadata_for_entity($widget->guid);

					foreach ($cache[$colkey] AS $data)
					{	// dont copy existing properties
						if (!property_exists($newget, $data->name)) $meta[$data->name][] = $data->value;
					}
					// copy array meta data too
					foreach ($meta AS $name => $value) $newget->setMetaData($name, $value, '', true);
				}
			}
		}
	}
}

global $CONFIG;
register_elgg_event_handler('init', 'system', 'widgets_plus_init');
register_elgg_event_handler('create', 'user', 'widgets_plus_newuser');
register_elgg_event_handler('pagesetup', 'system', 'widgets_plus_pagesetup');
register_action('widgets/clone', false, $CONFIG->pluginspath . 'widgets_plus/actions/clone.php', true);

?>