<?php 
// // Remove all Dashboard widgets.
// global $wp_meta_boxes;
// unset( $wp_meta_boxes['dashboard'] );
// 
// /**
//  * Add a new dashboard widget.
//  */
// function wpdocs_add_dashboard_widgets() {
// 	wp_add_dashboard_widget( 'dashboard_widget', 'Example Dashboard Widget', 'dashboard_widget_function' );
// }
// add_action( 'wp_dashboard_setup', 'wpdocs_add_dashboard_widgets' );
// 
// /**
//  * Output the contents of the dashboard widget
//  */
// function dashboard_widget_function( $post, $callback_args ) { ?>
// 	<script>
// 		//this currently causes an error on saving, though it does save the values
// 	acf.do_action('append', $('#popup-id'));
// 	</script>
// 	<?php acf_form_head();
// 	$acfargs = array(
// 		'id' => 'test-form',
// 		'post_id' => '64',
// 		'field_groups' => array('group_63920d493d2bc'),
// 		'submit_value' => __("Update this page", 'acf'),
// 		'updated_message' => __("Post updated", 'acf'),
// 		'html_updated_message'  => '<div id="message" class="updated"><p>%s</p></div>',
// 	);
// 	acf_enqueue_uploader();
// 	// Trigger the append action and provide the newly appended jQuery element.
// 	acf_form( $acfargs );
// }