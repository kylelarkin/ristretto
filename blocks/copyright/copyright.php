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
$id = 'block-copyright-' . $block['id'];
if( !empty($block['anchor']) ) {
		$id = $block['anchor'];
}

// Create class attribute allowing for custom "className", "align", "background" values.
$className = 'block-copyright';

if( !empty($block['className']) ) {
		$className .= ' ' . $block['className'];
}
?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
  <p class="copyright">&copy;<?php echo date("Y"); ?> <?= get_bloginfo('title'); ?></p>
</div>