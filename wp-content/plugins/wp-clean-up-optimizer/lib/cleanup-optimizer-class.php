<?php 
switch($cpo_role)
{
	case "administrator":
		$user_role_permission = "manage_options";
		break;
	case "editor":
		$user_role_permission = "publish_pages";
		break;
	case "author":
		$user_role_permission = "publish_posts";
		break;
}
if (!current_user_can($user_role_permission))
{
	return;
}
else
{
	function clean_data($type)
	{
		global $wpdb;
		switch($type)
		{
			case 1:
				$delete = new delete_data();
				$where = array();
				$where["post_status"] ="auto-draft";
				$delete->delete_revision($where);
			break;
			
			case 2:
				$wpdb->query
				(
					$wpdb->prepare
					(
						"DELETE FROM $wpdb->options WHERE option_name LIKE %s OR option_name LIKE %s OR option_name LIKE %s OR option_name LIKE %s",
						"_site_transient_browser_%",
						"_site_transient_timeout_browser_%",
						"_transient_feed_%",
						"_transient_timeout_feed_%"
					)
				);
			break;
			
			case 3:
				$delete = new delete_data();
				$where = array();
				$where["post_status"] ="draft";
				$delete->delete_revision($where);
			break;
			
			case 5:
				$wpdb->query
				(
					"DELETE FROM $wpdb->commentmeta WHERE comment_id NOT IN (SELECT comment_id FROM $wpdb->comments)"
				);
			break;
			
			case 6:
				$wpdb->query
				(
					"DELETE pm FROM $wpdb->postmeta pm LEFT JOIN $wpdb->posts wp ON wp.ID = pm.post_id WHERE wp.ID IS NULL"
				);
			break;
			
			case 7:
				$wpdb->query
				(
					$wpdb->prepare
					(
						"DELETE FROM $wpdb->term_relationships WHERE term_taxonomy_id=%d AND object_id NOT IN (SELECT id FROM $wpdb->posts)",
						1
					)
				);
			break;
			
			case 8:
				$delete = new delete_data();
				$where = array();
				$where["post_type"] ="revision";
				$delete->delete_revision($where);
			break;
			
			case 9:
				$delete = new delete_data();
				$where = array();
				$where["comment_type"] ="pingback";
				$delete->delete_comments($where);
			break;
			
			case 10:
				$wpdb->query
				(
					$wpdb->prepare
					(
						"DELETE FROM $wpdb->options WHERE option_name LIKE %s OR option_name LIKE %s",
						"_transient_%",
						"_site_transient_%"
					)
				);
			break;
			
			case 11:
				$delete = new delete_data();
				$where = array();
				$where["comment_type"] ="trackback";
				$delete->delete_comments($where);
			break;
			
			case 12:
				$delete = new delete_data();
				$where = array();
				$where["comment_approved"] ="spam";
				$delete->delete_comments($where);
			break;
			
			case 13:
				$delete = new delete_data();
				$where = array();
				$where["comment_approved"] ="trash";
				$delete->delete_comments($where);
			break;
			
		}
	}
	if(isset($_REQUEST["param"]))
	{
		switch($_REQUEST["param"])
		{
			case "wp_cleanup":
				if(wp_verify_nonce( $_REQUEST["_wpnonce"], "clear_wp_data"))
				{
					$type= $_REQUEST["typeClean"];
					clean_data($type);
					die();
				}
			break;
			case "bulk_delete_action":
				if(wp_verify_nonce( $_REQUEST["_wpnonce"], "bulk_clear_wp_data"))
				{
					$val="";
					$types= $_REQUEST["ux_chk_cleanup"];
					print_r($types);
					for($flag=0; $flag<count($types); $flag++)
					{
						clean_data($types[$flag]);
					}
					die();
				}
			break;
			case "bulk_selected_action":
				if(wp_verify_nonce( $_REQUEST["_wpnonce"], "bulk_action_table"))
				{
					$types= $_REQUEST["ux_ddl_bulk_action_db_optimzier"];
					$chk_value=$_REQUEST["ux_chk_cleanup_arr_db"];
					$test=array();
					if(is_multisite())
					{
						for($flag1=0; $flag1 < count($chk_value); $flag1++)
						{
							if((strstr($chk_value[$flag1],$wpdb->terms) || strstr($chk_value[$flag1],$wpdb->term_taxonomy) || strstr($chk_value[$flag1],$wpdb->term_relationships) || strstr($chk_value[$flag1],$wpdb->commentmeta) || strstr($chk_value[$flag1],$wpdb->comments)
								|| strstr($chk_value[$flag1],$wpdb->links) || strstr($chk_value[$flag1],$wpdb->options)|| strstr($chk_value[$flag1],$wpdb->postmeta) || strstr($chk_value[$flag1], $wpdb->posts) || strstr($chk_value[$flag1],$wpdb->users) || strstr($chk_value[$flag1],$wpdb->usermeta)
								|| strstr($chk_value[$flag1],$wpdb->prefix."cleanup_optimizer_wp_scheduler") || strstr($chk_value[$flag1],$wpdb->prefix . "cleanup_optimizer_db_scheduler") || strstr($chk_value[$flag1],$wpdb->prefix . "cleanup_optimizer_login_log")
								|| strstr($chk_value[$flag1],$wpdb->prefix . "cleanup_optimizer_plugin_settings") || strstr($chk_value[$flag1],$wpdb->prefix . "cleanup_optimizer_licensing") || strstr($chk_value[$flag1],$wpdb->prefix . "cleanup_optimizer_block_single_ip")
								|| strstr($chk_value[$flag1],$wpdb->prefix . "cleanup_optimizer_block_range_ip") || strstr($chk_value[$flag1],$wpdb->signups) || strstr($chk_value[$flag1],$wpdb->sitemeta) || strstr($chk_value[$flag1],$wpdb->site) || strstr($chk_value[$flag1],$wpdb->registration_log)
								|| strstr($chk_value[$flag1],$wpdb->blogs) || strstr($chk_value[$flag1],$wpdb->blog_versions)) == true)
							{
							
							}
							else
							{
								switch($types)
								{
									case 1:
										$wpdb->query
										(
											"TRUNCATE TABLE $chk_value[$flag1]"
										);
									break;
								}
							}
						}
					}
					else
					{
						for($flag1=0; $flag1 < count($chk_value); $flag1++)
						{
							if((strstr($chk_value[$flag1],$wpdb->terms) || strstr($chk_value[$flag1],$wpdb->term_taxonomy) || strstr($chk_value[$flag1],$wpdb->term_relationships) || strstr($chk_value[$flag1],$wpdb->commentmeta) || strstr($chk_value[$flag1],$wpdb->comments)
								|| strstr($chk_value[$flag1],$wpdb->links) || strstr($chk_value[$flag1],$wpdb->options)|| strstr($chk_value[$flag1],$wpdb->postmeta) || strstr($chk_value[$flag1], $wpdb->posts) || strstr($chk_value[$flag1],$wpdb->users) || strstr($chk_value[$flag1],$wpdb->usermeta)
								|| strstr($chk_value[$flag1],$wpdb->prefix."cleanup_optimizer_wp_scheduler") || strstr($chk_value[$flag1],$wpdb->prefix . "cleanup_optimizer_db_scheduler") || strstr($chk_value[$flag1],$wpdb->prefix . "cleanup_optimizer_login_log")
								|| strstr($chk_value[$flag1],$wpdb->prefix . "cleanup_optimizer_plugin_settings") || strstr($chk_value[$flag1],$wpdb->prefix . "cleanup_optimizer_licensing") || strstr($chk_value[$flag1],$wpdb->prefix . "cleanup_optimizer_block_single_ip")
								|| strstr($chk_value[$flag1],$wpdb->prefix . "cleanup_optimizer_block_range_ip")) == true)
							{
								
							}
							else
							{
								switch($types)
								{
									case 1:
										$wpdb->query
										(
											"TRUNCATE TABLE $chk_value[$flag1]"
										);
									break;
								}
							}
						}
					}
					die();
				}
			break;
			case "table_action":
				if(wp_verify_nonce( $_REQUEST["_wpnonce"], "clear_db_data"))
				{
					$perform_action=intval($_REQUEST["perform_action"]);
					$table_name=esc_attr($_REQUEST["table_name"]);
					switch($perform_action)
					{
						case 1:
							$wpdb->query
							(
								"TRUNCATE TABLE $table_name"
							);
						break;
					}
					die();
				}
			break;
			case "cleanup_plugin_updates":
				if(wp_verify_nonce( $_REQUEST["_wpnonce"], "update_plugin_nonce"))
				{
					$plugin_update = esc_attr($_REQUEST["cleanup_updates"]);
					update_option("wp-cleanup-automatic-update",$plugin_update);
				}
			break;
			case "filter_data":
				$start_date = $_REQUEST["start_date"];
				$end_date = $_REQUEST["end_date"];
				$logs = $wpdb->get_results
				(
						"SELECT * FROM " . cleanup_optimizer_log() ." WHERE date_time between '$start_date' and '$end_date' order by date_time desc"
				);
				?>
				<table class="widefat" style="background-color:#ffffff; margin-top:10px;" id="data-table-fetch">
					<thead>
						<tr>
							<th style="width:14%">
								<?php _e( "Username", cleanup_optimizer ); ?>
								<img src="<?php echo plugins_url("/assets/images/questionmark_icon.png" , dirname(__FILE__))?>" class="tooltip_img hovertip" data-original-title='<?php _e("Allows you to view the username of recent logged in users.",cleanup_optimizer) ;?>'/>
							</th>
							<th style="width:16%">
								<?php _e( "IP Address", cleanup_optimizer ); ?>
								<img src="<?php echo plugins_url("/assets/images/questionmark_icon.png" , dirname(__FILE__))?>" class="tooltip_img hovertip" data-original-title='<?php _e("Allows you to view the IP Address of the logged in users.",cleanup_optimizer) ;?>'/>
							</th>
							<th style="width:16%">
								<?php _e( "Location", cleanup_optimizer ); ?>
								<img src="<?php echo plugins_url("/assets/images/questionmark_icon.png" , dirname(__FILE__))?>" class="tooltip_img hovertip" data-original-title='<?php _e("Allows you to view the current location of the logged in users.",cleanup_optimizer) ;?>'/>
							</th>
							<th style="width:22%">
								<?php _e( "Login Date & Time", cleanup_optimizer ); ?>
								<img src="<?php echo plugins_url("/assets/images/questionmark_icon.png" , dirname(__FILE__))?>" class="tooltip_img hovertip" data-original-title='<?php _e("Allows you to view the logged in date and time of the users.",cleanup_optimizer) ;?>'/>
							</th>
							<th style="width:14%; text-align: center;">
								<?php _e( "Status", cleanup_optimizer ); ?>
								<img src="<?php echo plugins_url("/assets/images/questionmark_icon.png" , dirname(__FILE__))?>" class="tooltip_img hovertip" data-original-title='<?php _e("Lets, you know the status of the users, whether they have successfully logged in or not.",cleanup_optimizer) ;?>'/>
							</th>
							<th style="width:18%;">
								<?php _e( "Action", cleanup_optimizer ); ?>
								<img src="<?php echo plugins_url("/assets/images/questionmark_icon.png" , dirname(__FILE__))?>" class="tooltip_img hovertip" data-original-title='<?php _e("Allows you to block or whitelist IP Address for the logged in users as per your requirement.",cleanup_optimizer) ;?>'/>
							</th>
						</tr>
					</thead>
					<tbody id="ux_login_logs">
					<?php
					for($flag=0; $flag<count($logs); $flag++)
					{
					$alternate= (empty($alternate)) ? "class='alternate'" : "";
						?>
						<tr <?php echo $alternate; ?>>
							<td><?php echo $logs[$flag]->username; ?></td>
							<td><?php echo $logs[$flag]->ip_address; ?></td>
							<td><?php echo $logs[$flag]->geo_location; ?></td>
							<td><?php echo date_format(date_create($logs[$flag]->date_time),"d M, Y g:i A e "); ?></td>
							<td style="text-align: center !important">
								<?php 
								if($logs[$flag]->login_status == "1")
								{
									?>
									<span class="log_success"><?php _e( "Success", cleanup_optimizer ); ?></span>
									<?php 
								} 
								else
								{
									?>
									<span class="log_Failed"><?php _e( "Failed", cleanup_optimizer ); ?></span>
									<?php
								}
								?>
							</td>
							<td>
							<?php 
							if($logs[$flag]->block_ip == "1")
							{
								?>
								<a href="#" style="color:#0d1ff6;"  onclick="block_ip(<?php echo $logs[$flag]->id; ?>,0);"><?php _e("Whitelist IP Address", cleanup_optimizer); ?></a>
								<?php 
							}
							else 
							{
								?>
								<a href="#" style="color:#0d1ff6;" onclick="block_ip(<?php echo $logs[$flag]->id; ?>,1);"><?php _e("Block IP Address", cleanup_optimizer); ?></a>
								<?php 
							}
							?>
							</td>
							
						</tr>
						<?php 
						}
					?>
					</tbody>
				</table>
				<script type="text/javascript">
					var oTable = jQuery("#data-table-fetch").dataTable
					({
						"bJQueryUI": false,
						"bAutoWidth": true,
						"sPaginationType": "full_numbers",
						"sDom": '<"datatable-header"fl>t<"datatable-footer"ip>',
						"oLanguage": 
						{
							"sLengthMenu": "<span>Show entries:</span> _MENU_"
						},
						"aaSorting": [[ 5, "desc" ]],
						"bFilter": false
					});
				</script>
				<?php 
				die();
			break;
		}
		die();
	}
}
?>