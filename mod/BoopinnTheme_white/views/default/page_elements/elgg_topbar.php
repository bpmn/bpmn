<?php
/**
 * Elgg top toolbar
 * The standard elgg top toolbar
 *
 * @package Elgg
 * @subpackage Core
 *
 */
?>

<?php
	if (isloggedin()) {
?>

<div id="elgg_topbar">

<div id="elgg_topbar_container_left">

	<div class="toolbarlinks">
<small>
		<a href="<?php echo $vars['url']; ?>pg/dashboard/" class="pagelinks_dashboard"><?php echo elgg_echo('dashboard'); ?></a>


	</div>
		<?php

			echo elgg_view("navigation/topbar_tools");

		?>

		<div class="toolbarlinks2">
		<?php
		//allow people to extend this top menu
		echo elgg_view('elgg_topbar/extend', $vars);
		?>

		<a href="<?php echo $vars['url']; ?>pg/settings/" class="usersettings"><?php echo elgg_echo('settings'); ?></a>
</small>
			</div>





<div class="toolbarlinks2">
<small>

<?php	
			// The administration link is for admin or site admin users only
			if ($vars['user']->isAdmin()) {

		?>

<a href="<?php echo $vars['url']; ?>pg/admin/" class="usersettings"><?php echo elgg_echo("admin"); ?></a>

		<?php

				}

		?>
	</div>



</small>

</div>


<div id="elgg_topbar_container_right">
<small>
<?php echo elgg_view('output/url', array('href' => "{$vars['url']}action/logout", 'text' => elgg_echo('logout'), 'is_action' => TRUE)); ?>
</small>

</div>

</div><!-- /#elgg_topbar -->

<div class="clearfloat"></div>

<?php
	}
