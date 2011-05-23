<?php

	/**
	 * RequestNotifications CSS
	 * 
	 * @package requestnotifications
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Adolfo Mazorra
	 * @copyright Adolfo Mazorra 2009
	 * @link http://elgg.org/
	 */

?>

.requestnotifications_title {
	color:#0054A7;
	margin: 10px 0px 0px 10px;
}

.requestnotifications_wrapper {
	margin: 10px;
	padding: 10px;	
	background:white;
	-webkit-border-radius: 8px; 
	-moz-border-radius: 8px;
}

.requestnotifications_widget {
	margin: 0px 10px;
}

.requestnotifications_box {
	padding: 5px;
	background:white;
	-webkit-border-radius: 8px; 
	-moz-border-radius: 8px;
}

.requestnotifications_box h3 {
	background-color:#dedede;
	width:95%;
	margin:5px 0px 5px 0px;
	padding-top:5px;
	padding-bottom:5px;
	-webkit-border-radius: 8px; 
	-moz-border-radius: 8px;
}

.requestnotifications_box .request {
	float:left;
	margin:3px;
	padding:3px;
}

.requestnotifications_box .subrequest {
	float:left;
	margin:0px 3px 3px 30px;
	padding:3px;
}

.requestnotifications_box .request td,
.requestnotifications_box .subrequest td {
	padding:3px;
}

.requestnotifications_box .request td.name,
.requestnotifications_box .subrequest td.name{
	font-weight:bold;
}

.requestnotifications_box .friendrequestscount {
	background-image: url(<?php echo $vars['url']; ?>_graphics/river_icons/river_icon_friends.gif);
	background-repeat: no-repeat;
	background-position: 5px;
	padding-left: 25px;
}

.requestnotifications_box .grouprequestscount {
	background-image: url(<?php echo $vars['url']; ?>_graphics/river_icons/river_icon_forum.gif);
	background-repeat: no-repeat;
	background-position: 5px;
	padding-left: 25px;
}

.requestnotifications_box .groupinvitationscount {
	background-image: url(<?php echo $vars['url']; ?>_graphics/river_icons/river_icon_forum.gif);
	background-repeat: no-repeat;
	background-position: 5px;
	padding-left: 25px;
}

.requestnotifications_box .sharedbookmarkscount {
	background-image: url(<?php echo $vars['url']; ?>_graphics/river_icons/river_icon_bookmarks.gif);
	background-repeat: no-repeat;
	background-position: 5px;
	padding-left: 25px;
}

.requestnotifications_viewall {
	float:right;
	font-size:0.8em;
}