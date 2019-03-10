<?php
/**
 *   Template name: 品牌精神
 */

get_header(); ?>


		<main id="main" class="site-main  col-sm-10">

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<h1>品牌精神</h1>
					<div class="sep">
						<a href="<?php echo site_url(); ?>">首頁</a>  &gt;  品牌精神
					</div>
				</header><!-- .entry-header -->


				<div class="brand_menu">
					<?php

							$args = array(
									'order'                  => 'ASC',
									'orderby'                => 'menu_order',
									'post_type'              => 'nav_menu_item',
									'post_status'            => 'publish',
									'output'                 => ARRAY_A,
									'output_key'             => 'menu_order',
									'nopaging'               => true,
									'update_post_term_cache' => false );

									 $menu_items = wp_get_nav_menu_items("品牌精神", $args );

									 $item_html= '';
									 $mobile_item_html= '';
									 $parent_id=0;
									 $current = false;


									 foreach( $menu_items as $menu ){;
															$class= ($menu->object_id == get_the_ID()) ? "cur" : "";

															$item_html .= '<li class="'.$class.'"><a href="'.$menu->url.'"    title="'.$menu->title.'">										 <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30"><path fill="#6E4A39" fill-rule="evenodd" d="M17.383 13.655c-.398-.706 5.74-7.726 7.66-4.328 1.92 3.4-7.262 5.033-7.66 4.328m7.496 7.3c-2.015 3.344-7.953-3.848-7.536-4.541.419-.694 9.55 1.199 7.536 4.542M15 12.264c-.809 0-3.902-8.798 0-8.798 3.904 0 .811 8.798 0 8.798m-.326 14.267c-3.901-.11-.56-8.818.25-8.795.809.023 3.652 8.906-.25 8.795m-1.975-13.01c-.438.683-9.514-1.469-7.404-4.754 2.109-3.283 7.841 4.073 7.404 4.755m-7.899 6.865c-1.822-3.453 7.402-4.825 7.781-4.109.378.717-5.958 7.56-7.78 4.11M15 0C6.716 0 0 6.716 0 15c0 8.285 6.716 15 15 15 8.284 0 15-6.715 15-15 0-8.284-6.716-15-15-15"></path></svg>'.$menu->title.'</a></li>';
											 }

											 echo "<ul>".$item_html."</ul>";
							?>
				</div>

				<div class="selectpicker  category_slk" >
					<select class="select  clink">
						<?php

							foreach( $menu_items as $menu ){
											 $class= ($menu->object_id == get_the_ID()) ? "selected" : "";

											 $item_html .= '<option href="'.$menu->url.'"  '.$class.'  >'.$menu->title.'</option>';
								}
								echo $item_html;
						?>
					</select>
				</div>



				<div id="brand1">

					<div class="xrow">
						<div class="xleft">
							<div class="pix1">
								<img src="<?php echo get_template_directory_uri()."/assets/img/br1.png"; ?>">
							</div>
							<div class="pix2">
								<img src="<?php echo get_template_directory_uri()."/assets/img/br2.png"; ?>">
							</div>
						</div>

						<div class="xright">
							<div class="text">
								<p>春一枝，2008年成立在花東縱谷裡生活步調緩慢，令人備感輕鬆愜意的夢土──台東鹿野高台；是為了解決台東鹿野農民經濟與就業問題，成立的一個友善交易品牌。</p>
								<p>
									春一枝創辦人李銘煌出生於臺北。喜歡旅行的他，造訪台東時，深受鹿野高台山明水秀與純樸吸引，而決定落腳常住。
									多年前的鹿野高台僅有人家約二十戶，WTO之前方圓八十五公頃皆茶園，王力宏還來此拍過茶飲廣告。如今茶園僅餘不多，多數地租給人種鳳梨。
									當時鄰居時不時就把鳳梨、釋迦等水果擺在剛於鹿野高台置產，春一枝創辦人李銘煌的家門口。免費的水果讓他吃到不好意思，對鄰居說：「不然我用買的好了」；沒想到鄰居回答：「免免免，我們是請你幫忙吃，不然這些水果也是要拿去丟掉。」</p>
							</div>
						</div>
					</div>



					<div class="xrow reverse">

						<div class="xleft  ">
							<div class="pix3">
								<img src="<?php echo get_template_directory_uri()."/assets/img/br3.png"; ?>">
							</div>
							<div class="pix4">
								<img src="<?php echo get_template_directory_uri()."/assets/img/br4.png"; ?>">
							</div>
						</div>

						<div class="xright  ">
							<div class="text">
								<p>這麼好吃的水果為什麼要丟？是李銘煌心中的疑惑。原來是鹿野農民在豐饒的土地上生產出許多的水果，有時生產過量，被不平等的低價收購，抑或過熟無法進入市場，只能棄置，造成水果耕作的血本無歸與糧食浪費。這也就是偶爾可以看到炎炎日頭下的台東馬路邊，阿嬤帶著三個孫子站在路邊賣鳳梨，一粒40，三粒100，還乏人問津。</p>

								<p>為了試著解決農民經濟與水果問題，不以營利為主要目標的春一枝於焉誕生。</p>

								<p>春一枝的每根冰棒都是來自土地的嚴選新鮮水果，純正手感，以友善交易固定利潤的模式，不剝削農民，用市場價格向農民收購正熟而無法進入經濟市場的季節性水果，將新鮮正熟的水果純手工製作成冰棒。大量使用人工，提供就業機會，把冰棒的生產根留台東，解決在地與水果問題，將台灣水果以冰品的形式保留原味精神。所以當您購買春一枝的冰棒，不但吃進的是對身體健康的祝福，也等於送給農民一份希望。</p>

								<p>春一枝堅持高品質，將水果冰棒帶入消費市場，開啟了農業與冰品嶄新的一頁，也成為關懷農民與消費者，最受國人喜愛的新鮮水果手作冰棒品牌。</p>

							</div>
						</div>
					</div><!-- xrow -->
				</div><!-- #brand1 -->



				<div id="think" class="">
					<div class="apix">
						<img src="<?php echo get_template_directory_uri()."/assets/img/br5.png"; ?>">
					</div>
					<div class="text">
						<h3>經營理念</h3>
						<div class="inner">
							<div class="tp">
								<div class="tx">
									〔用心〕
								</div>
								<div class="tdes">
									將優質水果最新鮮的風味完整留存
								</div>
							</div>

							<div class="tp">
								<div class="tx">
									〔良心〕
								</div>
								<div class="tdes">
									所有產品都當成做給自己家人一般
								</div>
							</div>

							<div class="tp">
								<div class="tx">
									〔開心〕
								</div>
								<div class="tdes">
									友善交易讓生產消費變成快樂的事
								</div>
							</div>
						</div>
					</div>
				</div>





				<div class="entry-content">
					<?php
						the_content();
					?>
				</div><!-- .entry-content -->
			</article><!-- #post-<?php the_ID(); ?> -->



			<?php
			while ( have_posts() ) : the_post();

				// get_template_part( 'template-parts/content', 'page' );


			endwhile; // End of the loop.
			?>

		</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
