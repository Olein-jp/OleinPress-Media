<?php
/**
 * Created by PhpStorm.
 * User: kojikuno
 * Date: 2018/11/02
 * Time: 21:03
 */

/**
 * Load WP Customizer Framework
 */
$customizer = \Inc2734\WP_Customizer_Framework\Customizer_Framework::init();

$customizer->panel( 'design', [
	'title' => 'sample',
	'priority' => 1000,
] );

$customizer->section(
	'base-design',
	[
		'title'    => __( 'Base design settings', 'snow-monkey' ),
		'priority' => 100,
	]
);

$customizer->control(
	'color',
	'accent-color',
	[
		'label'    => __( 'Accent color', 'snow-monkey' ),
		'default'  => '#bd3c4f',
		'priority' => 100,
	]
);

if ( ! is_customize_preview() ) {
	return;
}

$panel   = $customizer->get_panel( 'design' );
$section = $customizer->get_section( 'base-design' );
$control = $customizer->get_control( 'accent-color' );
$control->join( $section )->join( $panel );

