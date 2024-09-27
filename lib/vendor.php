<?php
/**
 * Add ACF Google Maps API Key
 */
function my_acf_init() { 
  acf_update_setting('google_api_key', '');
}
//add_action('acf/init', 'my_acf_init');

/** 
 * Removes Events from WP Admin Bar  
 */
define('TRIBE_DISABLE_TOOLBAR_ITEMS', true);

/**
 * Custom Gravity Forms Submission Spinner
 * From: https://mattrad.uk/gravity-forms-css-spinner/
 */
 // function gf_spinner_replace( $image_src, $form ) {
 //   return  'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7'; // relative to you theme images folder
 // }
 // add_filter( 'gform_ajax_spinner_url', 'gf_spinner_replace', 10, 2 );
 
 /**
  * Disable Ultimate Blocks Template Button
 */
 //add_filter( 'ast_block_templates_disable', '__return_true' );
 
 // Add Data Attribute for FontAwesome Pseudo Elements
 function add_data_attribute($tag, $handle) {
   if ( 'fontawesome' !== $handle )
    return $tag;
   return str_replace( ' src', ' data-search-pseudo-elements defer src', $tag );
 }
 add_filter('script_loader_tag', 'add_data_attribute', 10, 2);