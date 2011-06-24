<?php
	/**
	 * Manage group invite requests.
	 * 
	 * @package ElggGroups
	 */

	require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");
        require_once(dirname(__FILE__)."/lib/openlab_lib.php") ;
	gatekeeper();
	
	$username = get_input('username');
        $user=get_user_by_username($username);
	$list_reqs=list_joinrequest_openlabs($user);
        set_page_owner($user->guid);

	
        if (($list_reqs))
		
		//$requests = elgg_get_entities_from_relationship(array('relationship' => 'membership_request', 'relationship_guid' => $group_guid, 'inverse_relationship' => TRUE, 'limit' => 9999));
            $area2 .= elgg_view('openlabs/membershiprequests_list',array('requests' => $list_reqs));
			 
	 else 
            $area2 .= elgg_echo('requestnotifications:norequests');
	
	

       
        $body = elgg_view_layout('two_column_left_sidebar', $area1, $area2);
	
	page_draw(elgg_echo('requestnotifications:title'),$body);
?>