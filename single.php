<?php
/**
 *
 * @package OleinPress Media
 * @author Olein-jp
 * @license GPL-2.0+
 */
get_header();
?>
	<div class="content-wrap container">
		<div class="row">
			<div id="primary" class="content-area col-md-8">
				<main id="main" class="site-main">

					<?php
					while ( have_posts() ) :
						the_post();
						get_template_part( 'template-parts/content', get_post_type() );
						?>
					<div class="c-post-navigation row">
						<div class="col-sm-6 c-post-navigation__previous">
							<i class="fas fa-chevron-left"></i> <?php previous_post_link( '%link', '%title' ); ?>
						</div>
						<div class="col-sm-6 c-post-navigation__next">
							<?php next_post_link( '%link', '%title' ); ?> <i class="fas fa-chevron-right"></i>
						</div>
					</div>
						<?php
//						the_post_navigation();
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
					endwhile; // End of the loop.
					?>

				</main><!-- #main -->
			</div><!-- #primary -->
			<?php get_sidebar(); ?>
		</div>
	</div>

<?php get_footer();
