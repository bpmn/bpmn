<?php

include("cislink.php");

class CisNode {

    // a set of cosNode for teams relationship 
    private $lstSubNodes = array();
    // owns a relationship 
    //               *
    // $user->guid ----> $group 
    static $lstGroups = array();
    // the user 
    private $user;

    public function getUser() {
        return $this->user;
    }

    public function setUser($user) {
        $this->user = $user;
    }

    public function getCisLink() {
        return $this->cislink;
    }

    public function setCisLink($cislink) {
        $this->cislink = $cislink;
    }

    public function getSubNodes() {
        return $this->lstSubNodes;
    }

    /**
     * add a user 
     * TO DO : don't add twice the same group 
     * @param type $group  
     */
    public function addUser($user) {

        if ($this->user->guid != $user->guid) {
            $newNode = new CisNode();
            $newNode->setUser($user);
            $this->lstSubNodes[$user->name] = $newNode;
        }
    }

    public static function registerUserGroup($user, $group) {

        if (!isset(self::$lstGroups[$user->guid])) {
            self::$lstGroups[$user->guid] = array();
        }
        // don't add twice the same group 
        $found = false;
        foreach (self::$lstGroups[$user->guid] as $aGroup) {
            if ($aGroup->guid == $group->guid) {
                $found = true;
                break ; 
            }
        }
        if (!$found) {
            array_push(self::$lstGroups[$user->guid], $group);
        }
    }

    public static function getGroups($user) {
        return self::$lstGroups[$user->guid];
    }

}

?>
