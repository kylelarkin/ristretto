<?php
/**
 * Registers Editor Styles
 */
function ristretto_add_editor_styles() {
    add_editor_style( 'css/editor-style.css' );
}
add_action( 'init', 'ristretto_add_editor_styles' );

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