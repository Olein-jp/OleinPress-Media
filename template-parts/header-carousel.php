<?php
/**
 * Created by PhpStorm.
 * User: kojikuno
 * Date: 2018/11/01
 * Time: 6:21
 */
?>
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
				<div class="c-carousel-caption carousel-caption">
					<h5 class="c-carousel-caption__title">
						<a href="<?php the_permalink(); ?>">
							<?php the_title(); ?>
						</a>
					</h5>
					<ul class="c-carousel-caption__meta">
						<?php
						$cats = get_the_category();
						$tags = get_the_tags();
						?>
						<?php if ( $cats ) : ?>
							<?php
							foreach ( $cats as $cat ) {
								echo '<li class="c-carousel-caption__meta__cat">' . $cat->name . '</li>';
							}
						endif;
						if ( $tags ) :
						?>
							<?php
							foreach ( $tags as $tag ) {
								echo '<li class="c-carousel-caption__meta__tag">' . $tag->name . '</li>';
							}
							?>
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
	<a class="c-carousel-control-prev carousel-control-prev" href="#header-carousel" role="button" data-slide="prev">
		<span class="c-carousel-control-prev-icon carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="c-carousel-control-next carousel-control-next" href="#header-carousel" role="button" data-slide="next">
		<span class="c-carousel-control-next-icon carousel-control-next-icon" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
</div>