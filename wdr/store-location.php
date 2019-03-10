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

        $wdrlat = sanitize_text_field( $_POST['wdrlat'] );
        $wdrlng = sanitize_text_field( $_POST['wdrlng'] );
        $add = sanitize_text_field( $_POST['address'] );
        $city = $_POST['city'];
        $town = $_POST['town'];
        $tel = $_POST['tel'];

        global $wpdb;

        $custom_db_name = $wpdb->prefix . 'wdr_postmeta';
        $sql = "SELECT * FROM ".$custom_db_name." WHERE post=".$post_id;
        $mylink = $wpdb->get_results($sql);

        if (count($mylink )>0){
            $wpdb->update(
                $custom_db_name,
                array(
                  'lat' =>   $wdrlat,
                  'lng' =>   $wdrlng,
                  'pos1'=> $city,
                  'pos2'=>$town,
                  'tel'=>$tel,
                  'address'=>$add
                ),
                array( 'post' =>$post_id )
            );
        }else{
            $wpdb->insert(
                $custom_db_name,
                array(
                    'post' =>$post_id,
                    'lat' =>   $wdrlat,
                    'lng' =>   $wdrlng,
                    'pos1'=> $city,
                    'pos2'=>$town,
                    'tel'=>$tel,
                    'address'=>$add
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


    } /*  save */






    /**
     * Render Meta Box content.
     *
     * @param WP_Post $post The post object.
     */
    public function render_meta_box_content( $post ) {

        // Add an nonce field so we can check for it later.
        wp_nonce_field( 'myplugin_inner_custom_box', 'myplugin_inner_custom_box_nonce' );
        wp_enqueue_script( 'fruit-ice-twzipcode', get_template_directory_uri() . '/wdr/store/town.js', array(), '20151215', true );

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
          .wdr_input .wdr_set  label{
            display:block;
            font-size: 15px;
            color:#000;
            margin-top:10px;
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
          function initMap() {
            // Create a map object and specify the DOM element for display.
            if(jQuery("#defx").length>0){
              var myLatlng = {lat: Number(jQuery("#defx").attr('lat')), lng: Number(jQuery("#defx").attr('lng'))};
            }else{
              var myLatlng = {lat: -25.363, lng: 131.044};
            }


            map = new google.maps.Map(document.getElementById('map'), {
              zoom: 10,
              center: myLatlng
            });

             marker = new google.maps.Marker({
              position: myLatlng,
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


             map.addListener('click', function(e){
               //map.setZoom(8);
               //map.setCenter(marker.getPosition());
               //var latLng = e.latLng;
               console.log(e.latLng.lat());
               console.log(e.latLng.lng());
             });
          }

          (function($){
          $(document).ready(function(){

            var town = $('select[name="town"]').attr("default");
            $('select[name="city"]').on("change",function(){
              var city = $(this).val();
              var thtml='';
              for(var key in towndata[city]){
                if(towndata[city][key] == town){
                  thtml += '<option value="'+towndata[city][key]+'"  selected >'+key+'</option>';
                }else{
                  thtml += '<option value="'+towndata[city][key]+'">'+key+'</option>';
                }
              }
              $('select[name="town"]').html(thtml);
            });

            $('select[name="city"]').trigger('change');




            $("#findbtn").on("click",function(e){
              e.preventDefault();

              var address = $("#gaddress").val();
              var url =  'https://maps.googleapis.com/maps/api/geocode/json?address='+address;
              console.log(url);

              $.post( url, {})
                .done(function(data) {
                  console.log(data);


                  if(data.status=="OK"){

                    $('input[name="wdrlat"]').val(data.results[0]['geometry'].location.lat);
                    $('input[name="wdrlng"]').val(data.results[0]['geometry'].location.lng);

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







        <?php
        /*  Add  UI   */
          global $wpdb;
          $custom_db_name = $wpdb->prefix . 'wdr_postmeta';
          $sql = "SELECT * FROM ".$custom_db_name." WHERE post=".$post->ID;
          $mylink = $wpdb->get_results($sql);
          if(count($mylink)>0){
            $lat = $mylink[0]->lat;
            $lng = $mylink[0]->lng;
            $pos1 = $mylink[0]->pos1;
            $pos2 = $mylink[0]->pos2;
            $tel = $mylink[0]->tel;
            $add = $mylink[0]->address;
            ?>
            <div id="defx" lat="<?php echo  $lat;?>"   lng="<?php echo  $lng;?>"></div>
            <?php
          }else{
            $lat = 0;
            $lng  =0;
            $pos1= 0;
            $pos2 = 0;
            $tel  = 0;
            $add = 0;
          }
        ?>


        <div id="gmap_module"  class="metabox  is-clearfix">
          <div id="map"></div>
          <div class="wdr_input">

            <div class="latlng">
              <h3>Google Map 設定</h3>
              <input type="text" class="input"  name="address"  id="gaddress"><br/>
              <button type="button"   class="button "  id="findbtn" name="button">查詢</button>
                <input type="text" class="input"  name="wdrlat" value="<?php echo  $lat;?>" >
                <input type="text" class="input"  name="wdrlng"  value="<?php echo  $lng;?>" >
            </div>


            <!-- Button trigger modal -->
            <div class="wdr_set">
              <div class="control">
                <h3>地址設定</h3>

                <?php
                  $town = array("基隆市","臺北市","新北市","宜蘭縣","新竹市","新竹縣","桃園市","苗栗縣","臺中市","彰化縣","南投縣","嘉義市","嘉義縣","雲林縣","臺南市","高雄市","屏東縣","臺東縣","花蓮縣","金門縣","連江縣","澎湖縣");
                ?>
                <select class="city" name="city"  default="<?php echo $pos1; ?>">
                  <?php
                    foreach($town as $ax){
                      if($pos1==$ax){
                        echo "<option  value='".$ax."'  selected>".$ax."</option>";
                      }else{
                        echo "<option  value='".$ax."'>".$ax."</option>";
                      }
                    }
                  ?>
                </select>

                <select class="town" name="town" default="<?php echo $pos2; ?>">
                </select>
              </div>

              <div class="input">
                  <input type="text" class="input"  name="address"  value="<?php echo  $add;?>" >
              </div>
              <div class="input">
                <label for="">電話</label>
                  <input type="text" class="input"  name="tel"  value="<?php echo  $tel;?>" >
              </div>
            </div>

          </div><!-- wdr_input -->


          <div class="clearfix"></div>
        </div><!-- metabox -->




        <?php

    }
}














 ?>
