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
  // wp_enqueue_script('fontawesome');
}
add_action( 'enqueue_block_editor_assets', 'ristretto_enqueue_gutenberg' );


/* Add Wide Image Support for Gutenberg */
add_theme_support( 'align-wide' );

/* Some blocks can have padding controls. This is off by default, and requires the theme to opt in by declaring support: */
add_theme_support( 'custom-spacing' );

/* Use this setting to enable the following Global Styles settings: */
add_theme_support( 'appearance-tools' );

/* Add border support */
add_theme_support( 'border' );

/* Add responsive embed support */
add_theme_support( 'responsive-embeds' );

/* Add link color support */
add_theme_support( 'link-color' );

/* Remove default block patterns */
remove_theme_support( 'core-block-patterns' );

/**
* Editor Font Sizes
*/
add_theme_support( 'editor-font-sizes', array(
  array(
    'name'      => __( 'Small', 'ristretto' ),
    'shortName' => __( 'S', 'ristretto' ),
    'size'      => 18,
    'slug'      => 'small'
  ),
  array(
    'name'      => __( 'Default', 'ristretto' ),
    'shortName' => __( 'D', 'ristretto' ),
    'size'      => 20,
    'slug'      => 'default'
  ),
  array(
    'name'      => __( 'Large', 'ristretto' ),
    'shortName' => __( 'L', 'ristretto' ),
    'size'      => 28,
    'slug'      => 'large'
  ),
) );

/**
 * Customize Gutenberg color palette
 */
add_theme_support( 'editor-color-palette', array(
  array(
    'name'  => __( 'White', 'ristretto' ),
    'slug'  => 'white',
    'color' => '#fff',
  ),
  array(
    'name'  => __( 'Teal', 'ristretto' ),
    'slug'  => 'teal',
    'color' => '#1BA39C',
  ),
  array(
    'name'  => __( 'Black', 'ristretto' ),
    'slug'  => 'black',
    'color' => '#000',
  ),
  array(
    'name'  => __( 'Light Gray', 'ristretto' ),
    'slug'  => 'gray-light',
    'color' => '#f2f2f2',
  ),
  array(
    'name'  => __( 'Dark Gray', 'ristretto' ),
    'slug'  => 'gray-dark',
    'color' => '#999',
  ),
  array(
    'name'  => __( 'Transparent', 'ristretto' ),
    'slug'  => 'transparent',
    'color' => 'transparent',
  ),

) );

/**
 * Customize Gutenberg gradient color palette
 */
// add_theme_support(
//     'editor-gradient-presets',
//     array(
//         array(
//             'name'     => esc_attr__( 'Beige Linear Gradient', 'ristretto' ),
//             'gradient' => 'linear-gradient(171deg, #E8E1D9 0%, rgba(247, 246, 244, 0.10) 100%)',
//             'slug'     => 'beige-linear-gradient'
//         ),
// 
//         array(
//             'name'     => esc_attr__( 'Light Blue Linear Gradient', 'ristretto' ),
//             'gradient' => 'linear-gradient(0deg, #D9E8F2 0%, rgba(247, 246, 244, 0.10))',
//             'slug'     =>  'light-blue-linear-gradient',
//         ),
// 
//         array(
//             'name'     => esc_attr__( 'Blue Linear Gradient', 'ristretto' ),
//             'gradient' => 'linear-gradient(136deg, #00407B 0%, #086DC2 100%)',
//             'slug'     => 'blue-linear-gradient',
//         ),
//         array(
//             'name'     => esc_attr__( 'Dark Blue Linear Gradient', 'ristretto' ),
//             'gradient' => 'linear-gradient(136deg, #16205B 0%, #578BF0 100%)',
//             'slug'     => 'dark-blue-linear-gradient',
//         ),
//     )
// );