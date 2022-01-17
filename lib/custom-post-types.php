<?php

namespace Tenacity\PostTypes;

function tenacity_register_testimonials() {
  $labels = array(
		'name'                => __( 'Testimonials' ),
		'singular_name'       => __( 'Testimonial'),
		'menu_name'           => __( 'Testimonials'),
		'parent_item_colon'   => __( 'Parent Testimonial'),
		'all_items'           => __( 'All Testimonials'),
		'view_item'           => __( 'View Testimonial'),
		'add_new_item'        => __( 'Add New Testimonial'),
		'add_new'             => __( 'Add New'),
		'edit_item'           => __( 'Edit Testimonial'),
		'update_item'         => __( 'Update Testimonial'),
		'search_items'        => __( 'Search Testimonial'),
		'not_found'           => __( 'Not Found'),
		'not_found_in_trash'  => __( 'Not found in Trash')
	);
	$args = array(
		'label'               => __( 'deals'),
		'description'         => __( 'Customer Testimonials'),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions'),
		'public'              => true,
		'hierarchical'        => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'has_archive'         => true,
		'can_export'          => true,
		'exclude_from_search' => true,
		'taxonomies' 	      => array('post_tag', 'category'),
		'publicly_queryable'  => true,
    'capability_type'     => 'page'
  );
  register_post_type('testimonials', $args);
}

add_action('init', __NAMESPACE__ . '\\tenacity_register_testimonials', 0);

