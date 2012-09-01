<?php
/**
 * The template for displaying Author Archive pages.
 *
 * @package WordPress
 * @subpackage Half_Baked_Base
 * @since Half-Baked Base 1.0
 */

get_header(); ?>

	<section id="primary" class="archive">

		<?php if ( have_posts() ) : ?>

			<?php
				// Queue the first post, to determine the author.
				the_post();
			?>

			<header id="archive-page-header">
				<h1 class="archive-title author"><?php printf( __( 'Author Archives: %s', 'half_baked_base' ), '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( "ID" ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' ); ?></h1>

				<?php
					// Rewinding the loop back to the beginning.
					rewind_posts();
				?>

				<?php
				// If a user has filled out their bio's description, show information about the author.
				if ( get_the_author_meta( 'description' ) ) : ?>
				<div id="author-info">
					<div class="avatar-container">
						<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'half_baked_author_bio_avatar_size', 72 ) ); ?>
					</div><!-- .avatar-container -->
					<div id="author-description">
					<h3><?php printf( __( 'About %s', 'half_baked_base' ), get_the_author() ); ?></h3>
					<p><?php the_author_meta( 'description' ); ?></p>
					</div><!--/#author-description -->
				</div><!-- #author-info -->
				<?php endif; ?>

			</header>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'post' ); ?>
			<?php endwhile; ?>

			<?php half_baked_content_nav( 'nav-below' ); ?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>


	</section><!-- #primary .archive-->

<?php get_sidebar(); ?>
<?php get_footer(); ?>