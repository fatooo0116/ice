<?php
/**
 * Checkout shipping information form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-shipping.php.
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
 * @version 3.0.9
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>


<div class="woocommerce-shipping-fields">
	<?php if ( true === WC()->cart->needs_shipping_address() ) : ?>

		<h3 class="checkout_title2">收件人資料</h3>

		<h3 id="ship-to-different-address" class="hide">
			<label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
				<input id="ship-to-different-address-checkbox" class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" <?php checked( apply_filters( 'woocommerce_ship_to_different_address_checked', 'shipping' === get_option( 'woocommerce_ship_to_destination' ) ? 1 : 0 ), 1 ); ?> type="checkbox" name="ship_to_different_address" value="1" checked  /> <span><?php _e( 'Ship to a different address?', 'woocommerce' ); ?></span>
			</label>
		</h3>

		<div class="shipping_address">

			<?php do_action( 'woocommerce_before_checkout_shipping_form', $checkout ); ?>
			<div class="woocommerce-shipping-fields__field-wrapper">


				<div class="wdr_fow "  id="copy_to_address">
								<input class="styled-checkbox" id="styled-checkbox-1" type="checkbox" value="value1">
								<label for="styled-checkbox-1">同訂購人資料</label>
			 </div>



				<?php
					$fields = $checkout->get_checkout_fields( 'shipping' );

					foreach ( $fields as $key => $field ) {
						if ( isset( $field['country_field'], $fields[ $field['country_field'] ] ) ) {
							$field['country'] = $checkout->get_value( $field['country_field'] );
						}
						//woocommerce_form_field( $key, $field, $checkout->get_value( $key ) );
						woocommerce_form_field( $key, $field, '' );
					}
				?>




				<div class="wdr_fow wdr_check_date">
					<label for="">選擇您能收件的日期</label>
					<p class="note">*提醒您，您訂購的產品若是冰品，請注意必須有人簽收並有冷凍設備供冷凍，以免冰品融化</p>
					<p class="note">*選擇ATM匯款的消費者，您在此選擇的收件日期僅供參考，春一枝收到您的匯款後，將有專人與您確認收貨日期</p>

					<div class="form-group">
							<div class="input-group">
								<input type="text" name="deliver_date"  readonly="true" class="form-control" id="deliver_date" placeholder="選擇您能收件的日期" starttime="<?php echo esc_attr( get_option('product_days') ); ?>" >
								<div class="input-group-addon"><i class="ion-android-calendar"></i></div>
							</div>
						</div>
				</div>

				<div class="wdr_fow wdr_check_time">
					<label for="">選擇您能收件的時間</label>
					<div class="form-group">
						<select class="selectpicker"  id="delivertime" name="deliver_time">
							<option value="13：00前">13：00前</option>
							<option value="14：00－18：00">14：00－18：00</option>
						</select>
						</div>
				</div>

			</div>

			<?php do_action( 'woocommerce_after_checkout_shipping_form', $checkout ); ?>

		</div>

	<?php endif; ?>
</div>
<div class="woocommerce-additional-fields">
	<?php do_action( 'woocommerce_before_order_notes', $checkout ); ?>

	<?php if ( apply_filters( 'woocommerce_enable_order_notes_field', 'yes' === get_option( 'woocommerce_enable_order_comments', 'yes' ) ) ) : ?>

		<?php if ( ! WC()->cart->needs_shipping() || wc_ship_to_billing_address_only() ) : ?>

			<h3><?php _e( 'Additional information', 'woocommerce' ); ?></h3>

		<?php endif; ?>

		<div class="woocommerce-additional-fields__field-wrapper">
			<?php foreach ( $checkout->get_checkout_fields( 'order' ) as $key => $field ) : ?>
				<?php woocommerce_form_field( $key, $field, $checkout->get_value( $key ) ); ?>
			<?php endforeach; ?>
		</div>

	<?php endif; ?>

	<?php do_action( 'woocommerce_after_order_notes', $checkout ); ?>
</div>

<script type="text/javascript">
	(function($){
		$(document).ready(function(){
			// alert("xxs");
			setTimeout(function(){
				window.scrollTo(0,0);
			},300);


			var payment_way = function(){
					$("#payment ul li").on("click",function(){
						 $('body').trigger('update_checkout')
					 });
			}


			jQuery( document ).on( 'updated_checkout', function() {
			    payment_way();
			} );

		});
	})(jQuery);
</script>
