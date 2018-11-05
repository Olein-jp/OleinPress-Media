<?php
/**
 * Created by PhpStorm.
 * User: kojikuno
 * Date: 2018/11/04
 * Time: 7:36
 */

$customizer = \Inc2734\WP_Customizer_Framework\Customizer_Framework::init();

/**
 * Insert Default section of title_tagline
 */
$section_title_tagline = $customizer->get_section( 'title_tagline' );
$control_copyright = $customizer->get_control( 'copyright-text' );
$control_copyright->join( $section_title_tagline );