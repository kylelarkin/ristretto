<?php
 /**
	* Default Page Template
	*/
 function ristretto_register_template() {
 
	 $pageTemplate = array(
		 array( 'core/cover', array(
			 "useFeaturedImage" => true,
			 'dimRatio' => 60,
			 'minHeight' => 517,
			 'contentPosition' => 'bottom left',
			 'align' => 'full',
		 ), array(
			 array( 'core/post-title', array(
				 'level' => 1,
				 'textColor' => 'white',
			 ) ),
			 array( 'core/paragraph', array(
				 'textColor' => 'white',
			 ) ),
		 ) )
	 );
 
	 $post_type_object = get_post_type_object( 'page' );
	 $post_type_object->template = $pageTemplate;
	 
 }
 
 // add_action( 'init', 'ristretto_register_template' );
 