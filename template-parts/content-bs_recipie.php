<article>
	<header class="mb-3">
		<?php the_post_thumbnail('large', ['class' => 'img-fluid mb-2']); ?>
		<?php if (!get_header_image()) : ?>
			<h1><?php the_title(); ?></h1>
		<?php endif; ?>
	</header>
	<div class="details">
		<div >
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16">
			<path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
			<path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
			</svg>
			<?php echo __('Serves:', "recepttheme") . (get_field('servings')) . 'persons' ?>
		</div>

		<div>
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-alarm-fill" viewBox="0 0 16 16">
  			<path d="M6 .5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H9v1.07a7.001 7.001 0 0 1 3.274 12.474l.601.602a.5.5 0 0 1-.707.708l-.746-.746A6.97 6.97 0 0 1 8 16a6.97 6.97 0 0 1-3.422-.892l-.746.746a.5.5 0 0 1-.707-.708l.602-.602A7.001 7.001 0 0 1 7 2.07V1h-.5A.5.5 0 0 1 6 .5zm2.5 5a.5.5 0 0 0-1 0v3.362l-1.429 2.38a.5.5 0 1 0 .858.515l1.5-2.5A.5.5 0 0 0 8.5 9V5.5zM.86 5.387A2.5 2.5 0 1 1 4.387 1.86 8.035 8.035 0 0 0 .86 5.387zM11.613 1.86a2.5 2.5 0 1 1 3.527 3.527 8.035 8.035 0 0 0-3.527-3.527z"/>
			</svg>
			<?php echo __('Cook:', "recepttheme") . (get_field('cook')) . 'mins' ?>
		</div>
	</div>

	<div class="card-text">
		<?php the_content(); ?>
	</div>
	<div>
		<h2>instructions</h2>
		<?php echo (get_field('instructions')); ?>
	</div>

	<footer>
		<div class="card-meta text-muted small mb-2">
			<?php bs_recipie_meta(); ?>
		</div>
	</footer>
</article>

<div class="d-flex">
	<a href="<?php echo get_post_type_archive_link('bs_recipie'); ?>" class="page-link">
		<?php echo __("&laquo; All Recepts", "recepttheme"); ?>
	</a>
</div>
