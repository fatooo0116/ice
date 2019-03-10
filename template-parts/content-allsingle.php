<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package fruit-ice
 */

?>

<article id="post-<?php the_ID(); ?>" class="col-sm-4  col-xs-6 grid-item">
	<div class="inner">
	<header class="news-header">
		<?php
			$pic = get_the_post_thumbnail_url(get_the_ID(), 'full');
			$title = get_the_Title();
			if($pic){
				echo '<a href="'.esc_url( get_permalink() ).'"   class="wthumbnail"  style="background-image:url('.$pic.');" ><img src="'.$pic.'"></a>';
			}else{
				// echo "no";
			}
			?>
		<?php
			if ( 'post' === get_post_type() ) :
				fruit_ice_posted_on();
			endif;
		?>

		<?php
			the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
		 ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_excerpt();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'fruit-ice' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
</div><!-- inner -->
</article><!-- #post-<?php the_ID(); ?> -->
