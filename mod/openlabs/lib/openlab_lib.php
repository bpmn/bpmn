<?php

/*
 * Fonctions used by the Openlab  module
 *
 */
require_once( dirname(__FILE__). "/boopinncomment.php" );

function list_joinrequest_openlabs($user) {
    $list_joinrequest = array();
    $options = array('relationship' => 'membership_request',
        'relationship_guid' => 'NULL',
        'inverse_relationship' => True,
    );

    foreach ($openlabs = elgg_get_entities(array('types' => 'group', 'subtypes' => 'openlab', 'owner_guids' => $user->getGUID()))as $openlab) {
        $options['relationship_guid'] = $openlab->getGUID();
        $user_req = elgg_get_entities_from_relationship($options);
        if ($user_req)
            $list_joinrequest[(string) $openlab->guid] = $user_req;
    }

    if ($list_joinrequest)
        return $list_joinrequest;
    else
        return NULL;
}

function get_user_ranking($userId) {


    $ignoreacess = elgg_get_ignore_access();

    // discussion is public 
    elgg_set_ignore_access(True);

    // find all user posts 
    $userPosts = elgg_get_entities_from_relationship(array('relationship' => 'usercomment',
        'relationship_guid' => $userId,
        'inverse_relationship' => True, 
        'type'=>'object', 
        'subtype'=> BoopinnComment::getSubTypeName(),
         'limit' => ELGG_ENTITIES_NO_VALUE));

    $userRanking = 0;
    
    $processedOpenLab = array() ; 

    foreach ($userPosts as $post) {

        // find openlab Id 
        $openlabGuid = $post->findGroupId() ; 
        
       if (array_key_exists($openlabGuid, $processedOpenLab))
       {
           // open lab yet processed 
           continue ; 
       }
       else
       {
           $processedOpenLab[$openlabGuid] = 1 ; 
        }
        
        // find comments of the topic 
        $orderedPosts = BoopinnComment::getRatedCommentsInTopic($post->getTopicGuid());
        
        $rank = 0 ; 
        
        foreach ($orderedPosts as $orderedPost)
        {
             $var = $orderedPost->post ; 
            if (($orderedPost->getGUID() == $post->getGUID()) ) 
            {
                // found post 
                switch  ($rank)
                {
                    case 0 : 
                        $userRanking += 3;
                        break ; 
                   case 1: 
                        $userRanking += 2;
                        break ; 
                   case 2:
                        $userRanking += 1;
                        break ;                       
                }
            }
            $rank += 1 ; 
        }
        
    }
    
    // discussion is public 
    elgg_set_ignore_access($ignoreacess);
    
    return $userRanking;
}

?>
