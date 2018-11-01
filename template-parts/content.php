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
			<li class="c-entry-header__meta__date"></li>
			<li class="c-entry-header__meta__author"></li>
			<li class="c-entry-header__cat"></li>
		</ul>
	</header><!-- .entry-header -->


	<div class="entry-content">
		<?php
		the_content();
		?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->