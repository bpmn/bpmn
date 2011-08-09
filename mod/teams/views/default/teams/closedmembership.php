<?php
	/**
	 * Elgg teams plugin full profile view (for a closed teams you haven't joined).
	 * 
	 * @package Elggteamss
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