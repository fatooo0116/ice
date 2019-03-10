<?php
/**
 *   Template name: Active Account
 */


get_header(); ?>

		<main id="main" class="site-main col-sm-10">


			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					<div class="sep"></div>
				</header><!-- .entry-header -->

				<div class="entry-content">

					<?php
						if(isset($_GET['p'])){
										$data = unserialize(base64_decode($_GET['p']));
										$code = get_user_meta($data['id'], 'activationcode', true);
										// check whether the code given is the same as ours
										if($code == $data['code']){
														// update the db on the activation process
														update_user_meta($data['id'], 'is_activated', 1);
														// echo "您的帳號已經被啟動 謝謝";
														?>

														<div  class="tai_message">
														      <div class="msg-body">

																		<div class="orange">
																				<div class="text">
																					Email驗證<br/>成功
																				</div>
																		</div>
																		<p>請重新登入</p>
																		<a href="<?php echo site_url('/my-account/'); ?>"  class="btn"><span>確定</span></a>
														      </div><!-- msg-body -->
														</div><!-- tai_message -->

														<?php
										}else{
														wc_add_notice( __( '<strong>Error:</strong> Activation fails, please contact our administrator. '),'error');
										}
						}



						if(isset($_GET['u'])){
										my_user_register($_GET['u']);
										wc_add_notice( __( '<strong>Succes:</strong> Your activation email has been resend. Please check your email.', 'inkfool' ) );
										?>

										<div  class="tai_message">
													<div class="msg-body">

														<div class="orange">
																<div class="text">
																	驗證信成功寄出
																</div>
														</div>
														<p>請重新登入</p>
														<a href="<?php echo site_url('/my-account/'); ?>"  class="btn"><span>確定</span></a>
													</div><!-- msg-body -->
										</div><!-- tai_message -->

										<?php

						}

					?>

				</div><!-- .entry-content -->
			</article><!-- #post-<?php the_ID(); ?> -->
		</main><!-- #main -->

		<script type="text/javascript">
			(function($){
				$(document).ready(function(){
					setTimeout(function(){
						$(".orange").addClass("ani");
					},1000);					
				});
			})(jQuery);
		</script>
<?php
// get_sidebar();
get_footer();
