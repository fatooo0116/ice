<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package fruit-ice
 */

get_header(); ?>


		<main id="main" class="site-main col-sm-10"    mbname="客製冰棒棍">
		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<h1>客製冰棒棍</h1>
				<div class="sep">
					<a href="<?php echo site_url(); ?>">首頁</a>  &gt;  客製冰棒棍
				</div>
			</header><!-- .page-header -->


			<style media="screen">
				.taxonomy_link{
					max-width: 900px;
					margin: 80px auto 50px;
				}
			</style>
			<div class="taxonomy_link">
				<ul class="clearfix">
				<?php
					$cur = get_queried_object()->term_id;;

						$terms = get_terms( array(
											'taxonomy' => 'series',
											'hide_empty' => true,
									) );



						foreach($terms as $term){
								?>
								<li  class="<?php  if($term->term_id == $cur){ echo "cur";} ?>" >
									<a href="<?php echo get_term_link($term->term_id); ?>">
									<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30">
									    <path fill="#6E4A39" fill-rule="evenodd" d="M17.383 13.655c-.398-.706 5.74-7.726 7.66-4.328 1.92 3.4-7.262 5.033-7.66 4.328m7.496 7.3c-2.015 3.344-7.953-3.848-7.536-4.541.419-.694 9.55 1.199 7.536 4.542M15 12.264c-.809 0-3.902-8.798 0-8.798 3.904 0 .811 8.798 0 8.798m-.326 14.267c-3.901-.11-.56-8.818.25-8.795.809.023 3.652 8.906-.25 8.795m-1.975-13.01c-.438.683-9.514-1.469-7.404-4.754 2.109-3.283 7.841 4.073 7.404 4.755m-7.899 6.865c-1.822-3.453 7.402-4.825 7.781-4.109.378.717-5.958 7.56-7.78 4.11M15 0C6.716 0 0 6.716 0 15c0 8.285 6.716 15 15 15 8.284 0 15-6.715 15-15 0-8.284-6.716-15-15-15"/>
									</svg> <?php echo $term->name; ?></a>
								</li>
								<?php
						}
				 ?>
				 </ul>
			</div>



			<div class="selectpicker  category_slk" >
				<select class="select  clink">
					<?php
					$item_html="";
						foreach( $terms as $term ){
										 $class= ($term->term_id == $cur) ? "selected" : "";

										 $item_html .= '<option value="'.get_term_link($term->term_id).'"  '.$class.'  >'.$term->name.'</option>';
							}
							echo $item_html;
					?>
				</select>
			</div>




			<div class=""  id="stick_text">
				<p>春一枝長期於藝文界深耕，與博物館等大型單位合作。春一枝以臺灣文化為元素，發展造型冰棒棍包括2000年成立的陶瓷博物館的花朵陶棒、2009年臺北市立動物園推出的熊貓款、2011年中正紀念堂冰棒紀念書籤、2011年微軟Microsoft鈦樂公仔造型棒、2012年鹿野高台熱氣球冰棒棍、2014年松菸冰棒書籤、2017年誠品書店冰棒紀念書籤……春一枝以文化與品牌形象為底蘊，歡迎洽談客製冰棒棍的合作模式，量身訂做，達成良好的企業宣傳。
連絡電話：（02）2345-6617</p>
			</div>





				<?php
						$url3 = esc_attr( get_option('ddg_header_logo3') );
						$url4 = esc_attr( get_option('ddg_header_logo4') );
					?>

			<?php  if($url3){ ?>
			<div class="archive_banner " style="background-image:url(<?php echo $url3; ?>);" mobilex="http://icespring.com.tw/wp-content/uploads/2018/02/rectangle-12@2x.jpg">
						<div class="archive_banner_mobile" style="background-image:url(<?php echo $url4; ?>);">
										<img src="<?php echo $url3; ?>">
						</div>
			</div>
		<?php  } ?>




			<div  id="stickList"  class="grid">
					<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post();





							/*
							 * Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part( 'template-parts/content', 'allstick' );

						endwhile;




											global $wp_query;
											$big = 999999999; // need an unlikely integer
											$html = paginate_links( array(
											    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
											    //recommended for pretty permalinks, but you could use 'format' => '?paged=%#%', if you prefer
											    'format' => '/page/%#%',
													'prev_text' => '<svg xmlns="http://www.w3.org/2000/svg" width="40" height="42" viewBox="0 0 40 42"><g fill="#749233"  fill-rule="evenodd"><path d="M39.958 13.94a.741.741 0 0 1-1.397.494C35.883 6.849 28.676 1.753 20.628 1.753c-10.483 0-19.013 8.529-19.013 19.013 0 10.483 8.53 19.011 19.013 19.011 8.048 0 15.255-5.095 17.933-12.68a.74.74 0 1 1 1.397.494c-2.887 8.175-10.655 13.668-19.33 13.668-11.3 0-20.494-9.193-20.494-20.493C.134 9.465 9.328.27 20.628.27c8.675 0 16.443 5.494 19.33 13.67z"/><path d="M13.164 21.261l5.926 6.577a.74.74 0 1 0 1.1-.991l-4.811-5.34h12.317a.741.741 0 0 0 0-1.482H15.38l4.811-5.34a.741.741 0 0 0-1.1-.992l-5.926 6.577a.74.74 0 0 0 0 .991"/></g></svg>',
													'next_text'          => '<svg xmlns="http://www.w3.org/2000/svg" width="40" height="42" viewBox="0 0 40 42"><g fill="#749233" fill-rule="evenodd"><path d="M19.372 41.729c-8.675 0-16.443-5.494-19.33-13.67a.741.741 0 0 1 1.397-.493c2.678 7.585 9.885 12.681 17.933 12.681 10.483 0 19.013-8.529 19.013-19.013 0-10.483-8.53-19.011-19.013-19.011-8.048 0-15.255 5.095-17.933 12.68a.74.74 0 1 1-1.397-.494C2.93 6.234 10.697.741 19.372.741c11.3 0 20.494 9.193 20.494 20.493 0 11.301-9.194 20.495-20.494 20.495"/><path d="M26.836 20.739l-5.926-6.577a.74.74 0 1 0-1.1.991l4.811 5.34H12.304a.741.741 0 0 0 0 1.482H24.62l-4.811 5.34a.741.741 0 0 0 1.1.992l5.926-6.577a.74.74 0 0 0 0-.991"/></g></svg>',
											    'current' => max( 1, get_query_var('paged') ),
											    'total' => $wp_query->max_num_pages,
													'before_page_number' => '<span class="dot">',
													'after_page_number'  => '</span>'
											) );

											//set your additional decorative elements

											//mimics the default for paginate_links()
											$pretext = '<svg   style="opacity:0.5;" xmlns="http://www.w3.org/2000/svg" width="40" height="42" viewBox="0 0 40 42"><g fill="#749233"  fill-rule="evenodd"><path d="M39.958 13.94a.741.741 0 0 1-1.397.494C35.883 6.849 28.676 1.753 20.628 1.753c-10.483 0-19.013 8.529-19.013 19.013 0 10.483 8.53 19.011 19.013 19.011 8.048 0 15.255-5.095 17.933-12.68a.74.74 0 1 1 1.397.494c-2.887 8.175-10.655 13.668-19.33 13.668-11.3 0-20.494-9.193-20.494-20.493C.134 9.465 9.328.27 20.628.27c8.675 0 16.443 5.494 19.33 13.67z"/><path d="M13.164 21.261l5.926 6.577a.74.74 0 1 0 1.1-.991l-4.811-5.34h12.317a.741.741 0 0 0 0-1.482H15.38l4.811-5.34a.741.741 0 0 0-1.1-.992l-5.926 6.577a.74.74 0 0 0 0 .991"/></g></svg>';
											$posttext = '<svg style="opacity:0.5;" xmlns="http://www.w3.org/2000/svg" width="40" height="42" viewBox="0 0 40 42"><g fill="#749233" fill-rule="evenodd"><path d="M19.372 41.729c-8.675 0-16.443-5.494-19.33-13.67a.741.741 0 0 1 1.397-.493c2.678 7.585 9.885 12.681 17.933 12.681 10.483 0 19.013-8.529 19.013-19.013 0-10.483-8.53-19.011-19.013-19.011-8.048 0-15.255 5.095-17.933 12.68a.74.74 0 1 1-1.397-.494C2.93 6.234 10.697.741 19.372.741c11.3 0 20.494 9.193 20.494 20.493 0 11.301-9.194 20.495-20.494 20.495"/><path d="M26.836 20.739l-5.926-6.577a.74.74 0 1 0-1.1.991l4.811 5.34H12.304a.741.741 0 0 0 0 1.482H24.62l-4.811 5.34a.741.741 0 0 0 1.1.992l5.926-6.577a.74.74 0 0 0 0-.991"/></g></svg>';


											//assuming this set of links goes at bottom of page
											$pre_deco = '<a  class="prev disabled">' . $pretext . '</a>';
											$post_deco = '<a class="next  disabled">' . $posttext . '</a>';

											 //key variable
											$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;

											//add decorative non-link to first page
											if ( 1 === $paged) {
											  $html = $pre_deco . $html;
											}

											//add decorative non-link to last page
											if ( $wp_query->max_num_pages ==  $paged   ) {
											  $html = $html . $post_deco;
											}

											if($wp_query->max_num_pages>1){

											}
											//may be helpful to create a larger containing div so...
											echo '<div class="pagination-outter"><nav id="pagination-bottom" class="expanded-pagination">';
											if($wp_query->max_num_pages>1){
												echo $html;
											}
											echo '</nav></div>';



					//	the_posts_navigation();

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif; ?>
			</div>
		</main><!-- #main -->



<!-- Popup Modal -->
<!-- Modal -->
<div class="modal fade" id="stickModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
				<a href="#"  class="exit"  data-dismiss="modal" ><i class="ion-close-circled"></i></a>
				<h3>鶯歌陶瓷博物館</h3>
				<div id="sale_status">販售中</div>
				<div class="content">
					<img src="https://icespring.com.tw/wp-content/uploads/2017/11/螢幕快照-2017-11-10-上午10.58.13.png">
					<div class="date">
						2009.09
					</div>
				</div>
				<div class="desc">
					<p>台灣第一座以陶瓷為主題的專業博物館，以台灣陶瓷文化之典藏、展示及教育推廣工作為主，常設舉辦各項活動、展覽、研習等，作為經驗傳承的交流平台，並提升鶯歌陶瓷產業及地方形象。春一枝運用陶瓷為主題，為陶瓷博物館打造造型冰棒棍，冰棒手握處以陶片花朵為體，著色各種色彩，繽紛傳達博物館的活力與意象，食用後可當叉子使用。</p>
				</div>
      </div>
    </div>
  </div>
</div>
<!-- Popup Modal [END] -->

<?php
// get_sidebar();
get_footer();
