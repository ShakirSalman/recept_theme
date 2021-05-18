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
			<?php bs_recipie_meta(); ?>
		</div>
	</footer>
</article>

<div class="d-flex">
	<a href="<?php echo get_post_type_archive_link('bs_recipie'); ?>" class="page-link">&laquo; All Recepts</a>
</div>
