<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package fruit-ice
 */



	 $terms = wp_get_post_terms( get_the_ID(), 'type');
	 $icon_html = "";


		 foreach($terms as $tm){
				 	$filter[] =  $tm->slug;
				 	$icon_html .= '<span class="iconx">';
					$icon_html .= $wicon[$tm->slug];
					$icon_html .= '</span>';
				}



						global $wpdb;
						$custom_db_name = $wpdb->prefix . 'wdr_postmeta';
						$sql = "SELECT * FROM ".$custom_db_name." WHERE post=".$post->ID;
						$mylink = $wpdb->get_results($sql);
						if(count($mylink)>0){
							$pos1 = $mylink[0]->pos1;
							$pos2 = $mylink[0]->pos2;
							$tel = $mylink[0]->tel;
							$add = $mylink[0]->address;
						}else{
							$pos1="";
							$pos2="";
							$tel="";
							$add ="";
						}

		?>



<article id="post-<?php the_ID(); ?>" class="<?php echo $pos1; ?> <?php echo $pos2; ?> <?php echo implode(" ", $filter); ?> col-sm-6  col-xs-12  xgrid-item">
	<a href="<?php echo esc_url( get_permalink() ); ?>" class="inner">
	<header class="store-header">
		<?php
			$pic = get_the_post_thumbnail_url(get_the_ID(), 'full');
			$title = get_the_Title();
			if($pic){
				echo '<div   class="wthumbnail"  style="background-image:url('.$pic.');" ><img src="'.$pic.'"></div>';
			}else{
				// echo "no";
			}
			?>

		<?php
			if ( 'post' === get_post_type() ) :
				fruit_ice_posted_on();
			endif;


		?>
		<div class="category">
			<?php  echo $icon_html; ?>
		</div>



		<?php
			the_title( '<h3 class="entry-title">', '</h3>' );
		 ?>
	</header><!-- .entry-header -->



	<div class="address">
		<address><?php echo $add; ?></address>
		<div class="tel"><?php echo $tel; ?></div>
	</div>

	<div class="link">
		<div class="xinner">
			<i class="ion-ios-arrow-thin-right"></i>
		</div>
	</div>

</a><!-- inner -->
</article>
