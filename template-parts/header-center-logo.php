<?php
/**
 * Created by PhpStorm.
 * User: kojikuno
 * Date: 2018/11/06
 * Time: 5:23
 */
?>
<header class="l-header">
	<div class="l-header__inner container">
		<div class="row">
			<div class="c-site-branding c-site-branding__center-logo col-sm col-md-4 offset-md-4">
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
			<?php
			$sns_buttons = get_theme_mod( 'sns-buttons' );
			if ( 'show' === $sns_buttons ) {
				get_template_part( 'template-parts/sns-buttons' );
			}
			?>
		</div>
	</div>
</header><!-- end .site-header -->