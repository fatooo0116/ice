<?php
/**
 * Order tracking form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/order/form-tracking.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post;

?>


<div class="account_outter_box"  id="myaccount_order">
	<form action="<?php echo esc_url( get_permalink( $post->ID ) ); ?>" method="post" class="track_order">

		<h3><?php _e( '請輸入訂單編號與帳號 email 即可查詢訂單明細，如忘記相關資訊可查詢完成購買後寄至信箱的確認信', 'woocommerce' ); ?></h3>

		<p class="form-row form-row-first">
			<label for="orderid"><?php _e( '訂單編號', 'woocommerce' ); ?></label>
			<input class="input-text" type="text" name="orderid" id="orderid" value="<?php echo isset( $_REQUEST['orderid'] ) ? esc_attr( $_REQUEST['orderid'] ) : ''; ?>" placeholder="" />
		</p>

		<p class="form-row form-row-last">
			<label for="order_email"><?php _e( '輸入結帳中的填寫的 Email', 'woocommerce' ); ?></label>
			<input class="input-text" type="text" name="order_email" id="order_email" value="<?php echo isset( $_REQUEST['order_email'] ) ? esc_attr( $_REQUEST['order_email'] ) : ''; ?>" placeholder="" />
		</p>
		<div class="clear"></div>

		<p class="form-row"><input type="submit" class="button" name="track" value="<?php esc_attr_e( '送出', 'woocommerce' ); ?>" /></p>
		<?php wp_nonce_field( 'woocommerce-order_tracking' ); ?>

	</form>
</div>
