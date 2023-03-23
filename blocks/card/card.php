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
$id = 'card-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'card';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if ( !empty( $block['backgroundColor']) ) {
  $className .= ' has-background';
  $className .= ' has-' . $block['backgroundColor'] . '-background-color';
}
if ( !empty( $block['textColor'] ) ) {
  $className .= ' has-text-color';
  $className .= ' has-' . $block['textColor'] . '-color';
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

//border fields
$borders = get_field('border_locations');
$borderColor = get_field('border_color_color_picker');

//border colors
if($borders) {
  $className .= ' has-' . $borderColor . '-border';
}

//check for borders
if( $borders && in_array('Bottom', $borders) ) {
  $className .= ' border-bottom';
}
if( $borders && in_array('Top', $borders) ) {
  $className .= ' border-top';
}
if( $borders && in_array('Left', $borders) ) {
  $className .= ' border-left';
}
if( $borders && in_array('Right', $borders) ) {
  $className .= ' border-right';
}
$cardLink = get_field('link');

//$screen = get_current_screen();

?>
<?php if($cardLink): ?>
  
  <a 
    id="<?php echo esc_attr($id); ?>"  
    class="<?php echo esc_attr($className); ?>" 
    <?php if ( !is_admin() ): ?>
      href="<?= $cardLink; ?>" >
    <?php else: ?>
      >
    <?php endif; ?>
<?php else: ?>
  <div id="<?php echo esc_attr($id); ?>"  class="<?php echo esc_attr($className); ?>">
<?php endif; ?>
    <?php
    $template = array(
      array( 'core/heading', array(
        'placeholder' => 'Heading goes here...',
        'level' => '2'
      ) ),
      array( 'core/paragraph', array(
        'placeholder' => 'Text goes here...',
      ) ),
    );
    echo '<InnerBlocks template="' . esc_attr( wp_json_encode( $template ) ) . '" />';
    ?>
<?php if($cardLink): ?>
  </a>
<?php else: ?>
  </div>
<?php endif; ?>

