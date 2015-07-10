<?php 
if (!is_user_logged_in())
{
	return;
}
else
{
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
		$plugin_update_nonce = wp_create_nonce( "update_plugin_nonce" );
		$cleanup_updates = get_option("wp-cleanup-automatic-update");
		?>
		<form id="frm_auto_update" class="layout-form" style = "max-width:1000px">
			<div class="fluid-layout">
				<div class="layout-span12">
					<div class="widget-layout">
						<div class="widget-layout-title">
							<h4>
								<?php _e("Plugin Updates", cleanup_optimizer); ?>
							</h4>
						</div>
						<div class="widget-layout-body">
							<div class="layout-control-group" style="margin: 10px 0 0 0 ;">
								<label class="layout-control-label"><?php _e("Plugin Updates", cleanup_optimizer); ?> :</label>
								<div class="layout-controls-radio">
									<input type="radio" name="ux_cleanup_update" id="ux_enable_update" onclick="cleanup_optimizer_autoupdate(this);" <?php echo $cleanup_updates == "1" ? "checked=\"checked\"" : "";?> value="1">
									<label style="vertical-align: baseline;">
										<?php _e("Enable", cleanup_optimizer); ?>
									</label>
									<input type="radio" name="ux_cleanup_update" id="ux_disable_update" onclick="cleanup_optimizer_autoupdate(this);" <?php echo $cleanup_updates == "0" ? "checked=\"checked\"" : "";?> style="margin-left: 10px;" value="0">
									<label style="vertical-align: baseline;">
										<?php _e("Disable", cleanup_optimizer); ?>
									</label>
								</div>
							</div>
							<div class="layout-control-group" style="margin:10px 0 10px 0 ;">
								<strong><i>This feature allows the plugin to update itself automatically when a new version is available on WordPress Repository.<br/>This allows to stay updated to the latest features. If you would like to disable automatic updates, choose  the disable option above.</i></strong>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
		<script type="text/javascript">
		
			function cleanup_optimizer_autoupdate(control)
			{
				var cleanup_updates = jQuery(control).val();
				jQuery.post(ajaxurl, "cleanup_updates="+cleanup_updates+"&param=cleanup_plugin_updates&action=cleanup_library&_wpnonce=<?php echo $plugin_update_nonce ;?>", function(data)
				{
				});
			}
			
		</script>
	<?php
	}
}
?>