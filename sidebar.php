<aside id="sidebar" role="complementary">
	<?php if ( is_active_sidebar( 'bottom-left-widget-area' ) ) : ?>
		<div id="bottom-left-widgets" class="widget-area">
		<ul class="xoxo">
		<?php dynamic_sidebar( 'bottom-left-widget-area' ); ?>
		</ul>
		</div>
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'bottom-center-widget-area' ) ) : ?>
		<div id="bottom-center-widgets" class="widget-area">
		<ul class="xoxo">
		<?php dynamic_sidebar( 'bottom-center-widget-area' ); ?>
		</ul>
		</div>
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'bottom-right-widget-area' ) ) : ?>
		<div id="bottom-right-widgets" class="widget-area">
		<ul class="xoxo">
		<?php dynamic_sidebar( 'bottom-right-widget-area' ); ?>
		</ul>
		</div>
	<?php endif; ?>
</aside>