<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
 
// THUMBNAIL SIZES
// add_image_size( 'home',  2500, 9999 ); // HOME IMAGE

// FUNCTIONS
$func_includes = [
	'navwalker/wp_bootstrap_navwalker.php',
	// 'widgets/widget-contact.php',
	//'widgets/widget-email-sign-up.php',
	//'widgets/widget-featured-posts.php',
];

foreach ($func_includes as &$path) {
	include( get_template_directory() . '/lib/_functions/' . $path );
}

$sage_includes = [
  'lib/utils.php',                 // Utility functions
  'lib/init.php',                  // Initial theme setup and constants
  'lib/wrapper.php',               // Theme wrapper class
  'lib/conditional-tag-check.php', // ConditionalTagCheck class
  'lib/config.php',                // Configuration
  'lib/assets.php',                // Scripts and stylesheets
  'lib/titles.php',                // Page titles
  'lib/extras.php',                // Custom functions
];

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);