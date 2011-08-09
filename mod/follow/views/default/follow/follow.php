<!--div class="contentWrapper"-->

<?php

	if (!empty($vars['follow']) && is_array($vars['follow'])) {
		$user = get_loggedin_user();
		foreach($vars['follow'] as $entity)
			if ($entity instanceof ElggGroup || $entity instanceof ElggUser) {

?>
	<div class="reportedcontent_content active_report">
		<div class="teams_membershiprequest_buttons">
			<?php
				echo "<div class=\"member_icon\"><a href=\"" . $entity->getURL() . "\">";
				echo elgg_view("profile/icon", array(
					'entity' => $entity,
					'size' => 'small',
					'override' => 'true'
				));
				echo "</a></div>{$entity->name}<br />";

				echo str_replace('<a', '<a class="delete_report_button" ', elgg_view('output/confirmlink',array(
					'href' => $vars['url'] . "action/follow/stop_follow?user_guid={$user->getGUID()}&entity_guid={$entity->getGUID()}",
					'confirm' => sprintf(elgg_echo('follow:remove'),$entity->name),
					'text' => elgg_echo('follow:stop'),
				)));
			
			?>
			
			<br /><br />
		</div>
	</div>
<?php

                        }

	} //else {

	//	echo "<p>" . sprintf(elgg_echo('follow:none'),$vars['type_name']) . "</p>";

	//}

?>
<!--/div-->