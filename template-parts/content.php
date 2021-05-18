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
			<?php recept_theme_post_meta(); ?>
		</div>
	</footer>
</article>
