<div class="grid_4">
	<aside id="sidebar">

	<?php if ( is_active_sidebar( 'primary-widget-area' ) ) : ?>

		<?php if ( function_exists('dynamic_sidebar') ) dynamic_sidebar( 'primary-widget-area' ); ?>

		<div class="social-row">
		<a class="social" href="https://github.com/rachelbaker"><i class="icon-large icon-github-sign icon-white"></i></a>
		<a class="social" href="http://www.twitter.com/rachelbaker"><i class="icon-large icon-twitter-sign icon-white"></i></a>
		<a class="social" href="http://www.linkedin.com/in/rlbaker"><i class="icon-large icon-linkedin-sign icon-white"></i></a>

		</div>

		<a id="theme-promo" href="http://2012.milwaukee.wordcamp.org/">
				<img class="align-left" src="http://rachelbaker.me/wp-content/uploads/2012/05/wordcamp-milwaukee-2012-200-e1336323456924.png">
				<div id="theme-promo-info">
					<h4>Upcoming Speaking Event</h4>
					<p>I will be speaking at WordCamp Milwaukee June 2nd &amp; 3rd, 2012.  Hope to see you there!</p>
						</div></a>
	<?php endif; ?>

</aside>
</div><!--/.grid_4 -->