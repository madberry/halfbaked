<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage Half_Baked_Base
 * @since Half-Baked Base 1.0
 */

get_header(); ?>

        	<div id="primary">

			<article class="error404">
				<header class="entry-header">
					<h1><?php _e( 'Something is Missing', 'half_baked_base' ); ?> <span>:(</span></h1>
				</header>

				<div class="entry-content">

            <p>Sorry, but the page you were trying to view does not exist.</p>
            <p>It looks like this was the result of either:</p>
            <ul>
                <li>a mistyped address</li>
                <li>an out-of-date link</li>
            </ul>
            <?php get_search_form(); ?>
        </div><!-- .entry-content -->
			</article><!-- .error404 -->

	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>