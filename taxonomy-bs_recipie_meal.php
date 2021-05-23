<?php
get_header();


?>

<!-- taxonomy-bs_recipie_meal.php -->
<main class="container">
	<?php if (!get_header_image()) : ?>
		<h1><?php single_cat_title('Meal: '); ?></h1>
	<?php endif; ?>

	<div class="row">
		<div class="col-md-9 content <?php echo $content_order; ?>">
			<!-- Do we have any posts to display? -->
			<?php if (have_posts()) : ?>
				<!-- we has posts do display! -->
				<?php while (have_posts()) : ?>
					<!-- Start post -->
					<?php
						// Load next post to display
						the_post();
						get_template_part('template-parts/content-bs_recipie', 'excerpt');
					?>
					<!-- End post -->
				<?php endwhile; ?>

				<!-- Pagination start -->
				<?php get_template_part('template-parts/posts-pagination'); ?>
				<!-- Pagination end -->
			<?php else: ?>
				<p>Sorry, no meals found.</p>
			<?php endif; ?>
		</div><!-- /.col-md-9 -->

		<aside class="col-md-3 sidebar <?php echo $sidebar_order; ?>">
			<?php get_sidebar('recept'); ?>
		</aside><!-- /.col-md-3 -->

	</div><!-- /.row -->
</main><!-- /.container -->

<?php
get_footer();
