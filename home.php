<?php
/**
 * The template for displaying home page.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package amora
 */

get_header(); ?>

	<div id="primary-home" class="content-home container">
		<h2 id="page-title">
		<span><?php _e("Recent Posts", 'amora') ?></span>
		</h2>
			<main id="main" class="site-main grid-home" role="main">
	
				<?php while ( have_posts() ) : the_post(); ?>
	
					<?php get_template_part( 'content', 'home' ); ?>
	
					<?php
						// If comments are open or we have at least one comment, load up the comment template
						if ( comments_open() || '0' != get_comments_number() )
							comments_template();
					?>
	
				<?php endwhile; // end of the loop. ?>
				
				
			</main><!-- #main -->
			<?php amora_pagination(); ?>
	</div><!-- #primary-home-->


<?php get_footer(); ?>
