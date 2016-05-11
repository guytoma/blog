<?php
function theme_enqueue_parent_styles() {
	$parent_style = 'parent-style';
	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_parent_styles' );

function theme_enqueue_child_styles() {
	$parent_style = 'parent-style';
	wp_dequeue_style('sf-main');
	wp_enqueue_style( 'child-style',
		get_stylesheet_directory_uri() . '/style.css',
		array( $parent_style ),
		time()
	);
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_child_styles', 9999 );

function codex_custom_init() {
	$labels = array(
		'name'							=> _x( 'Featured post type', 'region' ),
		'singular_name'					=> _x( 'Featured post type', 'region' ),
		'search_items'					=> __( 'Search featured post type' ),
		'popular_items'					=> __( 'Popular featured post type' ),
		'all_items'						=> __( 'All featured post types' ),
		'parent_item'					=> null,
		'parent_item_colon'				=> null,
		'edit_item'						=> __( 'Edit featured post type' ),
		'update_item'					=> __( 'Update featured post type' ),
		'add_new_item'					=> __( 'Add featured post type' ),
		'new_item_name'					=> __( 'New featured post type name' ),
		'separate_items_with_commas'	=> __( 'Separete featured post types with comas' ),
		'add_or_remove_items'			=> __( 'Add or remove featured post types' ),
		'choose_from_most_used'			=> __( 'Choose from most used featured post types' ),
		'not_found'						=> __( 'Featured post type not found' ),
		'menu_name'						=> __( 'Featured post type' ),
	);
	register_taxonomy( 'featured_post_type', 'post', array(
			'label' => __( 'Featured post type' ),
			'rewrite' => array( 'slug' => 'featured_post_type' ),
			'hierarchical' => true,
			'labels' => $labels,
	));

	$term = term_exists('featured_post', 'featured_post_type');
	if ($term == 0 || $term == null) {
		wp_insert_term( 'Featured post', 'featured_post_type', array(
			'slug' => 'featured_post',
			'description' => 'Marks the fetured post'
		));
	}
}
add_action( 'init', 'codex_custom_init' );
pll_register_string('Read More', 'Read More');
?>