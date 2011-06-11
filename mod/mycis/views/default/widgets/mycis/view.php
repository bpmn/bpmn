<div class="contentWrapper">
<?php
	if (isset($vars['entity']->param)) {
		echo "You have selected " . (int)$vars['entity']->param . " as your widget parameter";
	} else {
		echo "You have not selected a widget parameter";
	}
?>
</div>