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

/**
 * Control part of customizer default
 */
include_once ( get_template_directory() . '/inc/customizer/customize-default/title_tagline/control/control.php' );




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

$customizer->control(
	'color',
	'description-color',
	[
		'label'    => __( 'Descriptioncolor', 'snow-monkey' ),
		'default'  => '#bd3c4f',
		'priority' => 110,
	]
);

$customizer->control(
	'select',
	'archive-layout',
	[
		'label'    => __( 'Archive layout', 'snow-monkey' ),
		'priority' => 120,
		'default'  => 'rich-media',
		'choices'  => [
			'rich-media' => __( 'Rich media', 'snow-monkey' ),
			'simple'     => __( 'Simple', 'snow-monkey' ),
		],
	]
);

if ( ! is_customize_preview() ) {
	return;
} else {

	/**
	 * Preview part of customizer default
	 */
	include_once ( get_template_directory() . '/inc/customizer/customize-default/title_tagline/preview/preview.php' );

	$panel_design              = $customizer->get_panel( 'design' );
	$section_base_design       = $customizer->get_section( 'base-design' );
	$control_accent_color      = $customizer->get_control( 'accent-color' );
	$control_description_color = $customizer->get_control( 'description-color' );
	$control_archive_layout = $customizer->get_control( 'archive-layout');

	$control_accent_color->join( $section_base_design )->join( $panel_design );
	$control_description_color->join( $section_base_design )->join( $panel_design );
	$control_archive_layout->join( $section_base_design )->join( $panel_design );

}