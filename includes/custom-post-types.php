<?php
function cptui_register_my_cpts() {

/**
 * Post Type: Recepts.
 */

$labels = [
	"name" => __( "Recepts", "recepttheme" ),
	"singular_name" => __( "Recept", "recepttheme" ),
	"menu_name" => __( "Recepts", "recepttheme" ),
	"all_items" => __( "Recepts", "recepttheme" ),
	"add_new" => __( "Add a new recept", "recepttheme" ),
	"add_new_item" => __( "Add a new recept", "recepttheme" ),
	"edit_item" => __( "Edit Recept", "recepttheme" ),
	"new_item" => __( "New Recept", "recepttheme" ),
	"view_item" => __( "View Recept", "recepttheme" ),
	"view_items" => __( "View Recepts", "recepttheme" ),
	"search_items" => __( "Search Recept", "recepttheme" ),
	"not_found" => __( "No Found Recept", "recepttheme" ),
	"featured_image" => __( "Featured Image", "recepttheme" ),
	"set_featured_image" => __( "Featured Image", "recepttheme" ),
];

$args = [
	"label" => __( "Recepts", "recepttheme" ),
	"labels" => $labels,
	"description" => "If you are looking for tips on a quick lunch dish or a festive fine dinner. ",
	"public" => true,
	"publicly_queryable" => true,
	"show_ui" => true,
	"show_in_rest" => true,
	"rest_base" => "",
	"rest_controller_class" => "WP_REST_Posts_Controller",
	"has_archive" => true,
	"show_in_menu" => true,
	"show_in_nav_menus" => true,
	"delete_with_user" => false,
	"exclude_from_search" => false,
	"capability_type" => "post",
	"map_meta_cap" => true,
	"hierarchical" => false,
	"rewrite" => [ "slug" => "recepts", "with_front" => true ],
	"query_var" => true,
	"supports" => [ "title", "editor", "thumbnail" ],
	"show_in_graphql" => false,
];

register_post_type( "bs_recipie", $args );
}

add_action( 'init', 'cptui_register_my_cpts' );
