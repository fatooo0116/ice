<?php
/**
 * fruit-ice functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package fruit-ice
 */




if ( ! function_exists( 'fruit_ice_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function fruit_ice_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on fruit-ice, use a find and replace
		 * to change 'fruit-ice' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'fruit-ice', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'fruit-ice' ),
		) );

		register_nav_menus( array(
			'menu-brand' => esc_html__( '品牌精神', 'fruit-ice' ),
		) );


		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'fruit_ice_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'fruit_ice_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function fruit_ice_content_width(){
	$GLOBALS['content_width'] = apply_filters( 'fruit_ice_content_width', 640 );
}
add_action( 'after_setup_theme', 'fruit_ice_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function fruit_ice_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'fruit-ice' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'fruit-ice' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'fruit_ice_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function fruit_ice_scripts() {


	$ver= '20171299';


	wp_enqueue_style( 'fruit-ice-anticon', get_template_directory_uri()."/assets/icon/anticon/iconfont.css",array(),'20171105','all');
	wp_enqueue_style( 'fruit-ice-ionicon', get_template_directory_uri()."/assets/icon/ionicon/ionicons.min.css",array(),'20171105','all');



	wp_enqueue_style( 'fruit-ice-style', get_template_directory_uri()."/assets/css/style.css",array(),$ver,'all' );

	// wp_enqueue_style( 'fruit-ice-style', get_stylesheet_uri() );
	// wp_enqueue_script( 'fruit-ice-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		// wp_enqueue_script( 'comment-reply' );
	}


	wp_enqueue_script( 'taihodien-preload', get_template_directory_uri().'/assets/js/preload.js', array(), '20151216', true );

	wp_enqueue_style( 'fruit-ice-bootstrap', get_template_directory_uri()."/assets/css/bootstrap.css",array(),'20171105','all');
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.js', array(), '20151215', true );
	wp_enqueue_style( 'bootstrap-select-css', get_template_directory_uri()."/assets/js/bselect/css/bootstrap-select.css",array(),'20171105','all');
	wp_enqueue_script( 'bootstrap-select-js', get_template_directory_uri() . '/assets/js/bselect/js/bootstrap-select.min.js', array(), '20151215', true );

	wp_enqueue_style( 'bootstrap-datepick-css', get_template_directory_uri()."/assets/js/bdatepicker/css/bootstrap-datetimepicker.min.css",array(),'20171105','all');
	wp_enqueue_script( 'bootstrap-datepick-moment-js', get_template_directory_uri() . '/assets/js/bdatepicker/js/moment.js', array(), '20151215', true );
	wp_enqueue_script( 'bootstrap-datepick-js', get_template_directory_uri() . '/assets/js/bdatepicker/js/bootstrap-datetimepicker.min.js', array(), '20151215', true );


	wp_enqueue_script( 'ice-town-js', get_template_directory_uri() . '/wdr/store/town.js', array(), '20151215', true );
	wp_enqueue_script( 'input-mask', get_template_directory_uri() . '/assets/js/jquery.mask.min.js', array(), '20151215', true );

	// wp_enqueue_script( 'js-pagnation', get_template_directory_uri() . '/assets/js/jquery.pager.js', array(), '20151215', true );


	wp_enqueue_style( 'flex-slick-css', get_template_directory_uri()."/assets/js/slick/slick.css",array(),'20171105','all');
	wp_enqueue_script( 'flex-slick-js', get_template_directory_uri() . '/assets/js/slick/slick.min.js', array('jquery'), '20151215', true );

	wp_enqueue_script( 'isotope-js', 'https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js', array('jquery'), '20151215', true );

	wp_enqueue_script( 'invision-js', get_template_directory_uri() . '/assets/js/in-view.min.js', array('jquery'), '20151215', true );


	wp_enqueue_style( 'tipped-css', get_template_directory_uri()."/assets/js/tipped/tipped.css",array(),'20171112','all');
	wp_enqueue_script( 'tipped-js', get_template_directory_uri() . '/assets/js/tipped/tipped.js', array('jquery'), '20151218', true );


	/*
	wp_enqueue_style( 'flex-slider-css', get_template_directory_uri()."/assets/js/flex/flexslider.css",array(),'20171105','all');
	wp_enqueue_script( 'flex-slider-js', get_template_directory_uri() . '/assets/js/flex/jquery.flexslider.js', array('jquery'), '20151215', true );
	*/


	wp_enqueue_style( 'awsomeicon-css', get_template_directory_uri()."/assets/css/awesome/css/font-awesome.min.css",array(),'20171105','all');


	// wp_enqueue_style( 'owl-css', get_template_directory_uri()."/assets/js/owl/assets/owl.carousel.css",array(),'20171105','all');
	// wp_enqueue_script( 'owl-js', get_template_directory_uri() . '/assets/js/owl/owl.carousel.min.js', array(), '20151215', true );





	wp_enqueue_script( 'fruit-ice-script', get_template_directory_uri() . '/assets/js/script.js', array(), $ver, true );

}
add_action( 'wp_enqueue_scripts', 'fruit_ice_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}




/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

/*  wdr */
require get_template_directory() . '/wdr/store.php';
require get_template_directory() . '/wdr/store-location.php';


require get_template_directory() . '/wdr/stick.php'; /* 冰棒 */
require get_template_directory() . '/wdr/stick-meta.php'; /* 冰棒 */
require get_template_directory() . '/wdr/event.php'; /* 大事記  */

require get_template_directory() . '/wdr/myaccount.php';
require get_template_directory() . '/wdr/option/option.php';
require get_template_directory() . '/wdr/user_meta.php';
require get_template_directory() . '/wdr/archive_product_input_number.php';







/*  disable  emoji */

function disable_wp_emojicons() {

  // all actions related to emojis
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

  // filter to remove TinyMCE emojis
  add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
}
add_action( 'init', 'disable_wp_emojicons' );

function disable_emojicons_tinymce( $plugins ) {
  if ( is_array( $plugins ) ) {
    return array_diff( $plugins, array( 'wpemoji' ) );
  } else {
    return array();
  }
}

/*   excerpt  length  */
function wpdocs_custom_excerpt_length( $length ) {
    return 50;
}

add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );
function new_excerpt_more( $more ) {
	return ' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('...') . '</a>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );









// this is just to prevent the user log in automatically after register
function wc_registration_redirect( $redirect_to ) {
			 wp_logout();
			 wp_redirect( '/sign-in/?q=');
			 exit;
}
// when user login, we will check whether this guy email is verify
function wp_authenticate_user( $userdata ) {
			 $isActivated = get_user_meta($userdata->ID, 'is_activated', true);
			 if ( !$isActivated ) {

							 $userdata = new WP_Error(
															 'inkfool_confirmation_error',
															 __( '<strong></strong>您的帳戶尚未完成註冊流程，需要重寄<a href="/sign-in/?u='.$userdata->ID.'">確認信?</a>', 'inkfool' )
															 );

							wp_redirect( '/my-account/?req=2');
			 }
			 return $userdata;
}


// when a user register we need to send them an email to verify their account
function my_user_register($user_id) {
			 // get user data
			 $user_info = get_userdata($user_id);
			 // create md5 code to verify later
			 $code = md5(time());
			 // make it into a code to send it to user via email
			 $string = array('id'=>$user_id, 'code'=>$code);
			 // create the activation code and activation status
			 update_user_meta($user_id, 'is_activated', 0);
			 update_user_meta($user_id, 'activationcode', $code);
			 // create the url
			 $url = get_site_url(). '/sign-in/?p=' .base64_encode( serialize($string));
			 // basically we will edit here to make this nicer
			 $html = '請點擊此連結完成會員註冊 <br/><br/> <a href="'.$url.'">'.$url.'</a>';
			 // send an email out to user
			 return wc_mail($user_info->user_email, __('春一枝-請點擊此連結完成會員註冊'), $html);
}


// we need this to handle all the getty hacks i made
function my_init(){

			/* 註冊成功  */
			if(isset($_GET['q'])){
							if($_GET['q']==""){  /* 註冊成功  但未啟動驗證  */
									wp_redirect( site_url('/my-account/?req=1') ); exit;
							}

							// wc_add_notice( __( '<strong>Error:</strong> Your account has to be activated before you can login. Please check your email.', 'inkfool' ) );
			}

			if(isset($_GET['u'])){
							my_user_register($_GET['u']);

							// wp_redirect( site_url('/my-account/?req=1&u='.$_GET['u']) ); exit;
							// wc_add_notice( __( '<strong>Succes:</strong> Your activation email has been resend. Please check your email.', 'inkfool' ) );
			}

			 // check whether we get the activation message
			 /*
			 if(isset($_GET['p'])){
							 $data = unserialize(base64_decode($_GET['p']));
							 $code = get_user_meta($data['id'], 'activationcode', true);
							 // check whether the code given is the same as ours
							 if($code == $data['code']){
											 // update the db on the activation process
											 update_user_meta($data['id'], 'is_activated', 1);
											 echo "dsd";
											 wc_add_notice( '您的帳號已經被啟動 謝謝','success');
							 }else{
											 wc_add_notice( __( '<strong>Error:</strong> Activation fails, please contact our administrator. '),'error');
							 }
			 }

			 if(isset($_GET['q'])){
							 wc_add_notice( __( '<strong>Error:</strong> Your account has to be activated before you can login. Please check your email.', 'inkfool' ) );
			 }

			 if(isset($_GET['u'])){
							 my_user_register($_GET['u']);
							 wc_add_notice( __( '<strong>Succes:</strong> Your activation email has been resend. Please check your email.', 'inkfool' ) );
			 }
			 */
}


// hooks handler
add_action( 'init', 'my_init' );
add_filter('woocommerce_registration_redirect', 'wc_registration_redirect');
add_filter('wp_authenticate_user', 'wp_authenticate_user',10,2);
add_action('user_register', 'my_user_register',10,2);



/*  login redirect.  */
add_filter('woocommerce_login_redirect', 'wc_login_redirect');
function wc_login_redirect( $redirect_to ) {
     // $redirect_to = site_url('/my-account/edit-account/');
		 if($redirect_to != site_url('/cart/')){
			 $redirect_to = site_url('/my-account/edit-account/');
		 }

     return $redirect_to;
}



// define the woocommerce_update_cart_action_cart_updated callback
function filter_woocommerce_update_cart_action_cart_updated( $cart_updated ) {
    // make filter magic happen here...
		echo '<h1>dadasdas</h1>';
    return $cart_updated;
};

// add the filter
add_filter( 'woocommerce_update_cart_action_cart_updated', 'filter_woocommerce_update_cart_action_cart_updated', 10, 1 );




/*   save_account_details  redirect  to account_detail */
function my_save_account_details_redirect($user_id){

		update_user_meta( $user_id, 'birthday',  $_POST[ 'birthday' ]  );
		update_user_meta( $user_id, 'mobile_phone', $_POST[ 'mobile_phone' ]  );

    wp_safe_redirect( wc_get_endpoint_url( 'edit-account') );
    exit;
}
add_action( 'woocommerce_save_account_details', 'my_save_account_details_redirect', 10, 1 );




add_action( 'woocommerce_edit_account_form', 'my_woocommerce_edit_account_form' );
function my_woocommerce_edit_account_form() {
  $user_id = get_current_user_id();
  $user = get_userdata( $user_id );

  if ( !$user )
    return;
  $mobile_phone = get_user_meta( $user_id, 'mobile_phone', true );
	$birthday = get_user_meta( $user_id, 'birthday', true );

  ?>

    <p class="form-row form-row-thirds">
      <label for="mobile_phone">手機</label>
      <input type="number" name="mobile_phone"  id="mobile_phone" value="<?php echo esc_attr( $mobile_phone ); ?>" class="input-text" />
    </p>


    <p class="form-row form-row-thirds">
      <label for="birthday">生日:</label>
      <input type="text" name="birthday"  placeholder="YYYY / MM / DD"  id="birthday"  value="<?php echo esc_attr( $birthday ); ?>" class="input-text" />
    </p>
  <?php
}





/*
 *
 *        Woocommerce  Setting
 *
 */
add_filter( 'loop_shop_per_page', 'new_loop_shop_per_page', 20 );

function new_loop_shop_per_page( $cols ) {
  // $cols contains the current number of products per page based on the value stored on Options -> Reading
  // Return the number of products you wanna show per page.
  $cols =12;
  return $cols;
}

add_filter( 'woocommerce_currencies', 'add_my_currency' );

function add_my_currency( $currencies ) {
	$currencies['NTD'] = __( 'NTD', 'woocommerce' );
	return $currencies;
}

add_filter('woocommerce_currency_symbol', 'add_my_currency_symbol', 10, 2);

function add_my_currency_symbol( $currency_symbol, $currency ) {
	switch( $currency ) {
		case 'NTD': $currency_symbol = '$'; break;
	}
	return $currency_symbol;
}



/*    ###################################################
*
*      Woocommerce  Checkout field
*
*  ######################################################### */




/*  custom shipping field / billing  field  */
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );

// Our hooked in function - $fields is passed via the filter!
function custom_override_checkout_fields( $fields ) {

				$fields['billing']['billing_first_name']['label'] = "姓名";
				$fields['billing']['billing_first_name']['class'] = array('form-row form-row-wide');
				$fields['billing']['billing_email']['class'] = array('form-row form-row-wide');
				$fields['billing']['billing_phone']['class'] = array('form-row form-row-wide');

				$fields['billing']['billing_email']['label'] = "Email";
				$fields['billing']['billing_phone']['label'] = "手機號碼";

				 $fields['billing']['billing_address_1']['class'] = array("hide");


				$fields['order']['order_comments']['label'] = '運送備註';
				$fields['order']['order_comments']['placeholder'] = '請填寫運送備註';

				$fields['shipping']['shipping_first_name']['class'] = array('form-row form-row-wide');

				$fields['shipping']['shipping_first_name']['label'] = "姓名";
				 $fields['shipping']['shipping_address_1']['class'] = array("hide");

				/*  Shipping */


		     unset($fields['billing']['billing_country']);
				 unset($fields['billing']['billing_company']);
				 unset($fields['billing']['billing_address_2']);
				 unset($fields['billing']['billing_state']);
				 unset($fields['billing']['billing_postcode']);


		    unset($fields['shipping']['shipping_last_name']);
		    unset($fields['shipping']['shipping_company']);
		    unset($fields['shipping']['shipping_address_2']);
		    unset($fields['shipping']['shipping_country']);
		    unset($fields['shipping']['shipping_state']);
				unset($fields['shipping']['shipping_postcode']);
				unset($fields['shipping']['shipping_city']);


				$fields['billing']['billing_birthday'] = array(
	          'label'     => __('生日', 'woocommerce'),
	     			'placeholder'   => 'YYYY / MM / DD',
	     			'required'  => false,
	     			'class'     => array('form-row-wide'),
	     			'clear'     => true
	      );

				$fields['shipping']['shipping_phone'] = array(
	          'label'     => __('手機號碼', 'woocommerce'),
	     			'placeholder'   => '',
	     			'required'  => false,
	     			'class'     => array('form-row-wide'),
	     			'clear'     => true
	      );



				$fields['billing']['add1'] = array(
	          'label'     => __('縣市', 'woocommerce'),
	     			'required'  => true,
						'options' => array(
							''=>'縣市',
						  '基隆市' => '基隆市',
						  '臺北市' => '臺北市',
							'新北市' => '新北市',
							'宜蘭縣' => '宜蘭縣',
						  '新竹市' => '新竹市',
							'新竹縣' => '新竹縣',
							'桃園市' =>' 桃園市',
							'苗栗縣' => '苗栗縣',
						  '臺中市' => '臺中市',
							'彰化縣' => '彰化縣',
							'南投縣' => '南投縣',
						  '嘉義市' => '嘉義市',
							'嘉義縣' => '嘉義縣',
							'雲林縣' => '雲林縣',
						  '臺南市' => '臺南市',
							'高雄市' => '高雄市',
							'屏東縣' => '屏東縣',
						  '臺東縣' => '臺東縣',
							'花蓮縣' => '花蓮縣',
							'金門縣' => '金門縣',
						  '連江縣' => '連江縣',
							'澎湖縣' => '澎湖縣'
						),
						'type'=>'select',
	     			'class'     => array('form-row  xform-row-add1 selectpicker'),
	     			'clear'     =>false
	      );

				$fields['billing']['add2'] = array(
	          'label'     => __('區鄉鎮', 'woocommerce'),
	     			'required'  => true,
						'options' => array(
						  '' => '區鄉鎮'
						),
						'type'=>'select',
	     			'class'     => array('form-row  xform-row-add2 selectpicker'),

	      );

				$fields['billing']['add3'] = array(
	          'label'     => __('地址', 'woocommerce'),
	     			'required'  => true,
	     			'class'     => array('form-row-wide'),
						'placeholder'=>'請輸入地址'
	      );





				$fields['shipping']['sadd1'] = array(
						'label'     => __('縣市', 'woocommerce'),
						'required'  => true,
						'options' => array(
							''=>'縣市',
							'基隆市' => '基隆市',
							'臺北市' => '臺北市',
							'新北市' => '新北市',
							'宜蘭縣' => '宜蘭縣',
							'新竹市' => '新竹市',
							'新竹縣' => '新竹縣',
							'桃園市' =>' 桃園市',
							'苗栗縣' => '苗栗縣',
							'臺中市' => '臺中市',
							'彰化縣' => '彰化縣',
							'南投縣' => '南投縣',
							'嘉義市' => '嘉義市',
							'嘉義縣' => '嘉義縣',
							'雲林縣' => '雲林縣',
							'臺南市' => '臺南市',
							'高雄市' => '高雄市',
							'屏東縣' => '屏東縣',
							'臺東縣' => '臺東縣',
							'花蓮縣' => '花蓮縣'
							/*
							'金門縣' => '金門縣',
							'連江縣' => '連江縣',
							'澎湖縣' => '澎湖縣'
							*/
						),
						'type'=>'select',
						'class'     => array('form-row  xform-row-add1 selectpicker'),
						'clear'     =>false,
						'title'=>'縣市'
				);

				$fields['shipping']['sadd2'] = array(
						'label'     => __('區鄉鎮', 'woocommerce'),
						'required'  => true,
						'options' => array(
							'區鄉鎮' => '區鄉鎮'
						),
						'type'=>'select',
						'class'     => array('form-row  xform-row-add2 selectpicker'),
						'title'=>'區鄉鎮'
				);

				$fields['shipping']['sadd3'] = array(
						'label'     => __('收件人地址', 'woocommerce'),
						'required'  => true,
						'class'     => array('form-row-wide'),
						'placeholder'=>'地址',
						'title'=>'收件人地址'
				);






				/* 更改順序 */
				$order = array(
						"billing_first_name",
						"billing_email",
						"billing_phone",
						"billing_birthday",
						"add1",
						"add2",
						"add3",
						"billing_address_1",
					);

					foreach($order as $field)
					{
						$ordered_fields[$field] = $fields["billing"][$field];
					}

					$fields["billing"] = $ordered_fields;

     return $fields;
}


/**
 *  Display field value on the order edit page  admin Page
 */
add_action( 'woocommerce_admin_order_data_after_billing_address', 'my_custom_checkout_field_display_admin_order_meta', 10, 1 );

function my_custom_checkout_field_display_admin_order_meta($order){
    echo '<p><strong>'.__('生日').':</strong> ' . get_post_meta( get_the_ID(), 'billing_birthday', true ) . '</p>';
}

add_action( 'woocommerce_admin_order_data_after_shipping_address', 'shipping_checkout_field_display_admin_order_meta', 10, 1 );

function shipping_checkout_field_display_admin_order_meta($order){
	  echo '<div class="clearfix">';
		echo '<p><strong>'.__('手機號碼').':</strong> ' . get_post_meta( get_the_ID(), 'shipping_phone', true ) . '</p>';
    echo '<p><strong>'.__('收貨日期').':</strong> ' . get_post_meta( get_the_ID(), 'deliver_date', true ) . '</p>';
		echo '<p><strong>'.__('收貨時間').':</strong> ' . get_post_meta( get_the_ID(), 'deliver_time', true ) . '</p>';
		echo '</div>';
}




/**
 * Process the checkout
 */
add_action('woocommerce_checkout_process', 'my_custom_checkout_field_process');

function my_custom_checkout_field_process() {
    // Check if set, if its not set add an error.
    if ( ! $_POST['deliver_date'] )
        wc_add_notice( __( '選擇您能收件的日期為必填欄位。' ), 'error' );

		if(! $_POST['deliver_time'])
		  wc_add_notice( __( '選擇您能收件的時間為必填欄位。' ), 'error' );

}


/**
 *
 *
 * Update the order meta with field value
 */
add_action( 'woocommerce_checkout_update_order_meta', 'my_custom_checkout_field_update_order_meta' );

function my_custom_checkout_field_update_order_meta( $order_id ) {
    if ( ! empty( $_POST['billing_birthday'] ) ) {
        update_post_meta( $order_id, 'billing_birthday', sanitize_text_field( $_POST['billing_birthday'] ) );
    }
		if ( ! empty( $_POST['shipping_phone'] ) ) {
				update_post_meta( $order_id, 'shipping_phone', sanitize_text_field( $_POST['shipping_phone'] ) );
		}
		if ( ! empty( $_POST['deliver_date'] ) ) {
				update_post_meta( $order_id, 'deliver_date', sanitize_text_field( $_POST['deliver_date'] ) );
		}
		if ( ! empty( $_POST['deliver_time'] ) ) {
				update_post_meta( $order_id, 'deliver_time', sanitize_text_field( $_POST['deliver_time'] ) );
		}
}



/* ajax  add to Cart   */
add_action( 'wp_ajax_addcart_ajax_action', 'addcart_ajax_fun' ); // 針對已登入的使用者
add_action( 'wp_ajax_nopriv_addcart_ajax_action', 'addcart_ajax_fun' ); // 針對未登入的使用者
function addcart_ajax_fun() {
	if (is_page( 'checkout')) {
		return;
	}

	if(isset($_POST['data']) && $_POST['data']!=""){
		$data = $_POST['data'];
		$result['status'] =   WC()->cart->add_to_cart( $data['pid'], $data['num'] );;
	}else{
		$result['status'] = 0;
	}

	$result['cartnum'] = WC()->cart->get_cart_contents_count();
	echo  json_encode($result);

 die(); // 一定要加這行，才會完整的處理ajax請求
}





add_action( 'wp_ajax_get_cart_content_action', 'get_cart_content_fun' ); // 針對已登入的使用者
add_action( 'wp_ajax_nopriv_get_cart_content_action', 'get_cart_content_fun' ); // 針對未登入的使用者
function get_cart_content_fun() {


	global $woocommerce;
	    $items = $woocommerce->cart->get_cart();

	        foreach($items as $item => $values) {
						$_product =  wc_get_product( $values['data']->get_id());
						$image_link = get_the_post_thumbnail_url( $values['data']->get_id(),'medium');

						$data[] = array(
							'id' => $values['data']->get_id(),
							'title' => $_product->get_title(),
							'img'=>$image_link,
							'qty' =>$values['quantity'],
							'price' => $_product->get_price(),
							'link' => get_the_permalink($values['data']->get_id()),
							'remove'=>WC_Cart::get_remove_url($item)
						);
	        }

					$amount2 = floatval( preg_replace( '#[^\d.]#', '', $woocommerce->cart->get_cart_total() ) );
					$data['total'] = $amount2;

	 echo  json_encode($data);
	 die();
}

/*

global $woocommerce;
    $items = $woocommerce->cart->get_cart();

        foreach($items as $item => $values) {
            $_product =  wc_get_product( $values['data']->get_id());
            echo "<b>".$_product->get_title().'</b>  <br> Quantity: '.$values['quantity'].'<br>';
            $price = get_post_meta($values['product_id'] , '_price', true);
            echo "  Price: ".$price."<br>";
        }

*/



add_action( 'after_setup_theme', 'bbloomer_remove_zoom_lightbox_theme_support', 99 );

function bbloomer_remove_zoom_lightbox_theme_support() {
remove_theme_support( 'wc-product-gallery-zoom' );
// remove_theme_support( 'wc-product-gallery-lightbox' );
// remove_theme_support( 'wc-product-gallery-slider' );
}






/*  Custom Translate  */
add_filter('gettext', 'change_lost_password' );
function change_lost_password($translated) {

  $translated = str_ireplace('Lost Password', '重設密碼', $translated);
	$translated = str_ireplace('Account details', '我的帳戶', $translated);
	$translated = str_ireplace('Orders', '我的訂單', $translated);
	$translated = str_ireplace('Order', '我的訂單', $translated);

	$translated = str_ireplace('Mark on-hold', '變更為等待匯款中', $translated);
	$translated = str_ireplace('Mark processing', '變更為訂單處理中', $translated);
	$translated = str_ireplace('Mark complete', '變更為已發貨', $translated);

	$translated = str_ireplace('on-hold', '訂單確認中', $translated);
	$translated = str_ireplace('Shipping', '運送方式', $translated);
	$translated = str_ireplace('A user could not be found with this email address.', '此帳號不存在', $translated);


  return $translated;
}

/*   Add CSS  to Admin  */
add_action('admin_head', 'my_custom_fonts');

function my_custom_fonts() {
  echo '<style>
    .column-customer_message .note-on{
      display:none;
    }
		.edit_address:before, .edit_address:after {
			content:"";
			display:table;
		}
		.edit_address:after{
			clear:both;
			overflow:hidden;
		}
		.edit_address{
		    zoom:1;
		}
  </style>';
}


/**
 * Adds 'Profit' column header to 'Orders' page immediately after 'Total' column.
 *
 * @param string[] $columns
 * @return string[] $new_columns
 */

function sv_wc_cogs_add_order_profit_column_header( $columns ) {
    $new_columns = array();

    foreach ( $columns as $column_name => $column_info ){
        $new_columns[ $column_name ] = $column_info;

        if ( 'order_total' === $column_name ) {
            $new_columns['order_info'] = __( '客戶資料', 'my-textdomain' );
        }
				if ( 'customer_message' === $column_name ){
					 $new_columns['customer_message'] = __( '備註', 'my-textdomain' );
				}

    }

    return $new_columns;
}
add_filter( 'manage_edit-shop_order_columns', 'sv_wc_cogs_add_order_profit_column_header', 20 );



/**
 * Adds 'Profit' column content to 'Orders' page immediately after 'Total' column.
 *
 * @param string[] $column name of column being displayed
 */
function sv_wc_cogs_add_order_profit_column_content( $column ) {
    global $post;

		// $order = wc_get_order( $post->ID );

		if ( 'customer_message' === $column ){
			echo get_post_field( 'post_excerpt', $post->ID );
		}


    if ( 'order_info' === $column ) {
        // $currency = is_callable( array( $order, 'get_currency' ) ) ? $order->get_currency() : $order->order_currency;
        // $profit   = '';
        // $cost     = sv_helper_get_order_meta( $order, '_wc_cog_order_total_cost' );
        // $total    = (float) $order->get_total();
				$shipping_phone = get_post_meta( $post->ID, 'shipping_phone');
				$d_time  = get_post_meta( $post->ID, 'deliver_date');

				$text ="";
				if(count($shipping_phone)>0){
					$text = '<div style="font-size:12px;"><strong>聯絡電話</strong> : '.$shipping_phone[0]."</div>";
				}
				if(count($d_time)>0){
					$text .= "<div style='font-size:12px;'><strong>送貨日期</strong><br/>".$d_time[0]."</div";
				}
				 echo $text;
    }


}
add_action( 'manage_shop_order_posts_custom_column', 'sv_wc_cogs_add_order_profit_column_content' );




/*    Add  Field to email */
add_action( 'woocommerce_email_after_order_table', 'woocommerce_email_after_order_table_func' );
function woocommerce_email_after_order_table_func( $order ) {

	$d_time  = get_post_meta( $order->ID, 'deliver_date');


	/*  Actual Deliver date   */
		global $wpdb;
		$custom_db_name = $wpdb->prefix . 'order_meta';
		$sql = "SELECT * FROM ".$custom_db_name." WHERE post=".$order->ID;
		$mylink = $wpdb->get_results($sql);
		$ad_time="";
		if(count($mylink)>0){
			if(property_exists($mylink[0],'actual_deliver_time')){
					$ad_time  = $mylink[0]->actual_deliver_time;
			}
		}


	?>
	<table= cellspacing="0" cellpadding="6" style="width:100%;border-color:#fff;;border:0px solid #e5e5e5;margin-bottom:40px;" border="1">
		<tr>
			<td style="border-color:#e5e5e5;"><h3 style="margin:0;">到貨日期</h3></td>
			<td style="border-color:#e5e5e5;"><?php echo $d_time[0]; ?></td>
		</tr>
		<?php
			if(count($mylink)>0){
				if(property_exists($mylink[0],'actual_deliver_time')){
						$d_time  = $mylink[0]->actual_deliver_time;
						?>
						<tr>
							<td style="border-color:#e5e5e5;"><h3 style="margin:0;">實際到貨日期</h3></td>
							<td style="border-color:#e5e5e5;"><?php echo $ad_time; ?></td>
						</tr>
						<?php
				}
			}
		?>
	</table>
	<?php
}


/*  ======================================================== */
/*                                                           */
/*             Change  Order Status Name                     */
/*                                                           */
/*  ======================================================== */
/* Add New  */
function register_awaiting_shipment_order_status() {
    register_post_status( 'wc-arrived-shipment', array(
        'label'                     => 'Arrived shipment',
        'public'                    => true,
        'exclude_from_search'       => false,
        'show_in_admin_all_list'    => true,
        'show_in_admin_status_list' => true,
        'label_count'               => _n_noop( '貨品已送達 <span class="count">(%s)</span>', '貨品已送達 <span class="count">(%s)</span>' )
    ) );
}
add_action( 'init', 'register_awaiting_shipment_order_status' );
// Add to list of WC Order statuses
function add_awaiting_shipment_to_order_statuses( $order_statuses ) {


    $new_order_statuses = array();
    // add new order status after processing
    foreach ( $order_statuses as $key => $status ) {
        $new_order_statuses[ $key ] = $status;
        if ( 'wc-processing' === $key ) {
            $new_order_statuses['wc-arrived-shipment'] = '貨品已送達';
        }
    }
    return $new_order_statuses;
}
add_filter( 'wc_order_statuses', 'add_awaiting_shipment_to_order_statuses' );






/* Change Name  */
function wc_renaming_order_status( $order_statuses ) {
    foreach ( $order_statuses as $key => $status ) {


        $new_order_statuses[ $key ] = $status;
        if ( 'wc-pending' === $key ) {
            $order_statuses['wc-pending'] = '訂單處理中';
        }
				if ( 'wc-processing' === $key ) {
            $order_statuses['wc-processing'] = '可安排出貨';
        }
				if ( 'wc-on-hold' === $key ) {

            $order_statuses['wc-on-hold'] = '等待匯款中';
        }
				if ( 'wc-completed' === $key ) {
            $order_statuses['wc-completed'] = '已發貨';
        }
				if ( 'wc-failed' === $key ) {
            $order_statuses['wc-failed'] = '異常處理中';
        }
    }
    return $order_statuses;
}
add_filter( 'wc_order_statuses', 'wc_renaming_order_status' );

/*  admin  ICON */

/**
 * Add order status icon CSS
 */
add_action('admin_head', 'backorder_font_icon');

function backorder_font_icon() {
  echo '<style>
			.widefat .column-order_status mark.arrived-shipment:after{
				font-family:WooCommerce;
				speak:none;
				font-weight:400;
				font-variant:normal;
				text-transform:none;
				line-height:1;
				-webkit-font-smoothing:antialiased;
				margin:0;
				text-indent:0;
				position:absolute;
				top:0;
				left:0;
				width:100%;
				height:100%;
				text-align:center;
			}
			.widefat .column-order_status mark.arrived-shipment:after{
				content:"\e01a";
				color:#2ba6ff;
			}
  </style>';
}



//defining the filter that will be used so we can select posts by 'author'
/*
function add_author_filter_to_posts_administration(){

    //execute only on the 'post' content type
    global $post_type;
    if($post_type == 'shop_order'){

        //get a listing of all users that are 'author' or above
        $user_args = array(
            'show_option_all'   => '訂單狀況',
            'orderby'           => 'display_name',
            'order'             => 'ASC',
            'name'              => 'aurthor_admin_filter',
            'who'               => 'authors',
            'include_selected'  => true
        );

        //determine if we have selected a user to be filtered by already
        if(isset($_GET['aurthor_admin_filter'])){
            //set the selected value to the value of the author
            $user_args['selected'] = (int)sanitize_text_field($_GET['aurthor_admin_filter']);
        }

        //display the users as a drop down
        wp_dropdown_users($user_args);
    }

}
add_action('restrict_manage_posts','add_author_filter_to_posts_administration');
*/


add_action('pre_get_posts', 'query_add_filter' );
function query_add_filter( $wp_query ) {
	if( is_admin()) {
			add_filter('views_edit-shop_order', 'filter_cpt');
	}
}

// add filter
function filter_cpt($views) {
	if(array_key_exists("wc-pending",$views)){
		$views['wc-pending'] = str_replace("等待付款","訂單處理中",$views['wc-pending']);
	}

	if(array_key_exists("wc-on-hold",$views)){
		$views['wc-on-hold'] = str_replace("保留中","等待匯款中",$views['wc-on-hold']);
	}

	if(array_key_exists("wc-completed",$views)){
		$views['wc-completed'] = str_replace("已完成","已發貨",$views['wc-completed']);
	}

	if(array_key_exists("wc-failed",$views)){
		$views['wc-failed'] = str_replace("筆失敗","異常處理中",$views['wc-failed']);
	}

	if(array_key_exists("wc-processing",$views)){
		$views['wc-processing'] = str_replace("處理中","可安排出貨",$views['wc-processing']);
	}
	/*
		global $wp_query;
		$query = array(
				' post_type'   => 'post'
				 );
		$result = new WP_Query($query);
		$class = ($wp_query->query_vars['norelated']) ? ' class="current"' : '';

		$views['missing_related'] = sprintf(__('<a href="%s"'. $class .'>Missing Related <span class="count">(%d)</span></a>', 'missing related'),
				admin_url('edit.php?post_type=my-cpt&norelated=1'),
				$result->found_posts);
		return $views;
	*/
	return $views;
}

/*
add_action('pre_get_posts', 'query_add_filter' );
function query_add_filter( $wp_query ) {
    if( is_admin()) {
        add_filter('views_edit-post', 'Add_My_filter');
    }
}


function Add_My_filter($views) {
    global $wp_query;
    // unset($views['mine']);
    $my_cat = 'sds';

    $query = array(
        'author'      => $current_user->ID,
        'post_type'   => 'shop_order',
        'post_status' => 'publish',
    'cat'         => $my_cat
    );
    $result = new WP_Query($query);
    $class = ($wp_query->query_vars['cat'] == 'featured') ? ' class="current"' : '';
    $views['publish_f'] = sprintf(__('<a href="%s"'. $class .'>Publish Featured <span class="count">(%d)</span></a>', 'publish featured'),
        admin_url('edit.php?post_status=publish&post_type=post&cat='.$my_cat),
        $result->found_posts);
		$views['publish_f'] = 	sprintf(__('<a href="sds">Publish Featured <span class="count">11</span></a>', 'publish featured'),
        admin_url('edit.php?post_status=publish&post_type=post&cat='),
        $result->found_posts);
    return $views;
}
*/
