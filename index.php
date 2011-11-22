<?php
/*
 * The main index file for the theme
 * 
 * @package WordPress
 * @subpackage Inception
 */
?>

<?php get_header(); //Load the header ?>

<section id="main">
	
	<div class="inner">
		
		<section id="content">
			
			<?php //Navigation ?>
			<?php global $wp_query; $total_pages = $wp_query->max_num_pages; if($total_pages > 1) { ?>
				<div id="nav-above" class="navigation">
					<div class="nav-previous">
						<?php next_posts_link(__('<span class="meta-nav">&laquo;</span> Older posts', 'inception')); ?>
					</div>
					<div class="nav-next">
						<?php previous_posts_link(__('Newer posts <span class="meta-nav">&raquo;</span>', 'inception')); ?>
					</div>
				</div>
			<?php } ?>
			
			<?php //While we have posts
			while(have_posts()) : the_post() ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h2 class="entry-title">
						<a href="<?php the_permalink(); ?>" title="<?php printf(__('Permalink to %s', 'inception'), the_title_attribute('echo=0')); ?>" rel="bookmark">
							<?php the_title(); ?>
						</a>
					</h2>
					<div class="entry-meta">
						<span class="meta-prep meta-prep-author">
							<?php _e('By ', 'inception'); ?>
						</span>
						<span class="author vcard">
							<a class="url fn n" href="<?php echo get_author_link(false, $authordata->ID, $authordata->user_nicename); ?>" title="<?php printf(__('View all posts by %s', 'inception'), $authordata->display_name); ?>">
								<?php the_author(); ?>
							</a>
						</span>
						<span class="meta-sep"> | </span>
						<span class="meta-prep meta-prep-entry-date">
							<?php _e('Published ', 'inception'); ?>
						</span>
						<span class="entry-date">
							<abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO'); ?>">
								<?php the_time(get_option( 'date_format')); ?>
							</abbr>
						</span>
							<?php edit_post_link(__('Edit', 'inception'), "<span class=\"meta-sep\"> | </span><span class=\"edit-link\">", "</span>" ) ?>
					</div><!-- .entry-meta -->
					<div class="entry-content">
						<?php the_content(__('Continue reading <span class="meta-nav">&raquo;</span>', 'inception')); ?>
						<?php wp_link_pages('before=<div class="page-link">' . __('Pages:', 'inception') . '&after=</div>'); ?>
					</div><!-- .entry-content -->
					<div class="entry-utility">
						<span class="cat-links">
							<span class="entry-utility-prep entry-utility-prep-cat-links">
								<?php _e('Posted in ', 'inception'); ?>
							</span>
							<?php echo get_the_category_list(', '); ?>
						</span>
						<span class="meta-sep"> | </span>
						<?php the_tags('<span class="tag-links"><span class="entry-utility-prep entry-utility-prep-tag-links">' . __('Tagged ', 'inception' ) . '</span>', ", ", "</span>\n\t\t\t\t\t\t<span class=\"meta-sep\">|</span>\n"); ?>
                        <span class="comments-link">
                        	<?php comments_popup_link( __('Leave a comment', 'inception' ), __('1 Comment', 'inception'), __('% Comments', 'inception')); ?>
                        </span>
                        <?php edit_post_link( __('Edit', 'inception'), "<span class=\"meta-sep\"> | </span><span class=\"edit-link\">", "</span>"); ?>
                    </div><!-- #entry-utility -->
				</article><!-- #post-<?php the_ID(); ?> -->
			<?php //End while
			endwhile; ?>
			
			<?php //Navigation ?>
			<?php global $wp_query; $total_pages = $wp_query->max_num_pages; if($total_pages > 1) { ?>
				<div id="nav-below" class="navigation">
					<div class="nav-previous">
						<?php next_posts_link(__('<span class="meta-nav">&laquo;</span> Older posts', 'inception')); ?>
					</div>
					<div class="nav-next">
						<?php previous_posts_link(__('Newer posts <span class="meta-nav">&raquo;</span>', 'inception')); ?>
					</div>
				</div>
			<?php } ?>
			
		</section><!-- #content -->
		
		<?php get_sidebar(); //Load the sidebar ?>
		
	</div><!-- .inner -->
	
</section><!-- #main -->

<?php get_footer(); //Load the footer ?>