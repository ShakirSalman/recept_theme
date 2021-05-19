<?php

// Define path and URL to the ACF plugin.
define('BOOTSTRAP_ACF_PATH', get_stylesheet_directory() . '/inc/acf-pro/');
define('BOOTSTRAP_ACF_URL', get_stylesheet_directory_uri() . '/inc/acf-pro/');

// Include the ACF plugin.
include_once(BOOTSTRAP_ACF_PATH . 'acf.php');

// Customize the url setting to fix incorrect asset URLs.
add_filter('acf/settings/url', 'bootstrap_acf_settings_url');
function bootstrap_acf_settings_url($url) {
	return BOOTSTRAP_ACF_URL;
}

// (Optional) Hide the ACF admin menu item (false = hide menu, true = show menu)
// add_filter('acf/settings/show_admin', 'bootstrap_acf_settings_show_admin');
function bootstrap_acf_settings_show_admin($show_admin) {
	return false;  // don't show admin menu item
}
