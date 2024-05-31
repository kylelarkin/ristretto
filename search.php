<?php get_header(); ?>

	<div class="search-background" data-jarallax>
	<?php
	$background_id = get_theme_mod('ristretto_search');
	if ( $background_id ) {
		echo wp_get_attachment_image( $background_id, 'large' );
	} ?>
	</div>

	<main class="is-layout-constrained" data-jarallax >
		

		<div class="search-intro">
			
			<h1>Search Results</h1>
			
			
				<?php
				global $wp_query;
				$s = get_query_var('s');
				$key = esc_html($s, 1);
				$count = $wp_query->found_posts;
				if( 1 == $count ):
					$result = 'Result';
				else:
					$result = 'Results';
				endif;
				?>
					
				<p class="is-style-all-caps"><?php echo $count . ' ' . $result; ?> Found for</p>
				
				<form method="get" class="search-page-search-form" action="<?php bloginfo('url'); ?>/" role="search">
					<label for="s">
						<input class="search-bar-input" type="text" placeholder="Enter Keywords" name="s" id="s" value="<?php echo $key; ?>" />
					</label>
					<input class="search-submit" type="submit" value="Search" />
				</form>
				
				<?php wp_reset_query(); ?>
			
		
		</div>
		
		<div class="search-results" >
		<?php if(have_posts()) : while(have_posts()) : the_post(); // start loop ?>
		
			<article class="search-result">

				<a href="<?= get_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title('<h2>','</h2>'); ?></a>
				<?php if(the_excerpt()): ?>
					<div class="excerpt">
						<p><?= get_the_excerpt(); ?></p>
					</div>
				<?php endif; ?>
				
			</article>
		<?php endwhile; endif; // end loop ?>
		</div>
		<nav role="navigation" class="single-post-nav">
			<div class="previous-post">
				<?php previous_posts_link('<i class="fa-solid fa-caret-left"></i> Previous'); ?>
			</div>
			<div class="next-post">
				<?php next_posts_link('Next <i class="fa-solid fa-caret-right"></i>');?>
			</div>
		</nav>
	</main>

<?php get_footer(); ?>
