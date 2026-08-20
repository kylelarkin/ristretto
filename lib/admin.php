<?php

/**
 * Add custom logo to Wordpress Login page(s). Logo should be no bigger than 323 pixels wide by 67 pixels high
 */
function ristretto_login_logo() {
  wp_register_style( 'login-style', get_bloginfo( 'stylesheet_directory' ) . '/css/login.css', array(), null, 'all' );
  wp_enqueue_style('login-style');
}
add_action( 'login_enqueue_scripts', 'ristretto_login_logo' );

/**
 * Allow SVG files to be uploaded to media library
 */
function cc_mime_types( $mimes ){
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );

/**
 * Change Login Logo to point to Home Page
 */
function ristretto_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'ristretto_login_logo_url' );

/**
 * Show Admin Bar only for Admins and Editors
 */
if (!current_user_can('edit_posts')) {
   add_filter('show_admin_bar', '__return_false');
}

/**
 * Remove default core block patterns
 */
add_action( 'init', function() {
  if ( ! function_exists( 'unregister_block_pattern' ) || ! class_exists( 'WP_Block_Patterns_Registry' ) ) {
    return;
  }

  $registry = WP_Block_Patterns_Registry::get_instance();
  $patterns = $registry->get_all_registered();

  foreach ( $patterns as $pattern_name => $pattern ) {
    // Core patterns are namespaced "core/*"
    if ( str_starts_with( $pattern_name, 'core/' ) ) {
      unregister_block_pattern( $pattern_name );
    }
  }
}, 100 );