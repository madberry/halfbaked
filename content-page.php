<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package WordPress
 * @subpackage Half_Baked_Base
 * @since Half-Baked Base 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'half_baked_base' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->

    <?php if ( comments_open() ) :
        echo '<p>';
        comments_popup_link( 'No comments yet', '1 comment', '% comments', 'comments-link', 'Comments are off for this post');
        echo '</p>';
    endif; ?>
	<footer class="page-meta">
		<?php edit_post_link( __( 'Edit', 'half_baked_base' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post -->
