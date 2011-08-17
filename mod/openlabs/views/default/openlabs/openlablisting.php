<?php
	/**
	 * Elgg user display (small)
	 *
	 * @package Elggopenlabs from ElggGroups
	 *
	 * @uses $vars['entity'] The user entity
	 */

	$icon = elgg_view(
			"openlabs/icon", array(
									'entity' => $vars['entity'],
									'size' => 'small',
								)
		);

	//get the membership type
	$membership = $vars['entity']->membership;
	if ($membership == ACCESS_PUBLIC) {
		$mem = elgg_echo("openlabs:open");
	} else {
		$mem = elgg_echo("openlabs:closed");
	}
        // afficher le status de la relation avec l'openlab
        $member_type="";
        if (isloggedin()){
            if ($vars['entity']->owner_guid == get_loggedin_user()->guid)
                $member_type="owner";
            elseif ($vars['entity']->isMember(get_loggedin_user()))
                $member_type="member";
            }

	//for admins display the feature or unfeature option
	if($vars['entity']->featured_openlab == "yes"){
		$url = elgg_add_action_tokens_to_url($vars['url'] . "action/openlabs/featured?openlab_guid=" . $vars['entity']->guid . "&action_type=unfeature");
		$wording = elgg_echo("openlabs:makeunfeatured");
	}else{
		$url = elgg_add_action_tokens_to_url($vars['url'] . "action/openlabs/featured?openlab_guid=" . $vars['entity']->guid . "&action_type=feature");
		$wording = elgg_echo("openlabs:makefeatured");
	}

	$info .= "<div class=\"openlabdetails\"><p>" . $mem . " / <b>" . get_group_members($vars['entity']->guid, 10, 0, 0, true) ."</b> " . elgg_echo("openlabs:member") . "</p>";
	//if admin, show make featured option
	if(isadminloggedin())
		$info .= "<p><a href=\"{$url}\">{$wording}</a></p>";
	$info .= "</div>";
	$info .= "<p><b><a href=\"" . $vars['entity']->getUrl() . "\">" . $vars['entity']->name . "</a>         ".$member_type."</b></p>";
	$info .= "<p class=\"owner_timestamp\">" . $vars['entity']->briefdescription . "</p>";

	// num users, last activity, owner etc

	echo elgg_view_listing($icon, $info);

?>
