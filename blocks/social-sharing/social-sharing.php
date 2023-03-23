<?php

/**
 * Social Sharing Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'block-social-sharing-' . $block['id'];
if( !empty($block['anchor']) ) {
		$id = $block['anchor'];
}

// Create class attribute allowing for custom "className", "align", "background" values.
$className = 'block-social-sharing';

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
  <h6>Share</h6>
	<?php include(locate_template('/components/_social-sharing.php')); ?>
</div>