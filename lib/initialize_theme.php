<?php
/**
 * Add custom navigation to theme and adds Primary Navigation menu
 */
function ristretto_menus_init() {
	$header_menu = 'Primary Header Menu';
	$secondary_menu = 'Secondary Header Menu';
	$footer_menu = 'Primary Footer Menu';
	$ysi_menu = 'YSI Menu';

	register_nav_menus(array(
		'primary-header-menu' => __( $header_menu ),
		'secondary-header-menu' => __( $secondary_menu ),
		'primary-footer-menu' => __( $footer_menu ),
		'ysi-menu' => __( $ysi_menu )
	));
}
add_action( 'init', 'ristretto_menus_init' );

/**
 * Prepare menus for first use
 */
function ristretto_menus_to_locations() {
	$header_menu = 'Primary Header Menu';
	$secondary_menu = 'Secondary Header Menu';
	$footer_menu = 'Primary Footer Menu';
	$header_menu_location = 'primary-header-menu-location';
	$secondary_menu_location = 'secondary-header-menu-location';
	$footer_menu_location = 'primary-footer-menu-location';

	if( !has_nav_menu( $header_menu_location ) ){
		// Does the menu exist already?
		$header_menu_exists = wp_get_nav_menu_object( $header_menu );
		$secondary_menu_exists = wp_get_nav_menu_object( $secondary_menu );
		$footer_menu_exists = wp_get_nav_menu_object( $footer_menu );
		$ysi_menu_exists = wp_get_nav_menu_object( $ysi_menu );

		// If it doesn't exist, let's create it.
		if( !$header_menu_exists ){
			$new_header_menu_id = wp_create_nav_menu( $header_menu );
		}
		if( !$secondary_menu_exists ){
			$new_secondary_menu_id = wp_create_nav_menu( $secondary_menu );
		}
		if( !$footer_menu_exists ){
			$new_footer_menu_id = wp_create_nav_menu( $footer_menu );
		}
		if( !$ysi_menu_exists ){
			$new_ysi_menu_id = wp_create_nav_menu( $ysi_menu );
		}

		// Grab all theme locations and assign our newly-created menu
		// to it's related menu location
		$locations = get_theme_mod('nav_menu_locations');
		$locations[$header_menu_location] = $header_menu_exists ? $header_menu_exists->term_id : $new_header_menu_id;
		$locations[$secondary_menu_location] = $secondary_menu_exists ? $secondary_menu_exists->term_id : $new_secondary_menu_id;
		$locations[$footer_menu_location] = $footer_menu_exists ? $footer_menu_exists->term_id : $new_footer_menu_id;

		set_theme_mod( 'nav_menu_locations', $locations );
	}
}

/**
 * Setup to run once upon theme activation
 */
function ristretto_run_options_once() {
	$check = get_option('ristretto_activation_check');
	if ( $check != "set" ) {

		// initial menu location assignment
		ristretto_menus_to_locations();

		// set permalinks
		global $wp_rewrite;
		$wp_rewrite->set_permalink_structure( '/%postname%/' );
		$wp_rewrite->flush_rules();

		// Add marker so it doesn't run in future
		add_option('ristretto_activation_check', "set");
	}
}
add_action('init', 'ristretto_run_options_once');