<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package fruit-ice
 */

get_header(); ?>


		<main id="main" class="site-main col-sm-10">
		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<h1>門市據點</h1>
				<div class="sep">
					<a href="<?php echo site_url(); ?>">首頁</a>  &gt;  門市據點
				</div>
			</header><!-- .page-header -->


			<div   id="storefilter">
						<div class="alltags  row">
							<?php

								$wicon = array(
									'新鮮水果手作冰棒販賣點'=>'<svg xmlns="http://www.w3.org/2000/svg" width="12" height="24" viewBox="0 0 12 24"><path fill="#FFF" fill-rule="evenodd" d="M11.737 3.995a5.949 5.949 0 0 0-.66-1.512 4.955 4.955 0 0 0-1.355-1.445C8.745.349 7.492 0 6 0 .168 0 0 5.855 0 6.523v11.582c0 .277.225.501.502.501h3.261v3.355c.001.053.019.53.299 1.015.27.467.829 1.024 1.959 1.024.696 0 1.25-.203 1.648-.602a2.036 2.036 0 0 0 .568-1.363v-3.429h3.261a.502.502 0 0 0 .502-.501V5.812a6.9 6.9 0 0 0-.263-1.817"/></svg>',
									'土生良品販賣點'=>'<svg xmlns="http://www.w3.org/2000/svg" width="16" height="24" viewBox="0 0 16 24"><path fill="#FFF" fill-rule="evenodd" d="M8 0c-.505-.005-.865.119-1.06.363a.755.755 0 0 0-.143.595c0 1.234-.544 2.46-1.576 3.544C4.209 5.566 2.849 6.243.941 6.634c-.035.007-.083.017-.123.05a.26.26 0 0 0-.073.14C.237 8.756 0 10.35 0 11.837c0 6.528 3.589 11.838 8 11.838s8-5.31 8-11.838C16 5.34 12.411.029 8 0"/></svg>',
									'周邊商品販賣點'=>'<svg xmlns="http://www.w3.org/2000/svg" width="16" height="22" viewBox="0 0 16 22"><path fill="#FFF" fill-rule="evenodd" d="M3.548 2.802c-.241-.548-.205-1.052.1-1.383.199-.218.493-.332.824-.332.17 0 .352.03.535.093 1 .342 1.587 1.617 2.149 2.863-1.267-.04-3.194-.303-3.608-1.241m7.445-1.622a1.66 1.66 0 0 1 .535-.093c.331 0 .625.114.825.332.304.331.34.835.099 1.383-.414.939-2.34 1.2-3.608 1.24.562-1.245 1.148-2.52 2.15-2.862m3.898 3.398h-2.966c.672-.284 1.242-.707 1.52-1.338.417-.946.308-1.902-.292-2.556-.6-.653-1.562-.857-2.512-.532C9.31.607 8.596 1.972 8 3.274 7.404 1.972 6.69.607 5.358.152c-.95-.325-1.913-.12-2.512.532-.6.654-.71 1.61-.292 2.556.278.63.848 1.054 1.52 1.338H1.109C.496 4.578 0 5.074 0 5.686v3.838c0 .612.496 1.108 1.108 1.108h.281v8.962c0 .933.756 1.69 1.689 1.69h9.844c.933 0 1.689-.757 1.689-1.69v-8.962h.28c.613 0 1.109-.496 1.109-1.108V5.686c0-.612-.496-1.108-1.108-1.108"/></svg>',
								);


									$terms = get_terms( array(
														'taxonomy' => 'type',
														'hide_empty' => true,
														'orderby' => 'name',
            								'order' => 'DESC'
												) );
									$i=0;
									foreach($terms as $term){
										$i++;
											?>
											<div class="tag  col-sm-4">
												<input class="styled-checkbox" id="styled-checkbox-<?php echo $i; ?>" type="checkbox"   value="value1">
												<label for="styled-checkbox-<?php echo $i; ?>"><?php echo $term->name; ?>&nbsp;
													<?php echo  $wicon[$term->name]; ?>
												</label>
											</div>
											<?php
									}
							 ?>
				</div>



				<div class="location">
						<div class="">
							選擇地點
						</div>
						<div class="select1">
							<select class="selectpicker"   id="lc1">
															<option value="基隆市">基隆市</option>
															<option value="臺北市">臺北市</option>
															<option value="新北市">新北市</option>
															<option value="宜蘭縣">宜蘭縣</option>
															<option value="新竹市">新竹市</option>
															<option value="桃園市"> 桃園市</option>
															<option value="苗栗縣">苗栗縣</option>
															<option value="臺中市">臺中市</option>
															<option value="彰化縣">彰化縣</option>
															<option value="南投縣">南投縣</option>
															<option value="嘉義市">嘉義市</option>
															<option value="嘉義縣">嘉義縣</option>
															<option value="雲林縣">雲林縣</option>
															<option value="臺南市">臺南市</option>
															<option value="高雄市">高雄市</option>
															<option value="屏東縣">屏東縣</option>
															<option value="臺東縣">臺東縣</option>
															<option value="花蓮縣">花蓮縣</option>
															<option value="金門縣">金門縣</option>
															<option value="連江縣">連江縣</option>
															<option value="澎湖縣">澎湖縣</option>
							</select>
						</div>
						<div class="select2">
							<select class="selectpicker"  id="lc2">
								<option>Mustard</option>
								<option>Ketchup</option>
								<option>Relish</option>
							</select>
						</div>
				</div>
			</div>












			<div  id="storeList"  class="grid">
					<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post();

							/*
							 * Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part( 'template-parts/content', 'allstore' );

						endwhile;

						the_posts_navigation();

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif; ?>
			</div>
		</main><!-- #main -->


<?php
// get_sidebar();
get_footer();
