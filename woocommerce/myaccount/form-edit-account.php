<?php
/**
 * Edit account form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-edit-account.php.
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
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_edit_account_form' ); ?>

<style media="screen">
	#wdr-menu .myaccount a{
		background-color: #a0ac48;
		border-radius: 20px;
		color:#fff;
	}
</style>
<div id="edit_my_account">
	<form class="woocommerce-EditAccountForm edit-account" action="" method="post">

		<?php do_action( 'woocommerce_edit_account_form_start' ); ?>
		<h3 class="basic"><?php _e( '基本資料', 'woocommerce' ); ?></h3>
		<p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
			<label for="account_first_name"><?php _e( '姓名', 'woocommerce' ); ?> <span class="required">*</span></label>
			<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_first_name" id="account_first_name" value="<?php echo esc_attr( $user->first_name ); ?>" />
		</p>
		<!-- #   hide -->
		<p class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last  hide">
			<label for="account_last_name"><?php _e( 'Last name', 'woocommerce' ); ?> <span class="required">*</span></label>
			<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_last_name" id="account_last_name" value="iceuser" />
		</p>
		<div class="clear"></div>
		<!-- #   hide -->

		<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
			<label for="account_email"><?php _e( 'Email', 'woocommerce' ); ?> <span class="required">*</span></label>
			<input type="email" class="woocommerce-Input woocommerce-Input--email input-text" name="account_email" id="account_email" value="<?php echo esc_attr( $user->user_email ); ?>" />
		</p>




		<?php do_action( 'woocommerce_edit_account_form' ); ?>

		<fieldset>
			<h3 class="passwd"><?php _e( '重設密碼', 'woocommerce' ); ?></h3>

			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<label for="password_current"><?php _e( '目前密碼', 'woocommerce' ); ?></label>
				<span class="check_passwd">
					<input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_current" id="password_current" />
					<a href="#" class="chex"></a>
				</span>
			</p>
			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<label for="password_1"><?php _e( '新的密碼', 'woocommerce' ); ?></label>
				<span class="check_passwd">
				<input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_1" id="password_1" />
				<a href="#" class="chex"></a>
				</span>
			</p>
			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<label for="password_2"><?php _e( '在輸入一次新的密碼', 'woocommerce' ); ?></label>
				<span class="check_passwd">
				<input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_2" id="password_2" />
				<a href="#" class="chex"></a>
			 </span>
			</p>
		</fieldset>
		<div class="clear"></div>


		<p>
			<?php wp_nonce_field( 'save_account_details' ); ?>
			<div class="subtx">
				請記得在送出前確認您的密碼正確無誤喔！
			</div>
			<input type="submit" class="woocommerce-Button button" name="save_account_details" value="<?php esc_attr_e( '確定', 'woocommerce' ); ?>" />
			<input type="hidden" name="action" value="save_account_details" />
		</p>

		<?php do_action( 'woocommerce_edit_account_form_end' ); ?>
	</form>
</div>

<script type="text/javascript">
	(function($){
		$(document).ready(function(){
					$("#page header.entry-header .sep").html('<a href="http://icespring.com.tw">首頁</a>  &gt;  帳戶詳細資料</div>');
		});
	})(jQuery);
</script>


<?php do_action( 'woocommerce_after_edit_account_form' ); ?>
