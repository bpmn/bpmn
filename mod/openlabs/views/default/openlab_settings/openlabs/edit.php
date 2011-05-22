<?php
	$hidden_openlabs = $vars['entity']->hidden_openlabs;
	if (!$hidden_openlabs) $hidden_openlabs = 'no';
?>	
<p>
	<?php echo elgg_echo('openlabs:allowhiddenopenlabs'); ?>
	
	<?php
		echo elgg_view('input/pulldown', array(
			'internalname' => 'params[hidden_openlabs]',
			'options_values' => array(
				'no' => elgg_echo('option:no'),
				'yes' => elgg_echo('option:yes')
			),
			'value' => $hidden_openlabs
		));
	?>
</p>