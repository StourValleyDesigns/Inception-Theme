<?php
/*
 * The functions file for the theme
 * 
 * @package WordPress
 * @subpackage Inception
 */

/*
 * Define some file path constants
 */
define('TEMPLATE_PATH', get_bloginfo('stylesheet_directory'));
define('CSS_PATH', TEMPLATE_PATH . "/css");
define('IMAGES_PATH', TEMPLATE_PATH . "/images");
define('JS_PATH', TEMPLATE_PATH . "/js");

/*
 * Get the page number
 */
function get_page_number() {
	if(get_query_var('paged')) {
		print ' | ' . __('Page ', 'inception') . get_query_var('paged');
	}
}

add_filter('body_class', 'add_slug_to_body_class');
function add_slug_to_body_class($classes) {
  global $post;
  $classes[] = $post->post_name;
  return $classes;
}