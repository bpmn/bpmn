<?php

/**
 * Elgg openlabs plugin edit action.
 *
 * @package Elggopenlabs from ElggGroups
 */
// Load configuration
global $CONFIG;

/**
 * wrapper for recursive array walk decoding
 */
function profile_array_decoder(&$v) {
    $v = html_entity_decode($v, ENT_COMPAT, 'UTF-8');
}

// Get openlab fields
$input = array();
foreach ($CONFIG->openlab as $shortname => $valuetype) {
    // another work around for Elgg's encoding problems: #561, #1963
    $input[$shortname] = get_input($shortname);
    if (is_array($input[$shortname])) {
        array_walk_recursive($input[$shortname], 'profile_array_decoder');
    } else {
        $input[$shortname] = html_entity_decode($input[$shortname], ENT_COMPAT, 'UTF-8');
    }

    if ($shortname == 'name') {
        $input[$shortname] = strip_tags($input[$shortname]);
    }
    if ($valuetype == 'tags') {
        $input[$shortname] = string_to_tag_array($input[$shortname]);
    }
}

$user = get_loggedin_user();

$openlab_guid = (int) get_input('openlab_guid');
$new_openlab_flag = $openlab_guid == 0;

$openlab = new ElggGroup($openlab_guid); // load if present, if not create a new openlab
if ($new_openlab_flag) {
    $openlab->subtype = 'openlab';
    $group->membership = ACCESS_PRIVATE;
}

if (($openlab_guid) && (!$openlab->canEdit())) {
    register_error(elgg_echo("openlabs:cantedit"));

    forward($_SERVER['HTTP_REFERER']);
    exit;
}

// Assume we can edit or this is a new openlab
if (sizeof($input) > 0) {
    foreach ($input as $shortname => $value) {
        $openlab->$shortname = $value;
    }
}

// Validate create
if (!$openlab->name) {
    register_error(elgg_echo("openlabs:notitle"));

    forward($_SERVER['HTTP_REFERER']);
    exit;
}

// openlab membership - should these be treated with same constants as access permissions?
switch (get_input('membership')) {
    case ACCESS_PUBLIC:
        $openlab->membership = ACCESS_PUBLIC;
        break;
    default:
        $openlab->membership = ACCESS_PRIVATE;
}

// Set access - all openlabs are public from elgg's point of view, unless the override is in place
if (get_plugin_setting('hidden_openlabs', 'openlabs') == 'yes') {
    $visibility = (int) get_input('vis', '', false);

    $openlab->access_id = $visibility;
} else {
    $openlab->access_id = ACCESS_PUBLIC;
}

// Set openlab tool options
$openlab->files_enable = 'yes';
$openlab->pages_enable = 'yes';
$openlab->forum_enable = 'yes';

// Set openlab tool options
/* if (isset($CONFIG->openlab_tool_options)) {
  foreach($CONFIG->openlab_tool_options as $openlab_option) {
  $openlab_option_toggle_name = $openlab_option->name."_enable";
  if ($openlab_option->default_on) {
  $openlab_option_default_value = 'yes';
  } else {
  $openlab_option_default_value = 'no';
  }
  $openlab->$openlab_option_toggle_name = get_input($openlab_option_toggle_name, $openlab_option_default_value);
  }
  }
 */
$openlab->save();

// openlab creator needs to be member of new openlab
if ($new_openlab_flag) {
    $openlab->join($user);
    add_to_river('openlab_river/openlab/create', 'create', $user->guid, $openlab->guid);

// STD automatically create topic 
// 
// Initialise a new ElggObject
    $openlabtopic = new ElggObject();
// Tell the system it's a openlab forum topic
    $openlabtopic->subtype = "openlabforumtopic";
// Set its owner to the current user
    $openlabtopic->owner_guid = get_loggedin_userid();
// Set the openlab it belongs to
    $openlabtopic->container_guid = $openlab->guid;
// For now, set its access to public (we'll add an access dropdown shortly)
    $openlabtopic->access_id = ACCESS_PUBLIC;
// Set its title and description appropriately
    $openlabtopic->title = $openlab->name;
// Before we can set metadata, we need to save the topic
    if (!$openlabtopic->save()) {
        register_error(elgg_echo("openlabtopic:error"));
        forward("pg/openlabs/forum/{$openlab_guid}/");
    }
   $openlabtopic->tags = $openlab->tags;
// add metadata
    $openlabtopic->status = "open"; // the current status i.e sticky, closed, resolved, open

} else {
    add_to_river('openlab_river/openlab/update', 'update', $user->guid, $openlab->guid);
}




// Now see if we have a file icon
if ((isset($_FILES['icon'])) && (substr_count($_FILES['icon']['type'], 'image/'))) {
    $prefix = "openlabs/" . $openlab->guid;

    $filehandler = new ElggFile();
    $filehandler->owner_guid = $openlab->owner_guid;
    $filehandler->setFilename($prefix . ".jpg");
    $filehandler->open("write");
    $filehandler->write(get_uploaded_file('icon'));
    $filehandler->close();

    $thumbtiny = get_resized_image_from_existing_file($filehandler->getFilenameOnFilestore(), 25, 25, true);
    $thumbsmall = get_resized_image_from_existing_file($filehandler->getFilenameOnFilestore(), 40, 40, true);
    $thumbmedium = get_resized_image_from_existing_file($filehandler->getFilenameOnFilestore(), 100, 100, true);
    $thumblarge = get_resized_image_from_existing_file($filehandler->getFilenameOnFilestore(), 200, 200, false);
    if ($thumbtiny) {

        $thumb = new ElggFile();
        $thumb->owner_guid = $openlab->owner_guid;
        $thumb->setMimeType('image/jpeg');

        $thumb->setFilename($prefix . "tiny.jpg");
        $thumb->open("write");
        $thumb->write($thumbtiny);
        $thumb->close();

        $thumb->setFilename($prefix . "small.jpg");
        $thumb->open("write");
        $thumb->write($thumbsmall);
        $thumb->close();

        $thumb->setFilename($prefix . "medium.jpg");
        $thumb->open("write");
        $thumb->write($thumbmedium);
        $thumb->close();

        $thumb->setFilename($prefix . "large.jpg");
        $thumb->open("write");
        $thumb->write($thumblarge);
        $thumb->close();

        $openlab->icontime = time();
    }
}

system_message(elgg_echo("openlabs:saved"));


forward($openlab->getUrl());

