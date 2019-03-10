<?php


add_filter ( 'woocommerce_account_menu_items', 'misha_remove_my_account_links' );
function misha_remove_my_account_links( $menu_links ){

	unset( $menu_links['edit-address'] ); // Addresses
	unset( $menu_links['dashboard'] ); // Dashboard
	//unset( $menu_links['payment-methods'] ); // Payment Methods
	//unset( $menu_links['orders'] ); // Orders
	//unset( $menu_links['downloads'] ); // Downloads
	//unset( $menu_links['edit-account'] ); // Account details
	//unset( $menu_links['customer-logout'] ); // Logout

	return $menu_links;

}






/*  remove last name  */

add_filter( 'woocommerce_billing_fields' , 'remove_billing_fields' );
function remove_billing_fields( $fields ) {
         unset($fields['billing_last_name']);
         return $fields;
}




function storefront_child_remove_unwanted_form_fields($fields) {
    unset($fields['billing_last_name']);
    return $fields;
}
add_filter( 'woocommerce_default_address_fields', 'storefront_child_remove_unwanted_form_fields' );












 ?>
