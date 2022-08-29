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
  wp_register_script( 'fontawesome', get_bloginfo( 'stylesheet_directory' ) . '/js/dist/all.min.js', null, null, true );
  wp_register_script( 'aos', get_bloginfo( 'stylesheet_directory' ) . '/node_modules/aos/dist/aos.js', null, null, true );
  wp_register_script( 'object-fit-images', get_bloginfo( 'stylesheet_directory' ) . '/js/dist/ofi.min.js', null, null, true );
  wp_register_script( 'jarallax', get_bloginfo( 'stylesheet_directory' ) . '/node_modules/jarallax/dist/jarallax.min.js', array('jquery'), null, true );
  wp_register_script( 'tiny-slider', get_bloginfo( 'stylesheet_directory' ) . '/node_modules/tiny-slider/dist/min/tiny-slider.js', null, null, true );
  wp_register_script( 'lity', get_bloginfo( 'stylesheet_directory' ) . '/node_modules/lity/dist/lity.min.js', array('jquery'), null, true );
  wp_register_script( 'ristretto-app', get_bloginfo( 'stylesheet_directory' ) . '/js/dist/app.js', array('jquery'), null, true );
  // Enqueue Scripts
  wp_enqueue_script('fontawesome');
  wp_enqueue_script('aos');
  wp_enqueue_script('object-fit-images');
  wp_enqueue_script('jarallax');
  wp_enqueue_script('tiny-slider');
  wp_enqueue_script('lity');
   wp_enqueue_script('ristretto-app');

  // Register Styles
  wp_register_style( 'typekit', '//use.typekit.net/cgn2aav.css', array(), null, 'all' );
  wp_register_style( 'lity-css', get_bloginfo( 'stylesheet_directory' ) . '/node_modules/lity/dist/lity.min.css', array(), null, 'all' );
  wp_register_style( 'tiny-slider-css', get_bloginfo( 'stylesheet_directory' ) . '/node_modules/tiny-slider/dist/tiny-slider.css', array(), null, 'all' );
  wp_register_style( 'aos-styles', get_bloginfo( 'stylesheet_directory' ) . '/node_modules/aos/dist/aos.css', array(), null, 'all' );
  wp_register_style( 'ristretto-screen', get_bloginfo( 'stylesheet_directory' ) . '/css/screen.css', array(), '1.0.1', 'all' );
  // Enqueue Styles
  wp_enqueue_style('typekit');
  wp_enqueue_style('lity-css');
  wp_enqueue_style('tiny-slider-css');
  wp_enqueue_style('aos-styles');
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
