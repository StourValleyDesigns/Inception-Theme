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
	<?php
}

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
	<?php
}

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