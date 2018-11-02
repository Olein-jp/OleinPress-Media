<?php
/**
 * Created by PhpStorm.
 * User: kojikuno
 * Date: 2018/11/02
 * Time: 20:56
 */
/**
 *
 * Setting for TagCloud widget
 *
 * @param $args
 *
 * @return array
 */
function oleinpressMedia_widget_tagcloud_custom( $args ) {
	$my_args = array(
		'orderby'  => 'count',
		'order'    => 'DESC',
		'number'   => 0,
		'largest'  => 12,
		'smallest' => 12,
		'unit'     => 'px',
	);
	$args = wp_parse_args( $args, $my_args );
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'oleinpressMedia_widget_tagcloud_custom' );