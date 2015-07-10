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
	$blocked_ip = $wpdb->get_results
	(
		"SELECT * FROM " . wp_cleanup_optimizer_block_single_ip()
	);
	$blocked_ip_range = $wpdb->get_results
	(
		"SELECT * FROM " . wp_cleanup_optimizer_block_range_ip()
	);
	?>
	<div id="message" class="top-right message" style="display: none;">
		<div class="message-notification"></div>
		<div class="message-notification ui-corner-all growl-success" >
			<div onclick="cpo_message_close();" id="close-message" class="message-close">x</div>
			<div class="message-header"><?php _e("Success!",  cleanup_optimizer); ?></div>
			<div class="message-message"><?php _e("General Settings has been updated  ",  cleanup_optimizer); ?></div>
		</div>
	</div>
	<form id="ux_frm_general_settings" name="ux_frm_general_settings" class="layout-form" style="width:1000px">
		<div class="fluid-layout">
			<div class="layout-span12 responsive">
				<div class="widget-layout">
					<div class="widget-layout-title">
						<h4><?php _e("General Settings", cleanup_optimizer); ?></h4>
					</div>
					<div class="widget-layout-body">
						<input type="button" value="<?php _e("Save Changes", cleanup_optimizer); ?>" class="button-primary" style="float:right; margin-top: 5px;" onclick="submit_form();"/>
						<div class="fluid-layout">
							<div class="layout-span12">
								<div class="separator-doubled"></div>
								<div class="framework_tabs">
									<ul class="framework_tab-links">
										<li class="active"><a href="#message_settings"><?php _e("Message Settings", cleanup_optimizer); ?></a></li>
										<li><a href="#security_settings"><?php _e("Security Settings", cleanup_optimizer); ?></a></li>
										<li><a href="#plugin_settings"><?php _e("Plugin Settings", cleanup_optimizer); ?></a></li>
									</ul>
									<div class="framework_tab-content">
										<div id="message_settings" class="framework_tab active">
											<div class="widget-layout">
												<div class="widget-layout-title">
													<h4><?php _e("Message Settings", cleanup_optimizer); ?><i class="standard_edition"><?php _e(" (Available in Premium Editions)",cleanup_optimizer)?></i></h4>
												</div>
												<div class="widget-layout-body">
													<div class="layout-control-group">
														<label class="layout-control-label">
															<?php _e("IP Block Message", cleanup_optimizer); ?> :
															<img src="<?php echo plugins_url("/assets/images/questionmark_icon.png" , dirname(__FILE__))?>" class="tooltip_img hovertip" data-original-title='<?php _e("It shows the Error Message for the users whose IP is blocked from the Security Settings or Login Logs if the users seems to be unauthorized.",cleanup_optimizer) ;?>'/>
														</label>
														<div class="layout-controls custom-layout-controls-cleanup ">
												 			<textarea  class="layout-span11" id="ux_txt_blockip_err" name="ux_txt_blockip_err" placeholder="<?php _e( "Enter the error message here when the IP is Blocked.",cleanup_optimizer); ?>" disabled="disabled"><?php _e( $ip_block_msg,cleanup_optimizer); ?></textarea>
														</div>
													</div>
													<div class="layout-control-group">
														<label class="layout-control-label">
															<?php _e("Max Login Attempts", cleanup_optimizer); ?> :
															<img src="<?php echo plugins_url("/assets/images/questionmark_icon.png" , dirname(__FILE__))?>" class="tooltip_img hovertip" data-original-title='<?php _e("It allows you to set dynamic Error Message for the users to show the number of login attempts left incase username or password is left empty or filled invalid.",cleanup_optimizer) ;?>'/>
														</label>
														<div class="layout-controls custom-layout-controls-cleanup">
															<textarea class="layout-span11" id="ux_txt_login_attempts_err" name="ux_txt_login_attempts_err" placeholder="<?php _e( "Enter the error message here for Maxium login Attempts.",cleanup_optimizer); ?>" disabled="disabled"><?php _e( $max_login_msg,cleanup_optimizer); ?></textarea>
														</div>
													</div>
													<div class="layout-control-group">
														<label class="layout-control-label" style="width:200px;">
															<?php _e("Max Login Exceeded Error", cleanup_optimizer); ?> :
															<img src="<?php echo plugins_url("/assets/images/questionmark_icon.png" , dirname(__FILE__))?>" class="tooltip_img hovertip" data-original-title='<?php _e("User can set dynamic Error Message for the users whose IP gets blocked after the Maximum Login Attempts Exceeds.",cleanup_optimizer) ;?>'/>
														</label>
														<div class="layout-controls custom-layout-controls-cleanup">
															<textarea  class="layout-span11" id="ux_txt_login_exceeded_err" name="ux_txt_login_exceeded_err" rows="4" placeholder="<?php _e( "Enter the error message here for Maxium login Exceeded.",cleanup_optimizer); ?>" disabled="disabled"><?php _e( $max_login_exceeded_msg,cleanup_optimizer); ?></textarea>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div id="security_settings" class="framework_tab">
											<div class="widget-layout" style="margin-bottom:0px;">
												<div class="widget-layout-title">
													<h4><?php _e("Security Settings", cleanup_optimizer); ?><i class="standard_edition"><?php _e(" (Available in Premium Editions)",cleanup_optimizer)?></i></h4>
												</div>
												<div class="widget-layout-body">
													<div class="layout-control-group">
														<label class="layout-control-label" >
															<?php _e("Auto IP Block", cleanup_optimizer); ?> : 
															<img src="<?php echo plugins_url("/assets/images/questionmark_icon.png" , dirname(__FILE__))?>" class="tooltip_img hovertip" data-original-title='<?php _e("Auto IP Block allows to block the IP Address when the user exceeds the Maximum Login Attempts.",cleanup_optimizer) ;?>'/>
														</label>
														<div class="layout-controls custom-layout-controls-cleanup rdl_cleanup">
															<input type="radio" id="ux_rdl_enable_auto_ip" name= "ux_rdl_enable_auto_ip" checked="checked" value="1" disabled="disabled" > <?php _e( "Enable", cleanup_optimizer ); ?>
															<input type="radio" id="ux_rdkl_disable_auto_ip" style="margin-left:10px;" name="ux_rdl_enable_auto_ip"  value="0" disabled="disabled"> <?php _e( "Disable", cleanup_optimizer ); ?>
														</div>
													</div>
													<div class="layout-control-group" id="ux_div_show_attempts" style="display: block;">
														<div class="layout-control-group">
															<label class="layout-control-label">
																<?php _e("Max Login Attempts", cleanup_optimizer); ?> : 
																<img src="<?php echo plugins_url("/assets/images/questionmark_icon.png" , dirname(__FILE__))?>" class="tooltip_img hovertip" data-original-title='<?php _e("User can set Maximum Login Attempts for their Website.",cleanup_optimizer) ;?>'/>
															</label>
															<div class="layout-controls custom-layout-controls-cleanup">
																<input type="text" class="layout-span11" id="ux_txt_login_attempts" name="ux_txt_login_attempts" value="<?php echo $max_login_attempts;?>" placeholder="Enter the number of login attempts for the user." disabled="disabled"/>
															</div>
														</div>
													</div>
														<div class="layout-control-group">
														<label class="layout-control-label">
															<?php _e("Block IP Address", cleanup_optimizer); ?> : 
															<img src="<?php echo plugins_url("/assets/images/questionmark_icon.png" , dirname(__FILE__))?>" class="tooltip_img hovertip" data-original-title='<?php _e("It allows you to block IP Address that are considered undesirable or hostile.",cleanup_optimizer) ;?>'/>
														</label>
														<div class="layout-controls custom-layout-controls-cleanup ">
															<input type="text" class="layout-span8" id="ux_txt_block_ip" name="ux_txt_block_ip" maxlength="15" placeholder="Enter the IP Address here which you want to block."  disabled="disabled"/>
															<input type="button" value="<?php _e("Add Block IP Address", cleanup_optimizer); ?>" class="button-primary" onclick="add_block_ip();" />
														</div>
													</div>
													<div class="layout-control-group">
														<label class="layout-control-label">
															<?php _e("Blocked IP Addresses", cleanup_optimizer); ?> :
															<img src="<?php echo plugins_url("/assets/images/questionmark_icon.png" , dirname(__FILE__))?>" class="tooltip_img hovertip" data-original-title='<?php _e("It show the list of all IP Addresses that are blocked by the User.",cleanup_optimizer) ;?>'/>
														</label>
														<div class="layout-controls custom-layout-controls-cleanup ">
														 	<select multiple="multiple" name="ux_ddl_blocked_ip" id="ux_ddl_blocked_ip" class="layout-span11" disabled="disabled">
																<?php 
																for($flag5=0; $flag5 < count($blocked_ip); $flag5++)
																{
																	?>
																	<option value="<?php echo $blocked_ip[$flag5]->block_ip_address;?>"><?php echo $blocked_ip[$flag5]->block_ip_address;?></option>
																<?php
																}
																?>
															</select>
															<input type="button" value="<?php _e("Delete Block IP Addresses", cleanup_optimizer); ?>" class="button-primary" onclick="delete_block_ip();" style=" margin-top: 12px;"/>
														</div>
													</div>
													<div class="layout-control-group">
														<label class="layout-control-label">
															<?php _e("Block Start IP Range", cleanup_optimizer); ?> : 
															<img src="<?php echo plugins_url("/assets/images/questionmark_icon.png" , dirname(__FILE__))?>" class="tooltip_img hovertip" data-original-title='<?php _e("It is the Starting range of the IP Address to be blocked.",cleanup_optimizer) ;?>'/>
														</label>
														<div class="layout-controls custom-layout-controls-cleanup ">
															<input type="text" class="layout-span11" id="ux_txt_start_ip" name="ux_txt_start_ip" maxlength="15" placeholder="Enter the Start IP Range to be blocked." disabled="disabled"/>
														</div>
													</div>
													<div class="layout-control-group">
														<label class="layout-control-label">
															<?php _e("Block End IP Range", cleanup_optimizer); ?> : 
															<img src="<?php echo plugins_url("/assets/images/questionmark_icon.png" , dirname(__FILE__))?>" class="tooltip_img hovertip" data-original-title='<?php _e("It is the Ending range of the IP Address to be blocked.",cleanup_optimizer) ;?>'/>
														</label>
														<div class="layout-controls custom-layout-controls-cleanup ">
															<input type="text" class="layout-span11" id="ux_txt_end_ip" name="ux_txt_end_ip" maxlength="15" placeholder="Enter the End IP Range to be blocked." disabled="disabled"/>
															<input type="button" value="<?php _e("Add Block IP Range", cleanup_optimizer); ?>" class="button-primary" style=" margin-top: 12px;" onclick="add_block_ip_range();" />
														</div>
													</div>
													<div class="layout-control-group">
														<label class="layout-control-label">
															<?php _e("Blocked IP Range", cleanup_optimizer); ?> : 
															<img src="<?php echo plugins_url("/assets/images/questionmark_icon.png" , dirname(__FILE__))?>" class="tooltip_img hovertip" data-original-title='<?php _e("Blocked IP Range show the list of all the IP Addresses range that are blocked by the user.",cleanup_optimizer) ;?>'/>
														</label>
														<div class="layout-controls custom-layout-controls-cleanup ">
															<select multiple="multiple" name="ux_ddl_blocked_ip_range" id="ux_ddl_blocked_ip_range" class="layout-span11" disabled="disabled">
																<?php 
																for($flag=0; $flag < count($blocked_ip_range); $flag++)
																{
																	?>
																	<option value="<?php echo $blocked_ip_range[$flag]->block_start_range;?> - <?php echo $blocked_ip_range[$flag]->block_end_range;?>"><?php echo $blocked_ip_range[$flag]->block_start_range;?> - <?php echo $blocked_ip_range[$flag]->block_end_range;?></option>
																<?php
																}
																?>
																
															</select>
															<input type="button" value="<?php _e("Delete Block IP Range", cleanup_optimizer); ?>" onclick="delete_block_ip_range();" class="button-primary" style=" margin-top: 12px;"/>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div id="plugin_settings" class="framework_tab">
											<div class="widget-layout">
												<div class="widget-layout-title">
													<h4><?php _e("Plugin Settings", cleanup_optimizer); ?><i class="standard_edition"><?php _e(" (Available in Premium Editions)",cleanup_optimizer)?></i></h4>
												</div>
												<div class="widget-layout-body">
													<div class="fluid-layout">
														<div class="layout-span12 responsive">
															<div class="layout-control-group">
																<label class="layout-control-label custom-label-width">
																	<?php _e("Show Clean Up Plugin Menu", cleanup_optimizer); ?> : 
																	<img src="<?php echo plugins_url("/assets/images/questionmark_icon.png" , dirname(__FILE__))?>" class="tooltip_img hovertip" data-original-title='<?php _e("It allows you to control the capabilities of WP Clean Up Optimizer among different roles of WordPress users.",cleanup_optimizer) ;?>'/>
																</label>
																<div class="layout-controls custom-layout-controls-cleanup rdl_cleanup">
																	<span class="chk_bottom">
																		<input type="checkbox" id="ux_chk_admin" name="ux_chk_admin" value="1" checked="checked" disabled="disabled" />
																		<label><?php _e("Administrator", cleanup_optimizer); ?></label>
																	</span>
																	<span class="chk_bottom">
																		<input type="checkbox" id="ux_chk_editor" name="ux_chk_editor" value="1" checked="checked" disabled="disabled"/>
																		<label><?php _e("Editor", cleanup_optimizer); ?></label>
																	</span>
																	<span class="chk_bottom">
																		<input type="checkbox" id="ux_chk_author" name="ux_chk_author"value="1" checked="checked"  disabled="disabled"/>
																		<label><?php _e("Author", cleanup_optimizer); ?></label>
																	</span>
																	<span class="chk_bottom">
																		<input type="checkbox"  id="ux_chk_contributor" name="ux_chk_contributor" value="1"  disabled="disabled"/>
																		<label><?php _e("Contributor", cleanup_optimizer); ?></label>
																	</span>
																	<span class="chk_bottom">
																		<input type="checkbox"  id="ux_chk_admin_subscriber" name="ux_chk_admin_subscriber" value="1" disabled="disabled"/>
																		<label><?php _e("Subscriber", cleanup_optimizer); ?></label>
																	</span>
																</div>
															</div>
															<div class="layout-control-group">
																<label class="layout-control-label custom-label-width">
																	<?php _e("Clean Up Menu Top Bar", cleanup_optimizer); ?> : 
																	<img src="<?php echo plugins_url("/assets/images/questionmark_icon.png" , dirname(__FILE__))?>" class="tooltip_img hovertip" data-original-title='<?php _e("It allows you to enable or disable WP Clean Up Optimizer for top menu bar among different roles of WordPress users.",cleanup_optimizer) ;?>'/>
																</label>
																<div class="layout-controls custom-layout-controls-cleanup rdl_cleanup">
																	<input type="radio" id="ux_rdl_enable" name= "ux_rdl_enable_menu" checked="checked"  value="1" disabled="disabled"> <?php _e( "Enable", cleanup_optimizer ); ?>
																	<input type="radio" style="margin-left:10px;" id="ux_rdl_enable" name="ux_rdl_enable_menu" value="0" disabled="disabled"> <?php _e( "Disable", cleanup_optimizer ); ?>
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
		
		//////////////////////////////////////////////////////////////////////////////////////////
		///////////                             Plugin Settings                              ///////
		////////////////////////////////////////////////////////////////////////////////////////

		function add_block_ip_range()
		{
			jQuery("#top-error").remove();
			var error_message = jQuery("<div id=\"top-error\" class=\"top-right top-error\" style=\"display: block;\"><div class=\"top-error-notification\"></div><div class=\"top-error-notification ui-corner-all growl-top-error\" ><div onclick=\"error_message_close();\" id=\"close-top-error\" class=\"top-error-close\">x</div><div class=\"top-error-header\"><?php _e("Error!",  cleanup_optimizer); ?></div><div class=\"top-error-top-error\"><?php _e( "This Feature is Available in Premium Editions!", cleanup_optimizer ); ?></div></div></div>");
			jQuery("body").append(error_message);
		}
		
		function add_block_ip()
		{
			jQuery("#top-error").remove();
			var error_message = jQuery("<div id=\"top-error\" class=\"top-right top-error\" style=\"display: block;\"><div class=\"top-error-notification\"></div><div class=\"top-error-notification ui-corner-all growl-top-error\" ><div onclick=\"error_message_close();\" id=\"close-top-error\" class=\"top-error-close\">x</div><div class=\"top-error-header\"><?php _e("Error!",  cleanup_optimizer); ?></div><div class=\"top-error-top-error\"><?php _e( "This Feature is Available in Premium Editions!", cleanup_optimizer ); ?></div></div></div>");
			jQuery("body").append(error_message);
		}
		
		function delete_block_ip()
		{
			jQuery("#top-error").remove();
			var error_message = jQuery("<div id=\"top-error\" class=\"top-right top-error\" style=\"display: block;\"><div class=\"top-error-notification\"></div><div class=\"top-error-notification ui-corner-all growl-top-error\" ><div onclick=\"error_message_close();\" id=\"close-top-error\" class=\"top-error-close\">x</div><div class=\"top-error-header\"><?php _e("Error!",  cleanup_optimizer); ?></div><div class=\"top-error-top-error\"><?php _e( "This Feature is Available in Premium Editions!", cleanup_optimizer ); ?></div></div></div>");
			jQuery("body").append(error_message);
		}
		
		function delete_block_ip_range()
		{
			jQuery("#top-error").remove();
			var error_message = jQuery("<div id=\"top-error\" class=\"top-right top-error\" style=\"display: block;\"><div class=\"top-error-notification\"></div><div class=\"top-error-notification ui-corner-all growl-top-error\" ><div onclick=\"error_message_close();\" id=\"close-top-error\" class=\"top-error-close\">x</div><div class=\"top-error-header\"><?php _e("Error!",  cleanup_optimizer); ?></div><div class=\"top-error-top-error\"><?php _e( "This Feature is Available in Premium Editions!", cleanup_optimizer ); ?></div></div></div>");
			jQuery("body").append(error_message);
		}
		
		function submit_form()
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