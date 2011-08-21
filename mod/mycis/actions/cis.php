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
 *  return a list of users 
 * @param type $userid
 * @return an array of CisNode objects 
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


/**
 * Compute the creative Space of an user . 
 * @param type $user an User
 */
function compute_groups_in_cis($user) {

    $groups = compute_closest_groups($user);
    
    if (!groups)
    {
        return false ; 
    }
    
    
    $toReturn = array() ; 
    $foundUsers = array() ; 
    
   $toReturn = register_objects_by_guid($toReturn, $groups) ; 

    foreach ($groups as $group) {

        // find members 
        $members  = $group->getMembers(ELGG_ENTITIES_NO_VALUE, 0, false); 
        $foundGroups = array() ; 
        
        foreach ($members as $member)
        {
            if (!isset($foundUsers[$member->guid] ))
            {
                  $foundGroups = compute_closest_groups($member) ;
                 $toReturn  =  register_objects_by_guid($toReturn , $foundGroups) ; 
            }
        }
    }
    return $toReturn ;
}

/**
 * register $groups in disctionary. If object is in dictionary don't register twice. 
 * @param type $dictionary
 * @param type $objects
 * @return dictionary
 */
function register_objects_by_guid($dictionary, $objects)
{
    foreach ($objects as $object)
    {
        if (!isset($dictionary[$object-guid]))
        {
            $dictionary[$object->guid] = $object ; 
        }
    }
    return $dictionary ; 
}


/**
 *  return a list of groups user belongs to 
 * @param type $userid
 * @return an array of CisNode objects 
 */
function compute_closest_groups($user) {

    // find the teams $user is member of 
    $teams = elgg_get_entities_from_relationship(array('relationship' => 'member',
        'relationship_guid' => $user->guid,
        'inverse_relationship' => FALSE,
        'types' => 'group',
        'subtypes' => 'teams',
        'limit' => ELGG_ENTITIES_NO_VALUE
            ));


    // find the openlabs I'm member of 
    $openlabs = elgg_get_entities_from_relationship(array('relationship' => 'member',
        'relationship_guid' =>  $user->guid,
        'inverse_relationship' => FALSE,
        'types' => 'group',
        'subtypes' => 'openlab',
        'limit' => ELGG_ENTITIES_NO_VALUE
            ));


    if ($teams)
    {
        if ($openlabs)
        {
            
            return array_merge( $teams , $openlabs );
        }
        else
        {
            return $teams ; 
        }
    }
    else
    {
        
        if ($openlabs)
        {
            return $openlabs ; 
        }
        else
        {
            return false ; 
        }
    }
}



?>
