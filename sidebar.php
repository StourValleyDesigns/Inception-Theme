<?php
/*
 * The file for displaying the sidebar
 * 
 * @package WordPress
 * @subpackage Inception
 */
?>

<aside id="sidebar" role="complementary">
	<?php //Check to see if we have active primary widget
	if(is_sidebar_active('primary_widget_area')) : ?>
	
		<div id="primary" class="widget-area">
			<ul class="xoxo">
				<?php dynamic_sidebar('primary_widget_area'); ?>
			</ul>
		</div><!-- #primary -->
	
	<?php //End the primary widget if
	endif; ?>
	
	<?php //Check to see if we have active secondary widget
	if(is_sidebar_active('secondary_widget_area')) : ?>
	
		<div id="secondary" class="widget-area">
			<ul class="xoxo">
				<?php dynamic_sidebar('secondary_widget_area'); ?>
			</ul>
		</div><!-- #secondary -->
	
	<?php //End the secondary widget if
	endif; ?>
</aside>