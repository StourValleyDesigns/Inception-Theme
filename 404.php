<?php
/*
 * The 404 page!
 * 
 * @package WordPress
 * @subpackage Inception
 */
?>

<section id="content">
		
		<section id="main" role="main">

			<div id="post-0" class="post error404 not-found">
				<h1 class="entry-title">
					<?php -e('Not Found', 'inception'); ?>
				</h1>
				<div class="entry-content">
					<p>
						<?php _e('Apologies, but we were unable to find what you were looking for. Perhaps searching will help.', 'inception'); ?>
					</p>
					<?php get_search_form(); ?>
				</div>
			</div><!-- #post-0 -->

		</section><!-- #main -->
		
		<?php get_sidebar(); //Load the sidebar ?>
	
</section><!-- #content -->

<?php get_footer(); //Load the footer ?>