<?php
/**
 * The template for displaying a "No posts found" message.
 *
 * @package WordPress
 * @subpackage Half_Baked_Base
 * @since Half-Baked Base 1.0
 */
?>
		<article class="post no-results not-found">

			<header class="entry-header">
                <h1 class="entry-title"><?php _e( 'Nothing found', 'half_baked_base' ); ?></h1>
            </header><!-- .entry-header -->

                <div class="entry-content">
                    <p><?php _e( 'Sorry, no entries were found. Perhaps searching will lead to a new discovery .', 'half_baked_base' ); ?></p>
                    <?php get_search_form(); ?>
                </div><!-- .entry-content -->

		</article><!-- #post-0 -->


