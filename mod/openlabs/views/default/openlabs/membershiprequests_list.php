<?php
	/**
	 * Team RequestNotifications detailed view
	 *
	 * @package requestnotifications
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Adolfo Mazorra
	 * @copyright Adolfo Mazorra 2009
	 * @link http://elgg.org/
	 */
?>

<?php
	$list_requests=$vars['requests'];
        $count = 0;

	$ts = time();
	$token = generate_action_token($ts);
?>
<h2 class="requestnotifications_title"><?php echo elgg_echo('requestnotifications:title'); ?></h2>

<div class="contentWrapper">

	<?php
	// Group membership requests
		if ($list_requests) {
			$content = "";
			foreach($list_requests as $openlab_guid=>$entities) {
				//$num_gr = get_entities_from_relationship('membership_request',$group->guid,true,'','',0,'',9999,0,true);
				//if ($num_gr && $num_gr > 0) {
					//$count += $num_gr;
					// First show the group
                                        $count=count($entities);
                                        $openlab = get_entity((int)$openlab_guid);
					$content .= "<div class='clearfloat'></div>";
					$content .= "<table class='request'>\n";
					$content .= "<tr>\n";
					$content .= "<td rowspan='2'>" . elgg_view("openlabs/icon", array("entity" => $openlab, "size" => "small")) . "</td>\n";
					$content .= "<td class='name'><a href='" . $openlab->getURL() . "' title='" . $openlab->briefdescription . "'>" . $openlab->name . "</a></td>\n";
					$content .= "</tr>\n";
					$content .= "<tr>\n";
					$content .= "<td>";
					$content .= sprintf(elgg_echo('requestnotifications:grouprequests:count'), $count);
					$content .= "</td>\n";
					$content .= "</tr>\n";
					$content .= "</table>\n";
					$content .= "<div class='clearfloat'></div>";
					// Second load the users that have applied and show them
					//$entities = get_entities_from_relationship('membership_request',$group->guid,true,'','',0,'',$num_gr);
					foreach($entities as $entity) {
						$content .= "<table class='subrequest'>\n";
						$content .= "<tr>\n";
						$content .= "<td rowspan='2'>" . elgg_view("profile/icon", array("entity" => $entity, "size" => "small")) . "</td>\n";
						$content .= "<td class='name'><a href='" . $entity->getURL() . "' title='" . $entity->briefdescription . "'>" . $entity->name . "</a></td>\n";
						$content .= "</tr>\n";
						$content .= "<tr>\n";
						$content .= "<td>";
						$content .= "<a href='" . $CONFIG->wwwroot . "action/openlabs/addtoopenlab?user_guid=" . $entity->guid . "&openlab_guid=" . $openlab->guid . "&__elgg_ts=" . $ts ."&__elgg_token=" . $token . "' title='" . elgg_echo("requestnotifications:approve") . "'>" . elgg_echo("requestnotifications:approve") . "</a>";
						$content .= "&nbsp;|&nbsp;";
						$content .= "<a href='" . $CONFIG->wwwroot . "action/openlabs/killrequest?user_guid=" . $entity->guid . "&openlab_guid=" . $openlab->guid . "&__elgg_ts=" . $ts ."&__elgg_token=" . $token . "' title='" . elgg_echo("requestnotifications:decline") . "'>" . elgg_echo("requestnotifications:decline") . "</a>";
						$content .= "</td>\n";
						$content .= "</tr>\n";
						$content .= "</table>\n";
					}
				}
			}
			if ($content != "") { ?>
			<div class="requestnotifications_box">
				<?php echo $content; ?>
				<div class='clearfloat'></div>
			</div>
		  <?php
			}

	?>


	
</div>