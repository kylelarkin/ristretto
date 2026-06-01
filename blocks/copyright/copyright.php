<?php

/**
 * Copyright Block Template.
 *
  * @param   array $block The block settings and attributes.
  * @param   string $content The block inner HTML (empty).
  * @param   bool $is_preview True during AJAX preview.
  * @param   (int|string) $post_id The post ID this block is saved to.
  */

 // Check for Custom Anchor
 if( !empty($block['anchor']) ) {
   $id = $block['anchor'];
 } else {
   $id = null;
 }
 $class_names = array();
 
?>

<?php if ( ! $is_preview ) { ?>
  <div id="<?php echo esc_attr( $id ); ?>" <?php echo get_block_wrapper_attributes($class_names); ?>>
<?php } ?>
   <p class="copyright">&copy;<?php echo date("Y"); ?> <?= get_bloginfo('title'); ?></p>
<?php if ( ! $is_preview ) { ?>
  </div>
<?php } ?>