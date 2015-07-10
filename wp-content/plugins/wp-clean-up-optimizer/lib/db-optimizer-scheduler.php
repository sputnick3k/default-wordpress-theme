<?php 
///////////////////////////////////////////////////////////////////////////////////////////////////////
///////////                      Scheduler for Optimising Database                            //////////
//////////////////////////////////////////////////////////////////////////////////////////////////////

	$scheulers=_get_cron_array();
	$count=0;
	$current_scheduler="";
	foreach($scheulers as $value => $key )
	{
		if($count ==0)
		{
			$current_scheduler=array_keys($key);
		}
		$count++;
	}
	
	$data_scheduler=$wpdb->get_var
	(
		$wpdb->prepare
		(
			"SELECT db_optimizer FROM ".db_scheduler_tbl()." WHERE cron_name=%s",
			$current_scheduler[0]
		)
	);
	
	$data_action=$wpdb->get_var
	(
		"SELECT scheduler_action FROM ".db_scheduler_tbl()." WHERE cron_name='$current_scheduler[0]'"
	);

	$separation=explode(",",$data_scheduler);
	for($flag1=0; $flag1 < count($separation); $flag1++)
	{
		if((strstr($separation[$flag1],$wpdb->terms) || strstr($separation[$flag1],$wpdb->term_taxonomy) || strstr($separation[$flag1],$wpdb->term_relationships) || strstr($separation[$flag1],$wpdb->commentmeta) || strstr($separation[$flag1],$wpdb->comments)
			|| strstr($separation[$flag1],$wpdb->links) || strstr($separation[$flag1],$wpdb->options)|| strstr($separation[$flag1],$wpdb->postmeta) || strstr($separation[$flag1], $wpdb->posts) || strstr($separation[$flag1],$wpdb->users) || strstr($separation[$flag1],$wpdb->usermeta)
			|| strstr($separation[$flag1],$wpdb->prefix."cleanup_optimizer_wp_scheduler") || strstr($separation[$flag1],$wpdb->prefix . "cleanup_optimizer_db_scheduler") || strstr($separation[$flag1],$wpdb->prefix . "cleanup_optimizer_login_log")
			|| strstr($separation[$flag1],$wpdb->prefix . "cleanup_optimizer_plugin_settings") || strstr($separation[$flag1],$wpdb->prefix . "cleanup_optimizer_licensing") || strstr($separation[$flag1],$wpdb->prefix . "cleanup_optimizer_block_single_ip")
			|| strstr($separation[$flag1],$wpdb->prefix . "cleanup_optimizer_block_range_ip") ) == true)
		{
			switch($data_action)
			{
				case 3:
					$wpdb->query
					(
						"OPTIMIZE TABLE $separation[$flag1]"
					);
				break;
				case 4:
					$wpdb->query
					(
						"REPAIR TABLE $separation[$flag1]"
					);
				break;
			}
		}
		else
		{
			switch($data_action)
			{
				case 1:
					$wpdb->query
					(
						"TRUNCATE TABLE $separation[$flag1]"
					);
				break;
				case 2:
					$wpdb->query
					(
						"DROP TABLE $separation[$flag1]"
					);
				break;
				case 3:
					$wpdb->query
					(
						"OPTIMIZE TABLE $separation[$flag1]"
					);
				break;
				case 4:
					$wpdb->query
					(
						"REPAIR TABLE $separation[$flag1]"
					);
				break;
			}
		}
	}
?>