<?php
get_header();
?>

<main class="container">

	<pre>page.php</pre>

	<hr />

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
				<h1 class="text-center my-5"><?php the_title(); ?></h1>

				<div class="card-text">
					<?php the_content(); ?>
				</div>
			</article>
			<!-- End post -->
		<?php endwhile; ?>
	<?php else: ?>
		<p>Sorry, no post found.</p>
	<?php endif; ?>

</main>

<?php
get_footer();
