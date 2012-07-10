<?php
/*
 * The header template
 * 
 * @package Inception
 * @author Adam Chamberlin
 * @since 1.0
 * 
 */
?>

<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	<!-- Meta-Data -->
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="author" content="Adam Chamberlin">
	<meta name="description" content="<?php bloginfo( 'description' ); ?>">
	<meta name="viewport" content="maximum-scale=1.0, width=device-width, initial-scale=1.0">
	
	<!-- Title -->
	<title><?php
		if( is_single() ) { single_post_title(); }
		elseif( is_home() || is_front_page()) { bloginfo( 'name' ); print ' | '; bloginfo( 'description' ); get_page_number(); }
		elseif(is_page()) { single_post_title(''); }
		elseif(is_search()) { bloginfo( 'name' ); print ' | Search results for ' . wp_specialchars($s); get_page_number(); }
		elseif(is_404()) { bloginfo( 'name' ); print ' | Not Found'; }
		else { bloginfo( 'name' ); wp_title('|'); get_page_number(); }
		?></title>

	<!-- Links, favicons and feeds -->
	<link rel="stylesheet" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="shortcut icon" href="<?php echo IMAGES_PATH; ?>/favicon.ico">
	<link rel="apple-touch-icon" href="<?php echo IMAGES_PATH; ?>/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo IMAGES_PATH; ?>/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo IMAGES_PATH; ?>/apple-touch-icon-114x114.png">

	<!-- IE Fix and hack -->
	<!-- [iflt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<link rel="stylesheet" href="<?php echo CSS_PATH; ?>/ie.css">
	<![endif]-->

	<?php wp_head(); // WordPress head hook ?>
</head>

<body <?php body_class(); ?>>

<div id="wrapper" class="hfeed">

	<header id="masthead" role="banner">

		<hgroup>
			<h1 class="site-title"><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		</hgroup>

		<nav id="main-navigation" role="navigation">
			<h1 class="assistive-text"><?php __( 'Menu', 'inception' ); ?></h1>
			<div class="skip-link">
				<a href="#content" title="<?php __( 'Skip to content', 'inception' ); ?>"><?php __( 'Skip to content', 'inception' ); ?></a>
			</div>
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav><!-- #access -->

	</header><!-- #header -->