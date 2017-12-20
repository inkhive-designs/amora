<?php
/**
 * @package amora
 */
?>
<?php $th = get_theme_mod('layout_option'); ?>

<?php switch($th) { 

	case "3": ?>
<div class="article-wrapper grid2 col-lg-6 col-md-6 col-sm-6 col-xs-12">
<?php break;  ?>

<?php case "2": ?>
<div class="article-wrapper grid3 col-lg-4 col-md-4 col-sm-6 col-xs-12">
<?php break; ?>

<?php default: ?>
<div class="article-wrapper grid4 col-lg-3 col-md-3 col-sm-6 col-xs-12">
<?php break; } ?>


<article id="post-<?php the_ID(); ?>" <?php post_class('homepage-article'); ?>>
<div class = "featured-wrapper">
	<div class="featured-image">
		<a href="<?php the_permalink(); ?>">
			<?php if (has_post_thumbnail()) :
				the_post_thumbnail('featured-thumb');
			else: ?>
				<img src="<?php echo get_template_directory_uri()."/images/dthumb.jpg";?>"></a>
			<?php endif;?> 
		</a>
	</div>
	<header class="entry-header">
		
		<?php 
			if (strlen(get_the_title()) >= 30) { ?>
				<h1 class="entry-title"><a href="<?php the_permalink(); ?>" data-title="<?php the_title(); ?>" rel="bookmark">
		<?php echo substr(get_the_title(), 0, 29)."...";
		}
				
			else { ?>
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark">
		<?php	the_title();	
			}	
				 ?>
	</a></h1>
	</header><!-- .entry-header -->
</div>

</article><!-- #post-## -->
</div>