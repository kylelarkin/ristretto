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
	// Enqueue Scripts
	wp_enqueue_script('ristretto-app');

	// Register Styles
	wp_register_style( 'fontawesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css', array(), null, 'all' );
	wp_register_style( 'ristretto-screen', get_bloginfo( 'stylesheet_directory' ) . '/css/screen.css', array(), null, 'all' );
	// Enqueue Styles
	wp_enqueue_style('fontawesome');
	wp_enqueue_style('ristretto-screen');
}
add_action('wp_enqueue_scripts', 'ristretto_enqueue_init', 15);

/**
 * TypeKit Fonts (from: http://wptheming.com/2013/02/typekit-code-snippet/)
 */
function theme_typekit() {
    wp_enqueue_script( 'theme_typekit', '//use.typekit.net/xxxxxxx.js');
}
add_action( 'wp_enqueue_scripts', 'theme_typekit' );

function theme_typekit_inline() {
  if ( wp_script_is( 'theme_typekit', 'done' ) ) { ?>
  	<script>try{Typekit.load({ async: true });}catch(e){}</script>
<?php }
}
add_action( 'wp_head', 'theme_typekit_inline' );

/**
 * Custom Gravity Forms Submission Spinner
 * From: https://mattrad.uk/gravity-forms-css-spinner/
 */
 function gf_spinner_replace( $image_src, $form ) {
 	return  'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7'; // relative to you theme images folder
 }
 add_filter( 'gform_ajax_spinner_url', 'gf_spinner_replace', 10, 2 );