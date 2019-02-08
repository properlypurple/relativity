<?php
/**
 * Relativity functions and definitions
 *
 * @package Relativity
 */

if ( ! function_exists( 'relativity_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function relativity_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Relativity, use a find and replace
		 * to change 'relativity' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'relativity', get_template_directory() . '/languages' );

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
		 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary Menu', 'relativity' ),
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

		/*
		 * Enable support for Post Formats.
		 * See http://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'post-formats', array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'relativity_custom_background_args', array(
			'default-color' => 'efefef',
			'default-image' => '',
		) ) );

		/*
		 * Add support for editor styles
		 * See https://codex.wordpress.org/Editor_Style
		 * Also see https://codex.wordpress.org/Editor_Style
		 */
		add_theme_support('editor-styles');
		add_editor_style('editor-style.css');
		add_editor_style('//fonts.googleapis.com/css?family=Vollkorn:400|Open+Sans:300,400,700');


		/**
	  * Add support for Gutenberg features.
	  *
	  * @link https://wordpress.org/gutenberg/handbook/designers-developers/developers/themes/theme-support/
	  */
		add_theme_support( 'align-wide' );
		add_theme_support( 'editor-color-palette', array(
			array(
				'name' => __( 'Teal', 'relativity' ),
				'slug' => 'teal',
				'color' => '#00796b',
			),
			array(
				'name' => __( 'Light Teal', 'relativity' ),
				'slug' => 'light-teal',
				'color' => '#009688',
			),
			array(
				'name' => __( 'Blue', 'relativity' ),
				'slug' => 'blue',
				'color' => '#1976d2',
			),
			array(
				'name' => __( 'Light Blue', 'relativity' ),
				'slug' => 'light-blue',
				'color' => '#2196f3',
			),
			array(
				'name' => __( 'Green', 'relativity' ),
				'slug' => 'green',
				'color' => '#388e3c',
			),
			array(
				'name' => __( 'Light Green', 'relativity' ),
				'slug' => 'light-green',
				'color' => '#4caf50',
			),
			array(
				'name' => __( 'Red', 'relativity' ),
				'slug' => 'red',
				'color' => '#d32f2f',
			),
			array(
				'name' => __( 'Light Red', 'relativity' ),
				'slug' => 'light-red',
				'color' => '#f44336',
			),
			array(
				'name' => __( 'Off White', 'relativity' ),
				'slug' => 'off-white',
				'color' => '#fafafa',
			),
			array(
				'name' => __( 'Light Black', 'relativity' ),
				'slug' => 'light-black',
				'color' => '#2d2d2d',
			),
		) );

		add_theme_support( 'responsive-embeds' );	
	}
endif; // End relativity_setup.
add_action( 'after_setup_theme', 'relativity_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function relativity_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'relativity_content_width', 760 );
	if ( ! isset( $content_width ) ) {
		$content_width = 760;
	}
}
add_action( 'after_setup_theme', 'relativity_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function relativity_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget Area 1', 'relativity' ),
		'id'            => 'footer-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget Area 2', 'relativity' ),
		'id'            => 'footer-2',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'relativity_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function relativity_scripts() {
	wp_enqueue_style( 'relativity-style', get_stylesheet_uri() );

	wp_enqueue_script( 'relativity-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'relativity-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_style( 'relativity-googlefonts', '//fonts.googleapis.com/css?family=Vollkorn:400|Open+Sans:300,400,700' );
}
add_action( 'wp_enqueue_scripts', 'relativity_scripts' );

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

/**
 * Load Custom comments callback file.
 */
require get_template_directory() . '/inc/custom-comments.php';
