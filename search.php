<?php
get_header();
?>

<main class="container mt-3">

	<h1>Search results for "<?php echo htmlspecialchars($_REQUEST['s']); ?>"</h1>

	<pre>search.php</pre>

	<?php get_search_form(); ?>

	<hr />

	<div class="content">
		<!-- Do we have any search results to display? -->
		<?php if (have_posts()) : ?>
			<!-- Yay, we has search results to display! -->
			<?php while (have_posts()) : ?>
				<!-- Start search result -->
				<ul>
					<?php
						// Load next search result to display
						the_post();
						get_template_part('template-parts/content', 'search');
					?>
				</ul>
				<!-- End search result -->
			<?php endwhile; ?>
		<?php else: ?>
			<p>Sorry, no search results found for "<?php echo htmlspecialchars($_REQUEST['s']); ?>".</p>
		<?php endif; ?>
	</div><!-- /.content -->

</main><!-- /.container -->

<?php
get_footer();