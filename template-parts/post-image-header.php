<?php
/**
 * Created by PhpStorm.
 * User: kojikuno
 * Date: 2018/11/01
 * Time: 11:04
 */
if ( has_post_thumbnail() ) :
?>
<div class="c-post-image-header">
	<?php the_post_thumbnail( 'full' ); ?>
</div>
<?php endif;