<?php
/**
 *   Template name: HomePage
 */


get_header(); ?>
		<main id="main" class="site-main col-sm-10"  mbname="" >

		<div id="hsection1">
			<h3>春一枝緣起</h3>
			<div class="text">
				<p>春一枝於2008年成立，是為了解決台灣果農經濟、就業，以及水果生產問題，成立的友善交易品牌。</p>
				<p>春一枝創辦人李銘煌出生台北。喜歡旅行的他造訪台東時，深受鹿野高台山明水秀與純樸吸引，決定落腳常住。他發現鹿野農民在豐饒的土地上生產出許多水果，有時生產過量被不平等的低價收購；抑或過熟無法進入市場，只能棄置，造成水果耕作的血本無歸。為了試著解決農民經濟、就業，以及水果生產問題，不以營利為主要目標的春一枝於焉誕生。堅持使用100%台灣新鮮水果、手作無添加高品質冰棒、友善交易愛護農民並關懷消費者權益，春一枝將台灣冰棒帶入新紀元！</p>
			</div>
		</div>




				<!-- ######################  hsection2  ########### -->
				<div id="hsection2">
					<div class="mimg  mp1"  style="background-image:url(<?php echo get_template_directory_uri(); ?>/assets/img/h11.jpg)">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/h11.jpg">
					</div>

					<div class="mimg  mp2"  style="background-image:url(<?php echo get_template_directory_uri(); ?>/assets/img/h12.jpg)">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/h12.jpg">
					</div>

					<div class="mimg  mp3"  style="background-image:url(<?php echo get_template_directory_uri(); ?>/assets/img/h13.jpg)">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/h13.jpg">
					</div>
				</div>
				<!-- ######################  hsection2  [end] ########### -->





		<!-- ######################  hsection3  ########### -->
		<div id="hsection3"><!-- Slider -->
			<h3 class="t1">
				<div class="title  right">
					最新消息<span>News</span>
				</div>
			</h3>
			<div class="news_slier">
				<div  class="right_nav"></div>
				<?php
					$args = array(
						'post_type'=>'post',
						'posts_per_page' => 5,
						'order' => 'DESC',
						'orderby' => 'date',
					);

					$the_query = new WP_Query( $args );
					if($the_query->post_count >0){
						echo '<div class="flexslider2">';
						if ( $the_query->have_posts() ) {
							// The Loop
							while ( $the_query->have_posts() ) {
								$the_query->the_post();
								$pic = get_the_post_thumbnail_url(get_the_ID(), 'full');
								$title = get_the_Title();
								$mdate = get_the_date("Y.m.d",get_the_ID());
								$excerpt = get_the_excerpt();
								echo '<div class="slickx"><div class="item" style="background-image:url('.$pic.')"><div class="ibk" style="background-image:url('.$pic.')" ></div><div class="subtext"><div class="date">'.$mdate.'</div><h3>'.$title.'</h3><div class="content">'.$excerpt.'</div><a  class="more"  href="'.get_the_permalink().'"><span>more</span> <i class="ion-ios-more"></i></a></div></div></div>';
							}
							wp_reset_postdata();
						}
						echo '</div>';
					}; /*    */
				?>
			</div><!--  news_slider -->
		</div>
		<!-- ######################  hsection3  [end] ########### -->




		<div id="hsection4"><!-- Slider -->
			<h3 class="t1">
				<div class="title">
					來呷枝仔冰<span>Online shop</span>
				</div>
			</h3>

			<div class="inner">
				<div class="feature_img">
					<div  class="fximg" style="background-image:url(<?php echo get_template_directory_uri(); ?>/assets/img/h31.jpg);">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/h31.jpg">
					</div>

					<div class="mtext">
						<h3>我們的三大堅持</h3>
						<p>
							使用100%台灣新鮮水果<br/>
							手作無添加最高品質的冰棒<br/>
							友善交易愛護農民，關懷消費者權益</p>
					</div>
				</div>


				<!-- #########   moving_img ############## -->
				<div class="move_img">
					<div class="mimg1"  style="background-image:url(<?php echo get_template_directory_uri(); ?>/assets/img/h37.jpg);">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/h37.jpg">
					</div>

					<div class="mimg2"  style="background-image:url(<?php echo get_template_directory_uri(); ?>/assets/img/h38.jpg);">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/h38.jpg">
					</div>
				</div>
				<!-- #########   moving_img [End] ############## -->

			</div>

			<div class="more_btn">
				<div class="inner">
					<div class="btn_img">
						<ul>
							<li class="a1"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/h34.svg"></li>
							<li class="a2"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/h32.svg"></li>
							<li class="a3"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/h33.svg"></li>
						</ul>
					</div>


					<a href="<?php  echo site_url('/shop/'); ?>"  class="btn  ani-btn"  id="wdr-inview" ><span>
						<svg  enable-background="new 0 0 96 96" height="96px" id="arrow_left" version="1.1" viewBox="0 0 96 96" width="96px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
							<path d="M12,52h62.344L52.888,73.456c-1.562,1.562-1.562,4.095-0.001,5.656c1.562,1.562,4.096,1.562,5.658,0l28.283-28.284l0,0  c0.186-0.186,0.352-0.391,0.498-0.609c0.067-0.101,0.114-0.21,0.172-0.315c0.066-0.124,0.142-0.242,0.195-0.373  c0.057-0.135,0.089-0.275,0.129-0.415c0.033-0.111,0.076-0.217,0.099-0.331C87.973,48.525,88,48.263,88,48l0,0  c0-0.003-0.001-0.006-0.001-0.009c-0.001-0.259-0.027-0.519-0.078-0.774c-0.024-0.12-0.069-0.231-0.104-0.349  c-0.039-0.133-0.069-0.268-0.123-0.397c-0.058-0.139-0.136-0.265-0.208-0.396c-0.054-0.098-0.097-0.198-0.159-0.292  c-0.146-0.221-0.314-0.427-0.501-0.614L58.544,16.888c-1.562-1.562-4.095-1.562-5.657-0.001c-1.562,1.562-1.562,4.095,0,5.658  L74.343,44L12,44c-2.209,0-4,1.791-4,4C8,50.209,9.791,52,12,52z"/></svg>
						瞭解更多
						<svg   enable-background="new 0 0 96 96" height="96px" id="arrow_right" version="1.1" viewBox="0 0 96 96" width="96px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
							<path d="M12,52h62.344L52.888,73.456c-1.562,1.562-1.562,4.095-0.001,5.656c1.562,1.562,4.096,1.562,5.658,0l28.283-28.284l0,0  c0.186-0.186,0.352-0.391,0.498-0.609c0.067-0.101,0.114-0.21,0.172-0.315c0.066-0.124,0.142-0.242,0.195-0.373  c0.057-0.135,0.089-0.275,0.129-0.415c0.033-0.111,0.076-0.217,0.099-0.331C87.973,48.525,88,48.263,88,48l0,0  c0-0.003-0.001-0.006-0.001-0.009c-0.001-0.259-0.027-0.519-0.078-0.774c-0.024-0.12-0.069-0.231-0.104-0.349  c-0.039-0.133-0.069-0.268-0.123-0.397c-0.058-0.139-0.136-0.265-0.208-0.396c-0.054-0.098-0.097-0.198-0.159-0.292  c-0.146-0.221-0.314-0.427-0.501-0.614L58.544,16.888c-1.562-1.562-4.095-1.562-5.657-0.001c-1.562,1.562-1.562,4.095,0,5.658  L74.343,44L12,44c-2.209,0-4,1.791-4,4C8,50.209,9.791,52,12,52z"/></svg>
					</span></a>

				</div>
			</div>
		</div>

			<?php
			while ( have_posts() ) : the_post();

				// get_template_part( 'template-parts/content', 'home' );

				// If comments are open or we have at least one comment, load up the comment template.
				/*
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
				*/

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->


<?php
get_footer();
