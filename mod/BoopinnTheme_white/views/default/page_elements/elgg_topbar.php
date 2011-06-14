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
<div class="toolbarlinks3">
<?php
$contents = "";

// is there a page owner?
$owner = get_loggedin_user() ; 
if ($owner instanceof elggentity) {
	if ($owner instanceof elgguser ) {
		$info = $owner->name;
	}
	$display =  $info;
	$contents = $display;
}

echo $contents;
?>

</div>

<div class="toolbarlinks4">
<?php
$contents = "";

// is there a page owner?
$owner = page_owner_entity();
if ($owner instanceof elggentity) {
	$icon = elgg_view("profile/icon",array('entity' => $owner, 'size' => 'tiny'));
	if ($owner instanceof elgguser || $owner instanceof elgggroup) {
		$info = '<a href="' . $owner->geturl() . '">' . $owner->name . '</a>';
	}
	$display = "<div id=\"owner_block_icon\">" . $icon . "</div>";

	$contents .= $display;
}

echo $contents;
?>

</div>


	<div class="toolbarlinks">
		<a href="<?php echo $vars['url']; ?>pg/dashboard/" class="pagelinks"><?php echo elgg_echo('dashboard'); ?></a>
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

			</div>





<div class="toolbarlinks2">
<?php	
			// The administration link is for admin or site admin users only
			if ($vars['user']->isAdmin()) {

		?>

<a href="<?php echo $vars['url']; ?>pg/admin/" class="usersettings"><?php echo elgg_echo("admin"); ?></a>

		<?php

				}

		?>
	</div>





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
