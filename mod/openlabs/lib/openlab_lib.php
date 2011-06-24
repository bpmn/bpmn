<?php
/*
 * Fonctions used by the Openlab  module
 *
 */

function list_joinrequest_openlabs($user){
    $list_joinrequest=array();
    $options=array(  'relationship' => 'membership_request',
                    'relationship_guid' => 'NULL',
                    'inverse_relationship' => True,


        );

    foreach ($openlabs=elgg_get_entities(array('types'=>'group','subtypes'=>'openlab','owner_guids'=>$user->getGUID()))as $openlab){
        $options['relationship_guid']=$openlab->getGUID();
        $user_req=elgg_get_entities_from_relationship($options) ;
        if ($user_req)
            $list_joinrequest[(string)$openlab->guid]=$user_req;

    }

    if($list_joinrequest)
        return $list_joinrequest;
    else
        return NULL;

}






?>
