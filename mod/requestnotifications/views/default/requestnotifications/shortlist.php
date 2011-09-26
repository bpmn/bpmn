<?php
	/**
	 * RequestNotifications base view
	 * 
	 * @package requestnotifications
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Adolfo Mazorra
	 * @copyright Adolfo Mazorra 2009
	 * @link http://elgg.org/
	 */
?>

	<div class="requestnotifications_box">
		<?php
                  


			$user = get_loggedin_user();
			
			$count = 0;
			gatekeeper();
			
		
	
			//get teams membership requests
			$owned_groups = get_entities('group', 'teams', $user->guid, "");
			if ($owned_groups) {
				$num_gr = 0;
				foreach($owned_groups as $key => $group)
					$num_gr += get_entities_from_relationship('membership_request',$group->guid,true,'','',0,'',9999,0,true);
				if ($num_gr && $num_gr > 0) {
					$count += $num_gr; ?>
					<p><a href=<?php echo $vars['url']."pg/teams/membershipreq_list/". $user->username ;?> class='grouprequestscount'>
						<?php echo sprintf(elgg_echo('requestnotifications:teamrequests:count'), $num_gr); ?>
					</a></p>
					<?php
				}
			}
                        
                        
                        //get openlab membership requests
			$owned_groups = get_entities('group', 'openlab', $user->guid, "");
			if ($owned_groups) {
				$num_gr = 0;
				foreach($owned_groups as $key => $group)
					$num_gr += get_entities_from_relationship('membership_request',$group->guid,true,'','',0,'',9999,0,true);
				if ($num_gr && $num_gr > 0) {
					$count += $num_gr; ?>
					<p><a href=<?php echo $vars['url']."pg/openlabs/membershipreq_list/". $user->username ;?> class='grouprequestscount'>
						<?php echo sprintf(elgg_echo('requestnotifications:openlabrequests:count'), $num_gr); ?>
					</a></p>
					<?php
				}
			}
			
			//get teams invitations

                        $ignoreacess = elgg_get_ignore_access();
                        elgg_set_ignore_access(True);

			$num_teams_invitations = elgg_get_entities_from_relationship(array('relationship' => 'invited', 'relationship_guid' => $user->guid, 'inverse_relationship' => TRUE,'type'=>'group','subtype'=>'teams', 'limit' => 9999,'count'=>true));
			if(isset($num_teams_invitations) and $num_teams_invitations > 0) {
				$count += $num_teams_invitations; ?>
                                                <p><a href=<?php echo $vars['url']."pg/teams/invitations/". $user->username ;?> class='groupinvitationscount'>
							<?php echo sprintf(elgg_echo('requestnotifications:teaminvite:count'), $num_teams_invitations); ?>
						</a></p>
			<?php }


                        //get openlabs invitations
			$num_openlabs_invitations = elgg_get_entities_from_relationship(array('relationship' => 'invited', 'relationship_guid' => $user->guid, 'inverse_relationship' => TRUE,'type'=>'group','subtype'=>'openlab', 'limit' => 9999,'count'=>true));
			if(isset($num_openlabs_invitations) and $num_openlabs_invitations > 0) {
				$count += $num_openlabs_invitations; ?>
	                                  <p><a href=<?php echo $vars['url']."pg/openlabs/invitations/". $user->username ;?> class='groupinvitationscount'>
							<?php echo sprintf(elgg_echo('requestnotifications:openlabinvite:count'), $num_openlabs_invitations); ?>
						</a></p>
			<?php
                        
                        elgg_set_ignore_access($ignoreaccess);
                       }

                       //get openlabs suggestions
			$num_openlabs_suggestions = elgg_get_entities_from_relationship(array('relationship' => 'suggested', 'relationship_guid' => $user->guid, 'inverse_relationship' => TRUE,'type'=>'group','subtype'=>'openlab', 'limit' => 9999,'count'=>true));
			if(isset($num_openlabs_suggestions) and $num_openlabs_suggestions > 0) {
				$count += $num_openlabs_suggestions; ?>
	                                  <p><a href=<?php echo $vars['url']."pg/openlabs/suggestions/". $user->username ;?> class='groupinvitationscount'>
							<?php echo sprintf(elgg_echo('requestnotifications:openlabsuggestion:count'), $num_openlabs_suggestions); ?>
						</a></p>
			<?php }

			
			
			// We trigger a plugin hook so other plugins can add stuff here
			// The triggered plugins should modify the 'count' param if they are adding new notifications
			$hook_params = array(count => $count);
			trigger_plugin_hook("requestnotifications_list_add", "all", $hook_params, false);
			
			// If there are no requests, write a message telling so
			if ($hook_params[count] == 0) {				
				echo elgg_echo('requestnotifications:norequests');
			}

                       
                        
		?>


	</div>
