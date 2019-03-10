<?php




add_action('admin_menu', 'baw_create_menu2');

function baw_create_menu2() {

    //create new top-level menu
    add_menu_page('Banner Settings', 'Banner Settings', 'moderate_comments', 'xee.php', 'ruibian_settings_page','');

    //call register settings function
    add_action( 'admin_init', 'register_mysettings2' );
}




function register_mysettings2() {

  /*
    register_setting( 'ruibian-settings-group', 'ddg_header_logo');
    register_setting( 'ruibian-settings-group', 'ddg_header_text');
    register_setting( 'ruibian-settings-group', 'ddg_header_text_color');
    register_setting( 'ruibian-settings-group', 'ddg_header_stext');
    register_setting( 'ruibian-settings-group', 'ddg_header_stext_color');

    register_setting( 'ruibian-settings-group', 'ddg_header_logo2');
    register_setting( 'ruibian-settings-group', 'ddg_header_text2');
    register_setting( 'ruibian-settings-group', 'ddg_header_text2_color');
    register_setting( 'ruibian-settings-group', 'ddg_header_stext2');
    register_setting( 'ruibian-settings-group', 'ddg_header_stext2_color');
    */


    register_setting( 'ruibian-settings-group', 'ddg_header_logo3');
    // register_setting( 'ruibian-settings-group', 'ddg_header_text3');
    /*
    register_setting( 'ruibian-settings-group', 'ddg_header_text3_color');
    register_setting( 'ruibian-settings-group', 'ddg_header_stext3');
    register_setting( 'ruibian-settings-group', 'ddg_header_stext3_color');
    */

    register_setting( 'ruibian-settings-group', 'ddg_header_logo4');
    // register_setting( 'ruibian-settings-group', 'ddg_header_text4');
    // register_setting( 'ruibian-settings-group', 'ddg_header_text4_color');
    // register_setting( 'ruibian-settings-group', 'ddg_header_stext4');
    // register_setting( 'ruibian-settings-group', 'ddg_header_stext4_color');

    register_setting( 'ruibian-settings-group', 'ddg_header_logo5');
    /*
    register_setting( 'ruibian-settings-group', 'ddg_header_text5');
    register_setting( 'ruibian-settings-group', 'ddg_header_text5_color');
    register_setting( 'ruibian-settings-group', 'ddg_header_stext5');
    register_setting( 'ruibian-settings-group', 'ddg_header_stext5_color');
    */

    register_setting( 'ruibian-settings-group', 'ddg_header_logo6');
    /*
    register_setting( 'ruibian-settings-group', 'ddg_header_text6');
    register_setting( 'ruibian-settings-group', 'ddg_header_text6_color');
    register_setting( 'ruibian-settings-group', 'ddg_header_stext6');
    register_setting( 'ruibian-settings-group', 'ddg_header_stext6_color');
    */


    register_setting( 'ruibian-settings-group', 'ddg_header_logo7');
    register_setting( 'ruibian-settings-group', 'ddg_header_text7');
    register_setting( 'ruibian-settings-group', 'ddg_header_text7_color');
    register_setting( 'ruibian-settings-group', 'ddg_header_stext7');
    register_setting( 'ruibian-settings-group', 'ddg_header_stext7_color');

    register_setting( 'ruibian-settings-group', 'ddg_header_logo8');
    register_setting( 'ruibian-settings-group', 'ddg_header_text8');
    register_setting( 'ruibian-settings-group', 'ddg_header_text8_color');
    register_setting( 'ruibian-settings-group', 'ddg_header_stext8');
    register_setting( 'ruibian-settings-group', 'ddg_header_stext8_color');

    /*
    register_setting( 'ruibian-settings-group', 'ddg_header_line');
    register_setting( 'ruibian-settings-group', 'ddg_header_wechat');
    */
    register_setting( 'ruibian-settings-group', 'ddg_header_gplus');
    register_setting( 'ruibian-settings-group', 'ddg_header_fb');
    register_setting( 'ruibian-settings-group', 'ddg_header_ig');
    register_setting( 'ruibian-settings-group', 'product_days');
    register_setting( 'ruibian-settings-group', 'product_buynote');

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
    padding: 0px 15px 0 15px;
    max-width: 900px;
  }
  #app #menu_container h1{
    padding: 20px 0px;
    font-size:26px;
  }
  #app #menu_container{
      font-size: 14px;
      line-height: 1.7em;
  }
  #app #menu_container input[type="text"],
  #app #menu_container textarea{
    padding: 5px;
  }
  .mb10{
    margin-bottom: 10px;
  }
  .xtbl{
    width: 100%;
  }
  .xtbl tr.top td{
    padding:25px 30px 30px;
  }
  .xtbl th{
    background: #eee;
  }
  .xtbl td{
    background: #fbf9f9;
  }
  .vm{
    vertical-align:middle;
    text-align: center;
    font-size: 14px;
    padding:30px 20px;
  }
  .pull-left{
    float:left;

  }
  .pull-left:last-child{margin-right:0;}
  .tc{
    text-align: center;
  }
  label{
    display: block;
  }
  .preview_img{
    cursor:pointer;
    padding: 10px;
    border: 2px dashed #cacaca;
    border-radius: 10px;
    margin-bottom: 10px;
    display: inline-block;
    min-width: 150px;
    min-height: 50px;
  }
  .preview_img:hover{
    border: 2px dashed #fff125;
  }
  .preview_img:hover  img {
    opacity: 0.8;
  }
  .preview_img img{
    max-width: 600px;
    max-height: 150px;
  }
  .page-header{
    margin-bottom: 10px;
  }
  .s14{width:25%;}

  </style>
  <script>


      jQuery(document).ready(function($){
          var _custom_media = true,
              _orig_send_attachment = wp.media.editor.send.attachment;


          $('._unique_name_button').click(function(e) {
              var send_attachment_bkp = wp.media.editor.send.attachment;
              var button = $(this);
              var id = button.attr('id').replace('_button', '');

              var save = $(this).parent().find("._unique_name");
              var prev = $(this).parent().find("._unique_name_prev");

              _custom_media = true;
              wp.media.editor.send.attachment = function(props, attachment){

                  if ( _custom_media ) {
                       save.val(attachment.url);

                      var previmg = '<img src="'+attachment.url+'">';
                       prev.html(previmg);

                  } else {
                      return _orig_send_attachment.apply( this, [props, attachment] );
                  };
              }

              wp.media.editor.open(button);
              return false;
          });

          $("._unique_name_prev").click(function(){
            var save_btn = $(this).parent().find("._unique_name_button");
            save_btn.trigger("click");
          });

          $('.remove_button').on('click', function() {
            _custom_media = false;
            var save = $(this).parent().find("._unique_name");
            var prev = $(this).parent().find("._unique_name_prev");
            save.val("");
            prev.html("");
          });


      });

  </script>





    <div class="wrap">
        <div id="app" class="container">
            <div class="row">
                <div id="menu_container" class=" col-xs-12 ">
                    <ul>
                        <li>
                            <form method="post" action="options.php">
                                <?php settings_fields( 'ruibian-settings-group' ); ?>
                                <?php do_settings_sections( 'ruibian-settings-group' ); ?>
                                <div>
                                    <div class="page-header"  style="border-bottom: 1px solid #ddd;">
                                        <h1>Banner 設定</h1>
                                    </div>
                                </div>
                                <table class="xtbl">

                                    <tr  class="uploader  top" >
                                        <th scope="row"   class="vm" >客製冰棒棍 電腦版</th>
                                        <td>
                                          <label for="">螢幕寬度 1920 ~ 768</label>
                                          <div id="upload2">
                                                <div  class="preview_img  _unique_name_prev">
                                                  <?php  if(esc_attr( get_option('ddg_header_logo3') )){  ?>
                                                    <img src="<?php echo esc_attr( get_option('ddg_header_logo3') ); ?>"/>
                                                  <?php  } ?>
                                                </div>
                                                <input  class="form-control  _unique_name" name="ddg_header_logo3" type="hidden" value="<?php echo esc_attr( get_option('ddg_header_logo3') ); ?>"/>
                                                <div style="clear:both"></div>
                                                <input id="_unique_name_button" class="button _unique_name_button" name="_unique_name_button" type="button" value="Upload" />
                                                <input type="button"   class="remove_button  button"   target="_unique_name"   value="Remove">
                                          </div> <!--  upload1  -->

                                        </td>
                                    </tr>



                                    <tr  class="uploader  top" >
                                        <th scope="row"   class="vm" >客製冰棒棍 手機版</th>
                                        <td>
                                          <label for="">螢幕寬度 768 以下</label>
                                          <div id="upload2">
                                                <div  class="preview_img  _unique_name_prev">
                                                  <?php  if(esc_attr( get_option('ddg_header_logo4') )){  ?>
                                                    <img src="<?php echo esc_attr( get_option('ddg_header_logo4') ); ?>"/>
                                                  <?php  } ?>
                                                </div>
                                                <input  class="form-control  _unique_name" name="ddg_header_logo4" type="hidden" value="<?php echo esc_attr( get_option('ddg_header_logo4') ); ?>"/>
                                                <div style="clear:both"></div>
                                                <input id="_unique_name_button" class="button _unique_name_button" name="_unique_name_button" type="button" value="Upload" />
                                                <input type="button"   class="remove_button  button"   target="_unique_name"   value="Remove">
                                          </div> <!--  upload1  -->

                                        </td>
                                    </tr>



                                    <tr  class="uploader  top" >
                                        <th scope="row"   class="vm" >來呷枝仔冰 電腦版</th>
                                        <td>
                                          <label for="">螢幕寬度 1920 ~ 768</label>
                                          <div id="upload2">
                                                <div  class="preview_img  _unique_name_prev">
                                                  <?php  if(esc_attr( get_option('ddg_header_logo5') )){  ?>
                                                    <img src="<?php echo esc_attr( get_option('ddg_header_logo5') ); ?>"/>
                                                  <?php  } ?>
                                                </div>
                                                <input  class="form-control  _unique_name" name="ddg_header_logo5" type="hidden" value="<?php echo esc_attr( get_option('ddg_header_logo5') ); ?>"/>
                                                <div style="clear:both"></div>
                                                <input id="_unique_name_button" class="button _unique_name_button" name="_unique_name_button" type="button" value="Upload" />
                                                <input type="button"   class="remove_button  button"   target="_unique_name"   value="Remove">
                                          </div> <!--  upload1  -->

                                        </td>
                                    </tr>


                                    <tr  class="uploader  top " >
                                        <th scope="row"   class="vm" >來呷枝仔冰 手機版</th>
                                        <td>
                                          <label for="">螢幕寬度 768 以下</label>
                                          <div id="upload2">
                                                <div  class="preview_img  _unique_name_prev">
                                                  <?php  if(esc_attr( get_option('ddg_header_logo6') )){  ?>
                                                    <img src="<?php echo esc_attr( get_option('ddg_header_logo6') ); ?>"/>
                                                  <?php  } ?>
                                                </div>
                                                <input  class="form-control  _unique_name" name="ddg_header_logo6" type="hidden" value="<?php echo esc_attr( get_option('ddg_header_logo6') ); ?>"/>
                                                <div style="clear:both"></div>
                                                <input id="_unique_name_button" class="button _unique_name_button" name="_unique_name_button" type="button" value="Upload" />
                                                <input type="button"   class="remove_button  button"   target="_unique_name"   value="Remove">
                                          </div> <!--  upload1  -->

                                        </td>
                                    </tr>



                                    <tr  class="uploader  top" style="display:none;">
                                        <th scope="row"   class="vm" >7</th>
                                        <td>
                                          <div class="pull-left s14">
                                            <label>主標題 <label>
                                              <input  class="form-control mb10" name="ddg_header_text7" type="text" value="<?php echo esc_attr( get_option('ddg_header_text7') ); ?>"/>
                                          </div>
                                          <div class="pull-left s14">
                                            <label>主標題顏色 <label>
                                              <input  class="form-control mb10" name="ddg_header_text7_color" type="text" value="<?php echo esc_attr( get_option('ddg_header_text7_color') ); ?>"  style="color:<?php echo esc_attr( get_option('ddg_header_text7_color') ); ?>"/>
                                          </div>
                                          <div class="pull-left s14">
                                            <label>副標題 <label>
                                              <input  class="form-control" name="ddg_header_stext7" type="text" value="<?php echo esc_attr( get_option('ddg_header_stext7') ); ?>"/>
                                          </div>
                                          <div class="pull-left s14">
                                            <label>副標題顏色 <label>
                                              <input  class="form-control mb10" name="ddg_header_stext7_color" type="text" value="<?php echo esc_attr( get_option('ddg_header_stext7_color') ); ?>"  style="color:<?php echo esc_attr( get_option('ddg_header_stext7_color') ); ?>"/>
                                          </div>

                                          <div style="clear:both"></div>
                                          <label for="">1920 X 200</label>
                                          <div id="upload2">
                                                <div  class="preview_img  _unique_name_prev">
                                                  <?php  if(esc_attr( get_option('ddg_header_logo7') )){  ?>
                                                    <img src="<?php echo esc_attr( get_option('ddg_header_logo7') ); ?>"/>
                                                  <?php  } ?>
                                                </div>
                                                <input  class="form-control  _unique_name" name="ddg_header_logo7" type="hidden" value="<?php echo esc_attr( get_option('ddg_header_logo7') ); ?>"/>
                                                <div style="clear:both"></div>
                                                <input id="_unique_name_button" class="button _unique_name_button" name="_unique_name_button" type="button" value="Upload" />
                                                <input type="button"   class="remove_button  button"   target="_unique_name"   value="Remove">
                                          </div> <!--  upload1  -->

                                        </td>
                                    </tr>



                                    <tr  class="uploader  top" style="display:none;">
                                        <th scope="row"   class="vm" >8</th>
                                        <td>

                                          <div class="pull-left s14">
                                            <label>主標題 <label>
                                              <input  class="form-control mb10" name="ddg_header_text8" type="text" value="<?php echo esc_attr( get_option('ddg_header_text8') ); ?>"/>
                                          </div>
                                          <div class="pull-left s14">
                                            <label>主標題顏色 <label>
                                              <input  class="form-control mb10" name="ddg_header_text8_color" type="text" value="<?php echo esc_attr( get_option('ddg_header_text8_color') ); ?>"  style="color:<?php echo esc_attr( get_option('ddg_header_text8_color') ); ?>"/>
                                          </div>
                                          <div class="pull-left s14">
                                            <label>副標題 <label>
                                              <input  class="form-control" name="ddg_header_stext8" type="text" value="<?php echo esc_attr( get_option('ddg_header_stext8') ); ?>"/>
                                          </div>
                                          <div class="pull-left s14">
                                            <label>副標題顏色 <label>
                                              <input  class="form-control mb10" name="ddg_header_stext8_color" type="text" value="<?php echo esc_attr( get_option('ddg_header_stext8_color') ); ?>"  style="color:<?php echo esc_attr( get_option('ddg_header_stext8_color') ); ?>"/>
                                          </div>

                                          <div style="clear:both"></div>
                                          <label for="">1920 X 200</label>
                                          <div id="upload2">
                                                <div  class="preview_img  _unique_name_prev">
                                                  <?php  if(esc_attr( get_option('ddg_header_logo8') )){  ?>
                                                    <img src="<?php echo esc_attr( get_option('ddg_header_logo8') ); ?>"/>
                                                  <?php  } ?>
                                                </div>
                                                <input  class="form-control  _unique_name" name="ddg_header_logo8" type="hidden" value="<?php echo esc_attr( get_option('ddg_header_logo8') ); ?>"/>
                                                <div style="clear:both"></div>
                                                <input id="_unique_name_button" class="button _unique_name_button" name="_unique_name_button" type="button" value="Upload" />
                                                <input type="button"   class="remove_button  button"   target="_unique_name"   value="Remove">
                                          </div> <!--  upload1  -->

                                        </td>
                                    </tr>





                                    <tr  class="uploader  top" >
                                        <th scope="row"   class="vm" >Line 連結</th>
                                        <td>
                                          <div style="clear:both"></div>
                                          <div id="uploadGplus">
                                                <input  class="form-control  _unique_name" name="ddg_header_gplus" type="text" value="<?php echo esc_attr( get_option('ddg_header_gplus') ); ?>"/>
                                          </div> <!--  upload1  -->
                                        </td>
                                    </tr>


                                    <tr  class="uploader  top" >
                                        <th scope="row"   class="vm" >Facebook 連結</th>
                                        <td>
                                          <div style="clear:both"></div>
                                          <div id="uploadFB">
                                                <input  class="form-control  _unique_name" name="ddg_header_fb" type="text" value="<?php echo esc_attr( get_option('ddg_header_fb') ); ?>"/>
                                          </div> <!--  upload1  -->
                                        </td>
                                    </tr>

                                    <tr  class="uploader  top" >
                                        <th scope="row"   class="vm" >Instagram 連結</th>
                                        <td>
                                          <div style="clear:both"></div>
                                          <div id="uploadFB">
                                                <input  class="form-control  _unique_name" name="ddg_header_ig" type="text" value="<?php echo esc_attr( get_option('ddg_header_ig') ); ?>"/>
                                          </div> <!--  upload1  -->
                                        </td>
                                    </tr>

                                    <tr  class="uploader  top" >
                                        <th scope="row"   class="vm" >商品製作天數</th>
                                        <td>
                                          <div style="clear:both"></div>
                                          <div id="uploadFB">
                                                <input  class="form-control  _unique_name" name="product_days" type="text" value="<?php echo esc_attr( get_option('product_days') ); ?>"/>
                                          </div> <!--  upload1  -->
                                        </td>
                                    </tr>

                                    <tr  class="uploader  top" >
                                        <th scope="row"   class="vm" >運送方式須知</th>
                                        <td>
                                          <div style="clear:both"></div>
                                          <div id="buy_note">
                                                <textarea  name="product_buynote"  style="min-height:200px;width:100%;"><?php echo esc_attr( get_option('product_buynote') ); ?></textarea>
                                          </div> <!--  upload1  -->
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
