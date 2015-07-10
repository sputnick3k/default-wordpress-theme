<?php
	global $wpdb;
	$cleanup_plugin_settings = $wpdb->get_results
	(
		"SELECT * FROM " .  cleanup_optimizer_plugin_settings()
	);
	if (count($cleanup_plugin_settings) != 0)
	{
		$cleanup_plugin_settings_keys = array();
		for ($flag = 0; $flag < count($cleanup_plugin_settings); $flag++)
		{
			array_push($cleanup_plugin_settings_keys, $cleanup_plugin_settings[$flag]->plugin_settings_key);
		}
		$index = array_search("show_cleanup_plugin_menu_admin", $cleanup_plugin_settings_keys);
		$cleanup_admin_role =$cleanup_plugin_settings[$index]->plugin_settings_value;
	
		$index = array_search("show_cleanup_plugin_menu_editor", $cleanup_plugin_settings_keys);
		$cleanup_editor_role =$cleanup_plugin_settings[$index]->plugin_settings_value;
	
		$index = array_search("show_cleanup_plugin_menu_author", $cleanup_plugin_settings_keys);
		$cleanup_author_role =$cleanup_plugin_settings[$index]->plugin_settings_value;
	
		$index = array_search("show_cleanup_plugin_menu_contributor", $cleanup_plugin_settings_keys);
		$cleanup_contributor_role =$cleanup_plugin_settings[$index]->plugin_settings_value;
	
		$index = array_search("show_cleanup_plugin_menu_subscriber", $cleanup_plugin_settings_keys);
		$cleanup_subscriber_role =$cleanup_plugin_settings[$index]->plugin_settings_value;
	
		$index = array_search("cleanup_menu_top_bar", $cleanup_plugin_settings_keys);
		$cleanup_menu_top_bar =$cleanup_plugin_settings[$index]->plugin_settings_value;
		
		$index = array_search("auto_ip_block", $cleanup_plugin_settings_keys);
		$auto_ip_block= $cleanup_plugin_settings[$index]->plugin_settings_value;
		
		$index = array_search("max_login_attempts", $cleanup_plugin_settings_keys);
		$max_login_attempts= $cleanup_plugin_settings[$index]->plugin_settings_value;
		
		$index = array_search("ip_block_msg", $cleanup_plugin_settings_keys);
		$ip_block_msg= $cleanup_plugin_settings[$index]->plugin_settings_value;
		
		$index = array_search("max_login_msg", $cleanup_plugin_settings_keys);
		$max_login_msg= $cleanup_plugin_settings[$index]->plugin_settings_value;
		
		$index = array_search("max_login_exceeded_msg", $cleanup_plugin_settings_keys);
		$max_login_exceeded_msg= $cleanup_plugin_settings[$index]->plugin_settings_value;
	}
?>