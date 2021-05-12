<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

	<?php wp_head(); ?>
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container">
			<a class="navbar-brand" href="/">
				<?php bloginfo('name'); ?>
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
