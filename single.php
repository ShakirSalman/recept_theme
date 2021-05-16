<?php
get_header();
?>

<main class="container">

	<pre>single.php</pre>

	<hr />

	<div class="row">
		<div class="col-md-9 content">
			<!-- Do we have any posts to display? -->
			<?php if (have_posts()) : ?>
				<!-- Yay, we has posts do display! -->
				<?php while (have_posts()) : ?>
					<!-- Start post -->
					<?php
						// Load next post to display
						the_post();
					?>
					<article>
						<header class="mb-3">
							<?php the_post_thumbnail('large', ['class' => 'img-fluid mb-2']); ?>
							<h1><?php the_title(); ?></h1>
						</header>

						<div class="card-text">
							<?php the_content(); ?>
						</div>

						<footer>
							<div class="card-meta text-muted small mb-2">
								Post published <?php echo get_the_date(); ?> at <?php the_time(); ?> by <?php the_author(); ?> in <?php the_category(', '); ?>
							</div>
						</footer>
					</article>
					<!-- End post -->
				<?php endwhile; ?>
			<?php else: ?>
				<p>Sorry, no post found.</p>
			<?php endif; ?>
		</div><!-- /.col-md-9 -->

		<aside class="col-md-3 sidebar">
			<?php get_sidebar(); ?>
		</aside><!-- /.col-md-3 -->

	</div><!-- /.row -->
</main><!-- /.container -->

<?php
get_footer();