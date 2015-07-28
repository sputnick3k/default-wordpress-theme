<?php // mu-plugins/load.php

// FUNCTIONS
$plugins_includes = [
	'acf-repeater/acf-repeater.php',
	'advanced-custom-fields/acf.php',
	'wordfence/wordfence.php'
];

foreach ($plugins_includes as &$path) {
	require WPMU_PLUGIN_DIR.'/'.$path;
}