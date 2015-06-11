<?php get_header(); ?>
	<?php if(have_posts()) : while(have_posts()) : the_post(); // start loop ?>

	<article>

		<h1><?php the_title(); ?></h1>
		<?php the_content(); ?>

	</article>

	<?php endwhile; endif; // end loop ?>

	<nav role="navigation" class="single-post-nav">
		<?php posts_nav_link('|','&laquo; Newer Posts ','Older Posts &raquo;'); ?>
	</nav>

	<?php //get_sidebar(); ?>

<?php get_footer(); ?>
