<?php 


	function croncheck_init()	{
		global $CONFIG;
		extend_view('admin/site','croncheck/info');
		extend_view('css','croncheck/css');
		
	}
	
	function croncheck_monitor($hook, $entity_type, $returnvalue, $params){
		set_plugin_setting("latest_" . $entity_type . "_ts", time(), "croncheck");		
	}
	
	register_elgg_event_handler('init','system','croncheck_init');

	register_plugin_hook('cron', 'minute', 'croncheck_monitor');
	register_plugin_hook('cron', 'fiveminute', 'croncheck_monitor');
	register_plugin_hook('cron', 'fifteenmin', 'croncheck_monitor');
	register_plugin_hook('cron', 'halfhour', 'croncheck_monitor');
	register_plugin_hook('cron', 'hourly', 'croncheck_monitor');
	register_plugin_hook('cron', 'daily', 'croncheck_monitor');
	register_plugin_hook('cron', 'weekly', 'croncheck_monitor');
	register_plugin_hook('cron', 'monthly', 'croncheck_monitor');
	register_plugin_hook('cron', 'yearly', 'croncheck_monitor');





?>