<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
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
	exit; // Exit if accessed directly
}

global $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<li <?php post_class('wdr-archive-product'); ?>  pid="<?php echo get_the_ID(); ?>">


		<?php
				$product = wc_get_product( get_the_ID());

		    $attachment_ids = $product->get_gallery_image_ids();

		    foreach( $attachment_ids as $attachment_id ) {
		       // echo $image_link = wp_get_attachment_url( $attachment_id );
		    }
		?>


		<a href="<?php  echo get_the_permalink(); ?>"  class="product_thumbnail"  style="background-image:url(<?php // echo  get_the_post_thumbnail_url(get_the_ID(),'full'); ?>);">
			<?php // echo  woocommerce_get_product_thumbnail(); ?>
			<?php

				// echo get_the_post_thumbnail_url(get_the_ID(),'full');;
				if(count($attachment_ids)<2){
					echo '<div style="background-image:url('.get_the_post_thumbnail_url(get_the_ID(),'full').');"  class="front" ></div>';
					foreach( $attachment_ids as $attachment_id ){
						$image_link = wp_get_attachment_url( $attachment_id );
						echo '<div style="background-image:url('.$image_link.');"  class="end" ></div>';
					}
				}else{
					$i=0;
					foreach( $attachment_ids as $attachment_id ) {
							$image_link = wp_get_attachment_url( $attachment_id );
							if($i==1){

								echo '<div style="background-image:url('.$image_link.');"  class="front" ></div>';
							}elseif($i==0){
								echo '<div style="background-image:url('.$image_link.');"  class="end" ></div>';
							}
							$i++;
					}
				}
			?>
		</a>


		<?php
			echo '<h2 class="woocommerce-loop-product__title">' . get_the_title() . '</h2>';
		?>





			<?php
				do_action( 'woocommerce_after_shop_loop_item_title' );
			?>
			<div class="buy_control">
			<?php if($product->is_purchasable() && $product->is_in_stock()){ ?>
					<div class="quantity">
						<label class="screen-reader-text" for="quantity_5a615670deba2">Quantity</label>
						<input type="number"   id="quantity_5a615670deba2" class="input-text qty text" step="1" min="1" max="" name="quantity" value="1" title="Qty" size="4" pattern="[0-9]*" inputmode="numeric">

						<div class="quantity-nav">
							<div class="quantity-button quantity-up"><span><i class="ion-plus-round"></i></span></div>
							<div class="quantity-button quantity-down"><span><i class="ion-minus-round"></i></span></div>
						</div>
					</div>
			<?php  }


					/*   Add To Cart /Read More /   */
						global $product;
						$args = array();
						if ( $product ) {
							$defaults = array(
								'quantity' => 1,
								'class'    => implode( ' ', array_filter( array(
										'button',
										'product_type_' . $product->get_type(),
										$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
										$product->supports( 'ajax_add_to_cart' ) ? 'ajax_add_to_cart' : '',
								) ) ),
							);

							$args = apply_filters( 'woocommerce_loop_add_to_cart_args', wp_parse_args( $args, $defaults ), $product );
							wc_get_template( 'loop/add-to-cart_no_ajax.php', $args );

						}
					?>
		</div><!-- buy_control -->



</li>

<!--
<li <?php // post_class(); ?>>
	<?php
	/**
	 * woocommerce_before_shop_loop_item hook.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
	// do_action( 'woocommerce_before_shop_loop_item' );

	/**
	 * woocommerce_before_shop_loop_item_title hook.
	 *
	 * @hooked woocommerce_show_product_loop_sale_flash - 10
	 * @hooked woocommerce_template_loop_product_thumbnail - 10
	 */
	// do_action( 'woocommerce_before_shop_loop_item_title' );

	/**
	 * woocommerce_shop_loop_item_title hook.
	 *
	 * @hooked woocommerce_template_loop_product_title - 10
	 */
	// do_action( 'woocommerce_shop_loop_item_title' );

	/**
	 * woocommerce_after_shop_loop_item_title hook.
	 *
	 * @hooked woocommerce_template_loop_rating - 5
	 * @hooked woocommerce_template_loop_price - 10
	 */
	// do_action( 'woocommerce_after_shop_loop_item_title' );

	/**
	 * woocommerce_after_shop_loop_item hook.
	 *
	 * @hooked woocommerce_template_loop_product_link_close - 5
	 * @hooked woocommerce_template_loop_add_to_cart - 10
	 */
//	 do_action( 'woocommerce_after_shop_loop_item' );
	?>
</li>
-->
