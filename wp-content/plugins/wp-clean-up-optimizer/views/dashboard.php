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
	$wp_clear_data = wp_create_nonce( "clear_wp_data" );
	$action_bulk_clear = wp_create_nonce( "bulk_clear_wp_data" );
	$db_clear_data = wp_create_nonce( "clear_db_data" );
	$bulk_table_action = wp_create_nonce( "bulk_action_table" );
	$alternate = "class='alternate'";
	$alternate_class="class='alternate'";
	$total_size = "" ;
	$total_size_table = "" ;
	if(is_multisite())
	{
		$condition = "";
		$blog_ids = $wpdb->get_col("SELECT blog_id FROM $wpdb->blogs");
		foreach($blog_ids as $blog_id)
		{
			$condition.= " AND Name NOT LIKE '". $wpdb->prefix . $blog_id ."%'";
		}
		$wcpo_sql = "SHOW TABLE STATUS FROM `".DB_NAME."` WHERE Name LIKE '".$wpdb->prefix."%'" . $condition;
	}
	else
	{
		$wcpo_sql = "SHOW TABLE STATUS FROM `".DB_NAME."`";
	}
	$result = $wpdb->get_results($wcpo_sql);

	if(!function_exists("wp_clean_up_optimizer_count"))
	{
		function wp_clean_up_optimizer_count($type)
		{
			global $wpdb;
			switch($type)
			{
				case "revision":
					$count=$wpdb->get_var
					(
						$wpdb->prepare
						(
							"SELECT COUNT(*) FROM $wpdb->posts WHERE post_type = %s",
							"revision"
						)
					);
				break;
				case "draft":
					$count=$wpdb->get_var
					(
						$wpdb->prepare
						(
							"SELECT COUNT(*) FROM $wpdb->posts WHERE post_status = %s AND (post_type = %s OR post_type = %s)",
							"draft",
							"page",
							"post"
						)
					);
				break;
				case "autodraft":
					$count=$wpdb->get_var
					(
						$wpdb->prepare
						(
							"SELECT COUNT(*) FROM $wpdb->posts WHERE post_status = %s",
							"auto-draft"
						)
					);
				break;
				case "spam":
					$count=$wpdb->get_var
					(
						$wpdb->prepare
						(
							"SELECT COUNT(*) FROM $wpdb->comments WHERE comment_approved = %s",
							"spam"
						)
					);
				break;
				case "trash":
					$count=$wpdb->get_var
					(
						$wpdb->prepare
						(
							"SELECT COUNT(*) FROM $wpdb->comments WHERE comment_approved = %s",
							"trash"
						)
					);
				break;
					
				case "postmeta":
					$count=$wpdb->get_var
					(
						"SELECT COUNT(*) FROM $wpdb->postmeta pm LEFT JOIN $wpdb->posts wp ON wp.ID = pm.post_id WHERE wp.ID IS NULL"
					);
				break;
					
				case "commentmeta":
					$count=$wpdb->get_var
					(
						"SELECT COUNT(*) FROM $wpdb->commentmeta WHERE comment_id NOT IN (SELECT comment_id FROM $wpdb->comments)"
					);
				break;
					
				case "relationships":
					$count=$wpdb->get_var
					(
						"SELECT COUNT(*) FROM $wpdb->term_relationships WHERE term_taxonomy_id=1 AND object_id NOT IN (SELECT id FROM $wpdb->posts)"
					);
				break;
					
				case "feed":
					$count=$wpdb->get_var
					(
						"SELECT COUNT(*) FROM $wpdb->options WHERE option_name LIKE '_site_transient_browser_%' OR option_name LIKE '_site_transient_timeout_browser_%' OR option_name LIKE '_transient_feed_%' OR option_name LIKE '_transient_timeout_feed_%'"
					);
				break;
					
				case "remove_pingbacks":
					$count=$wpdb->get_var
					(
						"SELECT COUNT(*) FROM $wpdb->comments WHERE comment_type = 'pingback'"
					);
				break;
					
				case "remove_transient_options":
					$count=$wpdb->get_var
					(
						"SELECT COUNT(*) FROM $wpdb->options WHERE option_name LIKE '_transient_%' OR option_name LIKE '_site_transient_%'"
					);
				break;
					
				case "remove_trackbacks":
					$count=$wpdb->get_var
					(
						"SELECT COUNT(*) FROM $wpdb->comments WHERE comment_type = 'trackback'"
					);
				break;
			}
			return $count;
		}
	}
	if(!function_exists("cpo_format_size"))
	{
		function cpo_format_size($rawSize) {
			if($rawSize / 1073741824 > 1)
			{
				return number_format_i18n($rawSize/1073741824, 2) ." GB";
			}
			else if ($rawSize / 1048576 > 1)
			{
				return number_format_i18n($rawSize/1048576, 1) ." MB";
			}
			else if ($rawSize / 1024 > 1)
			{
				return number_format_i18n($rawSize/1024, 1) ." KB";
			}
			else
			{
				return number_format_i18n($rawSize, 0) ." bytes";
			}
		}
	}
	?>
	<div id="message" class="top-right message" style="display: none;">
		<div class="message-notification"></div>
		<div class="message-notification ui-corner-all growl-success" >
			<div onclick="cpo_message_close();" id="close-message" class="message-close">x</div>
			<div class="message-header"><?php _e("Success!",  cleanup_optimizer); ?></div>
			<div class="message-message" id="success_message"></div>
		</div>
	</div>
	<form id="ux_frm_cleanup_optimizer" name="ux_frm_cleanup_optimizer" class="layout-form" style="width:1000px">
		<div class="fluid-layout">
			<div class="layout-span12 responsive">
				<div class="widget-layout background-none">
					<div class="widget-layout-title">
						<h4><?php _e("WP Clean Up Optimizer", cleanup_optimizer); ?></h4>
					</div>
					<div class="widget-layout-body">
						<div class="layout-span6 responsive">
							<div class="widget-layout">
								<div class="widget-layout-title">
									<h4><?php _e("Database Information", cleanup_optimizer); ?></h4>
								</div>
								<div class="widget-layout-body">
									<div class="layout-control-group"> 
										<label class="layout-control-label"><?php _e("Database Host ", cleanup_optimizer); ?> : </label>
										<div class="layout-controls wpcpo-label-system-status">
											<?php echo DB_HOST;?>
										</div>
									</div>
									<div class="layout-control-group"> 
										<label class="layout-control-label"><?php _e("Database Name ", cleanup_optimizer); ?> : </label>
										<div class="layout-controls wpcpo-label-system-status">
											<?php echo DB_NAME;?>
										</div>
									</div>
									<div class="layout-control-group"> 
										<label class="layout-control-label"><?php _e("Database User ", cleanup_optimizer); ?> : </label>
										<div class="layout-controls wpcpo-label-system-status">
											<?php echo DB_USER;?>
										</div>
									</div>
									<div class="layout-control-group"> 
										<label class="layout-control-label"><?php _e("Database Type ", cleanup_optimizer); ?> : </label>
										<div class="layout-controls wpcpo-label-system-status">
											<?php 
												echo "MYSQL"; 
											?>
										</div>
									</div>
									<div class="layout-control-group"> 
										<label class="layout-control-label"><?php _e("Database Version", cleanup_optimizer); ?> : </label>
										<div class="layout-controls wpcpo-label-system-status">
											<?php 
												echo "v".$wpdb->db_version()." - ".PHP_OS;
											?>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="layout-span6 responsive">
							<div class="widget-layout">
								<div class="widget-layout-title">
									<h4><?php _e("Manage Trackbacks / Comments", cleanup_optimizer); ?><i class="standard_edition"><?php _e(" (Available in Premium Editions)",cleanup_optimizer)?></i></h4>
								</div>
								<div class="widget-layout-body">
									<div class="layout-control-group"> 
										<label class="layout-control-label"><?php _e("Trackbacks", cleanup_optimizer); ?> :
											<img src="<?php echo plugins_url("/assets/images/questionmark_icon.png" , dirname(__FILE__))?>" class="tooltip_img hovertip" data-original-title='<?php _e("Trackbacks are a way to notify legacy blog systems that you have linked to them. If you link to a WordPress blog they will be notified automatically using pingbacks, no other action necessary.",cleanup_optimizer) ;?>'/>
										</label>
										<div class="layout-controls wpcpo-label-system-status">
											<input type="radio" id="ux_rdl_tackbacks_on" name="ux_rdl_trackbacks" checked="checked" value="1" disabled="disabled" /><?php echo _e("Enable",cleanup_optimizer)?>
											<input type="radio" id="ux_rdl_tackbacks_off" name="ux_rdl_trackbacks" value="0" disabled="disabled" /><?php echo _e("Disable",cleanup_optimizer)?>
										</div>
									</div>
									<div class="layout-control-group"> 
										<label class="layout-control-label">
											<?php _e("Comments", cleanup_optimizer); ?> : 
											<img src="<?php echo plugins_url("/assets/images/questionmark_icon.png" , dirname(__FILE__))?>" class="tooltip_img hovertip" data-original-title='<?php _e("Manage comments on any Post or Page. It can be used to disable comments on the entire Blog.",cleanup_optimizer) ;?>'/>
										</label>
										<div class="layout-controls wpcpo-label-system-status">
											<input type="radio" id="ux_rdl_comments_on" name="ux_rdl_comments_action" checked="checked" value="1" disabled="disabled" /><?php echo _e("Enable",cleanup_optimizer)?>
											<input type="radio" id="ux_rdl_comments_off" name="ux_rdl_comments_action" value="0" disabled="disabled" /><?php echo _e("Disable",cleanup_optimizer)?>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="fluid-layout">
							<div class="layout-span12">
								<div class="framework_tabs">
									<ul class="framework_tab-links">
										<li class="active"><a href="#wp_data_optimizer"><?php _e("Data Optimizer", cleanup_optimizer); ?></a></li>
										<li><a href="#wp_data_optimizer_scheduler"><?php _e("Data Optimizer Scheduler", cleanup_optimizer); ?></a></li>
										<li><a href="#db_optimizer"><?php _e("DB Optimizer", cleanup_optimizer); ?></a></li>
										<li><a href="#db_optimizer_scheduler"><?php _e("DB Optimizer Scheduler", cleanup_optimizer); ?></a></li>
									</ul>
									<div class="framework_tab-content">
										<div id="wp_data_optimizer" class="framework_tab active">
											<div class="widget-layout">
												<div class="widget-layout-title">
													<h4><?php _e("Data Optimizer", cleanup_optimizer); ?></h4>
												</div>
												<div class="widget-layout-body">
													<div class="fluid-layout">
														<div class="layout-span12 responsive">
															<div class="layout-control-group">
																<select id="ux_ddl_bulk_action" name="ux_ddl_bulk_action" style="vertical-align:top">
																	<option value="0"><?php _e("Bulk Action", cleanup_optimizer); ?></option>
																	<option value="1"><?php _e("Empty", cleanup_optimizer); ?></option>
																</select>
																<input type="button" id="ux_btn_action" onclick="bulk_delete();" name="ux_btn_action" class="button-primary apply_btn_align"  value="<?php _e("Apply", cleanup_optimizer); ?>" />
															</div>
															<table class="widefat" style="background-color:#fff !important">
																<thead>
																	<tr>
																		<th style="width:10%;"><input type="checkbox" id="ux_chk_select_all" name="ux_chk_clean" style="margin:0px"/></th>
																		<th scope="col"><?php _e("Type of Data",cleanup_optimizer); ?></th>
																		<th scope="col"><?php _e("Count",cleanup_optimizer); ?></th>
																		<th scope="col"><?php _e("Action",cleanup_optimizer); ?></th>
																	</tr>
																</thead>
																<tbody id="the-list" class="all_wp_chks">
																	<tr class="alternate">
																		<td>
																			<input type="checkbox" id="ux_chk_cleanup_1" name="ux_chk_cleanup[]" style="margin:0px" value="1" />
																		</td>
																		<td class="column-name">
																			<span class="hovertip underline" data-original-title ='<?php _e("Auto Draft are the Page / Post saved as draft automatically in WordPress Database.",cleanup_optimizer)?>'><?php _e("Auto Draft", cleanup_optimizer); ?></span>
																		</td>
																		<td class="column-name">
																			<?php echo wp_clean_up_optimizer_count("autodraft"); ?>
																		</td>
																		<td class="column-name">
																			<input type="button" onclick="cleanup_function(1);" class="<?php echo wp_clean_up_optimizer_count("autodraft") > 0  ? "button-primary" : "button"; ?>" <?php echo wp_clean_up_optimizer_count("autodraft") == 0 ? "disabled" : "" ?> value="<?php _e("Empty",cleanup_optimizer); ?>" />
																		</td>
																	</tr>
																	<tr>
																		<td>
																			<input type="checkbox" id="ux_chk_cleanup_2" name="ux_chk_cleanup[]" style="margin:0px"  value="2" />
																		</td>
																		<td class="column-name">
																			<span class="hovertip underline" data-original-title ='<?php _e("Transient Feed in WordPress are use Database entries to cache a certain entries.",cleanup_optimizer) ;?>'><?php _e("Dashboard Transient Feed", cleanup_optimizer); ?></span>
																		</td>
																		<td class="column-name">
																			<?php echo wp_clean_up_optimizer_count("feed"); ?>
																		</td>
																		<td class="column-name">
																			<input type="button" onclick="cleanup_function(2);" class="<?php echo wp_clean_up_optimizer_count("feed") > 0 ? "button-primary" : "button"; ?>" <?php echo wp_clean_up_optimizer_count("feed") == 0 ? "disabled" : "" ?> value="<?php _e("Empty",cleanup_optimizer); ?>" />
																		</td>
																	</tr>
																	<tr class="alternate">
																		<td>
																			<input type="checkbox" id="ux_chk_cleanup_3" name="ux_chk_cleanup[]" style="margin:0px"  value="3" />
																		</td>
																		<td class="column-name">
																			<span class="hovertip underline" data-original-title ='<?php _e("New Post / Page created as Draft in WordPress.",cleanup_optimizer) ;?>'><?php _e("Draft", cleanup_optimizer); ?></span>
																		</td>
																		<td class="column-name">
																			<?php echo wp_clean_up_optimizer_count("draft"); ?>
																		</td>
																		<td class="column-name">
																			<input type="button" onclick="cleanup_function(3);" class="<?php echo wp_clean_up_optimizer_count("draft") > 0 ? "button-primary" : "button"; ?>" <?php echo wp_clean_up_optimizer_count("draft") == 0 ? "disabled" : "" ?> value="<?php _e("Empty",cleanup_optimizer); ?>" />
																		</td>
																	</tr>
																	<tr>
																		<td>
																			<input type="checkbox" id="ux_chk_cleanup_5" name="ux_chk_cleanup[]" style="margin:0px"  value="5" />
																		</td>
																		<td class="column-name">
																			<span class="hovertip underline" data-original-title ='<?php _e("Orphan Comments Meta holds the miscellaneous bits of extra information of comment.",cleanup_optimizer) ;?>'><?php _e("Orphan Comments Meta", cleanup_optimizer); ?></span>
																		</td>
																		<td class="column-name">
																			<?php echo wp_clean_up_optimizer_count("commentmeta"); ?>
																		</td>
																		<td class="column-name">
																			<input type="button" onclick="cleanup_function(5);" class="<?php echo wp_clean_up_optimizer_count("commentmeta") > 0 ? "button-primary" : "button"; ?>" <?php echo wp_clean_up_optimizer_count("commentmeta") == 0 ? "disabled" : "" ?> value="<?php _e("Empty",cleanup_optimizer); ?>" />
																		</td>
																	</tr>
																	<tr class="alternate">
																		<td>
																			<input type="checkbox" id="ux_chk_cleanup_6" name="ux_chk_cleanup[]" style="margin:0px" value="6" />
																		</td>
																		<td class="column-name">
																			<span class="hovertip underline" data-original-title ='<?php _e("Orphan Posts Meta holds the junk or obsolete data.",cleanup_optimizer) ;?>'><?php _e("Orphan Posts Meta", cleanup_optimizer); ?></span>
																		</td>
																		<td class="column-name">
																			<?php echo wp_clean_up_optimizer_count("postmeta"); ?>
																		</td>
																		<td class="column-name">
																			<input type="button" onclick="cleanup_function(6);" class="<?php echo wp_clean_up_optimizer_count("postmeta") > 0 ? "button-primary" : "button"; ?>"  <?php echo wp_clean_up_optimizer_count("postmeta") == 0 ? "disabled" : "" ?> value="<?php _e("Empty",cleanup_optimizer); ?>" />
																		</td>
																	</tr>
																	<tr>
																		<td>
																			<input type="checkbox" id="ux_chk_cleanup_7" name="ux_chk_cleanup[]" style="margin:0px"  value="7" />
																		</td>
																		<td class="column-name">
																			<span class="hovertip underline" data-original-title ='<?php _e("Orphan Relationships holds the junk or obsolete Category and Tag.",cleanup_optimizer) ;?>'><?php _e("Orphan Relationships", cleanup_optimizer); ?></span>
																		</td>
																		<td class="column-name">
																			<?php echo wp_clean_up_optimizer_count("relationships"); ?>
																		</td>
																		<td class="column-name">
																			<input type="button" onclick="cleanup_function(7);" class="<?php echo wp_clean_up_optimizer_count("relationships") > 0 ? "button-primary" : "button"; ?>" <?php echo wp_clean_up_optimizer_count("relationships") == 0 ? "disabled" : "" ?> value="<?php _e("Empty",cleanup_optimizer); ?>" />
																		</td>
																	</tr>
																	<tr class="alternate">
																		<td>
																			<input type="checkbox" id="ux_chk_cleanup_8" name="ux_chk_cleanup[]" style="margin:0px"  value="8" />
																		</td>
																		<td class="column-name">
																			<span class="hovertip underline" data-original-title ='<?php _e("The WordPress revisions system stores a record of each saved draft or published update.Revisions are stored in the posts table.",cleanup_optimizer) ;?>'><?php _e("Revision", cleanup_optimizer); ?></span>
																		</td>
																		<td class="column-name">
																			<?php echo wp_clean_up_optimizer_count("revision"); ?>
																		</td>
																		<td class="column-name">
																			<input type="button" onclick="cleanup_function(8);" class="<?php echo wp_clean_up_optimizer_count("revision") > 0 ? "button-primary" : "button"; ?>" <?php echo wp_clean_up_optimizer_count("revision") == 0 ? "disabled" : "" ?> value="<?php _e("Empty",cleanup_optimizer); ?>" />
																		</td>
																	</tr>
																	<tr>
																		<td>
																			<input type="checkbox" id="ux_chk_cleanup_9" name="ux_chk_cleanup[]" style="margin:0px"  value="9" />
																		</td>
																		<td class="column-name">
																			<span class="hovertip underline" data-original-title ='<?php _e("A Pingback is a type of comment that's created when you link to another blog post where pingbacks are enabled.",cleanup_optimizer) ;?>'><?php _e("Remove Pingbacks", cleanup_optimizer); ?></span>
																		</td>
																		<td class="column-name">
																			<?php echo wp_clean_up_optimizer_count("remove_pingbacks"); ?>
																		</td>
																		<td class="column-name">
																			<input type="button" onclick="cleanup_function(9);" class="<?php echo wp_clean_up_optimizer_count("remove_pingbacks") > 0 ? "button-primary" : "button"; ?>" <?php echo wp_clean_up_optimizer_count("remove_pingbacks") == 0 ? "disabled" : "" ?> value="<?php _e("Empty",cleanup_optimizer); ?>" />
																		</td>
																	</tr>
																	<tr class="alternate">
																		<td>
																			<input type="checkbox" id="ux_chk_cleanup_10" name="ux_chk_cleanup[]" style="margin:0px"  value="10" />
																		</td>
																		<td class="column-name">
																			<span class="hovertip underline" data-original-title ='<?php _e("Transient Options are like a basic cache system used by wordpress. Clearing these options before a backup will help to save space in your backup files.",cleanup_optimizer) ;?>'><?php _e("Remove Transient Options", cleanup_optimizer); ?></span>
																		</td>
																		<td class="column-name">
																			<?php echo wp_clean_up_optimizer_count("remove_transient_options"); ?>
																		</td>
																		<td class="column-name">
																			<input type="button" onclick="cleanup_function(10);" class="<?php echo wp_clean_up_optimizer_count("remove_transient_options") > 0 ? "button-primary" : "button"; ?>" <?php echo wp_clean_up_optimizer_count("remove_transient_options") == 0 ? "disabled" : "" ?> value="<?php _e("Empty",cleanup_optimizer); ?>" />
																		</td>
																	</tr>
																	<tr>
																		<td>
																			<input type="checkbox" id="ux_chk_cleanup_11" name="ux_chk_cleanup[]" style="margin:0px"  value="11" />
																		</td>
																		<td class="column-name">
																			<span class="hovertip underline" data-original-title ='<?php _e("Trackbacks are a way to notify legacy blog systems that you have linked to them. If you link to a WordPress blog they will be notified automatically using pingbacks, no other action necessary.",cleanup_optimizer) ;?>'><?php _e("Remove Trackbacks", cleanup_optimizer); ?></span> 
																		</td>
																		<td class="column-name">
																			<?php echo wp_clean_up_optimizer_count("remove_trackbacks"); ?>
																		</td>
																		<td class="column-name">
																			<input type="button" onclick="cleanup_function(11);" class="<?php echo wp_clean_up_optimizer_count("remove_trackbacks") > 0 ? "button-primary" : "button"; ?>" <?php echo wp_clean_up_optimizer_count("remove_trackbacks") == 0 ? "disabled" : "" ?> value="<?php _e("Empty",cleanup_optimizer); ?>" />
																		</td>
																	</tr>
																	<tr class="alternate">
																		<td>
																			<input type="checkbox" id="ux_chk_cleanup_12" name="ux_chk_cleanup[]" style="margin:0px"  value="12" />
																		</td>
																		<td class="column-name">
																			<span class="hovertip underline" data-original-title ='<?php _e("Spam Comments are the unwanted comments in the WordPress database.",cleanup_optimizer) ;?>'><?php _e("Spam Comments", cleanup_optimizer); ?></span>
																		</td>
																		<td class="column-name">
																			<?php echo wp_clean_up_optimizer_count("spam"); ?>
																		</td>
																		<td class="column-name">
																			<input type="button" onclick="cleanup_function(12);" class="<?php echo wp_clean_up_optimizer_count("spam") > 0 ? "button-primary" : "button"; ?>" <?php echo wp_clean_up_optimizer_count("spam") == 0 ? "disabled" : "" ?> value="<?php _e("Empty",cleanup_optimizer); ?>" />
																		</td>
																	</tr>
																	<tr>
																		<td>
																			<input type="checkbox" id="ux_chk_cleanup_13" name="ux_chk_cleanup[]" style="margin:0px"  value="13" />
																		</td>
																		<td class="column-name">
																			<span class="hovertip underline" data-original-title ='<?php _e("Trash Comments are the comments which are stored in the WordPress Trash.",cleanup_optimizer) ;?>'><?php _e("Trash Comments", cleanup_optimizer); ?></span>
																		</td>
																		<td class="column-name">
																			<?php echo wp_clean_up_optimizer_count("trash"); ?>
																		</td>
																		<td class="column-name">
																			<input type="button" onclick="cleanup_function(13);" class="<?php echo wp_clean_up_optimizer_count("trash") > 0 ? "button-primary" : "button"; ?>" <?php echo wp_clean_up_optimizer_count("trash") == 0 ? "disabled" : "" ?> value="<?php _e("Empty",cleanup_optimizer); ?>" />
																		</td>
																	</tr>
																</tbody>
															</table>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div id="wp_data_optimizer_scheduler" class="framework_tab">
											<div class="widget-layout">
												<div class="widget-layout-title">
													<h4><?php _e("Data Optimizer Scheduler", cleanup_optimizer); ?></h4>
												</div>
												<div class="widget-layout-body">
													<div class="fluid-layout">
														<div class="layout-span12 responsive">
															<div class="layout-span6 responsive">
																<div class="widget-layout">
																	<div class="widget-layout-title">
																		<h4><?php _e("Choose Type of Data",cleanup_optimizer); ?></h4>
																	</div>
																	<table class="widefat" style=" border-left:none;border-right:none;background-color:#fff !important">
																		<thead>
																			<tr>
																				<th style="width:10%;"><input type="checkbox" id="ux_chk_select_all_wp_scheduler" name="ux_chk_clean_wp_scheduler" style="margin:0px" disabled="disabled" /></th>
																				<th scope="col"><?php _e("Type of Data",cleanup_optimizer); ?></th>
																			</tr>
																		</thead>
																		<tbody id="the-list" class="ux_scheduler_chks">
																			<tr class="alternate">
																				<td>
																					<input type="checkbox" id="ux_chk_cleanup_1" name="ux_chk_clean_wp_scheduler[]" style="margin:0px" value="1" disabled="disabled"/>
																				</td>
																				<td class="column-name">
																					<span class="hovertip underline" data-original-title ='<?php _e("Auto Draft are the Page / Post saved as draft automatically in WordPress Database.",cleanup_optimizer)?>'><?php _e("Auto Draft", cleanup_optimizer); ?></span>
																				</td>
																			</tr>
																			<tr>
																				<td>
																					<input type="checkbox" id="ux_chk_cleanup_2" name="ux_chk_clean_wp_scheduler[]" style="margin:0px"  value="2"  disabled="disabled"/>
																				</td>
																				<td class="column-name">
																					<span class="hovertip underline" data-original-title ='<?php _e("Transient Feed in WordPress are use Database entries to cache a certain entries.",cleanup_optimizer) ;?>'><?php _e("Dashboard Transient Feed", cleanup_optimizer); ?></span>
																				</td>
																			</tr>
																			<tr class="alternate">
																				<td>
																					<input type="checkbox" id="ux_chk_cleanup_3" name="ux_chk_clean_wp_scheduler[]" style="margin:0px"  value="3"  disabled="disabled"/>
																				</td>
																				<td class="column-name">
																					<span class="hovertip underline" data-original-title ='<?php _e("New Post / Page created as Draft in WordPress.",cleanup_optimizer) ;?>'><?php _e("Draft", cleanup_optimizer); ?></span>
																				</td>
																			</tr>
																			<tr>
																				<td>
																					<input type="checkbox" id="ux_chk_cleanup_5" name="ux_chk_clean_wp_scheduler[]" style="margin:0px"  value="5"  disabled="disabled"/>
																				</td>
																				<td class="column-name">
																					<span class="hovertip underline" data-original-title ='<?php _e("Orphan Comments Meta holds the miscellaneous bits of extra information of comment.",cleanup_optimizer) ;?>'><?php _e("Orphan Comments Meta", cleanup_optimizer); ?></span>
																				</td>
																			</tr>
																			<tr class="alternate">
																				<td>
																					<input type="checkbox" id="ux_chk_cleanup_6" name="ux_chk_clean_wp_scheduler[]" style="margin:0px" value="6"  disabled="disabled"/>
																				</td>
																				<td class="column-name">
																					<span class="hovertip underline" data-original-title ='<?php _e("Orphan Posts Meta holds the junk or obsolete data.",cleanup_optimizer) ;?>'><?php _e("Orphan Posts Meta", cleanup_optimizer); ?></span>
																				</td>
																			</tr>
																			<tr>
																				<td>
																					<input type="checkbox" id="ux_chk_cleanup_7" name="ux_chk_clean_wp_scheduler[]" style="margin:0px"  value="7"  disabled="disabled"/>
																				</td>
																				<td class="column-name">
																					<span class="hovertip underline" data-original-title ='<?php _e("Orphan Relationships holds the junk or obsolete Category and Tag.",cleanup_optimizer) ;?>'><?php _e("Orphan Relationships", cleanup_optimizer); ?></span>
																				</td>
																			</tr>
																			<tr class="alternate">
																				<td>
																					<input type="checkbox" id="ux_chk_cleanup_8" name="ux_chk_clean_wp_scheduler[]" style="margin:0px"  value="8"  disabled="disabled"/>
																				</td>
																				<td class="column-name">
																					<span class="hovertip underline" data-original-title ='<?php _e("The WordPress revisions system stores a record of each saved draft or published update.Revisions are stored in the posts table.",cleanup_optimizer) ;?>'><?php _e("Revision", cleanup_optimizer); ?></span>
																				</td>
																			</tr>
																			<tr>
																				<td>
																					<input type="checkbox" id="ux_chk_cleanup_9" name="ux_chk_clean_wp_scheduler[]" style="margin:0px"  value="9"  disabled="disabled"/>
																				</td>
																				<td class="column-name">
																					<span class="hovertip underline" data-original-title ='<?php _e("A Pingback is a type of comment that's created when you link to another blog post where pingbacks are enabled.",cleanup_optimizer) ;?>'><?php _e("Remove Pingbacks", cleanup_optimizer); ?></span>
																				</td>
																			</tr>
																			<tr class="alternate">
																				<td>
																					<input type="checkbox" id="ux_chk_cleanup_10" name="ux_chk_clean_wp_scheduler[]" style="margin:0px"  value="10"  disabled="disabled"/>
																				</td>
																				<td class="column-name">
																					<span class="hovertip underline" data-original-title ='<?php _e("Transient Options are like a basic cache system used by wordpress. Clearing these options before a backup will help to save space in your backup files.",cleanup_optimizer) ;?>'><?php _e("Remove Transient Options", cleanup_optimizer); ?></span>
																				</td>
																			</tr>
																			<tr>
																				<td>
																					<input type="checkbox" id="ux_chk_cleanup_11" name="ux_chk_clean_wp_scheduler[]" style="margin:0px"  value="11"  disabled="disabled"/>
																				</td>
																				<td class="column-name">
																					<span class="hovertip underline" data-original-title ='<?php _e("Trackbacks are a way to notify legacy blog systems that you've linked to them. If you link to a WordPress blog they'll be notified automatically using pingbacks, no other action necessary.",cleanup_optimizer) ;?>'><?php _e("Remove Trackbacks", cleanup_optimizer); ?></span>
																				</td>
																			</tr>
																			<tr class="alternate">
																				<td>
																					<input type="checkbox" id="ux_chk_cleanup_12" name="ux_chk_clean_wp_scheduler[]" style="margin:0px"  value="12"  disabled="disabled"/>
																				</td>
																				<td class="column-name">
																					<span class="hovertip underline" data-original-title ='<?php _e("Spam Comments are the unwanted comments in the WordPress database.",cleanup_optimizer) ;?>'><?php _e("Spam Comments", cleanup_optimizer); ?></span>
																				</td>
																			</tr>
																			<tr>
																				<td>
																					<input type="checkbox" id="ux_chk_cleanup_13" name="ux_chk_clean_wp_scheduler[]" style="margin:0px"  value="13"  disabled="disabled"/>
																				</td>
																				<td class="column-name">
																					<span class="hovertip underline" data-original-title ='<?php _e("Trash Comments are the comments which are stored in the WordPress Trash.",cleanup_optimizer) ;?>'><?php _e("Trash Comments", cleanup_optimizer); ?></span>
																				</td>
																			</tr>
																		</tbody>
																	</table>
																</div>
															</div>
															<div class="layout-span6 responsive">
																<div class="widget-layout">
																	<div class="widget-layout-title">
																		<h4><?php _e("Configure Scheduler", cleanup_optimizer); ?><i class="standard_edition"><?php _e(" (Available in Premium Editions)",cleanup_optimizer)?></i></h4>
																	</div>
																	<div class="widget-layout-body">
																		<div class="layout-control-group">
																			<label class="layout-control-label">
																				<?php _e("Action ", cleanup_optimizer); ?> : 
																				<img src="<?php echo plugins_url("/assets/images/questionmark_icon.png" , dirname(__FILE__))?>" class="tooltip_img hovertip" data-original-title='<?php _e("Allows you to select the type of Action.",cleanup_optimizer) ;?>'/>
																			</label>
																			<div class="layout-controls">
																				<select id="ux_ddl_bulk_action_wp_scheduler" name="ux_ddl_bulk_action_wp_scheduler" style="vertical-align:top" class="layout-span12">
																					<option value="0"><?php _e("Bulk Action", cleanup_optimizer); ?></option>
																					<option value="1" disabled="disabled"><?php _e("Empty", cleanup_optimizer); ?></option>
																				</select>
																			</div>
																		</div>
																		<div class="layout-control-group">
																			<label class="layout-control-label">
																				<?php _e("Duration ", cleanup_optimizer); ?> : 
																				<img src="<?php echo plugins_url("/assets/images/questionmark_icon.png" , dirname(__FILE__))?>" class="tooltip_img hovertip" data-original-title='<?php _e("Configuration the scheduler Daily, Weekly, Biweekly, Monthly, Quarterly, Half-Yearly, Annually from the DropDown.",cleanup_optimizer) ;?>'/>
																			</label>
																			<div class="layout-controls">
																				<select id="type_of_scheduler" name="type_of_scheduler" class="layout-span12">
																					<option value="1day"><?php _e("Daily", cleanup_optimizer); ?></option>
																					<option value="weekly" disabled="disabled"><?php _e("Weekly", cleanup_optimizer); ?></option>
																					<option value="14days" disabled="disabled"><?php _e("Biweekly", cleanup_optimizer); ?></option>
																					<option value="30days" disabled="disabled"><?php _e("Monthly", cleanup_optimizer); ?></option>
																					<option value="90days" disabled="disabled"><?php _e("Quarterly", cleanup_optimizer); ?></option>
																					<option value="183days" disabled="disabled"><?php _e("Half-Yearly", cleanup_optimizer); ?></option>
																					<option value="365days" disabled="disabled"><?php _e("Annually", cleanup_optimizer); ?></option>
																				</select><br><br>
																				<input type="button" id="ux_btn_submit" name="ux_btn_submit" value="<?php _e("Save Scheduler", cleanup_optimizer); ?>" onclick="set_scheduler_wp_optimizer();" class="button-primary apply_btn_align"/>
																			</div>	
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div id="db_optimizer" class="framework_tab">
											<div class="widget-layout">
												<div class="widget-layout-title">
													<h4><?php _e("DB Optimizer", cleanup_optimizer); ?></h4>
												</div>
												<div class="custom_message custom_icon_red" style="display: block;">
													<span>
														<strong  style="line-height: 2em;"><?php _e("Note : Table Names highlighted with red color and an asterisk (*) are wordpress inbuilt Tables. <br/> They are disabled by us  so not to perform delete and clean action because they can destroy your Wordpress unintentionally.", cleanup_optimizer); ?></strong>
													</span>
												</div>
												<div class="widget-layout-body ">
													<div class="fluid-layout">
														<div class="layout-span12 responsive">
															<div class="layout-control-group">
																<select id="ux_ddl_bulk_action_db_optimzier" name="ux_ddl_bulk_action_db_optimzier" style="vertical-align:top;">
																	<option value="0"><?php _e("Bulk Action", cleanup_optimizer); ?></option>
																	<option value="1"><?php _e("Empty", cleanup_optimizer); ?></option>
																	<option value="2" disabled="disabled" class="standard_edition"><?php _e("Delete", cleanup_optimizer); ?><?php _e(" (Available in Premium Editions)", cleanup_optimizer); ?></option>
																	<option value="3" disabled="disabled" class="standard_edition"><?php _e("Optimize", cleanup_optimizer); ?><?php _e(" (Available in Premium Editions)", cleanup_optimizer); ?></option>
																	<option value="4" disabled="disabled" class="standard_edition"><?php _e("Repair", cleanup_optimizer); ?><?php _e(" (Available in Premium Editions)", cleanup_optimizer); ?></option>
																</select>
																<input type="button" id="ux_btn_action" onclick="bulk_action();" name="ux_btn_action" class="button-primary apply_btn_align" value="<?php _e("Apply", cleanup_optimizer); ?>" />
															</div>
															<table class="widefat" style="background-color:#fff !important;" id="ux_preview_table">
																<thead>
																	<tr>
																		<th><input type="checkbox" id="ux_chk_select_all_db_optimizer" name="ux_chk_cleanup_db" style="margin:0px;"/></th>	
																		<th scope="col" style="width:44%"><?php _e("Table",cleanup_optimizer); ?></th>	
																		<th scope="col" style="width:7%"><?php _e("Rows",cleanup_optimizer); ?></th>
																		<th scope="col" style="width:10%"><?php _e("Type",cleanup_optimizer); ?></th>
																		<th scope="col" style="width:12%"><?php _e("Size",cleanup_optimizer); ?></th>
																		<th scope="col" style="width:17%" colspan="2"><?php _e("Action",cleanup_optimizer); ?></th>
																	</tr>
																</thead>
																<tbody id="the-list" class="all_chks_dp_optimzier">
																	<?php
																		$increment=1;
																		foreach($result as $row)
																		{
																			$table_size = $row->Data_length + $row->Index_length;
																			$table_size = $table_size / 1024;
																			$table_size = sprintf("%0.3f",$table_size);

																			$every_size = $row->Data_length + $row->Index_length;
																			$every_size = $every_size / 1024;
																			$total_size += $every_size;
																			$count_rows=$wpdb->get_var
																			(
																				"SELECT COUNT(*) FROM $row->Name"
																			);
																			$tables=$row->Name;
																			if(is_multisite())
																			{
																				if((strstr($tables,$wpdb->terms) || strstr($tables,$wpdb->term_taxonomy) || strstr($tables,$wpdb->term_relationships) || strstr($tables,$wpdb->commentmeta) || strstr($tables,$wpdb->comments) 
																					|| strstr($tables,$wpdb->links) || strstr($tables,$wpdb->options)|| strstr($tables,$wpdb->postmeta) || strstr($tables, $wpdb->posts) || strstr($tables,$wpdb->users) || strstr($tables,$wpdb->usermeta)
																					|| strstr($tables,$wpdb->prefix."cleanup_optimizer_wp_scheduler") || strstr($tables,$wpdb->prefix . "cleanup_optimizer_db_scheduler") || strstr($tables,$wpdb->prefix . "cleanup_optimizer_login_log") 
																					|| strstr($tables,$wpdb->prefix . "cleanup_optimizer_plugin_settings") || strstr($tables,$wpdb->prefix . "cleanup_optimizer_licensing") || strstr($tables,$wpdb->prefix . "cleanup_optimizer_block_single_ip")
																					|| strstr($tables,$wpdb->prefix . "cleanup_optimizer_block_range_ip") || strstr($tables,$wpdb->signups) || strstr($tables,$wpdb->sitemeta) || strstr($tables,$wpdb->site) || strstr($tables,$wpdb->registration_log)
																					|| strstr($tables,$wpdb->blogs) || strstr($tables,$wpdb->blog_versions)) == true)
																				{
																					?>
																					<tr <?php echo $alternate ;?>>
																						<td>
																							<input type="checkbox" id="ux_chk_cleanup_db" name="ux_chk_cleanup_arr_db[]" value="<?php echo $row->Name ;?>">
																						</td>
																						<td>
																							<a href="#ux_preview_table" style="font-size:13px;color:#FF0000 !important;" onclick="table_preview('<?php echo $row->Name ;?>');" ><?php echo $row->Name."*" ;?></a>
																						</td>
																						<td>
																							<?php echo $count_rows ;?>
																						</td>
																						<td>
																							 <?php echo $row->Engine ;?>
																						</td>
																						<td>
																							<?php echo sprintf("%0.1f",$table_size) ." KB" ;?>
																						</td>
																						<td>
																						</td>
																						<td>
																						</td>
																					</tr>
																					<?php
																				}
																				else
																				{
																					if($count_rows == 0)
																					{
																						$show_rows="disabled";
																						$btn_class="button";
																					}
																					else
																					{
																						$show_rows="";
																						$btn_class="button-primary";
																					}
																					?>
																					<tr <?php echo $alternate ;?>>
																						<td>
																							<input type="checkbox" id="ux_chk_cleanup_db" name="ux_chk_cleanup_arr_db[]" value="<?php echo $row->Name ;?>" >
																						</td>
																						<td>
																							<a href="#ux_preview_table" style="font-size:13px;" onclick="table_preview('<?php echo $row->Name ;?>');" ><?php echo $row->Name?></a>
																						</td>
																						<td>
																							<?php 
																								echo $count_rows;
																							?>
																						</td>
																						<td>
																							<?php 
																								echo $row->Engine;
																							?>
																						</td>
																						<td>
																							<?php 
																								echo sprintf("%0.1f",$table_size) ." KB";
																							?>
																						</td>
																						<td>
																							<select id="ux_ddl_action_table_<?php echo $increment ;?>" name="ux_ddl_action_table_<?php echo $increment ;?>" style="width:100px;">
																								<option value="1"><?php _e("Empty",cleanup_optimizer) ;?></option>
																							</select>
																						</td>
																						<td>
																							<input type="button" value="<?php echo _e('Apply',cleanup_optimizer) ;?>" class="button-primary" style="font-size:11px;" onclick="table_action('<?php echo $row->Name."','".$increment?>');" />
																						</td>
																					</tr>
																					<?php
																				}
																			}
																			else
																			{
																				if((strstr($tables,$wpdb->terms) || strstr($tables,$wpdb->term_taxonomy) || strstr($tables,$wpdb->term_relationships) || strstr($tables,$wpdb->commentmeta) || strstr($tables,$wpdb->comments)
																					|| strstr($tables,$wpdb->links) || strstr($tables,$wpdb->options)|| strstr($tables,$wpdb->postmeta) || strstr($tables, $wpdb->posts) || strstr($tables,$wpdb->users) || strstr($tables,$wpdb->usermeta)
																					|| strstr($tables,$wpdb->prefix."cleanup_optimizer_wp_scheduler") || strstr($tables,$wpdb->prefix . "cleanup_optimizer_db_scheduler") || strstr($tables,$wpdb->prefix . "cleanup_optimizer_login_log")
																					|| strstr($tables,$wpdb->prefix . "cleanup_optimizer_plugin_settings") || strstr($tables,$wpdb->prefix . "cleanup_optimizer_licensing") || strstr($tables,$wpdb->prefix . "cleanup_optimizer_block_single_ip")
																					|| strstr($tables,$wpdb->prefix . "cleanup_optimizer_block_range_ip")) == true)
																				{
																					?>
																					<tr <?php echo $alternate ;?>>
																						<td>
																							<input type="checkbox" id="ux_chk_cleanup_db" name="ux_chk_cleanup_arr_db[]" value="<?php echo $row->Name ;?>">
																						</td>
																						<td>
																							<a href="#ux_preview_table" style="font-size:13px;color:#FF0000 !important;" onclick="table_preview('<?php echo $row->Name ;?>');" ><?php echo $row->Name."*" ;?></a>
																						</td>
																						<td>
																							<?php echo $count_rows ;?>
																						</td>
																						<td>
																							 <?php echo $row->Engine ;?>
																						</td>
																						<td>
																							<?php echo sprintf("%0.1f",$table_size) ." KB" ;?>
																						</td>
																						<td>
																						</td>
																						<td>
																						</td>
																					</tr>
																					<?php
																				}
																				else
																				{
																					if($count_rows == 0)
																					{
																						$show_rows="disabled";
																						$btn_class="button";
																					}
																					else
																					{
																						$show_rows="";
																						$btn_class="button-primary";
																					}
																					?>
																					<tr <?php echo $alternate ;?>>
																						<td>
																							<input type="checkbox" id="ux_chk_cleanup_db" name="ux_chk_cleanup_arr_db[]" value="<?php echo $row->Name ;?>" >
																						</td>
																						<td>
																							<a href="#ux_preview_table" style="font-size:13px;" onclick="table_preview('<?php echo $row->Name ;?>');" ><?php echo $row->Name?></a>
																						</td>
																						<td>
																							<?php 
																								echo $count_rows;
																							?>
																						</td>
																						<td>
																							<?php 
																								echo $row->Engine;
																							?>
																						</td>
																						<td>
																							<?php 
																								echo sprintf("%0.1f",$table_size) ." KB";
																							?>
																						</td>
																						<td>
																							<select id="ux_ddl_action_table_<?php echo $increment ;?>" name="ux_ddl_action_table_<?php echo $increment ;?>" style="width:100px;">
																								<option value="1"><?php _e("Empty",cleanup_optimizer) ;?></option>
																							</select>
																						</td>
																						<td>
																							<input type="button" value="<?php echo _e('Apply',cleanup_optimizer) ;?>" class="button-primary" style="font-size:11px;" onclick="table_action('<?php echo $row->Name."','".$increment?>');" />
																						</td>
																					</tr>
																					<?php
																				}
																			}
																			$increment++;
																			$alternate = (empty($alternate)) ? " class='alternate'" : "";
																		}
																	?>
																</tbody>
																<tfoot>
																	<tr style="border-top: 1px solid #efefef;">
																		<td scope="col"><strong><?php _e("Total",cleanup_optimizer); ?></strong></td>
																		<td></td>
																		<td></td>
																		<td></td>
																		<td scope="col" style="font-family:Tahoma;"><strong><?php echo sprintf("%0.1f",$total_size)." KB"; ?></strong></td>
																		<td colspan="2"></td>
																	</tr>
																</tfoot>
															</table>
															<div  class="widget-layout-body" style="border-bottom: none;">
																<div class="white_content" id="setting_controls_postback">
																	<div id="post_back_div" class="postback-div">
																	</div>
																</div>
															</div>
															<div class="black_overlay"></div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div id="db_optimizer_scheduler" class="framework_tab">
											<div class="widget-layout">
												<div class="widget-layout-title">
													<h4><?php _e("DB Optimizer Scheduler", cleanup_optimizer); ?></h4>
												</div>
												<div class="custom_message custom_icon_red" style="display: block;">
													<span>
														<strong  style="line-height: 2em;"><?php _e("Note : Table Names highlighted with red color and an asterisk (*) are wordpress inbuilt Tables. <br/> They are disabled by us  so not to perform delete and clean action because they can destroy your Wordpress unintentionally.", cleanup_optimizer); ?></strong>
													</span>
												</div>
												<div class="widget-layout-body">
													<div class="fluid-layout">
														<div class="layout-span12 responsive">
															<div class="widget-layout">
																<div class="widget-layout-title">
																	<h4><?php _e("Configure Scheduler", cleanup_optimizer); ?><i class="standard_edition"><?php _e(" (Available in Premium Editions)",cleanup_optimizer)?></i></h4>
																</div>
																<div class="widget-layout-body">
																	<div class="layout-control-group layout-span5">
																		<label class="layout-control-label">
																			<?php _e("Action ", cleanup_optimizer); ?> : 
																			<img src="<?php echo plugins_url("/assets/images/questionmark_icon.png" , dirname(__FILE__))?>" class="tooltip_img hovertip" data-original-title='<?php _e("Allows you to select the type of Action.",cleanup_optimizer) ;?>'/>
																		</label>
																		<div class="layout-controls">
																			<select id="ux_ddl_bulk_action_scheduler" name="ux_ddl_bulk_action_scheduler" class="bulk-action-width layout-span8">
																				<option value="1"><?php _e("Empty", cleanup_optimizer); ?></option>
																				<option value="2" disabled="disabled"><?php _e("Delete", cleanup_optimizer); ?></option>
																				<option value="3" disabled="disabled"><?php _e("Optimize", cleanup_optimizer); ?></option>
																				<option value="4" disabled="disabled"><?php _e("Repair", cleanup_optimizer); ?></option>
																			</select>
																		</div>
																	</div>
																	<div class="layout-control-group">
																		<label class="layout-control-label">
																			<?php _e("Duration ", cleanup_optimizer); ?> : 
																			<img src="<?php echo plugins_url("/assets/images/questionmark_icon.png" , dirname(__FILE__))?>" class="tooltip_img hovertip" data-original-title='<?php _e("Configuration the scheduler Daily, Weekly, Biweekly, Monthly, Quarterly, Half-Yearly, Annually from the DropDown.",cleanup_optimizer) ;?>'/>
																		</label>
																		<div class="layout-controls">
																			<select id="schedule_type" name="schedule_type" class="layout-span2">
																				<option value="1day"><?php _e("Daily", cleanup_optimizer); ?></option>
																				<option value="weekly" disabled="disabled"><?php _e("Weekly", cleanup_optimizer); ?></option>
																				<option value="14days" disabled="disabled"><?php _e("Biweekly", cleanup_optimizer); ?></option>
																				<option value="30days" disabled="disabled"><?php _e("Monthly", cleanup_optimizer); ?></option>
																				<option value="90days" disabled="disabled"><?php _e("Quarterly", cleanup_optimizer); ?></option>
																				<option value="183days" disabled="disabled"><?php _e("Half-Yearly", cleanup_optimizer); ?></option>
																				<option value="365days" disabled="disabled"><?php _e("Annually", cleanup_optimizer); ?></option>
																			</select>
																			<input type="button" id="ux_btn_submit" name="ux_btn_submit" value="<?php _e("Save Scheduler",cleanup_optimizer); ?>" onclick="set_scheduler_db_optimizer();" class="button-primary apply_btn_align" style="margin-left:10%;" />
																		</div>
																	</div>
																</div>
															</div>
															<div class="widget-layout">
																<div class="widget-layout-title">
																	<h4><?php _e("Choose Tables",cleanup_optimizer); ?></h4>
																</div>
																<table class="widefat" style="background-color:#fff !important;border: none;">
																	<thead>
																		<tr>
																			<th><input type="checkbox" id="ux_chk_select_all_db_scheduler" name="ux_chk_cleanup_db_scheduler" style="margin:1px 0px 0px 1px" disabled="disabled" /></th>	
																			<th scope="col" style="width:58%;"><?php _e("Table",cleanup_optimizer); ?></th>	
																			<th scope="col" style="width:10%"><?php _e("Type",cleanup_optimizer); ?></th>
																			<th scope="col" style="width:12%"><?php _e("Overhead",cleanup_optimizer); ?></th>
																			<th scope="col" style="width:8%;"><?php _e("Rows",cleanup_optimizer); ?></th>
																			<th scope="col" style="width:12%;"><?php _e("Size",cleanup_optimizer); ?></th>
																		</tr>
																	</thead>
																	<tbody id="the-list" class="all_chk_db_scheduler">
																		<?php
																			$alternate="class='alternate'";
																			foreach($result as $row)
																			{
																				$table_size = $row->Data_length + $row->Index_length;
																				$table_size = $table_size / 1024;
																				$table_size = sprintf("%0.3f",$table_size);
																				$increment=0;
																	
																				$every_size = $row->Data_length + $row->Index_length;
																				$every_size = $every_size / 1024;
																				$total_size_table += $every_size;
																				$count_rows=$wpdb->get_var
																				(
																					"SELECT COUNT(*) FROM $row->Name"
																				);
																				$tables=$row->Name;
																				if(is_multisite())
																				{
																					if((strstr($tables,$wpdb->terms) || strstr($tables,$wpdb->term_taxonomy) || strstr($tables,$wpdb->term_relationships) || strstr($tables,$wpdb->commentmeta) || strstr($tables,$wpdb->comments) 
																						|| strstr($tables,$wpdb->links) || strstr($tables,$wpdb->options)|| strstr($tables,$wpdb->postmeta) || strstr($tables, $wpdb->posts) || strstr($tables,$wpdb->users) || strstr($tables,$wpdb->usermeta)
																						|| strstr($tables,$wpdb->prefix."cleanup_optimizer_wp_scheduler") || strstr($tables,$wpdb->prefix . "cleanup_optimizer_db_scheduler") || strstr($tables,$wpdb->prefix . "cleanup_optimizer_login_log") 
																						|| strstr($tables,$wpdb->prefix . "cleanup_optimizer_plugin_settings") || strstr($tables,$wpdb->prefix . "cleanup_optimizer_licensing") || strstr($tables,$wpdb->prefix . "cleanup_optimizer_block_single_ip")
																						|| strstr($tables,$wpdb->prefix . "cleanup_optimizer_block_range_ip") || strstr($tables,$wpdb->signups) || strstr($tables,$wpdb->sitemeta) || strstr($tables,$wpdb->site) || strstr($tables,$wpdb->registration_log)
																						|| strstr($tables,$wpdb->blogs) || strstr($tables,$wpdb->blog_versions)) == true)
																					{
																						?>
																						<tr <?php echo $alternate ;?>>
																							<td>
																								<input type="checkbox" id="ux_chk_cleanup_db_scheduler" name="ux_chk_cleanup_arr_db_scheduler[]" value="<?php echo $row->Name ;?>" disabled="disabled" />
																							</td>
																							<td style="font-size:13px;color:#FF0000 !important;"">
																								<?php 
																									echo $row->Name ."*";
																								?>
																							</td>
																							<td>
																								<?php 
																									echo $row->Engine;
																								?>
																							</td>
																							<td>
																								<?php
																									echo cpo_format_size($row->Data_free);
																								?>
																							</td>
																							<td>
																								<?php 
																									echo $count_rows;
																								?>
																							</td>
																							<td>
																								<?php 
																									echo sprintf("%0.1f",$table_size) ." KB";
																								?>
																							</td>
																						</tr>
																						<?php
																					}
																					else
																					{
																						?>
																						<tr <?php echo $alternate ;?>>
																							<td>
																								<input type="checkbox" id="ux_chk_cleanup_db_scheduler" name="ux_chk_cleanup_arr_db_scheduler[]" value="<?php echo $row->Name ;?>" disabled="disabled">
																							</td>
																							<td>
																								<?php 
																									echo  $row->Name;
																								?>
																							</td>
																							<td>
																								<?php 
																									echo $row->Engine;
																								?>
																							</td>
																							<td>
																								<?php 
																									echo cpo_format_size($row->Data_free);
																								?>
																							</td>
																							<td>
																								<?php 
																								echo $count_rows;
																								?>
																							</td>
																							<td>
																								<?php 
																									echo sprintf("%0.1f",$table_size) ." KB";
																								?>
																							</td>
																						</tr>
																						<?php
																					}
																				}
																				else
																				{
																					if((strstr($tables,$wpdb->terms) || strstr($tables,$wpdb->term_taxonomy) || strstr($tables,$wpdb->term_relationships) || strstr($tables,$wpdb->commentmeta) || strstr($tables,$wpdb->comments)
																						|| strstr($tables,$wpdb->links) || strstr($tables,$wpdb->options)|| strstr($tables,$wpdb->postmeta) || strstr($tables, $wpdb->posts) || strstr($tables,$wpdb->users) || strstr($tables,$wpdb->usermeta)
																						|| strstr($tables,$wpdb->prefix."cleanup_optimizer_wp_scheduler") || strstr($tables,$wpdb->prefix . "cleanup_optimizer_db_scheduler") || strstr($tables,$wpdb->prefix . "cleanup_optimizer_login_log")
																						|| strstr($tables,$wpdb->prefix . "cleanup_optimizer_plugin_settings") || strstr($tables,$wpdb->prefix . "cleanup_optimizer_licensing") || strstr($tables,$wpdb->prefix . "cleanup_optimizer_block_single_ip")
																						|| strstr($tables,$wpdb->prefix . "cleanup_optimizer_block_range_ip")) == true)
																					{
																						?>
																						<tr <?php echo $alternate ;?>>
																							<td>
																								<input type="checkbox" id="ux_chk_cleanup_db_scheduler" name="ux_chk_cleanup_arr_db_scheduler[]" value="<?php echo $row->Name ;?>" disabled="disabled" />
																							</td>
																							<td style="font-size:13px;color:#FF0000 !important;"">
																								<?php 
																									echo $row->Name ."*";
																								?>
																							</td>
																							<td>
																								<?php 
																									echo $row->Engine;
																								?>
																							</td>
																							<td>
																								<?php
																									echo cpo_format_size($row->Data_free);
																								?>
																							</td>
																							<td>
																								<?php 
																									echo $count_rows;
																								?>
																							</td>
																							<td>
																								<?php 
																									echo sprintf("%0.1f",$table_size) ." KB";
																								?>
																							</td>
																						</tr>
																						<?php
																					}
																					else
																					{
																						?>
																						<tr <?php echo $alternate ;?>>
																							<td>
																								<input type="checkbox" id="ux_chk_cleanup_db_scheduler" name="ux_chk_cleanup_arr_db_scheduler[]" value="<?php echo $row->Name ;?>" disabled="disabled">
																							</td>
																							<td>
																								<?php 
																									echo  $row->Name;
																								?>
																							</td>
																							<td>
																								<?php 
																									echo $row->Engine;
																								?>
																							</td>
																							<td>
																								<?php 
																									echo cpo_format_size($row->Data_free);
																								?>
																							</td>
																							<td>
																								<?php 
																								echo $count_rows;
																								?>
																							</td>
																							<td>
																								<?php 
																									echo sprintf("%0.1f",$table_size) ." KB";
																								?>
																							</td>
																						</tr>
																						<?php
																					}
																				}
																				$alternate = (empty($alternate)) ? " class='alternate'" : "";
																			}
																		?>
																	</tbody>
																	<tfoot>
																		<tr style="border:1px solid #e0dede;">
																			<td scope="col"><strong><?php _e("Total",cleanup_optimizer); ?></strong></td>
																			<td></td>
																			<td></td>
																			<td></td>
																			<td></td>
																			<td scope="col" style="font-family:Tahoma;"><strong><?php echo sprintf("%0.1f",$total_size_table)." KB"; ?></strong></td>
																		</tr>
																	</tfoot>
																</table>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div id="ux_db_optimize_scheduler" style="display:none;" class="scheduler_layout">
												<div class="widget-layout">
													<div class="widget-layout-title">
														<h4><?php _e("Manage Database Optimizer Schedules",cleanup_optimizer); ?></h4>
													</div>
													<div class="widget-layout-body" style="padding-bottom:20px;">
														<table class="widefat text-align-center" id="data-table-db-optimizer" style="margin-top:5px;background-color:#fff !important">
															<thead>
																<tr >
																	<th style="display:none;"></th>
																	<th scope="col" style="width:500px;"><?php _e("Tables",cleanup_optimizer); ?></th>
																	<th scope="col" style="width:500px;"><?php _e("Overview",cleanup_optimizer); ?></th>
																	<th scope="col"></th>
																</tr>
															</thead>
															<body>
																<?php 
																for($flag1=0; $flag1<count($db_scheduler_data); $flag1++)
																{	
																	$data_show="";
																?>
																<tr <?php echo $alternate_class?>>
																	<td style="display:none;"><?php echo $db_scheduler_data[$flag1]->scheduler_id;?></td>
																	<td>
																		<?php 
																			$display_data="";
																			$temp=$db_scheduler_data[$flag1]->db_optimizer;
																			$separator=explode(",",$temp);
																			for($flag2=0; $flag2 < count($separator); $flag2++)
																			{
																				$display_data.=$separator[$flag2]."<br>";
																			}
																			echo trim($display_data,"<br>");
																		?>
																	</td>
																	<td>
																		<div class="layout-control-group">
																			<label>
																				<b><?php _e("Action Type", cleanup_optimizer) ?></b> :
																				<?php 
																					switch($db_scheduler_data[$flag1]->scheduler_action)
																					{
																						case 1:
																							echo _e("Empty",cleanup_optimizer);
																						break;
																						case 2:
																							echo _e("Delete",cleanup_optimizer);
																						break;
																						case 3:
																							echo _e("Optimize",cleanup_optimizer);
																						break;
																						case 4:
																							echo _e("Repair",cleanup_optimizer);
																						break;
																					}
																				?>
																			</label>
																		</div>
																		<div class="layout-control-group">
																			<label>
																				<b><?php _e("Start Date", cleanup_optimizer) ?></b> :
																				<?php 
																					echo date('d M, Y', strtotime($db_scheduler_data[$flag1]->start_date));
																				?>
																			</label>
																		</div>
																		<div class="layout-control-group">
																			<label>
																				<b><?php _e("Next Execution", cleanup_optimizer) ?></b> :
																				<?php 
																					$unix_time=wp_next_scheduled($db_scheduler_data[$flag1]->cron_name);
																					echo human_time_diff($unix_time);
																				?>
																			</label>
																		</div>
																		<div class="layout-control-group">
																			<label>
																				<b><?php _e("Schedule Type", cleanup_optimizer) ?></b> :
																				<?php 
																					$type=$db_scheduler_data[$flag1]->schedule_type;
																					switch($type)
																					{
																						case "1day":
																							echo "Daily";
																							break;
																								
																						case "weekly":
																							echo ""._e("Weekly",cleanup_optimizer)."";
																							break;
																							
																						case "14days":
																							echo ""._e("Biweekly",cleanup_optimizer)."";
																							break;
																								
																						case "30days":
																							echo ""._e("Monthly",cleanup_optimizer)."";
																							break;
																								
																						case "90days":
																							echo ""._e("Quarterly",cleanup_optimizer)."";
																							break;
																							
																						case "183days":
																							echo ""._e("Half-Yearly",cleanup_optimizer)."";
																							break;
																							
																						case "365days":
																							echo ""._e("Annually",cleanup_optimizer)."";
																							break;
																					}
																				?>
																			</label>
																		</div>
																		
																	</td>
																	<td>
																		<input type="button" id="ux_delete_cron" name="ux_delete_cron" value="<?php _e("Delete",cleanup_optimizer); ?>" onclick="clear_db_scheduler('<?php echo $db_scheduler_data[$flag1]->cron_name ?>');" class="button-primary custom-btn-align"/>
																	</td>
																</tr>
																<?php
																	$alternate_class = (empty($alternate_class)) ? "class='alternate'" : "";
																}
																?>
															</body>
														</table>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>

	<script type="text/javascript">
	jQuery(".hovertip").tooltip({placement: "right"});

	jQuery('.framework_tabs .framework_tab-links a').on('click', function(e)  {
		var currentAttrValue = jQuery(this).attr('href');
		jQuery('.framework_tabs ' + currentAttrValue).show().siblings().hide();
		jQuery(this).parent('li').addClass('active').siblings().removeClass('active');
		e.preventDefault();
	});
	
	///////////////////////////////////////////////////////////////////////////////////////////////
	///////////                      Wp Data Optimizer                            //////////
	//////////////////////////////////////////////////////////////////////////////////////////
	
	function bulk_delete()
	{
		jQuery("#top-error").remove();
		wp_schedule_array = [];
		var searchIDs = jQuery(".all_wp_chks input:checkbox:checked").map(function()
		{
			wp_schedule_array.push(jQuery(this).val());
		}).get();
		
		if(jQuery("#ux_ddl_bulk_action").val() == 1 && wp_schedule_array != "" )
		{
			var confirm_selection =  confirm("<?php _e( "Are you sure, you want to Clean?", cleanup_optimizer ); ?>");
			if(confirm_selection == true)
			{
				var overlay_opacity = jQuery("<div class=\"opacity_overlay\"></div>");
				jQuery("body").append(overlay_opacity);
				var overlay = jQuery("<div class=\"loader_opacity\"><div class=\"processing_overlay\"></div></div>");
				jQuery("body").append(overlay);
				
				jQuery.post(ajaxurl, jQuery("#ux_frm_cleanup_optimizer").serialize()+"&param=bulk_delete_action&action=cleanup_library&_wpnonce=<?php echo $action_bulk_clear ;?>", function(data)
				{
					jQuery("body,html").animate({
						scrollTop: jQuery("body,html").position().top}, "slow");
					setTimeout(function()
					{
						jQuery(".loader_opacity").remove();
						jQuery(".opacity_overlay").remove();
						jQuery(".message").css("display","block");
						jQuery("#success_message").html("<?php _e('Successfully Cleaned!',cleanup_optimizer)?>");
						window.location.reload();
					}, 2000);
				});
			}
		}
		else
		{
			var error_message = jQuery("<div id=\"top-error\" class=\"top-right top-error\" style=\"display: block;\"><div class=\"top-error-notification\"></div><div class=\"top-error-notification ui-corner-all growl-top-error\" ><div onclick=\"error_message_close();\" id=\"close-top-error\" class=\"top-error-close\">x</div><div class=\"top-error-header\"><?php _e("Error!",  cleanup_optimizer); ?></div><div class=\"top-error-top-error\"><?php _e( "Please choose Action and Type of Data to Proceed!", cleanup_optimizer ); ?></div></div></div>");
			jQuery("body").append(error_message);
		}
	}

	function cleanup_function(typeClean)
	{
		jQuery("#top-error").remove();
		var confirm_delete =  confirm("<?php _e( "Are you sure, you want to Clean?",cleanup_optimizer ); ?>");
		if(confirm_delete == true)
		{
			var overlay_opacity = jQuery("<div class=\"opacity_overlay\"></div>");
			jQuery("body").append(overlay_opacity);
			var overlay = jQuery("<div class=\"loader_opacity\"><div class=\"processing_overlay\"></div></div>");
		 	jQuery("body").append(overlay);
		 	
			jQuery.post(ajaxurl, "typeClean="+typeClean+"&param=wp_cleanup&action=cleanup_library&_wpnonce=<?php echo $wp_clear_data ;?>", function(data)
			{
				jQuery("body,html").animate({
					scrollTop: jQuery("body,html").position().top}, "slow");
				setTimeout(function ()
				{
					jQuery(".loader_opacity").remove();
					jQuery(".opacity_overlay").remove();
					jQuery(".message").css("display","block");
					jQuery("#success_message").html("<?php _e('Successfully Cleaned!',cleanup_optimizer)?>");
					window.location.reload();
				}, 2000);
			});
		}
	}
	
	jQuery("#ux_chk_select_all").click(function()
	{
		if(jQuery("#ux_chk_select_all").prop("checked") == true)
		{
			jQuery("input:checkbox[name=\"ux_chk_cleanup[]\"]").attr("checked","checked");
		}
		else
		{
			jQuery("input:checkbox[name=\"ux_chk_cleanup[]\"]").removeAttr("checked","checked");
		}
	});

	jQuery("input:checkbox[name=\"ux_chk_cleanup[]\"]").click(function()
	{
		if(jQuery("#"+this.id).prop("checked") == false)
		{
			jQuery("#ux_chk_select_all").removeAttr("checked","checked");
		}
	});
	
	//////////////////////////////////////////////////////////////////////////////////////////
	///////////                      Wp Data Optimizer Scheduler                          ///////
	//////////////////////////////////////////////////////////////////////////////////////////
	
	oTable = jQuery("#data-table-wp-optimizer").dataTable
	({
		"bJQueryUI": false,
		"bAutoWidth": true,
		"sPaginationType": "full_numbers",
		"sDom": "<\"datatable-header\"fl>t<\"datatable-footer\"ip>",
		"oLanguage": {
		"sLengthMenu": "<span><?php _e("Show entries",cleanup_optimizer)?>:</span> _MENU_"
		},
		"aaSorting": [
			[ 0 , "asc" ]
		],
		"aoColumnDefs": [
			{ "bSortable": false, "aTargets": [-1] }
		]
	});
	
	function set_scheduler_wp_optimizer()
	{
		jQuery("#top-error").remove();
		var error_message = jQuery("<div id=\"top-error\" class=\"top-right top-error\" style=\"display: block;\"><div class=\"top-error-notification\"></div><div class=\"top-error-notification ui-corner-all growl-top-error\" ><div onclick=\"error_message_close();\" id=\"close-top-error\" class=\"top-error-close\">x</div><div class=\"top-error-header\"><?php _e("Error!",  cleanup_optimizer); ?></div><div class=\"top-error-top-error\"><?php _e( "This Feature is Available in Premium Editions!", cleanup_optimizer ); ?></div></div></div>");
		jQuery("body").append(error_message);
	}
	//////////////////////////////////////////////////////////////////////////////////////////
	///////////                           DB Optimizer                             ///////
	//////////////////////////////////////////////////////////////////////////////////////////
	
	function table_preview(tbl_name)
	{
		jQuery("#top-error").remove();
		var error_message = jQuery("<div id=\"top-error\" class=\"top-right top-error\" style=\"display: block;\"><div class=\"top-error-notification\"></div><div class=\"top-error-notification ui-corner-all growl-top-error\" ><div onclick=\"error_message_close();\" id=\"close-top-error\" class=\"top-error-close\">x</div><div class=\"top-error-header\"><?php _e("Error!",  cleanup_optimizer); ?></div><div class=\"top-error-top-error\"><?php _e( "This Feature is Available in Premium Editions!", cleanup_optimizer ); ?></div></div></div>");
		jQuery("body").append(error_message);
	}

	function table_action(table_name,ddl_value)
	{
		jQuery("#top-error").remove();
		var perform_action = jQuery("#ux_ddl_action_table_"+ddl_value).val();
		var typeMessage="";
		switch(parseInt(perform_action))
		{
			case 1:
				typeMessage="<?php _e("Cleaned Successfully!",cleanup_optimizer); ?>";
				break;
			case 2:
		}
		var confirm_delete =  confirm("<?php _e( "Are you sure, you want to Perform this Action?", cleanup_optimizer ); ?>");
		if(confirm_delete == true)
		{
			var overlay_opacity = jQuery("<div class=\"opacity_overlay\"></div>");
			jQuery("body").append(overlay_opacity);
			var overlay = jQuery("<div class=\"loader_opacity\"><div class=\"processing_overlay\"></div></div>");
		 	jQuery("body").append(overlay);
			jQuery.post(ajaxurl, "perform_action="+perform_action+"&table_name="+table_name+"&param=table_action&action=cleanup_library&_wpnonce=<?php echo $db_clear_data ;?>", function(data)
			{
				jQuery("body,html").animate({
					scrollTop: jQuery("body,html").position().top}, "slow");
				setTimeout(function ()
				{
					jQuery(".loader_opacity").remove();
					jQuery(".opacity_overlay").remove();
					jQuery(".message").css("display","block");
					jQuery("#success_message").html(typeMessage);
					window.location.reload();
				}, 2000);
			});
		}
	}

	function bulk_action()
	{
		jQuery("#top-error").remove();
		var bulk_type=jQuery("#ux_ddl_bulk_action_db_optimzier").val();
		var typeMessage="";
		switch(parseInt(bulk_type))
		{
			case 1:
				typeMessage="<?php _e("Cleaned Successfully!",cleanup_optimizer); ?>";
				break;
		}
		chk_tables_array = [];
		var searchIDs = jQuery(".all_chks_dp_optimzier input:checkbox:checked").map(function()
		{
			chk_tables_array.push(jQuery(this).val());
		}).get();
		
		if(chk_tables_array != "" && jQuery("#ux_ddl_bulk_action_db_optimzier").val() != 0)
		{
			var confirm_delete =  confirm("<?php _e( "Are you sure, you want to Perform this Action?", cleanup_optimizer ); ?>");
			if(confirm_delete == true)
			{
				var overlay_opacity = jQuery("<div class=\"opacity_overlay\"></div>");
				jQuery("body").append(overlay_opacity);
				var overlay = jQuery("<div class=\"loader_opacity\"><div class=\"processing_overlay\"></div></div>");
				jQuery("body").append(overlay);
				
				jQuery.post(ajaxurl, jQuery("#ux_frm_cleanup_optimizer").serialize()+"&param=bulk_selected_action&action=cleanup_library&_wpnonce=<?php echo $bulk_table_action ;?>", function(data)
				{
					jQuery("body,html").animate({
						scrollTop: jQuery("body,html").position().top}, "slow");
					setTimeout(function ()
					{
						jQuery(".loader_opacity").remove();
						jQuery(".opacity_overlay").remove();
						jQuery(".message").css("display","block");
						jQuery("#success_message").html(typeMessage);
						window.location.reload();
					}, 2000);
				});
			}
		}
		else
		{
			var error_message = jQuery("<div id=\"top-error\" class=\"top-right top-error\" style=\"display: block;\"><div class=\"top-error-notification\"></div><div class=\"top-error-notification ui-corner-all growl-top-error\" ><div onclick=\"error_message_close();\" id=\"close-top-error\" class=\"top-error-close\">x</div><div class=\"top-error-header\"><?php _e("Error!",  cleanup_optimizer); ?></div><div class=\"top-error-top-error\"><?php _e( "Please choose Action or Table to proceed!.", cleanup_optimizer ); ?></div></div></div>");
			jQuery("body").append(error_message);
		}
	}
	
	jQuery("#ux_chk_select_all_db_optimizer").click(function()
	{
		if(jQuery("#ux_chk_select_all_db_optimizer").prop("checked") == true)
		{
			jQuery("input:checkbox[name=\"ux_chk_cleanup_arr_db[]\"]").attr("checked","checked");
		}
		else
		{
			jQuery("input:checkbox[name=\"ux_chk_cleanup_arr_db[]\"]").removeAttr("checked","checked");
		}
	});
	
	jQuery("input:checkbox[name=\"ux_chk_cleanup_arr_db[]\"]").click(function()
	{
		if(jQuery("#"+this.id).prop("checked") == false)
		{
			jQuery("#ux_chk_select_all_db_optimizer").removeAttr("checked","checked");
		}
	});

	//////////////////////////////////////////////////////////////////////////////////////////
	///////////                          DB Optimizer Scheduler                    //////////////
	//////////////////////////////////////////////////////////////////////////////////////////
	
	oTable = jQuery("#data-table-db-optimizer").dataTable
	({
		"bJQueryUI": false,
		"bAutoWidth": true,
		"sPaginationType": "full_numbers",
		"sDom": "<\"datatable-header\"fl>t<\"datatable-footer\"ip>",
		"oLanguage": {
		"sLengthMenu": "<span><?php _e("Show entries",cleanup_optimizer)?>:</span> _MENU_"
		},
		"aaSorting": [
			[ 0, "asc" ]
		],
		"aoColumnDefs": [
			{ "bSortable": false, "aTargets": [-1] }
		]
	});
	
	function set_scheduler_db_optimizer()
	{ 
		jQuery("#top-error").remove();
		var error_message = jQuery("<div id=\"top-error\" class=\"top-right top-error\" style=\"display: block;\"><div class=\"top-error-notification\"></div><div class=\"top-error-notification ui-corner-all growl-top-error\" ><div onclick=\"error_message_close();\" id=\"close-top-error\" class=\"top-error-close\">x</div><div class=\"top-error-header\"><?php _e("Error!",  cleanup_optimizer); ?></div><div class=\"top-error-top-error\"><?php _e( "This Feature is Available in Premium Editions!", cleanup_optimizer ); ?></div></div></div>");
		jQuery("body").append(error_message);
	}
	
	function error_message_close()
	{
		jQuery("#top-error").remove();
	}
	</script>
<?php 
}
?>	