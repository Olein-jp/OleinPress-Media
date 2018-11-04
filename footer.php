<?php
/**
 * @package OleinPress Media
 * @author Olein-jp
 * @license GPL-2.0+
 */
?>
<footer class="l-footer">
	<div class="c-footer-widget-area container">
		<div class="row">
			<?php get_template_part( 'template-parts/footer-3col' ); ?>
		</div>
	</div>
	<div class="c-copyright">
		<div class="c-copyright__inner container">
			© <?php echo date( "Y" ); ?> <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<?php
				if ( '' === get_theme_mod( 'copyright-text' ) ) {
					bloginfo( 'name' );
				} else {
					echo get_theme_mod( 'copyright-text' );
				}
				?>
				<?php  ?>
			</a>
			<span class="sep"> | </span>
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'oleinpressMedia' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'oleinpressMedia' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
			<?php
			/* translators: 1: Theme name, 2: Theme author. */
			printf( esc_html__( 'Theme: %1$s by %2$s.', 'oleinpressMedia' ), 'OleinPress Media', '<a href="https://olein-design.com/">Olein Design</a>' );
			?>
		</div>
	</div>
</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>