<?php

add_action( 'init', 'codex_event_init' );
/**
 * Register a event post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function codex_event_init() {
	$labels = array(
		'name'               => _x( '大事記', 'post type general name', 'ice' ),
		'singular_name'      => _x( '大事記', 'post type singular name', 'ice' ),
		'menu_name'          => _x( '大事記', 'admin menu', 'admin' ),
		'name_admin_bar'     => _x( '大事記', 'add new on admin bar', 'ice' ),
		'add_new'            => _x( '新增大事記', 'event', 'ice' ),
		'add_new_item'       => __( '新增大事記', 'ice' ),
		'new_item'           => __( '新增大事記', 'ice' ),
		'edit_item'          => __( '編輯大事記', 'ice' ),
		'view_item'          => __( '查看大事記', 'ice' ),
		'all_items'          => __( 'All events', 'ice' ),
		'search_items'       => __( 'Search events', 'ice' ),
		'parent_item_colon'  => __( 'Parent events:', 'ice' ),
		'not_found'          => __( 'No events found.', 'ice' ),
		'not_found_in_trash' => __( 'No events found in Trash.', 'ice' )
	);

	$args = array(
		'labels'             => $labels,
    'description'        => __( 'Description.', 'ice' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		// 'rewrite'            => array( 'slug' => 'event' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' )
	);

	register_post_type( 'event', $args );
}

 ?>
