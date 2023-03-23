<?php
// https://wordpress.stackexchange.com/questions/392914/wp-5-8-query-loop-block-where-to-place-custom-query
// Replace :query-motor-electric search keyword for a custom taxonomy query.
add_action( 'pre_get_posts', function( \WP_Query $q ) {
		if ( $q->is_search() && ':custom-query' === trim( $q->get( 's' ) ) ) {
				$tax_query = array(
					array(
						'taxonomy' => 'people_category',
						'field'    => 'slug',
						'terms'    => 'nacc-team',
					),
				);
				$q->set( 'tax_query', $tax_query );
				$q->set( 'posts_per_page', -1);
				$q->set( 'post_type', 'people');

				// Clear search, unset search query variable or use a stop-word filter.
				$q->set( 's', '' );
		}
		
} );