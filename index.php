<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Half_Baked_Base
 * @since Half-Baked Base 1.0
 */

get_header(); ?>

	<div id="primary">

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'content', get_post_format() ); ?>

			<?php endwhile; ?>

			<?php half_baked_content_nav( 'nav-below' ); ?>

		<?php else : ?>

			<article class="no-results not-found">
				<?php get_template_part( 'content', 'none' ); ?>
			</article><!-- .no-results -->

		<?php endif; // end have_posts() check ?>

	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>