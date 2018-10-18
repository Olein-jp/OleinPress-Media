<?php
/**
* @package OleinPress Media
* @author Olein-jp
* @license GPL-2.0+
*/

if ( ! is_active_sidebar( 'footer-left' ) && ! is_active_sidebar( 'footer-center' ) && ! is_active_sidebar( 'footer-right' ) ) {
return;
}
?>

<aside class="col-md-4 widget-area">
	<?php dynamic_sidebar( 'footer-left' ); ?>
</aside>
<aside class="col-md-4 widget-area">
	<?php dynamic_sidebar( 'footer-center' ); ?>
</aside>
<aside class="col-md-4 widget-area">
	<?php dynamic_sidebar( 'footer-right' ); ?>
</aside>