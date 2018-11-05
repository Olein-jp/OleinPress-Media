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
$section_layout_navbar = $customizer->get_section( 'navbar' );
$control_layout_navbar = $customizer->get_control( 'layout-navbar' );

$control_layout_navbar->join( $section_layout_navbar )->join( $panel_layout );