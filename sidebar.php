<?php
/**
* @package OleinPress Media
* @author Olein-jp
* @license GPL-2.0+
*/

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
return;
}
?>

<aside id="secondary" class="widget-area col-md-4">
    <?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->