<?php get_header(); ?>
<div class="grid_8">
<section id="main-content">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
		<header>
			<h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

		</header>

		<?php the_content(); ?>




<?php endwhile; endif; ?>
	</article>
</section>
</div><!--/.grid_8 -->
<?php get_footer(); ?>