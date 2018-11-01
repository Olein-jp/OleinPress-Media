<?php
/**
 *
 * @package OleinPress Media
 * @author Olein-jp
 * @license GPL-2.0+
 */
get_header();
?>
    <div class="l-contents container">
        <div class="row">
			<?php get_template_part( 'template-parts/breadcrumbs' ); ?>
            <div id="primary" class="l-contents__inner col-md-8" >
                <main id="main" class="l-contents__main site-main" >
                    <?php
                    if ( have_posts() ) :
                        if ( is_home() && ! is_front_page() ) :
                            ?>
                            <header>
                                <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                            </header>
                            <?php
                        endif;
                        ?>
							<div class="p-archive">
								<ul class="c-entries row">
						<?php
                        while ( have_posts() ) :
                            the_post();
                            get_template_part( 'template-parts/content', 'index' );
                        endwhile;
                        ?>
								</ul>
							</div>
                    <?php
					else :
                        get_template_part( 'template-parts/content', 'none' );
                    endif;
                    ?>

                </main><!-- #main -->
				<?php if ( function_exists('bootstrap_pagination') ) : ?>
					<?php bootstrap_pagination(); ?>
				<?php endif; ?>
            </div><!-- #primary -->

<?php get_sidebar(); ?>
        </div>
    </div>

<?php get_footer();
