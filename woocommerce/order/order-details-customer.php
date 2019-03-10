<?php
/**
 * Order Customer Details
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/order/order-details-customer.php.
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
	exit;
}
?>


<!-- 登入 / 我的訂單 / 客戶明細  -->
<section class="woocommerce-customer-details"  id="ice_order_customer">

	<?php if ( ! wc_ship_to_billing_address_only() && $order->needs_shipping_address() ) : ?>

		<section class="woocommerce-columns woocommerce-columns--2 woocommerce-columns--addresses col2-set addresses">
			<h2 class="woocommerce-column__title"><?php _e( '顧客明細', 'woocommerce' ); ?></h2>

			<div class="woocommerce-column woocommerce-column--1 woocommerce-column--billing-address col-1">

				<?php endif; ?>


				<table>

					<tr>
						<th>訂購人Ｅmail</th>
						<td>
							<?php if ( $order->get_billing_email() ) : ?>
								<?php echo esc_html( $order->get_billing_email() ); ?>
							<?php endif; ?>
						</td>
					</tr>
					<tr>
						<th>訂購人電話</th>
						<td>
							<?php if ( $order->get_billing_phone() ) : ?>
								<?php echo esc_html( $order->get_billing_phone() ); ?>
							<?php endif; ?>
						</td>
					</tr>
					<tr>
						<th style="vertical-align:top;">訂購人資料</th>
						<td>
						<address>
							<?php echo ( $address = $order->get_formatted_billing_address() ) ? $address : __( 'N/A', 'woocommerce' ); ?>
						</address>
						</td>
					</tr>
				</table>



				<?php if ( ! wc_ship_to_billing_address_only() && $order->needs_shipping_address() ) : ?>

			</div><!-- /.col-1 -->

			<div class="woocommerce-column woocommerce-column--2 woocommerce-column--shipping-address col-2">
				<table>
					<tr>
						<th style="vertical-align:top;"><?php _e( '收件人資料', 'woocommerce' ); ?></th>
						<td>
							<address>
								<?php echo ( $address = $order->get_formatted_shipping_address() ) ? $address : __( 'N/A', 'woocommerce' ); ?>
							</address>
						</td>
					</tr>

					<tr>
						<th>收貨日期</th>
						<td>
								<?php
									// print_r($order);
								 	 echo get_post_meta( $order->get_order_number(), 'deliver_date', true );
								 ?>
						</td>
					</tr>
					<tr>
						<th>收貨時間</th>
						<td>
							<?php  echo  get_post_meta( $order->get_order_number(), 'deliver_time', true ); ?>
						</td>
					</tr>


					<tr>
						<th>訂單備註</th>
						<td>
							<?php
						  		if ( $order->get_customer_note()){
										echo wptexturize( $order->get_customer_note() );
									}
								?>
						</td>
					</tr>
				</table>
			</div><!-- /.col-2 -->

		</section><!-- /.col2-set -->

	<?php endif; ?>

</section>
