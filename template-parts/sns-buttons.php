<?php
/**
 * Created by PhpStorm.
 * User: kojikuno
 * Date: 2018/11/06
 * Time: 6:00
 */
?>
<?php if ( has_nav_menu( 'header-sns' ) ) : ?>
<div class="c-site-sns col-sm">
	<?php
	wp_nav_menu( array(
		'theme_location'  => 'header-sns',
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
<?php endif; ?>