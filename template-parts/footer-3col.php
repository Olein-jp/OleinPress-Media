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

<div class="col-md-4 widget-area">
	<?php dynamic_sidebar( 'footer-left' ); ?>
</div>
<div class="col-md-4 widget-area">
	<?php dynamic_sidebar( 'footer-center' ); ?>
</div>
<div class="col-md-4 widget-area">
	<?php dynamic_sidebar( 'footer-right' ); ?>
</div>