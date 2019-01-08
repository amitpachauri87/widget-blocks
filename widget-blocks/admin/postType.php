<?php 
$labels = array(
		'name'               => _x( 'Block Widget', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Block Widget', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Block Widget', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Block Widget', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add New', 'Block Widget', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add New Block Widget', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New Block Widget', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit Block Widget', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View Block Widget', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All Block Widget', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Block Widget', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Block Widget:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No Block Widget found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No Block Widget found in Trash.', 'your-plugin-textdomain' )
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,

		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'blocks-widget' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,

		'supports'           => array( 'title')
	);
	register_post_type( 'BlockWidget', $args );