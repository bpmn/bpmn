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

        $comments = elgg_get_entities(array('types' => 'object',
            'subtypes' => BoopinnComment::getSubTypeName(),
            'container_guids' => $topicGuid,
            'limit' => ELGG_ENTITIES_ANY_VALUE,
            'count' => $count));

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

    public function getRating() {

        // read annotation rating 
        $annotationRating = $this->getAnnotations('commentrating', 1, 0, desc);

        // read value 
        $rating = $annotationRating[0]->value;

        if ($rating) {
            return $rating;
        } else {
            return 0;
        }

        return $rating;
    }

    /**
     * return comments ordered by their rating 
     */
    public static function getRatedComments($minValue) {
        
        // find comments having annotations 
        $comments = elgg_get_entities_from_annotations(array('types' => 'object',
                                                                                           'subtypes' => BoopinnComment::getSubTypeName(),
                                                                                           'annotation_names'=> 'rating')); 
        
        $maxComments = array() ; 
        
        foreach ($comments as $comment)
        {
            if ($comment->getRating() >= $minValue) 
            {
                array_push($maxComments , $comment) ; 
            }
        }
        
        uksort($maxComments , "compareCommentByRating") ; 
        
        return $maxComments;
        
        
    }

}

function compareCommentByRating($comment1 , $comment2) 
{
    $rating1 = $comment1->getRating() ; 
    $rating2  = $comment2->getRating() ; 
    
    
    if ($rating1 > $rating2)
    {
        return 1 ; 
    }
    else if ($rating1 < $rating2) 
    {
        return -1 ; 
    }
    else 
    {
        return 0 ; 
    }
}

?>
