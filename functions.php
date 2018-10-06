<?php
/**
 * @package OleinPress Media
 * @author Olein-jp
 * @license GPL-2.0+
 */

if ( ! function_exists( 'oleinpressMedia_setup' ) ) :
	function oleinpressMedia_setup() {

		//load_theme_textdomain( 'oleinpressMedia', get_template_directory() . '/languages' );

		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'title-tag' );

		add_theme_support( 'post-thumbnails' );

		register_nav_menus( array(
			'global-menu' => esc_html__( 'Global Menu', 'oleinpressMedia' ),
			'header-menu' => esc_html__( 'Header Menu', 'oleinpressMedia' ),
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
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'oleinpressMedia_setup' );

function oleinpressMedia_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'oleinpressMedia_content_width', 640 );
}
add_action( 'after_setup_theme', 'oleinpressMedia_content_width', 0 );

function oleinpressMedia_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'oleinpressMedia' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'oleinpressMedia' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
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

	wp_enqueue_script( 'oleinpressMedia-bootstrap-js', get_template_directory_uri() . '/lib/bootstrap/js/bootstrap.bundle.min.js', array( 'jquery' ), '4.3.1', true );

	wp_enqueue_script( 'oleinpressMedia-fontawesome-js', get_template_directory_uri() . '/lib/fontawesome/js/all.js', array(), '5.3.1', true );

	wp_enqueue_script( 'oleinpressMedia-common-js', get_template_directory_uri() . '/js/common.js', array( 'jquery' ), '0.0.1', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'oleinpressMedia_scripts' );
/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';
/**
 * Custom template tags for this theme.
 */
//require get_template_directory() . '/inc/template-tags.php';
/**
 * Functions which enhance the theme by hooking into WordPress.
 */
//require get_template_directory() . '/inc/template-functions.php';
/**
 * Customizer additions.
 */
//require get_template_directory() . '/inc/customizer.php';
/**
 * Load Jetpack compatibility file.
 */
//if ( defined( 'JETPACK__VERSION' ) ) {
//	require get_template_directory() . '/inc/jetpack.php';
//}
/**
 * Load WooCommerce compatibility file.
 */
//if ( class_exists( 'WooCommerce' ) ) {
//	require get_template_directory() . '/inc/woocommerce.php';
//}


// Register Custom Navigation Walker
require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';