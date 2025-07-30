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
 
 // Add Data Attribute for FontAwesome Pseudo Elements
 function add_data_attribute($tag, $handle) {
   if ( 'fontawesome' !== $handle )
    return $tag;
   return str_replace( ' src', ' data-search-pseudo-elements defer src', $tag );
 }
 add_filter('script_loader_tag', 'add_data_attribute', 10, 2);
 
 /**
   * Move Yoast Panel to Bottom of Editor
  */
 function move_yoast_to_bottom() {
     return 'low';
 }
 add_filter( 'wpseo_metabox_prio', 'move_yoast_to_bottom');
 
/** 
 * remove Imagify from toolbar 
 */
add_filter( 'pre_get_imagify_option_admin_bar_menu', '__return_false' );