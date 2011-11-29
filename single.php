<?php
/*
 * The file for displaying a single post
 * 
 * @package WordPress
 * @subpackage Inception
 */
?>

<?php get_header(); //Load the header ?>

<section id="content">
		
		<section id="main" role="main">
			
			<?php the_post(); ?>
			
			<?php //Display the post ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
				<header class="entry-header">
					<h1 class="entry-title">
						<?php the_title(); ?>
					</h1>
				</header><!-- .entry-header -->
				
				<div class="entry-content">
					<?php the_content(); ?>
					<?php wp_link_pages('before=<div class="page-link">' . __('Pages: ', 'iception') . '&after=</div>'); ?>
				</div><!-- .entry-content -->
				
				<footer class="entry-meta">
					<div class="entry-utility">
						<?php printf(__('This entry was posted in %1$s%2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>. Follow any comments here with the <a href="%5$s" title="Comments RSS to %4$s" rel="alternate" type="application/rss+xml">RSS feed for this post</a>.', 'inception'),
							get_the_category_list(', '),
							get_the_tag_list(__(' and tagged ', 'inception'), ', ', '' ),
							get_permalink(),
							the_title_attribute('echo=0'),
							comments_rss()); ?>
						<?php if(('open' == $post->comment_status) && ('open' == $post->ping_status)) : // Comments and trackbacks open ?>
	                        <?php printf(__('<a class="comment-link" href="#respond" title="Post a comment">Post a comment</a> or leave a trackback: <a class="trackback-link" href="%s" title="Trackback URL for your post" rel="trackback">Trackback URL</a>.', 'inception'), get_trackback_url()); ?>
						<?php elseif(!('open' == $post->comment_status) && ('open' == $post->ping_status)) : // Only trackbacks open ?>
	                        <?php printf(__('Comments are closed, but you can leave a trackback: <a class="trackback-link" href="%s" title="Trackback URL for your post" rel="trackback">Trackback URL</a>.', 'inception'), get_trackback_url()); ?>
						<?php elseif(('open' == $post->comment_status) && !('open' == $post->ping_status)): // Only comments open ?>
	                        <?php _e('Trackbacks are closed, but you can <a class="comment-link" href="#respond" title="Post a comment">post a comment</a>.', 'inception'); ?>
						<?php elseif(!('open' == $post->comment_status) && !('open' == $post->ping_status)) : // Comments and trackbacks closed ?>
	                        <?php _e('Both comments and trackbacks are currently closed.', 'inception') ?>
						<?php endif; ?>
						<?php edit_post_link(__('Edit', 'inception' ), "<span class=\"edit-link\">", "</span>"); ?>
					</div><!-- .entry-utility -->
				</footer>

			</article><!-- #post-<?php the_ID(); ?> -->
			
			<?php comments_template('', true); //Load the comments ?>

		</section><!-- #main -->
		
		<?php get_sidebar(); //Load the sidebar ?>
	
</section><!-- #content -->

<?php get_footer(); //Load the footer ?>