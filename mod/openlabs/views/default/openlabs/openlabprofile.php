<?php
	/**
	 * Elgg openlabs plugin full profile view.
	 *
	 * @package Elggopenlabs from ElggGroups
	 */

	if ($vars['full'] == true) {
		$iconsize = "large";
	} else {
		$iconsize = "medium";
	}

?>

<div id="openlabs_info_column_right"><!-- start of openlabs_info_column_right -->
	<div id="openlabs_icon_wrapper"><!-- start of openlabs_icon_wrapper -->

		<?php
			echo elgg_view(
					"openlabs/icon", array(
												'entity' => $vars['entity'],
												//'align' => "left",
												'size' => $iconsize,
											)
					);
		?>

	</div><!-- end of openlabs_icon_wrapper -->
	<div id="openlab_stats"><!-- start of openlab_stats -->
		<?php

			echo "<p><b>" . elgg_echo("openlabs:owner") . ": </b><a href=\"" . get_user($vars['entity']->owner_guid)->getURL() . "\">" . get_user($vars['entity']->owner_guid)->name . "</a></p>";

		?>
		<p><?php echo elgg_echo('openlabs:members') . ": " . $vars['entity']->getMembers(0, 0, TRUE); ?></p>
	</div><!-- end of openlab_stats -->
</div><!-- end of openlabs_info_column_right -->

<div id="openlabs_info_column_left"><!-- start of openlabs_info_column_left -->
	<?php
		if ($vars['full'] == true) {
			if (is_array($vars['config']->openlab) && sizeof($vars['config']->openlab) > 0){

				foreach($vars['config']->openlab as $shortname => $valtype) {
					if ($shortname != "name") {
						$value = $vars['entity']->$shortname;

						if (!empty($value)) {
							//This function controls the alternating class
							$even_odd = ( 'odd' != $even_odd ) ? 'odd' : 'even';
						}

						echo "<p class=\"{$even_odd}\">";
						echo "<b>";
						echo elgg_echo("openlabs:{$shortname}");
						echo ": </b>";

						$options = array(
							'value' => $vars['entity']->$shortname
						);

						if ($valtype == 'tags') {
							$options['tag_names'] = $shortname;
						}

						echo elgg_view("output/{$valtype}", $options);

						echo "</p>";
					}
				}
			}
		}
	?>
</div><!-- end of openlabs_info_column_left -->

<div id="openlabs_info_wide">

	<p class="openlabs_info_edit_buttons">

<?php
	if ($vars['entity']->canEdit())
	{

?>

		<a href="<?php echo $vars['url']; ?>pg/openlabs/edit/<?php echo $vars['entity']->getGUID(); ?>"><?php echo elgg_echo("edit"); ?></a>


<?php

	}

?>

	</p>
</div>
<div class="clearfloat"></div>