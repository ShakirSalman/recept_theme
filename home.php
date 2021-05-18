<?php
get_header();

$content_order = "";
$sidebar_order = "";
if (get_theme_mod('blog_sidebar') === 'left') {
	$content_order = "order-md-2";
	$sidebar_order = "order-md-1";
}
?>

<!-- home.php -->
<main class="container mt-3">

	<?php if (!get_header_image()) : ?>
		<h1>Blog</h1>
	<?php endif; ?>

	<div class="row">
		<div class="col-md-9 content <?php echo $content_order; ?>">
			<!-- Do we have any posts to display? -->
			<?php if (have_posts()) : ?>
				<!-- Yay, we has posts do display! -->
				<?php while (have_posts()) : ?>
					<!-- Start post -->
					<?php
						// Load next post to display
						the_post();
						get_template_part('template-parts/content', 'excerpt');
					?>
					<!-- End post -->
				<?php endwhile; ?>

				<!-- Pagination start -->
				<?php get_template_part('template-parts/posts-pagination'); ?>
				<!-- Pagination end -->
			<?php else: ?>
				<p>Sorry, no posts found.</p>
			<?php endif; ?>
		</div><!-- /.col-md-9 -->

		<aside class="col-md-3 sidebar <?php echo $sidebar_order; ?>">
			<?php get_sidebar(); ?>
		</aside><!-- /.col-md-3 -->

	</div><!-- /.row -->
</main><!-- /.container -->

<?php
get_footer();
