<?php 
	if (!defined('ABSPATH')) exit;
	get_header();
?>


	<main class="is-layout-constrained">

	<?php if(have_posts()) : while(have_posts()) : the_post(); // start loop ?>
		
		<?php the_content(); ?>
	
	<?php endwhile; endif; // end loop ?>

	</main>


<?php get_footer(); ?>
