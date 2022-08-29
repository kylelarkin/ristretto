<?php get_header(); ?>

		<main class="search">

			<h1>Search Results</h1>
      
			<div>
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
          
				  <p class="large-details"><?php echo $count . ' ' . $result; ?> Found for</p>
          
				  <form method="get" class="search-page-search-form" action="<?php bloginfo('url'); ?>/" role="search">
					  <label for="s">
						  <span class="far fa-search" title="Search"></span>
						  <input class="search-bar-input" type="text" placeholder="Enter Keywords" name="s" id="s" value="<?php echo $key; ?>" />
					  </label>
				  </form>
          
			  <?php wp_reset_query(); ?>
      
			</div>

		</main>

<?php get_footer(); ?>
