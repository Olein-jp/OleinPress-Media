<?php
/**
 * @package OleinPress Media
 * @author Olein-jp
 * @license GPL-2.0+
 */
?>
<?php if ( is_sticky() ) : ?>
<li class="c-entries__item col-lg-12">
	<?php else: ?>
<li class="c-entries__item col-lg-6">
	<?php endif; ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'c-entry-summary card' ); ?>>
		<div class="c-entry-summary__thumbnail-wrap">
			<a href="<?php the_permalink(); ?>" >
				<?php if ( has_post_thumbnail() ) : ?>
				<figure class="c-entry-summary__figure">
					<?php the_post_thumbnail(
							'medium',
						array(
								'class' => 'c-entry-summary__figure__image'
						)
					); ?>
				</figure>
				<?php else : ?>
				<div class="c-entry-summary__figure c-entry-summary__figure_noimage">
					<i class="fas fa-images" aria-hidden="true"></i>
				</div>
				<?php endif; ?>
			</a>
		</div>
		<div class="c-entry-summary__content">
			<div class="c-entry-summary__meta">
				<p class="c-entry-summary__category">
					<i class="far fa-folder" aria-hidden="true"></i>
					<?php
					$category = get_the_category();
					$cat_name = $category[0]->name;
					?>
					<span class="c-entry-summary__category-name">
					<?php
					echo $cat_name;
					?>
					</span>
				</p>
				<p class="c-entry-summary__date">
					<i class="fa fa-calendar" aria-hidden="true"></i>
					<time class="c-entry-summary__date__time" datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time( get_option( 'date_format' ) ); ?></time>
				</p>
			</div>
			<?php
			the_title( '<h2 class="c-entry-summary__title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			?>
			<div class="c-entry-summary__excerpt">
				<?php
				the_excerpt();
				?>
			</div>
			<div class="c-entry-summary__author">
				<figure class="c-entry-summary__author__image">
					<?php echo get_avatar( get_the_author_meta( 'ID' ), 32 ); ?>
				</figure>
				<p class="c-entry-summary__author__name">
					<?php the_author(); ?>
				</p>
			</div>
		</div><!-- .entry-content -->

	</article><!-- #post-<?php the_ID(); ?> -->
</li>