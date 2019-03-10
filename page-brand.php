<?php
/**
 *   Template name: 品牌精神-大紀事
 */

get_header(); ?>


		<main id="main" class="site-main  col-sm-10">

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<h1>大紀事</h1>
					<div class="sep">
						<a href="<?php echo site_url(); ?>">首頁</a>  &gt;  大紀事
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




				<div id="company_event" >
					<div id="event_grid">
					<?php
					// the query

					$args = array(
						'post_type' =>'event',
						'posts_per_page' => 99,
						'order' => 'DESC',
						'orderby' => 'date'
					);

					$the_query = new WP_Query( $args ); ?>

					<?php if ( $the_query->have_posts() ) : ?>

						<!-- pagination here -->

						<!-- the loop -->
						<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

							<article class="grid-item">
								<div class="event">
									<div class="date">
										<?php echo get_the_date("Y");?>
									</div>
									<div class="content">
										<h3><?php the_title(); ?></h3>
										<div class="text">
											<?php  the_content(); ?>
										</div>
									</div>
								</div>
							</article>

						<?php endwhile; ?>
						<!-- end of the loop -->

						<!-- pagination here -->

						<?php wp_reset_postdata(); ?>

					<?php else : ?>
						<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
					<?php endif; ?>
					</div><!-- event_grid -->
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
