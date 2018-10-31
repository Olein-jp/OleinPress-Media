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

    <div id="header-carousel" class="c-carousel carousel slide" data-ride="carousel">
        <ol class="c-carousel-indicators carousel-indicators">
	        <?php $slider_args = array(
		        'tag' => 'pickup',
		        'posts_per_page' => 5
	        );
			$the_query = new WP_Query( $slider_args );
			?>
	        <?php $count_indicator = 0; ?>
	        <?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
            <li data-target="#header-carousel" data-slide-to="<?php echo $count_indicator; ?>" class="<?php echo ( $count_indicator == 0 ) ? 'active' : ''; ?>"></li>
		        <?php $count_indicator++; ?>
	        <?php endwhile; endif; wp_reset_postdata(); ?>
        </ol>
        <div class="c-carousel-inner carousel-inner">
	        <?php $count = 0; ?>
	        <?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                <div class="c-carousel-item carousel-item <?php echo ($count == 0) ? 'active' : ''; ?>" style="background-image: url(<?php echo wp_get_attachment_url( get_post_thumbnail_id( $slide->ID ) ); ?>)">
                    <div class="c-carousel-caption carousel-caption d-none d-md-block">
                        <h5 class="c-carousel-caption__title"><?php the_title(); ?></h5>
                        <ul class="c-carousel-caption__meta">
							<?php
							$cats = get_the_category();
							$tags = get_the_tags();
							?>
							<?php if ( $cats ) : ?>
                            <li class="c-carousel-caption__meta__cat">
								<?php
								foreach ( $cats as $cat ) {
									echo '<span>' . $cat->name . '</span>';
								}
								?>
							</li>
							<?php
							endif;
							if ( $tags ) :
							?>
							<li class="c-carousel-caption__meta__tag">
								<?php
								foreach ( $tags as $tag ) {
									echo '<span>' . $tag->name . '</span>';
								}
								?>
							</li>
							<? endif; ?>
                        </ul>
						<div class="c-carousel-caption__author">
							<figure class="c-avator-image">
								<?php echo get_avatar( get_the_author_meta( 'ID' ), 32 ); ?>
							</figure>
							<span class="c-author-name"><?php the_author(); ?></span>
						</div>
						<p class="c-carousel-caption__link">
							<a href="<?php the_permalink(); ?>">詳しく読む</a>
						</p>
                    </div>
                </div>
		        <?php $count++; ?>
	        <?php endwhile; endif; wp_reset_postdata(); ?>
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