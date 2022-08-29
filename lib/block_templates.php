<?php
/**
 * Default Article Template
 */
function ristretto_register_template() {

	$template = array(
		array( 'acf/subheading', array() ),
		array( 'acf/byline', array() ),
		array( 'acf/article-ad', array() ),
		array( 'acf/article-signup', array() ),
	);

  $post_type_object = get_post_type_object( 'post' );
	$post_type_object->template = $template;
}
// add_action( 'init', 'ristretto_register_template' );