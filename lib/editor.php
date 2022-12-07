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
  wp_register_style( 'ristretto-gutenberg-fonts', '//use.typekit.net/tay1nbp.css' );
  wp_enqueue_style( 'ristretto-gutenberg-fonts' );
  // Font Awesome for Editor
  wp_register_script( 'fontawesome', '//kit.fontawesome.com/xxxxxxxxxx.js', null, null, true );
  wp_enqueue_script('fontawesome');
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
    'name'  => __( 'Red', 'ristretto' ),
    'slug'  => 'red',
    'color' => '#ff0000',
  ),
  array(
    'name'  => __( 'White', 'ristretto' ),
    'slug'  => 'white',
    'color' => '#ffffff',
  ),
  array(
    'name'  => __( 'Black', 'ristretto' ),
    'slug'  => 'black',
    'color' => '#000000',
  ),
  array(
    'name'  => __( 'Gray Dark', 'ristretto' ),
    'slug'  => 'gray-dark',
    'color' => '#565656',
  ),
  array(
    'name'  => __( 'Gray Light', 'ristretto' ),
    'slug'  => 'gray-light',
    'color' => '#f2f2f2',
  ),

) );

/**
 * ACF Radio Color Palette
 * @link https://www.advancedcustomfields.com/resources/acf-load_field/
 * @link https://www.advancedcustomfields.com/resources/dynamically-populate-a-select-fields-choices/
 * @link https://whiteleydesigns.com/create-a-gutenberg-like-color-picker-with-advanced-custom-fields
 *
 * Dynamically populates any ACF field with wd_text_color Field Name with custom color palette
 *
*/
add_filter('acf/load_field/name=color_picker', 'wd_acf_dynamic_colors_load');
function wd_acf_dynamic_colors_load( $field ) {
  // get array of colors created using editor-color-palette
  $colors = get_theme_support( 'editor-color-palette' );
  // if this array is empty, continue
  if( ! empty( $colors ) ) {
    // loop over each color and create option
    foreach( $colors[0] as $color ) {
      $field['choices'][ $color['slug'] ] = $color['name'];
    }
  }
  return $field;
}

function color_picker_styles() {
  wp_enqueue_style( 'admin-styles', get_stylesheet_directory_uri().'/css/admin-styles.css' );
}
//add_action( 'admin_enqueue_scripts', 'color_picker_styles' );