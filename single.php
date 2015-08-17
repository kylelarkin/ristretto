<?php get_header(); ?>
	<?php if(have_posts()) : while(have_posts()) : the_post(); // start loop ?>

	<article>

		<h1><?php the_title(); ?></h1>
		<?php the_content(); ?>

	</article>

	<?php endwhile; endif; // end loop ?>

	<nav role="navigation" class="post-nav">
		<div class="previous-post">
			<?php previous_post_link('%link', '<i class="fa fa-caret-left"></i> Previous'); ?>
		</div>
		<div class="next-post">
			<?php next_post_link('%link', 'Next <i class="fa fa-caret-right"></i>')?>
		</div>
	</nav>

	<?php //get_sidebar(); ?>

<?php get_footer(); ?>
