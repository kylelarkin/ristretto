<?php
function ristretto_register_block_patterns() {
  if ( class_exists( 'WP_Block_Patterns_Registry' ) ) {
    //standard page headers with image
    $coverHeaders = '<!-- wp:cover {"focalPoint":{"x":"0.26","y":"0.42"},"minHeight":70,"minHeightUnit":"vh","customGradient":"linear-gradient(0deg,rgba(0,0,0,0.78) 22%,rgba(0,0,0,0) 73%,rgba(0,0,0,0.85) 100%)","contentPosition":"bottom left","isDark":false,"align":"full"} -->
    <div class="wp-block-cover alignfull is-light has-custom-content-position is-position-bottom-left" style="min-height:70vh"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim has-background-gradient" style="background:linear-gradient(0deg,rgba(0,0,0,0.78) 22%,rgba(0,0,0,0) 73%,rgba(0,0,0,0.85) 100%)"></span><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"left","placeholder":"Enter Subtitle…","textColor":"gold","className":"is-style-supertitle"} -->
    <p class="has-text-align-left is-style-supertitle has-gold-color has-text-color"></p>
    <!-- /wp:paragraph -->
    
    <!-- wp:separator {"backgroundColor":"gold"} -->
    <hr class="wp-block-separator has-text-color has-gold-color has-alpha-channel-opacity has-gold-background-color has-background"/>
    <!-- /wp:separator -->
    
    <!-- wp:post-title {"level":1,"textColor":"white"} /--></div></div>
    <!-- /wp:cover -->';
  
    register_block_pattern(
      'ristretto/coverheader',
      array(
        'title'         => __( 'Standard Image Header', 'textdomain' ),
        'description'   => _x( 'A standard formatted header', 'Block pattern description', 'textdomain' ),
        'content'       => trim($coverHeaders),
        'categories'    => array( 'header' ),
        'keywords'      => array( 'header' ),
        'viewportWidth' => 1400,
      )
    );
  }
}
//add_action( 'init', 'ristretto_register_block_patterns' );

