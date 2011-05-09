<?php
	/**
	 * Elgg teams plugin full profile view (for a closed group you haven't joined).
	 * 
	 * @package ElggGroups
	 */

?>
<div id="teams_closed_membership">
	<p>
<?php
echo elgg_echo('teams:closedgroup');
if (isloggedin()) {
	echo ' ' . elgg_echo('teams:closedgroup:request');
}
?>
	</p>
</div>