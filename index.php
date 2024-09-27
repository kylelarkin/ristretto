<?php get_header(); ?>
    
    <?php if(have_posts()) : while(have_posts()) : the_post(); // start loop ?>
        
        <h1><?php the_title(); ?></h1>
        <?php the_content(); ?>

    <?php endwhile; endif; // end loop ?>
    
    <!-- <nav role="navigation" class="post-nav">
      <div class="previous-post">
        <?php //previous_posts_link('<i class="fa fa-caret-left"></i> Previous'); ?>
      </div>
      <div class="next-post">
        <?php //next_posts_link('Next <i class="fa fa-caret-right"></i>');?>
      </div>
    </nav> -->
  
  <?php //get_sidebar(); ?>

<?php get_footer(); ?>