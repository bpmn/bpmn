<?php
	/**
	 * Elgg teams plugin
	 *
	 * @package ElggGroups
	 */

	/**
	 * Initialise the teams plugin.
	 * Register actions, set up menus
	 */
	function teams_init()
	{

		global $CONFIG;

		// Set up the menu for logged in users
		if (isloggedin())
		{
			add_menu(elgg_echo('teams'), $CONFIG->wwwroot . "pg/teams/all/".$_SESSION['user']->username);
			//add_menu(elgg_echo('teams:alldiscussion'),$CONFIG->wwwroot."mod/teams/discussions.php");
		}
		else
		{
			add_menu(elgg_echo('teams'), $CONFIG->wwwroot . "pg/teams/all/".$_SESSION['user']->username);
		}

		// register for search
		register_entity_type('group','teams');

		// Register a page handler, so we can have nice URLs
		register_page_handler('teams','teams_page_handler');
		/*register_page_handler('forum','forum_page_handler');*/

		// Register a URL handler for teams and forum topics
		register_entity_url_handler('teams_url','group','teams');
		//register_entity_url_handler('teams_groupforumtopic_url','object','groupforumtopic');

		// Register an icon handler for teams
		/*register_page_handler('groupicon','teams_icon_handler');*/

		// Register some actions
		register_action("teams/edit",false, $CONFIG->pluginspath . "teams/actions/edit.php");
		register_action("teams/delete",false, $CONFIG->pluginspath . "teams/actions/delete.php");
		register_action("teams/join",false, $CONFIG->pluginspath . "teams/actions/join.php");
		register_action("teams/leave",false, $CONFIG->pluginspath . "teams/actions/leave.php");
		register_action("teams/joinrequest",false, $CONFIG->pluginspath . "teams/actions/joinrequest.php");
		register_action("teams/killrequest",false,$CONFIG->pluginspath . "teams/actions/teamskillrequest.php");
		register_action("teams/killinvitation",false,$CONFIG->pluginspath . "teams/actions/teamskillinvitation.php");
		register_action("teams/addtogroup",false, $CONFIG->pluginspath . "teams/actions/addtogroup.php");
		register_action("teams/invite",false, $CONFIG->pluginspath . "teams/actions/invite.php");
                register_action("teams/removemember", false, $CONFIG->pluginspath . "teams/actions/removemember.php");

		// Use group widgets
		use_widgets('teams');

		// Add a page owner handler
		add_page_owner_handler('teams_page_owner_handler');

		// Add some widgets
		add_widget_type('a_users_teams',elgg_echo('teams:widget:membership'), elgg_echo('teams:widgets:description'));


		//extend some views
		//elgg_extend_view('profile/icon','teams/icon');
		elgg_extend_view('css','teams/css');

		// Access permissions
		register_plugin_hook('access:collections:write', 'all', 'teams_write_acl_plugin_hook');
		//register_plugin_hook('access:collections:read', 'all', 'teams_read_acl_plugin_hook');

		// Notification hooks
		/*if (is_callable('register_notification_object'))
			register_notification_object('object', 'groupforumtopic', elgg_echo('groupforumtopic:new'));
		register_plugin_hook('object:notifications','object','group_object_notifications_intercept');*/

		// Listen to notification events and supply a more useful message
		/*register_plugin_hook('notify:entity:message', 'object', 'groupforumtopic_notify_message');*/

		// add the forum tool option
		/*add_group_tool_option('forum',elgg_echo('teams:enableforum'),true);*/

		// Now override icons
		register_plugin_hook('entity:icon:url', 'group', 'teams_groupicon_hook');
	}

	/**
	 * Event handler for group forum posts
	 *
	 */
	/*function team_object_notifications($event, $object_type, $object) {

		static $flag;
		if (!isset($flag)) $flag = 0;

		if (is_callable('object_notifications'))
		if ($object instanceof ElggObject) {
			if ($object->getSubtype() == 'groupforumtopic') {
				//if ($object->countAnnotations('group_topic_post') > 0) {
				if ($flag == 0) {
					$flag = 1;
					object_notifications($event, $object_type, $object);
				}
				//}
			}
		}

	}*/

	/**
	 * Intercepts the notification on group topic creation and prevents a notification from going out
	 * (because one will be sent on the annotation)
	 *
	 * @param unknown_type $hook
	 * @param unknown_type $entity_type
	 * @param unknown_type $returnvalue
	 * @param unknown_type $params
	 * @return unknown
	 */
	/*	function team_object_notifications_intercept($hook, $entity_type, $returnvalue, $params) {
			if (isset($params)) {
				if ($params['event'] == 'create' && $params['object'] instanceof ElggObject) {
					if ($params['object']->getSubtype() == 'groupforumtopic') {
						return true;
					}
				}
			}
			return null;
		} */

		/**
		 * Returns a more meaningful message
		 *
		 * @param unknown_type $hook
		 * @param unknown_type $entity_type
		 * @param unknown_type $returnvalue
		 * @param unknown_type $params
		 */
		/*function teamforumtopic_notify_message($hook, $entity_type, $returnvalue, $params)
		{
			$entity = $params['entity'];
			$to_entity = $params['to_entity'];
			$method = $params['method'];
			if (($entity instanceof ElggEntity) && ($entity->getSubtype() == 'groupforumtopic'))
			{

				$descr = $entity->description;
				$title = $entity->title;
				global $CONFIG;
				$url = $entity->getURL();

				$msg = get_input('topicmessage');
				if (empty($msg)) $msg = get_input('topic_post');
				if (!empty($msg)) $msg = $msg . "\n\n"; else $msg = '';

				$owner = get_entity($entity->container_guid);
				if ($method == 'sms') {
					return elgg_echo("groupforumtopic:new") . ': ' . $url . " ({$owner->name}: {$title})";
				} else {
					return $_SESSION['user']->name . ' ' . elgg_echo("teams:viateams") . ': ' . $title . "\n\n" . $msg . "\n\n" . $entity->getURL();
				}

			}
			return null;
		}*/

	/**
	 * This function loads a set of default fields into the profile, then triggers a hook letting other plugins to edit
	 * add and delete fields.
	 *
	 * Note: This is a secondary system:init call and is run at a super low priority to guarantee that it is called after all
	 * other plugins have initialised.
	 */
	function teams_fields_setup()
	{
		global $CONFIG;

		$profile_defaults = array(

			'name' => 'text',
			'description' => 'longtext',
			'briefdescription' => 'text',
			'interests' => 'tags',
			'website' => 'url',

		);

		$CONFIG->group = trigger_plugin_hook('profile:fields', 'group', NULL, $profile_defaults);

		// register any tag metadata names
		foreach ($CONFIG->group as $name => $type) {
			if ($type == 'tags') {
				elgg_register_tag_metadata_name($name);

				// register a tag name translation
				add_translation(get_current_language(), array("tag_names:$name" => elgg_echo("teams:$name")));
			}
		}
	}

	/**
	 * Sets up submenus for the teams system.  Triggered on pagesetup.
	 *
	 */
	function teams_submenus() {

		global $CONFIG;

		// Get the page owner entity
			$page_owner = page_owner_entity();

		// Submenu items for all group pages
			if ($page_owner instanceof ElggGroup && get_context() == 'teams') {
				if (isloggedin()) {
					if ($page_owner->canEdit()) {
						add_submenu_item(elgg_echo('teams:edit'),$CONFIG->wwwroot . "pg/teams/edit/" . $page_owner->getGUID(), '1teamsactions');
						add_submenu_item(elgg_echo('teams:invite'),$CONFIG->wwwroot . "pg/teams/invite/{$page_owner->getGUID()}", '1teamsactions');
						if (!$page_owner->isPublicMembership())
							add_submenu_item(elgg_echo('teams:membershiprequests'),$CONFIG->wwwroot . "mod/teams/membershipreq.php?group_guid={$page_owner->getGUID()}", '1teamsactions');
					}
					if ($page_owner->isMember($_SESSION['user'])) {
						if ($page_owner->getOwner() != $_SESSION['guid']) {
							$url = elgg_add_action_tokens_to_url($CONFIG->wwwroot . "action/teams/leave?group_guid=" . $page_owner->getGUID());
							add_submenu_item(elgg_echo('teams:leave'), $url, '1teamsactions');
						}
					} else {
						if ($page_owner->isPublicMembership()) {
							$url = elgg_add_action_tokens_to_url($CONFIG->wwwroot . "action/teams/join?group_guid={$page_owner->getGUID()}");
							add_submenu_item(elgg_echo('teams:join'), $url, '1teamsactions');
						} else {
							$url = elgg_add_action_tokens_to_url($CONFIG->wwwroot . "action/teams/joinrequest?group_guid={$page_owner->getGUID()}");
							add_submenu_item(elgg_echo('teams:joinrequest'), $url, '1teamsactions');
						}
					}
                                           // If user is owner of the group 
                                        $user_guid  = get_loggedin_userid() ; 
                                        $owner_guid = $page_owner->getOwner() ; 
                                        if ($user_guid == $owner_guid)
                                        {
                                           add_submenu_item(elgg_echo('teams:removemember'), $CONFIG->wwwroot . "pg/teams/removemember/{$page_owner->getGUID()}", '1teamslinks');
                                        }
				}

				if($page_owner->forum_enable != "no"){
					add_submenu_item(elgg_echo('teams:forum'),$CONFIG->wwwroot . "pg/teams/forum/{$page_owner->getGUID()}/", '1teamslinks');
				}

			}

		// Add submenu options
			if (get_context() == 'teams' && !($page_owner instanceof ElggGroup)) {
				if (isloggedin()) {
					add_submenu_item(elgg_echo('teams:new'), $CONFIG->wwwroot."pg/teams/new/", '1teamslinks');
					add_submenu_item(elgg_echo('teams:yours'), $CONFIG->wwwroot . "pg/teams/all/" . $_SESSION['user']->username, '1teamslinks');
					//add_submenu_item(elgg_echo('teams:yours'), $CONFIG->wwwroot . "pg/teams/member/" . $_SESSION['user']->username, '1teamslinks');
					add_submenu_item(elgg_echo('teams:invitations'), $CONFIG->wwwroot . "pg/teams/invitations/" . $_SESSION['user']->username, '1teamslinks');
                                        add_submenu_item(elgg_echo('teams:membershipreq_list'),$CONFIG->wwwroot . "pg/teams/membershipreq_list/". $_SESSION['user']->username, '1teamslinks');
                                }
				//add_submenu_item(elgg_echo('teams:all'), $CONFIG->wwwroot . "pg/teams/all/", '1teamslinks');
			}

	}

	/**
	 * Set a page owner handler.
	 *
	 */
	function teams_page_owner_handler()
	{
		$group_guid = get_input('group_guid');
		if ($group_guid)
		{
			$group = get_entity($group_guid);
			if ($group instanceof ElggGroup)
				return $group->owner_guid;
		}

		return false;
	}

	/**
	 * Group page handler
	 *
	 * @param array $page Array of page elements, forwarded by the page handling mechanism
	 */
	function teams_page_handler($page) {
		global $CONFIG;

		if (!isset($page[0])) {
			$page[0] = 'all';
		}

		switch ($page[0]) {
			case 'invitations':
				include($CONFIG->pluginspath . "teams/invitations.php");
				break;
                        case 'membershipreq_list':
                                set_input('username', $page[1]);
				include($CONFIG->pluginspath . "teams/membershipreq_list.php");
				break;
			case "all" :
				// Owned by a user
				set_input('username', $page[1]);
				include($CONFIG->pluginspath . "teams/index.php");
				break;
			case "new":
				include($CONFIG->pluginspath . "teams/new.php");
				break;
			case "edit":
				set_input('group_guid', $page[1]);
				include($CONFIG->pluginspath . "teams/edit.php");
				break;
			case "invite":
				set_input('group_guid', $page[1]);
				include($CONFIG->pluginspath . "teams/invite.php");
				break;
                        case "removemember":
                            set_input('group_guid', $page[1]);
                            include($CONFIG->pluginspath . "teams/removemember.php");
                            break;
			case "member" :
				// User is a member of
				set_input('username',$page[1]);
				include($CONFIG->pluginspath . "teams/membership.php");
				break;
			case "memberlist":
				set_input('group_guid', $page[1]);
				include($CONFIG->pluginspath . "teams/memberlist.php");
				break;
			case "forum":
				set_input('group_guid', $page[1]);
				include($CONFIG->pluginspath . "teams/forum.php");
				break;
			case "profile":
			default:
				if (is_numeric($page[0])) {
					// pg/teams/<guid>
					set_input('group_guid', $page[0]);
				} else {
					// pg/teams/profile/<guid>
					set_input('group_guid', $page[1]);
				}
				include($CONFIG->pluginspath . "teams/teamprofile.php");
				break;
		}
	}

	/**
	 * Group forum page handler
	 *
	 * @param array $page Array of page elements from url
	 */
/*	function forum_page_handler($page) {
		global $CONFIG;

		set_context('teams');

		switch ($page[0]) {
			case 'new':
				set_input('group_guid', $page[1]);
				include($CONFIG->pluginspath . "teams/addtopic.php");
				break;
			case 'edit':
				set_input('topic', $page[1]);
				include($CONFIG->pluginspath . "teams/edittopic.php");
				break;
			case "topic":
				set_input('topic', $page[1]);
				include($CONFIG->pluginspath . "teams/topicposts.php");
				break;
		}
	}*/

	/**
	 * Handle group icons.
	 *
	 * @param unknown_type $page
	 */
	function teams_icon_handler($page) {

		global $CONFIG;

		// The username should be the file we're getting
		if (isset($page[0])) {
			set_input('group_guid',$page[0]);
		}
		if (isset($page[1])) {
			set_input('size',$page[1]);
		}
		// Include the standard profile index
		include($CONFIG->pluginspath . "teams/graphics/icon.php");

	}

	/**
	 * Populates the ->getUrl() method for group objects
	 *
	 * @param ElggEntity $entity File entity
	 * @return string File URL
	 */
	function teams_url($entity) {

		global $CONFIG;

		$title = elgg_get_friendly_title($entity->name);

		return $CONFIG->url."pg/teams/{$entity->guid}/$title/";
	}

/*	function teams_groupforumtopic_url($entity) {
		global $CONFIG;
		$title = elgg_get_friendly_title($entity->title);
		return "{$CONFIG->url}pg/forum/topic/{$entity->guid}/{$title}/";
	}*/

	/**
	 * Groups created so create an access list for it
	 */
	function teams_create_event_listener($event, $object_type, $object)
	{
		$ac_name = elgg_echo('teams:group') . ": " . $object->name;
		$group_id = create_access_collection($ac_name, $object->guid);
		if ($group_id) {
			$object->group_acl = $group_id;
		} else {
			// delete group if access creation fails
			return false;
		}

		return true;
	}

	/**
	 * Hook to listen to read access control requests and return all the teams you are a member of.
	 */
	function teams_read_acl_plugin_hook($hook, $entity_type, $returnvalue, $params)
	{
		//error_log("READ: " . var_export($returnvalue));
		$user = $_SESSION['user'];
		if ($user)
		{
			// Not using this because of recursion.
			// Joining a group automatically add user to ACL,
			// So just see if they're a member of the ACL.
			//$membership = get_users_membership($user->guid);

			$members = get_members_of_access_collection($group->group_acl);
			print_r($members);
			exit;

			if ($membership)
			{
				foreach ($membership as $group)
					$returnvalue[$user->guid][$group->group_acl] = elgg_echo('teams:group') . ": " . $group->name;
				return $returnvalue;
			}
		}
	}

	/**
	 * Return the write access for the current group if the user has write access to it.
	 */
	function teams_write_acl_plugin_hook($hook, $entity_type, $returnvalue, $params)
	{
		$page_owner = page_owner_entity();
		// get all teams if logged in
		if ($loggedin = get_loggedin_user()) {
			$teams = elgg_get_entities_from_relationship(array('relationship' => 'member', 'relationship_guid' => $loggedin->getGUID(), 'inverse_relationship' => FALSE, 'limit' => 999));
			if (is_array($teams)) {
				foreach ($teams as $group) {
					$returnvalue[$group->group_acl] = elgg_echo('teams:group') . ': ' . $group->name;
				}
			}
		}

		// This doesn't seem to do anything.
		// There are no hooks to override container permissions for teams
//
//		if ($page_owner instanceof ElggGroup)
//		{
//			if (can_write_to_container())
//			{
//				$returnvalue[$page_owner->group_acl] = elgg_echo('teams:group') . ": " . $page_owner->name;
//			}
//		}
		return $returnvalue;
	}

	/**
	 * Groups deleted, so remove access lists.
	 */
	function teams_delete_event_listener($event, $object_type, $object)
	{
		delete_access_collection($object->group_acl);

		return true;
	}

	/**
	 * Listens to a group join event and adds a user to the group's access control
	 *
	 */
	function teams_user_join_event_listener($event, $object_type, $object) {

		$group = $object['group'];
		$user = $object['user'];
		$acl = $group->group_acl;

		add_user_to_access_collection($user->guid, $acl);

		return true;
	}

	/**
	 * Listens to a group leave event and removes a user from the group's access control
	 *
	 */
	function teams_user_leave_event_listener($event, $object_type, $object) {

		$group = $object['group'];
		$user = $object['user'];
		$acl = $group->group_acl;

		remove_user_from_access_collection($user->guid, $acl);

		return true;
	}

	/**
	 * This hooks into the getIcon API and provides nice user icons for users where possible.
	 *
	 * @param unknown_type $hook
	 * @param unknown_type $entity_type
	 * @param unknown_type $returnvalue
	 * @param unknown_type $params
	 * @return unknown
	 */
	function teams_groupicon_hook($hook, $entity_type, $returnvalue, $params)
	{
		global $CONFIG;

		if ((!$returnvalue) && ($hook == 'entity:icon:url') && ($params['entity'] instanceof ElggGroup))
		{
			$entity = $params['entity'];
			$type = $entity->type;
			$viewtype = $params['viewtype'];
			$size = $params['size'];

			if ($icontime = $entity->icontime) {
				$icontime = "{$icontime}";
			} else {
				$icontime = "default";
			}

			$filehandler = new ElggFile();
			$filehandler->owner_guid = $entity->owner_guid;
			$filehandler->setFilename("teams/" . $entity->guid . $size . ".jpg");

			if ($filehandler->exists()) {
				$url = $CONFIG->url . "pg/groupicon/{$entity->guid}/$size/$icontime.jpg";

				return $url;
			}
		}
	}

	/**
	 * A simple function to see who can edit a group discussion post
	 * @param the comment $entity
	 * @param user who owns the group $group_owner
	 * @return boolean
	 */
	function teams_can_edit_discussion($entity, $group_owner)
	{

		//logged in user
		$user = $_SESSION['user']->guid;

		if (($entity->owner_guid == $user) || $group_owner == $user || isadminloggedin()) {
			return true;
		}else{
			return false;
		}

	}

	/**
	 * Overrides topic post getURL() value.
	 *
	 */
	function team_topicpost_url($annotation) {
		if ($parent = get_entity($annotation->entity_guid)) {
			global $CONFIG;
			return $CONFIG->wwwroot . 'mod/teams/topicposts.php?topic='.$parent->guid.'&amp;group_guid='.$parent->container_guid.'#' . $annotation->id;
		}
	}

	/**
	 * Grabs teams by invitations
	 * Have to override all access until there's a way override access to getter functions.
	 *
	 * @param $user_guid
	 * @return unknown_type
	 */
	function teams_get_invited_teams($user_guid, $return_guids = FALSE) {
		$ia = elgg_set_ignore_access(TRUE);
		$invitations = elgg_get_entities_from_relationship(array('relationship' => 'invited', 'relationship_guid' => $user_guid, 'inverse_relationship' => TRUE,'type'=>'group','subtype'=>'teams', 'limit' => 9999));
		elgg_set_ignore_access($ia);

		if ($return_guids) {
			$guids = array();
			foreach ($invitations as $invitation) {
				$guids[] = $invitation->getGUID();
			}

			return $guids;
		}

		return $invitations;
	}

	register_extender_url_handler('team_topicpost_url','annotation', 'team_topic_post');

	// Register a handler for create teams
	register_elgg_event_handler('create', 'group', 'teams_create_event_listener');

	// Register a handler for delete teams
	register_elgg_event_handler('delete', 'group', 'teams_delete_event_listener');

	// Make sure the teams initialisation function is called on initialisation
	register_elgg_event_handler('init','system','teams_init');
	register_elgg_event_handler('init','system','teams_fields_setup', 10000); // Ensure this runs after other plugins
	register_elgg_event_handler('join','group','teams_user_join_event_listener');
	register_elgg_event_handler('leave','group','teams_user_leave_event_listener');
	register_elgg_event_handler('pagesetup','system','teams_submenus');
	register_elgg_event_handler('annotate','all','team_object_notifications');

	// Register actions
	global $CONFIG;
	register_action("teams/addtopic",false,$CONFIG->pluginspath . "teams/actions/forums/addtopic.php");
	register_action("teams/deletetopic",false,$CONFIG->pluginspath . "teams/actions/forums/deletetopic.php");
	register_action("teams/addpost",false,$CONFIG->pluginspath . "teams/actions/forums/addpost.php");
	register_action("teams/edittopic",false,$CONFIG->pluginspath . "teams/actions/forums/edittopic.php");
	register_action("teams/deletepost",false,$CONFIG->pluginspath . "teams/actions/forums/deletepost.php");
	register_action("teams/featured",false,$CONFIG->pluginspath . "teams/actions/featured.php");
	register_action("teams/editpost",false,$CONFIG->pluginspath . "teams/actions/forums/editpost.php");

?>
