<div id="elgg_dev_tools_footer">
	<h3>Elgg Developer Tools Logging</h3>
<?php
global $ELGG_DEV_LOG;

foreach ($ELGG_DEV_LOG as $item) {
	echo "<pre>";
	print_r($item);
	echo "</pre>";
}
?>
</div>