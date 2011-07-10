<?php

/**
 * return a list of users belonging to user cis 
 * @param type $user object 
 */
function get_users_in_cis($user) {
    
    $mycisusers = array() ; 
    $cis = compute_cis($user);
    
    foreach ($cis->getSubNodes() as $node) {
        if (!isset($mycisusers[$node->getUser()->name])) {
            $mycisusers[$node->getUser()->name] = $node->getUser();
        }
        foreach ($node->getsubNodes() as $nodenode) {
            if (!isset($mycisusers[$nodenode->getUser()->name])) {
                $mycisusers[$nodenode->getUser()->name] = $nodenode->getUser();
            }
        }
    }
    return $mycisusers ; 
}

/**
 * Compute the creative Space of an user . 
 * @param type $user an User
 */
function compute_cis($user) {

    $rootNode = compute_closest_space($user);
    $toReturn = array();

    foreach ($rootNode->getSubNodes() as $node) {
        $foundCisLinkNeighbours = compute_closest_space($node->getUser());

        foreach ($foundCisLinkNeighbours->getSubNodes() as $foundCisLinkNeighbour) {
            if ($foundCisLinkNeighbour->getUser()->guid != $user->guid) {
                $node->addUser($foundCisLinkNeighbour->getUser());
            }
        }
    }


    return $rootNode;
}

/**
 *
 * @param type $userid
 * @return an array of CisLink objects 
 */
function compute_closest_space($user) {

    $rootNode = new CisNode();
    $rootNode->setUser($user);

    // find the teams $user is member of 
    $teams = elgg_get_entities_from_relationship(array('relationship' => 'member',
        'relationship_guid' => $user->guid,
        'inverse_relationship' => FALSE,
        'types' => 'group',
        'subtypes' => 'teams',
        'limit' => ELGG_ENTITIES_NO_VALUE
            ));


    foreach ($teams as $team) {
        // find all users 
        $teamsMembers = $team->getMembers(ELGG_ENTITIES_NO_VALUE, 0, false);

        foreach ($teamsMembers as $teamMember) {
            $rootNode->addUser($teamMember);
            CisNode::registerUserGroup($teamMember, $team) ; 
        }
    }
   
    // find the openlabs I'm member of 
    $openlabs = elgg_get_entities_from_relationship(array('relationship' => 'member',
        'relationship_guid' =>  $user->guid,
        'inverse_relationship' => FALSE,
        'types' => 'group',
        'subtypes' => 'openlab',
        'limit' => ELGG_ENTITIES_NO_VALUE
            ));

    foreach ($openlabs as $openlab) {
        // find all users 
        $openlabsMembers = $openlab->getMembers(ELGG_ENTITIES_NO_VALUE, 0, false);

        foreach ($openlabsMembers as $openlabMember) {
            $rootNode->addUser($openlabMember);
            CisNode::registerUserGroup($openlabMember, $openlab) ; 
        }
    }

    return $rootNode;
}

?>
