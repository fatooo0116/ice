<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package fruit-ice
 */

get_header(); ?>


		<main id="main" class="site-main  col-sm-10">

			<section class="error-404 not-found">
				<header class="page-header hide">
					<h1 class="page-title"><?php esc_html_e( '不好意思  此頁面搜尋不到', 'fruit-ice' ); ?></h1>
				</header><!-- .page-header -->
				<div class="page-content">
						<div class="error404"></div>
						<h2>
							哎呀～這支冰棒被吃完了<br/>
							趕快回店裡找找新口味吧
						</h2>
						<a href="#"  class="btn button">回到春一枝</a>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->


<?php
get_footer();
