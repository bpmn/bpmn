<?php
	/**
	* likes
	*
	* @author likes
	* @link http://community.elgg.org/pg/profile/pedroprez
	* @copyright (c) Keetup 2010
	* @link http://www.keetup.com/
	* @license GNU General Public License (GPL) version 2
	*/

	echo elgg_view('likes/item_action/element', array_merge(array('action_name' => 'like'), $vars));
	if (get_plugin_setting('allowdislike', 'likes') == 'yes') {
		echo elgg_view('likes/item_action/element', array_merge(array('action_name' => 'dislike'), $vars));
	}
