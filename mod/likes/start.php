<?php
	/**
	* likes
	*
	* @author likes
	* @link http://community.elgg.org/pg/profile/pedroprez
	* @copyright (c) Keetup 2010
	* @link http://www.keetup.com/
	* @license GNU General Public License (GPL) version 2
	*/

	global $ASKQUESTION_likes;
	function likes_init() {
		global $CONFIG;
		global $ASKQUESTION_likes;
		
		$ASKQUESTION_likes = false;
		
		extend_view('css', 'likes/css');
		
		//Page Handler
		register_page_handler('likes','likes_page_handler');
		
		//Add ajax support
		if (get_plugin_setting('enable_ajaxsupport', 'likes') != 'no') {
			//Extend js view on riverdashboard
			extend_view('page_elements/footer', 'likes/js/ajax_support', 100);
			extend_view('page_elements/header_contents', 'likes/show_lightbox', 1);
		}
		
		//Add ajax support for all the tabs on riverdashboars
		extend_view('riverdashboard/js', 'likes/riverdashboardjs');
		
		//View for river actions
		extend_view('river/item/actions', 'likes/item_action', 600);

		
		//Print the plugin version
		extend_view('metatags', 'likes/version');
		
		if (isadminloggedin()) {
			extend_view('page_elements/header_contents', 'likes/question/content');
		}
		
		//Actions
		register_action("annotate",false, $CONFIG->pluginspath . "/likes/actions/annotate.php");
		register_action("unannotate",false, $CONFIG->pluginspath . "/likes/actions/unannotate.php");
	}
	
	function likes_page_handler($page) {
		global $CONFIG;
		if (isset($page[0])) {
			switch($page[0]) {
				case "admin":
					!@include_once(dirname(__FILE__) . "/admin.php");
					return false;
          			break;
          		case "who":
					!@include_once(dirname(__FILE__) . "/who.php");
					return false;
          			break;	
          		default:
          			forward();
          			break;
			}
		}
	}
	
	function likes_setup() {
		global $CONFIG;
		if (get_context()=='admin') {
    		add_submenu_item(elgg_echo("likes:admin"), $CONFIG->wwwroot . "pg/likes/admin" );
		}
		if (get_plugin_setting('autodetect_items', 'likes') != 'yes') {
			/*
			 * Out of the box mods
			*/
			if (get_plugin_setting('show_thewire', 'likes') != 'no') {
				extend_view('river/object/thewire/create', 'likes/river/item');
			}
			if (get_plugin_setting('show_messageboard', 'likes') != 'no') {
				extend_view('river/object/messageboard/create', 'likes/river/item');
			}
			if (get_plugin_setting('show_bookmarks', 'likes') != 'no') {
				extend_view('river/object/bookmarks/create', 'likes/river/item');
			}
			if (get_plugin_setting('show_file', 'likes') != 'no') {
				extend_view('river/object/file/create', 'likes/river/item');
			}
			if (get_plugin_setting('show_blog', 'likes') != 'no') {
				extend_view('river/object/blog/create', 'likes/river/item');
			}
			if (get_plugin_setting('show_page', 'likes') != 'no') {
				extend_view('river/object/page/create', 'likes/river/item');
			}
			if (get_plugin_setting('show_topic', 'likes') != 'no') {
				extend_view('river/forum/topic/create', 'likes/river/item');
			}
		
			/*
			 * Third party mods
			*/
			//Tidypics
			if (is_plugin_enabled('tidypics') && get_plugin_setting('show_tidypics_image', 'likes') != 'no') {
				extend_view('river/object/image/create', 'likes/river/item');
			}
			if (is_plugin_enabled('tidypics') && get_plugin_setting('show_tidypics_album', 'likes') != 'no') {
				extend_view('river/object/album/create', 'likes/river/item');
			}
			//iZap Videos
			if (is_plugin_enabled('izap_videos') && get_plugin_setting('show_izap_videos', 'likes') != 'no') {
				extend_view('river/object/izap_videos/create', 'likes/river/item');
			}
			//Event Calendar
			if (is_plugin_enabled('event_calendar') && get_plugin_setting('show_event_calendar', 'likes') != 'no') {
				extend_view('river/object/event_calendar/create', 'likes/river/item');
			}
		} else {
			//Add items automatically
			$view_type = elgg_get_viewtype();
			$views = array_keys($CONFIG->views->locations[$view_type]);
			$items_to_extend = array_filter($views, "likes_filter_by_river");
			$items_to_null = array(
				'river/item/wrapper',
			);
			//Force the items others..
			$others = array (
				'friends/river/create',
				'annotation/annotate',
			);
			
			$items_to_extend = array_merge($others, $items_to_extend);
			
			foreach ($items_to_extend as $item_to_extend) {
				if(!in_array($item_to_extend, $items_to_null)) {
					extend_view($item_to_extend, 'likes/river/item');
				}
			}
		}
		
		
		
	}
	
	function likes_filter_by_river($var){
		return (preg_match("/^river\//", $var));
	}
	
	//Generate url for accept action on elgg 1.7
	if(!is_callable('url_compatible_mode')) {
	    function url_compatible_mode($hook = '?') {
	    	$now = time();
			$query[] = "__elgg_ts=" . $now;
			$query[] = "__elgg_token=" . generate_action_token($now);
			$query_string = implode("&", $query);
			return $hook . $query_string;
	    }
	}
	
	function likes_question_for_ping() {
		global $ASKQUESTION_likes;
		$ASKQUESTION_likes = true;
	}
	
	function likes_get_version($humanreadable = false){
	    if (include(dirname(__FILE__) . "/version.php")) {
			return (!$humanreadable) ? $version : $release;
		}
		return FALSE;
    }
	
	register_elgg_event_handler('init','system','likes_init');
	register_elgg_event_handler('pagesetup','system','likes_setup', 20000);