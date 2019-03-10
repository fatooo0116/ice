<?php
/**
 * View Order
 *
 * Shows the details of a particular order on the account page.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/view-order.php.
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

?>
<p class="hide"><?php
	/* translators: 1: order number 2: order date 3: order status */
	printf(
		__( 'Order #%1$s was placed on %2$s and is currently %3$s.', 'woocommerce' ),
		'<mark class="order-number">' . $order->get_order_number() . '</mark>',
		'<mark class="order-date">' . wc_format_datetime( $order->get_date_created() ) . '</mark>',
		'<mark class="order-status">' . wc_get_order_status_name( $order->get_status() ) . '</mark>'
	);
?></p>
<script type="text/javascript">
(function($){
	$(document).ready(function(){
		$("header.entry-header h1.entry-title").text("我的訂單");
	});
})(jQuery);
</script>



<div id="order_status"  class="clear">
	<div class="pull-left">
		訂單編號：<?php echo $order->get_order_number(); ?>
	</div>
	<div class="pull-right">
		訂單狀態： <?php echo __($order->get_status()); ?>
	</div>
</div>


<div class="hide">
	<!-- 訂單的 Note 先關起來-->
	<?php if ( $notes = $order->get_customer_order_notes() ) : ?>
		<h2><?php _e( 'Order updates', 'woocommerce' ); ?></h2>
		<ol class="woocommerce-OrderUpdates commentlist notes   ">
			<?php foreach ( $notes as $note ) : ?>
			<li class="woocommerce-OrderUpdate comment note">
				<div class="woocommerce-OrderUpdate-inner comment_container">
					<div class="woocommerce-OrderUpdate-text comment-text">
						<p class="woocommerce-OrderUpdate-meta meta"><?php echo date_i18n( __( 'l jS \o\f F Y, h:ia', 'woocommerce' ), strtotime( $note->comment_date ) ); ?></p>
						<div class="woocommerce-OrderUpdate-description description">
							<?php echo wpautop( wptexturize( $note->comment_content ) ); ?>
						</div>
		  				<div class="clear"></div>
		  			</div>
					<div class="clear"></div>
				</div>
			</li>
			<?php endforeach; ?>
		</ol>
	<?php endif; ?>
</div><!-- hide -->


<?php do_action( 'woocommerce_view_order', $order_id ); ?>
