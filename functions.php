<?php
/*
 * The functions file for the theme
 * 
 * @package WordPress
 * @subpackage Inception
 */

/*
 * Make the theme available for translation
 * Translations can be filled in the /languages/ directory
 */
load_theme_textdomain('inception', TEMPLATEPATH . '/languages');

$locale = get_locale();
$locale_file = TEMPLATEPATH . "/languages/$locale.php";
if(is_readable($locale_file)) {
	require_once($locale_file);
}

/*
 * Get the page number
 */
function get_page_number() {
	if(get_query_var('paged')) {
		print ' | ' . __('Page ', 'inception') . get_query_var('paged');
	}
}

/*
 * Add theme support and functions
 */
add_theme_support('nav_menus');


/*
 * Register Navigation Menus
 */
if(function_exists('register_nav_menus')) {
	register_nav_menus(
		array(
			'main' => 'Main Navigation',
			'footer' => 'Footer Navigation'
		)
	);
}

/*
 * Register Sidebars
 */
