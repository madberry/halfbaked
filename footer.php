<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package WordPress
 * @subpackage Half_Baked_Base
 * @since Half-Baked Base 1.0
 */
?>
	</div><!-- #main-wrapper -->
	<footer id="site-footer" role="contentinfo">
		<div class="site-info">
			<?php if ( function_exists('dynamic_sidebar')) dynamic_sidebar("footer-widget"); ?>
		</div><!-- .site-info -->
	</footer><!-- #site-footer -->
</div><!-- #wrapper -->

<?php wp_footer(); ?>
</body>
</html>