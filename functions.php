<?php
/**
 * Include all partial php/helper files
 */
foreach (glob(dirname(__FILE__) . '/lib/' . '*.php') as $filename) {
	require( $filename );
}

/**
 * Enqueue Scripts and Styles
 */
function ristretto_enqueue_init() {
	// Register Scripts
	wp_register_script( 'fitvids', get_bloginfo( 'stylesheet_directory' ) . '/bower_components/FitVids/jquery.fitvids.js', array('jquery'), null, true );
	// Enqueue Scripts
	wp_enqueue_script('fitvids');
	wp_enqueue_script('ristretto-app');

	// Register Styles
	wp_register_style( 'fontawesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css', array(), null, 'all' );
	wp_register_style( 'ristretto-screen', get_bloginfo( 'stylesheet_directory' ) . '/css/screen.css', array(), null, 'all' );
	// Enqueue Styles
	wp_enqueue_style('fontawesome');
	wp_enqueue_style('ristretto-screen');
}
add_action('wp_enqueue_scripts', 'ristretto_enqueue_init', 15);

/**
 * TypeKit Fonts (from: http://wptheming.com/2013/02/typekit-code-snippet/)
 */
function theme_typekit() {
    wp_enqueue_script( 'theme_typekit', '//use.typekit.net/xxxxxxx.js');
}
add_action( 'wp_enqueue_scripts', 'theme_typekit' );

function theme_typekit_inline() {
  if ( wp_script_is( 'theme_typekit', 'done' ) ) { ?>
  	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
<?php }
}
add_action( 'wp_head', 'theme_typekit_inline' );