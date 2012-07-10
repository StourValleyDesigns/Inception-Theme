<?php
/*
 * The 404 template
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

		<article id="post-0" class="post error404 not-found">

			<header class="entry-header">

				<h1 class="entry-title">
					<?php __( 'Not Found', 'inception' ); ?>
				</h1>
			</header><!-- .entry-header -->

			<div class="entry-content">
				<p>
					<?php __( 'Apologies, but we were unable to find what you were looking for. Perhaps searching will help.', 'inception' ); ?>
				</p>
				<?php get_search_form(); ?>
			</div>
			
		</article><!-- #post-0 -->

	</section><!-- #main -->

	<?php get_sidebar(); // Load the sidebar ?>

</section><!-- #content -->

<?php get_footer(); // Load the footer ?>