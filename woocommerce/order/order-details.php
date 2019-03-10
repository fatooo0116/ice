<?php
/**
 * Order details
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/order/order-details.php.
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
if ( ! $order = wc_get_order( $order_id ) ) {
	return;
}

$order_items           = $order->get_items( apply_filters( 'woocommerce_purchase_order_item_types', 'line_item' ) );
$show_purchase_note    = $order->has_status( apply_filters( 'woocommerce_purchase_note_order_statuses', array( 'completed', 'processing' ) ) );
$show_customer_details = is_user_logged_in() && $order->get_user_id() === get_current_user_id();
$downloads             = $order->get_downloadable_items();
$show_downloads        = $order->has_downloadable_item() && $order->is_download_permitted();

if ( $show_downloads ) {
	wc_get_template( 'order/order-downloads.php', array( 'downloads' => $downloads, 'show_title' => true ) );
}
?>


<style media="screen">
	#wdr-menu .myaccount_order a{
		background-color: #a0ac48;
		border-radius: 20px;
		color:#fff;
	}
</style>

<!-- 登入 / 我的訂單 / 訂單明細  -->

<section class="woocommerce-order-details"  id="ice_order_detail">
	<h2 class="woocommerce-order-details__title"><?php _e( '訂單明細', 'woocommerce' ); ?></h2>
	<div class="inner">
		<table class="woocommerce-table woocommerce-table--order-details shop_table order_details">

			<thead>
				<tr>
					<th class="woocommerce-table__product-name product-name"><?php _e( '商品', 'woocommerce' ); ?></th>
					<th class="woocommerce-table__product-name product-name"><?php _e( '數量', 'woocommerce' ); ?></th>
					<th class="woocommerce-table__product-table product-total"><?php _e( '小計', 'woocommerce' ); ?></th>
				</tr>
			</thead>

			<tbody>
				<?php
					foreach ( $order_items as $item_id => $item ) {
						$product = apply_filters( 'woocommerce_order_item_product', $item->get_product(), $item );

						wc_get_template( 'order/order-details-item.php', array(
							'order'			     => $order,
							'item_id'		     => $item_id,
							'item'			     => $item,
							'show_purchase_note' => $show_purchase_note,
							'purchase_note'	     => $product ? $product->get_purchase_note() : '',
							'product'	         => $product,
						) );
					}
				?>
				<?php do_action( 'woocommerce_order_items_table', $order ); ?>
			</tbody>






			<tfoot>
				<?php
					foreach ( $order->get_order_item_totals() as $key => $total ) {

						?>
						<tr>

							<th scope="row" colspan="2"><span class="fx_label"><?php echo $total['label']; ?></span></th>
							<td>
								<div class="middle_td">
									<?php   if($total['label']=='折扣.'){ echo "<span>(優惠券:".implode(',',$order->get_used_coupons()).")</span>"; }; ?>&nbsp;
									<?php echo $total['value']; ?>
								</div>
							</td>
						</tr>
						<?php
					}
				?>

			</tfoot>
		</table>
	</div>

	<?php do_action( 'woocommerce_order_details_after_order_table', $order ); ?>
</section> <!-- ice_order_detail -->

<?php
if ( $show_customer_details ) {
	wc_get_template( 'order/order-details-customer.php', array( 'order' => $order ) );
}
