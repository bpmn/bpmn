<?php

/**
 * mycis
 *
 * @author Stephane Tallard
 */
require_once('lib/cisnode.php');
require_once('actions/cis.php') ; 

function mycis_init() {
    global $CONFIG;

    add_widget_type('mycis', 'CIS', 'My CIS');


    register_page_handler('cis', 'mycis_page_handler');

    add_menu(elgg_echo('mycis:pagetitle'), $CONFIG->wwwroot . 'pg/cis/index/');

    register_elgg_event_handler('pagesetup', 'system', 'mycis_submenus');

    register_action('mycis/view', false, 'C:/wamp/www/boopinn/mod/mycis/actions/view.php');
}

function mycis_page_handler($page) {
    global $CONFIG;

    switch ($page[0]) {
        case 'index':
            include $CONFIG->pluginspath . 'mycis/pages/index.php';
            break;
        // return json 
        case 'cis' :
            $json = getJsonStringCis(get_loggedin_user());
            print $json;
            break;
        case 'mycismembers' : 
            include $CONFIG->pluginspath . 'mycis/pages/mycismembers.php';
            break;
    }

    return TRUE;
}

function mycis_submenus() {
    global $CONFIG;

    if (get_context() == 'cis') { 
        add_submenu_item(elgg_echo('mycis:graphic'), $CONFIG->wwwroot . 'pg/cis/index/');
        add_submenu_item(elgg_echo('mycis:cislist'), $CONFIG->wwwroot . 'pg/cis/mycismembers/');
    }
}

register_elgg_event_handler('init', 'system', 'mycis_init');

function getJsonStringCis($userid) {

    $cis = compute_cis($userid);
    $json = getJsonStringCisObject($cis);
    return $json;
}

function getJsonStringCisObject($cis) {
    $toReturn = "";
    $listofCis = $cis->getSubNodes();

    $toReturnTplte = "{id: '%s',name: '%s', data: {relation: '%s'}, children:[%s]}";
    $groups = CisNode::getGroups($cis->getUser()) ; 
    $link = "http://localhost/boopinn/pg/profile/".$cis->getUser()->name ; 
    $relation = '<a href ="'.$link.'">'.$cis->getUser()->name.'</a>'; 
    $relation = '<p>'.$relation.' is member of:</p><ul>' ; 
    
    foreach ($groups as $group)
    {   
        
        if ($group->owner_guid == $cis->getUser()->guid )
        {
            $ascreator = "as creator" ; 
        }
        else
        {
            $ascreator = "" ;
        }
        if ($group->subtype == "5")
        {
            $link = "http://localhost/boopinn/pg/teams/".$group->guid.'/'.$group->name."/" ; 
            $link = '<a href="'.$link.'">'.$group->name.'</a>' ; 
            $relation .= "<li>team ".$link." ".$ascreator."</li>" ; 
        }
        else
        {
            $link = "http://localhost/boopinn/pg/openlabs/".$group->guid."//" ; 
            $link = '<a href="'.$link.'">'.$group->name.'</a>' ; 
            $relation .= "<li>openlab ".$link." ".$ascreator."</li>" ;
        }
    }
    $relation .= '</ul>' ; 
    return sprintf($toReturnTplte, rand(0, 100000), $cis->getUser()->name, $relation , getJsonStringListOfCis($listofCis));
}

function getJsonStringListOfCis($lstcis) {
    $toReturn = "";
    if (empty($lstcis)) {
        return $toReturn;
    }
    foreach ($lstcis as $cis) {
        $toReturn .= getJsonStringCisObject($cis);
        $toReturn .= ',';
    }
    // take off last ,
    $toReturn[strlen($toReturn) - 1] = " ";
    return $toReturn;
}
