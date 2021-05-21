<?php

function cptui_register_my_taxes() {

	/**
	 * Taxonomy: meals.
	 */

	$labels = [
		"name" => __( "meals", "recepttheme" ),
		"singular_name" => __( "meal", "recepttheme" ),
	];


	$args = [
		"label" => __( "meals", "recepttheme" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'recipie_meal', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"rest_base" => "bs_recipie_meal",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "bs_recipie_meal", [ "bs_recipie" ], $args );

	/**
	 * Taxonomy: tags.
	 */

	$labels = [
		"name" => __( "tags", "recepttheme" ),
		"singular_name" => __( "tag", "recepttheme" ),
	];


	$args = [
		"label" => __( "tags", "recepttheme" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => false,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'recipie_tag', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"rest_base" => "bs_recipie_tag",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "bs_recipie_tag", [ "bs_recipie" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes' );
;
