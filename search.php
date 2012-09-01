<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage Half_Baked_Base
 * @since Half-Baked Base 1.0
 */

get_header(); ?>

	<section id="primary" class="search">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1><?php printf( __( 'Search Results for: %s', 'half_baked_base' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'post' ); ?>
			<?php endwhile; ?>

			<?php half_baked_content_nav( 'nav-below' ); ?>

		<?php else : ?>

			<article class="error404 post">
				<header class="entry-header">
					<h1><?php _e( 'Nothing Found', 'half_baked_base' ); ?></h1>
				</header><!-- .entry-header -->

				<div class="entry-content">
					<p><?php _e( 'Sorry! I looked everywhere, but could not find anything that matched your search criteria. Please try again with some different keywords.', 'half_baked_base' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .entry-content -->
			</article><!-- .error404.post -->

		<?php endif; ?>

	</section><!-- #primary .search-->

<?php get_sidebar(); ?>
<?php get_footer(); ?>