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
	<title><?php wp_title('|'); ?></title>

	<?php wp_head(); ?>

	<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />

  <?php include( locate_template('components/_favicon.php') ); ?>

</head>

<body <?php body_class(); ?>>
	<a href="#main-content" class="visually-hidden" title="skip to main content">Skip to main content</a>

	<header class="is-layout-constrained has-global-padding body--header" role="banner">
		<div class="header-flex alignfull">
			<div class="logo-menu-wrapper">
				<h6 class="logo">
					<a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('title'); ?>">
						<?php 
							$logo = get_field('header_logo', 'options');
							$altlogo = get_field('footer_logo', 'options');
						if($logo):
							$header_logo = wp_get_attachment_image( $logo, 'large' );
							echo $header_logo;
							if($altlogo) {
								$alt_logo = wp_get_attachment_image( $altlogo, 'large' );
								echo $alt_logo;
							}
						?>
						
						<?php else:
							bloginfo('title'); ?>
						<?php endif; ?>
					</a>
				</h6>
				<?php include( locate_template('components/_menu-button.php') ); ?>
			</div>
			
			
			<nav class="nav--primary alignfull has-global-padding" role="navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'primary-header-menu', 'container' => false) ); ?>
				<a href="#0" class="search-toggle"><span class="fa-solid fa-search"></span></a>
				<?php include( locate_template('components/_search-form.php') ); ?>
			</nav>
		</div>
	</header>

	<section class="body--wrapper is-layout-constrained has-global-padding" role="main">
