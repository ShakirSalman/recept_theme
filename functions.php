<?php

require_once('includes/Bootstrap_5_WP_Nav_Menu_Walker.php');

function recept_theme_register_scripts_and_styles() {
	// Bootstrap 5
	wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css', [], '5.0.0-beta3', 'all');
	
	// Theme styles
	wp_enqueue_style('recept_theme', get_parent_theme_file_uri('style.css'), ['bootstrap'], '0.1', 'all');
	
	// Print styles
	wp_enqueue_style('recept_theme-print', get_parent_theme_file_uri('print.css'), ['bootstrap'], '0.1', 'print');
}
add_action('wp_enqueue_scripts', 'recept_theme_register_scripts_and_styles');

/**
 * Declare support for title-tag.
 */
add_theme_support('title-tag');

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
	register_sidebar([
		'name' => 'Blog Sidebar',
		'id' => 'blog-sidebar',
		'description' => 'Sidebar on blog index, category archive and single blog posts.',
		'before_widget' => '<div id="%1$s" class="card mb-3 widget %2$s"><div class="card-body">',
		'after_widget' => '</div></div>',
		'before_title' => '<h3 class="widget-title h5">',
		'after_title' => '</h3>',
	]);
}
add_action('widgets_init', 'recept_theme_widgets_init');