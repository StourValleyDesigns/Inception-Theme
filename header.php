<?php
/*
 * The header file for the theme
 * 
 * @package WordPress
 * @subpackage Inception
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<!-- Meta-Data -->
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="author" content="Adam Chamberlin">
		<meta name="description" content="SharePoint">
		<meta name="viewport" content="maximum-scale=1.0, width=device-width, initial-scale=1">
		
		<!-- Title -->
		<title><?php 
			if(is_single()) { single_post_title(); }
			elseif(is_home() || is_front_page()) { bloginfo('name'); print ' | '; bloginfo('description'); get_page_number(); }
			elseif(is_page()) { single_post_title(''); }
			elseif(is_search()) { bloginfo('name'); print ' | Search results for ' . wp_specialchars($s); get_page_number(); }
			elseif(is_404()) { bloginfo('name'); print ' | Not Found'; }
			else { bloginfo('name'); wp_title('|'); get_page_number(); }
		?></title>
		
		<!-- Links -->
		<link rel="stylesheet" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		
		<!-- JS -->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
		<!--[if lt IE 9]> <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script> <![endif]-->
		
		<?php if(is_singular()) wp_enqueue_script('comment_reply'); ?>
		
		<?php wp_head(); //Include the WordPress header hook ?>
		
	</head>
	
	<body <?php body_class(); ?>>
		
		<div id="wrapper" class="hfeed">
			
			<header id="header">
				<div class="inner">
					<h1>
						<a href="<?php echo home_url('/'); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
							<?php bloginfo('name'); ?>
						</a>
					</h1>	
				</div><!-- .inner -->
			</header><!-- #header -->