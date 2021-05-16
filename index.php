<?php
get_header();
?>

<div class="container">

	<pre>index.php</pre>

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
					<article class="card mb-4">

						<?php if (has_post_thumbnail()) : ?>
							<div class="row g-0">
								<div class="col-md-4">
									<?php the_post_thumbnail('post-thumbnail', ['class' => 'img-fluid']); ?>
								</div><!-- /.col-md-4 -->

								<div class="col-md-8">
						<?php endif; ?>
									<div class="card-body">
										<h2 class="card-title h4">
											<a href="<?php the_permalink(); ?>">
												<?php the_title(); ?>
											</a>
										</h2>
										<div class="card-meta text-muted small mb-2">
											Post published <?php echo get_the_date(); ?> at <?php the_time(); ?> by <?php the_author(); ?> in <?php the_category(', '); ?>
										</div>

										<div class="card-text">
											<!-- before the_excerpt(); -->
											<?php the_excerpt(); ?>
											<!-- after the_excerpt(); -->
										</div>
									</div>
						<?php if (has_post_thumbnail()) : ?>
								</div><!-- /.col-md-8 -->

							</div><!-- /.row -->
						<?php endif; ?>

					</article>
					<!-- End post -->
				<?php endwhile; ?>
			<?php else: ?>
				<p>Sorry, no posts found.</p>
			<?php endif; ?>
		</div><!-- /.col-md-9 -->

		<div class="col-md-3 sidebar">
			<?php get_sidebar(); ?>
		</div><!-- /.col-md-3 -->

	</div><!-- /.row -->
</div><!-- /.container -->

<?php
get_footer();