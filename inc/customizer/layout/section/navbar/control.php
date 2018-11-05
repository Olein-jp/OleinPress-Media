<?php
/**
 * Created by PhpStorm.
 * User: kojikuno
 * Date: 2018/11/05
 * Time: 20:47
 */

$customizer = \Inc2734\WP_Customizer_Framework\Customizer_Framework::init();
/**
 * layout/navbar/control
 */
// navbar layout
$customizer->control(
	'select',
	'layout-navbar',
	[
		'label'    => __( 'Navbar Layout', 'oleinpressMedia' ),
		'priority' => 100,
		'default'  => 'left',
		'choices'  => [
			'left'   => __( 'Left', 'oleinpressMedia' ),
			'center' => __( 'Center', 'oleinpressMedia' ),
		],
	]
);
