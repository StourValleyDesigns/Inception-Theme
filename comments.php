<?php
/*
 * The comments template page
 * 
 * @package WordPress
 * @subpackage Inception
 */
?>

<section id="comments">
	
	<?php
	$reg = get_option('require_name_email');
	if('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die('Please do not load this page directly');
	if(!empty($post->post_password)) :
		if($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) : ?>
			<div class="nopassword">
				<?php _e('This post is password protected. Enter the password to view any comments', 'inception'); ?>
			</div><!-- .nopassword -->	
</section>
<?php
		return;
	endif;
endif;
?>

<?php if(have_comments()) : ?>

<?php
$ping_count