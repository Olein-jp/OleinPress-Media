<?php
/**
 * Created by PhpStorm.
 * User: kojikuno
 * Date: 2018/10/25
 * Time: 14:36
 */
?>
<form role="search" method="get" class="input-group" action="<?php echo esc_url( home_url('/') ); ?>">
	<input name="s" type="text" class="form-control" placeholder="<?php echo __( 'keyword', 'olenpressMedia' ); ?>">
	<div class="input-group-append">
		<button type="submit" value="Search" class="input-group-text" type="button"><i class="fa fa-search" aria-hidden="true"></i>&nbsp;</button>
	</div>
</form>