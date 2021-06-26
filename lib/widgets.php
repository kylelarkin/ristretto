<?php
/**
 * Registers Primary Widget Area
 */
function ristretto_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Ad: Home Page Top', 'twentyten' ),
		'id' => 'ad-home-page-top',
		'description' => __( 'Home Page Top Ad Spot', 'twentyten' ),
		'before_widget' => '<li id="%1$s" class="ad-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="ad-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'Ad: Home Page Horizontal', 'twentyten' ),
		'id' => 'ad-home-page-horizontal',
		'description' => __( 'Home Page Horizontal Ad Spot', 'twentyten' ),
		'before_widget' => '<li id="%1$s" class="ad-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="ad-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'Ad: Home Page Top Stories', 'twentyten' ),
		'id' => 'ad-home-page-top-stories',
		'description' => __( 'Home Page Top Stories Ad Spot', 'twentyten' ),
		'before_widget' => '<li id="%1$s" class="ad-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="ad-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'Ad: Article Horizontal', 'twentyten' ),
		'id' => 'ad-article-zone-1',
		'description' => __( 'Article Horizontal Ad Spot', 'twentyten' ),
		'before_widget' => '<li id="%1$s" class="ad-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="ad-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'Ad: Article Sidebar', 'twentyten' ),
		'id' => 'ad-article-sidebar',
		'description' => __( 'Article Sidebar Ad Spot', 'twentyten' ),
		'before_widget' => '<li id="%1$s" class="ad-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="ad-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'Ad: Topic Landing Top', 'twentyten' ),
		'id' => 'ad-topic-landing-page-top',
		'description' => __( 'Topic Landing Page Top Ad Spot', 'twentyten' ),
		'before_widget' => '<li id="%1$s" class="ad-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'Ad: Topic Landing Horizontal', 'twentyten' ),
		'id' => 'ad-topic-landing-page-horizontal',
		'description' => __( 'Topic Landing Page Horizontal Ad Spot', 'twentyten' ),
		'before_widget' => '<li id="%1$s" class="ad-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'Ad: Footer', 'twentyten' ),
		'id' => 'ad-footer',
		'description' => __( 'Footer Ad Spot', 'twentyten' ),
		'before_widget' => '<li id="%1$s" class="ad-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'ristretto_widgets_init' );

