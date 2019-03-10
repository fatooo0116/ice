<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package fruit-ice
 */

get_header(); ?>


		<main id="main" class="site-main  col-sm-10">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', 'single' );


			// the_post_navigation();
		endwhile; // End of the loop.
		?>
		<script type="text/javascript">
			(function($){
				$(document).ready(function(){
					$(".mobile-nav h2").text('最新消息');
				});
			})(jQuery);
		</script>
		</main><!-- #main -->


<?php
// get_sidebar();
get_footer();
