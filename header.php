<?php
/**
 * @package OleinPress Media
 * @author Olein-jp
 * @license GPL-2.0+
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="l-container">
	<a class="skip-link sr-only" href="#content"><?php esc_html_e( 'Skip to content', 'oleinpress-media' ); ?></a>
    <?php
	$layout_header = get_theme_mod( 'layout-header' );
	get_template_part( 'template-parts/header', $layout_header );
	?>
	<?php
	get_template_part( 'template-parts/global-navigation' );
	?>


    <?php
if ( is_front_page() || is_home() ) {
	get_template_part( 'template-parts/header-carousel' );
}
?>