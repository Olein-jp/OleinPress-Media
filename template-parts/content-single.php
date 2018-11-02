<?php
/**
 * @package OleinPress Media
 * @author Olein-jp
 * @license GPL-2.0+
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="c-entry-header">
		<?php
			the_title( '<h1 class="c-entry-header__title">', '</h1>' );
			?>
		<ul class="c-entry-header__meta">
			<li class="c-entry-header__meta__date">
				<i class="fas fa-calendar-alt"></i>
				<time class="c-entry-summary__date__time" datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time( get_option( 'date_format' ) ); ?></time>
			</li>
			<li class="c-entry-header__meta__author c-entry-author">
				<figure class="c-entry-author__image">
					<?php echo get_avatar( get_the_author_meta( 'ID' ), 20 ); ?>
				</figure>
				<p class="c-entry-author__name">
					<?php the_author(); ?>
				</p>
			</li>
			<li class="c-entry-header__cat">
				<i class="fas fa-briefcase"></i>
				<?php
				$cats = get_the_category();
				if ( $cats ) {
					foreach ( $cats as $cat ) {
						echo '<span>' . $cat->name . '</span>';
					}
				}
				?>
			</li>
		</ul>
	</header><!-- .entry-header -->


	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages( array(
			'before' => '<div class="c-link-pages">',
			'after' => '</div>',
			'link_before' => '<span class="page-item btn btn-outline-secondary">',
			'link_after' => '</span>',
			'pagelink' =>'%',
			'next_or_number'   => 'next',
			'nextpagelink'     => esc_html__( 'Go next', 'oleinpressMedia' ),
			'previouspagelink' => esc_html__( 'Back previous', 'oleinpressMedia' ),
		) );
		?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->