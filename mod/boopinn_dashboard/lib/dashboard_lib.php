<?php
/*
 * Dashboard function Library
 * 
 */
require_once(dirname(dirname(dirname(__FILE__))) . "/mycis/actions/cis.php");

function view_my_cis_river($owner) {
    $title = "<h3>" . sprintf(elgg_echo('dashboard:title:cisactivity')) . "</h3>";
    $entities = compute_groups_in_cis($owner);

    foreach ($entities as $entity) {
        if (!$entity->isMember($owner))
            $guid_list[] = $entity->guid;
    }


    if (is_array($guid_list)) {
        $content = elgg_view_river_items(0, $guid_list, '', '', '', 'create', 10, 0, 0, false);
    } else {

        $content = elgg_echo('dashboard:noactivity');
    }


    return $title . $content;
}

function view_my_group_river($owner_guid, $type, $subtype) {
    $title = "<h3>" . sprintf(elgg_echo('dashboard:title:activity'), $subtype) . "</h3>";
    $entities = elgg_get_entities_from_relationship(array('relationship' => 'member', 'relationship_guid' => (int) $owner_guid, 'inverse_relationship' => FALSE, 'type' => $type, 'subtype' => $subtype, 'limit' => 9999));
    //$guid_list=array();

    foreach ($entities as $entity) {
        $guid_list[] = $entity->guid;
    }

    $files_guid = array();
    $files = elgg_get_entities($options = array('type' => 'object', 'subtype' => 'file', 'container_guids' => $guid_list));
    foreach ($files as $entity_file) {
        $files_guid[] = $entity_file->guid;
    }


    $guid_list = array_merge($guid_list, $files_guid);
    if (is_array($guid_list)) {
        $content = elgg_view_river_items(0, $guid_list, '', '', '', '', 10, 0, 0, false);
    } else {
        $content = elgg_echo('dashboard:noactivity');
    }


    return $title . $content;
}

function view_my_follow_river($owner_guid) {
    $title = "<h3>" . sprintf(elgg_echo('dashboard:title:followactivity')) . "</h3>";
    $entities = elgg_get_entities_from_relationship(array('relationship' => 'follow', 'relationship_guid' => (int) $owner_guid, 'inverse_relationship' => FALSE, 'limit' => 9999));
    //$guid_list=array();

    foreach ($entities as $entity) {
        $guid_list[] = $entity->guid;
    }

    $files_guid = array();
    $files = elgg_get_entities($options = array('type' => 'object', 'subtype' => 'file', 'container_guids' => $guid_list));

    foreach ($files as $entity_file) {
        $files_guid[] = $entity_file->guid;
    }


    $guid_list = array_merge($guid_list, $files_guid);

    if (is_array($guid_list)) {
        if (!$riveritems_objects = get_river_items(0, $guid_list, '', '', '', '', 11, 0, 0, 0))
            $riveritems_objects = array();
        if (!$riveritems_users = get_river_items($guid_list, 0, '', '', '', '', 11, 0, 0, 0))
            $riveritems_users = array();

        $riveritems = array_merge($riveritems_objects, $riveritems_users);
        $riveritems = delete_double_items($riveritems);

        usort($riveritems, "time_created_cmp");
        $content = elgg_view('river/item/list', array(
            'limit' => 10,
            'offset' => 0,
            'items' => $riveritems,
            'pagination' => false
                ));
    } else {
        $content = elgg_echo('dashboard:noactivity');
    }


    return $title . $content;
}

function time_created_cmp($a, $b) {
    $al = (int) $a->posted;
    $bl = (int) $b->posted;
    if ($al == $bl) {
        return 0;
    }
    return ($al < $bl) ? +1 : -1;
}

function delete_double_items($arr) {
    $riveritems[] = $arr[0];
    foreach ($arr as $arr_item) {
        $found = false;
        foreach ($riveritems as $items) {
            if ($arr_item->id == $items->id) {
                $found = true;
                break;
            }
        }
        if (!$found)
            $riveritems[] = $arr_item;
    }

    return $riveritems;
}



function view_users_activity()
{
    $users = elgg_get_entities_from_annotations(array('types' => 'user', 
                                                                      'annotation_names' => 'userscore', 
                                                                      'order_by_annotation' => array( 'direction' => DESC) , 
                                                                      'limit' => 10 ));
    $content = '' ; 
    $tpl =  '<a href="http://localhost/bpmn/pg/profile/%s">%s</a>' ; 
    $annotationstoUser = array() ; 
    foreach ($users as $user)
    {
            $scores = $user->getAnnotations('userscore',1,0 ) ; 
            $score = $scores[0]->value ; 
            
            if ($score != 0)
            {
                if (array_key_exists(  $score,$annotationstoUser ) )
                {
                    array_push($annotationstoUser[$score], $user) ; 
                }
                else
                {
                    $annotationstoUser[$score] = array( $score => $user) ; 
                }; 
            }
    }
    
    krsort($annotationstoUser) ;
    $rank = 1 ; 
    $content = '<div id="userranktitle">'.elgg_echo('dashboard:topthreeuserss').'</div>' ; 
    foreach ($annotationstoUser as $score=>$users)
    {
        foreach ($users as $user)
        {
            $content .=  '<p>'.$rank.'. '.sprintf($tpl , $user->username , $user->username ) .' ('.$score.') </p> '   ;
            $rank += 1 ;
        }
    }
    
    return $content ; 
    
}

?>
