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
  wp_enqueue_style( 'ristretto-gutenberg-fonts' );
  // Font Awesome for Editor
  wp_register_script( 'fontawesome', '//kit.fontawesome.com/c20d1ab028.js', null, null, true );
  //wp_enqueue_script('fontawesome');
}
add_action( 'enqueue_block_editor_assets', 'ristretto_enqueue_gutenberg' );


/* Add Wide Image Support for Gutenberg */
function ristretto_wide_images() {
  add_theme_support( 'align-wide' );
}
add_action( 'after_setup_theme', 'ristretto_wide_images' );

/* Some blocks can have padding controls. This is off by default, and requires the theme to opt in by declaring support: */
add_theme_support( 'custom-spacing' );

/* Use this setting to enable the following Global Styles settings: */
add_theme_support( 'appearance-tools' );

/* remove default block patterns */
remove_theme_support( 'core-block-patterns' );

/**
* Editor Font Sizes
*/
add_theme_support( 'editor-font-sizes', array(
  array(
    'name'      => __( 'Small', 'ea_genesis_child' ),
    'shortName' => __( 'S', 'ea_genesis_child' ),
    'size'      => 18,
    'slug'      => 'small'
  ),
  array(
    'name'      => __( 'Default', 'ea_genesis_child' ),
    'shortName' => __( 'D', 'ea_genesis_child' ),
    'size'      => 20,
    'slug'      => 'default'
  ),
  array(
    'name'      => __( 'Large', 'ea_genesis_child' ),
    'shortName' => __( 'L', 'ea_genesis_child' ),
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