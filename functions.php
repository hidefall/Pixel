<?php
/**
 * Pixel functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Pixel
 */

if ( ! function_exists( 'pixel_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function pixel_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Pixel, use a find and replace
		 * to change 'pixel' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'pixel', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'pixel' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'pixel_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'pixel_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function pixel_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'pixel_content_width', 640 );
}
add_action( 'after_setup_theme', 'pixel_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function pixel_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'pixel' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'pixel' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'pixel_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function pixel_scripts() {
	wp_enqueue_style( 'pixel-style', get_template_directory_uri() . '/dist/app.css' );

	wp_enqueue_script( 'custom-js', get_template_directory_uri() . '/dist/dev.js');
	wp_enqueue_script( 'pixel-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	

	wp_enqueue_script( 'pixel-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
// Add ACF Options Page
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	
}

/** 
 * Add Hero Background Image
*/

function hero_section( $wp_customize ) {
	$wp_customize->add_panel( 'hero_section', array(
		'priority'       => 500,
		'theme_supports' => '',
		'title'          => __( 'Hero Section', 'pixel' ),
		'description'    => __( 'Add Hero Section Background Image.', 'pixel' ),
	) );

	$wp_customize->add_section( 'hero_section_background_image' , array(
		'title'      => __( 'Change hero backgorund', 'pixel' ),
		'panel'    => 'hero_section',
		'priority'   => 30,
		'active_callback' => 'is_front_page'
	) );

	$wp_customize->add_section( 'hero_section_subtitle' , array(
		'title'      => __( 'Change subtitle', 'pixel' ),
		'panel'    => 'hero_section',
		'priority'   => 30,
		'active_callback' => 'is_front_page'
	) );
	$wp_customize->add_section( 'hero_section_title' , array(
		'title'      => __( 'Change title', 'pixel' ),
		'panel'    => 'hero_section',
		'priority'   => 30,
		'active_callback' => 'is_front_page'
	) );


	$wp_customize->add_setting( 'hero_background', array(
		'default'           => get_stylesheet_directory_uri() . '/img/header_bg.jpg',
        'capability'        => 'edit_theme_options',
		'type'           => 'option',
   ) );

   $wp_customize->add_setting( 'hero_subtitle', array(
	'default'           => '',
	'capability'        => 'edit_theme_options',
	// 'type' => 'text',
	'sanitize_callback' => 'our_sanitize_function',
	'type' => 'theme_mod'
) );
$wp_customize->add_setting( 'hero_title', array(
	'default'           => '',
	'capability'        => 'edit_theme_options',
	// 'type' => 'text',
	'sanitize_callback' => 'our_sanitize_function',
	'type' => 'theme_mod'
) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'hero_background', array(
		'label'      => __( 'Hero Background Image', 'pixel' ),
		'section'    => 'hero_section_background_image',
		'settings'   => 'hero_background',
		
	) ) );


	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hero_title', array(
		'label'      => __( 'Hero Title', 'pixel' ),
		'section'    => 'hero_section_title',
		'settings'   => 'hero_title',
		'type' => 'text',
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hero_subtitle', array(
		'label'      => __( 'Hero Subtitle', 'pixel' ),
		'section'    => 'hero_section_subtitle',
		'settings'   => 'hero_subtitle',
		'type' => 'text',
	) ) );


 }

 
 function our_sanitize_function( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}
 add_action( 'customize_register', 'hero_section' );


add_action( 'wp_enqueue_scripts', 'pixel_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
/**
 * Boostrap NavWalker 
 */
require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
