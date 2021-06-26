<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie10 lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie10 lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie10 lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9]>    <html class="lt-ie10" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 9]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	<?php if (!defined('ABSPATH')) exit; ?>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<title><?php wp_title('|'); ?> <?php bloginfo('name'); ?></title>

	<!--[if lte IE 9]>
		<script src="<?php bloginfo( 'template_directory' ); ?>/js/respond.min.js"></script>
	<![endif]-->

	<?php wp_head(); ?>

	<!--[if lte IE 9]>
		<link href="<?php bloginfo( 'stylesheet_directory' ); ?>/css/ie.css" media="screen, projection" rel="stylesheet" type="text/css" />
	<![endif]-->

	<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
	<?php include( locate_template('components/_favicon.php') ); ?>

</head>

<body <?php body_class(); ?>>
	<header class="body--header" role="banner">
		<div class="inner">
			<h6 class="logo"><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('title'); ?>"><?php bloginfo('title'); ?></a></h6>
			<nav class="nav--secondary" role="navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'secondary-header-menu', 'container' => false) ); ?>
			</nav>
				<div id="search-button"><span class="fas fa-search"></span></div>
			<!-- <div class="searchbar">
				<form method="get" class="searchform" id="searchform" action="<?php bloginfo('url'); ?>/" role="search">
					<input type="text" placeholder="Search" name="s" id="s" class="search-input"/>
					<input type="submit" id="searchsubmit" value="Search" />
					<div id="search-close" title="close search"><span class="fas fa-times"></span></div>
				</form>
			</div> -->
			<nav class="nav--primary" role="navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'primary-header-menu', 'container' => false) ); ?>
			</nav>
		</div>
	</header>
	<section class="body--wrapper" role="main">
