<?php
/**
 * Created by PhpStorm.
 * User: kojikuno
 * Date: 2018/11/05
 * Time: 20:52
 */

$customizer = \Inc2734\WP_Customizer_Framework\Customizer_Framework::init();

/**
 * Layout/header/preview
 */
$panel_layout          = $customizer->get_panel( 'layout' );
$section_layout_header = $customizer->get_section( 'header' );
$control_layout_header = $customizer->get_control( 'layout-header' );
$control_sns_buttons   = $customizer->get_control( 'sns-buttons' );

$control_layout_header->join( $section_layout_header )->join( $panel_layout);
$control_sns_buttons->join( $section_layout_header )->join( $panel_layout);