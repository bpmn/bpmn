<?php
	/**
	 * Elgg team plugin
	 *
	 * @package ElggGroups
	 */

	require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");

        $limit = get_input("limit", 10);
	$offset = get_input("offset", 0);
	$tag = get_input("tag");
        $username=get_input("username");
	$filter = get_input("filter");
        $user=get_user_by_username($username);
        if (!$filter) {
		// owner team is the default
		$filter = "profiles";
	}

        // Get objects
	$context = get_context();
        set_context($context);
		switch($filter){
			case "profiles":
                        $objects=elgg_get_entities_from_relationship(array('relationship'=>'follow','relationship_guid'=>$user->guid,'types'=>'user','count'=>false));
			$entities_count = elgg_get_entities_from_relationship(array('relationship'=>'follow','relationship_guid'=>$user->guid,'types'=>'user','count'=>TRUE));
                        $type_name="Users";
                        break;

			case "teams":
                        //set_context('search');
                        // offset is grabbed in the list_entities_from_relationship() function
                        $objects = elgg_get_entities_from_relationship(array('relationship'=>'follow','relationship_guid'=>$user->guid,'types'=>'group','subtypes'=>'teams','count'=>false));
			$entities_count = elgg_get_entities_from_relationship(array('relationship'=>'follow','relationship_guid'=>$user->guid,'types'=>'group','subtypes'=>'teams','count'=>TRUE));
                        $type_name="Teams";
                        break;

                        case "openlabs":
                        $objects = elgg_get_entities_from_relationship(array('relationship'=>'follow','relationship_guid'=>$user->guid,'types'=>'group','subtypes'=>'openlab','count'=>false));
			$entities_count = elgg_get_entities_from_relationship(array('relationship'=>'follow','relationship_guid'=>$user->guid,'types'=>'group','subtypes'=>'openlab','count'=>TRUE));
                        $type_name="OpenLabs";
                        break;

		}
        set_context($context);
	$title = sprintf(elgg_echo("follow:isfollowing"),$user->name);
	$area2 = elgg_view_title($title);
        $view_objects=elgg_view('follow/follow',array('follow' => $objects));
	$area2 .= elgg_view('follow/contentwrapper', array('body' => elgg_view('follow/follow_sort_menu', array("count" => $entities_count, "filter" => $filter,"type_name"=>$type_name)) . $view_objects));
	$body = elgg_view_layout('one_column',$area2);

	// Finally draw the page
	page_draw($title, $body);



?>