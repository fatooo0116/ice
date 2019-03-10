<?php
/**
 *   Template name: Resend Active Email
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
						if(isset($_POST['user_resend']) &&  !empty($_POST['user_resend'])){


							$user = get_user_by('email',$_POST['user_resend']);

							// print_r($user->data->ID);


							if($user){
								 	my_user_register($user->data->ID);
									// wc_print_notice('確認信已成功寄出','success');
									?>
									<div id="reg_email_sent" class="modal fade" tabindex="-1" role="dialog">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-body">

													<div class="orange">
															<div class="text">
																重設密碼信<br/>已寄送
															</div>
													</div>

													<p>請至信箱收取信件</p>
													<a href="<?php echo site_url('/resend_email/'); ?>"  class="btn "   data-dismiss="modal"  ><span>確定</span></a>
												</div>
											</div><!-- /.modal-content -->
										</div><!-- /.modal-dialog -->
									</div><!-- /.modal -->
									<script type="text/javascript">
									var $ = jQuery;
										$(document).ready(function(){
												$('#reg_email_sent').modal('show');
												setTimeout(function(){
													$('#reg_email_sent').find(".orange").addClass("ani");
												},500);
										});
									</script>


									<?php

							}else{
								wc_print_notice('確認信寄出失敗，請確認 Email 是否正確','success');
							}



						}
					?>

					<div class="account_outter_box" style="border:0px;margin:100px; auto 0;">
					<form method="post" class="woocommerce-ResetPassword lost_reset_password">
						<h3 class="ptitle">請輸入您註冊的Email，<br/>系統將會寄送發發認證信到你的信箱</h3>
						<p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
							<input class="woocommerce-Input woocommerce-Input--text input-text" placeholder="請輸入註冊的Email" type="text" name="user_resend" id="user_resend">
						</p>

						<div class="clear"></div>

						<p class="woocommerce-form-row form-row">
							<input type="hidden" name="wc_reset_password" value="true">
							<input type="submit" class="woocommerce-Button button" value="確定">
						</p>

						<input type="hidden" id="_wpnonce" name="_wpnonce" value="4f216b89eb"><input type="hidden" name="_wp_http_referer" value="/my-account/lost-password/">
					</form>
					</div>



				</div><!-- .entry-content -->
			</article><!-- #post-<?php the_ID(); ?> -->
		</main><!-- #main -->


<?php
// get_sidebar();
get_footer();
