<?php 
function ristretto_register_theme_customizer( $wp_customize ) {
  // Sanitize Text Field Function
  function sanitize_text( $text ) {
      return sanitize_text_field( $text );
  }
  
  /**
   * Create Ristretto Info Panel
   */
	$wp_customize->add_panel( 'ristretto_info', array(
			'priority'       => 10,
			'theme_supports' => '',
			'title'          => __( 'Ristretto Settings', 'ristretto' ),
			'description'    => __( 'All the things you need to know about ristretto.', 'ristretto' ),
	) );
  
	/**
   * Create Ristretto Social Section
   */
	$wp_customize->add_section( 'social_media' , array(
			'title'    => __('Social Media','ristretto'),
			'panel'    => 'ristretto_info',
			'priority' => 10
	) );
  
  // Settings and Controls for Facebook
  $wp_customize->add_setting( 'facebook_link', array(
    'default'           => __( 'https://facebook.com', 'ristretto' ),
    'sanitize_callback' => 'sanitize_text'
  ) );
  
  $wp_customize->add_control( new WP_Customize_Control(
    $wp_customize,
    'facebook_link_control',
      array(
        'label'    => __( 'Facebook', 'ristretto' ),
        'section'  => 'social_media',
        'settings' => 'facebook_link',
        'type'     => 'text'
      )
    )
  );  
  // Settings and Controls for LinkedIn
  $wp_customize->add_setting( 'linkedin_link', array(
    'default'           => __( 'https://linkedin.com', 'ristretto' ),
    'sanitize_callback' => 'sanitize_text'
  ) );
  $wp_customize->add_control( new WP_Customize_Control(
    $wp_customize,
    'linkedin_link_control',
      array(
        'label'    => __( 'LinkedIn', 'ristretto' ),
        'section'  => 'social_media',
        'settings' => 'linkedin_link',
        'type'     => 'text'
      )
    )
  );
  // Settings and Controls for Instagram
  $wp_customize->add_setting( 'instagram_link', array(
    'default'           => __( 'https://instagram.com', 'ristretto' ),
    'sanitize_callback' => 'sanitize_text'
  ) );
  $wp_customize->add_control( new WP_Customize_Control(
    $wp_customize,
    'instagram_link_control',
      array(
        'label'    => __( 'Instagram', 'ristretto' ),
        'section'  => 'social_media',
        'settings' => 'instagram_link',
        'type'     => 'text'
      )
    )
  );

  
  /**
   * Create Ristretto Logos Section
   */
  $wp_customize->add_section( 'ristretto_logo' , array(
      'title'    => 'Site Logos',
      'panel'    => 'ristretto_info',
      'priority' => 20
  ) );
  // Add Settings and Controls for Logos
  $wp_customize->add_setting('ristretto_header_logo');
  $wp_customize->add_control( new WP_Customize_Media_Control( 		
    $wp_customize, 'header_logo_image',
      array(
      'label' => 'Header Logo',
      'settings' => 'ristretto_header_logo',
      'section' => 'ristretto_logo',
      ) 
    ) 
  );
  
   
  /**
   * Create Ristretto Search Section
   */
	$wp_customize->add_section('ristretto_search', array(
		'title' => 'Search',
		'description' => '',
		'panel' => 'ristretto_info',
		'priority' => 120,
	));
  $wp_customize->add_setting('ristretto_search');
  $wp_customize->add_control( new WP_Customize_Media_Control( 
      $wp_customize, 'search_background_image',
      array(
      'label' => 'Search Background Image',
      'settings' => 'ristretto_search',
      'section' => 'ristretto_search',
      ) 
    ) 
  );
  $wp_customize->add_control( 'search_link', array(
      'label' => 'Search Page Template',
      'priority' => 120,
      'settings' => array(),
      'type' => 'button',
      'section'  => 'ristretto_search',
      'input_attrs'  => array(
          'value' => __( 'Click to Load Preview' ),
          'class' => 'button button-secondary',
          'onclick' => 'wp.customize.previewer.previewUrl.set( "/?s=IARA" );',
      ),
      'active_callback' => function() {
          return ! is_404();
      },
    ) 
  );
  
  /**
   * Create Ristretto 404 Section
   */
	$wp_customize->add_section('ristretto_404', array(
		'title' => '404',
		'description' => '',
		'priority' => 120,
		'panel' => 'ristretto_info',
	));
	$wp_customize->add_setting('ristretto_404');
	$wp_customize->add_control( 'not_found_link', array(
			'label' => '404 Page Template',
			'priority' => 130,
			'settings' => array(),
			'type' => 'button',
			'section'  => 'ristretto_404',
			'input_attrs'  => array(
					'value' => __( 'Click to Load Preview' ),
					'class' => 'button button-secondary',
					'onclick' => 'wp.customize.previewer.previewUrl.set( "/not-found-" + String( Math.random() ) + "/" );',
			),
			'active_callback' => function() {
					return ! is_404();
			},
		) 
	);
	// Add a control to upload the 404 background iamge
	$wp_customize->add_control( new WP_Customize_Media_Control( 
		$wp_customize, '404_background_image',
			array(
			'label' => '404 Background Image',
			'settings' => 'ristretto_404',
			'section' => 'ristretto_404',
			) 
		) 
	);
}
add_action( 'customize_register', 'ristretto_register_theme_customizer' );