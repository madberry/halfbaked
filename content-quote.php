<?php
/**
 * The template for displaying posts in the Quote post format
 *
 * @package WordPress
 * @subpackage Half_Baked_Base
 * @since Half-Baked Base 1.0
 */
?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="entry-header">
            <?php if ( is_single() ) : ?>
            <h1 class="entry-title"><?php the_title(); ?></h1>
            <?php else : ?>
            <h1 class="entry-title">
                <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'half_baked_base' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
            </h1>
            <?php endif; // is_single() ?>

        </header><!-- .entry-header -->

        <div class="entry-content">
            <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'half_baked_base' ) ); ?>
        </div><!-- .entry-content -->

    <?php if ( comments_open() ) :
        echo '<p>';
        comments_popup_link( 'No comments yet', '1 comment', '% comments', 'comments-link', 'Comments are off for this post');
        echo '</p>';
    endif; ?>
        <footer class="entry-meta">
            <?php half_baked_entry_meta(); ?>
        </footer><!-- .entry-meta -->
    </article><!-- #post -->
