<?php
/**
* Widgets Plus! - Default & Locked Widgets, Custom Widget Titles & Links
*
* @package widgets_plus
* @author John Jakubowski (Xeno Media, Inc.)
* @copyright Xeno Media, Inc. 2010
* @link http://www.xenomedia.com/
*/
?>

a.dashboard_link {
	float:right;
	clear:right;
	color: #4690d6;
	background: white;
	border:1px solid #cccccc;
	padding: 5px 10px 5px 10px;
	margin:0 0 20px 0;
	width:280px;
	text-align: left;
	-webkit-border-radius: 8px;
	-moz-border-radius: 8px;
}

a.dashboard_link:hover {
	color: #ffffff;
	background: #0054a7;
	border:1px solid #0054a7;
	text-decoration:none;
}

.collapsable_box_locked {
	color: #4690d6;
	padding: 5px 10px 5px 10px;
	margin:0;
	border-left: 1px solid white;
	border-right: 1px solid #cccccc;
	border-bottom: 1px solid #cccccc;
	-moz-border-radius-topleft:8px;
	-moz-border-radius-topright:8px;
	-webkit-border-top-right-radius:8px;
	-webkit-border-top-left-radius:8px;
	background:#dedede;
}

.collapsable_box_locked h1 {
	color: #0054a7;
	font-size:1.25em;
	line-height: 1.2em;
}

.collapsable_box_locked a.toggle_box_contents {
	color: #4690d6;
	cursor:pointer;
	font-family: Arial, Helvetica, sans-serif;
	font-size:20px;
	font-weight: bold;
	text-decoration:none;
	float:right;
	margin: 0;
	margin-top: -7px;
}

.collapsable_box_locked a.toggle_box_edit_panel {
	color: #4690d6;
	cursor:pointer;
	font-size:9px;
	text-transform: uppercase;
	text-decoration:none;
	font-weight: normal;
	float:right;
	margin: 3px 10px 0 0;
}

.collapsable_box_header a, .collapsable_box_locked a {
	color: #0054a7;
	text-decoration: none;
}

.collapsable_box_header a:hover, .collapsable_box_locked a:hover {
	color: #4690d6;
	text-decoration: underline;
}

div.collapsable_box_editpanel input.input-text {
	width: 175px;
}