<?php
/*
 * The category template
 * 
 * @package Inception
 * @author Adam Chamberlin
 * @since 1.0
 * 
 */
?>

<?php get_header(); // Load the header ?>

<section id="content">

	<section id="main" role="main">

		<?php if ( have_posts() ) : // If we have posts ?>

			<header class="page-header">

				<h1 class="page-title">
					<?php _e('Category Archives:', 'inception'); ?> <span><?php single_cat_title(); ?></span>
				</h1><!-- .page-title -->

			</header><!-- .page-header -->

			<?php while ( have_posts() ) : the_post(); // Start The Loop ?>

				<?php get_template_part( 'content', get_post_format() ); // Load the main content template, can override with post types ?>

			<?php endwhile; // End The Loop ?>

		<?php else : // Else if we do not have any posts ?>

			<p>There are no posts</p>

		<?php endif; // End the check for posts ?>

	</section><!-- #main -->

	<?php get_sidebar(); // Load the sidebar ?>

</section><!-- #content -->


<?php get_footer(); // Load the footer ?>