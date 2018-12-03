<?php
/**
 * @package OleinPress Media
 * @author Olein-jp
 * @license GPL-2.0+
 */

if ( ! function_exists( 'oleinpressMedia_setup' ) ) :
	function oleinpressMedia_setup() {

		load_theme_textdomain( 'oleinpressMedia', get_template_directory() . '/languages' );

		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'title-tag' );

		add_theme_support( 'post-thumbnails' );

		register_nav_menus( array(
			'global-menu' => esc_html__( 'Global Menu', 'oleinpressMedia' ),
			'header-sns' => esc_html__( 'Header SNS', 'oleinpressMedia' ),
		) );
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		add_theme_support( 'custom-background', apply_filters( 'oleinpressMedia_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		add_theme_support( 'customize-selective-refresh-widgets' );

		add_theme_support( 'custom-logo', array(
			'height'      => 63,
			'width'       => 550,
			'flex-width'  => true,
			'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'oleinpressMedia_setup' );

function oleinpressMedia_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'oleinpressMedia_content_width', 640 );
}

add_action( 'after_setup_theme', 'oleinpressMedia_content_width', 0 );

function oleinpressMedia_widgets_init() {
	// register sidebar
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'oleinpressMedia' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'oleinpressMedia' ),
		'before_widget' => '<section id="%1$s" class="c-widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	// register footer left widget area
	register_sidebar( array(
		'name'          => esc_html__( 'Footer left', 'oleinpressMedia' ),
		'id'            => 'footer-left',
		'description'   => esc_html__( 'Add widgets here.', 'oleinpressMedia' ),
		'before_widget' => '<section id="%1$s" class="c-widget c-widget__footer %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	// register footer center widget area
	register_sidebar( array(
		'name'          => esc_html__( 'Footer center', 'oleinpressMedia' ),
		'id'            => 'footer-center',
		'description'   => esc_html__( 'Add widgets here.', 'oleinpressMedia' ),
		'before_widget' => '<section id="%1$s" class="c-widget c-widget__footer %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	// register footer right widget area
	register_sidebar( array(
		'name'          => esc_html__( 'Footer right', 'oleinpressMedia' ),
		'id'            => 'footer-right',
		'description'   => esc_html__( 'Add widgets here.', 'oleinpressMedia' ),
		'before_widget' => '<section id="%1$s" class="c-widget c-widget__footer %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}

add_action( 'widgets_init', 'oleinpressMedia_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function oleinpressMedia_scripts() {
	wp_enqueue_style( 'oleinpressMedia-style', get_stylesheet_uri() );

	wp_enqueue_script( 'oleinpressMedia-bootstrap-js', get_template_directory_uri() . '/src/lib/bootstrap/js/bootstrap.bundle.min.js', array( 'jquery' ), '4.3.1', true );

	wp_enqueue_script( 'oleinpressMedia-fontawesome-js', get_template_directory_uri() . '/src/lib/fontawesome/js/all.js', array(), '5.3.1', true );

	wp_enqueue_script( 'oleinpressMedia-common-js', get_template_directory_uri() . '/js/bundle.min.js', array( 'jquery' ), '0.0.1', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'oleinpressMedia_scripts' );


/**
 * Load Custom Navigation Walker
 *
 * @link https://github.com/wp-bootstrap/wp-bootstrap-navwalker
 */
require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

/**
 * Load TGM plugin Activation
 */
//require_once get_template_directory() . '/inc/TGM/tgm-plugin-activation.php';

/**
 * Load Bootstrap pagination
 *
 * Based on:
 * @link https://gist.github.com/mtx-z/f95af6cc6fb562eb1a1540ca715ed928
 */
require_once get_template_directory() . '/inc/wp-bootstrap4.1-pagination.php';

/**
 * Load autoloader for composer
 */
require_once get_template_directory() . '/vendor/autoload.php';

/**
 * Load Comments template
 */
require_once get_template_directory() . '/inc/oleinpressMedia-comments.php';

/**
 * Load OleinPress Media Original functions
 */
require_once get_template_directory() . '/inc/function/oleinpressMedia-original-functions.php';

/**
 * Load Customizer supported by WP Customizer Framework
 *
 * @link https://github.com/inc2734/wp-customizer-framework
 */
require_once get_template_directory() . '/inc/customizer/customizer.php';

require_once get_template_directory() . '/inc/customizer/output-style.php';

/**
 * Load WP Awesome Widget
 *
 * @link https://github.com/inc2734/wp-awesome-widgets
 */
require_once get_template_directory() . '/inc/wp-awesome-widgets.php';

/**
 * Load WP GitHub Theme Updater
 *
 * @link https://github.com/inc2734/wp-github-theme-updater
 */
require_once get_template_directory() . '/inc/update/updater.php';

/**
 * Change custom logo class
 */
add_filter( 'get_custom_logo', 'oleinpressMedia_add_class_to_custom_logo' );
function oleinpressMedia_add_class_to_custom_logo( $html ) {
	$html = str_replace( 'custom-logo-link', 'navbar-brand', $html );

	return $html;
}