<?php
/**
 * The template for displaying a "No posts found" message.
 *
 * @package WordPress
 * @subpackage Half_Baked_Base
 * @since Half-Baked Base 1.0
 */
?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="entry-header">
                <h1 class="entry-title">
                <a href="<?php the_permalink() ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'half_baked_base' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
            </header><!-- .entry-header -->

                <div class="entry-content">
                    <?php the_content(); ?>
                </div><!-- .entry-content -->

        <footer class="entry-meta">
            <?php half_baked_entry_meta(); ?>
            <?php edit_post_link( __( 'Edit', 'half_baked_base' ), '<span class="edit-link">', '</span>' ); ?>
        </footer><!-- .entry-meta -->
    </article><!-- #post -->


