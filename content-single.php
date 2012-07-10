<?php
/*
 * The content template for a single post
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

		<div class="entry-meta">

			<span class="entry-date">
				<abbr class="published" title="<?php the_time( 'Y-m-d\TH:i:sO' ); ?>">
					<?php the_time( get_option( 'date_format') ); ?>
				</abbr>
			</span>

		</div><!-- .entry-meta -->

	</header><!-- .entry-header -->

	<div class="entry-content">

		<?php the_content( __( 'Continue reading <span class="meta-nav">&raquo;</span>', 'inception' ) ); ?>
		<?php wp_link_pages( 'before=<div class="page-link">' . __( 'Pages:', 'inception' ) . '&after=</div>' ); ?>
	
	</div><!-- .entry-content -->

	<footer class="entry-meta">

		<div class="entry-utility">
			
			<span class="cat-links">
				<span class="entry-utility-prep entry-utility-prep-cat-links">
					<?php __( 'Posted in ', 'inception' ); ?>
				</span>
				<?php echo get_the_category_list( ', ' ); ?>
			</span>
			
			<span class="meta-sep"> | </span>
			
			<?php the_tags( '<span class="tag-links"><span class="entry-utility-prep entry-utility-prep-tag-links">' . __( 'Tagged ', 'inception' ) . '</span>', ", ", "</span>\n\t\t\t\t\t\t<span class=\"meta-sep\">|</span>\n" ); ?>
			
			<span class="comments-link">
				<?php comments_popup_link( __( 'Leave a comment', 'inception' ), __( '1 Comment', 'inception' ), __( '% Comments', 'inception' ) ); ?>
			</span>
			
			<?php edit_post_link( __( 'Edit', 'inception' ), "<span class=\"meta-sep\"> | </span><span class=\"edit-link\">", "</span>" ); ?>
			
		</div><!-- #entry-utility -->
	
	</footer><!-- .entry-meta -->

</article><!-- #post-<?php the_ID(); ?> -->