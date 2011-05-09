<?php
	$hidden_teams = $vars['entity']->hidden_teams;
	if (!$hidden_teams) $hidden_teams = 'no';
?>	
<p>
	<?php echo elgg_echo('teams:allowhiddenteams'); ?>
	
	<?php
		echo elgg_view('input/pulldown', array(
			'internalname' => 'params[hidden_teams]',
			'options_values' => array(
				'no' => elgg_echo('option:no'),
				'yes' => elgg_echo('option:yes')
			),
			'value' => $hidden_teams
		));
	?>
</p>