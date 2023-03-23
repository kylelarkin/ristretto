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

	<?php wp_head(); ?>

	<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
	
  <?php include( locate_template('components/_favicon.php') ); ?>

</head>

<body <?php body_class(); ?>>
	<a href="#main-content" class="visually-hidden" title="skip to main content">Skip to main content</a>

	<header class="body--header standard-grid" role="banner">		
		<h6 class="logo">
			<a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('title'); ?>">
				<?php $logo = get_theme_mod('ristretto_header_logo');
				if($logo): 
					$header_logo = wp_get_attachment_image( $logo, 'large' );
					echo $header_logo;
				?>
					
				<?php else:
					bloginfo('title'); ?>
				<?php endif; ?>
			</a>
		</h6>
		<nav class="nav--secondary" role="navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'secondary-header-menu', 'container' => false) ); ?>
		</nav>
		<div id="search-button"><a href="#0" title="Search the <?php bloginfo('title'); ?> website"><span class="fas fa-search"></span></a></div>
		<?php include( locate_template('components/_search-form.php') ); ?>
		<?php //include( locate_template('components/_menu-button.php') ); ?>
		<nav class="nav--primary" role="navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'primary-header-menu', 'container' => false) ); ?>
		</nav>
	</header>
  
	<section class="body--wrapper" role="main">
