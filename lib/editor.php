<?php
/**
 * Editor styles — must run at after_setup_theme.
 */
function ristretto_editor_styles() {
  add_theme_support( 'editor-styles' );

  // Relative to theme root.
  add_editor_style( 'css/editor-style.css' );
}
add_action( 'after_setup_theme', 'ristretto_editor_styles' );

function ristretto_enqueue_gutenberg() {
  
  // Enqueue font styles for Editor.
  wp_register_style( 'ristretto-gutenberg-fonts', '//use.typekit.net/vbl0nii.css' );
  wp_enqueue_style( 'ristretto-gutenberg-fonts' );
  
  // Enqueue slider styles for Editor.
  // wp_register_style( 'tiny-slider-css', get_bloginfo( 'stylesheet_directory' ) . '/node_modules/tiny-slider/dist/tiny-slider.css', array(), null, 'all' );
  // wp_enqueue_style( 'tiny-slider-css' );

  // Enqueue slider scripts for Editor.
  // wp_register_script( 'editor-tiny-slider', get_bloginfo( 'stylesheet_directory' ) . '/node_modules/tiny-slider/dist/min/tiny-slider.js', null, null, true );
  // wp_enqueue_script('editor-tiny-slider');
  
}
add_action( 'enqueue_block_editor_assets', 'ristretto_enqueue_gutenberg' );

/* Add responsive embed support */
add_theme_support( 'responsive-embeds' );

/* Remove default block patterns */
remove_theme_support( 'core-block-patterns' );

/**
 * Add FontAwesome resource hints in the admin.
 */
function ristretto_resource_hints( $urls, $relation_type ) {
  if ( ! is_admin() ) {
    return $urls;
  }

  if ( 'preconnect' === $relation_type ) {
    $urls[] = array(
      'href'        => 'https://kit.fontawesome.com',
      'crossorigin' => 'anonymous',
    );
  }

  if ( 'dns-prefetch' === $relation_type ) {
    $urls[] = 'https://ka-f.fontawesome.com';
  }

  return $urls;
}
add_filter( 'wp_resource_hints', 'ristretto_resource_hints', 10, 2 );