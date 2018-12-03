<?php
/**
 * Created by PhpStorm.
 * User: kojikuno
 * Date: 2018/11/06
 * Time: 6:27
 */
?>
<?php
$layout_navbar = get_theme_mod( 'layout-navbar' );
?>
<?php if ( has_nav_menu( 'global-menu' ) ) : ?>
<nav class="p-global-nav navbar navbar-expand-lg navbar-light">
	<div class="container">
		<?php if ( has_custom_logo() ) :
		the_custom_logo();
		else :
		?>
		<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
		<?php endif; ?>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#global-menu" aria-controls="global-menu" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="c-global-menu collapse navbar-collapse" id="global-menu">
			<?php
			wp_nav_menu( array(
				'theme_location'  => 'global-menu',
				'menu'            => '',
				'menu_class'      => 'c-global-menu__lists ' . $layout_navbar,
				'menu_id'         => 'header-menu',
				'container'       => '',
				'container_class' => 'c-global-menu',
				'container_id'    => '',
				'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
				'echo'            => true,
				'depth'           => 3,
				'walker'          => new WP_Bootstrap_Navwalker(),
				'items_wrap'      => '<ul id="%1$s" class="%2$s navbar-nav">%3$s</ul>',
			) );
			?>
		</div>
	</div>
</nav>
<?php endif; ?>
