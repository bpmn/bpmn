<?php

/**
 * Elgg openlabs plugin
 *
 * @package Elggopenlabs from ElggGroups
 */

/**
 * Initialise the openlabs plugin.
 * Register actions, set up menus
 */
function openlabs_init() {

    global $CONFIG;

    // Set up the menu for logged in users
    if (isloggedin()) {
        add_menu(elgg_echo('openlabs'), $CONFIG->wwwroot . "pg/openlabs/all/");
        //add_menu(elgg_echo('openlabs:alldiscussion'),$CONFIG->wwwroot."mod/openlabs/discussions.php");
    } else {
        add_menu(elgg_echo('openlabs'), $CONFIG->wwwroot . "pg/openlabs/all/");
    }

    // register for search
    register_entity_type('group', 'openlab');
    // register boopin comment 
    register_entity_type('object', 'boopinncomment');

    // Tell Elgg that group subtype "boopinncomment" should be loaded using the Committee class
    // If you ever change the name of the class, use update_subtype() to change it
    add_subtype('object', 'boopinncomment', 'BoopinnComment');


    // Register a page handler, so we can have nice URLs
    register_page_handler('openlabs', 'openlabs_page_handler');
    register_page_handler('forum', 'openlab_forum_page_handler');

    // Register a URL handler for openlabs and forum topics
    register_entity_url_handler('openlabs_url', 'openlab', 'all');
    register_entity_url_handler('openlabs_openlabforumtopic_url', 'object', 'openlabforumtopic');
    // register an url handler for openlabs
    register_entity_url_handler("openlab_group_url", 'group', 'openlab');

    // Register an icon handler for openlabs
    register_page_handler('openlabicon', 'openlabs_icon_handler');

    // Register some actions
    register_action("openlabs/edit", false, $CONFIG->pluginspath . "openlabs/actions/edit.php");
    register_action("openlabs/delete", false, $CONFIG->pluginspath . "openlabs/actions/delete.php");
    register_action("openlabs/join", false, $CONFIG->pluginspath . "openlabs/actions/join.php");
    register_action("openlabs/leave", false, $CONFIG->pluginspath . "openlabs/actions/leave.php");
    register_action("openlabs/joinrequest", false, $CONFIG->pluginspath . "openlabs/actions/joinrequest.php");
    register_action("openlabs/killrequest", false, $CONFIG->pluginspath . "openlabs/actions/openlabskillrequest.php");
    register_action("openlabs/killsuggestion", false, $CONFIG->pluginspath . "openlabs/actions/openlabskillsuggestion.php");
    register_action("openlabs/killinvitation", false, $CONFIG->pluginspath . "openlabs/actions/openlabskillinvitation.php");
    register_action("openlabs/addtoopenlab", false, $CONFIG->pluginspath . "openlabs/actions/addtoopenlab.php");
    register_action("openlabs/invite", false, $CONFIG->pluginspath . "openlabs/actions/invite.php");
    register_action("openlabs/removemember", false, $CONFIG->pluginspath . "openlabs/actions/removemember.php");

    // Use openlab widgets
    use_widgets('openlabs');

    // Add a page owner handler
    add_page_owner_handler('openlabs_page_owner_handler');

    // Add some widgets
    add_widget_type('a_users_openlabs', elgg_echo('openlabs:widget:membership'), elgg_echo('openlabs:widgets:description'));


    //extend some views
    elgg_extend_view('profile/icon', 'openlabs/icon');
    elgg_extend_view('css', 'openlabs/css');

    // Access permissions
    register_plugin_hook('access:collections:write', 'all', 'openlabs_write_acl_plugin_hook');
    //register_plugin_hook('access:collections:read', 'all', 'openlabs_read_acl_plugin_hook');
    // Notification hooks
    if (is_callable('register_notification_object'))
        register_notification_object('object', 'openlabforumtopic', elgg_echo('openlabforumtopic:new'));
    register_plugin_hook('object:notifications', 'object', 'openlab_object_notifications_intercept');

    // Listen to notification events and supply a more useful message
    register_plugin_hook('notify:entity:message', 'object', 'openlabforumtopic_notify_message');

    // add the forum tool option
    add_group_tool_option('forum', elgg_echo('openlabs:enableforum'), true);

    // Now override icons
    register_plugin_hook('entity:icon:url', 'group', 'openlabs_openlabicon_hook');
}

/**
 * Event handler for openlab forum posts
 *
 */
function openlab_object_notifications($event, $object_type, $object) {

    static $flag;
    if (!isset($flag))
        $flag = 0;

    if (is_callable('object_notifications'))
        if ($object instanceof ElggObject) {
            if ($object->getSubtype() == 'openlabforumtopic') {
                //if ($object->countAnnotations('openlab_topic_post') > 0) {
                if ($flag == 0) {
                    $flag = 1;
                    object_notifications($event, $object_type, $object);
                }
                //}
            }
        }
}

/**
 * Intercepts the notification on openlab topic creation and prevents a notification from going out
 * (because one will be sent on the annotation)
 *
 * @param unknown_type $hook
 * @param unknown_type $entity_type
 * @param unknown_type $returnvalue
 * @param unknown_type $params
 * @return unknown
 */
function openlab_object_notifications_intercept($hook, $entity_type, $returnvalue, $params) {
    if (isset($params)) {
        if ($params['event'] == 'create' && $params['object'] instanceof ElggObject) {
            if ($params['object']->getSubtype() == 'openlabforumtopic') {
                return true;
            }
        }
    }
    return null;
}

/**
 * Returns a more meaningful message
 *
 * @param unknown_type $hook
 * @param unknown_type $entity_type
 * @param unknown_type $returnvalue
 * @param unknown_type $params
 */
function openlabforumtopic_notify_message($hook, $entity_type, $returnvalue, $params) {
    $entity = $params['entity'];
    $to_entity = $params['to_entity'];
    $method = $params['method'];
    if (($entity instanceof ElggEntity) && ($entity->getSubtype() == 'openlabforumtopic')) {

        $descr = $entity->description;
        $title = $entity->title;
        global $CONFIG;
        $url = $entity->getURL();

        $msg = get_input('topicmessage');
        if (empty($msg))
            $msg = get_input('topic_post');
        if (!empty($msg))
            $msg = $msg . "\n\n"; else
            $msg = '';

        $owner = get_entity($entity->container_guid);
        if ($method == 'sms') {
            return elgg_echo("openlabforumtopic:new") . ': ' . $url . " ({$owner->name}: {$title})";
        } else {
            return $_SESSION['user']->name . ' ' . elgg_echo("openlabs:viaopenlabs") . ': ' . $title . "\n\n" . $msg . "\n\n" . $entity->getURL();
        }
    }
    return null;
}

/**
 * This function loads a set of default fields into the profile, then triggers a hook letting other plugins to edit
 * add and delete fields.
 *
 * Note: This is a secondary system:init call and is run at a super low priority to guarantee that it is called after all
 * other plugins have initialised.
 */
function openlabs_fields_setup() {
    global $CONFIG;

    $profile_defaults = array(
        'name' => 'text',
        'description' => 'longtext',
        'interests' => 'tags'
    );

    $CONFIG->openlab = trigger_plugin_hook('profile:fields', 'openlab', NULL, $profile_defaults);

    // register any tag metadata names
    foreach ($CONFIG->openlab as $name => $type) {
        if ($type == 'tags') {
            elgg_register_tag_metadata_name($name);

            // register a tag name translation
            add_translation(get_current_language(), array("tag_names:$name" => elgg_echo("openlabs:$name")));
        }
    }
}

/**
 * Sets up submenus for the openlabs system.  Triggered on pagesetup.
 *
 */
function openlabs_submenus() {

    global $CONFIG;

    // Get the page owner entity
    $page_owner = page_owner_entity();
    // debug only 
    $context = get_context();

    // Submenu items for all openlab pages
    if ($page_owner instanceof ElggGroup && get_context() == 'openlabs') {
        if (isloggedin()) {
            if ($page_owner->canEdit()) {
                add_submenu_item(elgg_echo('openlabs:edit'), $CONFIG->wwwroot . "pg/openlabs/edit/" . $page_owner->getGUID(), '1openlabsactions');
                add_submenu_item(elgg_echo('openlabs:invite'), $CONFIG->wwwroot . "pg/openlabs/invite/{$page_owner->getGUID()}", '1openlabsactions');
                if (!$page_owner->isPublicMembership())
                    add_submenu_item(elgg_echo('openlabs:membershiprequests'), $CONFIG->wwwroot . "mod/openlabs/membershipreq.php?openlab_guid={$page_owner->getGUID()}", '1openlabsactions');
            }
            if ($page_owner->isMember($_SESSION['user'])) {
                if ($page_owner->getOwner() != $_SESSION['guid']) {
                    $url = elgg_add_action_tokens_to_url($CONFIG->wwwroot . "action/openlabs/leave?openlab_guid=" . $page_owner->getGUID());
                    add_submenu_item(elgg_echo('openlabs:leave'), $url, '1openlabsactions');
                }
            } else {
                if ($page_owner->isPublicMembership()) {
                    $url = elgg_add_action_tokens_to_url($CONFIG->wwwroot . "action/openlabs/join?openlab_guid={$page_owner->getGUID()}");
                    add_submenu_item(elgg_echo('openlabs:join'), $url, '1openlabsactions');
                } else {
                    $url = elgg_add_action_tokens_to_url($CONFIG->wwwroot . "action/openlabs/joinrequest?openlab_guid={$page_owner->getGUID()}");
                    add_submenu_item(elgg_echo('openlabs:joinrequest'), $url, '1openlabsactions');
                }
            }
            // If user is owner of the group 
            $user_guid = get_loggedin_userid();
            $owner_guid = $page_owner->getOwner();
            if ($user_guid == $owner_guid) {
                add_submenu_item(elgg_echo('openlabs:removemember'), $CONFIG->wwwroot . "pg/openlabs/removemember/{$page_owner->getGUID()}", '1openlabslinks');
            }
        }

        if ($page_owner->forum_enable != "no") {
            add_submenu_item(elgg_echo('openlabs:forum'), $CONFIG->wwwroot . "pg/openlabs/forum/{$page_owner->getGUID()}/", '1openlabslinks');
        }
    }

    // Add submenu options
    if (get_context() == 'openlabs' && !($page_owner instanceof ElggGroup)) {
        if (isloggedin()) {
            add_submenu_item(elgg_echo('openlabs:new'), $CONFIG->wwwroot . "pg/openlabs/new/", '1openlabslinks');
            add_submenu_item(elgg_echo('openlabs:owned'), $CONFIG->wwwroot . "pg/openlabs/owned/" . $_SESSION['user']->username, '1openlabslinks');
            add_submenu_item(elgg_echo('openlabs:yours'), $CONFIG->wwwroot . "pg/openlabs/member/" . $_SESSION['user']->username, '1openlabslinks');
            add_submenu_item(elgg_echo('openlabs:invitations'), $CONFIG->wwwroot . "pg/openlabs/invitations/" . $_SESSION['user']->username, '1openlabslinks');
            add_submenu_item(elgg_echo('openlabs:membershipreq_list'), $CONFIG->wwwroot . "pg/openlabs/membershipreq_list/" . $_SESSION['user']->username, '1openlabslinks');
            add_submenu_item(elgg_echo('openlabs:suggestions'), $CONFIG->wwwroot . "pg/openlabs/suggestions/" . $_SESSION['user']->username, '1openlabslinks');
        }

        add_submenu_item(elgg_echo('openlabs:all'), $CONFIG->wwwroot . "pg/openlabs/all/", '1openlabslinks');
    }
}

/**
 * Set a page owner handler.
 *
 */
function openlabs_page_owner_handler() {
    $openlab_guid = get_input('openlab_guid');
    if ($openlab_guid) {
        $openlab = get_entity($openlab_guid);
        if ($openlab instanceof ElggGroup)
            return $openlab->owner_guid;
    }

    return false;
}

/**
 * openlab page handler
 *
 * @param array $page Array of page elements, forwarded by the page handling mechanism
 */
function openlabs_page_handler($page) {
    global $CONFIG;

    if (!isset($page[0])) {
        $page[0] = 'all';
    }

    switch ($page[0]) {
        case 'invitations':
            include($CONFIG->pluginspath . "openlabs/invitations.php");
            break;
        case 'suggestions':
            include($CONFIG->pluginspath . "openlabs/suggestions.php");
            break;
        case 'membershipreq_list':
            set_input('username', $page[1]);
            include($CONFIG->pluginspath . "openlabs/membershipreq_list.php");
            break;
        case "world":
        case "all":
            include($CONFIG->pluginspath . "openlabs/all.php");
            break;
        case "owned" :
            // Owned by a user
            set_input('username', $page[1]);
            include($CONFIG->pluginspath . "openlabs/index.php");
            break;
        case "new":
            include($CONFIG->pluginspath . "openlabs/new.php");
            break;
        case "edit":
            set_input('openlab_guid', $page[1]);
            include($CONFIG->pluginspath . "openlabs/edit.php");
            break;
        case "invite":
            set_input('openlab_guid', $page[1]);
            include($CONFIG->pluginspath . "openlabs/invite.php");
            break;
        case "removemember":
            set_input('openlab_guid', $page[1]);
            include($CONFIG->pluginspath . "openlabs/removemember.php");
            break;
        case "member" :
            // User is a member of
            set_input('username', $page[1]);
            include($CONFIG->pluginspath . "openlabs/membership.php");
            break;
        case "memberlist":
            set_input('openlab_guid', $page[1]);
            include($CONFIG->pluginspath . "openlabs/memberlist.php");
            break;
        case "forum":
            set_input('openlab_guid', $page[1]);
            include($CONFIG->pluginspath . "openlabs/forum.php");
            break;
        case "profile":
        default:
            if (is_numeric($page[0])) {
                // pg/openlabs/<guid>
                set_input('openlab_guid', $page[0]);
            } else {
                // pg/openlabs/profile/<guid>
                set_input('openlab_guid', $page[1]);
            }
            include($CONFIG->pluginspath . "openlabs/openlabprofile.php");
            break;
    }
}

/**
 * openlab forum page handler
 *
 * @param array $page Array of page elements from url
 */
function openlab_forum_page_handler($page) {
    global $CONFIG;

    set_context('openlabs');

    switch ($page[0]) {
        case 'new':
            set_input('openlab_guid', $page[1]);
            include($CONFIG->pluginspath . "openlabs/addtopic.php");
            break;
        case 'edit':
            set_input('topic', $page[1]);
            include($CONFIG->pluginspath . "openlabs/edittopic.php");
            break;
        case "topic":
            set_input('topic', $page[1]);
            include($CONFIG->pluginspath . "openlabs/topicposts.php");
            break;
    }
}

/**
 * Handle openlab icons.
 *
 * @param unknown_type $page
 */
function openlabs_icon_handler($page) {

    global $CONFIG;

    // The username should be the file we're getting
    if (isset($page[0])) {
        set_input('openlab_guid', $page[0]);
    }
    if (isset($page[1])) {
        set_input('size', $page[1]);
    }
    // Include the standard profile index
    include($CONFIG->pluginspath . "openlabs/graphics/icon.php");
}

/**
 * Populates the ->getUrl() method for openlab objects
 *
 * @param ElggEntity $entity File entity
 * @return string File URL
 */
function openlabs_url($entity) {

    global $CONFIG;

    $title = elgg_get_friendly_title($entity->name);

    return $CONFIG->url . "pg/openlabs/{$entity->guid}/$title/";
}

function openlabs_openlabforumtopic_url($entity) {
    global $CONFIG;
    $title = elgg_get_friendly_title($entity->title);
    return "{$CONFIG->url}pg/forum/topic/{$entity->guid}/{$title}/";
}

/**
 *
 * @global <type> $CONFIG
 * @param <type> $entity
 * @return an url for openlabs 
 */
function openlab_group_url($entity) {
    global $CONFIG;
    $title = elgg_get_friendly_title($entity->title);
    return "{$CONFIG->url}pg/openlabs/{$entity->guid}/{$title}/";
}

/**
 * openlabs created so create an access list for it
 */
function openlabs_create_event_listener($event, $object_type, $object) {

    if ("openlab" == get_subtype_from_id($object->subtype)) {
        $ac_name = elgg_echo('openlabs:openlab') . ": " . $object->name;
        $openlab_id = create_access_collection($ac_name, $object->guid);
        if ($openlab_id) {
            $object->openlab_acl = $openlab_id;
        } else {
            // delete openlab if access creation fails
            return false;
        }
    }
    return true;
}

/**
 * Hook to listen to read access control requests and return all the openlabs you are a member of.
 */
function openlabs_read_acl_plugin_hook($hook, $entity_type, $returnvalue, $params) {
    //error_log("READ: " . var_export($returnvalue));
    $user = $_SESSION['user'];
    if ($user) {
        // Not using this because of recursion.
        // Joining a openlab automatically add user to ACL,
        // So just see if they're a member of the ACL.
        //$membership = get_users_membership($user->guid);

        $members = get_members_of_access_collection($openlab->openlab_acl);
        print_r($members);
        exit;

        if ($membership) {
            foreach ($membership as $openlab)
                $returnvalue[$user->guid][$openlab->openlab_acl] = elgg_echo('openlabs:openlab') . ": " . $openlab->name;
            return $returnvalue;
        }
    }
}

/**
 * Return the write access for the current openlab if the user has write access to it.
 */
function openlabs_write_acl_plugin_hook($hook, $entity_type, $returnvalue, $params) {
    $page_owner = page_owner_entity();
    // get all openlabs if logged in
    if ($loggedin = get_loggedin_user()) {
        $openlabs = elgg_get_entities_from_relationship(array('relationship' => 'member', 'relationship_guid' => $loggedin->getGUID(), 'inverse_relationship' => FALSE, 'limit' => 999));
        if (is_array($openlabs)) {
            foreach ($openlabs as $openlab) {
                $returnvalue[$openlab->openlab_acl] = elgg_echo('openlabs:openlab') . ': ' . $openlab->name;
            }
        }
    }

    // This doesn't seem to do anything.
    // There are no hooks to override container permissions for openlabs
//
//		if ($page_owner instanceof ElggGroup)
//		{
//			if (can_write_to_container())
//			{
//				$returnvalue[$page_owner->openlab_acl] = elgg_echo('openlabs:openlab') . ": " . $page_owner->name;
//			}
//		}

    return $returnvalue;
}

/**
 * openlabs deleted, so remove access lists.
 */
function openlabs_delete_event_listener($event, $object_type, $object) {
    delete_access_collection($object->openlab_acl);

    return true;
}

/**
 * Listens to a openlab join event and adds a user to the openlab's access control
 *
 */
function openlabs_user_join_event_listener($event, $object_type, $object) {

    $openlab = $object['openlab'];
    $user = $object['user'];
    $acl = $openlab->openlab_acl;

    add_user_to_access_collection($user->guid, $acl);

    return true;
}

/**
 * Listens to a openlab leave event and removes a user from the openlab's access control
 *
 */
function openlabs_user_leave_event_listener($event, $object_type, $object) {

    $openlab = $object['openlab'];
    $user = $object['user'];
    $acl = $openlab->openlab_acl;

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
function openlabs_openlabicon_hook($hook, $entity_type, $returnvalue, $params) {
    global $CONFIG;

    if ((!$returnvalue) && ($hook == 'entity:icon:url') && ($params['entity'] instanceof ElggGroup)) {
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
        $filehandler->setFilename("openlabs/" . $entity->guid . $size . ".jpg");

        if ($filehandler->exists()) {
            $url = $CONFIG->url . "pg/openlabicon/{$entity->guid}/$size/$icontime.jpg";

            return $url;
        }
    }
}

/**
 * A simple function to see who can edit a openlab discussion post
 * @param the comment $entity
 * @param user who owns the openlab $openlab_owner
 * @return boolean
 */
function openlabs_can_edit_discussion($entity, $openlab_owner) {

    //logged in user
    $user = $_SESSION['user']->guid;

    if (($entity->owner_guid == $user) || $openlab_owner == $user || isadminloggedin()) {
        return true;
    } else {
        return false;
    }
}

/**
 * Overrides topic post getURL() value.
 *
 */
function openlab_topicpost_url($annotation) {
    if ($parent = get_entity($annotation->entity_guid)) {
        global $CONFIG;
        return $CONFIG->wwwroot . 'mod/openlabs/topicposts.php?topic=' . $parent->guid . '&amp;openlab_guid=' . $parent->container_guid . '#' . $annotation->id;
    }
}

/**
 *
 * @global  $CONFIG 
 */
function openlab_view($view, $vars = array(), $bypass = false, $debug = false, $viewtype = '') {
    global $CONFIG;
    static $usercache;

    $view = (string) $view;

    // basic checking for bad paths
    if (strpos($view, '..') !== false) {
        return false;
    }

    $view_orig = $view;

    // Trigger the pagesetup event
    if (!isset($CONFIG->pagesetupdone)) {
        trigger_elgg_event('pagesetup', 'system');
        $CONFIG->pagesetupdone = true;
    }

    if (!is_array($usercache)) {
        $usercache = array();
    }

    if (!is_array($vars)) {
        elgg_log('Vars in views must be an array!', 'ERROR');
        $vars = array();
    }

    if (empty($vars)) {
        $vars = array();
    }

    // Load session and configuration variables into $vars
    // $_SESSION will always be an array if it is set
    if (isset($_SESSION) /* && is_array($_SESSION) */) {
        //= array_merge($vars, $_SESSION);
        $vars += $_SESSION;
    }

    $vars['config'] = array();

    if (!empty($CONFIG)) {
        $vars['config'] = $CONFIG;
    }

    $vars['url'] = $CONFIG->url;

    // Load page owner variables into $vars
    if (is_callable('page_owner')) {
        $vars['page_owner'] = page_owner();
    } else {
        $vars['page_owner'] = -1;
    }

    if (($vars['page_owner'] != -1) && (is_installed())) {
        if (!isset($usercache[$vars['page_owner']])) {
            $vars['page_owner_user'] = get_entity($vars['page_owner']);
            $usercache[$vars['page_owner']] = $vars['page_owner_user'];
        } else {
            $vars['page_owner_user'] = $usercache[$vars['page_owner']];
        }
    }

    if (!isset($vars['js'])) {
        $vars['js'] = "";
    }

    // If it's been requested, pass off to a template handler instead
    if ($bypass == false && isset($CONFIG->template_handler) && !empty($CONFIG->template_handler)) {
        $template_handler = $CONFIG->template_handler;
        if (is_callable($template_handler)) {
            return $template_handler($view, $vars);
        }
    }

    // Get the current viewtype
    if (empty($viewtype)) {
        $viewtype = elgg_get_viewtype();
    }

    // Viewtypes can only be alphanumeric
    if (preg_match('[\W]', $viewtype)) {
        return '';
    }

    // Set up any extensions to the requested view
    if (isset($CONFIG->views->extensions[$view])) {
        $viewlist = $CONFIG->views->extensions[$view];
    } else {
        $viewlist = array(500 => $view);
    }
    // Start the output buffer, find the requested view file, and execute it
    ob_start();

    foreach ($viewlist as $priority => $view) {
        $view_location = elgg_get_view_location($view, $viewtype);
        $view_file = "$view_location$viewtype/$view.php";

        $default_location = elgg_get_view_location($view, 'default');
        $default_view_file = "{$default_location}default/$view.php";

        // try to include view
        if (!file_exists($view_file) || !include($view_file)) {
            // requested view does not exist
            $error = "$viewtype/$view view does not exist.";

            // attempt to load default view
            if ($viewtype != 'default' && elgg_does_viewtype_fallback($viewtype)) {
                if (file_exists($default_view_file) && include($default_view_file)) {
                    // default view found
                    $error .= " Using default/$view instead.";
                } else {
                    // no view found at all
                    $error = "Neither $viewtype/$view nor default/$view view exists.";
                }
            }

            // log warning
            elgg_log($error, 'NOTICE');
        }
    }

    // Save the output buffer into the $content variable
    $content = ob_get_clean();

    // Plugin hook
    $content = trigger_plugin_hook('display', 'view', array('view' => $view_orig, 'vars' => $vars), $content);

    // Return $content
    return $content;
}

/**
 * Grabs openlabs by invitations
 * Have to override all access until there's a way override access to getter functions.
 *
 * @param $user_guid
 * @return unknown_type
 */
function openlabs_get_invited_openlabs($user_guid, $return_guids = FALSE) {
    $ia = elgg_set_ignore_access(TRUE);
    $invitations = elgg_get_entities_from_relationship(array('relationship' => 'invited', 'relationship_guid' => $user_guid, 'inverse_relationship' => TRUE, 'type' => 'group', 'subtype' => 'openlab', 'limit' => 9999));
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

/**
 * Grabs openlabs by suggestions
 * Have to override all access until there's a way override access to getter functions.
 *
 * @param $user_guid
 * @return unknown_type
 */
function openlabs_get_suggested_openlabs($user_guid, $return_guids = FALSE) {
    $ia = elgg_set_ignore_access(TRUE);
    $suggestions = elgg_get_entities_from_relationship(array('relationship' => 'suggested', 'relationship_guid' => $user_guid, 'inverse_relationship' => TRUE, 'type' => 'group', 'subtype' => 'openlab', 'limit' => 9999));
    elgg_set_ignore_access($ia);

    if ($return_guids) {
        $guids = array();
        foreach ($suggestions as $suggestion) {
            $guids[] = $suggestion->getGUID();
        }

        return $guids;
    }

    return $suggestions;
}

/**
 * Override the canEdit function to return true for messages within a particular context.
 *
 */
function topic_can_edit($hook_name, $entity_type, $return_value, $parameters) {
  
    $entity = $parameters['user'] ; 
    $container = $parameters['container'] ; 
    
    if ($entity->guid == $container->guid )
    {
        return true;  
    
    }
    
    if ( ($entity  instanceof ElggUser) && ($container  instanceof ElggObject) )
    {
        $group = $container->getContainerEntity() ; 
        if ($group->isMember($entity->guid))
        {
            return true;     
        }
    }

    return $false;
}

register_plugin_hook('container_permissions_check', 'object', 'topic_can_edit');


register_extender_url_handler('openlab_topicpost_url', 'annotation', 'openlab_topic_post');

// Register a handler for create openlabs
register_elgg_event_handler('create', 'group', 'openlabs_create_event_listener');

// Register a handler for delete openlabs
register_elgg_event_handler('delete', 'group', 'openlabs_delete_event_listener');

// Make sure the openlabs initialisation function is called on initialisation
register_elgg_event_handler('init', 'system', 'openlabs_init');
register_elgg_event_handler('init', 'system', 'openlabs_fields_setup', 10000); // Ensure this runs after other plugins
register_elgg_event_handler('join', 'group', 'openlabs_user_join_event_listener');
register_elgg_event_handler('leave', 'group', 'openlabs_user_leave_event_listener');
register_elgg_event_handler('pagesetup', 'system', 'openlabs_submenus');
register_elgg_event_handler('annotate', 'all', 'openlab_object_notifications');

// Register actions
global $CONFIG;
register_action("openlabs/addtopic", false, $CONFIG->pluginspath . "openlabs/actions/forums/addtopic.php");
register_action("openlabs/deletetopic", false, $CONFIG->pluginspath . "openlabs/actions/forums/deletetopic.php");
register_action("openlabs/addpost", false, $CONFIG->pluginspath . "openlabs/actions/forums/addpost.php");
register_action("openlabs/edittopic", false, $CONFIG->pluginspath . "openlabs/actions/forums/edittopic.php");
register_action("openlabs/deletepost", false, $CONFIG->pluginspath . "openlabs/actions/forums/deletepost.php");
register_action("openlabs/featured", false, $CONFIG->pluginspath . "openlabs/actions/featured.php");
register_action("openlabs/editpost", false, $CONFIG->pluginspath . "openlabs/actions/forums/editpost.php");
register_action("openlabs/rate_plus", false, $CONFIG->pluginspath . "openlabs/actions/annotations/positiverate.php");
register_action("openlabs/rate_less", false, $CONFIG->pluginspath . "openlabs/actions/annotations/negativerate.php");
?>
