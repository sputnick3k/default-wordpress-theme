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
	?>
	<div class="fluid-layout" style="width: 1000px;">
		<div class="layout-span12">
			<div class="widget-layout">
				<div class="widget-layout-title">
					<h4>
						<?php _e("Premium Editions", cleanup_optimizer);?>
					</h4>
				</div>
				<div class="widget-layout-body">
					<div class="fluid-layout wpcb-page-width">
						<div class="layout-span12">
							<h1 style="text-align: center; margin-bottom: 40px">
								<?php _e("WP Clean Up Optimizer is an one time Investment. Its Worth it!", cleanup_optimizer); ?>
							</h1>
							<div id="cleanup_optimizer_pricing"
								class="p_table_responsive p_table_hide_caption_column p_table_1 p_table_1_1 css3_grid_clearfix p_table_hover_disabled">
								<div class="caption_column column_0_responsive"
									style="width: 22.5%;">
									<ul>
										<li class="css3_grid_row_0 header_row_1 align_center css3_grid_row_0_responsive radius5_topleft">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align"></span>
											</span>
										</li>
										<li class="css3_grid_row_1 header_row_2 css3_grid_row_1_responsive">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<h2 class="caption">
														<?php _e("choose",cleanup_optimizer)?><span> <?php _e("your",cleanup_optimizer)?></span> <?php _e("plan",cleanup_optimizer)?>
													</h2>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_2 row_style_4 css3_grid_row_2_responsive">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Installation per License",cleanup_optimizer)?>
														</span>
														<span class="css3_grid_tooltip">
															<span>
																<?php _e("Number of websites that can use the plugin on purchase of a License.",cleanup_optimizer) ?>
															</span>
																<?php _e("Installation per License",cleanup_optimizer)?>
														</span>
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_3 row_style_2 css3_grid_row_3_responsive">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Technical Support",cleanup_optimizer)?>
														</span>
														<span class="css3_grid_tooltip">
															<span>
																<?php _e("Technical Support by the Development Team for Installation, Bug Fixing, Plugin Compatibility Issues.",cleanup_optimizer)?>
															</span>
																<?php _e("Technical Support",cleanup_optimizer)?>
														</span>
													</span>
												</span> 
											</span>
										</li>
										<li class="css3_grid_row_4 row_style_4 css3_grid_row_4_responsive">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Plugin Updates",cleanup_optimizer)?>
														</span>
														<span class="css3_grid_tooltip">
															<span>
																<?php _e("Automatic Plugin Update Notification with New Features, Bug Fixing and much more.",cleanup_optimizer)?>
															</span>
																<?php _e("Plugin Updates",cleanup_optimizer)?>
														</span>
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_5 row_style_2 css3_grid_row_5_responsive">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Multi-Lingual",cleanup_optimizer)?>
														</span>
														<span class="css3_grid_tooltip">
															<span>
																<?php _e("Multi-Lingual Facility allows the plugin to be used in 36 languages.",cleanup_optimizer)?>
															</span>
																<?php _e("Multi-Lingual",cleanup_optimizer)?>
														</span>
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_6 row_style_4 css3_grid_row_6_responsive">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Clean Auto Draft",cleanup_optimizer)?>
														</span>
														<span class="css3_grid_tooltip">
															<span>
																<?php _e("Clean up the WordPress database by removing auto draft.",cleanup_optimizer)?>
															</span>
																<?php _e("Clean Auto Draft",cleanup_optimizer)?>
														</span>
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_7 row_style_2 css3_grid_row_7_responsive">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Clean Transient Feed",cleanup_optimizer)?>
														</span>
														<span class="css3_grid_tooltip">
															<span>
																<?php _e("Clean up the WordPress database by removing Transient Feed.",cleanup_optimizer)?>
															</span>
																<?php _e("Clean Transient Feed",cleanup_optimizer)?>
														</span>
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_8 row_style_4 css3_grid_row_8_responsive">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Clean Draft",cleanup_optimizer)?>
														</span>
														<span class="css3_grid_tooltip">
															<span>
																<?php _e("Clean up the WordPress database by removing Draft.",cleanup_optimizer)?>
															</span>
															<?php _e("Clean Draft",cleanup_optimizer)?>
														</span>
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_9 row_style_2 css3_grid_row_9_responsive">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Clean Moderated Comments",cleanup_optimizer)?>
														</span>
														<span class="css3_grid_tooltip">
															<span>
																<?php _e("Clean up the WordPress database by removing Moderated Comments.",cleanup_optimizer)?>
															</span>
															<?php _e("Clean Moderated Comments",cleanup_optimizer)?>
														</span>
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_10 row_style_4 css3_grid_row_10_responsive">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Clean Orphan Comments Meta",cleanup_optimizer)?>
														</span>
														<span class="css3_grid_tooltip">
															<span>
																<?php _e("Clean up the WordPress database by removing Orphan Comments Meta.",cleanup_optimizer)?>
															</span>
															<?php _e("Clean Orphan Comments Meta",cleanup_optimizer)?>
														</span>
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_11 row_style_2 css3_grid_row_11_responsive">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Clean Orphan Posts Meta",cleanup_optimizer)?>
														</span>
														<span class="css3_grid_tooltip">
															<span>
																<?php _e("Clean up the WordPress database by removing Orphan Posts Meta.",cleanup_optimizer)?>
															</span>
															<?php _e("Clean Orphan Posts Meta",cleanup_optimizer)?>
														</span>
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_12 row_style_4 css3_grid_row_12_responsive">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Clean Orphan Relationships",cleanup_optimizer)?>
														</span>
														<span class="css3_grid_tooltip">
															<span>
																<?php _e("Clean up the WordPress database by removing Orphan Relationships.",cleanup_optimizer)?>
															</span>
															<?php _e("Clean Orphan Relationships",cleanup_optimizer)?>
														</span>
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_13 row_style_2 css3_grid_row_13_responsive">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Clean Revision",cleanup_optimizer)?>
														</span>
														<span class="css3_grid_tooltip">
															<span>
																<?php _e("Clean up the WordPress database by removing Revision.",cleanup_optimizer)?>
															</span>
															<?php _e("Clean Revision",cleanup_optimizer)?>
														</span>
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_14 row_style_4 css3_grid_row_14_responsive">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Clean Spam Comments",cleanup_optimizer)?>
														</span>
														<span class="css3_grid_tooltip">
															<span>
																<?php _e("Clean up the WordPress database by removing Spam Comments.",cleanup_optimizer)?>
															</span>
															<?php _e("Clean Spam Comments",cleanup_optimizer)?>
														</span>
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_15 row_style_2 css3_grid_row_15_responsive">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Clean Trash Comments",cleanup_optimizer)?>
														</span>
														<span class="css3_grid_tooltip">
															<span>
																<?php _e("Clean up the WordPress database by removing Trash Comments.",cleanup_optimizer)?>
															</span>
															<?php _e("Clean Trash Comments",cleanup_optimizer)?>
														</span>
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_16 row_style_4 css3_grid_row_16_responsive">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Remove Pingbacks",cleanup_optimizer)?>
														</span>
														<span class="css3_grid_tooltip">
															<span>
																<?php _e("Clean up the WordPress database by removing Pingbacks.",cleanup_optimizer)?>
															</span>
															<?php _e("Remove Pingbacks",cleanup_optimizer)?>
														</span>
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_17 row_style_2 css3_grid_row_17_responsive">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Remove Transient Options",cleanup_optimizer)?>
														</span>
														<span class="css3_grid_tooltip">
															<span>
																<?php _e("Clean up the WordPress database by removing Transient Options.",cleanup_optimizer)?>
															</span>
															<?php _e("Remove Transient Options",cleanup_optimizer)?>
														</span> 
													</span> 
												</span> 
											</span>
										</li>
										<li class="css3_grid_row_18 row_style_4 css3_grid_row_18_responsive">
										<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<span>
													<span class="css3_hidden_caption">
														<?php _e("Remove Trackbacks",cleanup_optimizer)?>
													</span>
													<span class="css3_grid_tooltip">
														<span>
															<?php _e("Clean up the WordPress database by removing Trackbacks.",cleanup_optimizer)?>
														</span>
														<?php _e("Remove Trackbacks",cleanup_optimizer)?></span>
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_19 row_style_2 css3_grid_row_19_responsive">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Clean Database Tables",cleanup_optimizer)?>
														</span>
														<span class="css3_grid_tooltip">
															<span>
																<?php _e(" Remove the data from the tables making it clean and empty.",cleanup_optimizer)?>
															</span>
															<?php _e("Clean Database Tables",cleanup_optimizer)?>
														</span>
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_20 row_style_4 css3_grid_row_20_responsive">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Login Logs",cleanup_optimizer)?>
														</span>
														<span class="css3_grid_tooltip">
															<span>
																<?php _e("Allows you to track the current users who are logged in into you website and show there Geo Location on the map. It shows various details such as Username, IP Address, Location, Login Date &amp;Time, Login Status, Action to Block or White list IP Address.",cleanup_optimizer)?>
															</span>
															<?php _e("Login Logs",cleanup_optimizer)?>
														</span>
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_21 row_style_2 css3_grid_row_21_responsive">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Database Overview",cleanup_optimizer)?>
														</span>
														<span class="css3_grid_tooltip">
															<span>
																<?php _e("Allows you to view Database Information such as Database Host, Database Name, Database User, Database Type and Database Version.",cleanup_optimizer)?>
															</span><?php _e("Database Overview",cleanup_optimizer)?>
														</span>
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_22 row_style_4 css3_grid_row_22_responsive">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Data Clean Scheduler",cleanup_optimizer)?>
														</span>
														<span class="css3_grid_tooltip">
															<span>
																<?php _e("Remove the data from the WordPress making it clean and empty automatically (Daily, Weekly, Biweekly, Monthly, Quarterly, Half-Yearly, Annually).",cleanup_optimizer)?>
															</span>
															<?php _e("Data Clean Scheduler",cleanup_optimizer)?>
														</span>
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_23 row_style_2 css3_grid_row_23_responsive">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Database Clean Scheduler",cleanup_optimizer)?>
														</span>
														<span class="css3_grid_tooltip">
															<span>
																<?php _e("Clean data form the tables automatically on different basis i.e. Daily, Weekly, Biweekly, Monthly, Quarterly, Half-Yearly, Annually",cleanup_optimizer)?>
															</span><?php _e("Database Clean Scheduler",cleanup_optimizer)?>
														</span>
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_24 row_style_4 css3_grid_row_24_responsive">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Manage Comments",cleanup_optimizer)?>
														</span>
														<span class="css3_grid_tooltip">
															<span>
																<?php _e("Enable/Disable Comments on your WordPress website. Manage comments on any Post or Page. It can be used to disable comments on the entire network.",cleanup_optimizer)?>
															</span>
															<?php _e("Manage Comments",cleanup_optimizer)?>
														</span>
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_25 row_style_2 css3_grid_row_25_responsive">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Manage Trackbacks",cleanup_optimizer)?>
														</span>
														<span class="css3_grid_tooltip">
															<span>
																<?php _e("Trackbacks are a way to notify legacy blog systems that you've linked to them.Allows you to Enable/Disable Trackbacks on your WordPress website.",cleanup_optimizer);?>
															</span>
															<?php _e("Manage Trackbacks",cleanup_optimizer);?>
														</span>
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_26 row_style_4 css3_grid_row_26_responsive">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Database Delete Scheduler",cleanup_optimizer)?>
														</span>
														<span class="css3_grid_tooltip">
															<span>
																<?php _e("Delete data form the tables automatically on different basis i.e. Daily, Weekly, Biweekly, Monthly, Quarterly, Half-Yearly, Annually.",cleanup_optimizer)?>
															</span>
															<?php _e("Database Delete Scheduler",cleanup_optimizer)?>
														</span>
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_27 row_style_2 css3_grid_row_27_responsive">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Database Repair Scheduler",cleanup_optimizer)?>
														</span>
														<span class="css3_grid_tooltip">
															<span>
																<?php _e(" Repair data form the tables automatically on different basis i.e. Daily, Weekly, Biweekly, Monthly, Quarterly, Half-Yearly, Annually.",cleanup_optimizer)?>
															</span>
															<?php _e("Database Repair Scheduler",cleanup_optimizer)?>
														</span>
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_28 row_style_4 css3_grid_row_28_responsive">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Database Optimizer Scheduler",cleanup_optimizer)?>
														</span>
														<span class="css3_grid_tooltip">
															<span>
																<?php _e("Optimize data form the tables automatically on different basis i.e. Daily, Weekly, Biweekly, Monthly, Quarterly, Half-Yearly, Annually.",cleanup_optimizer)?>
															</span>
															<?php _e("Database Optimizer Scheduler",cleanup_optimizer)?>
														</span>
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_29 row_style_2 css3_grid_row_29_responsive">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Preview Database Tables",cleanup_optimizer)?>
														</span>
														<span class="css3_grid_tooltip">
															<span>
																<?php _e(" Preview the data of your table which is stored in your database on click of table name.",cleanup_optimizer)?>
															</span><?php _e("Preview Database Tables",cleanup_optimizer)?>
														</span>
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_30 row_style_4 css3_grid_row_30_responsive">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Repair Database Tables",cleanup_optimizer)?>
														</span>
														<span class="css3_grid_tooltip">
															<span>
																<?php _e(" WP Clean Optimizer repairs the possibly corrupted tables in your database.",cleanup_optimizer)?>
															</span>
															<?php _e("Repair Database Tables.",cleanup_optimizer)?>
														</span>
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_31 row_style_2 css3_grid_row_31_responsive">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Delete Database Tables",cleanup_optimizer)?>
														</span>
														<span class="css3_grid_tooltip">
															<span>
																<?php _e(" Delete or Drop the complete tables of your database.",cleanup_optimizer)?>
															</span>
															<?php _e("Delete Database Tables",cleanup_optimizer)?>
														</span>
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_32 row_style_4 css3_grid_row_32_responsive">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Optimizer Database Tables",cleanup_optimizer)?>
														</span>
														<span class="css3_grid_tooltip">
															<span>
																<?php _e("Improves Input/output efficiency when accessing the tables.",cleanup_optimizer)?>
															</span>
															<?php _e("Optimizer Database Tables",cleanup_optimizer)?>
														</span>
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_33 row_style_2 css3_grid_row_33_responsive">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Block Login IP Address",cleanup_optimizer)?>
														</span>
														<span class="css3_grid_tooltip">
															<span>
																<?php _e("Allows you to block the IP Addresses of the login users from the Login Logs if he is considered as unauthorized.",cleanup_optimizer)?>
															</span>
															<?php _e("Block Login IP Address",cleanup_optimizer)?>
														</span>
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_34 row_style_4 css3_grid_row_34_responsive">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Max Login Attempts",cleanup_optimizer)?>
														</span>
														<span class="css3_grid_tooltip">
															<span>
																<?php _e("Allows you to set number of login attempts left for the user incase wrong login attempts.",cleanup_optimizer)?>
															</span>
															<?php _e("Max Login Attempts",cleanup_optimizer)?>
														</span>
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_35 row_style_2 css3_grid_row_35_responsive">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Auto IP Block",cleanup_optimizer)?>
														</span>
														<span class="css3_grid_tooltip">
															<span>
																<?php _e("Allows you to Blocks IP addresses for next 24 hours when the limit of login attempts is reached.",cleanup_optimizer)?>
															</span>
															<?php _e("Auto IP Block",cleanup_optimizer)?>
														</span>
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_36 row_style_4 css3_grid_row_36_responsive">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Block IP Ranges",cleanup_optimizer)?>
														</span>
														<span class="css3_grid_tooltip">
															<span>
																<?php _e(" Allows you to block range of IP Addresses that are considered undesirable or hostile.",cleanup_optimizer)?>
															</span>
															<?php _e("Block IP Ranges",cleanup_optimizer)?>
														</span>
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_37 row_style_2 css3_grid_row_37_responsive">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Block Single IP Address",cleanup_optimizer)?>
														</span>
														<span class="css3_grid_tooltip">
															<span>
																<?php _e("Allows you to add single IP Address for blocking it as per your requirement.",cleanup_optimizer)?>
															</span>
															<?php _e("Block Single IP Address",cleanup_optimizer)?>
														</span>
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_38 row_style_4 css3_grid_row_38_responsive">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Roles and Capabilities",cleanup_optimizer)?>
														</span>
														<span class="css3_grid_tooltip">
															<span>
																<?php _e("Allows you to controls the capabilities of WP Clean Up Optimizer among different roles of WordPress users.",cleanup_optimizer)?>
															</span>
															<?php _e("Roles and Capabilities",cleanup_optimizer)?>
														</span>
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_3 row_style_2 css3_grid_row_3_responsive">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
														<?php _e("Multisite Compatibility*",cleanup_optimizer)?>
														</span>
														<span class="css3_grid_tooltip">
															<span>
																<?php _e("Allows you to use this Plugin with network of sites / Multisites WordPress. But you need to have separate license for each domain.",cleanup_optimizer)?>
															</span>
															<?php _e("Multisite Compatibility*",cleanup_optimizer)?>
														</span>
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_39 footer_row css3_grid_row_39_responsive">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align"></span>
											</span>
										</li>
									</ul>
								</div>
								<div class="column_1 column_1_responsive" style="width: 15.5%;">
									<div class="column_ribbon ribbon_style2_free"></div>
									<ul>
										<li class="css3_grid_row_0 header_row_1 align_center css3_grid_row_0_responsive">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<h2 class="col1">
														<?php _e("Lite",cleanup_optimizer)?>
													</h2>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_1 header_row_2 css3_grid_row_1_responsive align_center">
											<span class="css3_grid_vertical_align_table">
											<span class="css3_grid_vertical_align">
												<h1 class="col1">
													<?php _e("FREE",cleanup_optimizer)?>
												</h1>
											</span>
											</span>
										</li>
										<li class="css3_grid_row_2 row_style_3 css3_grid_row_2_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Domains per License",cleanup_optimizer)?>
														</span>
														<?php _e("1",cleanup_optimizer)?>
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_3 row_style_1 css3_grid_row_3_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Technical Support",cleanup_optimizer)?>
														</span>
														<?php _e("None",cleanup_optimizer)?>
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_4 row_style_3 css3_grid_row_4_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Plugin Updates",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_5 row_style_1 css3_grid_row_5_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Multi-Lingual",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_6 row_style_3 css3_grid_row_6_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Clean Auto Draft",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_7 row_style_1 css3_grid_row_7_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Clean Transient Feed",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_8 row_style_3 css3_grid_row_8_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Clean Draft",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_9 row_style_1 css3_grid_row_9_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Clean Moderated Comments",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_10 row_style_3 css3_grid_row_10_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Clean Orphan Comments Meta",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_11 row_style_1 css3_grid_row_11_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Clean Orphan Posts Meta",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_12 row_style_3 css3_grid_row_12_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Clean Orphan Relationships",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_13 row_style_1 css3_grid_row_13_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Clean Revision",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_14 row_style_3 css3_grid_row_14_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Clean Spam Comments",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_15 row_style_1 css3_grid_row_15_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Clean Trash Comments",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_16 row_style_3 css3_grid_row_16_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Remove Pingbacks",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_17 row_style_1 css3_grid_row_17_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Remove Transient Options",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_18 row_style_3 css3_grid_row_18_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Remove Trackbacks",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_19 row_style_1 css3_grid_row_19_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Clean Database Tables",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_20 row_style_3 css3_grid_row_20_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Login Logs",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_21 row_style_1 css3_grid_row_21_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Database Overview",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_22 row_style_3 css3_grid_row_22_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Data Clean Scheduler",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/cross_04.png" , dirname(__FILE__)); ?>" alt="no">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_23 row_style_1 css3_grid_row_23_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Database Clean Scheduler",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/cross_04.png" , dirname(__FILE__)); ?>" alt="no">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_24 row_style_3 css3_grid_row_24_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Manage Comments",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/cross_04.png" , dirname(__FILE__)); ?>" alt="no">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_25 row_style_1 css3_grid_row_25_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Manage Trackbacks",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/cross_04.png" , dirname(__FILE__)); ?>" alt="no">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_26 row_style_3 css3_grid_row_26_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Database Delete Scheduler",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/cross_04.png" , dirname(__FILE__)); ?>" alt="no">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_27 row_style_1 css3_grid_row_27_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Database Repair Scheduler",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/cross_04.png" , dirname(__FILE__)); ?>" alt="no">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_28 row_style_3 css3_grid_row_28_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Database Optimizer Schedule",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/cross_04.png" , dirname(__FILE__)); ?>" alt="no">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_29 row_style_1 css3_grid_row_29_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Preview Database Tables",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/cross_04.png" , dirname(__FILE__)); ?>" alt="no">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_30 row_style_3 css3_grid_row_30_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Repair Database Tables",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/cross_04.png" , dirname(__FILE__)); ?>" alt="no">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_31 row_style_1 css3_grid_row_31_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Delete Database Tables",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/cross_04.png" , dirname(__FILE__)); ?>" alt="no">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_32 row_style_3 css3_grid_row_32_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Optimizer Database Tables",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/cross_04.png" , dirname(__FILE__)); ?>" alt="no">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_33 row_style_1 css3_grid_row_33_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Block Login IP Address",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/cross_04.png" , dirname(__FILE__)); ?>"alt="no">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_34 row_style_3 css3_grid_row_34_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Max Login Attempts",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/cross_04.png" , dirname(__FILE__)); ?>" alt="no">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_35 row_style_1 css3_grid_row_35_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Auto IP Block",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/cross_04.png" , dirname(__FILE__)); ?>" alt="no">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_36 row_style_3 css3_grid_row_36_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Block IP Ranges",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/cross_04.png" , dirname(__FILE__)); ?>" alt="no">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_37 row_style_1 css3_grid_row_37_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Block Single IP Address",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/cross_04.png" , dirname(__FILE__)); ?>" alt="no">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_38 row_style_3 css3_grid_row_38_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Roles and Capabilities",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/cross_04.png" , dirname(__FILE__)); ?>" alt="no">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_3 row_style_1 css3_grid_row_3_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Multisite Compatibility*",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_39 footer_row css3_grid_row_39_responsive">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<a target="_blank" href="https://wordpress.org/plugins/wp-clean-up-optimizer/" class="sign_up sign_up_orange radius3">
														<?php _e("Download!",cleanup_optimizer)?>
													</a>
												</span>
											</span>
										</li>
									</ul>
								</div>
								<div class="column_2 column_2_responsive" style="width: 15.5%;">
									<div class="column_ribbon ribbon_style2_heart"></div>
									<ul>
										<li class="css3_grid_row_0 header_row_1 align_center css3_grid_row_0_responsive">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<h2 class="col1">
														<?php _e("Eco",cleanup_optimizer)?>
													</h2>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_1 header_row_2 css3_grid_row_1_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span class="css3_grid_tooltip">
														<span>
															<?php _e("You just need to pay for once for life time.",cleanup_optimizer)?>
														</span>
														<h1 class="col1">
															&pound;<span><?php _e("12",cleanup_optimizer)?></span>
														</h1>
														<h3 class="col1">
															<?php _e("one time",cleanup_optimizer)?>
														</h3>
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_2 row_style_4 css3_grid_row_2_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Domains per License",cleanup_optimizer)?>
														</span>
														<?php _e("1",cleanup_optimizer)?>
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_3 row_style_2 css3_grid_row_3_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Technical Support",cleanup_optimizer)?>
														</span>
														<?php _e("1 Week",cleanup_optimizer)?>
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_4 row_style_4 css3_grid_row_4_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Plugin Updates",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_5 row_style_2 css3_grid_row_5_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Multi-Lingual",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_6 row_style_4 css3_grid_row_6_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Clean Auto Draft",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_7 row_style_2 css3_grid_row_7_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Clean Transient Feed",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_8 row_style_4 css3_grid_row_8_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Clean Draft",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_9 row_style_2 css3_grid_row_9_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Clean Moderated Comments",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes"> 
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_10 row_style_4 css3_grid_row_10_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Clean Orphan Comments Meta",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_11 row_style_2 css3_grid_row_11_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Clean Orphan Posts Meta",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_12 row_style_4 css3_grid_row_12_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Clean Orphan Relationships",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_13 row_style_2 css3_grid_row_13_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Clean Revision",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_14 row_style_4 css3_grid_row_14_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Clean Spam Comments",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_15 row_style_2 css3_grid_row_15_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Clean Trash Comments",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_16 row_style_4 css3_grid_row_16_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Remove Pingbacks",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_17 row_style_2 css3_grid_row_17_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Remove Transient Options",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_18 row_style_4 css3_grid_row_18_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Remove Trackbacks",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_19 row_style_2 css3_grid_row_19_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Clean Database Tables",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_20 row_style_4 css3_grid_row_20_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Login Logs",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_21 row_style_2 css3_grid_row_21_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Database Overview",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_22 row_style_4 css3_grid_row_22_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Data Clean Scheduler",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_23 row_style_2 css3_grid_row_23_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Database Clean Scheduler",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_24 row_style_4 css3_grid_row_24_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Manage Comments",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_25 row_style_2 css3_grid_row_25_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Manage Trackbacks",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_27 row_style_4 css3_grid_row_27_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Database Delete Scheduler",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_27 row_style_2 css3_grid_row_27_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Database Repair Scheduler",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_28 row_style_4 css3_grid_row_28_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Database Optimizer Scheduler",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_29 row_style_2 css3_grid_row_29_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Preview Database Tables",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_30 row_style_4 css3_grid_row_30_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Repair Database Tables",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_31 row_style_2 css3_grid_row_31_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Delete Database Tables",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_32 row_style_4 css3_grid_row_32_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Optimizer Database Tables",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_33 row_style_2 css3_grid_row_33_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Block Login IP Address",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/cross_04.png" , dirname(__FILE__)); ?>" alt="no">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_34 row_style_4 css3_grid_row_34_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Max Login Attempts",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/cross_04.png" , dirname(__FILE__)); ?>" alt="no">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_35 row_style_2 css3_grid_row_35_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Auto IP Block",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/cross_04.png" , dirname(__FILE__)); ?>" alt="no">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_36 row_style_4 css3_grid_row_36_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Block IP Ranges",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/cross_04.png" , dirname(__FILE__)); ?>" alt="no">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_37 row_style_2 css3_grid_row_37_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Block Single IP Address",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/cross_04.png" , dirname(__FILE__)); ?>" alt="no">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_38 row_style_4 css3_grid_row_38_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Roles and Capabilities",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/cross_04.png" , dirname(__FILE__)); ?>" alt="no">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_39 row_style_2 css3_grid_row_39_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Multisite Compatibility*",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_40 footer_row css3_grid_row_40_responsive">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<a href="http://tech-banker.com/shop/wp-clean-up-optimizer/wp-clean-up-optimizer-eco-edition/" class="sign_up sign_up_orange radius3" target="_blank">
														<?php _e("Order Now!",cleanup_optimizer)?>
													</a>
												</span>
											</span>
										</li>
									</ul>
								</div>
								<div class="column_3 column_3_responsive" style="width: 15.5%;">
									<div class="column_ribbon ribbon_style2_best"></div>
									<ul>
										<li class="css3_grid_row_0 header_row_1 align_center css3_grid_row_0_responsive">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<h2 class="col2">
														<?php _e("Pro",cleanup_optimizer)?>
													</h2>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_1 header_row_2 css3_grid_row_1_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span class="css3_grid_tooltip">
														<span>
															<?php _e("You just need to pay for once for life time.",cleanup_optimizer)?>
														</span>
														<h1 class="col1">
															&pound;<span><?php _e("15",cleanup_optimizer)?></span>
														</h1>
														<h3 class="col1">
															<?php _e("one time",cleanup_optimizer)?>
														</h3>
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_2 row_style_3 css3_grid_row_2_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Domains per License",cleanup_optimizer)?>
														</span>
														<?php _e("1",cleanup_optimizer)?>
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_3 row_style_1 css3_grid_row_3_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Technical Support",cleanup_optimizer)?>
														</span>
														<?php _e("1 Month",cleanup_optimizer)?>
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_4 row_style_3 css3_grid_row_4_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Plugin Updates",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_5 row_style_1 css3_grid_row_5_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Multi-Lingual",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_6 row_style_3 css3_grid_row_6_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Clean Auto Draft",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_7 row_style_1 css3_grid_row_7_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Clean Transient Feed",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_8 row_style_3 css3_grid_row_8_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Clean Draft",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_9 row_style_1 css3_grid_row_9_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Clean Moderated Comments",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_10 row_style_3 css3_grid_row_10_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Clean Orphan Comments Meta",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_11 row_style_1 css3_grid_row_11_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Clean Orphan Posts Meta",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_12 row_style_3 css3_grid_row_12_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Clean Orphan Relationships",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_13 row_style_1 css3_grid_row_13_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Clean Revision",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_14 row_style_3 css3_grid_row_14_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Clean Spam Comments",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_15 row_style_1 css3_grid_row_15_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Clean Trash Comments",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_16 row_style_3 css3_grid_row_16_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Remove Pingbacks",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_17 row_style_1 css3_grid_row_17_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Remove Transient Options",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_18 row_style_3 css3_grid_row_18_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Remove Trackbacks",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_19 row_style_1 css3_grid_row_19_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Clean Database Tables",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_20 row_style_3 css3_grid_row_20_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Login Logs",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_21 row_style_1 css3_grid_row_21_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Database Overview",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_22 row_style_3 css3_grid_row_22_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Data Clean Scheduler",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_23 row_style_1 css3_grid_row_23_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Database Clean Scheduler",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_24 row_style_3 css3_grid_row_24_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Manage Comments",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_25 row_style_1 css3_grid_row_25_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Manage Trackbacks",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_26 row_style_3 css3_grid_row_26_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Database Delete Scheduler",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_27 row_style_1 css3_grid_row_27_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Database Repair Scheduler",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_28 row_style_3 css3_grid_row_28_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Database Optimizer Scheduler",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_29 row_style_1 css3_grid_row_29_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Preview Database Tables",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_30 row_style_3 css3_grid_row_30_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Repair Database Tables",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_31 row_style_1 css3_grid_row_31_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Delete Database Tables",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_32 row_style_3 css3_grid_row_32_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Optimizer Database Tables",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_33 row_style_1 css3_grid_row_33_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Block Login IP Address",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_34 row_style_3 css3_grid_row_34_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Max Login Attempts",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_35 row_style_1 css3_grid_row_35_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Auto IP Block",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_36 row_style_3 css3_grid_row_36_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Block IP Ranges",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_37 row_style_1 css3_grid_row_37_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Block Single IP Address",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_38 row_style_3 css3_grid_row_38_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Roles and Capabilities",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_39 row_style_1 css3_grid_row_39_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Multisite Compatibility*",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_40 footer_row css3_grid_row_40_responsive">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<a href="http://tech-banker.com/shop/wp-clean-up-optimizer/wp-clean-up-optimizer-pro-edition/" class="sign_up sign_up_orange radius3" target="_blank">
														<?php _e("Order Now!",cleanup_optimizer)?>
													</a>
												</span>
											</span>
										</li>
									</ul>
								</div>
								<div class="column_4 column_4_responsive" style="width: 15.5%;">
									<div class="column_ribbon ribbon_style2_hot"></div>
									<ul>
										<li class="css3_grid_row_0 header_row_1 align_center css3_grid_row_0_responsive">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<h2 class="col1">
														<?php _e("Developer",cleanup_optimizer)?>
													</h2>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_1 header_row_2 css3_grid_row_1_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span class="css3_grid_tooltip">
														<span>
															<?php _e("You just need to pay for once for life time.",cleanup_optimizer)?>
														</span>
														<h1 class="col1">
															&pound;<span><?php _e("52",cleanup_optimizer)?></span>
														</h1>
														<h3 class="col1">
															<?php _e("one time",cleanup_optimizer)?>
														</h3>
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_2 row_style_4 css3_grid_row_2_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Domains per License",cleanup_optimizer)?>
														</span>
														<?php _e("5",cleanup_optimizer)?>
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_3 row_style_2 css3_grid_row_3_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Technical Support",cleanup_optimizer)?>
														</span>
														<?php _e("1 Year",cleanup_optimizer)?>
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_4 row_style_4 css3_grid_row_4_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Plugin Updates",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_5 row_style_2 css3_grid_row_5_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Multi-Lingual",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_6 row_style_4 css3_grid_row_6_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Clean Auto Draft",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_7 row_style_2 css3_grid_row_7_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Clean Transient Feed",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_8 row_style_4 css3_grid_row_8_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Clean Draft",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_9 row_style_2 css3_grid_row_9_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Clean Moderated Comments",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_10 row_style_4 css3_grid_row_10_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Clean Orphan Comments Meta",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_11 row_style_2 css3_grid_row_11_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Clean Orphan Posts Meta",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_12 row_style_4 css3_grid_row_12_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Clean Orphan Relationships",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_13 row_style_2 css3_grid_row_13_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Clean Revision",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_14 row_style_4 css3_grid_row_14_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Clean Spam Comments",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_15 row_style_2 css3_grid_row_15_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Clean Trash Comments",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_16 row_style_4 css3_grid_row_16_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Remove Pingbacks",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_17 row_style_2 css3_grid_row_17_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Remove Transient Options",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_18 row_style_4 css3_grid_row_18_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Remove Trackbacks",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_19 row_style_2 css3_grid_row_19_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Clean Database Tables",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_20 row_style_4 css3_grid_row_20_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Login Logs",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_21 row_style_2 css3_grid_row_21_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Database Overview",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_22 row_style_4 css3_grid_row_22_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Data Clean Scheduler",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_23 row_style_2 css3_grid_row_23_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Database Clean Scheduler",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_24 row_style_4 css3_grid_row_24_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Manage Comments",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_25 row_style_2 css3_grid_row_25_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Manage Trackbacks",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_26 row_style_4 css3_grid_row_26_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Database Delete Scheduler",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_27 row_style_2 css3_grid_row_27_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Database Repair Scheduler",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_28 row_style_4 css3_grid_row_28_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Database Optimizer Scheduler",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_29 row_style_2 css3_grid_row_29_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Preview Database Tables",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_30 row_style_4 css3_grid_row_30_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Repair Database Tables",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_31 row_style_2 css3_grid_row_31_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Delete Database Tables",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_32 row_style_4 css3_grid_row_32_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Optimizer Database Tables",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_33 row_style_2 css3_grid_row_33_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Block Login IP Address",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_34 row_style_4 css3_grid_row_34_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Max Login Attempts",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_35 row_style_2 css3_grid_row_35_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Auto IP Block",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_36 row_style_4 css3_grid_row_36_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Block IP Ranges",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_37 row_style_2 css3_grid_row_37_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Block Single IP Address",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_38 row_style_4 css3_grid_row_38_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Roles and Capabilities",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_3 row_style_2 css3_grid_row_3_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Multisite Compatibility*",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_39 footer_row css3_grid_row_39_responsive">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<a href="http://tech-banker.com/shop/wp-clean-up-optimizer/wp-clean-up-optimizer-developer-edition/" class="sign_up sign_up_orange radius3" target="_blank">
														<?php _e("Order Now!",cleanup_optimizer)?>
													</a>
												</span>
											</span>
										</li>
									</ul>
								</div>
								<div class="column_1 column_5_responsive" style="width: 15.5%;">
									<div class="column_ribbon ribbon_style2_save"></div>
									<ul>
										<li class="css3_grid_row_0 header_row_1 align_center css3_grid_row_0_responsive radius5_topright">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<h2 class="col1">
														<?php _e("Extended",cleanup_optimizer)?>
													</h2>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_1 header_row_2 css3_grid_row_1_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span class="css3_grid_tooltip">
														<span>
															<?php _e("You just need to pay for once for life time.",cleanup_optimizer)?>
														</span>
														<h1 class="col1">
															&pound;<span><?php _e("409",cleanup_optimizer)?></span>
														</h1>
														<h3 class="col1">
															<?php _e("one time",cleanup_optimizer)?>
														</h3>
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_2 row_style_3 css3_grid_row_2_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Domains per License",cleanup_optimizer)?>
														</span>
														<?php _e("50",cleanup_optimizer)?>
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_3 row_style_1 css3_grid_row_3_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Technical Support",cleanup_optimizer)?>
														</span>
														<?php _e("1 Year",cleanup_optimizer)?>
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_4 row_style_3 css3_grid_row_4_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Plugin Updates",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_5 row_style_1 css3_grid_row_5_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Multi-Lingual",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_6 row_style_3 css3_grid_row_6_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Clean Auto Draft",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_7 row_style_1 css3_grid_row_7_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Clean Transient Feed",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_8 row_style_3 css3_grid_row_8_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Clean Draft",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_9 row_style_1 css3_grid_row_9_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Clean Moderated Comments",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_10 row_style_3 css3_grid_row_10_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Clean Orphan Comments Meta",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_11 row_style_1 css3_grid_row_11_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Clean Orphan Posts Meta",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_12 row_style_3 css3_grid_row_12_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Clean Orphan Relationships",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_13 row_style_1 css3_grid_row_13_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Clean Revision",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_14 row_style_3 css3_grid_row_14_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Clean Spam Comments",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_15 row_style_1 css3_grid_row_15_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Clean Trash Comments",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_16 row_style_3 css3_grid_row_16_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Remove Pingbacks",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_17 row_style_1 css3_grid_row_17_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Remove Transient Options",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_18 row_style_3 css3_grid_row_18_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Remove Trackbacks",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_19 row_style_1 css3_grid_row_19_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Clean Database Tables",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_20 row_style_3 css3_grid_row_20_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Login Logs",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_21 row_style_1 css3_grid_row_21_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Database Overview",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_22 row_style_3 css3_grid_row_22_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Data Clean Scheduler",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_23 row_style_1 css3_grid_row_23_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
													<span
														class="css3_hidden_caption"><?php _e("Database Clean Scheduler",cleanup_optimizer)?></span><img
														src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>"
														alt="yes"> </span> </span> </span></li>
										<li class="css3_grid_row_24 row_style_3 css3_grid_row_24_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Manage Comments",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_25 row_style_1 css3_grid_row_25_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Manage Trackbacks",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_26 row_style_3 css3_grid_row_26_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Database Delete Scheduler",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_27 row_style_1 css3_grid_row_27_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Database Repair Scheduler",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_28 row_style_3 css3_grid_row_28_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Database Optimizer Scheduler",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_29 row_style_1 css3_grid_row_29_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Preview Database Tables",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_30 row_style_3 css3_grid_row_30_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Repair Database Tables",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_31 row_style_1 css3_grid_row_31_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Delete Database Tables",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_32 row_style_3 css3_grid_row_32_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Optimizer Database Tables",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_33 row_style_1 css3_grid_row_33_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Block Login IP Address",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_34 row_style_3 css3_grid_row_34_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Max Login Attempts",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_35 row_style_1 css3_grid_row_35_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Auto IP Block",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_36 row_style_3 css3_grid_row_36_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Block IP Ranges",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_37 row_style_1 css3_grid_row_37_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Block Single IP Address",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_38 row_style_3 css3_grid_row_38_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Roles and Capabilities",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
													</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_3 row_style_1 css3_grid_row_3_responsive align_center">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<span>
														<span class="css3_hidden_caption">
															<?php _e("Multisite Compatibility*",cleanup_optimizer)?>
														</span>
														<img src="<?php echo plugins_url("/assets/images/tick_10.png" , dirname(__FILE__)); ?>" alt="yes">
														</span>
												</span>
											</span>
										</li>
										<li class="css3_grid_row_39 footer_row css3_grid_row_39_responsive">
											<span class="css3_grid_vertical_align_table">
												<span class="css3_grid_vertical_align">
													<a href="http://tech-banker.com/shop/wp-clean-up-optimizer/wp-clean-up-optimizer-extended-edition/" class="sign_up sign_up_orange radius3" target="_blank">
														<?php _e("Order Now!",cleanup_optimizer)?>
													</a>
												</span>
											</span>
										</li>
									</ul>
								</div>
							</div>
							<div class="gap" style="line-height: 20px; height: 20px;"></div>
							<div class="wpb_text_column wpb_content_element ">
								<div class="wpb_wrapper">
										<strong><u>NOTE FOR MULTISITE* :</u></strong> Allows you to use this
										Plugin with network of sites / Multisites WordPress. But you
										need to purchase separate license for each Installation / Instance.
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
}
?>