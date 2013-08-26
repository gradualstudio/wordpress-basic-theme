<aside id="sidebar" class="col-sm-3 col-lg-3">

<?php
	// Widget Area.
	if ( is_active_sidebar( 'widget-area' ) ) : ?>

			<ul class="widget-area list-unstyled">
				<?php dynamic_sidebar( 'widget-area' ); ?>
			</ul>

<?php endif; ?>
			

</aside> <!-- aside -->