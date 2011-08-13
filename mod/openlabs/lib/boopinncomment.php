<?php

/**
 *  Boopin comment (STD on 14/07/2011) 
 */
class BoopinnComment extends ElggObject {

    protected function initialise_attributes() {
        parent::initialise_attributes();
        $this->attributes['subtype'] = BoopinnComment::getSubTypeName();
    }

    public function __construct($guid = null) {
        parent::__construct($guid);
    }

    public static function create($authorGuid, $topicGuid, $comment) {

        $boopinComment = new BoopinnComment();
        $boopinComment->owner_guid = $authorGuid;
        $boopinComment->container_guid = $topicGuid;
        $boopinComment->post = $comment;
        return $boopinComment;
    }

    /**
     * find all comments in that $topic 
     * @param type $topicGuid 
     * @count if true return count otherwise return list. 
     */
    public static function getCommentsByTopic($topicGuid, $count = FALSE) {


        $ignoreacess = elgg_get_ignore_access();

        // discussion is public 
        elgg_set_ignore_access(True);

        $comments = elgg_get_entities(array('types' => 'object',
            'subtypes' => BoopinnComment::getSubTypeName(),
            'container_guids' => $topicGuid,
            'limit' => ELGG_ENTITIES_ANY_VALUE,
            'count' => $count));

        elgg_set_ignore_access($ignoreaccess);

        return $comments;
    }

    public function findGroupId() {
        $topicGuid = $this->getTopicGuid();
        $topic = get_entity($topicGuid);
        $openlabGuid = $topic->container_guid;
        return $openlabGuid;
    }

    public function getTopicGuid() {
        return $this->container_guid;
    }

    public function getComment() {
        return $this->post;
    }

    public function getAuthorId() {
        return $this->owner_guid;
    }

    public static function getSubTypeName() {
        return 'boopinncomment';
    }

    public static function getEntity($guid) {

        $ignoreacess = elgg_get_ignore_access();

        // discussion is public 
        elgg_set_ignore_access(True);

        $entity = get_entity($guid);

        elgg_set_ignore_access($ignoreacess);

        return $entity;
    }

    public function getRating() {

        $ignoreacess = elgg_get_ignore_access();

        // discussion is public 
        elgg_set_ignore_access(True);
        // read annotation rating 
        $annotationRating = $this->getAnnotations('commentrating', 1, 0, desc);


        $ignoreacess = elgg_get_ignore_access($ignoreacess);
        // read value 
        $rating = $annotationRating[0]->value;

        if ($rating) {
            return $rating;
        } else {
            return 0;
        }

        return $rating;
    }

    public function positiveRate($userId) {

        $ignoreacess = elgg_get_ignore_access();

        // discussion is public 
        elgg_set_ignore_access(True);        
        
        $hasVotedRelationship = check_entity_relationship($this->getGUID(), "hasvoted", $userId);

        if ($hasVotedRelationship) {
            return -1;
        } else {
            // read annotation rating 
            $annotationRating = $this->getAnnotations('commentrating', 1, 0, desc);

            // read value 
            $rating = $annotationRating[0]->value;

            if ($rating) {
                // if found clear all annotations
                $this->clearAnnotations('commentrating');
                // create new 
                $this->annotate('commentrating', $rating + 1);
                // create relationships 
                add_entity_relationship($this->getGUID(), "hasvoted", $userId);
                add_entity_relationship($this->getGUID(), "usercomment", $this->getAuthorId());
            } 
            else
            {
                 // create new 
                $this->annotate('commentrating',  1);
                // create relationships
                add_entity_relationship($this->getGUID(), "hasvoted", $userId);
                add_entity_relationship($this->getGUID(), "usercomment", $this->getAuthorId());
            }

        }
         elgg_set_ignore_access($ignoreacess);  
    }

    public function negativeRate($userId) {

        
        $ignoreacess = elgg_get_ignore_access();

        // discussion is public 
        elgg_set_ignore_access(True);   
        
        // read annotation rating 
        $annotationRating = $this->getAnnotations('commentrating', 1, 0, desc);

        // read value 
        $rating = $annotationRating[0]->value;

        if ($rating) {

            if ($rating > 0) {
                // if found clear all annotations
                $this->clearAnnotations('commentrating');
                // create new 
                $this->annotate('commentrating', $rating - 1);

                if (($rating - 1) == 0) {
                    // remove association between comment and user 
                    remove_entity_relationship($this->getGUID(), "hasvoted", $userId);
                }
            }
        }
        
        elgg_set_ignore_access($ignoreacess);  
    }

    /**
     * return comments ordered by their rating 
     */
    public static function getRatedCommentsInTopic($topicGuid) {


        $ignoreacess = elgg_get_ignore_access();

        // discussion is public 
        elgg_set_ignore_access(True);

        // find comments having annotations 
        $comments = elgg_get_entities_from_annotations(array('types' => 'object',
            'subtypes' => BoopinnComment::getSubTypeName(),
            'container_guids' => $topicGuid,
            'annotation_names' => 'commentrating'));

        usort($comments, "compareCommentByRating");

        // discussion is public 
        elgg_set_ignore_access($ignoreacess);

        return $comments;
    }

}

function compareCommentByRating($comment1, $comment2) {
    $rating1 = $comment1->getRating();
    $rating2 = $comment2->getRating();


    if ($rating1 > $rating2) {
        return -1;
    } else if ($rating1 < $rating2) {
        return 1;
    } else {
        return 0;
    }
}

?>
