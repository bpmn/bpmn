<?php
	/**
	 * Elgg openlabs plugin full profile view (for a closed openlab you haven't joined).
	 * 
	 * @package Elggopenlabs from ElggGroups
	 */

?>
<div id="openlabs_closed_membership">
	<p>
<?php
echo elgg_echo('openlabs:closedopenlab');
if (isloggedin()) {
	echo ' ' . elgg_echo('openlabs:closedopenlab:request');
}
?>
	</p>
</div>