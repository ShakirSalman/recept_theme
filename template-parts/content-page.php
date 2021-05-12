<article>
	<?php if (!get_header_image()) : ?>
		<h1 class="text-center my-5"><?php the_title(); ?></h1>
	<?php endif; ?>

	<div class="card-text">
		<?php the_content(); ?>
	</div>
</article>
