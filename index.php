<?php get_header(); ?>
<div class="grid_8">
<section id="main-content">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>">
<header>
		<h2><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a></h2>
<p class="meta"><i class="icon-calendar"></i><time datetime="<?php the_time('F jS, Y')?>">&nbsp;&nbsp;Posted <?php echo the_time('F jS, Y') ?></time> <?php if ( comments_open() ) : ?> <span class="comment-meta"><i class="icon-comment"></i>&nbsp;&nbsp;<a class="comment" href="<?php the_permalink(); ?>#comments"><?php comments_number('0 Comments', '1 Comment', '% Comments'); ?></a></span><?php endif; ?></p>
			</header>
		<?php the_excerpt(); ?>

			<footer>
			<p class="meta"><span class="category"><i class="icon-folder-open"></i> Posted in <?php if (function_exists('parentless_categories')) parentless_categories(','); else the_category( ', ', 'multiple' ); ?></span></p>
			</footer>
		</article>

	<?php endwhile; endif; ?>


	<nav class="paging">
		<?php if(function_exists('wp_pagenavi')) : wp_pagenavi(); else : ?>
			<div class="prev"><?php next_posts_link('&laquo; Previous Posts') ?></div>
			<div class="next"><?php previous_posts_link('Next Posts &raquo;') ?></div>
		<?php endif; ?>
	</nav>
</section>
</div><!--/.grid_8 -->

<?php get_footer(); ?>