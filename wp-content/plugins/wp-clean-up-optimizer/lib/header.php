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
	$cpo_lang = array();
	$cpo_translated_lang = array();
	
	array_push($cpo_lang, "bg_BG", "ja", "ko_KR", "ms_MY", "sq_AL", "sr_RS", "es_ES", "uk", "sv_SE", "pt_PT", "pt_BR", "et",
 	"fi", "he_IL", "ru_RU", "be_BY", "tr", "th", "ar", "hu_HU", "cs_CZ", "pl_PL", "da_DK", "sk_SK", "id_ID", "el_GR",
 	"hr", "nb", "ro_RO");
	
	array_push($cpo_translated_lang, "en_GB", "en_US", "de_DE", "fr_FR", "it_IT", "nl_NL", "zh_CN", "sl_SL");
	$language = get_locale();
	?>
	
	<div id="welcome-panel" class="welcome-panel" style="width:1000px;padding:0px !important;background-color: #f9f9f9 !important">
		<div class="welcome-panel-content">
			<img src="<?php echo plugins_url("/assets/images/icons/wp-clean-up-optimizer-logo.png" , dirname(__FILE__))?>" style="margin-top:10px;"></img>
			<div class="welcome-panel-column-container">
				<div class="welcome-panel-column" style="width:240px !important;">
					<h4 class="welcome-screen-margin">
						<?php _e("Get Started", cleanup_optimizer); ?>
					</h4>
						<a class="button button-primary button-hero" href="#">
							<?php _e("Watch Clean Up Video!", cleanup_optimizer); ?>
						</a>
						<p>or, 
							<a target="_blank" href="http://tech-banker.com/products/wp-clean-up-optimizer/knowledge-base/">
								<?php _e("read documentation here", cleanup_optimizer); ?>
							</a>
						</p>
				</div>
				<div class="welcome-panel-column" style="width:250px !important;">
					<h4 class="welcome-screen-margin"><?php _e("Go Premium", cleanup_optimizer); ?></h4>
					<ul>
						<li>
							<a href="http://tech-banker.com/products/wp-clean-up-optimizer/" target="_blank" class="welcome-icon">
								<?php _e("Features", cleanup_optimizer); ?>
							</a>
						</li>
						<li>
							<a href="http://tech-banker.com/products/wp-clean-up-optimizer/demo/" target="_blank" class="welcome-icon">
								<?php _e("Online Demos", cleanup_optimizer); ?>
							</a>
						</li>
						<li>
							<a href="http://tech-banker.com/products/wp-clean-up-optimizer/pricing/" target="_blank" class="welcome-icon">
								<?php _e("Premium Pricing Plan", cleanup_optimizer); ?>
							</a>
						</li>
					</ul>
				</div>
				<div class="welcome-panel-column" style="width:240px !important;">
					<h4 class="welcome-screen-margin">
						<?php _e("Knowledge Base", cleanup_optimizer); ?>
					</h4>
					<ul>
						<li>
							<a href="http://tech-banker.com/forums/forum/wp-clean-up-optimizer-support/" target="_blank" class="welcome-icon">
								<?php _e("Support Forum", cleanup_optimizer); ?>
							</a>
						</li>
						<li>
							<a href="http://tech-banker.com/products/wp-clean-up-optimizer/knowledge-base/" target="_blank" class="welcome-icon">
								<?php _e("FAQ's", cleanup_optimizer); ?>
							</a>
						</li>
						<li>
							<a href="http://tech-banker.com/products/wp-clean-up-optimizer/" target="_blank" class="welcome-icon">
								<?php _e("Detailed Features", cleanup_optimizer); ?>
							</a>
						</li>
					</ul>
				</div>
				<div class="welcome-panel-column welcome-panel-last" style="width:250px !important;">
					<h4 class="welcome-screen-margin"><?php _e("More Actions", cleanup_optimizer); ?></h4>
					<ul>
						<li>
							<a href="http://tech-banker.com/shop/plugin-customization/order-customization-wp-clean-optimizer/" target="_blank" class="welcome-icon">
								<?php _e("Plugin Customization", cleanup_optimizer); ?>
							</a>
						</li>
						<li>
							<a href="admin.php?page=cpo_recommendations" class="welcome-icon">
								<?php _e("Recommendations", cleanup_optimizer); ?>
							</a>
						</li>
						<li>
							<a href="admin.php?page=cpo_other_services" class="welcome-icon">
								<?php _e("Our Other Services", cleanup_optimizer); ?>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<?php 
	if(in_array($language, $cpo_lang))
	{
		?>
		<div class="custom-message red" style="display: block;margin-top:30px;width:963px;">
			<span style="padding: 4px 0;">
				<strong>
					<p style="font:12px/1.0em Arial !important;">If you would like to translate & help us, we will reward you with a free Pro Version License of WP Clean Up Optimizer worth 12£.</p>
					<p style="font:12px/1.0em Arial !important;">Contact Us at <a target="_blank" href="http://tech-banker.com">http://tech-banker.com</a> or email us at <a href="mailto:support@tech-banker.com">support@tech-banker.com</a></p>
				</strong>
			</span>
		</div>
	<?php
	}
	elseif(!(in_array($language, $cpo_translated_lang)) && !(in_array($language, $cpo_lang)) && $language != "")
	{
		?>
		<div class="custom-message red" style="display: block;margin-top:30px;width:963px;">
			<span style="padding: 4px 0;">
				<strong>
					<p style="font:12px/1.0em Arial !important;">If you would like to translate WP Clean Up Optimizer in your native language, we will reward you with a free Pro Version License of WP Clean Up Optimizer worth 12£.</p>
					<p style="font:12px/1.0em Arial !important;">Contact Us at <a target="_blank" href="http://tech-banker.com">http://tech-banker.com</a> or email us at <a href="mailto:support@tech-banker.com">support@tech-banker.com</a></p>
				</strong>
			</span>
		</div>
	<?php
	}
	?>
	<h2 class="nav-tab-wrapper" style="max-width: 1000px;">
		<a class="nav-tab coustom-nav-tab" id=cpo_dashboard href="admin.php?page=cpo_dashboard">
			<?php _e("Dashboard", cleanup_optimizer);?>
		</a>
		<a class="nav-tab coustom-nav-tab" id="cpo_login_logs" href="admin.php?page=cpo_login_logs">
			<?php _e("Login Logs", cleanup_optimizer);?>
		</a>
		<a class="nav-tab coustom-nav-tab" id="cpo_cron_jobs" href="admin.php?page=cpo_cron_jobs">
			<?php _e("Cron Jobs", cleanup_optimizer);?>
		</a>
		<a class="nav-tab coustom-nav-tab" id="cpo_general_settings" href="admin.php?page=cpo_general_settings">
			<?php _e("General Settings",cleanup_optimizer)?>
		</a>
		<a class="nav-tab coustom-nav-tab" id="cpo_premium_edition" href="admin.php?page=cpo_premium_edition">
			<?php _e("Premium Editions", cleanup_optimizer);?>
		</a>
		<a class="nav-tab coustom-nav-tab" id="cpo_recommendations" href="admin.php?page=cpo_recommendations">
			<?php _e("Recommendations",cleanup_optimizer)?>
		</a>
		<a class="nav-tab coustom-nav-tab" id="cpo_other_services" href="admin.php?page=cpo_other_services">
			<?php _e("Our Other Services",cleanup_optimizer)?>
		</a>
	</h2>
	<?php
	if($_REQUEST["page"] != "cpo_feedback")
	{
		?>
		<div class="custom-message green" style="display: block;margin-top:30px;max-width:965px;">
			<div style="padding: 4px 0;">
				<p style="font:12px/1.0em Arial !important;font-weight:bold;">If you don't find any features you were looking for in this Plugin, 
					please write us <a target="_self" href="admin.php?page=cpo_feedback">here</a> and we shall try to implement this for you as soon as possible! We are looking forward for your valuable <a target="_self" href="admin.php?page=cpo_feedback">Feedback</a></p>
			</div>
		</div>
		<?php
	}
	?>
	<script>
	jQuery(document).ready(function()
	{
		jQuery(".nav-tab-wrapper > a#<?php echo $_REQUEST["page"];?>").addClass("nav-tab-active");
	});
	</script>
<?php 
}
?>