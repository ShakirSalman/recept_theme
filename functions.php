<?php

require_once('includes/Bootstrap_5_WP_Nav_Menu_Walker.php');
require_once('includes/bs5-pagination.php');

/**
 * Register neccessary scripts and styles.
 *
 * @return void
 */
function recept_theme_register_scripts_and_styles() {
	/**
	* Styles
	*/
	// Bootstrap 5
	wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css', [], '5.0.0-beta3', 'all');
	
	// Theme styles
	wp_enqueue_style('recept_theme', get_parent_theme_file_uri('style.css'), ['bootstrap'], '0.1', 'all');
	
	// Print styles
	wp_enqueue_style('recept_theme-print', get_parent_theme_file_uri('print.css'), ['bootstrap'], '0.1', 'print');
	
	/**
	 * Scripts
	 */
	// Bootstrap 5
	 wp_enqueue_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js', [], '5.0.0-beta3', true);
	 
	// Theme scripts
	wp_enqueue_script('recept_theme', get_parent_theme_file_uri('assets/js/scripts.js'), ['bootstrap'], '0.1', true);
}
add_action('wp_enqueue_scripts', 'recept_theme_register_scripts_and_styles');

/**
 * Setup theme.
 *
 * @return void
 */
 function recept_theme_theme_setup() {

	/**
	 * Declare support for title-tag.
	 */
	add_theme_support('title-tag');

	/**
	 * Declare support for post-thumbnails.
	 */
	add_theme_support('post-thumbnails');

	/**
	 * Declare support for custom logo.
	 */
	add_theme_support('custom-logo', [
		'height' => 100,
		'width' => 200,
	]);
	
	/**
	* Declare support for custom header image.
	*/
	add_theme_support('custom-header', [
	// Display the header text along with the image
	'header-text' => true,

	// Header image width (in pixels)
	'width' => 2560,

	// Header image height (in pixels)
	'height' => 500,

	// Allow flexible image width
	'flex-width' => true,

	// Allow flexible image height
	'flex-height' => true,
	]);

	/**
	 * Declare our own image size for archives
	 */
	add_image_size('featured-image-thumb', 400, 9999);

}
add_action('after_setup_theme', 'recept_theme_theme_setup');

/**
 * Output custom logo (if set, otherwise output site title).
 *
 * @return void
 */
function recept_theme_navbar_brand() {
	$custom_logo_id = get_theme_mod('custom_logo');
	$logo = wp_get_attachment_image_src($custom_logo_id, 'full');

	if ($logo) {
		echo '<img src="' . esc_url($logo[0]) . '" alt="' . get_bloginfo('name') . '">';
	} else {
		echo get_bloginfo('name');
	}
}

/**
 * Register theme modifications in WP Customizer
 *
 * @param WP_Customize_Manager $wp_customizer
 * @return void
 */
function recept_theme_customizer($wp_customizer) {
	// Use Header Textshadow?
	$wp_customizer->add_setting('header_textshadow', [
		'default' => false,
	]);
	$wp_customizer->add_control(
		new WP_Customize_Control(
			$wp_customizer,
			'header_textshadow',
			[
				'label' => 'Header Textshadow',			// Admin-visible name of the control
				'setting' => 'header_textshadow',		// Which setting to load and manipulate
				'section' => 'colors', 					// ID of the section this control should render in
				'type' => 'checkbox',
			]
		)
	);
	
	// Header Textshadow Color
	$wp_customizer->add_setting('header_textshadow_color', [
		'default' => '#dddddd',
	]);
	$wp_customizer->add_control(
		new WP_Customize_Color_Control(
			$wp_customizer,
			'header_textshadow_color',
			[
				'label' => 'Header Textshadow Color',			// Admin-visible name of the control
				'setting' => 'header_textshadow_color',			// Which setting to load and manipulate
				'section' => 'colors', 							// ID of the section this control should render in
				'sanitize_callback' => 'sanitize_hex_color',	// Sanitize HEX color
			]
		)
	);

	// Header Textshadow offset-x
	$wp_customizer->add_setting('header_textshadow_offset_x', [
		'default' => '0',
	]);
	$wp_customizer->add_control(
		new WP_Customize_Control(
			$wp_customizer,
			'header_textshadow_offset_x',
			[
				'label' => 'Header Textshadow Offset X',		// Admin-visible name of the control
				'description' => 'Offset in pixels',			// Admin-visible description of the control
				'setting' => 'header_textshadow_offset_x',		// Which setting to load and manipulate
				'section' => 'colors', 							// ID of the section this control should render in
				'sanitize_callback' => 'recept_theme_sanitize_int',		// Sanitize integer
				'type' => 'number',
			]
		)
	);

	// Header Textshadow offset-y
	$wp_customizer->add_setting('header_textshadow_offset_y', [
		'default' => '0',
	]);
	$wp_customizer->add_control(
		new WP_Customize_Control(
			$wp_customizer,
			'header_textshadow_offset_y',
			[
				'label' => 'Header Textshadow Offset Y',		// Admin-visible name of the control
				'description' => 'Offset in pixels',			// Admin-visible description of the control
				'setting' => 'header_textshadow_offset_y',		// Which setting to load and manipulate
				'section' => 'colors', 							// ID of the section this control should render in
				'sanitize_callback' => 'recept_theme_sanitize_int',		// Sanitize integer
				'type' => 'number',
			]
		)
	);

	// Header Textshadow blur-radius
	$wp_customizer->add_setting('header_textshadow_blur_radius', [
		'default' => '0',
	]);
	$wp_customizer->add_control(
		new WP_Customize_Control(
			$wp_customizer,
			'header_textshadow_blur_radius',
			[
				'label' => 'Header Textshadow Blur Radius',		// Admin-visible name of the control
				'description' => 'Blur radius in pixels',		// Admin-visible description of the control
				'setting' => 'header_textshadow_blur_radius',	// Which setting to load and manipulate
				'section' => 'colors', 							// ID of the section this control should render in
				'sanitize_callback' => 'recept_theme_sanitize_int',		// Sanitize integer
				'type' => 'number',
				'input_attrs' => [
					'min' => '0',
				],
			]
		)
	);
	
	// Blog Section
	$wp_customizer->add_section('recept_theme_blog', [
		'title' => 'Blog Settings',
		'priority' => 30,
	]);

	// Blog sidebar
	$wp_customizer->add_setting('blog_sidebar', [
		'default' => 'right',
	]);
	$wp_customizer->add_control('blog_sidebar', [
		'label' => 'Blog Sidebar Location',
		'description' => 'This applies to devices ≥768px.',
		'setting' => 'blog_sidebar',
		'section' => 'recept_theme_blog',
		'type' => 'radio',
		'choices' => [
			'left' => 'Left',
			'right' => 'Right',
		],
	]);
}
add_action('customize_register', 'recept_theme_customizer');

/**
 * Sanitizes an integer.
 *
 * @param mixed $input
 * @return int
 */
 function recept_theme_sanitize_int($input) {
	return filter_var($input, FILTER_SANITIZE_NUMBER_INT);
}

/**
 * Output neccessary CSS for our theme modifications in WP Customizer.
 *
 * @return void
 */
function recept_theme_wp_head_customizer_css() {
	$styles = [];

	$header_textcolor = get_theme_mod('header_textcolor');
	array_push($styles, "#site-header .header-text-wrapper {
		color: #{$header_textcolor};
	}");

	if (get_theme_mod('header_textshadow')) {
		$header_textshadow = sprintf(
			"%dpx %dpx %dpx %s",
			get_theme_mod('header_textshadow_offset_x'),
			get_theme_mod('header_textshadow_offset_y'),
			get_theme_mod('header_textshadow_blur_radius'),
			get_theme_mod('header_textshadow_color')
		);
		array_push($styles, "#site-header .header-text-wrapper {
			text-shadow: {$header_textshadow};
		}");
	}

	printf("<style>%s</style>", implode("\n", $styles));
}
add_action('wp_head', 'recept_theme_wp_head_customizer_css');

/**
 * Register navigation menus.
 */
 function recept_theme_register_nav_menus() {
	// register theme menu locations
	register_nav_menus([
		'header-menu' => 'Header Menu',
	]);
}
add_action('init', 'recept_theme_register_nav_menus');

/**
 * Change length of auto-generated excerpt.
 *
 * @param int $length
 * @return int
 */
function recept_theme_excerpt_length($length) {
	return 10;
}
add_filter('excerpt_length', 'recept_theme_excerpt_length', 10, 1);

/**
 * Change suffix on auto-generated excerpt.
 *
 * @param string $suffix
 * @return string
 */
function recept_theme_filter_excerpt_more($suffix) {
	return "...";
}
add_filter('excerpt_more', 'recept_theme_filter_excerpt_more');

/**
 * Append a 'Read more'-button to excerpts.
 *
 * @param string $excerpt
 * @return string
 */
function recept_theme_filter_the_excerpt($excerpt) {
	return $excerpt . '<div><a href="' . get_the_permalink() . '" class="btn btn-primary">Read more &raquo;</a></div>';
}
add_filter('the_excerpt', 'recept_theme_filter_the_excerpt');
 
 /**
 * Register widget areas (sidebars).
 *
 * @return void
 */
function recept_theme_widgets_init() {
	// Blog widget area
	register_sidebar([
		'name' => 'Blog Sidebar',
		'id' => 'blog-sidebar',
		'description' => 'Sidebar on blog index, category archive and single blog posts.',
		'before_widget' => '<div id="%1$s" class="card mb-3 widget %2$s"><div class="card-body">',
		'after_widget' => '</div></div>',
		'before_title' => '<h3 class="widget-title h5">',
		'after_title' => '</h3>',
	]);
	
	// Footer widget area
	register_sidebar([
		'name' => 'Footer',
		'id' => 'sidebar-footer',
		'description' => 'Page Footer',
		'before_widget' => '<div id="%1$s" class="text-justify col widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title h5">',
		'after_title' => '</h3>',
	]);
	
	// Page widget area
	register_sidebar([
		'name' => 'Page Sidebar',
		'id' => 'page-sidebar',
		'description' => 'Sidebar on pages.',
		'before_widget' => '<div id="%1$s" class="card mb-3 widget %2$s"><div class="card-body">',
		'after_widget' => '</div></div>',
		'before_title' => '<h3 class="widget-title h5">',
		'after_title' => '</h3>',
	]);
}
add_action('widgets_init', 'recept_theme_widgets_init');

/**
 * Filters content from bad words and replaces them with asterisk.
 *
 * @param string $content The content to be filtered
 * @return string The filtered content
 */
 function recept_theme_filter_bad_words($content) {
	$bad_words_raw = file_get_contents(get_parent_theme_file_path('includes/bad_words.txt'));
	$bad_words_raw = trim($bad_words_raw);
	$bad_words = explode("\n", $bad_words_raw);
	$censored_words = [];

	foreach ($bad_words as $bad_word) {
		$len = strlen($bad_word);
		$censored_word = str_repeat('*', $len);
		array_push($censored_words, $censored_word);
	}

	return str_ireplace($bad_words, $censored_words, $content);
}
add_filter('the_content', 'recept_theme_filter_bad_words');
add_filter('the_excerpt', 'recept_theme_filter_bad_words');
add_filter('the_title', 'recept_theme_filter_bad_words');

function recept_theme_post_meta($display = true) {
	$post_meta = sprintf(
		"Post published %s at %s by %s in %s",
		get_the_date(),
		get_the_time(),
		get_the_author(),
		get_the_category_list(', ')
	);

	if (has_tag()) {
		$post_meta = sprintf(
			"%s with tags %s",
			$post_meta,
			get_the_tag_list('', ', ')
		);
	}

	if ($display) {
		echo $post_meta;
	} else {
		return $post_meta;
	}
}

/**
 * Add class to next/previous posts links
 *
 * @return string;
 */
 function recept_theme_filter_pagination_links() {
	return 'class="btn btn-secondary"';
}
add_filter('next_posts_link_attributes', 'recept_theme_filter_pagination_links', 10, 0);
add_filter('previous_posts_link_attributes', 'recept_theme_filter_pagination_links', 10, 0);