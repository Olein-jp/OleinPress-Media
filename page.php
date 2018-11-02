<?php
/**
 *
 * @package OleinPress Media
 * @author Olein-jp
 * @license GPL-2.0+
 */
get_header();

get_template_part( 'template-parts/post-image-header' ); ?>
	<div class="content-wrap container">
		<div class="row">
			<?php get_template_part( 'template-parts/breadcrumbs' ); ?>
			<div id="primary" class="content-area col-md-8">
				<main id="main" class="site-main">
<!--					<figure class="c-post-thumbnail">-->
<!--						--><?php //the_post_thumbnail(); ?>
<!--					</figure>-->
					<?php
					while ( have_posts() ) :
						the_post();
						get_template_part( 'template-parts/content', 'page' );

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
