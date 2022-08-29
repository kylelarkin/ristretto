<?php
// =========================================================
//   Register Core Ristretto Blocks Styles
// =========================================================
//paragraph styles
// register_block_style(
//   'core/paragraph',
//   array(
//     'name' => 'small-body',
//     'label' => __('Small Body'),
//   )
// );



// =========================================================
//   Register Block Category
// =========================================================
function ristretto_block_category( $categories, $post ) {

  return array_merge(
    array(
      array(
        'slug' => 'rl-artists',
        'title' => __( 'Artist Blocks', 'ristretto' ),
        'icon' => 'art'
      ),
    ),
    $categories
  );
}
//add_filter( 'block_categories_all', 'ristretto_block_category', 10, 2 );



// =========================================================
//   Register CNF Blocks
// =========================================================
function ristretto_init_block_types() {
    // Check function exists.
    if( function_exists('acf_register_block_type') ) {
    //
    //layout blocks
    //
    acf_register_block_type(
      array(
        'name'              => 'section',
        'title'             => __('Section'),
        'render_template'   => 'blocks/section.php',
        'enqueue_style'     => get_template_directory_uri() . '/blocks/css/section.css',
        'category'          => 'design',
        'align'             => 'full',
        'icon'              => 'align-wide',
        'keywords'          => array( 'section' ),
        'supports'          => array( 
          'jsx' 	 => true,
          'align'  => true,
          'anchor' => true,
        )
      )
    );
    
    //
    //artist blocks
    //
    // acf_register_block_type(
    //   array(
    //     'name'              => 'artist-contact',
    //     'title'             => __('Artist Contact Details'),
    //     'description'       => __('Artist\'s contact information and website.'),
    //     'category'          => 'rl-artists',
    //     'icon'              => 'admin-users',
    //     'keywords'          => array('artist', 'contact', 'website', 'url', 'people'),
    //     'post_types'        => array('artist'),
    //     'mode'              => 'preview',
    //     // 'align'             => 'full',
    //     // 'align_text'        => 'left',
    //     // 'align_content'     => 'center',
    //     'render_template'   => 'blocks/artist-contact.php',
    //     'enqueue_style'     => get_template_directory_uri() . '/blocks/css/artist-contact.css',
    //     // 'enqueue_script'    => get_template_directory_uri() . '/blocks/js/artist-contact.js',
    //     'enqueue_assets'    => function(){
    //       wp_enqueue_style( 'block-artist-contact', get_template_directory_uri() . '/blocks/css/artist-contact.css' );
    //       // wp_enqueue_script( 'block-artist-contact', get_template_directory_uri() . '/blocks/js/artist-contact.js', array('jquery'), '', true );
    //     },
    //     'supports'          => array(
    //       'align'  => false,
    //       // 'align' => array( 'left', 'right', 'full' ),
    //       'align_text' => false,
    //       'align_content' => false,
    //       'full_height' => false,
    //       'mode' => 'false',
    //       'multiple' => 'false',
    //       // 'example'  => array(
    //       //   'attributes' => array(
    //       //       'mode' => 'preview',
    //       //       'data' => array(
    //       //         'testimonial'   => "Your testimonial text here",
    //       //         'author'        => "John Smith"
    //       //       )
    //       //   )
    //       // ),
    //       'jsx' 	 => false,
    //       'anchor' => true,
    //     )
    //   )
    // );
  }
}
add_action('acf/init', 'ristretto_init_block_types');