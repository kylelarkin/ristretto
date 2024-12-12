</section> <?php // End .body--wrapper ?>

	<?php if (!defined('ABSPATH')) exit;	?>
  
	<footer class="body--footer is-layout-constrained has-global-padding">
		<nav class="body--footer--nav">
			<?php wp_nav_menu( array( 'theme_location' => 'primary-footer-menu-location', 'container' => false) ); ?>
		</nav>
		<p>&copy; <?php echo date("Y "); bloginfo('site_title'); ?></p>
	</footer>

	<?php wp_footer(); // required don't remove ?>
</body>
</html>
