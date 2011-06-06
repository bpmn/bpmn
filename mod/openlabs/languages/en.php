<?php
	/**
	 * Elgg openlabs plugin language pack
	 *
	 * @package Elggopenlabs from ElggGroups
	 */

	$english = array(

		/**
		 * Menu items and titles
		 */

			'openlabs' => "Openlabs",
			'openlabs:owned' => "Openlabs you own",
			'openlabs:yours' => "Your openlabs",
			'openlabs:user' => "%s's openlabs",
			'openlabs:all' => "All site openlabs",
			'openlabs:new' => "Create a new openlab",
			'openlabs:edit' => "Edit openlab",
			'openlabs:delete' => 'Delete openlab',
			'openlabs:membershiprequests' => 'Manage join requests',
			'openlabs:invitations' => 'Openlab invitations',
                        'openlabs:suggestions' => 'Openlab suggestions',

			'openlabs:icon' => 'Openlab icon (leave blank to leave unchanged)',
			'openlabs:name' => 'Openlab name',
			'openlabs:username' => 'Openlab short name (displayed in URLs, alphanumeric characters only)',
			'openlabs:description' => 'Description',
			'openlabs:briefdescription' => 'Brief description',
			'openlabs:interests' => 'Tags',
			'openlabs:website' => 'Website',
			'openlabs:members' => 'Openlab members',
			'openlabs:membership' => "openlab membership permissions",
			'openlabs:access' => "Access permissions",
			'openlabs:owner' => "Owner",
			'openlabs:widget:num_display' => 'Number of openlabs to display',
			'openlabs:widget:membership' => 'openlab membership',
			'openlabs:widgets:description' => 'Display the openlabs you are a member of on your profile',
			'openlabs:noaccess' => 'No access to openlab',
			'openlabs:cantedit' => 'You can not edit this openlab',
			'openlabs:saved' => 'openlab saved',
			'openlabs:featured' => 'Featured openlabs',
			'openlabs:makeunfeatured' => 'Unfeature',
			'openlabs:makefeatured' => 'Make featured',
			'openlabs:featuredon' => 'You have made this openlab a featured one.',
			'openlabs:unfeature' => 'You have removed this openlab from the featured list',
			'openlabs:joinrequest' => 'Request membership',
			'openlabs:join' => 'Join openlab',
			'openlabs:leave' => 'Leave openlab',
			'openlabs:invite' => 'Invite people',
			'openlabs:inviteto' => "Invite friends to '%s'",
			'openlabs:nofriends' => "You have no friends left who have not been invited to this openlab.",
			'openlabs:viaopenlabs' => "via openlabs",
			'openlabs:openlab' => "openlab",
			'openlabs:search:tags' => "tag",

			'openlabs:memberlist' => "openlab members",
			'openlabs:membersof' => "Members of %s",
			'openlabs:members:more' => "View more members",

			'openlabs:notfound' => "openlab not found",
			'openlabs:notfound:details' => "The requested openlab either does not exist or you do not have access to it",

			'openlabs:requests:none' => 'There are no outstanding membership requests at this time.',

			'openlabs:invitations:none' => 'There are no outstanding invitations at this time.',

			'item:object:openlabforumtopic' => "Discussion topics",

			'openlabforumtopic:new' => "New discussion post",

			'openlabs:count' => "openlabs created",
			'openlabs:open' => "open openlab",
			'openlabs:closed' => "closed openlab",
			'openlabs:member' => "members",
			'openlabs:searchtag' => "Search for openlabs by tag",


			/*
			 * Access
			 */
			'openlabs:access:private' => 'Closed - Users must be invited',
			'openlabs:access:public' => 'Open - Any user may join',
			'openlabs:closedopenlab' => 'This openlab has a closed membership.',
			'openlabs:closedopenlab:request' => 'To ask to be added, click the "request membership" menu link.',
			'openlabs:visibility' => 'Who can see this openlab?',

			/*
			openlab tools
			*/
			'openlabs:enablepages' => 'Enable openlab pages',
			'openlabs:enableforum' => 'Enable openlab discussion',
			'openlabs:enablefiles' => 'Enable openlab files',
			'openlabs:yes' => 'yes',
			'openlabs:no' => 'no',

			'openlab:created' => 'Created %s with %d posts',
			'openlabs:lastupdated' => 'Last updated %s by %s',
			'openlabs:lastcomment' => 'Last comment %s by %s',
			'openlabs:pages' => 'openlab pages',
			'openlabs:files' => 'openlab files',

			/*
			openlab forum strings
			*/

			'openlab:replies' => 'Replies',
			'openlabs:forum' => 'openlab discussion',
			'openlabs:addtopic' => 'Add a topic',
			'openlabs:forumlatest' => 'Latest discussion',
			'openlabs:latestdiscussion' => 'Latest discussion',
			'openlabs:newest' => 'Newest',
			'openlabs:popular' => 'Popular',
			'openlabspost:success' => 'Your comment was succesfully posted',
			'openlabs:alldiscussion' => 'Latest discussion',
			'openlabs:edittopic' => 'Edit topic',
			'openlabs:topicmessage' => 'Topic message',
			'openlabs:topicstatus' => 'Topic status',
			'openlabs:reply' => 'Post a comment',
			'openlabs:topic' => 'Topic',
			'openlabs:posts' => 'Posts',
			'openlabs:lastperson' => 'Last person',
			'openlabs:when' => 'When',
			'openlabtopic:notcreated' => 'No topics have been created.',
			'openlabs:topicopen' => 'Open',
			'openlabs:topicclosed' => 'Closed',
			'openlabs:topicresolved' => 'Resolved',
			'openlabtopic:created' => 'Your topic was created.',
			'openlabstopic:deleted' => 'The topic has been deleted.',
			'openlabs:topicsticky' => 'Sticky',
			'openlabs:topicisclosed' => 'This topic is closed.',
			'openlabs:topiccloseddesc' => 'This topic has now been closed and is not accepting new comments.',
			'openlabtopic:error' => 'Your openlab topic could not be created. Please try again or contact a system administrator.',
			'openlabs:forumpost:edited' => "You have successfully edited the forum post.",
			'openlabs:forumpost:error' => "There was a problem editing the forum post.",
			'openlabs:privateopenlab' => 'This openlab is closed. Requesting membership.',
			'openlabs:notitle' => 'openlabs must have a title',
			'openlabs:cantjoin' => 'Can not join openlab',
			'openlabs:cantleave' => 'Could not leave openlab',
			'openlabs:addedtoopenlab' => 'Successfully added the user to the openlab',
			'openlabs:joinrequestnotmade' => 'Could not request to join openlab',
			'openlabs:joinrequestmade' => 'Requested to join openlab',
			'openlabs:joined' => 'Successfully joined openlab!',
			'openlabs:left' => 'Successfully left openlab',
			'openlabs:notowner' => 'Sorry, you are not the owner of this openlab.',
			'openlabs:notmember' => 'Sorry, you are not a member of this openlab.',
			'openlabs:alreadymember' => 'You are already a member of this openlab!',
			'openlabs:userinvited' => 'User has been invited.',
			'openlabs:usernotinvited' => 'User could not be invited.',
            		'openlabs:usersuggested' => 'User has been suggested.',
			'openlabs:usernotsuggested' => 'User could not be suggested.',
			'openlabs:useralreadysuggested' => 'the openlab %s has already been suggested to the %s',
            		'openlabs:useralreadyinvited' => '%s has already been invited to the openlab %s',
			'openlabs:useralreadymember' => '%s is already a member of the openlab %s',
			'openlabs:updated' => "Last comment",
			'openlabs:invite:subject' => "%s you have been invited to join %s!",
			'openlabs:started' => "Started by",
			'openlabs:joinrequest:remove:check' => 'Are you sure you want to remove this join request?',
			'openlabs:invite:remove:check' => 'Are you sure you want to remove this invite?',
			'openlabs:invite:body' => "Hi %s,

%s invited you to join the '%s' openlab. Click below to view your invitations:

%s",
                        'openlabs:suggest:subject' => "%s you have been suggested the openlab %s!",
			'openlabs:suggest:body' => "Hi %s,

%s suggested you to join the '%s' openlab. Click below to view the suggestion:

%s",
			'openlabs:welcome:subject' => "Welcome to the %s openlab!",
			'openlabs:welcome:body' => "Hi %s!

You are now a member of the '%s' openlab! Click below to begin posting!

%s",

			'openlabs:request:subject' => "%s has requested to join %s",
			'openlabs:request:body' => "Hi %s,

%s has requested to join the '%s' openlab. Click below to view their profile:

%s

or click below to view the openlab's join requests:

%s",

			/*
				Forum river items
			*/

			'openlabs:river:member' => '%s is now a member of',
			'openlabs:river:create' => '%s has created the openlab',
			'openlabforum:river:updated' => '%s has updated',
			'openlabforum:river:update' => 'this discussion topic',
			'openlabforum:river:created' => '%s has created',
			'openlabforum:river:create' => 'a new discussion topic titled',
			'openlabforum:river:posted' => '%s has posted a new comment',
			'openlabforum:river:annotate:create' => 'on this discussion topic',
			'openlabforum:river:postedtopic' => '%s has started a new discussion topic titled',
			'openlabs:river:toopenlab' => 'to the openlab',

			'openlabs:nowidgets' => 'No widgets have been defined for this openlab.',


			'openlabs:widgets:members:title' => 'openlab members',
			'openlabs:widgets:members:description' => 'List the members of a openlab.',
			'openlabs:widgets:members:label:displaynum' => 'List the members of a openlab.',
			'openlabs:widgets:members:label:pleaseedit' => 'Please configure this widget.',

			'openlabs:widgets:entities:title' => "Objects in openlab",
			'openlabs:widgets:entities:description' => "List the objects saved in this openlab",
			'openlabs:widgets:entities:label:displaynum' => 'List the objects of a openlab.',
			'openlabs:widgets:entities:label:pleaseedit' => 'Please configure this widget.',

			'openlabs:forumtopic:edited' => 'Forum topic successfully edited.',

			'openlabs:allowhiddenopenlabs' => 'Do you want to allow private (invisible) openlabs?',

			/**
			 * Action messages
			 */
			'openlab:deleted' => 'openlab and openlab contents deleted',
			'openlab:notdeleted' => 'openlab could not be deleted',

			'openlabpost:deleted' => 'openlab posting successfully deleted',
			'openlabpost:notdeleted' => 'openlab posting could not be deleted',
			'openlabstopic:deleted' => 'Topic deleted',
			'openlabstopic:notdeleted' => 'Topic not deleted',
			'openlabtopic:blank' => 'No topic',
			'openlabtopic:notfound' => 'Could not find the topic',
			'openlabpost:nopost' => 'Empty post',
			'openlabs:deletewarning' => "Are you sure you want to delete this openlab? There is no undo!",

			'openlabs:invitekilled' => 'The invite has been deleted.',
                        'openlabs:suggestkilled' => 'The suggestion has been deleted.',
			'openlabs:joinrequestkilled' => 'The join request has been deleted.',

                        // rate
                        'openlab:rateannotation' => 'The author of the comment has been sucessfully rated '
                );

	add_translation("en",$english);
?>
