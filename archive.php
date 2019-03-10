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
		if ( have_posts() ) { ?>
			<header class="page-header">
				<h1>最新消息</h1>
				<?php
					the_archive_description( '<div class="archive-description">', '</div>' );
				?>
				<div class="sep">
					<a href="<?php echo site_url(); ?>">首頁</a>  &gt;  最新消息
				</div>
			</header><!-- .page-header -->

				<div id="postList"  class="grid">


					<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post();

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', 'allsingle' );

					endwhile;

					 // the_posts_navigation();





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
					//may be helpful to create a larger containing div so...
					echo '<div class="pagination-outter"><nav id="pagination-bottom" class="expanded-pagination">';
						echo $html;
					echo '</nav></div>';
				}

			}else{

					get_template_part( 'template-parts/content', 'none' );

				} ?>
				</div>
		</main><!-- #main -->

		<script type="text/javascript">
			(function($){
				$(document).ready(function(){
					$(".mobile-nav h2").text('最新消息');
				});
			})(jQuery);
		</script>
<?php
// get_sidebar();
get_footer();
