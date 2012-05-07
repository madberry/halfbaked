<?php get_header(); ?>
<div class="grid_8">
<section id="main-content">


		<h1 class="pagetitle">Search Results: &ldquo;<?php the_search_query(); ?>&rdquo; <?php if (get_query_var('paged')) echo ' &mdash; Page '.get_query_var('paged'); ?></h1>
	<?php endif; ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<header>
				<h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<p class="meta"><time datetime="<?php the_time('Y-m-d')?>">Posted <?php the_time('F jS, Y') ?></time> <span class="author">by <?php the_author() ?></span>. <?php if ( comments_open() ) : ?><a class="comment" href="<?php the_permalink(); ?>#comments"><?php comments_number('0 Comments', '1 Comment', '% Comments'); ?></a><?php endif; ?></p>
			</header>

			<?php the_content(''); ?>

			<footer>
				<span class="category">Posted in <?php if (function_exists('parentless_categories')) parentless_categories(','); else the_category( ', ', 'multiple' ); ?></span>
				<?php the_tags('<span class="tags">Tagged as ', ', ', '</span>'); ?>
			</footer>
		</article>

	<?php endwhile; else: ?>
		<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
	<?php endif; ?>

	<?php if (show_posts_nav()) : ?>
	<nav class="paging">
		<?php if(function_exists('wp_pagenavi')) : wp_pagenavi(); else : ?>
			<div class="prev"><?php next_posts_link('&laquo; Previous Posts') ?></div>
			<div class="next"><?php previous_posts_link('Next Posts &raquo;') ?></div>
		<?php endif; ?>
	</nav>
	<?php endif; ?>

</section>
</div><!--/.grid_8 -->
<?php get_footer(); ?>