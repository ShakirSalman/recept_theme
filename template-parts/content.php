<article>
	<header class="mb-3">
		<?php the_post_thumbnail('large', ['class' => 'img-fluid mb-2']); ?>
		<?php if (!get_header_image()) : ?>
			<h1><?php the_title(); ?></h1>
		<?php endif; ?>
	</header>

	<div class="card-text">
		<?php the_content(); ?>
	</div>

	<footer>
		<div class="card-meta text-muted small mb-2">
			Post published <?php echo get_the_date(); ?> at <?php the_time(); ?> by <?php the_author(); ?> in <?php the_category(', '); ?> with tags <?php the_tags(''); ?>
		</div>
	</footer>
</article>
