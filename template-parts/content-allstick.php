<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package fruit-ice
 */

?>



<article id="post-<?php the_ID(); ?>" class="col-sm-6  col-xs-12 grid-item"  >
	<a	 href="#"			target="<?php  echo esc_url( get_permalink() ); ?>" class="inner"   >
	<header class="stick-header">
		<?php
			$pic = get_the_post_thumbnail_url(get_the_ID(), 'full');
			$title = get_the_Title();
			if($pic){
				echo '<div class="wthumbnail"><div   class="winner"  style="background-image:url('.$pic.');" ><img src="'.$pic.'"></div></div>';
			}else{
				// echo "no";
			}


			$value = get_post_meta(  get_the_ID(), '_my_meta_sale_status');

			if($value[0]){
				$st = '販售中';
			}else{
				$st = '已停售';
			}
			?>
			<div class="sale_status hide"><?php echo $st; ?></div>



		<?php
			if ( 'post' === get_post_type() ) :
				fruit_ice_posted_on();
			endif;
		?>

		<?php
			the_title( '<h2 class="entry-title">', '</h2>' );
		 ?>

		 <div class="date">
		 	<?php echo get_the_date('Y.m'); ?>
		 </div>

		 	<div class="content hide" >
				<?php  the_content(); ?>
		 	</div>
	</header><!-- .entry-header -->
</a><!-- inner -->
</article><!-- #post-<?php the_ID(); ?> -->
