<?php
/**
 * Add quantity field on the archive page.
 */

 function custom_quantity_field_archive() {

 	$product = wc_get_product( get_the_ID() );

 	if ( ! $product->is_sold_individually() &&  !$product->has_child() && $product->is_purchasable() ) {
 		woocommerce_quantity_input( array( 'min_value' => 1, 'max_value' => $product->backorders_allowed() ? '' : $product->get_stock_quantity() ) );
 	}

 }
 add_action( 'woocommerce_after_shop_loop_item', 'custom_quantity_field_archive', 0, 9 );

 /**
  * Add requires JavaScript.
  */
 function custom_add_to_cart_quantity_handler() {

 	wc_enqueue_js( '
 		jQuery( ".post-type-archive-product" ).on( "click", ".quantity input", function() {
 			return false;
 		});
 		jQuery( ".post-type-archive-product" ).on( "change input", ".quantity .qty", function() {
 			var add_to_cart_button = jQuery( this ).parents( ".product" ).find( ".add_to_cart_button" );

 			// For AJAX add-to-cart actions
 			add_to_cart_button.data( "quantity", jQuery( this ).val() );

 			// For non-AJAX add-to-cart actions
 			add_to_cart_button.attr( "href", "?add-to-cart=" + add_to_cart_button.attr( "data-product_id" ) + "&quantity=" + jQuery( this ).val() );
 		});
 	' );

 }
 add_action( 'init', 'custom_add_to_cart_quantity_handler' );
