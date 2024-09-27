<?php 
	if (!defined('ABSPATH')) exit;
	get_header();
?>

  <h1>404: Page Not Found</h1>
  <p>Looks like the page you're looking for isn't here anymore.</p>
  <div class="searchbar">
	  <form method="get" class="searchform" id="404-searchform" action="<?php bloginfo('url'); ?>/" role="search">
		  <input type="text" placeholder="Search" name="s" id="s" class="search-input"/>
		  <input type="submit" id="searchsubmit" value="Search" />
	  </form>
  </div>
  <p><a href="<?php bloginfo('url'); ?>">Return home.</a></p>


<?php get_footer(); ?>
