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
<?php
		return;
	endif;
endif;
?>

<?php //See if there are comments $comments
if(have_comments()) : ?>

	<?php //Count the number of comments and trackbacks
	$ping_count = $comment_count = 0;
	foreach($comments as $comment)
		get_comment_type() == "comment" ? ++$comment_count : ++$ping_count;
	?>
	
	<?php //If there are comments show them $comment_count
	if(!empty($comments_by_type['comment'])) : ?>
	
		<div id="comments-list" class="comments">
			<h3>
				<?php printf($comment_count > 1 ? __('<span>%d</span> Comments', 'inception') : __('<span>One</span> Comment', 'inception'), $comment_count); ?>
			</h3>
		
			<?php //If there are enough comments, show the comments
			$total_pages = get_comment_pages_count();
			if($total_pages > 1) : ?>
				
				<div id="comments-nav-above" class="comments-navigation">
					<div class="paginated-comments-links">
						<?php paginate_comments_links(); ?>
					</div><!-- .paginated-comments-links -->
				</div><!-- #comments-nav-above -->
			
			<?php endif; ?>
			
			<ol>
				<?php wp_list_comments('type=comment&callback=custom_comments'); ?>
			</ol>
	
		</div><!-- #comments-list -->
		
	<?php endif; //End $comment_count ?>
	
	<?php //If there are trackbacks show them $trackback_count
	if(!empty($comments_by_type['pings'])) : ?>
	
		<div id="trackbacks-list" class="comments">
			<h3>
				<?php printf($comment_count > 1 ? __('<span>%d</span> Trackbacks', 'inception') : __('<span>One</span> Trackback', 'inception'), $ping_count); ?>
			</h3>
			
			<ol>
				<?php wp_list_comments('type=pings&callback=custom_pings'); ?>
			</ol>
			
		</div><!-- #trackbacks-list -->
	
	<?php endif; //End  $trackback_count ?>
	
<?php endif; //End $comments ?>

<?php //If comments open display a form $form
if($post->comment_status == 'open') : ?>

	<div id="respond">
		<h3>
			<?php comment_form_title(__('Post a comment', 'inception'), __('Post a reply tp %s', 'inception')); ?>
		</h3>
		<div id="cancel-comment-reply">
			<?php cancel_comment_reply_link(); ?>
		</div><!-- #cancel-comment-reply -->
		
		<?php //If login required $comment_registration
		if(get_option('comment_registration') && !$user_ID) : ?>
			<p id="login-req">
				<?php printf(__('You must be <a href="%s" title="Log In">logged in to post a comment', 'inception'), get_option('siteurl') . '/wp-login.php?redirect_to=' . get_permalink()); ?>
			</p>
		<?php //Else display the form $comment_registration
		else : ?>
			<div class="formcontainer">
				
				<form id="commentform" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post">
					
					<?php //If the user is logged in $user_ID
					if($user_ID) : ?>
					
						<p id="login">
							<?php printf(__('<span class="loggedin">Logged in as <a href="%1$s" title="Logged in as %2$s">%2$s</a>.</span> <span class="logout"><a href="%3$s" title="Log out of this account">Log out?</a></span>', 'inception'),
							get_option('siteurl') . '/wp-admin/profile.php',
							wp_specialchars($user_identity, true),
							wp_logout_url(get_permalink())); ?>
						</p>
					
					<?php //Else unknown user $user_ID
					else : ?>
					
						<p id="comment-notes">
							<?php _e('Your email is <em>never</em> published nor shared.', 'inception'); ?>
							<?php if($req) _e('Required fields are marked <span class="required">*</span>', 'inception'); ?>
						</p>
						
						<div id="form-section-author" class="form-section">
							<div class="form-label">
								<label for="author">
									<?php _e('Name', 'inception'); ?>
								</label>
								<?php if($req) _e('<span class="required">*</span>', 'inception'); ?>
							</div><!-- .form-label -->
							<div class="form-input">
								<input id="author" name="author" type="text" value="<?php echo $comment_author; ?>" size="30" maxlength="20">
							</div><!-- .form-input -->
						</div><!-- #form-section-author -->
						
						<div id="form-section-email" class="form-section">
							<div class="form-label">
								<label for="email">
									<?php _e('Email', 'inception'); ?>
								</label>
								<?php if($req) _e('<span class="required">*</span>', 'inception'); ?>
							</div><!-- .form-label -->
							<div class="form-input">
								<input id="email" name="email" type="email" value="<?php echo $comment_author_email; ?>" size="30" maxlength="20">
							</div><!-- .form-input -->
						</div><!-- #form-section-email -->
						
						<div id="form-section-url" class="form-section">
							<div class="form-label">
								<label for="url">
									<?php _e('Website', 'inception'); ?>
								</label>
								<?php if($req) _e('<span class="required">*</span>', 'inception'); ?>
							</div><!-- .form-label -->
							<div class="form-input">
								<input id="url" name="url" type="url" value="<?php echo $comment_author_url; ?>" size="30" maxlength="20">
							</div><!-- .form-input -->
						</div><!-- #form-section-author -->
					
					<?php //End $user_ID
					endif; ?>
					
					<div id="form-section-comment" class="form-section">
						<div claass="form-label">
							<label for="comment">
								<?php _e('Comment', 'inception'); ?>
							</label>
						</div><!-- .form-label -->
						<div class="form-textarea">
							<textarea id="comment" name="comment" cols="45" rows="8"></textarea>
						</div><!-- .form-textarea -->
					</div><!-- #form-section-comment -->
					
					<div id="form-allowed-tags" class="form-section">
						<p>
							<span>
								<?php _e('You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes:', 'inception'); ?>
							</span>
							<code>
								<?php echo allowed_tags(); ?>
							</code>
						</p>
					</div><!-- #form-allowed-tags -->
					
					<?php do_action('comment_form', $post->ID); ?>
					
					<div class="form-submit">
						<input id="submit" name="submit" type="submit" value="<?php _e('Post Comment', 'inception'); ?>">
						<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>">
					</div><!-- .form-submit -->
					
					<?php comment_id_fields(); ?>
					
				</form>
			
			</div><!-- .formcontainer -->
		
		<?php //End $comment_registration
		endif; ?>	
			
	</div><!-- #respond -->

<?php endif; //End $form ?>
</section>
	