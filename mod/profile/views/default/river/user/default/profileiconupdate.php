<?php

	$performed_by = get_entity($vars['item']->subject_guid); // $statement->getSubject();
	//$string = "<div class=\"river_content_display\">";
	$string = elgg_view("profile/icon",array('entity' => $performed_by, 'size' => 'tiny', 'override' => 'true'));
	//$string .= "</div>";
	$url = "<a href=\"{$performed_by->getURL()}\">{$performed_by->name}</a>";
	$string .= sprintf(elgg_echo("profile:river:iconupdate"),$url);

?>

<?php echo $string; ?>