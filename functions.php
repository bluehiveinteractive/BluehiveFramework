<?php
/**
 *
 * BluehiveFramework functions and definitions
 *
 * @package BluehiveFramework
 *
 */


/**
 *
 * Set Proper Parent/Child theme paths for inclusion
 *
 **/
	@define( 'PARENT_DIR', get_template_directory() );
	@define( 'CHILD_DIR', get_stylesheet_directory() );

	@define( 'PARENT_URL', get_template_directory_uri() );
	@define( 'CHILD_URL', get_stylesheet_directory_uri() );

	@define( 'CURRENT_THEME', getCurrentTheme() );
	@define( 'BLUEHIVE_VER', bluehive_get_theme_version('BluehiveFramework') );


/**
*
* JS global variables
* - Originally from CherryFramework - https://github.com/CherryFramework/
*
**/
	function bluehive_js_global_variables(){
		$output = "<script>";
		$output .="\n var system_folder = '".PARENT_URL."/admin/data_management/',";
		$output .= "\n\t CHILD_URL ='" .CHILD_URL."',";
		$output .= "\n\t PARENT_URL = '".PARENT_URL."', ";
		$output .= "\n\t CURRENT_THEME = '".CURRENT_THEME."'";
		$output .= "</script>";
		echo $output;
	}
	add_action('wp_head', 'bluehive_js_global_variables');
	add_action('admin_head', 'bluehive_js_global_variables');

/**
*
* Definition current theme
*
**/				
	function getCurrentTheme() {
		if ( function_exists('wp_get_theme') ) {
			$theme = wp_get_theme();
			if ( $theme->exists() ) {
				$theme_name = $theme->Name;
			}
		} else {
			$theme_name = get_current_theme();
		}
		$theme_name = preg_replace("/\W/", "_", strtolower($theme_name) );
		return $theme_name;
	}

/**
*
* Definition theme version
* - Originally from CherryFramework - https://github.com/CherryFramework/
*
* @param string $theme_name Directory name for the theme
*
**/
	function bluehive_get_theme_version($theme_name) {
		if ( function_exists('wp_get_theme') ) {
			$theme = wp_get_theme($theme_name);
			if ( $theme->exists() ) {
				$theme_ver = $theme->Version;
			}
		} else {
			$theme_data = get_theme_data( get_theme_root() . '/' . $theme_name . '/style.css' );
			$theme_ver  = $theme_data['Version'];
		}
		return $theme_ver;
	}

/**
 * Set the content width based on the theme's design and stylesheet.
 */
	if ( ! isset( $content_width ) ) {
		$content_width = 640; /* pixels */
	}

if ( ! function_exists( 'bluehiveframework_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function bluehiveframework_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on BluehiveFramework, use a find and replace
	 * to change 'bluehiveframework' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'bluehiveframework', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'bluehiveframework' ),
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
	add_theme_support( 'custom-background', apply_filters( 'bluehiveframework_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // bluehiveframework_setup
add_action( 'after_setup_theme', 'bluehiveframework_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function bluehiveframework_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'bluehiveframework' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'bluehiveframework_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function bluehiveframework_scripts() {
	wp_enqueue_style( 'bluehiveframework-style', get_stylesheet_uri() );

	wp_enqueue_script( 'bluehiveframework-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'bluehiveframework-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bluehiveframework_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

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
