<?php
/**
 * Created by PhpStorm.
 * User: kojikuno
 * Date: 2018/11/04
 * Time: 7:28
 */

$customizer = \Inc2734\WP_Customizer_Framework\Customizer_Framework::init();
/**
 * Insert default section of title_tagline
 */
$customizer->control(
	'text',
	'copyright-text',
	[
		'label' => __( 'Copyright text', 'oleinpressMedia' ),
		'description' => __( 'If you input nothing, display BLOG TITLE on copyright text in footer bar.', 'oleinpressMedia' ),
		'default' => '',
		'priority' => 10,
	]
);