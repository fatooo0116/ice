<?php
/**
 * Lost password form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-lost-password.php.
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

wc_print_notices();


?>
<script type="text/javascript">
(function($){
	$(document).ready(function(){
		$("header.entry-header h1.entry-title,.mobile-nav h2").text('忘記密碼');
	});
})(jQuery);
</script>
<div class="account_outter_box" style="border:0px;margin:auto;">

<form method="post" class="woocommerce-ResetPassword lost_reset_password" >

	<h3 class="hide"><?php echo apply_filters( 'woocommerce_lost_password_message', __( 'Lost your password? Please enter your username or email address. You will receive a link to create a new password via email.', 'woocommerce' ) ); ?></h3>

	<h3 class="ptitle">請輸入您註冊的Email，系統將會寄送重<br/>設密碼通知至您的信箱</h3>

	<p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
		<input class="woocommerce-Input woocommerce-Input--text input-text"   placeholder="請輸入註冊的Email"    type="text" name="user_login" id="user_login" />
	</p>

	<div class="clear"></div>

	<?php do_action( 'woocommerce_lostpassword_form' ); ?>

	<p class="woocommerce-form-row form-row">
		<input type="hidden" name="wc_reset_password" value="true" />
		<input type="submit" class="woocommerce-Button button" value="<?php esc_attr_e( '確定', 'woocommerce' ); ?>" />
	</p>

	<?php wp_nonce_field( 'lost_password' ); ?>

</form>
</div>
