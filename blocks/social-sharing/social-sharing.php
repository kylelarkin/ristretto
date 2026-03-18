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
/**
 * IMPORTANT PART:
 * When inside a Query Loop, the current post ID is passed via block context.
 * In a normal single post view, fall back to the global $post or $post_id.
 */
$loop_post_id = null;

// Newer ACF block renderer passes context in $block['context'].
if ( isset( $block['context']['postId'] ) ) {
		$loop_post_id = $block['context']['postId'];
}

?>

<?php if ( ! $is_preview ) { ?>
	<div id="<?php echo esc_attr( $id ); ?>" <?php echo get_block_wrapper_attributes($class_names); ?>>
<?php } ?>
  <h6>Share</h6>
	<?php include(locate_template('/components/_social-sharing.php')); ?>
<?php if ( ! $is_preview ) { ?>
	</div>
<?php } ?>