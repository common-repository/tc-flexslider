<?php
// Custom Post Type Setup
function tc_flexslider_post_type() {
	$labels = array(
		'name' => __('All TC Sliders', 'tc-flexslider'),
		'singular_name' => __('TC Slider', 'tc-flexslider'),
		'add_new' => __('Add New Slider', 'tc-flexslider'),
		'all_items' => __('All Sliders', 'tc-flexslider' ),
		'add_new_item' => __('Add New Slider', 'tc-flexslider'),
		'edit_item' => __('Edit Slider', 'tc-flexslider'),
		'new_item' => __('New Slider', 'tc-flexslider'),
		'view_item' => __('View Slider', 'tc-flexslider'),
		'search_items' => __('Search Slider', 'tc-flexslider'),
		'not_found' => __('No Slider', 'tc-flexslider'),
		'not_found_in_trash' => __('No Slider found in Trash', 'tc-flexslider'),
		'parent_item_colon' => '',
		'menu_name' => __('TC  FlexSlider', 'tc-flexslider') // this name will be shown on the menu
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'exclude_from_search' => true,
		'publicly_queryable' => false,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'page',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => 5,
		'menu_icon' =>'dashicons-format-gallery',
		'supports' => array('title','thumbnail','excerpt','page-attributes')
	);
	register_post_type('tcflexslider', $args);
}
 add_action( 'init', 'tc_flexslider_post_type' );
