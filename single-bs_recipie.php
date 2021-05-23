<?php
get_header();
?>

<!-- single-bs_recipie.php -->
<main class="container">
		<!-- Do we have any posts to display? -->
		<?php if (have_posts()) : ?>
			<!-- we has posts do display! -->
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
</main><!-- /.container -->

<?php
get_footer();
