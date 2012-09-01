<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Half_Baked_Base
 * @since Half-Baked Base 1.0
 */

get_header(); ?>

	<section id="primary" class="post">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', get_post_format() ); ?>

				<nav id="nav-single">
					<h3 class="assistive-text"><?php _e( 'Post navigation', 'half_baked_base' ); ?></h3>
					<span class="nav-previous"><?php previous_post_link( '%link', __( '<span class="meta-nav">&larr;</span>', 'half_baked_base' ) . ' %title' ); ?></span>
					<span class="nav-next"><?php next_post_link( '%link', '%title ' . __( '<span class="meta-nav">&rarr;</span>', 'half_baked_base' ) ); ?></span>
				</nav><!-- #nav-single -->

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() )
						comments_template( '', true );
				?>

			<?php endwhile; // end of the loop. ?>

	</section><!-- #primary .post-->

<?php get_sidebar(); ?>
<?php get_footer(); ?>