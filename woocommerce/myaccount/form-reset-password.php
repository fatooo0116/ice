<?php
/**
 * Lost password reset form.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-reset-password.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

wc_print_notices(); ?>
<div class="account_outter_box" style="border:0px;margin:auto;">
	<form method="post" class="woocommerce-ResetPassword lost_reset_password">
		<h3 class="ptitle">重設密碼</h3>


		<p  class="hide"><?php echo apply_filters( 'woocommerce_reset_password_message', __( '請輸入新密碼.', 'woocommerce' ) ); ?></p>

		<p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
			<label for="password_1"><?php _e( '請輸入新密碼', 'woocommerce' ); ?> <span class="required">*</span></label>
			<input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password_1" id="password_1" />
		</p>
		<p class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last">
			<label for="password_2"><?php _e( '請再次輸入密碼', 'woocommerce' ); ?> <span class="required">*</span></label>
			<input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password_2" id="password_2" />
		</p>

		<input type="hidden" name="reset_key" value="<?php echo esc_attr( $args['key'] ); ?>" />
		<input type="hidden" name="reset_login" value="<?php echo esc_attr( $args['login'] ); ?>" />

		<div class="clear"></div>

		<?php do_action( 'woocommerce_resetpassword_form' ); ?>

		<p class="woocommerce-form-row form-row">
			<input type="hidden" name="wc_reset_password" value="true" />
			<input type="submit" class="woocommerce-Button button" value="<?php esc_attr_e( '確認', 'woocommerce' ); ?>" />
		</p>

		<?php wp_nonce_field( 'reset_password' ); ?>

	</form>
</div><!-- account_outter_box -->
