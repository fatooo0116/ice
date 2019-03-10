
 <?php

 add_action( 'init', 'codex_stick_init' );
 /**
  * Register a store post type.
  *
  * @link http://codex.wordpress.org/Function_Reference/register_post_type
  */
 function codex_stick_init() {
 	$labels = array(
 		'name'               => _x( '客製冰棒棍', 'post type general name', 'ice' ),
 		'singular_name'      => _x( '客製冰棒棍', 'post type singular name', 'ice' ),
 		'menu_name'          => _x( '客製冰棒棍', 'admin menu', 'admin' ),
 		'name_admin_bar'     => _x( '客製冰棒棍', 'add new on admin bar', 'ice' ),
 		'add_new'            => _x( '新增冰棒棍', 'Stick', 'ice' ),
 		'add_new_item'       => __( '新增冰棒棍', 'ice' ),
 		'new_item'           => __( '新增冰棒棍', 'ice' ),
 		'edit_item'          => __( '編輯冰棒棍', 'ice' ),
 		'view_item'          => __( '查看冰棒棍', 'ice' ),
 		'all_items'          => __( 'All Sticks', 'ice' ),
 		'search_items'       => __( 'Search Stick', 'ice' ),
 		'parent_item_colon'  => __( 'Parent Stick:', 'ice' ),
 		'not_found'          => __( 'No Stick found.', 'ice' ),
 		'not_found_in_trash' => __( 'No Stick found in Trash.', 'ice' )
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

 	register_post_type( 'stick', $args );


   $labels = array(
   		'name'              => _x( 'Ｃollection', 'taxonomy general name', 'textdomain' ),
   		'singular_name'     => _x( 'Ｃollection', 'taxonomy singular name', 'textdomain' ),
   		'search_items'      => __( 'Search Ｃollection', 'textdomain' ),
   		'all_items'         => __( 'All Ｃollection', 'textdomain' ),
   		'parent_item'       => __( 'Parent Ｃollection', 'textdomain' ),
   		'parent_item_colon' => __( 'Parent Ｃollection:', 'textdomain' ),
   		'edit_item'         => __( 'Edit Ｃollection', 'textdomain' ),
   		'update_item'       => __( 'Update Ｃollection', 'textdomain' ),
   		'add_new_item'      => __( 'Add New Ｃollection', 'textdomain' ),
   		'new_item_name'     => __( 'New Ｃollection Name', 'textdomain' ),
   		'menu_name'         => __( 'Ｃollection', 'textdomain' ),
   	);

   	$args = array(
   		'hierarchical'      => true,
   		'labels'            => $labels,
   		'show_ui'           => true,
   		'show_admin_column' => true,
   		'query_var'         => true,
   		'rewrite'           => array( 'slug' => 'series' ),
   	);

   	register_taxonomy( 'series', array( 'stick' ), $args );

 }

  ?>
