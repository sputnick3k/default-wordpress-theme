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
	$scheulers=_get_cron_array();
	$get_scheulers=_get_cron_array();
	$core_events=array();
	$custom_events=array();
	$core_cron_hooks = array(
		"wp_scheduled_delete",
		"upgrader_scheduled_cleanup",
		"importer_scheduled_cleanup",
		"publish_future_post",
		"akismet_schedule_cron_recheck",
		"akismet_scheduled_delete",
		"do_pings",
		"wp_version_check",
		"wp_update_plugins",
		"wp_clean_up_optimizer_scheduler",
		"wp_update_themes"
	);
	function display_cron_arguments( $key, $value, $depth = 0 )
	{
		if (is_string( $value ))
		{
			echo str_repeat( '&nbsp;', ( $depth * 2 ) ) . wp_strip_all_tags( $key ) . ' => ' . esc_html( $value ) . '<br />';
		}
		else if (is_array($value))
		{
			if (count($value) > 0)
			{
				echo str_repeat( '&nbsp;', ($depth * 2)).wp_strip_all_tags( $key ).'=> array(<br />';
				$depth++;
				foreach ( $value as $k => $v )
				{
					$this->display_cron_arguments($k,$v,$depth);
				}
				echo str_repeat( '&nbsp;', (($depth - 1)*2)).')';
			}
			else
			{
				echo 'Empty Array';
			}
		}
	}
	?>
	<form id="ux_frm_cron_job" name="ux_frm_cron_job" class="layout-form" style="width:1000px">
		<div class="fluid-layout">
			<div class="layout-span12 responsive">
				<div class="widget-layout">
					<div class="widget-layout-title">
						<h4><?php _e("Cron Jobs", cleanup_optimizer); ?></h4>
					</div>
					<div class="widget-layout-body">
						<div class="fluid-layout">
							<div class="layout-span12">
								<div class="framework_tabs">
									<ul class="framework_tab-links">
										<li class="active"><a href="#custom_cron"><?php _e("Custom", cleanup_optimizer); ?></a></li>
										<li><a href="#core_cron"><?php _e("Core", cleanup_optimizer); ?></a></li>
									</ul>
									<div class="framework_tab-content">
										<div id="custom_cron" class="framework_tab active">
											<div class="widget-layout">
												<div class="widget-layout-title">
													<h4><?php _e("Custom Events", cleanup_optimizer); ?>
														<i class="standard_edition">
															<?php _e(" (Available in Premium Editions)",cleanup_optimizer)?>
														</i>
													</h4>
												</div>
												<div class="widget-layout-body">
													<div class="fluid-layout">
														<div class="layout-span12 responsive">
															<div class="layout-control-group">
																<select id="ux_ddl_bulk_action" name="ux_ddl_bulk_action" style="vertical-align:top;">
																	<option value="0"><?php _e("Bulk Action", cleanup_optimizer); ?></option>
																	<option value="1"><?php _e("Delete", cleanup_optimizer); ?></option>
																</select>
																<input type="button" id="ux_btn_action" onclick="bulk_delete();" name="ux_btn_action" class="button-primary apply_btn_align"  value="<?php _e("Apply", cleanup_optimizer); ?>" />
															</div>
															<table class="widefat" style="background-color:#fff !important;" id="data-table-custom-cron">
																<thead>
																	<tr>
																		<th style="display:none;"></th>
																		<th><input type="checkbox" id="ux_chk_select_all_scheduler" name="ux_chk_scheduler" style="margin:1px 0px 0px 1px" disabled="disabled" /></th>
																		<th scope="col" style="width:25%;">
																			<?php _e("Name of the Hook",cleanup_optimizer); ?>
																			<img src="<?php echo plugins_url("/assets/images/questionmark_icon.png" , dirname(__FILE__))?>" class="tooltip_img hovertip" data-original-title='<?php _e("List of Custom scheduled events.",cleanup_optimizer) ;?>'/>
																		</th>	
																		<th scope="col" style="width:25%;">
																			<?php _e("Interval Hook",cleanup_optimizer); ?>
																			<img src="<?php echo plugins_url("/assets/images/questionmark_icon.png" , dirname(__FILE__))?>" class="tooltip_img hovertip" data-original-title='<?php _e("It specifies the Interval of a Scheduler. ",cleanup_optimizer) ;?>'/>
																		</th>
																		<th scope="col" style="width:25%;">
																			<?php _e("Args",cleanup_optimizer); ?>
																		</th>
																		<th scope="col" style="width:25%;">
																			<?php _e("Next Execution",cleanup_optimizer); ?>
																			<img src="<?php echo plugins_url("/assets/images/questionmark_icon.png" , dirname(__FILE__))?>" class="tooltip_img hovertip" data-original-title='<?php _e("It allows you to view the Date & Time for next execution of a Scheduler.",cleanup_optimizer) ;?>'/>
																		</th>
																	</tr>
																</thead>
																<tbody class="all_wp_chks">
																	<?php 
																		$alternate="";
																		foreach ( $scheulers as $time => $time_cron_array )
																		{
																			foreach ( $time_cron_array as $hook => $data )
																			{
																				if(!in_array($hook,$core_cron_hooks))
																				{
																					$alternate= (empty($alternate)) ? "class='alternate'" : "";
																					$times_class = time();
																					?>
																					<tr <?php echo $alternate;?>>
																						<td style="display:none;"></td>
																						<td>
																							<input type="checkbox" id="ux_chk_schedulers" name="ux_chk_scheduler_arr[]" value=<?php echo $hook ;?> disabled="disabled" />
																						</td>
																						<td>
																							<?php echo wp_strip_all_tags($hook) ?><br/>
																							<a href="#data-table-custom-cron" onclick="delete_cron_job('<?php echo $hook ;?>');"><?php _e("Delete",cleanup_optimizer) ;?></a>
																						</td>
																					<?php 
																					foreach ( $data as $hash => $info )
																					{
																						?>
																						<td>
																						<?php 
																							if(empty($info["interval"]))
																							{
																								echo "Single Event";
																							}
																							else
																							{
																								switch($info["interval"])
																								{
																									case $info["interval"] <= 60 :
																										echo "Second";
																										break;
																									case $info["interval"] <= 60*1 :
																										echo "Minute";
																										break;
																									case $info["interval"] <= 60*60 :
																										echo "Hourly";
																										break;
																									case $info["interval"] <= 60*60*24 :
																										echo "Daily";
																										break;
																									case $info["interval"] <= 60*60*24*7 :
																										echo "Weekly";
																										break;
																									case $info["interval"] <= 60*60*24*14:
																										echo "Bi-Weekly";
																										break;
																									case $info["interval"] <= 60*60*24*30:
																										echo "Monthly";
																										break;
																									case $info["interval"] <= 60*60*24*60:
																										echo "Bi-Monthly";
																										break;
																									case $info["interval"] <= 60*60*24*120:
																										echo "Quarterly";
																										break;
																									case $info["interval"] <= 60*60*24*183:
																										echo "Half-Yearly";
																										break;
																									case $info["interval"] <= 60*60*24*365:
																										echo "Annually";
																										break;
																								}
																							}
																						?>
																						</td>
																						<td>
																						<?php 
																							if ( is_array( $info["args"] ) && ! empty( $info["args"] ) )
																							{
																								foreach ( $info["args"] as $key => $value )
																								{
																									display_cron_arguments($key, $value);
																								}
																							}
																							else if ( is_string( $info["args"] ) && $info["args"] !== "" )
																							{
																								echo esc_html( $info["args"] );
																							}
																							else
																							{
																								echo "No Args";
																							}
																						?>
																						</td>
																						<td <?php echo $times_class ?>>
																							<?php 
																								echo date( "d M, Y g:i A e", $time ) . "<br />" ."<b>In About ".human_time_diff( $time ) . "</b>"
																							?>
																						</td>
																					</tr>
																					<?php 
																						
																					}
																				}
																			}
																		}
																	?>
																</tbody>
															</table>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div id="core_cron" class="framework_tab">
											<div class="widget-layout">
												<div class="widget-layout-title">
													<h4>
														<?php _e("Core Events", cleanup_optimizer); ?>
													</h4>
												</div>
												<div class="widget-layout-body">
													<div class="fluid-layout">
														<div class="layout-span12 responsive">
															<table class="widefat" style="background-color:#fff !important;" id="data-table-core-cron">
																<thead>
																	<tr>
																		<th style="display:none;"></th>
																		<th scope="col" style="width:20%;">
																			<?php _e("Name of the Hook",cleanup_optimizer); ?>
																			<img src="<?php echo plugins_url("/assets/images/questionmark_icon.png" , dirname(__FILE__))?>" class="tooltip_img hovertip" data-original-title='<?php _e("List of Core scheduled events. Which are Default schedulers created by WordPress.",cleanup_optimizer) ;?>'/>
																		</th>	
																		<th scope="col" style="width:20%;">
																			<?php _e("Interval Hook",cleanup_optimizer); ?>
																			<img src="<?php echo plugins_url("/assets/images/questionmark_icon.png" , dirname(__FILE__))?>" class="tooltip_img hovertip" data-original-title='<?php _e("It specifies the Interval of a Scheduler. ",cleanup_optimizer) ;?>'/>
																		</th>
																		<th scope="col" style="width:20%;">
																			<?php _e("Args",cleanup_optimizer); ?>
																		</th>
																		<th scope="col" style="width:20%;">
																			<?php _e("Next Execution",cleanup_optimizer); ?>
																			<img src="<?php echo plugins_url("/assets/images/questionmark_icon.png" , dirname(__FILE__))?>" class="tooltip_img hovertip" data-original-title='<?php _e("It allows you to view the Date & Time for next execution of a Scheduler.",cleanup_optimizer) ;?>'/>
																		</th>
																	</tr>
																</thead>
																<tbody>
																	<?php 
																		$alternate_tr="";
																		foreach ( $get_scheulers as $time => $time_cron_array )
																		{
																			foreach ( $time_cron_array as $hook => $data )
																			{
																				if(in_array($hook,$core_cron_hooks))
																				{
																					$times_class = time() > $time && "No" == $this->_doing_cron;
																					$alternate_tr= (empty($alternate_tr)) ? "class='alternate'" : "";
																					?>
																					<tr <?php echo $alternate_tr;?>>
																						<td style="display:none;"></td>
																						<td>
																							<?php echo wp_strip_all_tags($hook) ?>
																						</td>
																					<?php 
																					foreach ( $data as $hash => $info )
																					{
																						?>
																						<td>
																						<?php 
																						if($info["schedule"] == "")
																						{
																							echo "Single Event";
																						}
																						else
																						{
																							switch($info["interval"])
																							{
																								case $info["interval"] <= 60 :
																									echo "Second";
																									break;
																								case $info["interval"] <= 60*1 :
																									echo "Minute";
																									break;
																								case $info["interval"] <= 60*2 :
																									echo "2 Minute";
																									break;
																								case $info["interval"] <= 60*60 :
																									echo "Hourly";
																									break;
																								case $info["interval"] <= 60*60*24 :
																									echo "Daily";
																									break;
																								case $info["interval"] <= 60*60*24*7 :
																									echo "Weekly";
																									break;
																								case $info["interval"] <= 60*60*24*14:
																									echo "Bi-Weekly";
																									break;
																								case $info["interval"] <= 60*60*24*30:
																									echo "Monthly";
																									break;
																								case $info["interval"] <= 60*60*24*60:
																									echo "Bi-Monthly";
																									break;
																								case $info["interval"] <= 60*60*24*120:
																									echo "Quarterly";
																									break;
																								case $info["interval"] <= 60*60*24*183:
																									echo "Half-Yearly";
																									break;
																								case $info["interval"] <= 60*60*24*365:
																									echo "Annually";
																									break;
																							}
																						}
																						?>
																						</td>
																						<td>
																							<?php 
																								if ( is_array($info["args"]) && ! empty($info["args"]))
																								{
																									foreach ($info["args"] as $key => $value)
																									{
																										display_cron_arguments($key,$value);
																									}
																								}
																								else if (is_string($info["args"]) && $info["args"] !== "")
																								{
																									echo esc_html( $info["args"] );
																								}
																								else
																								{
																									echo "No Args";
																								}
																							?>
																						</td>
																						<td <?php echo $times_class ?>>
																							<?php 
																								echo date( "d M, Y g:i A e", $time ) . "<br />" ."<b>In About ".human_time_diff( $time ) . "</b>"
																							?>
																						</td>
																					</tr>
																					<?php 
																					}
																				}
																			}
																		}
																	?>
																</tbody>
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
		</div>
	</form>
	<script type="text/javascript">
		jQuery(".hovertip").tooltip_tip({placement: "right"});
		jQuery('.framework_tabs .framework_tab-links a').on('click', function(e)  {
			var currentAttrValue = jQuery(this).attr('href');
			jQuery('.framework_tabs ' + currentAttrValue).show().siblings().hide();
			jQuery(this).parent('li').addClass('active').siblings().removeClass('active');
			e.preventDefault();
		});
		
		oTable = jQuery("#data-table-custom-cron").dataTable
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
				{ "bSortable": false, "aTargets": [1] }
			]
		});
		
		oTable = jQuery("#data-table-core-cron").dataTable
		({
			"bJQueryUI": false,
			"bAutoWidth": true,
			"sPaginationType": "full_numbers",
			"sDom": "<\"datatable-header\"fl>t<\"datatable-footer\"ip>",
			"oLanguage": {
			"sLengthMenu": "<span><?php _e("Show entries",cleanup_optimizer)?>:</span> _MENU_"
			},
			"aaSorting": [
				[ 2, "asc" ]
			],
			"aoColumnDefs": [
				{ "bSortable": false, "aTargets": [2] }
			]
		});
		
		function delete_cron_job(scheduler)
		{
			jQuery("#top-error").remove();
			var error_message = jQuery("<div id=\"top-error\" class=\"top-right top-error\" style=\"display: block;\"><div class=\"top-error-notification\"></div><div class=\"top-error-notification ui-corner-all growl-top-error\" ><div onclick=\"error_message_close();\" id=\"close-top-error\" class=\"top-error-close\">x</div><div class=\"top-error-header\"><?php _e("Error!",  cleanup_optimizer); ?></div><div class=\"top-error-top-error\"><?php _e( "This Feature is Available in Premium Editions!", cleanup_optimizer ); ?></div></div></div>");
			jQuery("body").append(error_message);
		}
		
		function bulk_delete()
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