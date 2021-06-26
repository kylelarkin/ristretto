<?php get_header(); ?>

	<main>

		<?php include( locate_template('components/_topic-header.php') ); ?>

		<div class="featured-content">
			<?php
			// WP_Query arguments
			$term = get_queried_object();
			$current_tag = $term->slug;
			$args = array(
				'posts_per_page'         => '1',
        'tag_name' 		 => $current_tag,
        'ignore_sticky_posts' => true
			);

			// The Query
			$featured_post = new WP_Query( $args );

			// The Loop
			if ( $featured_post->have_posts() ) {
				while ( $featured_post->have_posts() ) {
					$featured_post->the_post();
					ristretto_ap($thumb = true, $date = true, $byline = false, $excerpt = true, $length = 30, $category = false);
				}
			} else {
				// no posts found
			}

			// Restore original Post Data
			wp_reset_postdata();
			?>

			<aside class="sidebar-feature">
				<?php include( locate_template('components/_series-widget.php') ); ?>
				<ul class="sidebar-widgets">
					<?php dynamic_sidebar('ad-topic-landing-page-top'); ?>
				</ul>
			</aside>


		</div>

		<div class="category-recent-articles">

		<?php
			$args = array(
				'offset'		 => 1,
				'tag_name'  => $current_tag,
				'posts_per_page' => 9,
			);

			$the_query = new WP_Query( $args );

			if ( $the_query->have_posts() ) {
				$counter = 0;
				while ( $the_query->have_posts() ) {
					if( $counter < 6 ) {
						$the_query->the_post();
						ristretto_ap($thumb = true, $date = true, $byline = false, $excerpt = true, $length = 30, $category = false);
					}
					if( $counter == 6 ) {
						// Output newsletter and ad
						echo '<div class="topic-newsletter" id="newsletter-form">';
							echo '<p class="form-label"><span class="fa fa-envelope" aria-hidden="true"></span> Newsletter Sign up</p>';
							echo do_shortcode('[gravityform id="6"]');
						echo '</div>';
						echo '<div class="topic-widget">';
							echo '<ul>';
								dynamic_sidebar('ad-topic-landing-page-horizontal');
							echo '</ul>';
						echo '</div>';
					}
					if( $counter > 6 ) {
						$the_query->the_post();
						ristretto_ap($thumb = true, $date = true, $byline = false, $excerpt = true, $length = 30, $category = false);
					}
					$counter++;
				}

			}
			echo '</div>';
			wp_reset_postdata();
		?>

		</div>

		<?php 
			//related topics
			include( locate_template( 'components/_related-topics.php' ) );

			//ajax load more
			echo do_shortcode( '[ajax_load_more container_type="div" offset="10" tag="'. $current_tag .'" posts_per_page="6"]' );

		?>
		

	</main>


<?php get_footer(); ?>