<?php
/**
 * Created by PhpStorm.
 * User: kojikuno
 * Date: 2018/11/05
 * Time: 20:42
 */
$customizer = \Inc2734\WP_Customizer_Framework\Customizer_Framework::init();

/**
 * layout
 */
$customizer->panel( 'layout', [
	'title' => __( 'Layout', 'oleinpressMedia' ),
	'priority' => 1000,
] );