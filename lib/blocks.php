<?php 
/**
 * Blocks
 *
 * @package      ristrettoClient
 * @author       ristrettoWP
 * @since        1.0.0
 * @license      GPL-2.0+
 **/

// namespace ristretto\Blocks;

/**
 * Load Blocks
 */
function load_blocks() {
  $theme  = wp_get_theme();
  $blocks = get_blocks();
  foreach( $blocks as $block ) {
    if ( file_exists( get_template_directory() . '/blocks/' . $block . '/block.json' ) ) {
      register_block_type( get_template_directory() . '/blocks/' . $block . '/block.json' );
      wp_register_style( 'block-' . $block, get_template_directory_uri() . '/blocks/' . $block . '/style.css', null, $theme->get( 'Version' ) );

      if ( file_exists( get_template_directory() . '/blocks/' . $block . '/init.php' ) ) {
        include_once get_template_directory() . '/blocks/' . $block . '/init.php';
      }
    }
  }
}
add_action( 'init', __NAMESPACE__ . '\load_blocks', 5 );

/**
 * Get Blocks
 */
function get_blocks() {
  $theme   = wp_get_theme();
  $blocks  = get_option( 'ristretto_blocks' );
  $version = get_option( 'ristretto_blocks_version' );
  if ( empty( $blocks ) || version_compare( $theme->get( 'Version' ), $version ) || ( function_exists( 'wp_get_environment_type' ) && 'production' !== wp_get_environment_type() ) ) {
    $blocks = scandir( get_template_directory() . '/blocks/' );
    $blocks = array_values( array_diff( $blocks, array( '..', '.', '.DS_Store', '_base-block' ) ) );

    update_option( 'ristretto_blocks', $blocks );
    update_option( 'ristretto_blocks_version', $theme->get( 'Version' ) );
  }
  return $blocks;
}

/**
 * Find post terms block, hide uncategorized if it's a term
 */
function filter_post_terms_block($block_content, $block) {
   // Check if the block is the post terms block for the 'category' taxonomy
   if ($block['blockName'] === 'core/post-terms' && isset($block['attrs']['term']) && $block['attrs']['term'] === 'category') {
     // Remove 'Uncategorized' from the output
     $block_content = preg_replace('/<a[^>]*>Uncategorized<\/a>,?\s?/', '', $block_content);
   }
   return $block_content;
 }
 add_filter('render_block', 'filter_post_terms_block', 10, 2);

/**
 * Block categories
 *
 * @since 1.0.0
 */
function block_categories( $categories ) {

  // Check to see if we already have a ristrettoWP category
  $include = true;
  foreach( $categories as $category ) {
    if( 'ristrettowp' === $category['slug'] ) {
      $include = false;
    }
  }

  if( $include ) {
    $categories = array_merge(
      $categories,
      [
        [
          'slug'  => 'featured-content',
          'title' => __( 'Featured Content', 'ristretto' ),
        ]
      ]
    );
  }

  return $categories;
}
add_filter( 'block_categories_all', __NAMESPACE__ . '\block_categories' );

/**
 * Block styles
 *
 * @since 1.0.0
 */
register_block_style(
  'core/paragraph',
  array(
    'name' => 'eyebrow',
    'label' => __('Eyebrow'),
  )
);

register_block_style(
  'core/heading',
  array(
    'name' => 'highlight',
    'label' => __('Highlight'),
  )
);