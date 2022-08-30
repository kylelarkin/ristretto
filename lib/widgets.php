<?php
/**
 * Registers Primary Widget Area
 */
function ristretto_widgets_init() {
	register_sidebar( array(
		// 'name' => __( 'News Sidebar', 'ristretto' ),
		// 'id' => 'news-sidebar',
		// 'description' => __( 'News post sidebar', 'ristretto' ),
		// 'before_widget' => '<div id="%1$s" class="news-sidebar %2$s">',
		// 'after_widget' => '</div>',
		// 'before_title' => '<h3 class="ad-title">',
		// 'after_title' => '</h3>',
	) );
}
// add_action( 'widgets_init', 'ristretto_widgets_init' );
