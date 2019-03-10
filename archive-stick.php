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
				<h1>文化冰棒棍</h1>
				<?php
					the_archive_description( '<div class="archive-description">', '</div>' );
				?>
				<div class="sep"></div>
			</header><!-- .page-header -->


				<div class="taxonomy_link">
					<ul  class="clearfix">
					<?php
							$terms = get_terms( array(
										    'taxonomy' => 'series',
										    'hide_empty' => true,
										) );

							foreach($terms as $term){
									?>
									<li><a href="<?php echo get_term_link($term->term_id); ?>"><?php echo $term->name; ?></a></li>
									<?php
							}
					 ?>
					 </ul>
				</div>


				<div class="archive_banner ">
					<?php
					 		$banner = esc_attr( get_option('option_stick_banner') );
							$url = wp_get_attachment_url( $banner);
							
							if($url){
								?>
								<div class="banner"  style="background-image:url(<?php echo $url; ?>)">
									<img src="<?php echo $url; ?>">
								</div>
								<?php
							}
					 ?>
				</div>




				<div id="stickList"  class="grid">
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

					 // the_posts_navigation();





					global $wp_query;
					$big = 999999999; // need an unlikely integer
					$html = paginate_links( array(
					    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
					    //recommended for pretty permalinks, but you could use 'format' => '?paged=%#%', if you prefer
					    'format' => '/page/%#%',
							'prev_text'          => __('« Previous'),
							'next_text'          => __('Next »'),
					    'current' => max( 1, get_query_var('paged') ),
					    'total' => $wp_query->max_num_pages,
							'before_page_number' => '<span class="dot">',
							'after_page_number'  => '</span>'
					) );

					//set your additional decorative elements

					//mimics the default for paginate_links()
					$pretext = '&laquo; Previous';
					$posttext = 'Next &raquo';

					//assuming this set of links goes at bottom of page
					$pre_deco = '<div id="bottom-deco-pre-link" class="deco-links">' . $pretext . '</div>';
					$post_deco = '<div id="bottom-deco-post-link" class="deco-links">' . $posttext . '</div>';

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

					//may be helpful to create a larger containing div so...
					echo '<nav id="pagination-bottom" class="expanded-pagination">';
						echo $html;
					echo '</nav>';

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif; ?>
				</div>
		</main><!-- #main -->


<?php
// get_sidebar();
get_footer();
