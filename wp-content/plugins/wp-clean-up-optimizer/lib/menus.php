<?php
//--------------------------------------------------------------------------------------------------------------//
// CODE FOR CREATING MENUS
//---------------------------------------------------------------------------------------------------------------//
if (!is_user_logged_in())
{
	return;
}
else
{
	add_menu_page("WP Clean Up Optimizer", "WP Clean Up Optimizer", "read", "cpo_dashboard", "",plugins_url("/assets/images/icons/icon.png" , dirname(__FILE__)));
	add_submenu_page("cpo_dashboard", "Dashboard",__("Dashboard",cleanup_optimizer), "read", "cpo_dashboard", "cpo_dashboard");
	add_submenu_page("cpo_dashboard", "Plugin Updates", __("Plugin Updates",cleanup_optimizer), "read", "cpo_plugin_updates", "cpo_plugin_updates");
	add_submenu_page("cpo_dashboard", "Login Logs", __("Login Logs", cleanup_optimizer), "read", "cpo_login_logs", "cpo_login_logs");
	add_submenu_page("cpo_dashboard", "Cron Jobs", __("Cron Jobs", cleanup_optimizer), "read", "cpo_cron_jobs","cpo_cron_jobs");
	add_submenu_page("cpo_dashboard", "General Settings", __("General Settings",cleanup_optimizer), "read", "cpo_general_settings","cpo_general_settings");
	add_submenu_page("cpo_dashboard", "Feature Requests", __("Feature Requests",cleanup_optimizer), "read", "cpo_feedback", "cpo_feedback");
	add_submenu_page("cpo_dashboard", "System Status", __("System Status",cleanup_optimizer), "read", "cpo_system_status", "cpo_system_status");
	add_submenu_page("cpo_dashboard", "Premium Editions", __("Premium Editions",cleanup_optimizer), "read", "cpo_premium_edition","cpo_premium_edition");
	add_submenu_page("cpo_dashboard", "Recommendations", __("Recommendations", cleanup_optimizer), "read", "cpo_recommendations","cpo_recommendations");
	add_submenu_page("cpo_dashboard", "Our Other Services", __("Our Other Services",cleanup_optimizer), "read", "cpo_other_services", "cpo_other_services");
	//--------------------------------------------------------------------------------------------------------------//
	// CODE FOR CREATING PAGES
	//---------------------------------------------------------------------------------------------------------------//
	if(!function_exists("cpo_dashboard"))
	{
		function cpo_dashboard()
		{
			global $wpdb,$current_user,$user_role_permission;
			if(is_super_admin())
			{
				$cpo_role = "administrator";
			}
			else
			{
				$cpo_role = $wpdb->prefix . "capabilities";
				$current_user->role = array_keys($current_user->$cpo_role);
				$cpo_role = $current_user->role[0];
			}
			if(file_exists(CLEANUP_BK_PLUGIN_DIR."lib/header.php"))
			{
				include_once CLEANUP_BK_PLUGIN_DIR."lib/header.php";
			}
			if(file_exists(CLEANUP_BK_PLUGIN_DIR . "/views/dashboard.php"))
			{
				include_once CLEANUP_BK_PLUGIN_DIR . "/views/dashboard.php";
			}
		}
	}
	if(!function_exists("cpo_general_settings"))
	{
		function cpo_general_settings()
		{
			global $wpdb,$current_user,$user_role_permission;
			if(is_super_admin())
			{
				$cpo_role = "administrator";
			}
			else
			{
				$cpo_role = $wpdb->prefix . "capabilities";
				$current_user->role = array_keys($current_user->$cpo_role);
				$cpo_role = $current_user->role[0];
			}
			if(file_exists(CLEANUP_BK_PLUGIN_DIR."lib/header.php"))
			{
				include_once CLEANUP_BK_PLUGIN_DIR."lib/header.php";
			}
			if(file_exists(CLEANUP_BK_PLUGIN_DIR . "/lib/get-plugin-settings.php"))
			{
				include CLEANUP_BK_PLUGIN_DIR . "/lib/get-plugin-settings.php";
			}
			if(file_exists(CLEANUP_BK_PLUGIN_DIR . "/views/general-settings.php"))
			{
				include_once CLEANUP_BK_PLUGIN_DIR . "/views/general-settings.php";
			}
		}
	}
	if(!function_exists("cpo_login_logs"))
	{
		function cpo_login_logs()
		{
			global $wpdb,$current_user,$user_role_permission;
			if(is_super_admin())
			{
				$cpo_role = "administrator";
			}
			else
			{
				$cpo_role = $wpdb->prefix . "capabilities";
				$current_user->role = array_keys($current_user->$cpo_role);
				$cpo_role = $current_user->role[0];
			}
			if(file_exists(CLEANUP_BK_PLUGIN_DIR."lib/header.php"))
			{
				include_once CLEANUP_BK_PLUGIN_DIR."lib/header.php";
			}
			if(file_exists(CLEANUP_BK_PLUGIN_DIR . "/views/login-logs.php"))
			{
				include_once CLEANUP_BK_PLUGIN_DIR . "/views/login-logs.php";
			}
		}
	}
	if(!function_exists("cpo_cron_jobs"))
	{
		function cpo_cron_jobs()
		{
			global $wpdb,$current_user,$user_role_permission;
			if(is_super_admin())
			{
				$cpo_role = "administrator";
			}
			else
			{
				$cpo_role = $wpdb->prefix . "capabilities";
				$current_user->role = array_keys($current_user->$cpo_role);
				$cpo_role = $current_user->role[0];
			}
			if(file_exists(CLEANUP_BK_PLUGIN_DIR."lib/header.php"))
			{
				include_once CLEANUP_BK_PLUGIN_DIR."lib/header.php";
			}
			if(file_exists(CLEANUP_BK_PLUGIN_DIR . "/views/cron-job.php"))
			{
				include_once CLEANUP_BK_PLUGIN_DIR . "/views/cron-job.php";
			}
		}
	}
	if(!function_exists("cpo_system_status"))
	{
		function cpo_system_status()
		{
			global $wpdb,$current_user,$user_role_permission,$wp_version,$gb;
			if(is_super_admin())
			{
				$cpo_role = "administrator";
			}
			else
			{
				$cpo_role = $wpdb->prefix . "capabilities";
				$current_user->role = array_keys($current_user->$cpo_role);
				$cpo_role = $current_user->role[0];
			}
			if(file_exists(CLEANUP_BK_PLUGIN_DIR."lib/header.php"))
			{
				include_once CLEANUP_BK_PLUGIN_DIR."lib/header.php";
			}
			if(file_exists(CLEANUP_BK_PLUGIN_DIR . "/views/system-status.php"))
			{
				include_once CLEANUP_BK_PLUGIN_DIR . "/views/system-status.php";
			}
		}
	}
	if(!function_exists("cpo_premium_edition"))
	{
		function cpo_premium_edition()
		{
			global $wpdb,$current_user,$user_role_permission;
			if(is_super_admin())
			{
				$cpo_role = "administrator";
			}
			else
			{
				$cpo_role = $wpdb->prefix . "capabilities";
				$current_user->role = array_keys($current_user->$cpo_role);
				$cpo_role = $current_user->role[0];
			}
			if(file_exists(CLEANUP_BK_PLUGIN_DIR."lib/header.php"))
			{
				include_once CLEANUP_BK_PLUGIN_DIR."lib/header.php";
			}
			if(file_exists(CLEANUP_BK_PLUGIN_DIR . "/views/premium-edition.php"))
			{
				include_once CLEANUP_BK_PLUGIN_DIR . "/views/premium-edition.php";
			}
		}
	}
	if(!function_exists("cpo_recommendations"))
	{
		function cpo_recommendations()
		{
			global $wpdb,$current_user,$user_role_permission;
			if(is_super_admin())
			{
				$cpo_role = "administrator";
			}
			else
			{
				$cpo_role = $wpdb->prefix . "capabilities";
				$current_user->role = array_keys($current_user->$cpo_role);
				$cpo_role = $current_user->role[0];
			}
			if(file_exists(CLEANUP_BK_PLUGIN_DIR."lib/header.php"))
			{
				include_once CLEANUP_BK_PLUGIN_DIR."lib/header.php";
			}
			if(file_exists(CLEANUP_BK_PLUGIN_DIR . "/views/recommended-plugins.php"))
			{
				include_once CLEANUP_BK_PLUGIN_DIR . "/views/recommended-plugins.php";
			}
		}
	}
	if(!function_exists("cpo_other_services"))
	{
		function cpo_other_services()
		{
			global $wpdb,$current_user,$user_role_permission;
			if(is_super_admin())
			{
				$cpo_role = "administrator";
			}
			else
			{
				$cpo_role = $wpdb->prefix . "capabilities";
				$current_user->role = array_keys($current_user->$cpo_role);
				$cpo_role = $current_user->role[0];
			}
			if(file_exists(CLEANUP_BK_PLUGIN_DIR."lib/header.php"))
			{
				include_once CLEANUP_BK_PLUGIN_DIR."lib/header.php";
			}
			if(file_exists(CLEANUP_BK_PLUGIN_DIR . "/views/other-services.php"))
			{
				include_once CLEANUP_BK_PLUGIN_DIR . "/views/other-services.php";
			}
		}
	}
	if(!function_exists("cpo_plugin_updates"))
	{
		function cpo_plugin_updates()
		{
			global $wpdb,$current_user,$user_role_permission;
			if(is_super_admin())
			{
				$cpo_role = "administrator";
			}
			else
			{
				$cpo_role = $wpdb->prefix . "capabilities";
				$current_user->role = array_keys($current_user->$cpo_role);
				$cpo_role = $current_user->role[0];
			}
			if(file_exists(CLEANUP_BK_PLUGIN_DIR."lib/header.php"))
			{
				include_once CLEANUP_BK_PLUGIN_DIR."lib/header.php";
			}
			if(file_exists(CLEANUP_BK_PLUGIN_DIR . "/views/automatic-plugin-update.php"))
			{
				include_once CLEANUP_BK_PLUGIN_DIR . "/views/automatic-plugin-update.php";
			}
		}
	}
	
	if(!function_exists("cpo_feedback"))
	{
		function cpo_feedback()
		{
			global $wpdb,$current_user,$user_role_permission;
			if(is_super_admin())
			{
				$cpo_role = "administrator";
			}
			else
			{
				$cpo_role = $wpdb->prefix . "capabilities";
				$current_user->role = array_keys($current_user->$cpo_role);
				$cpo_role = $current_user->role[0];
			}
			if(file_exists(CLEANUP_BK_PLUGIN_DIR."lib/header.php"))
			{
				include_once CLEANUP_BK_PLUGIN_DIR."lib/header.php";
			}
			if(file_exists(CLEANUP_BK_PLUGIN_DIR . "/views/cleanup-feedback.php"))
			{
				include_once CLEANUP_BK_PLUGIN_DIR . "/views/cleanup-feedback.php";
			}
		}
	}
}
?>