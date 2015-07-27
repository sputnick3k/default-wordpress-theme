<?php // mu-plugins/load.php

// FUNCTIONS
$plugins_includes = array(
	'acf-repeater/acf-repeater.php',
	'advanced-custom-fields/acf.php'
);

foreach ($plugins_includes as &$path) {
	require WPMU_PLUGIN_DIR.'/'.$path;
}