<?php
/**
 * Created by PhpStorm.
 * User: kojikuno
 * Date: 2018/10/25
 * Time: 11:00
 */
$previous_post = get_adjacent_post( false, '', true );
$next_post     = get_adjacent_post( false, '', false );
if ( $previous_post || $next_post ) :
?>
<div class="c-post-navigation row">
	<?php if ( $previous_post ) : ?>
	<div class="col-lg-6 c-post-navigation__previous">
		<a class="c-post-navigation__previous__anchorarea" href="<?php the_permalink( $previous_post->ID ); ?>" title="<?php echo get_the_title( $previous_post->ID ); ?>">
			<i class="fas fa-angle-left c-post-navigation__previous__arrow"></i>
			<?php if ( has_post_thumbnail( $previous_post->ID ) ) : ?>
			<figure class="c-post-navigation__figure c-post-navigation__figure_previous">
				<?php echo get_the_post_thumbnail( $previous_post->ID, array( 100, 100 ) ); ?>
			</figure>
			<? endif; ?>
			<h5 class="c-post-navigation__title">
				<?php echo get_the_title( $previous_post->ID ); ?>
			</h5>
		</a>
	</div>
	<?php endif;
	if ( $next_post ) : ?>
	<? if ( ! $previous_post ) : ?>
	<div class="offset-lg-6 col-lg-6 c-post-navigation__next">
	<?php else: ?>
	<div class="col-lg-6 c-post-navigation__next">
	<?php endif; ?>
		<a class="c-post-navigation__next__anchorarea" href="<?php the_permalink( $next_post->ID ); ?>" title="<?php echo get_the_title( $next_post->ID ); ?>">
			<h5 class="c-post-navigation__title">
				<?php echo get_the_title( $next_post->ID ); ?>
			</h5>
			<?php if ( has_post_thumbnail( $next_post->ID ) ) : ?>
			<figure class="c-post-navigation__figure c-post-navigation__figure_next">
				<?php echo get_the_post_thumbnail( $next_post->ID, array( 100, 100 ) ); ?>
			</figure>
			<?php endif; ?>
			<i class="fas fa-angle-right c-post-navigation__next__arrow"></i>
		</a>
	</div>
	<?php endif; ?>
</div>
<?php endif;