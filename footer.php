	<?php get_sidebar(); ?>
	</div><!--/.container_12 -->
	<footer id="footer" role="contentinfo">
		<div class="container_12">
			<div class="grid_4">

						<nav>
			<ul>
				<li>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></li>
			</ul>
		</nav>
		</div><!--/.grid_4 -->
		<div class="grid_4">
			</div><!--/.grid_4 -->
		<div class="grid_4">

			</div><!--/.grid_4 -->
			</div><!--/.container_12 -->
	</footer>
	<?php wp_footer(); ?>
	<?php echo get_num_queries(); ?> queries in <?php timer_stop(1); ?> seconds.



</body>
</html>