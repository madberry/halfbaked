<?php get_header(); ?>
<div class="grid_8">
<section id="main-content">
<?php if (have_posts()): ?>
	<?php if ( is_category() ) : ?>
	<h1 class="archive-title"><?php single_cat_title(); ?></h1>
	<?php elseif( is_tag() ) : ?>
	<h1 class="archive-title">Posts Tagged &ldquo;<?php single_tag_title(); ?>&rdquo;</h1>
	<?php elseif (is_day()) : ?>
	<h1 class="archive-title">Archive for <?php the_time('F jS, Y'); ?></h1>
	<?php elseif (is_month()) : ?>
	<h1 class="archive-title">Archive for <?php the_time('F, Y'); ?></h1>
	<?php elseif (is_year()) : ?>
	<h1 class="archive-title">Archive for <?php the_time('Y'); ?></h1>
	<?php elseif (is_author()) : ?>
	<h1 class="archive-title">Author Archive</h1>
	<?php elseif (isset($_GET['paged']) && !empty($_GET['paged'])) : ?>
	<h1 class="archive-title">Blog Archives</h1>
	<?php endif; ?>
	<?php rewind_posts();?>
	<?php while (have_posts()) : the_post(); ?>

	<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
		<header>
			<h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
			<p class="meta"><i class="icon-calendar"></i><time datetime="<?php the_time('F jS, Y')?>">&nbsp;&nbsp;Posted <?php echo the_time('F jS, Y') ?></time> <?php if ( comments_open() ) : ?> <span class="comment-meta"><i class="icon-comment"></i>&nbsp;&nbsp;<a class="comment" href="<?php the_permalink(); ?>#comments"><?php comments_number('0 Comments', '1 Comment', '% Comments'); ?></a></span><?php endif; ?></p>
		</header>

		<?php the_content(); ?>

		<footer>
			<p class="meta"><span class="category"><i class="icon-folder-open"></i> Posted in <?php if (function_exists('parentless_categories')) parentless_categories(','); else the_category( ', ', 'multiple' ); ?></span></p>
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