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
	$alternate="";
	$logs = $wpdb->get_results
	(
		"SELECT * FROM " . cleanup_optimizer_log() ." order by date_time desc LIMIT 1000"
	);
	?>
	<div id="message" class="top-right message" style="display: none;">
		<div class="message-notification"></div>
		<div class="message-notification ui-corner-all growl-success" >
			<div onclick="message_close();" id="close-message" class="message-close">x</div>
			<div class="message-header"><?php _e("Success!",  cleanup_optimizer); ?></div>
			<div class="message-message"><?php _e("Action has been updated",  cleanup_optimizer); ?></div>
		</div>
	</div>
	<div class="fluid-layout wpcb-page-width" style="width: 1000px;">
		<div class="layout-span12">
			<div class="widget-layout">
				<div class="widget-layout-title">
					<h4><?php _e("Login Logs", cleanup_optimizer); ?></h4>
				</div>
				<div class="widget-layout-body">
					<div class="fluid-layout wpcb-page-width">
						<div class="layout-span12">
							<div class="widget-layout">
								<div class="widget-layout-title">
									<h4>
										<?php _e("Recent Login Details on World Map", cleanup_optimizer); ?>
									</h4>
								</div>
								<div class="widget-layout-body">
									<input type="hidden" id="geocomplete" name="geocomplete" class="layout-span12" value=""/>
									<input type="hidden" id="lat" class="layout-span12" onblur="codeLatLng();" name="lat" value=""/>
									<input type="hidden" id="lng" class="layout-span12" onblur="codeLatLng();" name="lng" value=""/>
									<script type="text/javascript">
									
										var bentley = [{"featureType":"landscape","stylers":[{"hue":"#F1FF00"},{"saturation":-27.4},{"lightness":9.4},{"gamma":1}]},{"featureType":"road.highway","stylers":[{"hue":"#0099FF"},{"saturation":-20},{"lightness":36.4},{"gamma":1}]},{"featureType":"road.arterial","stylers":[{"hue":"#00FF4F"},{"saturation":0},{"lightness":0},{"gamma":1}]},{"featureType":"road.local","stylers":[{"hue":"#FFB300"},{"saturation":-38},{"lightness":11.2},{"gamma":1}]},{"featureType":"water","stylers":[{"hue":"#00B6FF"},{"saturation":4.2},{"lightness":-63.4},{"gamma":1}]},{"featureType":"poi","stylers":[{"hue":"#9FFF00"},{"saturation":0},{"lightness":0},{"gamma":1}]}];
										var map;
										var map_theme = bentley;
										
										function initialize_cleanup_optimizer() 
										{
											geocoder = new google.maps.Geocoder();
											var latitude = jQuery("#lat").val() == "" ? "10.434753083771703" : jQuery("#lat").val(); 
											var longitude= jQuery("#lng").val() == "" ? "12.412856439147959" : jQuery("#lng").val(); 
											var latlng = new google.maps.LatLng(latitude, longitude);
											var mapOptions = 
											{
												scrollwheel: true,
												zoomControl: true,	
												zoom:2,
												center: latlng,
												styles : map_theme,
												mapTypeId: google.maps.MapTypeId.ROADMAP
											}
											map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
											<?php 
											for($flag_markers = 0; $flag_markers < count($logs); $flag_markers++ ) 
											{
											?>
												var position = new google.maps.LatLng("<?php echo $logs[$flag_markers]->latitude;?>", "<?php echo $logs[$flag_markers]->longitude;?>");
												marker = new google.maps.Marker(
												{
													position: position,
													map: map,
													draggable:false,
													animation: google.maps.Animation.DROP,
												});
											<?php
											}
											?>
										}
									</script>
									<div id="map_canvas" style="width: 930px; height: 300px; border:4px solid #000000; margin-top:10px;"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="widget-layout">
						<div class="widget-layout-title">
							<h4><?php _e( "Recent Login Details", cleanup_optimizer ); ?></h4>
						</div>
						<div class="widget-layout-body">
							<form id="ux_frm_date" name="ux_frm_date" class="layout-form" >
									<div class="layout-control-group">
										<label class="layout-control-label"><?php _e("Start Date", cleanup_optimizer); ?> :</label>
										<div class="layout-controls custom-layout-controls-cleanup">
											<input type="text" class="layout-span3"  name="ux_txt_start_date" id="ux_txt_start_date" value="<?php echo date('Y-m-d', strtotime("1 month ago"));?>"/>
										</div>
									</div>
									<div class="layout-control-group">
										<label class="layout-control-label"><?php _e("End Date", cleanup_optimizer); ?> :</label>
										<div class="layout-controls custom-layout-controls-cleanup">
											<input type="text" class="layout-span3"  name="ux_txt_end_date" id="ux_txt_end_date" value="<?php echo date('Y-m-d');?>"/>
										</div>
									</div>
									<input type="submit" id="ux_btn_action" name="ux_btn_action" class="btn button-primary " value="<?php _e("Get Result", cleanup_optimizer);?>"/>
								</form>
							<table class="widefat" style="background-color:#ffffff; margin-top:10px;" id="data-table-logs">
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
											<img src="<?php echo plugins_url("/assets/images/questionmark_icon.png" , dirname(__FILE__))?>" class="tooltip_img hovertip" data-original-title='<?php _e("Allows you to block or whitelist IP Addresses for the logged in users as per your requirement.",cleanup_optimizer) ;?>'/>
										</th>
									</tr>
								</thead>
								<tbody>
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
												<a href="#" style="color:#0d1ff6;" onclick="block_ip();"><?php _e("Block IP Address", cleanup_optimizer); ?></a>
											</td>
											
										</tr>
										<?php 
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
	<script type="text/javascript">
		jQuery(".hovertip").tooltip_tip({placement: "right"});
		jQuery(document).ready(function()
		{
			jQuery('#ux_txt_start_date').datepicker({
				dateFormat : 'yy-mm-dd'
			});
			jQuery('#ux_txt_end_date').datepicker({
				dateFormat : 'yy-mm-dd'
			});
			var oTable = jQuery("#data-table-logs").dataTable
			({
				"bJQueryUI": false,
				"bAutoWidth": true,
				"sPaginationType": "full_numbers",
				"sDom": '<"datatable-header"fl>t<"datatable-footer"ip>',
				"oLanguage": 
				{
					"sLengthMenu": "<span>Show entries:</span> _MENU_"
				},
				"aaSorting": [[ 5, "desc" ]]
			});
			initialize_cleanup_optimizer()
		});
		jQuery("#ux_frm_date").validate
		({	
			rules:
			{	
				ux_txt_start_date:
				{ 
					required: true,
					date: true
				},
				ux_txt_end_date:
				{
					required: true,
					date: true
				}
			},
			submitHandler: function(form)
			{
				var start_date=jQuery("#ux_txt_start_date").val();
				var end_date=jQuery("#ux_txt_end_date").val();
				jQuery.post(ajaxurl,"&start_date="+start_date+"&end_date="+end_date+"&param=filter_data&action=cleanup_library", function(data)
				{
					jQuery('#data-table-logs').dataTable().fnDestroy();
					jQuery("#data-table-logs").html(data);
				});
			}
		});
		function block_ip()
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