<?php
/**
 * Remove theme/plugin editor
 */
define( 'DISALLOW_FILE_EDIT', true );

/**
 * Add custom logo to Wordpress Login page(s). Logo should be no bigger than 323 pixels wide by 67 pixels high
 */
function ristretto_login_logo() { ?>
    <style type="text/css">
        body.login div#login h1 a {
            background: url('<?php bloginfo( 'template_directory' ) ?>/img/wp-login-logo-ristretto.png') no-repeat 0 0;
            background-size: contain;
            margin: 0 0 0 23px;
            width: 274px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'ristretto_login_logo' );

/**
 * Allow SVG files to be uploaded to media library
 */
function cc_mime_types( $mimes ){
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );

/**
 * Disable Admin Bar for Subscribers
 */
function ristretto_hide_admin_bar() {
    if (!current_user_can('edit_posts')) {
        show_admin_bar(false);
  }
}
add_action('set_current_user', 'ristretto_hide_admin_bar');

/**
 * Prevent Subscribers from seeing dashboard
 */
function ristretto_subscriber_redirect(){
  if( is_admin() && !defined('DOING_AJAX') && current_user_can('subscriber') ){
    wp_redirect( home_url() . '/myaccount' );
    exit;
  }
}
add_action('init','ristretto_subscriber_redirect');

/**
 * Change Login Logo to point to Home Page
 */
function ristretto_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'ristretto_login_logo_url' );