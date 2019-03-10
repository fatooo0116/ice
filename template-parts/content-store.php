<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package fruit-ice
 */



 global $wpdb;
 $custom_db_name = $wpdb->prefix . 'wdr_postmeta';
 $sql = "SELECT * FROM ".$custom_db_name." WHERE post=".get_the_ID();
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
	 $lat = 25.0522424;
	 $lng  = 121.5428764;
	 $pos1= 0;
	 $pos2 = 0;
	 $tel  = 0;
	 $add = 0;
 }


?>
<article id="post-single" <?php post_class(); ?>>
	<header class="entry-header">
		<h2>門市據點</h2>
		<div class="sep">
      <a href="<?php echo site_url(); ?>">首頁</a>  &gt;  <a href="<?php echo site_url('/門市據點/'); ?>">門市據點</a> &gt; <?php  the_title(); ?>
    </div>
	</header><!-- .entry-header -->
	<div class="entry-content">




		<div id="store_info">
      <h2 class="mobile-title"><?php  the_title(); ?></h2>
			<div id="gmap"></div>
			<div id="store_meta">
				<h1><?php  the_title(); ?></h1>
				<ul>
					<li class="address"><?php echo $pos1." <span id='province'>".$pos2."</span> ".$add; ?></li>
					<li class="latlng hide"><?php // echo $lat.", ".$lng; ?></li>
					<li class="tel"><a href="tel:<?php echo $tel; ?>"><?php echo $tel; ?></a></li>
				</ul>
			</div>
		</div>

		<?php
			the_content( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'fruit-ice' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'fruit-ice' ),
				'after'  => '</div>',
			) );
		?>


	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->

<script type="text/javascript">
  /*  郵遞區號轉區域 */
  (function($){
    $(document).ready(function(){
        var ps = {
          'p1':'<?php echo $pos1; ?>',
          'p2':'<?php echo $pos2; ?>'
        }

        console.log(towndata[ps.p1]);
        var p2name = "";
        for(var k in towndata[ps.p1]){
          if(towndata[ps.p1][k]==ps.p2){
            p2name = k;
          }
        }

        $("#province").text(p2name);
    });
  })(jQuery);
</script>
<script>
	 function initMap() {
		 var map = new google.maps.Map(document.getElementById('gmap'), {
			 zoom: 14,
			 center: {lat:<?php echo $lat; ?>, lng:<?php echo $lng; ?>},
			 styles: [
                {
                    "featureType": "all",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "saturation": "24"
                        },
                        {
                            "visibility": "on"
                        }
                    ]
                },
                {
                    "featureType": "administrative",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#353535"
                        }
                    ]
                },
                {
                    "featureType": "landscape",
                    "elementType": "all",
                    "stylers": [
                        {
                            "color": "#eeeeee"
                        }
                    ]
                },
                {
                    "featureType": "poi",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "simplified"
                        }
                    ]
                },
                {
                    "featureType": "poi",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "color": "#f8ebad"
                        }
                    ]
                },
                {
                    "featureType": "poi",
                    "elementType": "labels",
                    "stylers": [
                        {
                            "visibility": "simplified"
                        }
                    ]
                },
                {
                    "featureType": "poi",
                    "elementType": "labels.text",
                    "stylers": [
                        {
                            "color": "#9c8b6a"
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "all",
                    "stylers": [
                        {
                            "saturation": -100
                        },
                        {
                            "lightness": 45
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#ffffff"
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#454545"
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "simplified"
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "color": "#d4d4d4"
                        }
                    ]
                },
                {
                    "featureType": "road.arterial",
                    "elementType": "labels.icon",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "transit",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "simplified"
                        }
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "all",
                    "stylers": [
                        {
                            "color": "#82e7e5"
                        },
                        {
                            "visibility": "on"
                        }
                    ]
                }
            ]
		 });



			var catIcon = {
			    url: 'http://icespring.com.tw/wp-content/themes/ice/assets/img/ypin1.png',
			    size: new google.maps.Size(40, 40),
			    scaledSize: new google.maps.Size(40, 40),
			    origin: new google.maps.Point(0,0)
			}

			/*
			var myoverlay = new google.maps.OverlayView();
			    myoverlay.draw = function () {
			        this.getPanes().markerLayer.id='markerLayer';
			    };
			myoverlay.setMap(map);
			*/

		 var marker = new google.maps.Marker({
			 position: {lat:<?php echo $lat; ?>, lng:<?php echo $lng; ?>},
			 icon: catIcon,
			 map: map,
			 //labelClass:"xlabel"
		 });
	 }
 </script>
 <style media="screen">
 	.xlabel{
		width: 40px;
	}
 </style>
 <script async defer
 src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD7jDAvIWTb6hvq51ptskYvTt5GRsxBowc&callback=initMap">
 </script>
