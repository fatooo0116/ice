<?php
/**
 *   Template name: 品牌精神-合作品牌
 */

get_header(); ?>


		<main id="main" class="site-main  col-sm-10">

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<h1>合作品牌</h1>
					<div class="sep">
						<a href="<?php echo site_url(); ?>">首頁</a>  &gt;  合作品牌
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


				<div id="cooperation" class="row">

					<h2  class="brand_title">
						合作品牌
						<div class="sep"></div>
					</h2>

					<section  class="br1">
						<div class="row">
							<div class="col-sm-3  col-xs-4">
								<div class="item"  style="background-image:url('<?php echo get_template_directory_uri();?>/assets/img/logo/lo1.png');" >
									<img src="<?php echo get_template_directory_uri();?>/assets/img/logo/lo1.png">
								</div>
							</div>
							<div class="col-sm-3  col-xs-4">
								<div class="item vh"  style="background-image:url('<?php echo get_template_directory_uri();?>/assets/img/logo/lo2.png');" >
									<img src="<?php echo get_template_directory_uri();?>/assets/img/logo/lo2.png">
								</div>
							</div>
							<div class="col-sm-3  col-xs-4">
								<div class="item"  style="background-image:url('<?php echo get_template_directory_uri();?>/assets/img/logo/lo3.png');" >
									<img src="<?php echo get_template_directory_uri();?>/assets/img/logo/lo3.png">
								</div>
							</div>
							<div class="col-sm-3  col-xs-4">
								<div class="item"  style="background-image:url('<?php echo get_template_directory_uri();?>/assets/img/logo/lo4.png');" >
									<img src="<?php echo get_template_directory_uri();?>/assets/img/logo/lo4.png">
								</div>
							</div>

							<div class="col-sm-3  col-xs-4">
								<div class="item"  style="background-image:url('<?php echo get_template_directory_uri();?>/assets/img/logo/lo5.png');" >
									<img src="<?php echo get_template_directory_uri();?>/assets/img/logo/lo5.png">
								</div>
							</div>
							<div class="col-sm-3  col-xs-4">
								<div class="item"  style="background-image:url('<?php echo get_template_directory_uri();?>/assets/img/logo/lo6.png');" >
									<img src="<?php echo get_template_directory_uri();?>/assets/img/logo/lo6.png">
								</div>
							</div>
							<div class="col-sm-3  col-xs-4">
								<div class="item"  style="background-image:url('<?php echo get_template_directory_uri();?>/assets/img/logo/lo7.png');" >
									<img src="<?php echo get_template_directory_uri();?>/assets/img/logo/lo7.png">
								</div>
							</div>
							<div class="col-sm-3  col-xs-4">
								<div class="item"  style="background-image:url('<?php echo get_template_directory_uri();?>/assets/img/logo/lo8.png');" >
									<img src="<?php echo get_template_directory_uri();?>/assets/img/logo/lo8.png">
								</div>
							</div>

							<div class="col-sm-3  col-xs-4">
								<div class="item"  style="background-image:url('<?php echo get_template_directory_uri();?>/assets/img/logo/lo9.png');" >
									<img src="<?php echo get_template_directory_uri();?>/assets/img/logo/lo9.png">
								</div>
							</div>
							<div class="col-sm-3  col-xs-4">
								<div class="item"  style="background-image:url('<?php echo get_template_directory_uri();?>/assets/img/logo/lo10.png');" >
									<img src="<?php echo get_template_directory_uri();?>/assets/img/logo/lo10.png">
								</div>
							</div>
							<<div class="col-sm-3  col-xs-4">
								<div class="item"  style="background-image:url('<?php echo get_template_directory_uri();?>/assets/img/logo/lo11.png');" >
									<img src="<?php echo get_template_directory_uri();?>/assets/img/logo/lo11.png">
								</div>
							</div>
							<div class="col-sm-3  col-xs-4">
								<div class="item"  style="background-image:url('<?php echo get_template_directory_uri();?>/assets/img/logo/lo12.png');" >
									<img src="<?php echo get_template_directory_uri();?>/assets/img/logo/lo12.png">
								</div>
							</div>

							<div class="col-sm-3  col-xs-4">
								<div class="item"  style="background-image:url('<?php echo get_template_directory_uri();?>/assets/img/logo/lo13.png');" >
									<img src="<?php echo get_template_directory_uri();?>/assets/img/logo/lo13.png">
								</div>
							</div>
							<div class="col-sm-3  col-xs-4">
								<div class="item"  style="background-image:url('<?php echo get_template_directory_uri();?>/assets/img/logo/lo14.png');" >
									<img src="<?php echo get_template_directory_uri();?>/assets/img/logo/lo14.png">
								</div>
							</div>
							<div class="col-sm-3  col-xs-4">
								<div class="item"  style="background-image:url('<?php echo get_template_directory_uri();?>/assets/img/logo/lo15.png');" >
									<img src="<?php echo get_template_directory_uri();?>/assets/img/logo/lo15.png">
								</div>
							</div>
							<div class="col-sm-3  col-xs-4">
								<div class="item"  style="background-image:url('<?php echo get_template_directory_uri();?>/assets/img/logo/lo16.png');" >
									<img src="<?php echo get_template_directory_uri();?>/assets/img/logo/lo16.png">
								</div>
							</div>

							<div class="col-sm-3  col-xs-4">
								<div class="item"  style="background-size:85% auto;background-image:url('<?php echo get_template_directory_uri();?>/assets/img/logo/lo17.png');" >
									<img src="<?php echo get_template_directory_uri();?>/assets/img/logo/lo17.png">
								</div>
							</div>
							<div class="col-sm-3  col-xs-4">
								<div class="item"  style="background-image:url('<?php echo get_template_directory_uri();?>/assets/img/logo/lo18.png');" >
									<img src="<?php echo get_template_directory_uri();?>/assets/img/logo/lo18.png">
								</div>
							</div>
							<div class="col-sm-3  col-xs-4">
								<div class="item"  style="background-image:url('<?php echo get_template_directory_uri();?>/assets/img/logo/lo19.png');" >
									<img src="<?php echo get_template_directory_uri();?>/assets/img/logo/lo19.png">
								</div>
							</div>
							<div class="col-sm-3  col-xs-4">
								<div class="item"  style="background-image:url('<?php echo get_template_directory_uri();?>/assets/img/logo/lo20.png');" >
									<img src="<?php echo get_template_directory_uri();?>/assets/img/logo/lo20.png">
								</div>
							</div>
							<div class="col-sm-3  col-xs-4">
								<div class="item  vh"  style="background-size:auto 93%;;background-image:url('<?php echo get_template_directory_uri();?>/assets/img/logo/lo21.png');" >
									<img src="<?php echo get_template_directory_uri();?>/assets/img/logo/lo21.png">
								</div>
							</div>
							<div class="col-sm-3  col-xs-4">
								<div class="item"  style="background-image:url('<?php echo get_template_directory_uri();?>/assets/img/logo/lo22.png');" >
									<img src="<?php echo get_template_directory_uri();?>/assets/img/logo/lo22.png">
								</div>
							</div>
							<div class="col-sm-3 col-xs-4">
								<div class="item  "  style="background-image:url('<?php echo get_template_directory_uri();?>/assets/img/logo/lo23.png');" >
									<img src="<?php echo get_template_directory_uri();?>/assets/img/logo/lo23.png">
								</div>
							</div>
						</div>
					</section>


					<h2  class="brand_title">
						合作博物館及歷史古蹟
						<div class="sep"></div>
					</h2>

					<section  class="br1">
						<div class="row">
							<div class="col-sm-3 col-xs-4">
								<div class="item"  style="background-image:url('<?php echo get_template_directory_uri();?>/assets/img/logo/lo24.png');" >
									<img src="<?php echo get_template_directory_uri();?>/assets/img/logo/lo24.png">
								</div>
							</div>
							<div class="col-sm-3 col-xs-4">
								<div class="item"  style="background-image:url('<?php echo get_template_directory_uri();?>/assets/img/logo/lo25.png');" >
									<img src="<?php echo get_template_directory_uri();?>/assets/img/logo/lo25.png">
								</div>
							</div>
							<div class="col-sm-3 col-xs-4">
								<div class="item"  style="background-image:url('<?php echo get_template_directory_uri();?>/assets/img/logo/lo26.png');" >
									<img src="<?php echo get_template_directory_uri();?>/assets/img/logo/lo26.png">
								</div>
							</div>
							<div class="col-sm-3 col-xs-4">
								<div class="item"  style="background-image:url('<?php echo get_template_directory_uri();?>/assets/img/logo/lo27.png');" >
									<img src="<?php echo get_template_directory_uri();?>/assets/img/logo/lo27.png">
								</div>
							</div>

							<div class="col-sm-3 col-xs-4">
								<div class="item  vh"  style="background-image:url('<?php echo get_template_directory_uri();?>/assets/img/logo/lo28.png');" >
									<img src="<?php echo get_template_directory_uri();?>/assets/img/logo/lo28.png">
								</div>
							</div>
							<div class="col-sm-3 col-xs-4">
								<div class="item "  style="background-image:url('<?php echo get_template_directory_uri();?>/assets/img/logo/lo29.png');" >
									<img src="<?php echo get_template_directory_uri();?>/assets/img/logo/lo29.png">
								</div>
							</div>
							<div class="col-sm-3 col-xs-4">
								<div class="item"  style="background-image:url('<?php echo get_template_directory_uri();?>/assets/img/logo/lo30.png');" >
									<img src="<?php echo get_template_directory_uri();?>/assets/img/logo/lo30.png">
								</div>
							</div>
							<div class="col-sm-3 col-xs-4">
								<div class="item"  style="background-image:url('<?php echo get_template_directory_uri();?>/assets/img/logo/lo31.png');" >
									<img src="<?php echo get_template_directory_uri();?>/assets/img/logo/lo31.png">
								</div>
							</div>
							<div class="col-sm-3 col-xs-4">
								<div class="item"  style="background-image:url('<?php echo get_template_directory_uri();?>/assets/img/logo/lo32.png');" >
									<img src="<?php echo get_template_directory_uri();?>/assets/img/logo/lo32.png">
								</div>
							</div>
							<div class="col-sm-3 col-xs-4">
								<div class="item "  style="background-image:url('<?php echo get_template_directory_uri();?>/assets/img/logo/lo33.png');" >
									<img src="<?php echo get_template_directory_uri();?>/assets/img/logo/lo33.png">
								</div>
							</div>
						</div>

					</section>

				</div><!-- #brand1 -->







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
