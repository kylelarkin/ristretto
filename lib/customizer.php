<?php 
function ristretto_register_theme_customizer( $wp_customize ) {
	// Create custom panel.
	$wp_customize->add_panel( 'ristretto_info', array(
			'priority'       => 10,
			'theme_supports' => '',
			'title'          => __( 'Ristretto Settings', 'ristretto' ),
			'description'    => __( 'All the things you need to know about ristretto.', 'ristretto' ),
	) );
	// Add section.
	$wp_customize->add_section( 'social_media' , array(
			'title'    => __('Social Media','ristretto'),
			'panel'    => 'ristretto_info',
			'priority' => 10
	) );
	// Add setting
	$wp_customize->add_setting( 'facebook_link', array(
			 'default'           => __( 'https://...', 'ristretto' ),
			 'sanitize_callback' => 'sanitize_text'
	) );
	$wp_customize->add_setting( 'twitter_link', array(
		'default'           => __( 'https://...', 'ristretto' ),
		'sanitize_callback' => 'sanitize_text'
) );
	// Add control
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'facebook_link_control',
			array(
				'label'    => __( 'Facebook', 'ristretto' ),
				'section'  => 'social_media',
				'settings' => 'facebook_link',
				'type'     => 'text'
			),
		),
	); 
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'twitter_link_control',
			array(
				'label'    => __( 'Twitter', 'ristretto' ),
				'section'  => 'social_media',
				'settings' => 'twitter_link',
				'type'     => 'text'
			),
		),
	);  
	
	// Add Search Section
	$wp_customize->add_section('ristretto_search', array(
		'title' => 'Search',
		'description' => '',
		'priority' => 120,
		'panel' => 'ristretto_info',
	));
	// add a setting for the search background image
	$wp_customize->add_setting('ristretto_search');
	// Add a control to upload the search background iamge
	$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'search_background_image',
		array(
		'label' => 'Search Background Image',
		'settings' => 'ristretto_search',
		'section' => 'ristretto_search',
		) 
	) );
	
	// Add 404 Section
	$wp_customize->add_section('ristretto_404', array(
		'title' => '404',
		'description' => '',
		'priority' => 120,
		'panel' => 'ristretto_info',
	));
	// add a setting for the search background image
	$wp_customize->add_setting('ristretto_404');
	$wp_customize->add_control( 'not_found_link', array(
			'section'  => 'ristretto_404',
			'settings' => array(),
			'label' => '404 Page Template',
			'type' => 'button',
			'priority' => 1,
			'input_attrs'  => array(
					'value' => __( 'Click to Load Preview' ),
					'class' => 'button button-secondary',
					'onclick' => 'wp.customize.previewer.previewUrl.set( "/not-found-" + String( Math.random() ) + "/" );',
			),
			'active_callback' => function() {
					return ! is_404();
			},
	) );
	// Add a control to upload the 404 background iamge
	$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, '404_background_image',
		array(
		'label' => '404 Background Image',
		'settings' => 'ristretto_404',
		'section' => 'ristretto_404',
		) 
	) );
	
	
	// Add site logo Section
	$wp_customize->add_section('ristretto_logo', array(
		'title' => 'Logo',
		'description' => '',
		'priority' => 120,
		'panel' => 'ristretto_info',
	));
	// add a setting for the site logo
	$wp_customize->add_setting('ristretto_logo');
	// $wp_customize->add_control( 'not_found_link', array(
	// 		'section'  => 'ristretto_404',
	// 		'settings' => array(),
	// 		'label' => '404 Page Template',
	// 		'type' => 'button',
	// 		'priority' => 1,
	// 		'input_attrs'  => array(
	// 				'value' => __( 'Click to Load Preview' ),
	// 				'class' => 'button button-secondary',
	// 				'onclick' => 'wp.customize.previewer.previewUrl.set( "/not-found-" + String( Math.random() ) + "/" );',
	// 		),
	// 		'active_callback' => function() {
	// 				return ! is_404();
	// 		},
	// ) );
	// Add a control to upload site logo
	$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'logo_image',
		array(
		'label' => 'Site Logo',
		'settings' => 'ristretto_logo',
		'section' => 'ristretto_logo',
		) 
	) );


	// Add control
	// $wp_customize->add_control( new WP_Customize_Control(
	//   $wp_customize,
	//   'social_media',
	//     array(
	//       'label'    => __( 'Twitter', 'ristretto' ),
	//       'section'  => 'social_media',
	//       'settings' => 'twitter_link',
	//       'type'     => 'text'
	//     ), 
	//   )
	// ); 
	// Sanitize text
	function sanitize_text( $text ) {
			return sanitize_text_field( $text );
	}
}
add_action( 'customize_register', 'ristretto_register_theme_customizer' );