<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
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
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 * @hooked WC_Structured_Data::generate_website_data() - 30
		 */
		do_action( 'woocommerce_before_main_content' );
	?>

    <header class="woocommerce-products-header  entry-header">

		<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
			<h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
		<?php endif; ?>

		<?php
			/**
			 * woocommerce_archive_description hook.
			 *
			 * @hooked woocommerce_taxonomy_archive_description - 10
			 * @hooked woocommerce_product_archive_description - 10
			 */
			do_action( 'woocommerce_archive_description' );
		?>
			<div class="sep">
				<?php

				$args  = array();
				$args = wp_parse_args( $args, apply_filters( 'woocommerce_breadcrumb_defaults', array(
					'delimiter'   => '&nbsp;&#47;&nbsp;',
					'wrap_before' => '<nav class="woocommerce-breadcrumb">',
					'wrap_after'  => '</nav>',
					'before'      => '',
					'after'       => '',
					'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' ),
				) ) );

				$breadcrumbs = new WC_Breadcrumb();
				if ( ! empty( $args['home'] ) ) {
					$breadcrumbs->add_crumb( $args['home'], apply_filters( 'woocommerce_breadcrumb_home_url', home_url() ) );
				}

				$args['breadcrumb'] = $breadcrumbs->generate();
				$breadcrumb  =  $args['breadcrumb'];
				foreach ( $args['breadcrumb'] as $key => $crumb ) {
					if ( ! empty( $crumb[1] ) && sizeof( $breadcrumb ) !== $key + 1 ) {
						echo '<a href="' . esc_url( $crumb[1] ) . '">' . esc_html( $crumb[0] ) . '</a>';
					} else {
						echo esc_html( $crumb[0] );
					}

					if ( sizeof( $breadcrumb ) !== $key + 1 ) {
						echo "  >  ";
					}
				}

				?>
			</div>
    </header>




		<div class="product_taxonomy_link">
			<ul  class="clearfix">
			<?php

					$cur = get_queried_object();
					$terms = get_terms( array(
										'taxonomy' => 'product_cat',
										'hide_empty' => true,
								) );

					foreach($terms as $term){
							?>
							<li  class="<?php if((property_exists($cur,'term_id')) && ($term->term_id == $cur->term_id)){ echo "cur";} ?>"><a href="<?php echo get_term_link($term->term_id); ?>">
								<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30">
									    <path fill="#6E4A39" fill-rule="evenodd" d="M17.383 13.655c-.398-.706 5.74-7.726 7.66-4.328 1.92 3.4-7.262 5.033-7.66 4.328m7.496 7.3c-2.015 3.344-7.953-3.848-7.536-4.541.419-.694 9.55 1.199 7.536 4.542M15 12.264c-.809 0-3.902-8.798 0-8.798 3.904 0 .811 8.798 0 8.798m-.326 14.267c-3.901-.11-.56-8.818.25-8.795.809.023 3.652 8.906-.25 8.795m-1.975-13.01c-.438.683-9.514-1.469-7.404-4.754 2.109-3.283 7.841 4.073 7.404 4.755m-7.899 6.865c-1.822-3.453 7.402-4.825 7.781-4.109.378.717-5.958 7.56-7.78 4.11M15 0C6.716 0 0 6.716 0 15c0 8.285 6.716 15 15 15 8.284 0 15-6.715 15-15 0-8.284-6.716-15-15-15"></path>
									</svg>
								<?php echo $term->name; ?></a></li>
							<?php
					}
			 ?>
			 </ul>
		</div>


		<div class="selectpicker  category_slk" >
			<select class="select  clink">
				<?php
					$item_html='<option  value="'.site_url('/shop/').'">全部商品</option>';
					foreach( $terms as $term ){
									 $class= ($term->term_id == $cur) ? "selected" : "";

									 $item_html .= '<option value="'.get_term_link($term->term_id).'"  '.$class.'  >'.$term->name.'</option>';
						}
						echo $item_html;
				?>
			</select>
		</div>


			<?php
				//	$banner = esc_attr( get_option('option_stick_banner') );
					$url = esc_attr( get_option('ddg_header_logo4') );
					if($url){
			 ?>
					<div class="archive_banner " style="background-image:url(<?php echo esc_attr( get_option('ddg_header_logo5') ); ?>);"   mobilex="<?php echo esc_attr( get_option('ddg_header_logo6') ); ?>">
						<div class="archive_banner_mobile" style="background-image:url(<?php echo esc_attr( get_option('ddg_header_logo6') ); ?>);">
							<img src="<?php echo esc_attr( get_option('ddg_header_logo5') ); ?>"/>
						</div>
						<div class="text">
							<h5>來自土地 新鮮嚴選</h5>
							<p>友善交易，除了顧健康，<br/>也是給農民的希望</p>
						</div>
					</div>
				<?php } ?>

		<div class=""  id="ice_archive_product">


		<?php if ( have_posts() ) : ?>


			<?php
				/**
				 * woocommerce_before_shop_loop hook.
				 *
				 * @hooked wc_print_notices - 10
				 * @hooked woocommerce_result_count - 20
				 * @hooked woocommerce_catalog_ordering - 30
				 */
				do_action( 'woocommerce_before_shop_loop' );
			?>

			<?php woocommerce_product_loop_start(); ?>

				<?php woocommerce_product_subcategories(); ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php
						/**
						 * woocommerce_shop_loop hook.
						 *
						 * @hooked WC_Structured_Data::generate_product_data() - 10
						 */
						do_action( 'woocommerce_shop_loop' );
					?>

					<?php wc_get_template_part( 'content', 'product' ); ?>

				<?php endwhile; // end of the loop. ?>

			<?php woocommerce_product_loop_end(); ?>

			<?php
				/**
				 * woocommerce_after_shop_loop hook.
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action( 'woocommerce_after_shop_loop' );
			?>

		<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

			<?php
				/**
				 * woocommerce_no_products_found hook.
				 *
				 * @hooked wc_no_products_found - 10
				 */
				do_action( 'woocommerce_no_products_found' );
			?>

		<?php endif; ?>

	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>

	</div><!-- #ice_archive_product -->

	<?php
		/**
		 * woocommerce_sidebar hook.
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		// do_action( 'woocommerce_sidebar' );
	?>

	<div id="reg_email_sent" class="modal fade" tabindex="-1" role="dialog">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-body">

					<div class="orange">
							<div class="text">
								已成功加入<br/>購物車
							</div>
					</div>
					<h3>春一枝謝謝您的愛護與支持！</h3>
	      </div>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->


<style media="screen">
	.woocommerce-message{ display: none ! important;}
</style>
<script type="text/javascript">
	var  WP_AJX = '<?php echo admin_url( 'admin-ajax.php' );?>';



	(function($){
		$(document).ready(function(){

			if($(".wdr-archive-product").length>0){

				$(".wdr-archive-product").each(function(){
							var me = $(this);
					    var btn =  me.find(".add_to_cart_button");
							btn.on("click",function(e){
								e.preventDefault();
								var add_cart = {};
								add_cart['num'] = me.find("input.qty").val();
							  add_cart['pid'] = btn.attr("data-product_id");

							//	console.log(add_cart);

								$.post(WP_AJX ,{
									action: 'addcart_ajax_action', // 自取一個action的名稱
									data:add_cart // 附上的參數
								}, function(data) {
									//alert(data); // 當AJAX處理完畢，就把回傳的資料alert出來
									var  data = JSON.parse(data);
									if(data['status']){
										$('#reg_email_sent').modal('show');
										setTimeout(function(){
											$('#reg_email_sent').find(".orange").addClass("ani");
											
											setTimeout(function(){
												$('#reg_email_sent').modal('hide');
											},1300);
										},500);

										if($("#mobile_footer_nav ul li a.mycart .num").length>0){
											$("#mobile_footer_nav .mycart .num ").text(data['cartnum']);
										}else{
											$("#mobile_footer_nav .mycart").append("<span class='num'  id='mycart' >"+data['cartnum']+"</span>");
										}

										if($("#wdr-menu .menu-box .shop ul li a .cart_num").length>0){
												$("#wdr-menu .menu-box .shop ul li a .cart_num").text(data['cartnum']);
										}else{
												$("#wdr-menu .menu-box .shop ul li.mycart a").append("<span class='cart_num'  id='mycart' >"+data['cartnum']+"</span>");


												Tipped.create('#mycart',
											    $('#tooltiptext'),
											    {
											      position: 'righttop',
											      // close: true,
											    //  hideOn: false,
											            onShow: function(content, element) {

											            $.post(wp_ajax, {
											               action: 'get_cart_content_action',
											             },function(data) {

																		 	$("#tooltiptext ul").html('');

											                var obj = JSON.parse(data);
											                console.log(obj);
											                var $html = "";
											                for(var key in obj){
											                    if(key !=='total'){
											                      $html +='<li class="cart-item"><div class="img">'+
											                          '<img src="'+obj[key].img+'" alt="">'+
											                                '</div><div class="myprice">'+
											                                    '<h4><a href="'+obj[key].link+'">'+obj[key].title+'</a></h4>'+
											                                    '<div class="detail">'+
											                                      '<span class="price">$'+obj[key].price+'</span> x <span class="qty">'+obj[key].qty+'</span>'+
											                                    '</div>'+
											                                  '</div>'+
											                                  '<a href="'+obj[key].remove+'"><i class="fa fa-trash" aria-hidden="true"></i></a>'+
											                                '</li>';
											                    }
											                }
											                $html = "<ul>"+$html+"</ul><div class='total'>總計 $<span>"+obj.total+"</span></div>";



											                $("#tooltiptext .cart-inner").html($html);
											                Tipped.refresh();
											            });

											      }
											    }
											 );



										} /*  End */


									}
								});

							});
				});


			}  /*   wdr-archive-product  Loop  */


		});
	})(jQuery);
</script>



<?php get_footer( 'shop' ); ?>
