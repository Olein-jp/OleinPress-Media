<?php
/**
 * Created by PhpStorm.
 * User: kojikuno
 * Date: 2018/10/16
 * Time: 22:28
 */
$breadcrumbs = new Inc2734\WP_Breadcrumbs\Breadcrumbs();
$items = $breadcrumbs->get();
?>
<div class="c-breadcrumbs">
	<nav class="container">
		<ol class="c-breadcrumbs__list breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
			<?php foreach ( $items as $key => $item ) : ?>
			<li class="c-breadcrumbs__list__item breadcrumb-item <?php if ( empty( $item['link'] ) ) { echo 'active'; } ?>" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
				<?php if ( empty( $item['link'] ) ) : ?>
				<span itemscope itemtype="http://schema.org/Thing" itemprop="item">
					<span itemprop="name"><?php echo esc_html( $item['title'] ); ?></span>
				</span>
				<?php else : ?>
				<a itemscope itemtype="http://schema.org/Thing" itemprop="item" href="<?php echo esc_url( $item['link'] ); ?>">
					<span itemprop="name"><?php echo esc_html( $item['title'] ); ?></span>
				</a>
				<?php endif; ?>
				<meta itemprop="position" content="<?php echo esc_attr( $key + 1 ); ?>" />
			</li>
			<?php endforeach; ?>
		</ol>
	</nav>
</div>