<?php
/**
 * Add Support for Editor Styles
 */
add_theme_support('editor-styles');

/**
 * Registers Editor Styles
 */
function ristretto_add_editor_styles() {
    add_editor_style( 'css/editor-style.css' );
}
add_action( 'init', 'ristretto_add_editor_styles' );

function ristretto_enqueue_gutenberg() {
  // Enqueue Typekit for Editor.
  wp_register_style( 'ristretto-gutenberg-fonts', '//use.typekit.net/vbl0nii.css' );
  // wp_register_style( 'tiny-slider-css', get_bloginfo( 'stylesheet_directory' ) . '/node_modules/tiny-slider/dist/tiny-slider.css', array(), null, 'all' );
  wp_enqueue_style( 'ristretto-gutenberg-fonts' );
  // wp_enqueue_style( 'tiny-slider-css' );
  // Font Awesome for Editor
  wp_register_script( 'fontawesome', '//kit.fontawesome.com/ce9172c803.js', null, null, true );
  wp_register_script( 'editor-tiny-slider', get_bloginfo( 'stylesheet_directory' ) . '/node_modules/tiny-slider/dist/min/tiny-slider.js', null, null, true );
  // wp_enqueue_script('editor-tiny-slider');
  wp_enqueue_script('fontawesome');
}
add_action( 'enqueue_block_editor_assets', 'ristretto_enqueue_gutenberg' );

/* Add responsive embed support */
add_theme_support( 'responsive-embeds' );

/* Remove default block patterns */
remove_theme_support( 'core-block-patterns' );