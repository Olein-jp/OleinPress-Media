<?php
/**
 * Created by PhpStorm.
 * User: kojikuno
 * Date: 2018/11/03
 * Time: 8:15
 */
add_action( 'wp_loaded', function() {
	$customizer = \Inc2734\WP_Customizer_Framework\Customizer_Framework::init();
	$cfs = $customizer->styles();

	$accent_color = get_theme_mod( 'accent-color' );

	$cfs->register(
		[
			'.c-site-title > a',
			'.c-site-description',
		],
		[
			"color: {$accent_color}",
			"border-bottom-color: {$accent_color}",
		],
		'@media (min-width: 768px)' // Optional
	);
});