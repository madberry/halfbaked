<?php
/**
 * Template Name: Homepage
 *
 * @package WordPress
 * @subpackage Half_Baked_Base
 * @since Half-Baked Base 1.0
 */

get_header(); ?>

	<section id="primary" class="home">
			<div class="home-top">

				<?php while ( have_posts() ) : the_post(); ?>
						<header id="home-header">
								<h1><?php the_title(); ?></h1>
							</header><!-- .entry-header -->

						<div class="entry-content">
							<?php the_content(); ?>
						</div><!-- .entry-content -->

				<?php endwhile; // end of the loop. ?>

			</div><!-- .home-top -->
	</section><!-- #primary .home-->

	<div id="home-bottom" class="widget-area" role="complementary">
		<?php if ( is_active_sidebar( 'sidebar-home' ) ) : ?>
				<?php dynamic_sidebar( 'sidebar-home' ); ?>
		<?php endif; ?>
	</div><!--/#home-bottom -->

<?php get_footer(); ?>