<?php
/*
 * The page file for displaying page contents
 * 
 * @package WordPress
 * @subpackage Inception
 */
?>

<?php get_header(); ?>

<section id="content">
		
		<section id="main" role="main">
			
			<?php //Get the post
			the_post(); ?>
			
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<h1 class="entry-title">
							<?php the_title(); ?>
						</h1>
					</header><!-- .entry-header -->
					<div class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages('before=<div class="page-link">' . __('Pages:', 'inception') . '&after=</div>'); ?>
						<?php edit_post_link(__( 'Edit', 'inception'), '<span class="edit-link">', '</span>'); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-<?php the_ID(); ?> -->

		</section><!-- #main -->
		
		<?php get_sidebar(); //Load the sidebar ?>
	
</section><!-- #content -->

<?php get_footer(); //Load the footer ?>