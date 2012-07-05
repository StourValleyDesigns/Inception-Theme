<?php
/*
 * The single page template
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

		<?php while ( have_posts() ) : the_post(); // Start The Loop?>

			<?php get_template_part( 'content', 'page' ); // Load the single page content template?>

		<?php endwhile; // End The Loop ?>

	</section><!-- #main -->

	<?php get_sidebar(); // Load the sidebar ?>

</section><!-- #content -->

<?php get_footer(); // Load the footer ?>