<?php
	/**
	 * Elgg teams plugin language pack
	 *
	 * @package Elggteams
	 */

	$english = array(

		/**
		 * Menu items and titles
		 */

			'teams' => "Teams",
			'teams:owned' => "Teams you own",
			'teams:yours' => "Your teams",
			'teams:user' => "%s's teams",
			'teams:all' => "All site teams",
			'teams:new' => "Create a new team",
			'teams:edit' => "Edit team",
			'teams:delete' => 'Delete team',
			'teams:membershiprequests' => 'Manage join requests',
			'teams:invitations' => 'Team invitations',

			'teams:icon' => 'Team icon (leave blank to leave unchanged)',
			'teams:name' => 'Team name',
			'teams:username' => 'Team short name (displayed in URLs, alphanumeric characters only)',
			'teams:description' => 'Description',
			'teams:briefdescription' => 'Brief description',
			'teams:interests' => 'Tags',
			'teams:website' => 'Website',
			'teams:members' => 'Team members',
			'teams:membership' => "Team membership permissions",
			'teams:access' => "Access permissions",
			'teams:owner' => "Owner",
			'teams:widget:num_display' => 'Number of teams to display',
			'teams:widget:membership' => 'Team membership',
			'teams:widgets:description' => 'Display the teams you are a member of on your profile',
			'teams:noaccess' => 'No access to team',
			'teams:cantedit' => 'You can not edit this team',
			'teams:saved' => 'Team saved',
			'teams:featured' => 'Featured teams',
			'teams:makeunfeatured' => 'Unfeature',
			'teams:makefeatured' => 'Make featured',
			'teams:featuredon' => 'You have made this team a featured one.',
			'teams:unfeature' => 'You have removed this team from the featured list',
			'teams:joinrequest' => 'Request membership',
			'teams:join' => 'Join team',
			'teams:leave' => 'Leave team',
			'teams:invite' => 'Invite People',
			'teams:inviteto' => "Invite user to '%s'",
			'teams:nofriends' => "You have no userss left who have not been invited to this team.",
			'teams:viateams' => "via teams",
			'teams:group' => "Team",
			'teams:search:tags' => "tag",

			'teams:memberlist' => "Team members",
			'teams:membersof' => "Members of %s",
			'teams:members:more' => "View more members",

			'teams:notfound' => "Team not found",
			'teams:notfound:details' => "The requested team either does not exist or you do not have access to it",

			'teams:requests:none' => 'There are no outstanding membership requests at this time.',

			'teams:invitations:none' => 'There are no outstanding invitations at this time.',


			

			'teams:count' => "teams created",
			'teams:open' => "open team",
			'teams:closed' => "closed team",
			'teams:member' => "members",
			'teams:searchtag' => "Search for teams by tag",


			/*
			 * Access
			 */
			'teams:access:private' => 'Closed - Users must be invited',
			'teams:access:public' => 'Open - Any user may join',
			'teams:closedgroup' => 'This team has a closed membership.',
			'teams:closedteam:request' => 'To ask to be added, click the "request membership" menu link.',
			'teams:visibility' => 'Who can see this team?',

			/*
			team tools
			*/
			'teams:enablepages' => 'Enable team pages',
			'teams:enableforum' => 'Enable team discussion',
			'teams:enablefiles' => 'Enable team files',
			'teams:yes' => 'yes',
			'teams:no' => 'no',

			'teams:created' => 'Created %s with %d posts',
			'teams:lastupdated' => 'Last updated %s by %s',
			'teams:lastcomment' => 'Last comment %s by %s',
			'teams:pages' => 'team pages',
			'teams:files' => 'team files',

			/*
			team forum strings
			*/

			'teams:forum' => 'team discussion',
			'teams:addtopic' => 'Add a topic',
			'teams:forumlatest' => 'Latest discussion',
			'teams:latestdiscussion' => 'Latest discussion',
			'teams:newest' => 'Newest',
			'teams:popular' => 'Popular',
			'teamspost:success' => 'Your comment was succesfully posted',
			'teams:alldiscussion' => 'Latest discussion',
			'teams:edittopic' => 'Edit topic',
			'teams:topicmessage' => 'Topic message',
			'teams:topicstatus' => 'Topic status',
			'teams:reply' => 'Post a comment',
			'teams:topic' => 'Topic',
			'teams:posts' => 'Posts',
			'teams:lastperson' => 'Last person',
			'teams:when' => 'When',
	
			'teams:topicopen' => 'Open',
			'teams:topicclosed' => 'Closed',
			'teams:topicresolved' => 'Resolved',
		
			'teamstopic:deleted' => 'The topic has been deleted.',
			'teams:topicsticky' => 'Sticky',
			'teams:topicisclosed' => 'This topic is closed.',
			'teams:topiccloseddesc' => 'This topic has now been closed and is not accepting new comments.',
	
			'teams:forumpost:edited' => "You have successfully edited the forum post.",
			'teams:forumpost:error' => "There was a problem editing the forum post.",
			'teams:privategroup' => 'This team is closed. Requesting membership.',
			'teams:notitle' => 'teams must have a title',
			'teams:cantjoin' => 'Can not join team',
			'teams:cantleave' => 'Could not leave team',
			'teams:addedtogroup' => 'Successfully added the user to the team',
			'teams:joinrequestnotmade' => 'Could not request to join team',
			'teams:joinrequestmade' => 'Requested to join team',
			'teams:joined' => 'Successfully joined team!',
			'teams:left' => 'Successfully left team',
			'teams:notowner' => 'Sorry, you are not the owner of this team.',
			'teams:notmember' => 'Sorry, you are not a member of this team.',
			'teams:alreadymember' => 'You are already a member of this team!',
			'teams:userinvited' => 'User has been invited.',
			'teams:usernotinvited' => 'User could not be invited.',
			'teams:useralreadyinvited' => 'User has already been invited',
			'teams:updated' => "Last comment",
			'teams:invite:subject' => "%s you have been invited to join %s!",
			'teams:started' => "Started by",
			'teams:joinrequest:remove:check' => 'Are you sure you want to remove this join request?',
			'teams:invite:remove:check' => 'Are you sure you want to remove this invite?',
			'teams:invite:body' => "Hi %s,

%s invited you to join the '%s' team. Click below to view your invitations:

%s",

			'teams:welcome:subject' => "Welcome to the %s team!",
			'teams:welcome:body' => "Hi %s!

You are now a member of the '%s' teamp! Click below to begin posting!

%s",

			'teams:request:subject' => "%s has requested to join %s",
			'teams:request:body' => "Hi %s,

%s has requested to join the '%s' team. Click below to view their profile:

%s

or click below to view the team's join requests:

%s",

			/*
				Forum river items
			*/

			'teams:river:member' => '%s is now a member of',
			'teams:river:create' => '%s has created the team',
		
			'teams:river:togroup' => 'to the team',

			'teams:nowidgets' => 'No widgets have been defined for this team.',


			'teams:widgets:members:title' => 'team members',
			'teams:widgets:members:description' => 'List the members of a team.',
			'teams:widgets:members:label:displaynum' => 'List the members of a team.',
			'teams:widgets:members:label:pleaseedit' => 'Please configure this widget.',

			'teams:widgets:entities:title' => "Objects in team",
			'teams:widgets:entities:description' => "List the objects saved in this team",
			'teams:widgets:entities:label:displaynum' => 'List the objects of a team.',
			'teams:widgets:entities:label:pleaseedit' => 'Please configure this widget.',

			'teams:forumtopic:edited' => 'Forum topic successfully edited.',

			'teams:allowhiddenteams' => 'Do you want to allow private (invisible) teams?',

			/**
			 * Action messages
			 */
			'teams:deleted' => 'team and team contents deleted',
			'teams:notdeleted' => 'team could not be deleted',


			'teams:deletewarning' => "Are you sure you want to delete this team? There is no undo!",

			'teams:invitekilled' => 'The invite has been deleted.',
			'teams:joinrequestkilled' => 'The join request has been deleted.',
	);

	add_translation("en",$english);
?>
