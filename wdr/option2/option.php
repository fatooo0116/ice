<?php




add_action('admin_menu', 'baw_create_menu2');

function baw_create_menu2() {

    //create new top-level menu
    add_menu_page('Theme Settings', 'Theme Settings', 'administrator', 'xee.php', 'ruibian_settings_page');

    //call register settings function
    add_action( 'admin_init', 'register_mysettings2' );
}




function register_mysettings2() {
  //  register_setting( 'ruibian-settings-group', 'ddg_option_banner_open1' );
  //  register_setting( 'ruibian-settings-group', 'ddg_option_video' );

//    register_setting( 'ruibian-settings-group', 'ddg_option_blog' );
    register_setting( 'wdr-settings-group', 'option_fb' );
    register_setting( 'wdr-settings-group', 'option_ig' );
    register_setting( 'wdr-settings-group', 'option_line' );
    register_setting( 'wdr-settings-group', 'option_youtube' );
    register_setting( 'wdr-settings-group', 'option_wechat' );
    register_setting( 'wdr-settings-group', 'option_stick_banner' );
    register_setting( 'wdr-settings-group', 'option_shop_banner' );


  //  register_setting( 'ruibian-settings-group', 'ddg_header_logo');
}

function ruibian_settings_page() {
  wp_enqueue_script('thickbox');
//   wp_register_script('my-upload', WP_PLUGIN_URL.'/my-script.js', array('jquery','media-upload','thickbox'));
  wp_enqueue_media();
  wp_enqueue_script('media-upload');

    ?>
  <style>
  #app #menu_container {
    background: #fff;
    border-left: 1px solid #d8d8d8;
    padding: 0px 15px;
    max-width: 900px;
  }
  #app #menu_container h1{
    margin: 0.67em 0;
    font-size:26px;
  }
  #app #menu_container{
      font-size: 14px;
      line-height: 1.7em;
  }
  #app #menu_container input[type="text"],
  #app #menu_container textarea{
    width: 80%;
    padding: 5px;
  }

  </style>


  <script src="<?php echo get_template_directory_uri(); ?>/wdr/option/js/option.js"></script>


    <div class="wrap">
        <div id="app" class="container">
            <div class="row">
                <div id="menu_container" class=" col-xs-12 ">
                    <ul>
                        <li>
                            <form method="post" action="options.php"  style="padding: 0 20px;">
                                <?php settings_fields( 'wdr-settings-group' ); ?>
                                <?php do_settings_sections( 'wdr-settings-group' ); ?>
                                <div>
                                    <div class="page-header"  style="border-bottom: 1px solid #ddd;padding:20px 0px;margin:0;">
                                        <h1>Theme Setting</h1>
                                    </div>
                                </div>



                                <table class="form-table">


                                    <tr valign="top">
                                        <th scope="row">Facebook</th>
                                        <td>
                                            <?php
                                                $optionfb = get_option('ddg_option_fb');
                                            ?>
                                            <input  type="text"  name="ddg_option_fb"    value="<?php echo $optionfb; ?>" >
                                        </td>
                                    </tr>

                                    <tr valign="top">
                                        <th scope="row">Instagram</th>
                                        <td>
                                            <?php
                                                $optionig = get_option('ddg_option_ig');
                                            ?>
                                            <input type="text"   name="ddg_option_ig"    value="<?php echo $optionig; ?>"  >
                                        </td>
                                    </tr>

                                    <tr valign="top">
                                        <th scope="row">Line</th>
                                        <td>
                                            <?php
                                                $optionline = get_option('ddg_option_line');
                                            ?>
                                            <input type="text"  name="ddg_option_line"   value="<?php echo $optionline; ?>"  >
                                        </td>
                                    </tr>

                                    <tr valign="top">
                                        <th scope="row">Youtube</th>
                                        <td>
                                            <?php
                                                $optionyoutube = get_option('ddg_option_youtube');
                                            ?>
                                          <input  type="text"  name="ddg_option_youtube"   value="<?php echo $optionyoutube; ?>"  >
                                        </td>
                                    </tr>

                                    <tr valign="top">
                                        <th scope="row">Wechat</th>
                                        <td>
                                            <?php
                                                $optionwechat = get_option('ddg_option_wechat');
                                            ?>
                                            <input type="text"  name="ddg_option_wechat"  value="<?php echo $optionwechat; ?>"   >
                                        </td>
                                    </tr>





                                    <tr valign="top">
                                      <th>
                                        <label for="inputEmail3" class="col-sm-2 control-label">文化冰棒棍 Banner</label>
                                      </th>
                                      <td>
                                        <div class="">
                                            <input class="form-control"  name="option_stick_banner"  type="text" rows="3" id="iframecode2"  value="<?php echo esc_attr( get_option('option_stick_banner') ); ?>">
                                            <input class="form-control" type="hidden" rows="3" id="iframecode2id"  value="<?php echo esc_attr( get_option('option_stick_banner') ); ?>">
                                            <br/>
                                            <div id="video_img" style="max-width:150px;cursor:pointer;"></div>
                                        </div>
                                        <div class="">
                                            <input class="upload_image_button button"  id="video_img_btn" type="button" value="Upload Image" target="#iframecode2" targetid="#iframecode2id"   view="#video_img" style="margin:5px 0;">
                                        </div>
                                      </td>
                                    </tr>



                                    <tr valign="top">
                                      <th>
                                        <label for="inputEmail3" class="col-sm-2 control-label">來呷枝仔冰 Banner</label>
                                      </th>
                                      <td>
                                        <div class="">
                                            <input class="form-control"  name="option_shop_banner"  type="text" rows="3" id="iframecode3"  value="<?php echo esc_attr( get_option('option_shop_banner') ); ?>">
                                            <input class="form-control" type="hidden"  value="<?php echo esc_attr( get_option('option_shop_banner') ); ?>" rows="3" id="iframecode3id">
                                            <br/>
                                            <div id="video_img" style="max-width:150px;cursor:pointer;"></div>
                                        </div>
                                        <div class="">
                                            <input class="upload_image_button button"  id="video_img_btn" type="button" value="Upload Image" target="#iframecode3" targetid="#iframecode3id"   view="#video_img" style="margin:5px 0;">
                                        </div>
                                      </td>
                                    </tr>



                                </table>

                                <?php submit_button(); ?>

                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>



<!--
    <script src="http://localhost:35729/livereload.js"></script>
    -->

<?php } ?>
