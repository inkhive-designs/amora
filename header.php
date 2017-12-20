<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package amora
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'amora' ); ?></a>

	<div id="top-bar">
		<div class='top-wrapper container'>
			<div id = "search-top" class = "col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<form method="get" id="searchform" action="<?php echo home_url(); ?>/">
					<div><input type="text" size="18" value="" name="s" id="s" />
					</div>
				</form>
			</div>
			<?php if ( get_theme_mod( 'social', false ) ) { ?>
				<?php get_template_part('social');  ?>
			<?php 
				} 
			?>
		</div>
	</div>
			
	<div class="header-image">
	<header id="masthead" class="site-header container" role="banner">
		<div class="site-branding col-lg-12 col-md-12 col-sm-12 col-xs-12">
			
			<?php if (get_theme_mod('logo') == ""): ?>
			
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1><br>
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
			
			<?php else: ?>
			<div id = "logo" class = "col-md-12 col-lg-12 col-sm-12 col-xs-12">
				<a href="<?php echo esc_url(home_url('/')); ?>"><img src ="<?php echo get_theme_mod('logo'); ?>">
				</div>
			<?php endif; ?>
	</header><!-- #masthead -->
	</div>
	 
	<div id="nav-wrapper">
		<nav id="site-navigation" class="main-navigation" role="navigation">
				<button class="menu-toggle" aria-controls="menu" aria-expanded="false"><?php _e( 'Primary Menu', 'amora' ); ?></button>
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			</nav><!-- #site-navigation -->
		</div>
</div>
	
	<?php if (is_home() && get_theme_mod('slide_enable')) { ?>
	<ul class="bxslider">
		<?php 
		for($i = 1; $i <= 3; $i++) { 
			$s = 'slide_' . $i;
			$d = 'desc-' . $i;
		?>	
			<li><div class="slide"><img src = <?php echo get_theme_mod($s); ?>><div class="slide_caption"><?php printf(get_theme_mod($d)); ?> </div></div>
			 </li>
		<?php } ?>
	</ul>
	<?php } ?>
	<div id="content" class="site-content">
