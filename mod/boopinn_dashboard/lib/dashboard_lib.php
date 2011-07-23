<?php
/* 
 * Dashboard function Library
 * 
 */
require_once(dirname(dirname(dirname(__FILE__))) . "/mycis/actions/cis.php");


function view_my_cis_river($owner){
    $title= "<h3>".sprintf(elgg_echo('dashboard:title:cisactivity'))."</h3>";
    $entities = compute_groups_in_cis($owner);

    foreach($entities as $entity){
       if(!$entity->isMember($owner))
            $guid_list[]=$entity->guid;
    }

 
    if (is_array($guid_list)){
        $content= elgg_view_river_items($subject_guid = 0, $object_guid = $guid_list, $subject_relationship = '', $type = '',
                                     $subtype = '', $action_type = 'create', $limit = 10, $offset = 0, $posted_min = 0, $posted_max = 0) ;
    }
        else {

        $content= elgg_echo('dashboard:noactivity');
                        }


    return $title.$content;
 }
function view_my_group_river($owner_guid,$type,$subtype){
    $title= "<h3>".sprintf(elgg_echo('dashboard:title:activity'),$subtype)."</h3>";
    $entities = elgg_get_entities_from_relationship(array('relationship' => 'member', 'relationship_guid' => (int)$owner_guid, 'inverse_relationship' => FALSE,'type'=>$type,'subtype'=>$subtype, 'limit' => 9999));
    //$guid_list=array();
    
    foreach($entities as $entity){
       $guid_list[]=$entity->guid;
    }

    $files_guid=array();
    $files=elgg_get_entities($options = array('type'=>'object','subtype'=>'file','container_guids'=>$guid_list));
    foreach($files as $entity_file){
            $files_guid[]=$entity_file->guid;
        }
    

    $guid_list= array_merge($guid_list, $files_guid);
    if (is_array($guid_list)){
        $content= elgg_view_river_items($subject_guid = 0, $object_guid = $guid_list, $subject_relationship = '', $type = '',
                                     $subtype = '', $action_type = '', $limit = 10, $offset = 0, $posted_min = 0, $posted_max = 0) ;
    }
        else {
     
        $content= elgg_echo('dashboard:noactivity');
                        }


    return $title.$content;
 }



?>
