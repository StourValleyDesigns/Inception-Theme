<?php
/*
 * The content template for a single page
 * 
 * @package Inception
 * @author Adam Chamberlin
 * @since 1.0
 * 
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">

		<h1 class="entry-title">
			<?php the_title(); ?>
		</h1><!-- .entry-title -->

	</header><!-- .entry-header -->

	<div class="entry-content">

		<?php the_content(__('Continue reading <span class="meta-nav">&raquo;</span>', 'inception')); ?>
		<?php wp_link_pages('before=<div class="page-link">' . __('Pages:', 'inception') . '&after=</div>'); ?>
	
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->