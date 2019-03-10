<?php
/**
 * Checkout login form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}



if ( is_user_logged_in() || 'no' === get_option( 'woocommerce_enable_checkout_login_reminder' ) ) {
	return;
}

$info_message  = apply_filters( 'woocommerce_checkout_login_message', __( '<i class="ion-android-person"></i> 已經是註冊會員？', 'woocommerce' ) );
$info_message .= ' <a href="#" class="showlogin">' . __( '請點擊這裡登入', 'woocommerce' ) . '</a>';
wc_print_notice( $info_message, 'notice' );

woocommerce_login_form(
	array(
		'message'  => __( '如有帳戶請直接登入，尚未註冊的用戶可在下方勾選註冊成會員，完成下單後就成為會員了！', 'woocommerce' ),
		'redirect' => site_url('/cart/'),
		'hidden'   => true,
	)
);

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
