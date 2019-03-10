<?php

/**
 * Calls the class on the post edit screen.
 */
function call_locationClass() {
    new  locationClass();
}

if ( is_admin() ) {
    add_action( 'load-post.php',     'call_locationClass' );
    add_action( 'load-post-new.php', 'call_locationClass' );
}

/**
 * The Class.
 */
class locationClass {


    /**
     * Hook into the appropriate actions when the class is constructed.
     */
    public function __construct() {
        add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );
        add_action( 'save_post',      array( $this, 'save'         ) );
    }

    /**
     * Adds the meta box container.
     */
    public function add_meta_box( $post_type ) {
        // Limit meta box to certain post types.
        $post_types = array( 'store' );

        if ( in_array( $post_type, $post_types ) ) {
            add_meta_box(
                'Location',
                __( 'Gmap  位置', 'textdomain' ),
                array( $this, 'render_meta_box_content' ),
                $post_type,
                'normal',
                'low'
            );
        }
    }



    /**
     * Save the meta when the post is saved.
     *
     * @param int $post_id The ID of the post being saved.
     */
    public function save( $post_id ) {

        /*
         * We need to verify this came from the our screen and with proper authorization,
         * because save_post can be triggered at other times.
         */

        // Check if our nonce is set.
       if ( ! isset( $_POST['myplugin_inner_custom_box_nonce'] ) ) {
            return $post_id;
        }

        $nonce = $_POST['myplugin_inner_custom_box_nonce'];

        // Verify that the nonce is valid.
        if ( ! wp_verify_nonce( $nonce, 'myplugin_inner_custom_box' ) ) {
            return $post_id;
        }

        /*
         * If this is an autosave, our form has not been submitted,
         * so we don't want to do anything.
         */
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return $post_id;
        }

        if ( 'page' == $_POST['post_type'] ) {
            if ( ! current_user_can( 'edit_page', $post_id ) ) {
                return $post_id;
            }
        } else {
            if ( ! current_user_can( 'edit_post', $post_id ) ) {
                return $post_id;
            }
        }


        global $wpdb;
        $custom_db_name = $wpdb->prefix . 'store_meta';
        $sql = "SELECT * FROM ".$custom_db_name." WHERE post=".$post_id;



        $mylink = $wpdb->get_results($sql);
        if (count($mylink )>0){
            $wpdb->update(
                $custom_db_name,
                array(
                    'lat'=>$_POST['wdrlat'],
                    'lng'=>$_POST['wdrlng'],
                    'address'=> trim($_POST["address"]),
                    'tel'=> $_POST["tel"],
                    'xtime'=>$_POST['xtime'],
                    'trafic'=>$_POST['trafic'],
                    'parking'=> $_POST["parking"]
                ),
                array( 'post' =>$post_id )
            );
        }else{
            $wpdb->insert(
                $custom_db_name,
                array(
                  'lat'=>$_POST['wdrlat'],
                  'post' =>$post_id,
                  'lng'=>$_POST['wdrlng'],
                  'address'=> trim($_POST["address"]),
                  'tel'=> $_POST["tel"],
                  'xtime'=>$_POST['xtime'],
                  'trafic'=>$_POST['trafic'],
                  'parking'=> $_POST["parking"]

                )
            );
        }



        /* OK, it's safe for us to save the data now. */
        // Sanitize the user input.


        // Update the meta field.
        //update_post_meta( $post_id, '_myuploadplugin_new_key', $mydata );

        // global $wpdb;



      //  $mydata = sanitize_text_field( $_POST['myuploadplugin_new_field'] );

      //  $mydata1 = sanitize_text_field( $_POST['myuploadplugin_new_field'] );
      //  $mydata2 = sanitize_text_field( $_POST['publisher'] );
      //  $mydata3 = sanitize_text_field( $_POST['date'] );
      //  $mydata4 = sanitize_text_field( $_POST['dev'] );


        /*
        $custom_db_name = $wpdb->prefix . 'store_meta';
        $sql = "SELECT * FROM ".$custom_db_name." WHERE post=".$post_id;
        $mylink = $wpdb->get_results($sql);

        if (count($mylink )>0){
            $wpdb->update(
                $custom_db_name,
                array(
                    'date' =>   date($mydata),
                ),
                array( 'post' =>$post_id )
            );
        }else{
            $wpdb->insert(
                $custom_db_name,
                array(
                    'post' =>$post_id,
                    'date' =>   date($mydata),

                )
            );
        }
        */


    } /*  save */






    /**
     * Render Meta Box content.
     *
     * @param WP_Post $post The post object.
     */
    public function render_meta_box_content( $post ) {

        // Add an nonce field so we can check for it later.
        wp_nonce_field( 'myplugin_inner_custom_box', 'myplugin_inner_custom_box_nonce' );
      //  wp_enqueue_script( 'taihodien-twzipcode', get_template_directory_uri() . '/wdr/store/twzipcode.js', array(), '20151215', true );


        /*  Add  UI   */
          global $wpdb;
          $custom_db_name = $wpdb->prefix . 'store_meta';
          $sql = "SELECT * FROM ".$custom_db_name." WHERE post=".$post->ID;
          $mylink = $wpdb->get_results($sql);

          // print_r($mylink)

        ?>



        <style media="screen">
          #map{
            height:300px;
            width: 50%;
            float: right;
            box-sizing: border-box;
          }
          .wdr_input{
            padding:0 5px;
            width: 50%;
            float: left;
            box-sizing: border-box;
          }
          .wdr_input  select{
            width:90%;
            margin-bottom: 10px;
          }
          .wdr_input  input{
            width: 90%;
            margin-bottom: 10px;
          }
          .wdr_input .wdr_set{
            margin-bottom: 15px;
          }
          .clearfix{
            clear:both;
          }
          #map{
                box-shadow: 0 1px 2px #444;
          }
          @media screen and (max-width: 450px) {
                .wdr_input{height:auto;}
                .wdr_input,#map{ width:100%;margin-bottom: 20px; }
          }
        </style>



        <script>
        var wp_admin_ajax = '<?php echo admin_url('admin-ajax.php'); ?>';
        var cur_pid = '<?php  echo $post->ID; ?>';
        </script>



        <script>
         var marker = null;
         var map = null;
         var mylalng = {lat:<?php if($mylink[0]->lat){ echo $mylink[0]->lat; }else{ echo " -25.363";};  ?>, lng:<?php if($mylink[0]->lng){ echo $mylink[0]->lng; }else{ echo " 131.044";};  ?>};


          function initMap() {
            // Create a map object and specify the DOM element for display.
            var myLatlng = {lat: -25.363, lng: 131.044};

            map = new google.maps.Map(document.getElementById('map'), {
              zoom: 14,
              center: mylalng
            });

             marker = new google.maps.Marker({
              position: mylalng,
              map: map,
              title: 'Click to zoom'
            });


              var origin_input = document.getElementById('gaddress');
              var origin_autocomplete = new google.maps.places.Autocomplete(origin_input);
              origin_autocomplete.addListener('place_changed', function() {
                  var place = origin_autocomplete.getPlace();
                  if (!place.geometry) {
                    window.alert("Autocomplete's returned place contains no geometry");
                    return;
                  }
                });
          }

          (function($){
          $(document).ready(function(){


            $("#findbtn").on("click",function(e){

              e.preventDefault();

              var address = $("#gaddress").val();
              var url =  'https://maps.googleapis.com/maps/api/geocode/json?address='+address;
              console.log(url);

              $.post( url, {})
                .done(function(data) {
                  console.log(data.results[0]);
                  $('input[name="wdrlat"]').val(data.results[0]['geometry'].location.lat);
                  $('input[name="wdrlng"]').val(data.results[0]['geometry'].location.lng);


                  if(data.status=="OK"){
                    marker.setMap(null);
                    map.setZoom(13);
                    var myLatlng = data.results[0].geometry.location;
                    marker = new google.maps.Marker({
                     position: myLatlng,
                     map: map,
                     title: 'Click to zoom'
                    });
                    map.setCenter(marker.getPosition());
                  }else{
                    alert("找不到資料");
                  }
                });
            });



          });
        })(jQuery);

        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD7jDAvIWTb6hvq51ptskYvTt5GRsxBowc&libraries=places&callback=initMap"
        async defer></script>






        <div id="gmap_module"  class="metabox  is-clearfix">
          <div>
            <div id="map"></div>
            <div class="wdr_input">
              <!-- Button trigger modal -->
              <div class="wdr_set ">
                <label for="">Address For Google Map</label>
                <div class="control">
                  <input type="text" class="input"  name="address"  id="gaddress"><br/>
                  <button type="button"   class="button "  id="findbtn" name="button">查詢</button>
                </div>
              </div>

              <div class="latlng">
                  <input type="text" class="input"  name="wdrlat"  value="<?php  echo  $mylink[0]->lat;  ?>"  >
                  <input type="text" class="input"  name="wdrlng"  value="<?php  echo  $mylink[0]->lng;  ?>"  >
                  <button type="button"   class="button "  id="latlng_btn" name="button">儲存經緯度</button>
              </div>

            </div>
            <div class="clearfix"></div>
          </div>
            <br/><br/>



          <div class="wdr_input">
            <!--  ############################################  -->
            <div class="other_info">
              <div class="input-field">
                <label for=""><strong>店址</strong></label>
                <textarea name="address" rows="4" cols="60"><?php  echo $mylink[0]->address; ?></textarea>
              </div>
              <div class="input-field">
                <label for=""><strong>訂位專線</strong></label>
                <input name="tel" type="text"  value="<?php  echo  $mylink[0]->tel;  ?>" />
              </div>
              <div class="input-field">
                <label for=""><strong>營業時間</strong></label>
                <textarea name="xtime" rows="4" cols="60"><?php  echo $mylink[0]->xtime; ?></textarea>
              </div>
              <div class="input-field">
                <label for=""><strong>交通位置</strong></label>
                <textarea name="trafic" rows="4" cols="60"><?php  echo $mylink[0]->trafic; ?></textarea>
              </div>
              <div class="input-field">
                <label for=""><strong>停車資訊</strong></label>
                <textarea name="parking" rows="4" cols="60"><?php  echo $mylink[0]->parking; ?></textarea>
              </div>
            </div>
            <!--  ############################################  -->
          </div><!-- wdr_input -->

          <div class="clearfix"></div>
        </div><!-- metabox -->




        <?php

    }
}


 ?>
