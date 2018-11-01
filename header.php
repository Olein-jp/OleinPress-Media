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
    <header class="l-header">
        <div class="l-header__inner container">
            <div class="row">
                <div class="c-site-branding col-sm">
	                <?php
	                the_custom_logo();
	                if ( is_front_page() && is_home() ) :
		                ?>
                        <h1 class="c-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		                <?php
	                else :
		                ?>
                        <p class="c-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
		                <?php
	                endif;
	                $_s_description = get_bloginfo( 'description', 'display' );
	                if ( $_s_description || is_customize_preview() ) :
		                ?>
                        <p class="c-site-description"><?php echo $_s_description; /* WPCS: xss ok. */ ?></p>
	                <?php endif; ?>
                </div>
                <div class="c-site-sns col-sm">
	                <?php
	                wp_nav_menu( array(
		                'theme_location'  => 'header-menu',
		                'menu'            => '',
		                'menu_class'      => 'c-site-sns__lists',
		                'menu_id'         => 'site-sns__lists',
		                'container'       => '',
		                'container_class' => 'c-header-menu-wrap',
		                'container_id'    => '',
		                'fallback_cb'     => 'wp_page_menu',
		                'before'          => '',
		                'after'           => '',
		                'link_before'     => '<span class="c-site-sns__lists__item-name">',
		                'link_after'      => '</span>',
		                'echo'            => true,
		                'depth'           => 1,
		                'walker'          => '',
		                'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	                ) );
	                ?>
                </div>
            </div>
        </div>
    </header><!-- end .site-header -->
    <nav class="p-global-nav navbar navbar-expand-lg navbar-light">
        <div class="container">
<!--            <a class="navbar-brand" href="#">Navbar</a>-->
			<?php
			the_custom_logo();
			?>
			<p class="p-global-nav__title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php
			?>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#global-menu" aria-controls="global-menu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="c-global-menu collapse navbar-collapse" id="global-menu">
                <?php
                wp_nav_menu( array(
                    'theme_location'  => 'global-menu',
                    'menu'            => '',
                    'menu_class'      => 'c-global-menu__lists',
                    'menu_id'         => 'header-menu',
                    'container'       => '',
                    'container_class' => 'c-global-menu',
                    'container_id'    => '',
                    'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                    'echo'            => true,
                    'depth'           => 2,
                    'walker'          => new WP_Bootstrap_Navwalker(),
                    'items_wrap'      => '<ul id="%1$s" class="%2$s navbar-nav">%3$s</ul>',
                ) );
                ?>
            </div>
        </div>
    </nav>

    <?php
if ( is_front_page() || is_home() ) {
	get_template_part( 'template-parts/header-carousel' );
}
?>