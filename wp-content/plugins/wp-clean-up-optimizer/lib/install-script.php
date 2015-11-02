<?php
	if(!function_exists("create_table_wp_scheduler"))
	{
		function create_table_wp_scheduler()
		{
			$sql = "CREATE TABLE " . wp_scheduler_tbl() . "(
					scheduler_id INTEGER(10) UNSIGNED NOT NULL AUTO_INCREMENT,
					wp_schedule VARCHAR(1000),
					start_date DATE,
					schedule_type VARCHAR(100),
					cron_name VARCHAR(100),
					PRIMARY KEY (scheduler_id)
			)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE utf8_general_ci";
			dbDelta($sql);
		}
	}
	
	if(!function_exists("create_table_db_optimizer"))
	{
		function create_table_db_optimizer()
		{
			$sql = "CREATE TABLE " . db_scheduler_tbl() . "(
					scheduler_id INTEGER(10) UNSIGNED NOT NULL AUTO_INCREMENT,
					db_optimizer TEXT,
					start_date DATE,
					schedule_type VARCHAR(100),
					cron_name VARCHAR(100),
					scheduler_action INTEGER(50),
					PRIMARY KEY (scheduler_id)
			)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE utf8_general_ci";
			dbDelta($sql);
		}
	}
	
	if(!function_exists("create_table_cleanup_optimizer_log"))
	{
		function create_table_cleanup_optimizer_log()
		{
			global $wpdb;
			$sql = "CREATE TABLE " . cleanup_optimizer_log() . "(
				id INTEGER(10) UNSIGNED NOT NULL AUTO_INCREMENT,
				username VARCHAR(100) NOT NULL,
				ip_address VARCHAR(20) NOT NULL,
				geo_location VARCHAR(200) NOT NULL,
				latitude VARCHAR(50) NOT NULL,
				longitude VARCHAR(50) NOT NULL,
				date_time DATETIME,
				login_status INTEGER(1) NOT NULL,
				block_ip INTEGER(1) NOT NULL,
				PRIMARY KEY (id)
			)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE utf8_general_ci";
			dbDelta($sql);
		}
	}
	
	if(!function_exists("create_table_block_single_ip"))
	{
		function create_table_block_single_ip()
		{
			global $wpdb;
			$sql = "CREATE TABLE " . wp_cleanup_optimizer_block_single_ip() . "(
				id INTEGER(10) UNSIGNED NOT NULL AUTO_INCREMENT,
				block_ip_address VARCHAR(20) NOT NULL,
				PRIMARY KEY (id)
			)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE utf8_general_ci";
			dbDelta($sql);
		}
	}
	
	if(!function_exists("create_table_block_range_ip"))
	{
		function create_table_block_range_ip()
		{
			global $wpdb;
			$sql = "CREATE TABLE " . wp_cleanup_optimizer_block_range_ip() . "(
				id INTEGER(10) UNSIGNED NOT NULL AUTO_INCREMENT,
				block_start_range VARCHAR(20) NOT NULL,
				block_end_range VARCHAR(20) NOT NULL,
				PRIMARY KEY (id)
			)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE utf8_general_ci";
			dbDelta($sql);
		}
	}
	
	if(!function_exists("create_wp_cleanup_optimizer_licensing"))
	{
		function create_wp_cleanup_optimizer_licensing()
		{
			global $wpdb;
			$sql = "CREATE TABLE " . wp_cleanup_optimizer_licensing() . "(
					licensing_id INTEGER(10) UNSIGNED NOT NULL AUTO_INCREMENT,
					version VARCHAR(10) NOT NULL,
					type VARCHAR(100) NOT NULL,
					url TEXT NOT NULL,
					api_key TEXT NOT NULL,
					order_id VARCHAR(100) NOT NULL,
					PRIMARY KEY (licensing_id)
			)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE utf8_general_ci";
			dbDelta($sql);
		}
	}
	
	if(!function_exists("create_table_cleanup_optimizer_plugin_settings"))
	{
		function create_table_cleanup_optimizer_plugin_settings()
		{
			global $wpdb;
			$sql = "CREATE TABLE " . cleanup_optimizer_plugin_settings() ." (
				plugin_settings_id INTEGER(10) UNSIGNED NOT NULL AUTO_INCREMENT,
				plugin_settings_key VARCHAR(200) NOT NULL,
				plugin_settings_value VARCHAR(200) NOT NULL,
				PRIMARY KEY (plugin_settings_id)
			)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE utf8_general_ci";
			dbDelta($sql);
		}
	}
	
	global $wpdb;
	require_once(ABSPATH . "wp-admin/includes/upgrade.php");
	$version=get_option("wp-cleanup-optimizer-version-number");
	update_option("tech-banker-updation-check-url","http://tech-banker.com/wp-admin/admin-ajax.php");
	switch($version)
	{
		case "":
			if (count($wpdb->get_var("SHOW TABLES LIKE '" . wp_scheduler_tbl() . "'")) == 0)
			{
				create_table_wp_scheduler();
			}
			if (count($wpdb->get_var("SHOW TABLES LIKE '" . db_scheduler_tbl() . "'")) == 0)
			{
				create_table_db_optimizer();
			}
			if (count($wpdb->get_var("SHOW TABLES LIKE '" . cleanup_optimizer_log() . "'")) == 0)
			{
				create_table_cleanup_optimizer_log();
			}
			if (count($wpdb->get_var("SHOW TABLES LIKE '" . cleanup_optimizer_plugin_settings() . "'")) == 0)
			{
				create_table_cleanup_optimizer_plugin_settings();
				if(!class_exists("save_cleanup_settings"))
				{
					class save_cleanup_settings
					{
						function insert_data($tbl, $data)
						{
							global $wpdb;
							$wpdb->insert($tbl,$data);
						}
					}
				}
				$insert_plugin_settings = new save_cleanup_settings();
				$plugin_setting_value = array();
				$plugin_settings = array();
				$plugin_settings["show_cleanup_plugin_menu_admin"] = "1";
				$plugin_settings["show_cleanup_plugin_menu_editor"] = "1";
				$plugin_settings["show_cleanup_plugin_menu_author"] = "1";
				$plugin_settings["show_cleanup_plugin_menu_contributor"] = "0";
				$plugin_settings["show_cleanup_plugin_menu_subscriber"] = "0";
				$plugin_settings["cleanup_menu_top_bar"] = "1";
				$plugin_settings["auto_ip_block"] = "1";
				$plugin_settings["max_login_attempts"] = "5";
				$plugin_settings["ip_block_msg"] =__("Your IP has been blocked!", cleanup_optimizer);
				$plugin_settings["max_login_msg"] =__("Maximum Login attempts left [maxAttempts]", cleanup_optimizer) ;
				$plugin_settings["max_login_exceeded_msg"] = __("You have Exceeded Maximum Login Attempts.\n So, your IP has been blocked for today. \n Kindly, try again after 24 Hours.", cleanup_optimizer);
			
				foreach ($plugin_settings as $val => $innerKey)
				{
					$plugin_setting_value["plugin_settings_key"] = $val;
					$plugin_setting_value["plugin_settings_value"] = $innerKey;
					$insert_plugin_settings->insert_data(cleanup_optimizer_plugin_settings(),$plugin_setting_value);
				}
			}
			if (count($wpdb->get_var("SHOW TABLES LIKE '" . wp_cleanup_optimizer_licensing() . "'")) == 0)
			{
				create_wp_cleanup_optimizer_licensing();
			}
			if (count($wpdb->get_var("SHOW TABLES LIKE '" . wp_cleanup_optimizer_block_single_ip() . "'")) == 0)
			{
				create_table_block_single_ip();
			}
			if (count($wpdb->get_var("SHOW TABLES LIKE '" . wp_cleanup_optimizer_block_range_ip() . "'")) == 0)
			{
				create_table_block_range_ip();
			}
		break;
		case "2.0":
			if (count($wpdb->get_results("SELECT * FROM " . db_scheduler_tbl())) != 0)
			{
				if(!class_exists("manage_data"))
				{
					class manage_data
					{
						function insert_data($tbl, $data)
						{
							global $wpdb;
							$wpdb->insert($tbl,$data);
						}
					}
				}
				$db_scheduler_data = $wpdb->get_results
				(
					"SELECT * FROM " . db_scheduler_tbl()
				);
				$drop_table = "DROP TABLE " . db_scheduler_tbl();
				$wpdb->query($drop_table);
				
				create_table_db_optimizer();
				
				$db_schedulers = array();
				$insert_db_schedulers = new manage_data();
				for($flag = 0; $flag < count($db_scheduler_data); $flag++)
				{
					$db_schedulers["scheduler_id"] = $db_scheduler_data[$flag]->scheduler_id;
					$db_schedulers["db_optimizer"] = $db_scheduler_data[$flag]->db_optimizer;
					$db_schedulers["start_date"] = $db_scheduler_data[$flag]->start_date;
					$db_schedulers["schedule_type"] = $db_scheduler_data[$flag]->schedule_type;
					$db_schedulers["cron_name"] =  $db_scheduler_data[$flag]->cron_name;
					$db_schedulers["scheduler_action"] = $db_scheduler_data[$flag]->scheduler_action;
					
					$insert_db_schedulers->insert_data(db_scheduler_tbl(),$db_schedulers);
				}
			}
		break;
		case "2.1":
			if (count($wpdb->get_results("SELECT * FROM " . db_scheduler_tbl())) != 0)
			{
				if(!class_exists("manage_data"))
				{
					class manage_data
					{
						function insert_data($tbl, $data)
						{
							global $wpdb;
							$wpdb->insert($tbl,$data);
						}
					}
				}
				$db_scheduler_data = $wpdb->get_results
				(
						"SELECT * FROM " . db_scheduler_tbl()
				);
				$drop_table = "DROP TABLE " . db_scheduler_tbl();
				$wpdb->query($drop_table);
		
				create_table_db_optimizer();
		
				$db_schedulers = array();
				$insert_db_schedulers = new manage_data();
				for($flag = 0; $flag < count($db_scheduler_data); $flag++)
				{
					$db_schedulers["scheduler_id"] = $db_scheduler_data[$flag]->scheduler_id;
					$db_schedulers["db_optimizer"] = $db_scheduler_data[$flag]->db_optimizer;
					$db_schedulers["start_date"] = $db_scheduler_data[$flag]->start_date;
					$db_schedulers["schedule_type"] = $db_scheduler_data[$flag]->schedule_type;
					$db_schedulers["cron_name"] =  $db_scheduler_data[$flag]->cron_name;
					$db_schedulers["scheduler_action"] = $db_scheduler_data[$flag]->scheduler_action;
					
					$insert_db_schedulers->insert_data(db_scheduler_tbl(),$db_schedulers);
				}
			}
		break;
	}
	update_option("wp-cleanup-optimizer-version-number","2.2");
	$plugin_updation = get_option("wp-cleanup-automatic-update");
	if($plugin_updation == "")
	{
		update_option("wp-cleanup-automatic-update",1);
	}
?>