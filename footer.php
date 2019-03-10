<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package fruit-ice
 */

?>



	<a href="#" class="back_top">
		<span>top</span>
	</a>
	</div><!-- #content -->
</div><!-- #page -->




<div class="footer_outter">
	<footer id="colophon" class="">
		<h3>聯絡我們<div class="sub">Contact</div></h3>

		<div class="inner">
			<div class="site-info ">
				<div class="col-sm-6">
					<h5><i class="ion-ios-location"></i> 台北推廣中心</h5>
					<ul>
						<li>11060 台北市信義區忠孝東路五段372巷28弄3號1樓</li>
						<li>2008springtour@gmail.com</li>
						<li>TEL : (02)2345-6617</li>
						<li>FAX : (02)2345-6635</li>
						<li>週一至週五 09:00-12:00 / 13:00-18:00（國定假日休息）</li>
						<li>*活動合作、經銷商洽談請洽台北推廣中心</li>
					</ul>
				</div>

				<div class="col-sm-6">
					<h5><i class="ion-ios-location"></i> 台東鹿野76</h5>
					<ul>
						<li>955 台東縣鹿野鄉永安村高台路76號</li>
						<li>(089)552-295</li>
						<li>24h營業，不打烊</li>
					</ul>
					<div class="copy">
						<a href="<?php echo site_url('/隱私權政策/'); ?>">隱私權政策</a><br/>
						copyright &copy; <?php echo date('Y'); ?> iceSpring All Rights reserved.
					</div>
				</div>
			</div><!-- .site-info -->
		</div>
	</footer><!-- #colophon -->
</div>



<div id="mobile_footer_nav">
	<ul>
		<li><a href="<?php echo site_url('/門市據點/'); ?>">
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="22" viewBox="0 0 24 22">
			    <path fill="#7F7F7F" fill-rule="nonzero" d="M21.34 13.79c.478 0 .864.386.86.864l.007 4.71a2.22 2.22 0 0 1-2.213 2.214l-16.283.009a2.218 2.218 0 0 1-2.219-2.21l-.006-4.626c0-.474.386-.863.867-.863.066 0 .191.024.191.024.04.012.067.021.103.036.022.01.046.015.064.025.754.28 1.225.437 2.052.437h.006c1.359 0 2.632-.413 3.632-1.261.988.845 2.259 1.182 3.617 1.191a5.596 5.596 0 0 0 3.587-1.33c1 .847 2.042 1.118 3.404 1.19.62.03 1.438-.103 2.08-.358a.811.811 0 0 1 .251-.052zm2.426-6.881c.149.456.234.957.234 1.462a4.754 4.754 0 0 1-2.48 4.173c-.645.353-1.408.532-2.274.538a4.726 4.726 0 0 1-3.641-1.684 4.72 4.72 0 0 1-3.596 1.69 4.739 4.739 0 0 1-3.614-1.684 4.756 4.756 0 0 1-3.632 1.69h-.006c-.848 0-1.599-.17-2.237-.514A4.74 4.74 0 0 1 0 8.39c0-.501.079-1 .237-1.486.01-.049.024-.088.034-.122l2.182-5.143C2.787.635 3.717 0 4.912 0h14.234c1.216 0 2.188.65 2.538 1.69l2.033 5.04a.707.707 0 0 1 .043.142c0 .012.006.022.006.037z"/>
			</svg>
			<span>門市據點</span>
		</a></li>

		<li>
			<a href="<?php echo site_url('/cart/'); ?>"  class="mycart" >
				<i class="ion-ios-cart"></i>
				<span>購物車</span>
				<?php  if(WC()->cart->get_cart_contents_count()>0){ ?>
					<span class="num"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
				<?php } ?>
			</a>
		</li>

		<li>
			<a href="<?php echo site_url('/shop/'); ?>">
			<svg xmlns="http://www.w3.org/2000/svg" width="13" height="26" viewBox="0 0 13 26">
			    <path fill="#7F7F7F" fill-rule="evenodd" d="M12.001 2.69a5.368 5.368 0 0 0-1.47-1.566C9.475.378 8.118 0 6.5 0 .182 0 0 6.343 0 7.066v12.547c0 .3.243.544.544.544h3.533v3.634c0 .058.02.574.323 1.1.292.506.898 1.109 2.123 1.109.754 0 1.355-.22 1.785-.653.604-.608.616-1.393.615-1.476v-3.714h3.533c.3 0 .544-.244.544-.544V6.296c0-.29-.028-1.065-.285-1.969a6.444 6.444 0 0 0-.714-1.637z"/>
			</svg>
			<span>來呷枝仔冰</span>
			</a></li>
		<li>

			<a href="<?php echo site_url('/my-account/'); ?>">
				<i class="ion-android-person"></i>
				<span>登入註冊</span></a>
			</li>
	</ul>
</div>




<?php wp_footer(); ?>


<script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/ScrollMagic.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/debug.addIndicators.min.js"></script>

<script type="text/javascript">
// init controller
var controller = new ScrollMagic.Controller();

var $ = jQuery;

// build scene
var h = Number($("#hsection1").height())+Number($("#hsection2").height())+500;
console.log(h);

var scene = new ScrollMagic.Scene({triggerElement: "#main", duration: h})
				.addTo(controller)
			//	.addIndicators() // add indicators (requires plugin)
				.on("progress", function (e) {
						var x = e.progress.toFixed(3);

						var m1t = 80*x;
						var v1 = 'translateY('+m1t+'px )';
						var v1img = -(20*x)+"%";
						var v2img = -(30*x)+"%";



						 $("#hsection2 .mp1").css({
							 '-webkit-transform' : v1,
							 '-moz-transform'    : v1,
							 '-ms-transform'     : v1,
							 '-o-transform'      : v1,
							 'transform'         : v1
						 });

						 $("#hsection2 .mp1  img").css("top",v2img);
						 $("#hsection2 .mp2  img").css("top",v1img);
						 $("#hsection2 .mp3  img").css("top",v2img);

						var m2t = -50*x;
						m2t  =  m2t * 1.1;
						var v2 = 'translateY('+m2t+'px )';
						 $("#hsection2 .mp2").css({
							 '-webkit-transform' : v2,
							 '-moz-transform'    : v2,
							 '-ms-transform'     : v2,
							 '-o-transform'      : v2,
							 'transform'         : v2
						 });




						var m3t = 160*x;
 						var v3 = 'translateY('+m3t+'px )';
 						 $("#hsection2 .mp3").css({
 							 '-webkit-transform' : v3,
 							 '-moz-transform'    : v3,
 							 '-ms-transform'     : v3,
 							 '-o-transform'      : v3,
 							 'transform'         : v3
 						 });
						// $("#hsection2 .mp3").css("top",m3t );
				});

				var scene = new ScrollMagic.Scene({triggerElement: "#hsection3", duration: h})
								.addTo(controller)
				//				.addIndicators() // add indicators (requires plugin)
								.on("progress", function (e) {
										var x = e.progress.toFixed(3);

										var m1t = -60*x;
										var v1 = 'translateY('+m1t+'px )';
										var v2img = -(15*x)+"%";

										 $("#hsection4 .mimg1").css({
											 '-webkit-transform' : v1,
											 '-moz-transform'    : v1,
											 '-ms-transform'     : v1,
											 '-o-transform'      : v1,
											 'transform'         : v1
										 });

										var m2t = -40*x;
 										var v2 = 'translateY('+m2t+'px )';

 										 $("#hsection4 .mimg2").css({
 											 '-webkit-transform' : v2,
 											 '-moz-transform'    : v2,
 											 '-ms-transform'     : v2,
 											 '-o-transform'      : v2,
 											 'transform'         : v2
 										 });

										 var m3t = -60*x;
  										var v3 = 'translateY('+m3t+'px )';

  										 $("#hsection4 .mtext").css({
  											 '-webkit-transform' : v3,
  											 '-moz-transform'    : v3,
  											 '-ms-transform'     : v3,
  											 '-o-transform'      : v3,
  											 'transform'         : v3
  										 });

											  $("#hsection4 .mimg1  img").css("top",v2img);


										// $("#hsection2 .mp3").css("top",m3t );
								});


</script>

</body>
</html>
