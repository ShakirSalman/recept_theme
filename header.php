<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<header>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="/">
					<?php recept_theme_navbar_brand(); ?>
				</a>

				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<?php
					// output the menu set for theme location `header-menu`
					wp_nav_menu([
						'theme_location' => 'header-menu',
						'container_class' => 'collapse navbar-collapse',
						'container_id' => 'navbarNav',
						'menu_class' => '',
						'items_wrap' => '<ul id="%1$s" class="navbar-nav ms-auto mb-2 mb-md-0 %2$s">%3$s</ul>',
						'fallback_cb' => '__return_false',
						'depth' => 2,
						'walker' => new Bootstrap_5_WP_Nav_Menu_Walker(),
					]);
				?>
			</div>
		</nav>

		<?php if (get_header_image()) : ?>
			<?php
				if (is_category()) {
					$title = single_cat_title('Category: ', false);

				} else if (is_tag()) {
					$title = single_tag_title('Tag: ', false);

				} else if (is_post_type_archive()) {
					$title = post_type_archive_title('', false);

				} else if (is_tax('bs_recipie_meal')) {
					$title = single_term_title('Meal: ', false);

				} else if (is_home()) {
					$title = "Blog";

				} else if (is_search()) {
					$title = sprintf('Search results for "%s"', htmlspecialchars($_REQUEST['s']));

				} else {
					$title = get_the_title();
				}
			?>
			<div id="site-header">
				<img src="<?php header_image(); ?>"
					width="<?php echo absint(get_custom_header()->width); ?>"
					height="<?php echo absint(get_custom_header()->height); ?>"
					alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>"
					class="img-fluid"
				>
				<div class="header-text-wrapper">
					<div class="header-text display-4"><?php echo $title; ?></div>
				</div>
			</div>
		<?php endif; ?>
	</header>
