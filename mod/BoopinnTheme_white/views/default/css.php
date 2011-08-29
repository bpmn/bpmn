<?php
/**
 * Elgg Default Theme
 * core CSS file
 *
 * Updated 30 Sept 09
 *
 * @package Elgg
 * @subpackage Core
 *
 * @uses $vars['wwwroot'] The site URL
 *
 *
-moz-border-bottom-colors: none;
    -moz-border-image: none;
    -moz-border-left-colors: none;
    -moz-border-right-colors: none;
    -moz-border-top-colors: none;
    background: -moz-linear-gradient(center top , #FFFFFF 0pt, #D0D0D0 100%) repeat scroll 0 0 transparent;
    border-color: #DDDDDD;
    border-style: solid;
    border-width: 1px 1px 0;
    color: #666666;
 * 
 */
?>

/* ***************************************
	RESET BASE STYLES
*************************************** */
html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, font, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td {
	margin: 0;
	padding: 0;
	border: 0;
	outline: 0;
	font-family: Arial,Helvetica,"Nimbus Sans L",sans-serif;
	font-weight: inherit;
	font-style: inherit;
	font-size: 100%;
	vertical-align: baseline;
}
/* remember to define focus styles! */
:focus {
	outline: 0;
}
ol, ul {
	list-style: none;
}
em, i {
	font-style:italic;
}
/* tables still need cellspacing="0" (for ie6) */
table {
	border-collapse: separate;
	border-spacing: 0;
}
caption, th, td {
	text-align: left;
	font-weight: normal;
	vertical-align: top;
}
blockquote:before, blockquote:after,
q:before, q:after {
	content: "";
}
blockquote, q {
	quotes: "" "";
}
.clearfloat {
	clear:both;
	height:0;
	font-size: 1px;
	line-height: 0px;
}

/* ***************************************
	DEFAULTS
*************************************** */

/* elgg open source		blue 			#006699 */
/* elgg open source		dark blue 		#006699 */
/* elgg open source		light yellow 	#FDFFC3 */
/* elgg open source		light blue	 	#bbdaf7 */


body {
	text-align:left;
	margin:0 auto;
	padding:0;
	background:#fefefe;
font-size: 0.9em;
}

a {
	color: #006699;
	text-decoration: none;
	-moz-outline-style: none;
	outline: none;
    -webkit-transition: background-color 0.2s linear;  
    -moz-transition: background-color 0.2s linear;  
    -o-transition: background-color 0.2s linear
font-size: 0.9em;


}
a:visited {

}
a:hover {
	color: #006699;
	text-decoration: underline;
}
p {
	margin: 0px 0px 4px 0;
font-size: 0.9em;

}
img {
	border: none;
}
ul {
	margin: 5px 0px 15px;
	padding-left: 20px;
}
ul li {
	margin: 0px;
}
ol {
	margin: 5px 0px 15px;
	padding-left: 20px;
}
ul li {
	margin: 0px;
}
form {
	margin: 0px;
	padding: 0px;
}
small {
	font-size: 90%;
}
h1, h2, h3, h4, h5, h6 {
	font-weight: bold;
	line-height: normal;
}
h1 { font-size: 1.3em; }
h2 { font-size: 1.1em; }
h3 { font-size: 1.0em; }
h4 { font-size: 1.0em; }

h4_white { font-size: 1.0em; color:#ffffff; font-weight:bold; text-align: left; float: left;}
h4_center { font-size: 1.0em; color:#000000; font-weight:bold; text-align: right; float: right;}


h5 { font-size: 0.9em; }
h6 { font-size: 0.8em; }

dt {
	margin: 0;
	padding: 0;
	font-weight: bold;
}
dd {
	margin: 0 0 1em 1em;
	padding: 0;
}


pre, code {
	font-family:Monaco,"Courier New",Courier,monospace;
	font-size:10px;
	background:#EBF5FF;
	overflow:auto;

	overflow-x: auto; /* Use horizontal scroller if needed; for Firefox 2, not needed in Firefox 3 */
	white-space: pre-wrap; /* css-3 */
	white-space: -moz-pre-wrap !important; /* Mozilla, since 1999 */
	white-space: -pre-wrap; /* Opera 4-6 */
	white-space: -o-pre-wrap; /* Opera 7 */
	word-wrap: break-word; /* Internet Explorer 5.5+ */

}
code {
	padding:2px 4px;
}
pre {
	padding:4px 15px;
	margin:0px 0 15px 0;
	line-height:1.3em;
}
blockquote {
	padding:4px 15px;
	margin:0px 0 15px 0;
	line-height:1.3em;
	background:#EBF5FF;
	border:none !important;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
}
blockquote p {
	margin:0 0 5px 0;
}

/* ***************************************
	PAGE LAYOUT - MAIN STRUCTURE
*************************************** */
#page_container {
	margin:0;
	padding:0;

}
#page_wrapper {
	width:990px;
	margin:0 auto;
	padding:0;
	min-height: 300px;

}


#layout_header {
	text-align:left;
	width:100%;
	height:55px;
	background:#ffffff;
	position:static;
        
}

#header_topbar_container_search {
	position: relative;
	float:right;
	height:21px;
	/*width:280px;*/
	text-align:right;
	margin:10px 0 4px 0;
	padding-bottom:4px;
    border: none 1px #f0f0f0;

}





/*************************************************************************/
/* user topbar */



#user_topbar {
    display: block;
    background: white;
	position: relative;
	height: 21px;
	margin:10px 4px 4px 0;
	padding:3px 0px 4px 0px;

	float:right;
	text-align:left;
	font-size: 90%;

	color:#000000;
    border: none 1px #f0f0f0;

}



#wrapper_header {
	margin:0;
	padding:0px 0px 0px 0px;
}
#wrapper_header h1 {
	margin:0px 0 0 0;
	letter-spacing: -0.03em;
}


/*********************************************************************/
/*    background: url(<?php echo $vars['url']; ?>/mod/BoopinnTheme_white/_graphics/box_bg.png) repeat scroll 0 0 transparent; */
/*********************************************************************/

#layout_canvas {
	margin:0 0 20px 0;
	padding:10px;
	min-height: 360px;
	border: solid 1px #D0D0D0;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
    /* fallback (Opera) */
    background: #fefefe;
    background: url(<?php echo $vars['url']; ?>/mod/BoopinnTheme_white/_graphics/box_bg.png) repeat scroll 0 0 transparent;

    box-shadow: 1px 1px 7px #D0D0D0;


}


/* canvas layout: 1 column, no sidebar */
#one_column {
 	width:928px;
	margin:0;
	min-height: 360px;
	background: #fefefe;


	padding:0 0 10px 0;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
}

/* canvas layout: 2 column left sidebar */
#two_column_left_sidebar {
	width:210px;
	margin:0 20px 0 0;
	min-height:360px;
	float:left;
	background:#fefefe;
	/*background:#fefefe url(<?php echo $vars['url']; ?>/mod/BoopinnTheme_white/_graphics/box_bg.png) repeat scroll 0 0 transparent;*/



	padding:0px;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
}

#two_column_left_sidebar_maincontent {
        /* hello */ 
	width:718px;
	margin:0;
	min-height: 360px;
	float:left;
	background: #fefefe;
	padding:0 0 5px 0;

   border-left:1px solid #f0f0f0;
}




#two_column_left_sidebar_maincontent_boxes {
	margin:0 0px 20px 20px;
	padding:0 0 5px 0;
	width:718px;
	background: #fefefe;
	background:url(<?php echo $vars['url']; ?>/mod/BoopinnTheme_white/_graphics/box_bg.png) repeat scroll 0 0 transparent;

	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	float:left;
}
#two_column_left_sidebar_boxes {
	width:210px;
	margin:0px 0 20px 0px;
	min-height:360px;
	float:left;
	padding:0;
}
#two_column_left_sidebar_boxes .sidebarBox {
	margin:0px 0 22px 0;
	background: #BBDFF0;
	background:url(<?php echo $vars['url']; ?>/mod/BoopinnTheme_white/_graphics/box_bg.png) repeat scroll 0 0 transparent;

	padding:4px 10px 10px 10px;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
}
#two_column_left_sidebar_boxes .sidebarBox h3 {
	padding:0 0 5px 0;
	font-size:1.25em;
	line-height:1.2em;
	color:#006699;
}

/* canvas layout: 2 column right sidebar */
#two_column_right_sidebar {
	width:210px;
	margin:0 0 0 20px;
	min-height:360px;
	float:left;
	background: #fefefe;
	background:url(<?php echo $vars['url']; ?>/mod/BoopinnTheme_white/_graphics/box_bg.png) repeat scroll 0 0 transparent;

	padding:0px;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
}


.contentWrapper {
	background:white;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	padding:5px;
	margin:0 5px 5px 5px;
}
span.contentIntro p {
	margin:0 0 0 0;
}
.notitle {
	margin-top:10px;
}

/* canvas layout: widgets (profile and dashboard) */
#widgets_left {
	width:304px;
	margin:0 20px 20px 0;
	min-height:360px;
	padding:0;
}
#widgets_middle {
	width:304px;
	margin:0 0 20px 0;
	padding:0;
}
#widgets_right {
	width:304px;
	margin:0px 0 20px 20px;
	float:left;
	padding:0;
}
#widget_table td {
	border:0;
	padding:0;
	margin:0;
	text-align: left;
	vertical-align: top;
}
/* IE6 fixes */
* html #widgets_right { float:none; }
* html #profile_info_column_left {
	margin:0 10px 0 0;
	width:200px;
}
* html #dashboard_info { width:585px; }
/* IE7 */
*:first-child+html #profile_info_column_left { width:200px; }


/* ***************************************
	SPOTLIGHT
*************************************** */
#layout_spotlight {
	margin:20px 0 20px 0;
	padding:0;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	background: white;
-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#fefefe, endColorstr=#ffffff)";
background: -webkit-gradient(linear, left top, left bottom, from(#fefefe), to(#ffffff));
        background: -moz-linear-gradient(center top , #Fefefe 0pt, #ffffff 100%) repeat scroll 0 0 transparent;



}
#wrapper_spotlight {
	margin:0;
	padding:0;
	height:auto;
}
#wrapper_spotlight #spotlight_table h2 {
	color:#006699;
	font-size:1.25em;
	line-height:1.2em;
}
#wrapper_spotlight #spotlight_table li {
	list-style: square;
	line-height: 1.2em;
	margin:5px 20px 5px 0;
	color:#006699;
}
#wrapper_spotlight .collapsable_box_content  {
	margin:0;
	padding:10px 10px 5px 10px;
	background:none;
	min-height:60px;
	border:none;
	border-top:1px solid #cccccc;
}
#spotlight_table {
	margin:0 0 2px 0;
}
#spotlight_table .spotlightRHS {
	float:right;
	width:270px;
	margin:0 0 0 50px;
}
/* IE7 */
*:first-child+html #wrapper_spotlight .collapsable_box_content {
	width:958px;
}
#layout_spotlight .collapsable_box_content p {
	padding:0;
}
#wrapper_spotlight .collapsable_box_header  {
	border: none;
	background: none;
}


/* ***************************************
	FOOTER
*************************************** */
#layout_footer {
	color: #006699;
	
	font-size:0.90em;
	-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#e8e8e8, endColorstr=#f9f9f9)";
	background: -webkit-gradient(linear, left top, left bottom, from(#e8e8e8), to(#f9f9f9));
        background: -moz-linear-gradient(center top , #e8e8e8 0pt, #f9f9f9 100%) repeat scroll 0 0 transparent;

	margin-left:auto;
	margin-right:auto;

	height:40px;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	margin:0 0 5px 0;
}
#layout_footer table {
margin:0 0 0 20px;
}
#layout_footer a, #layout_footer p {
color:#333333;
margin:0;
}
#layout_footer .footer_toolbar_links {
	text-align:right;
	padding:15px 0 0 0;
	font-size:0.90em;
}
#layout_footer .footer_legal_links {
	text-align:right;
}






















/* ***************************************
HORIZONTAL ELGG TOPBAR
    background: -moz-linear-gradient(center top , #FFFFFF 0pt, #D0D0D0 100%) repeat scroll 0 0 transparent;
	background:url(<?php echo $vars['url']; ?>/mod/BoopinnTheme_white/_graphics/background29.png) repeat-x;

*************************************** */
#elgg_topbar {
	position: static;
top:50px;
-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#ffffff, endColorstr=#D0D0D0)";
background: -webkit-gradient(linear, left top, left bottom, from(#ffffff), to(#D0D0D0));
background: -moz-linear-gradient(center top , #FFFFFF 0pt, #D0D0D0 100%) repeat scroll 0 0 transparent;
 

	color:#eeeeee;
	min-width:990px;
	width:990px;
	height:26px;
	z-index: 9000; /* if you have multiple position:relative elements, then IE sets up separate Z layer contexts for each one, which ignore each other */
    border:ridge 1px #f0f0f0;
    -moz-border-radius-topleft: 4px;
    -moz-border-radius-topright:4px;
    -moz-border-radius-bottomleft:4px;
    -moz-border-radius-bottomright:4px;
    -webkit-border-top-left-radius:4px;
    -webkit-border-top-right-radius:4px;
    -webkit-border-bottom-left-radius:4px;
    -webkit-border-bottom-right-radius:4px;
    border-top-left-radius:4px;
    border-top-right-radius:4px;
    border-bottom-left-radius:4px;
    border-bottom-right-radius:4px;

    margin-bottom: 6px; 

}

#elgg_topbar_container_left {
	position: relative;
        float:left;
	height:26px;
	text-align:left;
	width:85%;
	font-family: Arial,Helvetica,"Nimbus Sans L",sans-serif;
	font-weight: inherit;
	font-style: inherit;
	font-size: 0.90em;
	color: #fefefe;

}




#elgg_topbar_container_right {
	position: relative;
	float:right;
	height:26px;
	width:100px;
	text-align:right;
	font-family: Arial,Helvetica,"Nimbus Sans L",sans-serif;
	font-weight: inherit;
	font-style: inherit;
	font-size: 0.90em;

}

<!--
#elgg_topbar_container_search {
	position: relative;
	float:right;
	height:21px;
	/*width:280px;*/
	text-align:right;
	margin:14px 0 0 0;
}
-->

#elgg_topbar_container_left .toolbarimages {
	float:left;
	margin-right:5px;
padding-right: 10px;
border-right: 1px solid #f0f0f0;

}




#elgg_topbar_container_left .toolbarlinks {
	margin:0 0 10px 0;
	float:left;
}


#elgg_topbar_container_left .toolbarlinks2 {
	margin:0px 5px 0 5px;
	float:left;
}

#elgg_topbar_container_left .toolbarlinks3 {
	margin:0px 0px 0px 0px;
	float:left;
        color:#006699;
	padding:4px 0px 0px 5px;
}

#elgg_topbar_container_left .toolbarlinks4 {
	margin:0px 0px 0 0px;
	float:left;
	border-right:1px solid #f0f0f0;
	padding:0px 0px 0px 0px;
	

}




#elgg_topbar_container_left a.loggedinuser {
	color:#eeeeee;
	font-weight:bold;
	margin:0 0 0 5px;
}
#elgg_topbar_container_left a.pagelinks {

color:#006699;
	margin:0 5px 5px 5px;
	display:block;
	padding:4px;
    /*border:none 5px #f0f0f0;*/
    -moz-border-radius-bottomleft:2px;
    -moz-border-radius-bottomright:2px;
    -webkit-border-bottom-left-radius:2px;
    -webkit-border-bottom-right-radius:2px;
    border-bottom-left-radius:2px;
    border-bottom-right-radius:2px;

    -webkit-transition: background-color 0.2s linear;  
    -moz-transition: background-color 0.2s linear;  
    -o-transition: background-color 0.2s linear;
}

#elgg_topbar_container_left a.pagelinks_dashboard {

color:#006699;
	margin:0 5px 5px 5px;
	padding:4px 0px 0px 20px;
        background:transparent url(<?php echo $vars['url']; ?>/mod/BoopinnTheme_white/_graphics/home.png) no-repeat center left;
	display:block;
    height: 20px;

    /*border:none 5px #f0f0f0;*/
    -moz-border-radius-bottomleft:2px;
    -moz-border-radius-bottomright:2px;
    -webkit-border-bottom-left-radius:2px;
    -webkit-border-bottom-right-radius:2px;
    border-bottom-left-radius:2px;
    border-bottom-right-radius:2px;

    -webkit-transition: background-color 0.2s linear;  
    -moz-transition: background-color 0.2s linear;  
    -o-transition: background-color 0.2s linear;
}


#elgg_topbar_container_left a.pagelinks:hover {
	background: #0066aa;
	text-decoration: none;
	color: #ffffff;
 
    -moz-box-shadow: 0px 2px 0px #006699;
    -webkit-box-shadow: 0px 2px 0px #006699;
    box-shadow: 0px 2px 0px #006699;

}

 

#elgg_topbar_container_left a.pagelinks_dashboard:hover {
	background: #0066aa;
	text-decoration: none;
	color: #ffffff;

        background:#0066aa url(<?php echo $vars['url']; ?>/mod/BoopinnTheme_white/_graphics/home.png) no-repeat center left;
 
    -moz-box-shadow: 0px 2px 0px #006699;
    -webkit-box-shadow: 0px 2px 0px #006699;
    box-shadow: 0px 2px 0px #006699;

}


#elgg_topbar_container_left a.privatemessages {
	height: 21px;
	display: block;
	padding:0 0 0 18px;
	margin:4px 15px 0 5px;
	background:transparent url(<?php echo $vars['url']; ?>/mod/BoopinnTheme_white/_graphics/email16.png) no-repeat;
	cursor:pointer;
}
#elgg_topbar_container_left a.privatemessages:hover {
	text-decoration: none;
	background:transparent url(<?php echo $vars['url']; ?>/mod/BoopinnTheme_white/_graphics/email16h.png) no-repeat;
}
#elgg_topbar_container_left a.privatemessages_new {
	height: 21px;
	display: block;
	padding:0 0 0 18px;
	margin:4px 15px 0 5px;	
	background:transparent url(<?php echo $vars['url']; ?>/mod/BoopinnTheme_white/_graphics/email_red.png) no-repeat;
	color:white;
}

#elgg_topbar_container_left a.privatemessages_new:hover {
	text-decoration: none;
}








#elgg_topbar_container_left a.usersettings {
	color:#999999;
	margin:0 5px 0 5px;
	display:block;
	padding:4px;
    border:none 5px #000000;
    -moz-border-radius-bottomleft:2px;
    -moz-border-radius-bottomright:2px;
    -webkit-border-bottom-left-radius:2px;
    -webkit-border-bottom-right-radius:2px;
    border-bottom-left-radius:2px;
    border-bottom-right-radius:2px;

    -webkit-transition: background-color 0.2s linear;  
    -moz-transition: background-color 0.2s linear;  
    -o-transition: background-color 0.2s linear;

}
#elgg_topbar_container_left a.usersettings:hover {
	color:#000000;
	text-decoration: none;
    -moz-box-shadow: 0px 3px 0px #ff0000;
    -webkit-box-shadow: 0px 3px 0px #ff0000;
    box-shadow: 0px 3px 0px #ff0000;

}



#elgg_topbar_container_left img {
	margin:0 0 0 5px;
}


#elgg_topbar_container_left .user_mini_avatar {
	border:1px solid #eeeeee;
	margin:3px 0 3px 0;
}

#elgg_topbar_container_right .user_mini_avatar {
	border:1px solid #eeeeee;
	margin:3px 0 3px 0;
}



#elgg_topbar_container_right {
	padding:4px 0 0 0;
}
#elgg_topbar_container_right a {
	color:#006699;
	margin:0 5px 0 0;
        background:transparent url(<?php echo $vars['url']; ?>/mod/BoopinnTheme_white/_graphics/logout16.png) no-repeat top right;
	padding:0 21px 0 0;
	display:block;
	height:20px;
}
/* IE6 fix */
* html #elgg_topbar_container_right a {
	width: 120px;
}
#elgg_topbar_container_right a:hover {
        background:transparent url(<?php echo $vars['url']; ?>/mod/BoopinnTheme_white/_graphics/logout_red16.png) no-repeat top right;

}
#elgg_topbar_panel {
	background:#333333;
	color:#eeeeee;
	height:200px;
	width:100%;
	padding:10px 20px 10px 20px;
	display:none;
	position:relative;
}


/* ***************************************
	TOP BAR - VERTICAL TOOLS MENU
*************************************** */
/* elgg toolbar menu setup */
ul.topbardropdownmenu, ul.topbardropdownmenu ul {
	margin:0;
	padding:0;
	display:inline;
	float:left;
	list-style-type: none;
	z-index: 9000;
	position: relative;
}
ul.topbardropdownmenu {
	margin:0pt 20px 0pt 5px;
}
ul.topbardropdownmenu li {
	display: block;
	list-style: none;
	margin: 0;
	padding: 0;
	float: left;
	position: relative;
}
ul.topbardropdownmenu a {
	display:block;
}
ul.topbardropdownmenu ul {
	display: none;
	position: absolute;
	left: 0;
	margin: 0;
	padding: 0;
}
/* IE6 fix */
* html ul.topbardropdownmenu ul {
	line-height: 1.1em;
}
/* IE6/7 fix */
ul.topbardropdownmenu ul a {
	zoom: 1;
}
ul.topbardropdownmenu ul li {
	float: none;
}
/* elgg toolbar menu style */
ul.topbardropdownmenu ul {
	width: 150px;
	top: 24px;
	border-top:1px solid black;
}
ul.topbardropdownmenu *:hover {
	background-color: none;
}
ul.topbardropdownmenu a {
	padding:4px;
	text-decoration:none;
	color:white;
}
ul.topbardropdownmenu li.hover a {
	background-color: #006699;
	text-decoration: none;
}
ul.topbardropdownmenu ul li.drop a {
	font-weight: normal;
}
/* IE7 fixes */
*:first-child+html #elgg_topbar_container_left a.pagelinks {

}
*:first-child+html ul.topbardropdownmenu li.drop a.menuitemtools {
	padding-bottom:6px;
}
ul.topbardropdownmenu ul li a {
	background-color: #999999;/* menu off state color */
	font-weight: bold;
	padding-left:6px;
	padding-top:4px;
	padding-bottom:0;
	height:22px;
	border-bottom: 1px solid white;
}
ul.topbardropdownmenu ul a.hover {
	background-color: #333333;
}
ul.topbardropdownmenu ul a {
	opacity: 0.9;
	filter: alpha(opacity=90);
}


/* ***************************************
SYSTEM MESSSAGES

-moz-box-shadow: 5px 12px 58px #081f00;
-webkit-box-shadow: 5px 12px 58px #000000;
box-shadow: 5px 12px 58px #081f00;
    background: -moz-linear-gradient(center top , #Fefefe 0pt, #ccffcc 100%) repeat scroll 0 0 transparent;
	border:1px solid #00ddff;

*************************************** */
.messages {
    background: white;
	text-align: center;

	color:#0066aa;
	z-index: 8000;
	margin:0;
	position:absolute;
	top:6px;
	left:0px;
	right:0px;
	margin:auto;
	width:400px;
        border: 1px solid #00ddff;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius:4px;

	font-family: Arial,Helvetica,"Nimbus Sans L",sans-serif;
	font-weight: inherit;
	font-style: bold;
	font-size: 90%;
        padding:4px 4px 4px 4px;
	cursor: pointer;
    box-shadow: 1px 1px 5px #00ddff;


}
.messages_error {
	background:white;
	text-align: center;

	color:#0066aa;

	z-index: 8000;
	margin:0;
	position:fixed;
	top:6px;
	left:0px;
	right:0px;
	margin:auto;
	width:400px;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius:4px;

	font-family: Arial,Helvetica,"Nimbus Sans L",sans-serif;
	font-weight: inherit;
	font-style: bold;
	font-size: 90%;
        padding:4px 4px 4px 4px;
	cursor: pointer;
    box-shadow: 1px 1px 5px #D3322A;

}


.closeMessages {
	float:right;
	margin-top:17px;
}
.closeMessages a {
	color:#666666;
	cursor: pointer;
	text-decoration: none;
	font-size: 80%;
}
.closeMessages a:hover {
	color:black;
    box-shadow: 1px 1px 7px #D0D0D0;

}


/* ***************************************
COLLAPSABLE BOXES
*************************************** */
.collapsable_box {
	margin: 0 0 20px 0;
	height:auto;

}
/* IE6 fix */
* html .collapsable_box  {
	height:10px;
}
.collapsable_box_header {
	color: #006699;
	padding: 5px 10px 5px 10px;
	margin:0;

    -moz-border-bottom-colors: none;
    -moz-border-image: none;
    -moz-border-left-colors: none;
    -moz-border-right-colors: none;
    -moz-border-top-colors: none;
-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#ffffff, endColorstr=#D0D0D0)";
background: -webkit-gradient(linear, left top, left bottom, from(#ffffff), to(#D0D0D0));
   	background: -moz-linear-gradient(center top , #FFFFFF 0pt, #D0D0D0 100%) repeat scroll 0 0 transparent;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
    border-color: #DDDDDD;
    border-style: solid;
    border-width: 1px 1px 0;



}
.collapsable_box_header h1 {
	color: #000000;
	font-size:0.95em;
	line-height: 1.2em;
}
.collapsable_box_content {
	padding: 10px 0 10px 0;
	margin:0;
	height:auto;

    -moz-border-bottom-colors: none;
    -moz-border-image: none;
    -moz-border-left-colors: none;
    -moz-border-right-colors: none;
    -moz-border-top-colors: none;
    background: none repeat scroll 0 0 #FFFFFF;
    border-bottom-left-radius: 5px;
    border-bottom-right-radius: 5px;
    border-color: #DDDDDD;
    border-style: solid;
    border-width: 0 1px 1px;



}
.collapsable_box_content .contentWrapper {
	margin-bottom:5px;
}
.collapsable_box_editpanel {
	display: none;
	background: #a8a8a8;
	padding:10px 10px 5px 10px;
	border-left: 1px solid black;
	border-bottom: 1px solid black;
}
.collapsable_box_editpanel p {
	margin:0 0 5px 0;
}
.collapsable_box_header a.toggle_box_contents {
	color: #006699;
	cursor:pointer;
	font-family: Arial, Helvetica, sans-serif;
	font-size:20px;
	font-weight: bold;
	text-decoration:none;
	float:right;
	margin: 0;
	margin-top: -7px;
}
.collapsable_box_header a.toggle_box_edit_panel {
	color: #006699;
	cursor:pointer;
	font-size:9px;
	text-transform: uppercase;
	text-decoration:none;
	font-weight: normal;
	float:right;
	margin: 4px 10px 0 0;
}
.collapsable_box_editpanel label {
	font-weight: normal;
	font-size: 100%;
}
/* used for collapsing a content box */
.display_none {
	display:none;
}
/* used on spotlight box - to cancel default box margin */
.no_space_after {
	margin: 0 0 0 0;
}



/* ***************************************
	GENERAL FORM ELEMENTS
*************************************** */
label {
	font-weight: bold;
	color:#333333;
	font-size: 100%;
}
input {
	font: 100% Arial, Helvetica, sans-serif;
	padding: 5px;
	border: 1px solid #cccccc;
	color:#666666;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius:4px;

}
input[type="checkbox"] {
	padding: 1px;
	border-style: none;
}
textarea {
	font: 120% Arial, Helvetica, sans-serif;
	border: solid 1px #cccccc;
	padding: 5px;
	color:#666666;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius:4px;

}
textarea:focus, input[type="text"]:focus {
	border: solid 1px #006699;
	background-color: #e4ecf5;
	color:#333333;
}
.submit_button {
	font: 12px/100% Arial, Helvetica, sans-serif;
	font-weight: bold;
	color: #ffffff;
	background:#006699;
	border: 1px solid #006699;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius:4px;

	width: auto;
	height: 25px;
	padding: 2px 6px 2px 6px;
	margin:10px 0 10px 0;
	cursor: pointer;
}
.submit_button:hover, input[type="submit"]:hover {
	background: #006699;
	border-color: #006699;
    box-shadow: 1px 1px 7px #D0D0D0;

}

input[type="submit"] {
	font: 12px/100% Arial, Helvetica, sans-serif;
	font-weight: bold;
	color: #ffffff;
	background:#006699;
	border: 1px solid #006699;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius:4px;

	width: auto;
	height: 25px;
	padding: 2px 6px 2px 6px;
	margin:10px 0 10px 0;
	cursor: pointer;
}
.cancel_button {
	font: 12px/100% Arial, Helvetica, sans-serif;
	font-weight: bold;
	color: #999999;
	background:#dddddd;
	border: 1px solid #999999;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius:4px;

	width: auto;
	height: 25px;
	padding: 2px 6px 2px 6px;
	margin:10px 0 10px 10px;
	cursor: pointer;
}
.cancel_button:hover {
	background: #cccccc;
    box-shadow: 1px 1px 7px #D0D0D0;

}

.input-password,
.input-text,
.input-tags,
.input-url,
.input-textarea {
	width:98%;
}

.input-textarea {
	height: 200px;
}


/* ***************************************
	LOGIN / REGISTER
*************************************** */


#custom_index {
	margin:10px;
	min-heigth: 370px;
}
#index_left {
    width:250px;
    float:left;
    margin:0 0 30px 0;
    padding:0 0 20px 0px;
}
#index_right {
    width:680px;
    height:420px;
    float: left;
<!--	border:1px solid silver;-->

}
#index_welcome {
	padding:5px 10px 5px 10px;
	margin:0 0 20px 0;
	border:1px solid silver;
	background: white;
	-moz-border-radius: 4px;
	-webkit-border-radius: 4px; 
}


.index_box {
	margin:0 0 20px 0;
	background: #dedede;
	padding:0 0 5px 0;
	-webkit-border-radius: 4px; 
	-moz-border-radius: 4px;
	border-radius:4px;

}

.index_box .search_listing {

}
.index_box .index_members {
	float:left;
	margin:2pt 5px 3px 0pt;
}
#persistent_login {
	float:right;
	display:block;
	margin-top:-34px;
}



#login-box {
	margin:0 0 10px 0;
	padding:0 0 10px 0;
	background: white;
	width:240px;
	text-align:left;
}
#login-box form {
	margin:0 10px 0 10px;
	padding:0 10px 4px 10px;
	background: white;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius:4px;

	width:200px;
}
#login-box h2 {
	color:#fefefe;
	font-size:1.0em;
	line-height:1.0em;
	margin:0 0 0 4px;
	padding:5px 5px 0 5px;
}
#login-box .login-textarea {
	width:189px;
}
#login-box label,
#register-box label {
	font-size: 1.0em;
	color:gray;
}
#login-box p.loginbox {
	margin:0;
}
#login-box input[type="text"],
#login-box input[type="password"],
#register-box input[type="text"],
#register-box input[type="password"] {
	margin:0 0 10px 0;
}
#register-box input[type="text"],
#register-box input[type="password"] {
	width:380px;
}
#login-box h2,
#login-box-openid h2,
#register-box h2,
#add-box h2,
#forgotten_box h2 {
	color:#fefefe;
	font-size:1.0em;
	line-height:1.0em;
	margin:0pt 0pt 5px;
}
#register-box {
	text-align:left;
	width:400px;
	padding:10px;
	background: #fefefe;
	margin:0;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius:4px;

}
.register-box-left {
	position: relative;
	text-align:left;
	width:500px;
	padding:10px;
	background: #fefefe;
	margin:0;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius:4px;
	float:right;
}
.register-box-left-footer {
	position: relative;
	text-align:left;
	width:500px;
	padding:10px;
	background: #fefefe;
	margin:0;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius:4px;
	float:right;
}

#persistent_login label {
	font-size:1.0em;
	font-weight: normal;
}
/* login and openID boxes when not running custom_index mod */
#two_column_left_sidebar #login-box {
	width:auto;
	background: none;
}
#two_column_left_sidebar #login-box form {
	width:auto;
	margin:10px 10px 0 10px;
	padding:5px 0 5px 10px;
}
#two_column_left_sidebar #login-box h2 {
	margin:0 0 0 5px;
	padding:5px 5px 0 5px;
}
#two_column_left_sidebar #login-box .login-textarea {
	width:158px;
}
/* login and openID boxes when not running custom_index mod */
#two_column_right_sidebar #login-box {
	width:auto;
	background: none;
}
#two_column_right_sidebar #login-box form {
	width:auto;
	margin:10px 10px 0 10px;
	padding:5px 0 5px 10px;
}
#two_column_right_sidebar #login-box h2 {
	margin:0 0 0 5px;
	padding:5px 5px 0 5px;
}
#two_column_right_sidebar #login-box .login-textarea {
	width:158px;
}

/* ***************************************
	PROFILE
*************************************** */
#profile_info {
	margin:0 0 20px 0;
	padding:20px;
	border-bottom:1px solid #cccccc;
	border-right:1px solid #cccccc;
	background: #e9e9e9;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius:4px;

}
#profile_info_column_left {
	float:left;
	padding: 0;
	margin:0 20px 0 0;
}
#profile_info_column_middle {
	float:left;
	width:365px;
	padding: 0;
}
#profile_info_column_right {
	width:578px;
	margin:0 0 0 0;
	background:#BBDFF0;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius:4px;

	padding:4px;
}
#dashboard_info {
	margin:0px 0px 0 0px;
	padding:20px;
	border-bottom:1px solid #cccccc;
	border-right:1px solid #cccccc;
	background: #bbdaf7;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius:4px;

}
#profile_menu_wrapper {
	margin:10px 0 10px 0;
	width:200px;
}
#profile_menu_wrapper p {
	border-bottom:1px solid #cccccc;
}
#profile_menu_wrapper p:first-child {
	border-top:1px solid #cccccc;
}
#profile_menu_wrapper a {
	display:block;
	padding:0 0 0 4px;
}
#profile_menu_wrapper a:hover {
	color:#ffffff;
	background:#006699;
	text-decoration:none;
    box-shadow: 1px 1px 7px #D0D0D0;

}
p.user_menu_friends, p.user_menu_profile,
p.user_menu_removefriend,
p.user_menu_friends_of {
	margin:0;
}
#profile_menu_wrapper .user_menu_admin {
	border-top:none;
}

#profile_info_column_middle p {
	margin:7px 0 7px 0;
	padding:2px 4px 2px 4px;
}
/* profile owner name */
#profile_info_column_middle h2 {
	padding:0 0 14px 0;
	margin:0;
}
#profile_info_column_middle .profile_status {
	background:#bbdaf7;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	padding:2px 4px 2px 4px;
	line-height:1.2em;
}
#profile_info_column_middle .profile_status span {
	display:block;
	font-size:90%;
	color:#666666;
}
#profile_info_column_middle a.status_update {
	float:right;
}
#profile_info_column_middle .odd {
	background:#BBDFF0;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius:4px;

}
#profile_info_column_middle .even {
	background:#BBDFF0;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius:4px;

}
#profile_info_column_right p {
	margin:0 0 7px 0;
}
#profile_info_column_right .profile_aboutme_title {
	margin:0;
	padding:0;
	line-height:1em;
}
/* edit profile button */
.profile_info_edit_buttons {
	float:right;
	margin:0  !important;
	padding:0 !important;
}
.profile_info_edit_buttons a {
	font: 12px/100% Arial, Helvetica, sans-serif;
	font-weight: bold;
	color: #ffffff;
	background:#006699;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius:4px;
	width: auto;
	padding: 2px 6px 2px 6px;
	margin:0;
	cursor: pointer;
}
.profile_info_edit_buttons a:hover {
	background: #006699;
	text-decoration: none;
	color:white;
    box-shadow: 1px 1px 7px #D0D0D0;

}


/* ***************************************
	RIVER
*************************************** */
#river,
.river_item_list {

	overflow:hidden;
}
.river_item p {
	margin:0;
	padding:0 0 0 21px;
	line-height:1.1em;
	min-height:17px;
}
.river_item {
	padding:2px 0 2px 0;
}
.river_item_time {
	font-weight: bold;

	font-size:90%;
	color:#910000;
	padding:0 10px;

}
.river_item .river_item_useravatar {
	float:left;
	margin:0 5px 0 0;
}
/* IE6 fix */
* html .river_item p {
	padding:4px 0 4px 20px;
}
/* IE7 */
*:first-child+html .river_item p {
	min-height:17px;
}

.river_object_user_profileupdate {
	background: url(<?php echo $vars['url']; ?>_graphics/river_icons/river_icon_profile.gif) no-repeat left -1px;
}
.river_object_user_profileiconupdate {
	background: url(<?php echo $vars['url']; ?>_graphics/river_icons/river_icon_profile.gif) no-repeat left -1px;
}
.river_object_annotate {
	background: url(<?php echo $vars['url']; ?>_graphics/river_icons/river_icon_comment.gif) no-repeat left -1px;
}
.river_object_bookmarks_create {
	background: url(<?php echo $vars['url']; ?>_graphics/river_icons/river_icon_bookmarks.gif) no-repeat left -1px;
}
.river_object_bookmarks_comment {
	background: url(<?php echo $vars['url']; ?>_graphics/river_icons/river_icon_comment.gif) no-repeat left -1px;
}
.river_object_status_create {
	background: url(<?php echo $vars['url']; ?>_graphics/river_icons/river_icon_status.gif) no-repeat left -1px;
}

.river_object_file_update {
	background: url(<?php echo $vars['url']; ?>_graphics/river_icons/river_icon_files.gif) no-repeat left -1px;
}
.river_object_file_comment {
	background: url(<?php echo $vars['url']; ?>_graphics/river_icons/river_icon_comment.gif) no-repeat left -1px;
}
.river_object_widget_create {
	background: url(<?php echo $vars['url']; ?>_graphics/river_icons/river_icon_plugin.gif) no-repeat left -1px;
}
.river_object_forums_create {
	background: url(<?php echo $vars['url']; ?>_graphics/river_icons/river_icon_forum.gif) no-repeat left -1px;
}
.river_object_forums_update {
	background: url(<?php echo $vars['url']; ?>_graphics/river_icons/river_icon_forum.gif) no-repeat left -1px;
}
.river_object_widget_update {
	background: url(<?php echo $vars['url']; ?>_graphics/river_icons/river_icon_plugin.gif) no-repeat left -1px;
}
.river_object_blog_create {
	background: url(<?php echo $vars['url']; ?>_graphics/river_icons/river_icon_blog.gif) no-repeat left -1px;
}
.river_object_blog_update {
	background: url(<?php echo $vars['url']; ?>_graphics/river_icons/river_icon_blog.gif) no-repeat left -1px;
}
.river_object_blog_comment {
	background: url(<?php echo $vars['url']; ?>_graphics/river_icons/river_icon_comment.gif) no-repeat left -1px;
}
.river_object_forumtopic_create {
	background: url(<?php echo $vars['url']; ?>_graphics/river_icons/river_icon_forum.gif) no-repeat left -1px;
}
.river_user_friend {
	background: url(<?php echo $vars['url']; ?>_graphics/river_icons/river_icon_friends.gif) no-repeat left -1px;
}
.river_object_relationship_friend_create {
	background: url(<?php echo $vars['url']; ?>_graphics/river_icons/river_icon_friends.gif) no-repeat left -1px;
}
.river_object_relationship_member_create {
	background: url(<?php echo $vars['url']; ?>_graphics/river_icons/river_icon_forum.gif) no-repeat left -1px;
}
.river_object_thewire_create {
	background: url(<?php echo $vars['url']; ?>_graphics/river_icons/river_icon_thewire.gif) no-repeat left -1px;
}

.river_object_groupforumtopic_annotate {
	background: url(<?php echo $vars['url']; ?>_graphics/river_icons/river_icon_comment.gif) no-repeat left -1px;
}
.river_object_groupforumtopic_create {
	background: url(<?php echo $vars['url']; ?>_graphics/river_icons/river_icon_forum.gif) no-repeat left -1px;
}
.river_object_sitemessage_create {
	background: url(<?php echo $vars['url']; ?>_graphics/river_icons/river_icon_blog.gif) no-repeat left -1px;
}
.river_user_messageboard {
	background: url(<?php echo $vars['url']; ?>_graphics/river_icons/river_icon_comment.gif) no-repeat left -1px;
}
.river_object_page_create {
	background: url(<?php echo $vars['url']; ?>_graphics/river_icons/river_icon_pages.gif) no-repeat left -1px;
}
.river_object_page_update {
	background: url(<?php echo $vars['url']; ?>_graphics/river_icons/river_icon_pages.gif) no-repeat left -1px;
}
.river_object_page_top_create {
	background: url(<?php echo $vars['url']; ?>_graphics/river_icons/river_icon_pages.gif) no-repeat left -1px;
}
.river_object_page_top_update {
	background: url(<?php echo $vars['url']; ?>_graphics/river_icons/river_icon_pages.gif) no-repeat left -1px;
}
.river_object_page_top_comment {
	background: url(<?php echo $vars['url']; ?>_graphics/river_icons/river_icon_comment.gif) no-repeat left -1px;
}
.river_object_page_comment {
	background: url(<?php echo $vars['url']; ?>_graphics/river_icons/river_icon_comment.gif) no-repeat left -1px;
}

.river_user_update {
	background: url(<?php echo $vars['url']; ?>_graphics/river_icons/river_icon_profile.gif) no-repeat left -1px;
        display: block;
	text-align:left;
	font-size: 0.9em;
	color:#000000;
        border-bottom: solid  1px #f0f0f0;
}


.river_object_file_addfile {
	background: url(<?php echo $vars['url']; ?>_graphics/river_icons/river_icon_files.gif) no-repeat left -1px;
        display: block;
	text-align:left;
	font-size: 0.9em;
	color:#000000;
        border-bottom: solid  1px #f0f0f0;
}


.river_group_teams_create {
	background: url(<?php echo $vars['url']; ?>_graphics/river_icons/river_icon_forum.gif) no-repeat left -1px;
        display: block;
	text-align:left;
	font-size: 0.9em;
	color:#000000;
        border-bottom: solid  1px #f0f0f0;
}
.river_group_teams_join {
	background: url(<?php echo $vars['url']; ?>_graphics/river_icons/river_icon_forum.gif) no-repeat left -1px;
        display: block;
	text-align:left;
	font-size: 0.9em;
	color:#000000;
        border-bottom: solid  1px #f0f0f0;

 }

.river_group_teams_update {
	background: url(<?php echo $vars['url']; ?>_graphics/river_icons/river_icon_forum.gif) no-repeat left -1px;
        display: block;
	text-align:left;
	font-size: 0.9em;
	color:#000000;
        border-bottom: solid  1px #f0f0f0;

}

.river_group_teams_addpost {
	background: url(<?php echo $vars['url']; ?>_graphics/river_icons/river_icon_comment.gif) no-repeat left -1px;
        display: block;
	text-align:left;
	font-size: 0.9em;
	color:#000000;
        border-bottom: solid  1px #f0f0f0;
}
.river_group_openlab_create {
	background: url(<?php echo $vars['url']; ?>_graphics/river_icons/river_icon_forum.gif) no-repeat left -1px;
        display: block;
	text-align:left;
	font-size: 0.9em;
	color:#000000;
        border-bottom: solid  1px #f0f0f0;
}
.river_group_openlab_join {
	background: url(<?php echo $vars['url']; ?>_graphics/river_icons/river_icon_forum.gif) no-repeat left -1px;
        display: block;
	text-align:left;
	font-size: 0.9em;
	color:#000000;
        border-bottom: solid  1px #f0f0f0;

}

.river_group_openlab_update {
	background: url(<?php echo $vars['url']; ?>_graphics/river_icons/river_icon_forum.gif) no-repeat left -1px;
        display: block;
	text-align:left;
	font-size: 0.9em;
	color:#000000;
        border-bottom: solid  1px #f0f0f0;
}

.river_group_openlab_addpost {
	background: url(<?php echo $vars['url']; ?>_graphics/river_icons/river_icon_comment.gif) no-repeat left -1px;
        display: block;
	text-align:left;
	font-size: 0.9em;
	color:#000000;
        border-bottom: solid  1px #f0f0f0;
}




/* ***************************************
	ENTITY LISTINGS
*************************************** */
.search_listing {
	display: block;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius:4px;
	background:white;
	margin:0 10px 5px 10px;
	padding:5px;
}
.search_listing_icon {
	float:left;
}
.search_listing_icon img {
	width: 40px;
}
.search_listing_icon .avatar_menu_button img {
	width: 15px;
}
.search_listing_info {
	margin-left: 50px;
	min-height: 40px;
}
/* IE 6 fix */
* html .search_listing_info {
	height:40px;
}
.search_listing_info p {
	margin:0 0 4px 0;
	line-height:1.2em;
}
.search_listing_info p.owner_timestamp {
	margin:0;
	padding:0;
	color:#666666;
	font-size: 90%;
}
table.entity_gallery {
	border-spacing: 10px;
	margin:0 0 0 0;
}
.entity_gallery td {
	padding: 5px;
}
.entity_gallery_item {
	background: white;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius:4px;
	width:170px;
}
.entity_gallery_item:hover {
	background: black;
	color:white;
    box-shadow: 1px 1px 7px #D0D0D0;

}
.entity_gallery_item .search_listing {
	background: none;
	text-align: center;
}
.entity_gallery_item .search_listing_header {
	text-align: center;
}
.entity_gallery_item .search_listing_icon {
	position: relative;
	text-align: center;
}
.entity_gallery_item .search_listing_info {
	margin: 5px;
}
.entity_gallery_item .search_listing_info p {
	margin: 5px;
	margin-bottom: 10px;
}
.entity_gallery_item .search_listing {
	background: none;
	text-align: center;
}
.entity_gallery_item .search_listing_icon {
	position: absolute;
	margin-bottom: 20px;
}
.entity_gallery_item .search_listing_info {
	margin: 5px;
}
.entity_gallery_item .search_listing_info p {
	margin: 5px;
	margin-bottom: 10px;
}


/* ***************************************
	FRIENDS
*************************************** */
/* friends widget */
#widget_friends_list {
	display:table;
	width:275px;
	margin:0 4px 0 4px;
	padding:4px 0 4px 4px;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius:4px;
	background:white;
}
.widget_friends_singlefriend {
	float:left;
	margin:0 4px 4px 0;
}


/* ***************************************
	ADMIN AREA - PLUGIN SETTINGS
*************************************** */
.plugin_details {
	margin:0 10px 5px 10px;
	padding:0 7px 4px 10px;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
}
.admin_plugin_reorder {
	float:right;
	width:200px;
	text-align: right;
}
.admin_plugin_reorder a {
	padding-left:10px;
	font-size:80%;
	color:#999999;
}
.plugin_details a.pluginsettings_link {
	cursor:pointer;
	font-size:80%;
}
.active {
	border:1px solid #999999;
	background:white;
}
.not-active {
	border:1px solid #999999;
	background:#BBDFF0;
}
.plugin_details p {
	margin:0;
	padding:0;
}
.plugin_details a.manifest_details {
	cursor:pointer;
	font-size:80%;
}
.manifest_file {
	background:#BBDFF0;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius:4px;
	padding:5px 10px 5px 10px;
	margin:4px 0 4px 0;
	display:none;
}
.admin_plugin_enable_disable {
	width:150px;
	margin:10px 0 0 0;
	float:right;
	text-align: right;
}
.contentIntro .enableallplugins,
.contentIntro .disableallplugins {
	float:right;
}
.contentIntro .enableallplugins {
	margin-left:10px;
}
.contentIntro .enableallplugins,
.not-active .admin_plugin_enable_disable a {
	font: 12px/100% Arial, Helvetica, sans-serif;
	font-weight: bold;
	color: #ffffff;
	background:#006699;
	border: 1px solid #006699;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius:4px;
	width: auto;
	padding: 4px;
	cursor: pointer;
}
.contentIntro .enableallplugins:hover,
.not-active .admin_plugin_enable_disable a:hover {
	background: #006699;
	border: 1px solid #006699;
	text-decoration: none;
    box-shadow: 1px 1px 7px #D0D0D0;

}
.contentIntro .disableallplugins,
.active .admin_plugin_enable_disable a {
	font: 12px/100% Arial, Helvetica, sans-serif;
	font-weight: bold;
	color: #ffffff;
	background:#999999;
	border: 1px solid #999999;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius:4px;
	width: auto;
	padding: 4px;
	cursor: pointer;
}
.contentIntro .disableallplugins:hover,
.active .admin_plugin_enable_disable a:hover {
	background: #333333;
	border: 1px solid #333333;
	text-decoration: none;
    box-shadow: 1px 1px 7px #D0D0D0;

}
.pluginsettings {
	margin:15px 0 5px 0;
	background:#bbdaf7;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius:4px;
	padding:10px;
	display:none;
}
.pluginsettings h3 {
	padding:0 0 5px 0;
	margin:0 0 5px 0;
	border-bottom:1px solid #999999;
}
#updateclient_settings h3 {
	padding:0;
	margin:0;
	border:none;
}
.input-access {
	margin:5px 0 0 0;
}

/* ***************************************
	GENERIC COMMENTS
*************************************** */
.generic_comment_owner {
	font-size: 90%;
	color:#666666;
}
.generic_comment {
	background:white;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius:4px;
	padding:10px;
	margin:0 10px 10px 10px;
}
.generic_comment_icon {
	float:left;
}
.generic_comment_details {
	margin-left: 60px;
}
.generic_comment_details p {
	margin: 0 0 5px 0;
}
.generic_comment_owner {
	color:#666666;
	margin: 0px;
	font-size:90%;
	border-top: 1px solid #aaaaaa;
}
/* IE6 */
* html #generic_comment_tbl { width:676px !important;}


/* ***************************************
PAGE-OWNER BLOCK
*************************************** */
#owner_block {
	padding:10px;
}
#owner_block_icon {
	float:left;
	margin:0 10px 0 0;
}
#owner_block_rss_feed,
#owner_block_odd_feed {
	padding:5px 0 0 0;
}
#owner_block_rss_feed a {
	font-size: 90%;
	color:#999999;
	padding:0 0 4px 20px;
	background: url(<?php echo $vars['url']; ?>_graphics/icon_rss.gif) no-repeat left top;
}
#owner_block_odd_feed a {
	font-size: 90%;
	color:#999999;
	padding:0 0 4px 20px;
	background: url(<?php echo $vars['url']; ?>_graphics/icon_odd.gif) no-repeat left top;
}
#owner_block_rss_feed a:hover,
#owner_block_odd_feed a:hover {
	color: #006699;
}
#owner_block_desc {
	padding:4px 0 4px 0;
	margin:0 0 0 0;
	line-height: 1.2em;
	border-bottom:1px solid #cccccc;
	color:#666666;
}


#owner_block_content {
	margin:0 0 0px 0;
	padding:0px 0 0 0;
	min-height:35px;
	font-weight: bold;
}


#owner_block_content a {
	line-height: 1em;
}

.ownerblockline {
	padding:0;
	margin:0;
	border-bottom:1px solid #cccccc;
	height:1px;
}
#owner_block_submenu {
	margin:20px 0 20px 0;
	padding: 0;
	width:100%;
}
#owner_block_submenu ul {
	list-style: none;
	padding: 0;
	margin: 0;
}
#owner_block_submenu ul li.selected a {
	background: #006699;
	color:white;
}
#owner_block_submenu ul li.selected a:hover {
	background: #006699;
	color:white;
    box-shadow: 1px 1px 7px #D0D0D0;

}
#owner_block_submenu ul li a {
	text-decoration: none;
	display: block;
	margin: 2px 0 0 0;
	color:#006699;
	padding:4px 6px 4px 10px;
	font-weight: bold;
	line-height: 1.1em;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius:4px;
}
#owner_block_submenu ul li a:hover {
	color:white;
	background: #006699;
    box-shadow: 1px 1px 7px #D0D0D0;

}

/* IE 6 + 7 menu arrow position fix */
* html #owner_block_submenu ul li.selected a {
	background-position: left 10px;
}
*:first-child+html #owner_block_submenu ul li.selected a {
	background-position: left 4px;
}

#owner_block_submenu .submenu_group {
	border-bottom: 1px solid #cccccc;
	margin:10px 0 0 0;
	padding-bottom: 10px;
}

#owner_block_submenu .submenu_group .submenu_group_filter ul li a,
#owner_block_submenu .submenu_group .submenu_group_filetypes ul li a {
	color:#666666;
}
#owner_block_submenu .submenu_group .submenu_group_filter ul li.selected a,
#owner_block_submenu .submenu_group .submenu_group_filetypes ul li.selected a {
	background:#999999;
	color:white;
}
#owner_block_submenu .submenu_group .submenu_group_filter ul li a:hover,
#owner_block_submenu .submenu_group .submenu_group_filetypes ul li a:hover {
	color:white;
	background: #999999;
    box-shadow: 1px 1px 7px #D0D0D0;

}


/* ***************************************
	PAGINATION
*************************************** */
.pagination {
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius:4px;
	background:white;
	margin:5px 10px 5px 10px;
	padding:5px;
}
.pagination .pagination_number {
	display:block;
	float:left;
	background:#ffffff;
	border:1px solid #006699;
	text-align: center;
	color:#006699;
	font-size: 12px;
	font-weight: normal;
	margin:0 6px 0 0;
	padding:0px 4px;
	cursor: pointer;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius:4px;
}
.pagination .pagination_number:hover {
	background:#006699;
	color:white;
	text-decoration: none;
}
.pagination .pagination_more {
	display:block;
	float:left;
	background:#ffffff;
	border:1px solid #ffffff;
	text-align: center;
	color:#006699;
	font-size: 12px;
	font-weight: normal;
	margin:0 6px 0 0;
	padding:0px 4px;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius:4px;
}
.pagination .pagination_previous,
.pagination .pagination_next {
	display:block;
	float:left;
	border:1px solid #006699;
	color:#006699;
	text-align: center;
	font-size: 12px;
	font-weight: normal;
	margin:0 6px 0 0;
	padding:0px 4px;
	cursor: pointer;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius:4px;
}
.pagination .pagination_previous:hover,
.pagination .pagination_next:hover {
	background:#006699;
	color:white;
	text-decoration: none;
}
.pagination .pagination_currentpage {
	display:block;
	float:left;
	background:#006699;
	border:1px solid #006699;
	text-align: center;
	color:white;
	font-size: 12px;
	font-weight: bold;
	margin:0 6px 0 0;
	padding:0px 4px;
	cursor: pointer;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
}


/* ***************************************
	FRIENDS COLLECTIONS ACCORDIAN
*************************************** */
ul#friends_collections_accordian {
	margin: 0 0 0 0;
	padding: 0;
}
#friends_collections_accordian li {
	margin: 0 0 0 0;
	padding: 0;
	list-style-type: none;
	color: #666666;
}
#friends_collections_accordian li h2 {
	background:#006699;
	color: white;
	padding:4px 2px 4px 6px;
	margin:10px 0 10px 0;
	font-size:1.2em;
	cursor:pointer;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius:4px;
}
#friends_collections_accordian li h2:hover {
	background:#333333;
	color:white;
}
#friends_collections_accordian .friends_picker {
	background:white;
	padding:0;
	display:none;
}
#friends_collections_accordian .friends_collections_controls {
	font-size:70%;
	float:right;
}
#friends_collections_accordian .friends_collections_controls a {
	color:#999999;
	font-weight:normal;
}


/* ***************************************
	FRIENDS PICKER SLIDER
*************************************** */
.friendsPicker_container h3 {
	font-size:4em !important;
	text-align: left;
	margin:0 0 10px 0 !important;
	color:#999999 !important;
	background: none !important;
	padding:0 !important;
}
.friendsPicker .friendsPicker_container .panel ul {
	text-align: left;
	margin: 0;
	padding:0;
}
.friendsPicker_wrapper {
	margin: 0;
	padding:0;
	position: relative;
	width: 100%;
}
.friendsPicker {
	position: relative;
	overflow: hidden;
	margin: 0;
	padding:0;
	width: 678px;

	height: auto;
	background: #BBDFF0;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius:4px;
}
.friendspicker_savebuttons {
	background: white;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius:4px;
	margin:0 10px 10px 10px;
}
.friendsPicker .friendsPicker_container { /* long container used to house end-to-end panels. Width is calculated in JS  */
	position: relative;
	left: 0;
	top: 0;
	width: 100%;
	list-style-type: none;
}
.friendsPicker .friendsPicker_container .panel {
	float:left;
	height: 100%;
	position: relative;
	width: 678px;
	margin: 0;
	padding:0;
}
.friendsPicker .friendsPicker_container .panel .wrapper {
	margin: 0;
	padding:4px 10px 10px 10px;
	min-height: 230px;
}
.friendsPickerNavigation {
	margin: 0 0 10px 0;
	padding:0;
}
.friendsPickerNavigation ul {
	list-style: none;
	padding-left: 0;
}
.friendsPickerNavigation ul li {
	float: left;
	margin:0;
	background:white;
}
.friendsPickerNavigation a {
	font-weight: bold;
	text-align: center;
	background: white;
	color: #999999;
	text-decoration: none;
	display: block;
	padding: 0;
	width:20px;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius:4px;
}
.tabHasContent {
	background: white; color:#333333 !important;
}
.friendsPickerNavigation li a:hover {
	background: #333333;
	color:white !important;
}
.friendsPickerNavigation li a.current {
	background: #006699;
	color:white !important;
}
.friendsPickerNavigationAll {
	margin:0px 0 0 20px;
	float:left;
}
.friendsPickerNavigationAll a {
	font-weight: bold;
	text-align: left;
	font-size:0.8em;
	background: white;
	color: #999999;
	text-decoration: none;
	display: block;
	padding: 0 4px 0 4px;
	width:auto;
}
.friendsPickerNavigationAll a:hover {
	background: #006699;
	color:white;
}
.friendsPickerNavigationL, .friendsPickerNavigationR {
	position: absolute;
	top: 46px;
	text-indent: -9000em;
}
.friendsPickerNavigationL a, .friendsPickerNavigationR a {
	display: block;
	height: 44px;
	width: 44px;
}
.friendsPickerNavigationL {
	right: 48px;
	z-index:1;
}
.friendsPickerNavigationR {
	right: 0;
	z-index:1;
}
.friendsPickerNavigationL {
	background: url("<?php echo $vars['url']; ?>_graphics/friends_picker_arrows.gif") no-repeat left top;
}
.friendsPickerNavigationR {
	background: url("<?php echo $vars['url']; ?>_graphics/friends_picker_arrows.gif") no-repeat -60px top;
}
.friendsPickerNavigationL:hover {
	background: url("<?php echo $vars['url']; ?>_graphics/friends_picker_arrows.gif") no-repeat left -44px;
}
.friendsPickerNavigationR:hover {
	background: url("<?php echo $vars['url']; ?>_graphics/friends_picker_arrows.gif") no-repeat -60px -44px;
}
.friends_collections_controls a.delete_collection {
	display:block;
	cursor: pointer;
	width:14px;
	height:14px;
	margin:2px 4px 0 0;
	background: url("<?php echo $vars['url']; ?>_graphics/icon_customise_remove.png") no-repeat 0 0;
}
.friends_collections_controls a.delete_collection:hover {
	background-position: 0 -16px;
}
.friendspicker_savebuttons .submit_button,
.friendspicker_savebuttons .cancel_button {
	margin:5px 20px 5px 5px;
}

#collectionMembersTable {
	background: #BBDFF0;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius:4px;
	margin:10px 0 0 0;
	padding:10px 10px 0 10px;
}


/* ***************************************
WIDGET PICKER (PROFILE & DASHBOARD)
*************************************** */
/* 'edit page' button */
a.toggle_customise_edit_panel {
	float:left;
	clear:right;
	color: #006699;
	background: white;
	border:1px solid #cccccc;
	padding: 5px 10px 5px 10px;
	margin:0 0 20px 20px;
	width:280px;
	text-align: left;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius:4px;
}
a.toggle_customise_edit_panel:hover {
	color: #ffffff;
	background: #006699;
	border:1px solid #006699;
	text-decoration:none;
    box-shadow: 1px 1px 7px #D0D0D0;

}
#customise_editpanel {
	display:none;
	margin: 0 0 20px 0;
	padding:10px;
	background: #BBDFF0;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius:4px;
}

/* Top area - instructions */
.customise_editpanel_instructions {
	width:690px;
	padding:0 0 10px 0;
}
.customise_editpanel_instructions h2 {
	padding:0 0 10px 0;
}
.customise_editpanel_instructions p {
	margin:0 0 5px 0;
	line-height: 1.4em;
}

/* RHS (widget gallery area) */
#customise_editpanel_rhs {
	float:right;
	width:230px;
	background:white;
}
#customise_editpanel #customise_editpanel_rhs h2 {
	color:#333333;
	font-size: 1.4em;
	margin:0;
	padding:6px;
}
#widget_picker_gallery {
	border-top:1px solid #cccccc;
	background:white;
	width:210px;
	height:340px;
	padding:10px;
	overflow:scroll;
	overflow-x:hidden;
}

/* main page widget area */
#customise_page_view {
	width:656px;
	padding:10px;
	margin:0 0 10px 0;
	background:white;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius:4px;
}
#customise_page_view h2 {
	border-top:1px solid #cccccc;
	border-right:1px solid #cccccc;
	border-left:1px solid #cccccc;
	margin:0;
	padding:5px;
	width:200px;
	color: #fefefe;
	background: #BBDFF0;
	font-size:1.25em;
	line-height: 1.2em;
}
#profile_box_widgets {
	width:422px;
	margin:0 10px 10px 0;
	padding:5px 5px 0px 5px;
	min-height: 50px;
	border:1px solid #cccccc;
	background: #BBDFF0;
}
#customise_page_view h2.profile_box {
	width:422px;
	color: #999999;
}
#profile_box_widgets p {
	color:#999999;
}
#leftcolumn_widgets {
	width:200px;
	margin:0 10px 0 0;
	padding:5px 5px 40px 5px;
	min-height: 190px;
	border:1px solid #cccccc;
}
#middlecolumn_widgets {
	width:200px;
	margin:0 10px 0 0;
	padding:5px 5px 40px 5px;
	min-height: 190px;
	border:1px solid #cccccc;
}
#rightcolumn_widgets {
	width:200px;
	margin:0;
	padding:5px 5px 40px 5px;
	min-height: 190px;
	border:1px solid #cccccc;
}
#rightcolumn_widgets.long {
	min-height: 288px;
}
/* IE6 fix */
* html #leftcolumn_widgets {
	height: 190px;
}
* html #middlecolumn_widgets {
	height: 190px;
}
* html #rightcolumn_widgets {
	height: 190px;
}
* html #rightcolumn_widgets.long {
	height: 338px;
}

#customise_editpanel table.draggable_widget {
	width:200px;
	background: #cccccc;
	margin: 10px 0 0 0;
	vertical-align:text-top;
	border:1px solid #cccccc;
}
#widget_picker_gallery table.draggable_widget {
	width:200px;
	background: #cccccc;
	margin: 10px 0 0 0;
}

/* take care of long widget names */
#customise_editpanel table.draggable_widget h3 {
	word-wrap:break-word;/* safari, webkit, ie */
	width:140px;
	line-height: 1.1em;
	overflow: hidden;/* ff */
	padding:4px;
}
#widget_picker_gallery table.draggable_widget h3 {
	word-wrap:break-word;
	width:145px;
	line-height: 1.1em;
	overflow: hidden;
	padding:4px;
}
#customise_editpanel img.more_info {
	background: url(<?php echo $vars['url']; ?>_graphics/icon_customise_info.gif) no-repeat top left;
	cursor:pointer;
}
#customise_editpanel img.drag_handle {
	background: url(<?php echo $vars['url']; ?>_graphics/icon_customise_drag.gif) no-repeat top left;
	cursor:move;
}
#customise_editpanel img {
	margin-top:4px;
}
#widget_moreinfo {
	position:absolute;
	border:1px solid #333333;
	background:#e4ecf5;
	color:#333333;
	padding:5px;
	display:none;
	width: 200px;
	line-height: 1.2em;
}
.widget_more_wrapper {
	background-color: white;
	margin:0 10px 5px 10px;
	padding:5px;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius:4px;
}
/* droppable area hover class  */
.droppable-hover {
	background:#bbdaf7;
    box-shadow: 1px 1px 7px #D0D0D0;

}
/* target drop area class */
.placeholder {
	border:2px dashed #AAA;
	width:196px !important;
	margin: 10px 0 10px 0;
}
/* class of widget while dragging */
.ui-sortable-helper {
	background: #006699;
	color:white;
	padding: 4px;
	margin: 10px 0 0 0;
	width:200px;
}
/* IE6 fix */
* html .placeholder {
	margin: 0;
}
/* IE7 */
*:first-child+html .placeholder {
	margin: 0;
}
/* IE6 fix */
* html .ui-sortable-helper h3 {
	padding: 4px;
}
* html .ui-sortable-helper img.drag_handle, * html .ui-sortable-helper img.remove_me, * html .ui-sortable-helper img.more_info {
	padding-top: 4px;
}
/* IE7 */
*:first-child+html .ui-sortable-helper h3 {
	padding: 4px;
}
*:first-child+html .ui-sortable-helper img.drag_handle, *:first-child+html .ui-sortable-helper img.remove_me, *:first-child+html .ui-sortable-helper img.more_info {
	padding-top: 4px;
}


/* ***************************************
	BREADCRUMBS
*************************************** */
#pages_breadcrumbs {
	font-size: 80%;
	color:#bababa;
	padding:0;
	margin:2px 0 0 10px;
}
#pages_breadcrumbs a {
	color:#999999;
	text-decoration: none;
}
#pages_breadcrumbs a:hover {
	color: #006699;
	text-decoration: underline;
    box-shadow: 1px 1px 7px #D0D0D0;

}


/* ***************************************
	MISC.
*************************************** */
/* general page titles in main content area */
#content_area_user_title h2 {
	margin:0 0 0 4px;
	padding:5px;
	color:#006699;
	font-size:1.35em;
	line-height:1.2em;
}
/* reusable generic collapsible box */
.collapsible_box {
	background:#BBDFF0;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius:4px;
	padding:5px 10px 5px 10px;
	margin:4px 0 4px 0;
	display:none;
}
a.collapsibleboxlink {
	cursor:pointer;
}

/* tag icon */
.object_tag_string {
	background: url(<?php echo $vars['url']; ?>_graphics/icon_tag.gif) no-repeat left 2px;
	padding:0 0 0 14px;
	margin:0;
}

/* profile picture upload n crop page */
#profile_picture_form {
	height:145px;
}
#current_user_avatar {
	float:left;
	width:160px;
	height:130px;
	border-right:1px solid #cccccc;
	margin:0 20px 0 0;
}
#profile_picture_croppingtool {
	border-top: 1px solid #cccccc;
	margin:20px 0 0 0;
	padding:10px 0 0 0;
}
#profile_picture_croppingtool #user_avatar {
	float: left;
	margin-right: 20px;
}
#profile_picture_croppingtool #applycropping {

}
#profile_picture_croppingtool #user_avatar_preview {
	float: left;
	position: relative;
	overflow: hidden;
	width: 100px;
	height: 100px;
}


/* ***************************************
	SETTINGS & ADMIN
*************************************** */
.admin_statistics,
.admin_users_online,
.usersettings_statistics,
.admin_adduser_link,
#add-box,
#search-box,
#logbrowser_search_area {
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius:4px;
	background:white;
	margin:0 10px 10px 10px;
	padding:10px;
}

.usersettings_statistics h3,
.admin_statistics h3,
.admin_users_online h3,
.user_settings h3,
.notification_methods h3 {
	background:#e4e4e4;
	color:#333333;
	font-size:1.1em;
	line-height:1em;
	margin:0 0 10px 0;
	padding:5px;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius:4px;
}
h3.settings {
	background:#e4e4e4;
	color:#333333;
	font-size:1.1em;
	line-height:1em;
	margin:10px 0 4px 0;
	padding:5px;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius:4px;
}
.admin_users_online .profile_status {
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius:4px;
	background:#bbdaf7;
	line-height:1.2em;
	padding:2px 4px;
}
.admin_users_online .profile_status span {
	font-size:90%;
	color:#666666;
}
.admin_users_online  p.owner_timestamp {
	padding-left:4px;
}


.admin_debug label,
.admin_usage label {
	color:#333333;
	font-size:100%;
	font-weight:normal;
}

.admin_usage {
	border-bottom:1px solid #cccccc;
	padding:0 0 20px 0;
}
.usersettings_statistics .odd,
.admin_statistics .odd {

}
.usersettings_statistics .even,
.admin_statistics .even {

}
.usersettings_statistics td,
.admin_statistics td {
	padding:2px 4px 2px 4px;
	border-bottom:1px solid #cccccc;
}
.usersettings_statistics td.column_one,
.admin_statistics td.column_one {
	width:200px;
}
.usersettings_statistics table,
.admin_statistics table {
	width:100%;
}
.usersettings_statistics table,
.admin_statistics table {
	border-top:1px solid #cccccc;
}
.usersettings_statistics table tr:hover,
.admin_statistics table tr:hover {
	background: #E4E4E4;
    box-shadow: 1px 1px 7px #D0D0D0;

}
.admin_users_online .search_listing {
	margin:0 0 5px 0;
	padding:5px;
	border:1px solid #cccccc;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	border-radius:4px;
}



/* force tinyMCE editor initial width for safari */
.mceLayout {
	width:684px;
}
p.longtext_editarea {
	margin:0 !important;
}
.toggle_editor_container {
	margin:0 0 15px 0;
}
/* add/remove longtext tinyMCE editor */
a.toggle_editor {
	display:block;
	float:right;
	text-align:right;
	color:#666666;
	font-size:1em;
	font-weight:normal;
}

div.ajax_loader {
	background: white url(<?php echo $vars['url']; ?>_graphics/ajax_loader.gif) no-repeat center 30px;
	width:auto;
	height:100px;
	margin:0 10px 0 10px;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius:4px;
}



/* reusable elgg horizontal tabbed navigation
(used on friends collections, external pages, & riverdashboard mods)
*/
#elgg_horizontal_tabbed_nav {
	margin:0 0 5px 0;
	padding: 0;
	border-bottom: 1px solid #cccccc;
	display:table;
	width:100%;
}
#elgg_horizontal_tabbed_nav ul {
	list-style: none;
	padding: 0;
	margin: 0;
}
#elgg_horizontal_tabbed_nav li {
	float: left;
	border: 1px solid #cccccc;
	border-bottom-width: 0;
	background: #eeeeee;
	margin: 0 0 0 10px;
	-moz-border-radius-topleft:4px;
	-moz-border-radius-topright:4px;
	-webkit-border-top-left-radius:4px;
	-webkit-border-top-right-radius:4px;
   border-top-left-radius:4px;
    border-top-right-radius:4px;
}
#elgg_horizontal_tabbed_nav a {
	text-decoration: none;
	display: block;
	padding:4px 10px 0 10px;
	color: #999999;
	text-align: center;
	height:21px;
}
/* IE6 fix */
* html #elgg_horizontal_tabbed_nav a { display: inline; }

#elgg_horizontal_tabbed_nav a:hover {
	color: #006699;
	background: #BBDFF0;

}
#elgg_horizontal_tabbed_nav .selected {
	border-color: #cccccc;
	background: white;
}
#elgg_horizontal_tabbed_nav .selected a {
	position: relative;
	top: 2px;
	background: white;
	color: #006699;
}
/* IE6 fix */
* html #elgg_horizontal_tabbed_nav .selected a { top: 4px; }




/* ***************************************
	Auto Suggest Boxes
*************************************** */

.ac_results {
	padding: 0px;
	border: 1px solid black;
	background-color: white;
	overflow: hidden;
	z-index: 99999;
}

.ac_results ul {
	width: 100%;
	list-style-position: outside;
	list-style: none;
	padding: 0;
	margin: 0;
}

.ac_results li {
	margin: 0px;
	padding: 2px 5px;
	cursor: default;
	display: block;
	/*
	if width will be 100% horizontal scrollbar will apear
	when scroll mode will be used
	*/
	/*width: 100%;*/
	font: menu;
	font-size: 12px;
	/*
	it is very important, if line-height not setted or setted
	in relative units scroll will be broken in firefox
	*/
	line-height: 16px;
	overflow: hidden;
}

.ac_loading {
	background: white url(<?php echo $vars['url']; ?>_graphics/indicator.gif) right center no-repeat;
}

.ac_odd {
	background-color: #eee;
}

.ac_over {
	background-color: #0A246A;
	color: white;
}

.autocomplete {
	width:300px;
}

.ac_results strong {
	font-weight: bold;
}

.user_picker .user_picker_entry {
	clear: both;
	padding: 1em;
}

.livesearch_icon {
	float: left;
	padding-right: 1em;
}

.draggable {
	cursor: move;
}



img.floatLeft { 
    float: left; 
    margin: 4px; 
}
img.floatRight { 
    float: right; 
    margin: 4px; 
}
img.floatRightClear { 
    float: right; 
    clear: right; 
    margin: 4px; 
}


	.coda-slider-wrapper { padding: 20px 0 }
	.coda-slider { background: #ffffff}
	
	<!-- Use this to keep the slider content contained in a box even when JavaScript is disabled -->
	.coda-slider-no-js .coda-slider { height: 200px; overflow: auto !important; padding-right: 20px }
	
	<!--/* Change the width of the entire slider (without dynamic arrows) */-->
	.coda-slider, .coda-slider .panel { width: 600px } 
	
	<!--/* Change margin and width of the slider (with dynamic arrows) */-->
	.coda-slider-wrapper.arrows .coda-slider, .coda-slider-wrapper.arrows .coda-slider .panel { width: 600px }
	.coda-slider-wrapper.arrows .coda-slider { margin: 0 10px }
	
	<!--/* Arrow styling */-->
	.coda-nav-left a { 
        background:transparent url(<?php echo $vars['url']; ?>/mod/BoopinnTheme_white/_graphics/home.png) no-repeat center left;

       		background: url(<?php echo $vars['url']; ?>mod/BoopinnTheme_white/_graphics/left.PNG) no-repeat;
		color: #0066aa; padding: 5px; width: 16px; height: 16px }

	.coda-nav-right a { 
    		background: url(<?php echo $vars['url']; ?>mod/BoopinnTheme_white/_graphics/right.PNG) no-repeat;
		color: #0066aa; padding: 5px; width: 16px; height: 16px }
	
	<!--/* Tab nav */-->
	.coda-nav ul li a.current {

    -moz-border-radius-topleft: 4px;
    -moz-border-radius-topright:4px;
    -webkit-border-top-left-radius:4px;
    -webkit-border-top-right-radius:4px;
    border-top-left-radius:4px;
    border-top-right-radius:4px;
	font-weight: bold;

	-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#0066aa, endColorstr=#0066aa)";

	background: #0066aa; color: #ffffff }
	
	<!--/* Panel padding */-->
	.coda-slider .panel-wrapper { padding: 20px; }
	
	<!--/* Preloader */-->
	.coda-slider p.loading { padding: 20px; text-align: center }

<!--/* Don't change anything below here unless you know what you're doing */-->

	<!--/* Tabbed nav */-->
	.coda-nav ul { clear: both; display: block; margin: auto; overflow: hidden }
	.coda-nav ul li { display: inline }
	.coda-nav ul li a {
font-weight: bold;
font-size: small;

-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#ffffff, endColorstr=#D0D0D0)";
background: -webkit-gradient(linear, left top, left bottom, from(#ffffff), to(#D0D0D0));
background: -moz-linear-gradient(center top , #FFFFFF 0pt, #D0D0D0 100%) repeat scroll 0 0 transparent;
color: #0066aa; display: block; float: left; margin-right: 1px; padding: 3px 6px; text-decoration: none }
	
	<!--/* Miscellaneous */-->
	.coda-slider-wrapper { clear: both; overflow: auto }
	.coda-slider { float: left; overflow: hidden; position: relative }
	.coda-slider .panel { display: block; float: left }
	.coda-slider .panel-container { position: relative }
	.coda-nav-left, .coda-nav-right { float: left }
	.coda-nav-left a, .coda-nav-right a { display: block; text-align: center; text-decoration: none }

.footer_box {
    border-top: 1px solid #D3D3D3;

    margin-top: 6px;
    padding-bottom: 25px;
    padding-top: 10px;
}


.footer_box_links {

    color: #000000;
    float: right;
    font-size: 11px;
    padding: 4px 4px 20px;
    width: 700px;
    margin:0;
}

.footer_box_links ul {
    float: left;
    margin: 0 0px 0 25px;
}

.footer_box_recommend {
    border-top: 1px solid #D3D3D3;
    color: #666666;
    float: left;
    font-size: 10px;
    padding: 4px 0.5%;
    width: 99%;
}

.f-left {
    float: left;
}
.f-right {
    float: right;
}

.f-center {
    float: center;
    font-size: 8px;
    width: auto;
    margin:0;
}

  a.bulle {
     position:relative;
     color:#396a86; 
     text-decoration:none; 
     font-family:arial, verdana, sans-serif; 
     text-align:center; 
     font-size:11px;
   }
   
   a.bulle:hover {
      background: none; 
      z-index: 50; 
   }
   
   a.bulle span { 
     display: none;
   }
   
   a.bulle:hover span {
      display: block; 
      position: absolute;
      top: -10px; 
      left: 40px;
      font-family:arial, verdana, sans-serif; 
      text-align:justify; 
      font-size:12px;
      font-weight:normal;
      width:400px;
      background: white;
      padding: 5px;
      border: 1px solid #62c0f4;
      border-left: 10px solid #62c0f4;
   }

#browser-detection {
	background: #FFFFE5;
	color: #333333;
	position: fixed;
	_position: absolute;
	padding: 10px 15px;
	font-size: 13px;
	font-family: "Trebuchet MS", "Segoe UI", Arial, Tahoma, sans-serif;
	border-radius: 5px;
	border: 1px solid #D6D6C1;
	-moz-border-radius: 5px;
	width: 700px;
}
#browser-detection P {
	margin: 0;
	padding: 0;
	background: transparent;
	line-height: 135%;
	width: auto;
	float: none;
	border: none;
	text-align: left;
}
#browser-detection P.bd-title {
    padding-top: 0px;
    font-size: 25px;
    line-height: 100%;
}
#browser-detection P.bd-notice {
    padding-bottom: 5px;
    padding-top: 5px;
}
#browser-detection SPAN.bd-highlight { color: #B50E0E; }
#browser-detection A#browser-detection-close {
	width: 15px;
	height: 15px;
	outline: none;
	position: absolute;
	right: 10px;
	top: 10px;
	text-indent: -500em;
	line-height: 100%;
	background: url(<?php echo $vars['url']; ?>/mod/BoopinnTheme_white/_graphics/close.gif) no-repeat center center;
}
#browser-detection A#browser-detection-close:HOVER { background-color: #F5F5DC; }
#browser-detection UL.bd-browsers-list, #browser-detection UL.bd-browsers-list LI,
#browser-detection UL.bd-skip-buttons, #browser-detection UL.bd-skip-buttons LI {
	padding: 0;
	margin: 0;
	float: left;
	list-style: none;
}
#browser-detection UL.bd-browsers-list { 
	clear: both;
	margin-top: 3px;
	padding: 7px 0;
	border-top: 1px solid #F5F5DC;
	border-bottom: 1px solid #F5F5DC;
	width: 100%;
}
#browser-detection UL.bd-browsers-list LI { text-align: left; }
#browser-detection UL.bd-browsers-list LI A {
	width: 60px;
	height: 55px;
	display: block;
	color: #666666;
	padding: 10px 10px 0 65px;
	text-decoration: none;
}
#browser-detection UL.bd-browsers-list LI A:HOVER {	text-decoration: underline; }
#browser-detection UL.bd-browsers-list LI.firefox A { background: url(<?php echo $vars['url']; ?>/mod/BoopinnTheme_white/_graphics/firefox.gif) no-repeat left top; }
#browser-detection UL.bd-browsers-list LI.chrome A { background: url(<?php echo $vars['url']; ?>/mod/BoopinnTheme_white/_graphics/chrome.gif) no-repeat left top; }
#browser-detection UL.bd-browsers-list LI.safari A { background: url(<?php echo $vars['url']; ?>/mod/BoopinnTheme_white/_graphics/safari.gif) no-repeat left top; }
#browser-detection UL.bd-browsers-list LI.opera A { background: url(<?php echo $vars['url']; ?>/mod/BoopinnTheme_white/_graphics/opera.gif) no-repeat left top; }
#browser-detection UL.bd-browsers-list LI.msie A { background: url(<?php echo $vars['url']; ?>/mod/BoopinnTheme_white/_graphics/msie.gif) no-repeat left top; }
#browser-detection UL.bd-skip-buttons {	margin-top: 10px; }
#browser-detection UL.bd-skip-buttons LI {
	display: inline;
	margin-right: 10px;	
}
#browser-detection UL.bd-skip-buttons LI BUTTON { font-size: 13px; }
#browser-detection DIV.bd-poweredby {
	font-size: 9px;
	position: absolute;
	bottom: 10px;
	right: 10px;
	font-style: italic;
}
#browser-detection DIV.bd-poweredby, #browser-detection DIV.bd-poweredby A { color: #AAAAAA; }
#browser-detection DIV.bd-poweredby A { text-decoration: underline; }
#browser-detection DIV.bd-poweredby A:HOVER { text-decoration: none; }

.welcomemessage {
	background:white;
}

#dashboard_container {
	margin:1px 1px 1px 1px;
	padding:0px;
	min-height: 600px;
	border: none 1px #D0D0D0;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
    /* fallback (Opera) */
    background: #ffffff;

}


.dash_left {
    min-height: 600px;
    width: 220px;
	border: none 1px #D0D0D0;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
    float: left;
    background: transparent url(<?php echo $vars['url']; ?>/mod/BoopinnTheme_white/_graphics/Principal_header2_rot.png) no-repeat;

}
.dash_right {
    min-height: 396px;
    padding: 0px 0px 0px 7px;
    width: 713px;
	border-left: solid 1px #D0D0D0;
    float: right;
}

.dash_right_left {
    position: relative;
    margin: 0px 0 0 0;
    min-height: 100px;
    width: 440px;
	border: none 1px #D0D0D0;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
    float: left;

}

.dash_right_footer {
    position: relative;
    margin: 5px 0 0 0;
    min-height: 200px;
    width: 720px;
	border-top: none 1px #D0D0D0;
    float: left;

}

.dash_right_right {
    position: relative;
    margin: 0px 0 0 0;
    min-height: 125px;
    width: 250px;
	border: none 1px #D0D0D0;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
    float: right;
    text-align:right;
}


.dash_box {
    position: relative;
    margin: 5px 0 0 0;
    min-height: 100px;
    min-width: 100px;
    background: #ffffff;
    color: #0066aa;
	border: none 1px #D0D0D0;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
}

.dash_box_transparent {
    position: relative;
    margin: 5px 0 0 0;
    min-height: 100px;
    min-width: 100px;
    color: #ffffff;
	border: none 1px #D0D0D0;
}


.dash_box_top_bar {
    position: relative;
    margin: 5px 0 0 0;
    min-height: 100px;
    min-width: 100px;
    background: #ffffff;
    background: url(<?php echo $vars['url']; ?>/mod/BoopinnTheme_white/_graphics/collaboration16.png) no-repeat top right;

    color: #0066aa;
	border-top: solid 1px #0066aa;
}


.dash_box_top_bar_cis {
    position: relative;
    margin: 5px 0 0 0;
    min-height: 100px;
    min-width: 100px;
    background: #ffffff;
    background: url(<?php echo $vars['url']; ?>/mod/BoopinnTheme_white/_graphics/sitemap.png) no-repeat top right;

    color: #0066aa;
	border-top: solid 1px #0066aa;
}

.dash_box_top_bar_follow {
    position: relative;
    margin: 5px 0 0 0;
    min-height: 100px;
    min-width: 100px;
    background: #ffffff;
    background: url(<?php echo $vars['url']; ?>/mod/BoopinnTheme_white/_graphics/flag.png) no-repeat top right;

    color: #0066aa;
	border-top: solid 1px #0066aa;
}


.dashf-left {
    float: left;

}
.dashf-right {
    float: right;
}

.buttonclass {
  font-weight: bold;
	display: block;
	border: none 1px #D0D0D0;
    width: 135px;
    height: 22px;
	float: left;
    	background: transparent url(<?php echo $vars['url']; ?>/mod/BoopinnTheme_white/_graphics/plus.png) no-repeat right;
	cursor: pointer;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
    box-shadow: 1px 1px 7px #D0D0D0;
    -webkit-transition: background-color 0.2s linear;  
    -moz-transition: background-color 0.5s linear;  
    -o-transition: background-color 0.5s linear;
}

.buttonclass:hover {
	color: #00f2f2;
    	background: transparent url(<?php echo $vars['url']; ?>/mod/BoopinnTheme_white/_graphics/right.PNG) no-repeat right;
}

span {
float: left;
}


#userranktitle :  {
   font-weight: bold;
   display: block
   background:  #00f2f2;
}
