<?php
get_header();
?>

<!-- page.php -->
<main class="container">

	<!-- Do we have any posts to display? -->
	<?php if (have_posts()) : ?>
		<!-- Yay, we has posts do display! -->
		<?php while (have_posts()) : ?>
			<!-- Start post -->
			<?php
				// Load next post to display
				the_post();
				get_template_part('template-parts/content', 'page');
			?>

			<!-- End post -->
		<?php endwhile; ?>
	<?php else: ?>
		<p>Sorry, no Page found.</p>
	<?php endif; ?>

</main>

<?php
get_footer();
