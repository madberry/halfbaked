<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Half_Baked_Base
 * @since Half-Baked Base 1.0
 */

get_header(); ?>

<section id="primary" class="archive">

		<?php if ( have_posts() ) : ?>

			<header id="archive-page-header">
				<h1 class="archive-title"><?php
					if ( is_day() ) {
						printf( __( 'Daily Archives: %s', 'half_baked_base' ), '<span>' . get_the_date() . '</span>' );
					} elseif ( is_month() ) {
						printf( __( 'Monthly Archives: %s', 'half_baked_base' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'half_baked_base' ) ) . '</span>' );
					} elseif ( is_year() ) {
						printf( __( 'Yearly Archives: %s', 'half_baked_base' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'half_baked_base' ) ) . '</span>' );
					} elseif ( is_tag() ) {
						printf( __( 'Tag Archives: %s', 'half_baked_base' ), '<span>' . single_tag_title( '', false ) . '</span>' );
					} elseif ( is_category() ) {
						printf( __( 'Category Archives: %s', 'half_baked_base' ), '<span>' . single_cat_title( '', false ) . '</span>' );
					} else {
						_e( 'Blog Archives', 'half_baked_base' );
					}
				?></h1>

				<?php
					// Show an optional tag description.
					if ( is_tag() ) {
						$tag_description = tag_description();
						if ( $tag_description )
							echo '<div class="archive-meta">' . $tag_description . '</div>';
					}
					// Show an optional category description.
					if ( is_category() ) {
						$category_description = category_description();
						if ( $category_description )
							echo '<div class="archive-meta">' . $category_description . '</div>';
					}
				?>
			</header><!-- /. archive-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				get_template_part( 'content', 'post' );

			endwhile;

			half_baked_content_nav( 'nav-below' );
			?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

</section><!-- #primary .archive-->

<?php get_sidebar(); ?>
<?php get_footer(); ?>