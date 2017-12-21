<?php
/**
 * @package amora
 */
?>
<?php $post_style1 = get_theme_mod('amora_post_layout_style', 'default'); ?>

<article id="post-<?php the_ID(); ?>" <?php echo post_class($post_style1) ; ?>>


	<div id="featured-image">
			<?php the_post_thumbnail('full'); ?>
	</div>

    <header class="entry-header">
        <?php the_title( '<h1 class="entry-title title-font">', '</h1>' ); ?>


        <div class="entry-meta">
            <?php the_time('jS F Y'); ?> | <?php the_author(); ?>
        </div><!-- .entry-meta -->
    </header><!-- .entry-header -->
			
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
