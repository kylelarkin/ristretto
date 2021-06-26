<?php
function my_acf_init_block_types() {
    // Check function exists.
    if( function_exists('acf_register_block_type') ) {

    // register a testimonial block.
    acf_register_block_type(
      array(
        'name'              => 'subheading',
        'title'             => __('Subheading'),
        'description'       => __('Article subheading.'),
        'render_template'   => 'blocks/article-subheading.php',
        'enqueue_style'     => get_template_directory_uri() . '/blocks/css/article-subheading.css',
        'post_types'        => array('post'),
        'category'          => 'formatting',
        'icon'              => 'editor-alignleft',
        'keywords'          => array( 'suhead', 'subheading' ),
      )
    );

    acf_register_block_type(
      array(
        'name'              => 'byline',
        'title'             => __('Byline'),
        'description'       => __('Article byline.'),
        'render_template'   => 'blocks/article-byline.php',
        'enqueue_style'     => get_template_directory_uri() . '/blocks/css/article-byline.css',
        'post_types'        => array('post'),
        'category'          => 'formatting',
        'icon'              => 'groups',
        'keywords'          => array( 'byline', 'author', 'authors' ),
      ),
    );

    acf_register_block_type(
      array(
        'name'              => 'article-signup',
        'title'             => __('Newsletter Sign-up'),
        'description'       => __('Newsletter Sign-up'),
        'render_template'   => 'blocks/article-signup.php',
        'enqueue_style'     => get_template_directory_uri() . '/blocks/css/article-signup.css',
        'post_types'        => array('post'),
        'category'          => 'formatting',
        'icon'              => 'megaphone',
        'keywords'          => array( 'sign-up', 'newsletter' ),
        'align'             => 'right'
      ),
    );

    acf_register_block_type(
      array(
        'name'              => 'article-ad',
        'title'             => __('Horizontal Ad'),
        'description'       => __('Horizontal Ad Zone. Content is set through widget area.'),
        'render_template'   => 'blocks/article-ad-zone.php',
        'post_types'        => array('post'),
        'category'          => 'formatting',
        'icon'              => 'megaphone',
        'keywords'          => array( 'ad', 'ads' ),
      ),
    );

    acf_register_block_type(
      array(
        'name'              => 'staff-member',
        'title'             => __('Staff Member'),
        'description'       => __('Add a member of staff'),
        'render_template'   => 'blocks/staff-member.php',
        'enqueue_style'     => get_template_directory_uri() . '/blocks/css/staff-member.css',
        'category'          => 'common',
        'icon'              => 'admin-users',
        'keywords'          => array( 'staff' ),
      ),
    );
    acf_register_block_type(
      array(
        'name'              => 'section-divider',
        'title'             => __('Section Divider'),
        'description'       => __('Add a section divider with a heading'),
        'render_template'   => 'blocks/section-divider.php',
        'enqueue_style'     => get_template_directory_uri() . '/blocks/css/section-divider.css',
        'category'          => 'common',
        'icon'              => 'admin-users',
        'keywords'          => array( 'staff' ),
      ),
    );
  }
}
add_action('acf/init', 'my_acf_init_block_types');