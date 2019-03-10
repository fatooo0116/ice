<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.2.0
 */


/*   我的帳戶   */



if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php wc_print_notices(); ?>

<?php do_action( 'woocommerce_before_customer_login_form' ); ?>


<?php
	if(is_wc_endpoint_url('orders')){
		require(plugin_dir_path( __FILE__ )."../../wdr/woo-tpl-orders.php");

	}else{
		// echo "xxxx";
	}



?>


<?php
  /*  #################
	 *
	 *      POPup  Window  註冊成功  但未啟動驗證
	 *
	 ###################  */

	if(isset($_GET['req']) && $_GET['req']==1){
		?>

	<div id="reg_email_sent" class="modal fade" tabindex="-1" role="dialog">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-body">

					<div class="orange">
							<div class="text">
								註冊成功
							</div>
					</div>
					<h3>恭喜您已成為春一枝會員，請到註冊信箱<br/>
		點擊認證信裡的連結，就可以完成註冊流程囉</h3>
					<p>1分鐘內沒有收到認證信，請按“再次寄送”按鈕</p>
					<a href="<?php echo site_url('/resend_email/'); ?>"  class="btn"><span>再次寄送</span></a>
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
				},800);
		});
	</script>

		<?php
	}

?>




<?php
  /*  #################
	 *
	 *      POPup  Window  更新密碼
	 *
	 ###################  */

	if(isset($_GET['password-reset']) && $_GET['password-reset']==true){
		?>

	<div id="reg_email_sent" class="modal fade" tabindex="-1" role="dialog">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-body">

					<div class="orange">
							<div class="text">
								重設密碼<br/>成功
							</div>
					</div>

					<p>請使用新密碼重新登入</p>
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
			},800);
	});
</script>

		<?php
	}

?>








<div class="xheader">
	<h3>Welcome !</h3>
</div>
<div id="ice_login"  class="">
<div class="tab">
	<ul>
		<li>
			<a href="#" class="reg">
				<div class="svgicon">
					<svg xmlns="http://www.w3.org/2000/svg" width="130" height="173" viewBox="0 0 130 173">
					    <g fill="none" fill-rule="evenodd" stroke="#FFF" stroke-linecap="round" stroke-linejoin="round">
					        <g stroke-width="6">
					            <path  id="px1" fill="#FFF" d="M102 135.95H32V64.265C32 60.642 32.532 27 67 27c9.743 0 16.775 2.376 21.85 5.855 3.381 2.318 5.894 5.127 7.76 8.049 1.83 2.864 3.039 5.837 3.838 8.565 1.49 5.085 1.552 9.317 1.552 10.397v76.084z"/>
					            <path id="px3" fill="#E7AF3D" d="M55.954 135.95v23.808s.2 9.576 11.18 9.576c10.978 0 10.911-9.058 10.911-9.058V135.95h-22.09z"/>
					        </g>
					        <path  id="px2" fill="#FFF" stroke-width="3" d="M115 43.053l6.312 10.053 6.312-10.053L121.312 33zM30 12.053l6.312 10.053 6.312-10.053L36.312 2zM2 62.053l6.312 10.053 6.312-10.053L8.312 52z"/>
					    </g>
					</svg>
				</div><!-- svgicon -->
				註冊<span>註冊後，呷枝仔冰</span>
			</a>
		</li>

		<li class="active">
			<a href="#"  class="login_p">
				<div class="svgicon">
					<svg xmlns="http://www.w3.org/2000/svg" width="76" height="141" viewBox="0 0 76 141">
					    <g fill="none" fill-rule="evenodd" stroke="#749233" stroke-linecap="round" stroke-linejoin="round" stroke-width="6">
					        <path d="M53.615 38.25c-5.556-3.77-8.277-10.106-8.807-16.443-.04-.487-.047-.98-.037-1.477a16.98 16.98 0 0 1-2.085.146c-7.226 0-13.434-1.018-19.413-5.077C18.907 12.436 16.298 7.887 15.121 3 3.262 13.11 3.001 30.205 3.001 32.727v71.521h70V43.326c-7.215-.002-13.415-1.023-19.386-5.076z"/>
					        <path fill="#E7AF3D" d="M26.954 104.248v23.754s.2 9.554 11.18 9.554c10.978 0 10.912-9.037 10.912-9.037v-24.27H26.954z"/>
					    </g>
					</svg>
				</div><!-- svgicon -->

				登入<span>&nbsp;</span>
			</a>
		</li>
	</ul>
</div>

<div class="fb_login">
	<?php
	 				// do_action('facebook_login_button');
					echo do_shortcode('[Wow-Facebook-Login]');
	 ?>
	<!-- <button type="button" name="button">Facebook 快速登入</button> -->
</div>

<div class="wdr_sep">
	<span>or Email</span>
</div>


<div class="u-columns col2-set" id="customer_login">

	<div class="u-column1 col-1  active">
		<h2 class="hide" ><?php _e( 'Login', 'woocommerce' ); ?></h2>
		<form class="woocommerce-form woocommerce-form-login login" method="post">

			<?php do_action( 'woocommerce_login_form_start' ); ?>

			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide  ani_label">
				<input type="text" class="woocommerce-Input woocommerce-Input--text input-text"  required   placeholder="<?php // _e( '帳號', 'woocommerce' ); ?>" name="username" id="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( $_POST['username'] ) : ''; ?>" />
				<label for="username">帳號</label>
			</p>
			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide  check_passwd  ani_label">
					<input class="woocommerce-Input woocommerce-Input--text input-text" required  placeholder="<?php // _e( '密碼', 'woocommerce' ); ?>"  type="password" name="password" id="password" />
					<label for="password">密碼</label>
					<a href="#" class="chex"></a>
			</p>

			<?php do_action( 'woocommerce_login_form' ); ?>

			<p class="form-row">
				<label class="woocommerce-LostPassword lost_password">
					<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php _e( '忘記密碼？', 'woocommerce' ); ?></a>
				</label>
				<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
				<input type="submit" class="woocommerce-Button button" name="login" value="<?php esc_attr_e( 'Email 登入', 'woocommerce' ); ?>"   />
				<label class="woocommerce-form__label woocommerce-form__label-for-checkbox inline  hide">
					<input class="woocommerce-form__input woocommerce-form__input-checkbox  " name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span><?php _e( 'Remember me', 'woocommerce' ); ?></span>
				</label>
			</p>

			<?php do_action( 'woocommerce_login_form_end' ); ?>
		</form>
	</div>

			<div class="u-column2 col-2">
				<h2 class="hide"><?php _e( 'Register', 'woocommerce' ); ?></h2>


				<form method="post" class="register">
					<?php do_action( 'woocommerce_register_form_start' ); ?>

					<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

						<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
							<label for="reg_username"><?php _e( '設定帳號', 'woocommerce' ); ?> <span class="required">*</span></label>
							<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( $_POST['username'] ) : ''; ?>" />
						</p>

					<?php endif; ?>

					<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
						<label for="reg_email"><?php _e( '設定帳號', 'woocommerce' ); ?> <span class="required">*</span></label>
						<input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( $_POST['email'] ) : ''; ?>"  placeholder="請設定你的帳號" />
					</p>

					<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

						<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide  ">
							<label for="reg_password"><?php _e( '設定密碼', 'woocommerce' ); ?> <span class="required">*</span></label>
							<span class="check_passwd">
							<input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password"  placeholder="密碼請輸入至少8位，包含英文與數字" />
								<a href="#" class="chex"></a>
							</span>
						</p>

					<?php endif; ?>

					<?php do_action( 'woocommerce_register_form' ); ?>

					<label class="woocommerce-resent">
						<a href="<?php echo  site_url('/resend_email/'); ?>"><?php _e( '再次寄送確認？', 'woocommerce' ); ?></a>
					</label>

					<p class="woocommerce-FormRow form-row">
						<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
						<input type="submit" class="woocommerce-Button button" name="register" value="<?php esc_attr_e( 'Email 註冊', 'woocommerce' ); ?>" />
					</p>

					<?php do_action( 'woocommerce_register_form_end' ); ?>
				</form>
			</div>


		</div><!-- #customer_login -->

</div><!--  ice_login  -->
<script type="text/javascript">
	(function($){
		$(document).ready(function(){
			var ww = $(window).width();
				if(ww<768){
					$(".mobile-nav h2").text('登入');
				}
		});
	})(jQuery);
</script>

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>
