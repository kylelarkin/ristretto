</section> <?php // End .body--wrapper ?>

	<?php if (!defined('ABSPATH')) exit;	?>
  
	<footer class="body--footer">
		<div class="inner">
			<nav class="body--footer--nav">
				<?php wp_nav_menu( array( 'theme_location' => 'primary-footer-menu-location', 'container' => false) ); ?>
			</nav>
			<p>&copy; <?php echo date("Y"); ?> Client Name</p>
		</div>
	</footer>

	<?php wp_footer(); // required don't remove ?>
</body>
</html>
