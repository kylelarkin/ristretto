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
 	wp_register_script( 'fontawesome', get_bloginfo( 'stylesheet_directory' ) . '/js/dist/fontawesome-all.min.js', null, null, true );
 	wp_register_script( 'ristretto-app', get_bloginfo( 'stylesheet_directory' ) . '/js/dist/app.js', array('jquery'), null, true );
 	// Enqueue Scripts
 	wp_enqueue_script('fontawesome');
 	wp_enqueue_script('ristretto-app');

	// Register Styles
	wp_register_style( 'typekit', get_bloginfo( 'stylesheet_directory' ) . '//use.typekit.net/xxxxxx.css', array(), null, 'all' );
 	wp_register_style( 'ristretto-screen', get_bloginfo( 'stylesheet_directory' ) . '/css/screen.css', array(), null, 'all' );
	// Enqueue Styles
	wp_enqueue_style('typekit');
 	wp_enqueue_style('ristretto-screen');
 }
add_action('wp_enqueue_scripts', 'ristretto_enqueue_init', 15);

// Add Data Attribute for FontAwesome Pseudo Elements
function add_data_attribute($tag, $handle) {
	if ( 'fontawesome' !== $handle )
	 return $tag;
	return str_replace( ' src', ' data-search-pseudo-elements defer src', $tag );
}
add_filter('script_loader_tag', 'add_data_attribute', 10, 2);

/**
 * Add Support for Editor Styles
 */
add_theme_support('editor-styles');
add_editor_style( get_bloginfo( 'stylesheet_directory' ) . '/css/editor-style.css' );

function ristretto_enqueue_gutenberg() {
   // Enqueue Typekit for Editor.
   wp_register_style( 'ristretto-gutenberg-fonts', '//use.typekit.net/xxxxxx.css' );
   wp_enqueue_style( 'ristretto-gutenberg-fonts' );
}
add_action( 'enqueue_block_editor_assets', 'ristretto_enqueue_gutenberg' );

/**
 * Default Article Template
 */
// function ristretto_register_template() {

// 	$template = array(
// 		array( 'acf/subheading', array() ),
// 		array( 'acf/byline', array() ),
// 		array( 'acf/article-ad', array() ),
// 		array( 'acf/article-signup', array() ),
// 	);

//   $post_type_object = get_post_type_object( 'post' );
// 	$post_type_object->template = $template;
// }
// add_action( 'init', 'ristretto_register_template' );

/**
 * Custom Gravity Forms Submission Spinner
 * From: https://mattrad.uk/gravity-forms-css-spinner/
 */
 function gf_spinner_replace( $image_src, $form ) {
 	return  'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7'; // relative to you theme images folder
 }
 add_filter( 'gform_ajax_spinner_url', 'gf_spinner_replace', 10, 2 );

 /**
 * Add Wide Image Support for Gutenberg
 */
// function ristretto_wide_images() {
// 	add_theme_support( 'align-wide' );
// }
// add_action( 'after_setup_theme', 'ristretto_wide_images' );

/**
 * Disable Admin Bar for Subscribers
 */
function ristretto_hide_admin_bar() {
	if (!current_user_can('edit_posts')) {
		show_admin_bar(false);
  }
}
add_action('set_current_user', 'ristretto_hide_admin_bar');

/**
 * Prevent Subscribers from seeing dashboard
 */
function ristretto_subscriber_redirect(){
  if( is_admin() && !defined('DOING_AJAX') && current_user_can('subscriber') ){
    wp_redirect( home_url() . '/myaccount' );
    exit;
  }
}
add_action('init','ristretto_subscriber_redirect');

/**
 * Change Login Logo to point to Home Page
 */
function ristretto_login_logo_url() {
	return home_url();
}
add_filter( 'login_headerurl', 'ristretto_login_logo_url' );