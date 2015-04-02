<?php
/**
 * Include all partial php/helper files
 */
foreach (glob(dirname(__FILE__) . '/lib/' . '*.php') as $filename) {
	require( $filename );
}

/**
 * Enqueue Scripts and Styles
 */
function ristretto_enqueue_init() {
	// Register Scripts
	wp_register_script( 'ristretto-app', get_bloginfo( 'stylesheet_directory' ) . '/js/dist/app.js', array('jquery'), null, true );
	wp_register_script( 'fitvids', get_bloginfo( 'stylesheet_directory' ) . '/bower_components/FitVids/jquery.fitvids.js', array('jquery'), null, true );
	// Enqueue Scripts
	wp_enqueue_script('ristretto-app');
	wp_enqueue_script('fitvids');

	// Register Styles
	wp_register_style( 'ristretto-screen', get_bloginfo( 'stylesheet_directory' ) . '/css/screen.css', array(), null, 'all' );
	// Enqueue Styles
	wp_enqueue_style('ristretto-screen');
}
add_action('wp_enqueue_scripts', 'ristretto_enqueue_init', 15);

/**
 * Move Gravity Forms inline JS into footer after our JS is enqueue'd
 */
add_filter( 'gform_init_scripts_footer', '__return_true' );
function wrap_gform_cdata_open( $content = '' ) {
	$content = 'document.addEventListener( "DOMContentLoaded", function() { ';
	return $content;
}
add_filter( 'gform_cdata_open', 'wrap_gform_cdata_open' );
function wrap_gform_cdata_close( $content = '' ) {
	$content = ' }, false );';
	return $content;
}
add_filter( 'gform_cdata_close', 'wrap_gform_cdata_close' );