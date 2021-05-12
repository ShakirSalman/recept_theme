<?php

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
function mbt_filter_excerpt_more($suffix) {
	return "...";
}
add_filter('excerpt_more', 'mbt_filter_excerpt_more');

/**
 * Append a 'Read more'-button to excerpts.
 *
 * @param string $excerpt
 * @return string
 */
function mbt_filter_the_excerpt($excerpt) {
	return $excerpt . '<div><a href="' . get_the_permalink() . '" class="btn btn-primary">Read more &raquo;</a></div>';
}
add_filter('the_excerpt', 'mbt_filter_the_excerpt');

/**
 * Declare support for 'title-tag'
 */
 add_theme_support('title-tag');