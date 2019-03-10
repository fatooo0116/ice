<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package fruit-ice
 */

?>

<article id="post-single" <?php post_class(); ?>>
	<header class="entry-header">
		<h2>最新消息</h2>
		<div class="sep">
			<a href="<?php echo site_url(); ?>">首頁</a>  &gt;  <a href="<?php echo site_url('/category/news/'); ?>">最新消息</a>  &gt; <?php  the_title(); ?>  
		</div>
	</header><!-- .entry-header -->
	<div class="entry-content">
		<h1><?php  the_title(); ?></h1>
		<div class="entry-meta">
			<?php fruit_ice_posted_on(); ?>
		</div><!-- .entry-meta -->

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

		<a href="<?php  echo site_url('/category/news/'); ?>"  class="button  back-btn">回上一頁</a>

	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
