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
<div id="page" class="site">
	<a class="skip-link sr-only" href="#content"><?php esc_html_e( 'Skip to content', 'oleinpress-media' ); ?></a>
    <header class="site-header">
        <div class="site-header__inner container">
            <div class="row">
                <div class="col-sm">
	                <?php
	                the_custom_logo();
	                if ( is_front_page() && is_home() ) :
		                ?>
                        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		                <?php
	                else :
		                ?>
                        <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
		                <?php
	                endif;
	                $_s_description = get_bloginfo( 'description', 'display' );
	                if ( $_s_description || is_customize_preview() ) :
		                ?>
                        <p class="site-description"><?php echo $_s_description; /* WPCS: xss ok. */ ?></p>
	                <?php endif; ?>
                </div>
                <div class="col-sm">
	                <?php
	                wp_nav_menu( array(
		                'theme_location'  => 'header-menu',
		                'menu'            => '',
		                'menu_class'      => 'header-menu',
		                'menu_id'         => 'header-menu',
		                'container'       => 'div',
		                'container_class' => 'header-menu-container',
		                'container_id'    => '',
		                'fallback_cb'     => 'wp_page_menu',
		                'before'          => 'before',
		                'after'           => 'after',
		                'link_before'     => 'link_before',
		                'link_after'      => 'link_after',
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
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#global-menu" aria-controls="global-menu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="global-menu">
                <?php
                wp_nav_menu( array(
                    'theme_location'  => 'global-menu',
                    'menu'            => '',
                    'menu_class'      => 'global-menu',
                    'menu_id'         => 'header-menu',
                    'container'       => 'div',
                    'container_class' => 'global-menu-container',
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

    <div id="header-carousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
	        <?php $slider = get_posts( array(
		        'tag' => 'pickup',
		        'posts_per_page' => 5
	        ) ); ?>
	        <?php $count_indicator = 0; ?>
	        <?php foreach ( $slider as $slide ) : ?>
            <li data-target="#header-carousel" data-slide-to="<?php echo $count_indicator; ?>" class="<?php echo ( $count_indicator == 0 ) ? 'active' : ''; ?>"></li>
		        <?php $count_indicator++; ?>
	        <?php endforeach; ?>
        </ol>
        <div class="carousel-inner">
	        <?php $slider = get_posts( array(
	                'tag' => 'pickup',
                    'posts_per_page' => 5
                ) ); ?>
	        <?php $count = 0; ?>
	        <?php foreach ( $slider as $slide ) : ?>
                <div class="carousel-item <?php echo ($count == 0) ? 'active' : ''; ?>" style="background-image: url(<?php echo wp_get_attachment_url( get_post_thumbnail_id( $slide->ID ) ); ?>)">
                    <div class="carousel-caption d-none d-md-block">
                        <h5><?php the_title(); ?></h5>
                        <ul class="carousel-caption__meta">
                            <li class="carousel-caption__meta__item"><?php the_tags(); ?></li>
                        </ul>
                    </div>
                </div>
		        <?php $count++; ?>
	        <?php endforeach; ?>
        </div>
        <a class="carousel-control-prev" href="#header-carousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#header-carousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

	<?php get_template_part( 'template-parts/breadcrumbs' );