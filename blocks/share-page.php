<?php

/**
 * Featured Page Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'share-page-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className", "align", "background" values.
$className = 'share-page';

if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
if ( !empty( $block['backgroundColor'] ) ) {
	$className .= 'has-background';
	$className .= 'has-' . $block['backgroundColor'] . '-background-color';
}
if ( !empty( $block['textColor'] ) ) {
	$className .= 'has-text-color';
	$className .= 'has-' . $block['textColor'] . '-color';
}
//acf fields go here
?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
  <h2 class="is-style-all-caps">Share this page</h2>
  <?php include( locate_template('components/_social-sharing.php') ); ?>
</div>

