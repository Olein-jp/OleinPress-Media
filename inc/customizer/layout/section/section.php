<?php
/**
 * Created by PhpStorm.
 * User: kojikuno
 * Date: 2018/11/05
 * Time: 20:56
 */

$customizer = \Inc2734\WP_Customizer_Framework\Customizer_Framework::init();

/**
 * layout/header
 */
$customizer->section(
	'header',
	[
		'title'    => __( 'header', 'oleinpressMedia' ),
		'priority' => 100,
	]
);

/**
 * layout/navbar
 */
$customizer->section(
	'navbar',
	[
		'title'    => __( 'Navbar', 'oleinpressMedia' ),
		'priority' => 110,
	]
);