<?php

	$statement = $vars['statement'];
	$performed_by = $statement->getSubject();
	$object = $statement->getObject();
	
	$url = "<a href=\"{$performed_by->getURL()}\">{$performed_by->name}</a>";
	$string = sprintf(elgg_echo("openlabforum:river:posted"),$url) . " ";
	$string .= elgg_echo("openlabforum:river:annotate:create") . " | <a href=\"" . $object->getURL() . "\">" . $object->title . "</a>";
	//$string .= "<div class=\"river_content\">Title: " . $object->title . "</div>";

?>

<?php echo $string; ?>