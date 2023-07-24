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
$id = 'section-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'section';
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
//background fields
$backgroundIMG = get_field('background_image');
$size = 'full';
$parallax = get_field('parallax');
$header = get_field('is_this_section_a_page_header');
$removePadding = get_field('remove_padding');
$grid_columns = get_field('inner_grid_columns');

//border fields
$borders = get_field('border_locations');
$borderColor = get_field('border_color_color_picker');

if( $parallax ) {
  $className .= ' jarallax';
}

if($header) {
  $className .= ' header-section';
}

if($removePadding) {
  $className .= ' remove-padding';
}

//check for background image and setup variable
if($backgroundIMG) {
  $backgroundIMG = wp_get_attachment_image_src($backgroundIMG, $size);
  $className .= ' bgimg';
}

if($parallax) {
  $className .= ' parallax';
}

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

?>

<style>
  <?php echo '#' . esc_attr($id); ?> {
    <?php if($backgroundIMG) { echo 'background-image: url(' . $backgroundIMG['0'] . ') !important;'; } ?>
    background-position: center;
    background-size: cover;
  }
</style>

<div id="<?php echo esc_attr($id); ?>" <?php if($parallax) echo 'data-jarallax '; ?> class="<?php echo esc_attr($className); ?> standard-grid"  >
  <div class="section-inner <?php echo $grid_columns;?>-columns">
    <?php
    $template = array(
      array( 'core/paragraph', array(
        'placeholder' => 'Text goes here...',
      ) ),
    );
    echo '<InnerBlocks  template="' . esc_attr( wp_json_encode( $template ) ) . '"/>';
    ?>
  </div>
</div>

