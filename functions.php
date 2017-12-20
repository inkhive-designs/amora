<?php
/**
 * amora functions and definitions
 *
 * @package amora
 */



if ( ! function_exists( 'amora_setup' ) ) :
/**
 * Set the content width based on the theme's design and stylesheet.
 */
 global $content_width;
if ( ! isset( $content_width ) ) {
	$content_width = 1100; /* pixels */
}
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
 

function amora_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on amora, use a find and replace
	 * to change 'amora' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'amora', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size('featured-thumb',600,600,true);
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'amora' ),
	) );
	
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link'
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'amora_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
	
	add_theme_support( 'custom-header' );
	
	add_theme_support( 'title-tag' );
}
endif; // amora_setup
add_action( 'after_setup_theme', 'amora_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function amora_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'amora' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer 1', 'amora' ),
		'id'            => 'sidebar-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer 2', 'amora' ),
		'id'            => 'sidebar-3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer 3', 'amora' ),
		'id'            => 'sidebar-4',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer 4', 'amora' ),
		'id'            => 'sidebar-5',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'amora_widgets_init' );


/** 
 *Enqueuing  the fonts
 */

function amora_fonts_url() {
    $fonts_url = '';
    
    $oswald		= _x('on', 'Oswald font: on or off', 'amora');
    
    $overpass	= _x('on', 'Overpass font: on or off', 'amora');

	if ( 'off' !== $oswald || 'off'	!== $overpass ) {
	    $font_families = array();
	
	    if ('off' !== $oswald ) {
		    $font_families[] = 'Oswald:300,400,700';
	    }
	    
	     if ('off' !== $overpass ) {
		    $font_families[] = 'Overpass:300,400';
	    }
	    
		$query_args = array(
		    'family' => urlencode( implode( '|', $font_families ) ),
		    'subset' => urlencode( 'latin,latin-ext' ),
		);
	}
	
	$fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
 
    return $fonts_url;
}

function amora_scripts_styles() {
    wp_enqueue_style( 'amora-fonts', amora_fonts_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'amora_scripts_styles' );




function amora_scripts() {
	wp_enqueue_style( 'amora-style', get_stylesheet_uri() );
	if (get_theme_mod('page_layout', 'main') == 'right') {
		wp_enqueue_style('amora-layout',get_template_directory_uri()."/css/layout/content-sidebar.css");
	}
	else 
	{
		wp_enqueue_style('amora-layout',get_template_directory_uri()."/css/layout/sidebar-content.css");
	}
	
	
	wp_enqueue_style('amora-bootstrap-style',get_template_directory_uri()."/css/bootstrap/bootstrap.min.css", array('amora-layout'));

	wp_enqueue_style('amora-main-skin', get_template_directory_uri()."/css/skins/main.css",array('amora-bootstrap-style'));
	
	wp_enqueue_style('bx-slider-default-theme-skin', get_template_directory_uri(). "/css/slider/jquery.bxslider.css", array('amora-main-skin'));
	
	wp_enqueue_style('amora-font-awesome', get_template_directory_uri(). "/css/font-awesome/css/font-awesome.min.css", array('bx-slider-default-theme-skin'));
	
	wp_enqueue_script( 'amora-js', get_template_directory_uri() . '/js/jquery-1.11.2.js', array('jquery'));
	
	wp_enqueue_script( 'amora-menu-js', get_template_directory_uri() . '/js/jquery.slicknav.min.js', array(), true );
	
	wp_enqueue_script( 'amora-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	
	wp_enqueue_script( 'amora-slider-js', get_template_directory_uri() . '/js/jquery.bxslider.min.js', array(), true );

	wp_enqueue_script( 'amora-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

function amora_initialize_header() {

	echo "<script>"; ?>
	
		$(document).ready(function(){
		  $('.bxslider').bxSlider({
		  mode: 'fade',
		  adaptiveHeight: true,
		  captions: true
		 });
		});	
		
		jQuery(function(){
			jQuery('.nav-menu').slicknav({
				prependTo: "#nav-wrapper",
			});
		});
		
	<?php
	
	echo "</script>";
	
	?>
	
	<style type="text/css">
	h1.site-title a {
		color: <?php echo get_theme_mod('title_color','#ffffff'); ?>;
	}
	
	h2.site-description {
		color: #<?php echo get_theme_mod('header_textcolor','#ffffff'); ?>;
	}
	</style>
	
	<?php
}
add_action('wp_head', 'amora_initialize_header');



function amora_pagination() {
	global $wp_query;
	$big = 12345678;
	$page_format = paginate_links( array(
	    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	    'format' => '?paged=%#%',
	    'current' => max( 1, get_query_var('paged') ),
	    'total' => $wp_query->max_num_pages,
	    'type'  => 'array',
	    'prev_text'	=> '',
	    'next_text'	=> ''
	) );
	if( is_array($page_format) ) {
	            $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
	            echo '<div class="pagination clearfix"><div><ul>';
	            echo '<li><span>'. $paged . ' of ' . $wp_query->max_num_pages .'</span></li>';
	            foreach ( $page_format as $page ) {
	                    echo "<li>$page</li>";
	            }
	           echo '</ul></div></div>';
}}


add_action( 'wp_enqueue_scripts', 'amora_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';