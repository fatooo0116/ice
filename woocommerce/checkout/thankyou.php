<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
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
 * @version     3.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<script type="text/javascript">
	(function($){
		$(document).ready(function(){
			$("header.entry-header h1.entry-title").text("結帳");
			$("#page header.page-header .sep, #page header.entry-header .sep").html('<a href="http://icespring.com.tw">首頁</a>  &gt;  結帳');
		});
	})(jQuery);
</script>



<div class="woocommerce-order">
	<div id="thankyou_page">
		<div class="orange"><div class="text">已成功下單</div></div>

		<div class="list">
	<?php if ( $order ) : ?>

		<?php if ( $order->has_status( 'failed' ) ) : ?>

			<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed"><?php _e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce' ); ?></p>

			<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed-actions">
				<a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay"><?php _e( 'Pay', 'woocommerce' ) ?></a>
				<?php if ( is_user_logged_in() ) : ?>
					<a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="button pay"><?php _e( 'My account', 'woocommerce' ); ?></a>
				<?php endif; ?>
			</p>

		<?php else : ?>

			<p class=" hide woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', __( 'Thank you. Your order has been received.', 'woocommerce' ), $order ); ?></p>

			<ul class="woocommerce-order-overview woocommerce-thankyou-order-details order_details">

				<li class="woocommerce-order-overview__order order">
					<?php _e( '訂單編號', 'woocommerce' ); ?>
					<strong><?php echo $order->get_order_number(); ?></strong>
				</li>

				<li class="woocommerce-order-overview__date date">
					<?php _e( '下單時間', 'woocommerce' ); ?>
					<strong><?php echo wc_format_datetime( $order->get_date_created() ); ?></strong>
				</li>

				<?php if ( is_user_logged_in() && $order->get_user_id() === get_current_user_id() && $order->get_billing_email() ) : ?>
					<li class="woocommerce-order-overview__email email">
						<?php _e( 'Email', 'woocommerce' ); ?>
						<strong><?php echo $order->get_billing_email(); ?></strong>
					</li>
				<?php endif; ?>

				<li class="woocommerce-order-overview__total total">
					<?php _e( '總計金額', 'woocommerce' ); ?>
					<strong><?php echo $order->get_formatted_order_total(); ?></strong>
				</li>

				<?php if ( $order->get_payment_method_title() ) : ?>
					<li class="woocommerce-order-overview__payment-method method">
						<?php _e( '付款方式', 'woocommerce' ); ?>
						<strong><?php echo wp_kses_post( $order->get_payment_method_title() ); ?></strong>
					</li>
				<?php endif; ?>

			</ul>
			</div><!--  list -->
			</div><!--  #thankyou_page -->

		<?php endif; ?>

		<?php //  do_action( 'woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id() ); ?>
		<?php  do_action( 'woocommerce_thankyou', $order->get_id() ); ?>



			<?php

			 if(get_post_meta( $order->get_order_number(), '_payment_method', true )=="bacs"){
				?>
				<div id="thankyou_option">
					<div class="inner">
						<h3>請匯款至以下帳戶</h3>
						<ul>
							<h5>匯款資訊：</h5>
							<li>華南銀行(008) 南松山分行</li>
							<li>戶名：李至菘</li>
							<li>帳號：110-20-737961-7</li>
						</ul>

						<ul>
							<li class="hlight">*貨品將於收到貨款後的四個工作天內寄達</li>
							<li class="hlight">*請於匯款後，將帳號後五碼傳給承辦人（建議使用Line）</li>
							<li>承辦人：李先生</li>
							<li>Line ID：<a href="mailto:service@springselection">@springselection</a></li>
							<li>Mobile：<a href="tel:0978178553">0978-178-553</a></li>
						</ul>
					</div>
					<div class="ctl">
						<a href="<?php  echo  site_url(); ?>" class="btn">回首頁</a>
						<a href="<?php  echo  site_url('/orders/'); ?>" class="btn">訂單查詢</a>
					</div>
				</div>
			<?php } ?>

	<?php else : ?>

		<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', __( 'Thank you. Your order has been received.', 'woocommerce' ), null ); ?></p>

	<?php endif; ?>

</div>
