<?php

/** 
 *  openlab profile widget - this displays a user's openlabs on their profile
 **/

//the number of openlabs to display
$number = (int) $vars['entity']->num_display;
if (!$number) {
	$number = 4;
}

$options = array(
	'relationship' => 'member',
	'relationship_guid' => $vars['entity']->owner_guid,
	'types' => 'group',
        'subtype' =>'openlab', 
	'limit' => $number,
);


$openlabs = elgg_get_entities_from_relationship($options);

if ($openlabs) {

	echo "<div class=\"openlabmembershipwidget\">";

	foreach ($openlabs as $openlab) {
		$icon = elgg_view(
				"openlabs/icon", array(
				'entity' => $openlab,
				'size' => 'small',
				)
		);

		$openlab_link = $openlab->getURL();

		echo <<<___END

<div class="contentWrapper">
	$icon
	<div class="search_listing_info">
		<p>
			<span><a href="$openlab_link">$openlab->name</a></span><br />
			$openlab->briefdescription
		</p>
	</div>
	<div class="clearfloat"></div>
</div>
___END;

	}
	echo "</div>";
}
