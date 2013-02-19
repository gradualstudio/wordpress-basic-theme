<aside id="sidebar" class="span4 blue">

<?php
	// A second sidebar for widgets, just because.
	if ( is_active_sidebar( 'primary-widget-area' ) ) : ?>

			<ul class="primary-widget-area">
				<?php dynamic_sidebar( 'primary-widget-area' ); ?>
			</ul>

<?php endif; ?>
			

<?php
	// A second sidebar for widgets, just because.
	if ( is_active_sidebar( 'secondary-widget-area' ) ) : ?>

			<ul class="secondary-widget-area">
				<?php dynamic_sidebar( 'secondary-widget-area' ); ?>
			</ul>

<?php endif; ?>

</aside> <!-- aside -->