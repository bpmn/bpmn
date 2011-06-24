<?php
/* 
 * Fonctions used by the Team  module
 * 
 */

function list_joinrequest_teams($user){
    $list_joinrequest=array();
    $options=array(  'relationship' => 'membership_request',
                    'relationship_guid' => 'NULL',
                    'inverse_relationship' => True,
         
                   
        );
    
    foreach ($teams=elgg_get_entities(array('types'=>'group','subtypes'=>'teams','owner_guids'=>$user->getGUID()))as $team){
        $options['relationship_guid']=$team->getGUID();
        $user_req=elgg_get_entities_from_relationship($options) ;
        if ($user_req)
            $list_joinrequest[(string)$team->guid]=$user_req;

    }

    if($list_joinrequest)
        return $list_joinrequest;
    else
        return NULL;

}






?>
