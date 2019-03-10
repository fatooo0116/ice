<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php
	/**
	 * woocommerce_before_single_product hook.
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>

<header class="page-header  entry-header">
	<h1>來呷枝仔冰</h1>
	<?php
		the_archive_description( '<div class="archive-description">', '</div>' );
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
</header><!-- .page-header -->







<div class="product_taxonomy_link">
	<ul  class="clearfix">
	<?php
			$terms = get_terms( array(
								'taxonomy' => 'product_cat',
								'hide_empty' => true,
						) );

			$cur = wp_get_post_terms(get_the_ID(),'product_cat');
			foreach($cur as $p){
				$cur_tax[] = $p->term_id;
			}


			foreach($terms as $term){
					if(in_array($term->term_id,$cur_tax)){
						$curx = "cur";
					}else{
						$curx = "";
					}
					?>

					<li  class="<?php  echo $curx; ?>"><a href="<?php echo get_term_link($term->term_id); ?>">
						<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30">
									<path fill="#6E4A39" fill-rule="evenodd" d="M17.383 13.655c-.398-.706 5.74-7.726 7.66-4.328 1.92 3.4-7.262 5.033-7.66 4.328m7.496 7.3c-2.015 3.344-7.953-3.848-7.536-4.541.419-.694 9.55 1.199 7.536 4.542M15 12.264c-.809 0-3.902-8.798 0-8.798 3.904 0 .811 8.798 0 8.798m-.326 14.267c-3.901-.11-.56-8.818.25-8.795.809.023 3.652 8.906-.25 8.795m-1.975-13.01c-.438.683-9.514-1.469-7.404-4.754 2.109-3.283 7.841 4.073 7.404 4.755m-7.899 6.865c-1.822-3.453 7.402-4.825 7.781-4.109.378.717-5.958 7.56-7.78 4.11M15 0C6.716 0 0 6.716 0 15c0 8.285 6.716 15 15 15 8.284 0 15-6.715 15-15 0-8.284-6.716-15-15-15"></path>
							</svg>
						<?php echo $term->name; ?></a></li>
					<?php
			}
	 ?>
	 </ul>
</div><!-- #taxonomy_link -->

<div id="product-wdr-single" <?php post_class(); ?>>
	<div id="single_product_desc"  class="">


	<div class="  pleft">

		<?php
			/**
			 * woocommerce_before_single_product_summary hook.
			 *
			 * @hooked woocommerce_show_product_sale_flash - 10
			 * @hooked woocommerce_show_product_images - 20
			 */
			// do_action( 'woocommerce_before_single_product_summary' );



		global $post, $product;
		$columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
		$thumbnail_size    = apply_filters( 'woocommerce_product_thumbnails_large_size', 'full' );
		$post_thumbnail_id = get_post_thumbnail_id( $post->ID );
		$full_size_image   = wp_get_attachment_image_src( $post_thumbnail_id, $thumbnail_size );
		$placeholder       = has_post_thumbnail() ? 'with-images' : 'without-images';
		$wrapper_classes   = apply_filters( 'woocommerce_single_product_image_gallery_classes', array(
			'woocommerce-product-gallery',
			'woocommerce-product-gallery--' . $placeholder,
			'woocommerce-product-gallery--columns-' . absint( $columns ),
			'images',
		) );
		?>

		<div class="<?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', $wrapper_classes ) ) ); ?>" data-columns="<?php echo esc_attr( $columns ); ?>" style="opacity: 0; transition: opacity .25s ease-in-out;">
			<figure class="woocommerce-product-gallery__wrapper">


				<?php



				$attributes = array(
					'title'                   => get_post_field( 'post_title', $post_thumbnail_id ),
					'data-caption'            => get_post_field( 'post_excerpt', $post_thumbnail_id ),
					'data-src'                => $full_size_image[0],
					'data-large_image'        => $full_size_image[0],
					'data-large_image_width'  => $full_size_image[1],
					'data-large_image_height' => $full_size_image[2],
				);

				if ( has_post_thumbnail() ) {
					$html  = '<div data-thumb="' . get_the_post_thumbnail_url( $post->ID, 'shop_thumbnail' ) . '" class="woocommerce-product-gallery__image"><a href="' . esc_url( $full_size_image[0] ) . '">';
					$html .= get_the_post_thumbnail( $post->ID, 'shop_single', $attributes );
					$html .= '</a></div>';
				} else {
					$html  = '<div class="woocommerce-product-gallery__image--placeholder">';
					$html .= sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src() ), esc_html__( 'Awaiting product image', 'woocommerce' ) );
					$html .= '</div>';
				}
				do_action( 'woocommerce_product_thumbnails' );

				echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, get_post_thumbnail_id( $post->ID ) );

				// do_action( 'woocommerce_product_thumbnails' );
				?>

			</figure>
		</div>
	</div>

	<div class="  pright">
		<div class="inner  clearfix">
			<a href="https://www.facebook.com/sharer/sharer.php?u=http://icespring.com.tw/" target="_blank"  class="fbshare">
			<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30">
								    <path fill="#7F7F7F" fill-rule="nonzero" d="M30 25.46C30 28 27.946 30 25.46 30H4.54A4.533 4.533 0 0 1 0 25.46V4.54C0 2.055 2.054 0 4.54 0h20.865c2.54 0 4.54 2.054 4.54 4.54v20.92H30zm-6.973-8.109l.487-3.783h-3.73v-2.379c0-1.08.324-1.838 1.838-1.838h2V5.946c-.325-.054-1.514-.162-2.92-.162-2.864 0-4.81 1.73-4.81 4.973v2.757h-3.243v3.783h3.243v9.676h3.892v-9.622h3.243z"></path>
								</svg><span>分享</span></a>

		<?php
			/**
			 * woocommerce_single_product_summary hook.
			 *
			 * @hooked woocommerce_template_single_title - 5
			 * @hooked woocommerce_template_single_rating - 10
			 * @hooked woocommerce_template_single_price - 10
			 * @hooked woocommerce_template_single_excerpt - 20
			 * @hooked woocommerce_template_single_add_to_cart - 30
			 * @hooked woocommerce_template_single_meta - 40
			 * @hooked woocommerce_template_single_sharing - 50
			 * @hooked WC_Structured_Data::generate_product_data() - 60
			 */
			do_action( 'woocommerce_single_product_summary' );
		?>
		</div>
	</div><!-- .summary -->
	</div>

	<hr/>

	<div id="product_meta_data">
		<div class="post_content">
			<?php  the_content(); ?>
		</div>

		<?php
			/**
			 * woocommerce_after_single_product_summary hook.
			 *
			 * @hooked woocommerce_output_product_data_tabs - 10
			 * @hooked woocommerce_upsell_display - 15
			 * @hooked woocommerce_output_related_products - 20
			 */
			 //			do_action( 'woocommerce_after_single_product_summary' );

			 $args = array(
			 	'posts_per_page' 	=> 4,
			 	'columns' 			=> 4,
			 	'orderby' 			=> 'rand',
			 );

			 woocommerce_related_products( apply_filters( 'woocommerce_output_related_products_args', $args ) );

		?>
	</div>
</div><!-- #product-<?php the_ID(); ?> -->




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
	/* .woocommerce-message{ display: none ! important;} */
</style>
<script type="text/javascript">
	var  WP_AJX = '<?php echo admin_url( 'admin-ajax.php' );?>';



	(function($){
		$(document).ready(function(){

			if($(".related.products  ul li").length>0){

				$(".related.products  ul li").each(function(){
							var me = $(this);
					    var btn =  me.find(".add_to_cart_button");
							btn.on("click",function(e){
								e.preventDefault();
								var add_cart = {};
								add_cart['num'] = me.find("input.qty").val();
							  add_cart['pid'] = btn.attr("data-product_id");

								console.log(add_cart);

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
										},500);


										if($("#wdr-menu .menu-box .shop ul li a .cart_num").length>0){
												$("#wdr-menu .menu-box .shop ul li a .cart_num").text(data['cartnum']);
												$("#mobile_footer_nav .mycart .num ").text(data['cartnum']);
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

<?php do_action( 'woocommerce_after_single_product' ); ?>
