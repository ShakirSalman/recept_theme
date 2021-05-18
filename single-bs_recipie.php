<?php
get_header();
?>

<main class="container">

	<pre>single-bs_recipie.php</pre>

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
						get_template_part('template-parts/content-bs_recipie');
					?>
					<!-- End post -->
				<?php endwhile; ?>
			<?php endif; ?>
		</div><!-- /.col-md-9 -->

		<aside class="col-md-3 sidebar">
			<?php get_sidebar('recept'); ?>
		</aside><!-- /.col-md-3 -->

	</div><!-- /.row -->
</main><!-- /.container -->

<?php
get_footer();
