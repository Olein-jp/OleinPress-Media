<?php
/**
 * Created by PhpStorm.
 * User: kojikuno
 * Date: 2018/11/05
 * Time: 20:47
 */

$customizer = \Inc2734\WP_Customizer_Framework\Customizer_Framework::init();
/**
 * layout/header/control
 */
// layout header
$customizer->control(
	'select',
	'layout-header',
	[
		'label'    => __( 'Header Layout', 'oleinpressMedia' ),
		'priority' => 100,
		'default'  => 'left-logo',
		'choices'  => [
			'left-logo'   => __( 'Left Logo', 'oleinpressMedia' ),
			'center-logo' => __( 'Center Logo', 'oleinpressMedia' ),
			'big-logo'    => __( 'Big Logo', 'oleinpressMedia' ),
		],
	]
);

// sns buttons
$customizer->control(
	'radio',
	'sns-buttons',
	[
		'label'    => __( 'SNS Buttons', 'oleinpressMedia' ),
		'priority' => 110,
		'default'  => 'show',
		'choices'  => [
			'show'    => __( 'Show', 'oleinpressMedia' ),
			'notshow' => __( 'Not show', 'oleinpressMedia' ),
		],
	]
);