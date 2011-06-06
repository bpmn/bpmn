<?php
/**
* Widgets Plus! - Default & Locked Widgets, Custom Widget Titles & Links
*
* @package widgets_plus
* @author John Jakubowski (Xeno Media, Inc.)
* @copyright Xeno Media, Inc. 2010
* @link http://www.xenomedia.com/
*/

	$admin = $vars['entity']->widgets_plus_admin;
	if (!$admin) $admin = 2;
?>
<p>
	<?php
	echo elgg_echo('widgets_plus:admin') . $_SESSION['user']->guid . elgg_view('input/text', array(
		'internalname' => 'params[widgets_plus_admin]',
		'value' => $admin
	));
	?>
</p>
<p>
	<?php
	echo elgg_echo('widgets_plus:perms') . elgg_view('input/pulldown', array(
		'internalname' => 'params[widgets_plus_perms]',
		'value' => $vars['entity']->widgets_plus_perms,
		'options_values' => array(elgg_echo('admin'), elgg_echo('members'))
	));
	?>
</p>
