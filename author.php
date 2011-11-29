<?php
/*
 * The archive file for the theme
 * 
 * @package WordPress
 * @subpackage Inception
 */
?>

<?php get_header(); //Load the header ?>

<section id="content">
		
		<section id="main" role="main">
			
			<?php //Get the post
			the_post(); ?>
			
			<header class="page-header">
				<h1 class="page-title author">
					<?php printf( __( 'Author Archives: <span class="vcard">%s</span>', 'inception' ), "<a class='url fn n' href='$authordata->user_url' title='$authordata->display_name' rel='me'>$authordata->display_name</a>" ) ?>
				</h1>
				<?php $authordesc = $authordata->user_description; if ( !empty($authordesc) ) echo apply_filters( 'archive_meta', '<div class="archive-meta">' . $authordesc . '</div>' ); ?>
			</header><!-- .page-header -->
			
			<?php //Rewind the posts
			rewind_posts(); ?>
			
			<?php //Query to check page count
			global $wp_query; $total_pages = $wp_query->max_num_pages; if($total_pages > 1) { ?>
			
				<nav id="nav-above" class="navigation">
					<div class="nav-previous">
						<?php next_posts_link(__('<span class="meta-nav">&laquo;</span> Older posts', 'inception')); ?>
					</div><!-- .nav-previous -->
					<div class="nav-next">
						<?php previous_posts_link(__('Newer posts <span class="meta-nav">&raquo;</span>', 'incpetion')); ?>
					</div>
				</nav><!-- #nav-above -->
			
			<?php //End query
			} ?>
			
			<?php //While have posts
			while(have_posts()) : the_post() ?>
				
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					
					<header class="entry-header">
						<h2 class="entry-title">
							<a href="<?php the_permalink(); ?>" title="<?php printf(__('Permalink to %s', 'inception'), the_title_attribute("echo=0")); ?>" rel="bookmark">
								<?php the_title(); ?>
							</a>
						</h2>
						<div class="entry-meta">
							<span class="meta-prep meta-prep-author">
								<?php _e('By', 'inception'); ?>
							</span>
							<span class="author vcard">
								<a class="url fn n" href="<?php echo get_author_link(false, $authordata->ID, $authordata->user_nicename); ?>" title="<?php printf(__('View all posts by %s', 'inception'), $authordata->display_name); ?>">
									<?php the_author(); ?>
								</a>
							</span>
							<span class="meta-sep"> | </span>
							<span class="meta-prep neta-prep-entry-date">
								<?php _e('Published ', 'inception'); ?>
							</span>
							<span class="entry-date">
								<abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO'); ?>">
									<?php the_time(get_option('date_format')); ?>
								</abbr>
							</span>
							<?php edit_post_link(__('Edit', 'inception'), "<span class=\"meta-sep\"> | </span> <span class=\"edit-link\">", "</span>"); ?>
						</div><!-- .entry-meta -->
					</header><!-- .entry-header -->
				
					<div class="entry-summary">
						<?php the_excerpt(__('Continue reading <span class="meta-nav">&raquo;</span>', 'inception')); ?>
					</div><!-- .entry-summary -->
					
					<footer class="entry-meta">
						<div class="entry-utility">
							<span class="cat-links">
								<span class="entry-utility-prep entry-utility-prep-cat-links">
									<?php _e('Posted in', 'inception'); ?>
								</span>
								<?php echo get_the_category_list(', '); ?>
							</span>
							<span class="meta-sep"> | </span>
							<?php the_tags('<span class="tag-links"><span class="entry-utility-prep entry-utility-prep-tag-links">' . __('Tagged ', 'inception') . '</span>', ", ", "</span> <span class=\"meta-sep\"> | </span"); ?>
							<span class="comments-link">
								<?php comments_popup_link(__('Leave a comment', 'inception'), __('1 comment', 'inception'). __('% comments', 'inception')); ?>
							</span>
							<?php edit_post_link(__('Edit', 'inception'), "<span class=\"meta-sep\"> | <span> <span class=\"edit-link\">", "</span>"); ?>
						</div><!-- .entry-utility -->
					</footer><!-- .entry-meta -->
					
				</article><!-- #post-<?php the_id(); ?> -->
				
			<?php //End while
			endwhile; ?>
			
			<?php //Query to check page count
			global $wp_query; $total_pages = $wp_query->max_num_pages; if($total_pages > 1) { ?>
			
				<nav id="nav-below" class="navigation">
					<div class="nav-previous">
						<?php next_posts_link(__('<span class="meta-nav">&laquo;</span> Older posts', 'inception')); ?>
					</div><!-- .nav-previous -->
					<div class="nav-next">
						<?php previous_posts_link(__('Newer posts <span class="meta-nav">&raquo;</span>', 'incpetion')); ?>
					</div><!-- .nav-next -->
				</nav><!-- #nav-below -->
			
			<?php //End query
			} ?>
			
		</section><!-- #main -->
		
		<?php get_sidebar(); //Load the sidebar ?>
	
</section><!-- #content -->

<?php get_footer(); //Load the footer ?>