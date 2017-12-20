<?php
/**
 * @package amora
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('homepage-article'); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title"><span>', '</span></h1>' ); ?>

		<div class="entry-meta">
			<?php amora_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->
	<div class="featured-img">
		<?php if ( has_post_thumbnail() ) {
			the_post_thumbnail();
		} ?>
	</div>
	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'amora' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php amora_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
