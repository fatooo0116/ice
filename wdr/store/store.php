<?php

add_action( 'init', 'codex_store_init' );
/**
 * Register a store post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function codex_store_init() {
	$labels = array(
		'name'               => _x( '門市據點', 'post type general name', 'ice' ),
		'singular_name'      => _x( '門市據點', 'post type singular name', 'ice' ),
		'menu_name'          => _x( '門市據點', 'admin menu', 'admin' ),
		'name_admin_bar'     => _x( 'Store', 'add new on admin bar', 'ice' ),
		'add_new'            => _x( 'Add New', 'store', 'ice' ),
		'add_new_item'       => __( 'Add New store', 'ice' ),
		'new_item'           => __( 'New store', 'ice' ),
		'edit_item'          => __( 'Edit store', 'ice' ),
		'view_item'          => __( 'View store', 'ice' ),
		'all_items'          => __( 'All stores', 'ice' ),
		'search_items'       => __( 'Search stores', 'ice' ),
		'parent_item_colon'  => __( 'Parent stores:', 'ice' ),
		'not_found'          => __( 'No stores found.', 'ice' ),
		'not_found_in_trash' => __( 'No stores found in Trash.', 'ice' )
	);

	$args = array(
		'labels'             => $labels,
    'description'        => __( 'Description.', 'ice' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		// 'rewrite'            => array( 'slug' => 'store' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' )
	);

	register_post_type( 'store', $args );


  $labels = array(
  		'name'              => _x( 'Type', 'taxonomy general name', 'textdomain' ),
  		'singular_name'     => _x( 'Type', 'taxonomy singular name', 'textdomain' ),
  		'search_items'      => __( 'Search Type', 'textdomain' ),
  		'all_items'         => __( 'All Type', 'textdomain' ),
  		'parent_item'       => __( 'Parent Type', 'textdomain' ),
  		'parent_item_colon' => __( 'Parent Type:', 'textdomain' ),
  		'edit_item'         => __( 'Edit Type', 'textdomain' ),
  		'update_item'       => __( 'Update Type', 'textdomain' ),
  		'add_new_item'      => __( 'Add New Type', 'textdomain' ),
  		'new_item_name'     => __( 'New Type Name', 'textdomain' ),
  		'menu_name'         => __( 'Type', 'textdomain' ),
  	);

  	$args = array(
  		'hierarchical'      => true,
  		'labels'            => $labels,
  		'show_ui'           => true,
  		'show_admin_column' => true,
  		'query_var'         => true,
  		'rewrite'           => array( 'slug' => 'type' ),
  	);

  	register_taxonomy( 'type', array( 'store' ), $args );

}

 ?>
