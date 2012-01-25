<?php
/**
 * Elgg Tracker plugin
 * @license: GPL v 2.
 * @author slyhne
 * @copyright Zurf.dk
 * @link http://zurf.dk/elgg
 */

	$ip_string = elgg_echo('tracker:search:ip');
	$ip_info = elgg_echo('tracker:search:info');

	// Get IP address
	$ip_address = get_input('ip');

	// Get URL for IP information
	$tracker_url = sprintf(get_plugin_setting('tracker_url', 'tracker'), $ip_address);

	// Create tracker link
	$tracker_link = "<a href=\"$tracker_url\" target=\"_blank\" class=\"tracker_button\" />$ip_info</a>";

?>

<div class="sidebarBox">

<h3><?php echo elgg_echo('tracker:searchip'); ?></h3>
<form id="trackersearchform" action="<?php echo $vars['url']; ?>mod/tracker/index.php?" method="get">
	<input type="text" name="ip" value="<?php echo $ip_address; ?>" maxlength="15" size="15" />
	<input type="submit" value="<?php echo elgg_echo('search'); ?>" />
</form>
<br>
<?php
	echo $tracker_link;
?>
</div>
