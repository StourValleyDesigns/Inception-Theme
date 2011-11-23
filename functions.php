<?php
/*
 * The functions file for the theme
 * 
 * @package WordPress
 * @subpackage Inception
 */

 /*
  * Define the default temppath and images path
  */
define('TEMP_PATH', get_bloginfo('stylesheet_directory'));
define('IMAGES', TEMP_PATH . "/img");
 
/*
 * Make the theme available for translation
 * Translations can be filled in the /languages/ directory
 */
load_theme_textdomain('inception', TEMP_PATH . '/languages');
$locale = get_locale();
$locale_file = TEMP_PATH . "/languages/$locale.php";
if(is_readable($locale_file)) {
	require_once($locale_file);
}

/*
 * Add theme support and functions
 */
add_theme_support('nav_menus');
add_action('init', 'theme_widgets_init');

/*
 * Get the page number
 */
function get_page_number() {
	if(get_query_var('paged')) {
		print ' | ' . __('Page ', 'inception') . get_query_var('paged');
	}
}

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
 * Custom callback to list comments
 */
function custom_comments($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	$GLOBALS['comment_depth'] = $depth;
	?>
	<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
		<div class="comment-author vcard">
			<?php commenter_link(); ?>
		</div><!-- .comment-author -->
		<div class="comment-meta">
			<?php printf(__('Posted %1$s at %2$s <span class="meta-sep"> | </span> <a href="%3$s" title="Permalink to this comment">Permalink</a>', 'inception'),
				get_comment_date(),
				get_comment_time(),
				'#comment-' . get_comment_ID());
				edit_comment_link(__('Edit', 'inception'), ' <span class="meta-sep"> | </span> <span class="edit-link">', '</span>'); ?>
		</div><!-- .comment-meta -->
		<?php if($comment->comment_approved == '0') _e("<span class\"unapproved\">Your comment is awaiting moderation.</span>\n", 'inception'); ?>
		<div class="comment-content">
			<?php comment_text(); ?>
		</div><!-- .comment-content -->
		<?php if($args['type'] == 'all' || get_comment_type() == 'comment') :
			comment_reply_link(array_merge($args, array(
				'reply_text' => __('Reply', 'inception'),
				'login_text' => __('Log in to reply', 'inception'),
				'depth' => $depth,
				'before' => '<div class="comment-reply-link">',
				'after' => '</div>'
			)));
		endif; ?>
	</li>
<?php }

/*
 * Custom callback to list pings
 */
function custom_pings($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	?>
	<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
		<div class="comment-author">
			<?php printf(__('By %1$s on %2$s at %3$s', 'inception'),
				get_comment_author_link(),
				get_comment_date(),
				get_comment_time() );
				edit_comment_link(__('Edit', 'inception'), '<span class="meta-sep"> | </span><span class="edit-link">', '</span>'); ?>
		</div><!-- .comment-author -->
		<?php if($comment->comment_approved == '0') _e("<span class=\"unapproved\">Your trackback is awaiting moderation.</span>\n", 'inception'); ?>
		<div class="comment-content">
			<?php comment_text(); ?>
		</div><!-- .comment-content -->
	</li>
<?php }

/*
 * Produces an avatar
 */
function commenter_link() {
	$commenter = get_comment_author_link();
	if(ereg('<a[^>]* class=[^>]+>', $commenter)) {
		$commenter = ereg_replace('(<a[^>]* class=[\'"]?)', '\\1url ', $commenter);
	} else {
		$commenter = ereg_replace('(<a )/', '\\1class="url "', $commenter);
	}
	$avatar_email = get_comment_author_email();
	$avatar = str_replace("class='avatar'", "class='photo avatar", get_avatar($avatar_email, 80));
	echo $avatar . '<span class="fn n"' . $commenter . '</span>';
}

/*
 * For category lists on category archives:
 */
function cats_meow($glue) {
	$current_cat = single_cat_title('', false);
	$separator = "\n";
	$cats = explode($separator, get_the_category_list($separator));
	foreach($cats as $i => $str) {
		if(strstr($str, ">$current_cat<")) {
			unset($cats[$i]);
			break;
		}
	}
	if(empty($cats)) {
		return false;
	}
	return trim(join($glue, $cats));
}

/*
 * For tag lists on tag archives
 */
function tag_ur_it($glue) {
	$current_tag = single_tag_title('', '', false);
	$separator = "\n";
	$tags = explode($separator, get_the_tag_list("", "$separator", ""));
	foreach($tags as $i => $str) {
		if(strstr($str, ">$current_tag<")) {
			unset($tags[$i]);
			break;
		}
	}
	if(empty($tags)) {
		return false;
	}
	return trim(join($glue, $tags));
}

/*
 * Register widgetised areas
 */
function theme_widgets_init() {
	register_sidebar(array(
		'name' => 'Primary Widget Area',
		'id' => 'primary_widget_area',
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	));
	register_sidebar(array(
		'name' => 'Secondary Widget Area',
		'id' => 'secondary_widget_area',
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	));
}

/*
 * Preset the widget areas to contain some stuff
 */
$preset_widgets = array(
	'primary_widget_area' => array('search', 'pages', 'categories', 'archives'),
	'secondary_widget_area' => array('links', 'meta')
);
if(isset($_GET['activated'])) {
	update_option('sidevars_widgets', $preset_widgets);
}

/*
 * Check for static widgets in widget-ready areas
 */
function is_sidebar_active() {
	global $wp_registered_sidebars;
	$widgetcolumns = wp_get_sidebars_widgets();
	if($widgetcolumns[$index]) {
		return true;
	}
	return false;
}